import * as path from 'path';
import * as glob from 'glob';
import { global as globalConfig } from '../config/global';

export class Translator {
  private languages: any = {};
  constructor() {
    // load all languages by init
    glob.sync(`${__dirname}/../locales/*`)
      .map((file) => {
        let ext = path.extname(file);
        let _lang = path.basename(file, ext);
        if (!/\.d/.test(_lang)) {
          this.languages[_lang] = require(`../locales/${_lang}`).Translates;
        }
        return this.languages;
      });
    return this;
  }

  /**
   * get messages via language name
   * @param {string} lang language name for get message
   */
  getMessages = (lang?: string): typeof defaultLang => {
    let defaultLang = this.getDefaultLang();
    return lang ? { ...defaultLang, ...this.languages[lang] } : defaultLang;
  }

  /**
   * Get default lang to fix miss on current locale then use default
   * @returns {any}
   */
  getDefaultLang() {
    let locale = globalConfig.defaultLang;
    return this.languages[locale];
  }
}
