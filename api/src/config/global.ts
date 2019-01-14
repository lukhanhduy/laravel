/**
 * config for global in project
 */
export const global = {
  projectName: "English Learn",
  defaultLang: 'en',
  defaultTZ: 'Asia/Ho_Chi_Minh',
  defaultCountryCode: 'vi-VN',
  /* API_KEY */
  apiKeyApp: 'iiwGIFisnHLKZbQEUtAgx08CHaaYfIaDmgycZGWiw0bAz5L6VoAb9jG3YFN67uM6',

  /* Crypto */
  crypto: {
    AES256: 'aes-256-cbc',
    password: 'H2p5jEgWVbhQZc182dRXemYPlFjaoVgS',
    salt: 10
  },
  // for jwt
  jwtConfig: {
    secretToken: 'W3 Hav3 th3 kn0w h0w',
    ttlToken: 60 * 60 * 24 * 30 // 1 day
  },
  /* Firebase */
  fbServerKey: '123',
  fbUrl: 'https://fcm.googleapis.com/fcm/send',
  /**
   * Media config such as size, locale path, etc
   */
	/*
		Redis server
	*/
  filesPath: 'assets/filesUpload/',
  maxFilesUpload: 10,
  filterUpload: {
    extensionFull: '*',
    images: {
      size: 50, // 5 MB
      ext: 'jpg|png|jpeg|gif|svg|JPG|PNG|JPEG|GIF|SVG'
    },
    video: {
      size: 1000,
      ext: 'mp4|mov|flv|avi|MP4|MOV|FLV|AVI',
      time: 5 // 5 minutes
    },
    audio: {
      ext: 'mp3|ogg|wav|WAV|m4a',
    }
  },
  fileSizes: [
    { width: 80, height: 80, key: 'thumb' }, // _thumb size
    { width: 640, height: 480, key: 'standard' }, // standard size
    { width: 120, height: 90, key: 'small' }, // small size
    { width: 320, height: 180, key: 'medium' }, // medium size
    { width: 480, height: 360, key: 'large' }, // large size
  ],
  sizes: {
    "small": {
      height: 150,
      width: 150
    }
  },

  phoneRegex: ['^[\+][0-9]{3}[0-9]{3}[0-9]{4,10}$'],
  ttlPassCode: 10, // 10 minutes
  smtpSetup: {
    from: 'English Learn <admin@english-learn.com>',
    replyTo: 'English Learn <admin@english-learn.com>',
    subject: 'Email auto send from system admin !',
    sendGridKey: '123',
  },
  defaultRSASize: 1024,
  rsaExpiredTime: 4, // time to live of rsa keys in hours
  passCodeTTL: 30, // time to live of passCode send via sms in minutes
  passTokenTTL: 60, // time to live of reset token send via email in minutes
  TTLToken: 9999999999999999999999999999999999999999 * 60 * 60, // 6 * 60 * 60, time to live of access token after login in seconds | 6 hours
  fmtDateTimeDB: "YYYY-MM-DD HH:mm:ss.SSS",
  fmtDateTime: "YYYY-MM-DD HH:mm:ss",
  fmtDate: "YYYY-MM-DD",
  fmtTime: "HH:mm:ss",
  fmtDateFileName: "DDMMYY",
  separatorFiles: "-",
  /**
   * The exceptions for view explorer interface for web browser
   * explorer/?*
   * /^\/explorer\/?(.*)\/?$/i
   */
  urlsExceptions: [/^explorer\/?(.*)\/?$/i, /^files\/download\/?$/i,
    /^filesUpload\/?(.*)\/?$/i, /^chats\/?(.*)\/?$/i
  ],
  envDev: ['local', 'development', 'dev'],
  urlAPIsIP: 'https://geoip.nekudo.com/api/',
  urlCDN: (_env: string = 'local') => {
    let _Url: string = '';
    switch (_env.toLowerCase()) {
      case 'staging': _Url = 'https://hxs3.s3.amazonaws.com'; break;
      case 'production': _Url = 'https://hxs3.s3.amazonaws.com'; break;
      default: _Url = 'https://hxs3.s3.amazonaws.com'; break;
    }
    return _Url;
  },
  baseUrl: (_env: string = 'local') => {
    let _Url: any = '';
    switch (_env.toLowerCase()) {
      case 'staging': _Url = "http://localhost:3000"; break;
      case 'production': _Url = "http://localhost:3000"; break;
      default: _Url = 'http://localhost:3000'; break;
    }
    return _Url;
  },
  userType: [1, 2], // user type in users collection, 1: Normal Users 2: Official Users
};
