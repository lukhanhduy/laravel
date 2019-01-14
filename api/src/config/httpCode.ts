
export const httpCode = {

  /**
   * =================================================================================================================
   * The group HTTP Code for response
   * =================================================================================================================
   */
  continue: 100,
  switchingProtocols: 101,
  processingWebDAV: 102,

  successCode: 200,
  created: 201,
  accepted: 202,
  nonAuthoritativeInformation: 203,
  noContent: 204,
  resetContent: 205,
  partialContent: 206,
  multiStatusWebDAV: 207,
  alreadyReportedWebDAV: 208,

  multipleChoices: 300,
  movedPermanently: 301,
  found: 302,
  seeOther: 303,
  notModified: 304,
  useProxy: 305,
  unused: 306,
  temporaryRedirect: 307,
  permanentRedirectExperimental: 308,

  badRequest: 400,
  unauthorized: 401,
  paymentRequired: 402,
  forbidden: 403,
  notFound: 404,
  methodNotAllowed: 405,
  notAcceptable: 406,
  proxyAuthenticationRequired: 407,
  requestTimeout: 408,
  conflict: 409,
  gone: 410,
  lengthRequired: 411,
  preconditionFailed: 412,
  requestEntityTooLarge: 413,
  requestURITooLong: 414,
  unsupportedMediaType: 415,
  requestedRangeNotSatisfiable: 416,
  expectationFailed: 417,
  iATeapot: 418,
  enhanceYourCalm: 410,
  unprocessableEntity: 422,
  locked: 423,
  failedDependency: 424,
  reservedForWebDAV: 425,
  upgradeRequired: 426,
  preconditionRequired: 428,
  tooManyRequests: 429,
  requestHeaderFieldsTooLarge: 431,
  noResponseNginx: 444,
  retryWithMicrosoft: 449,
  blockedWindowsParentalControls: 450,
  unavailableForLegalReasons: 451,
  clientClosedRequestNginx: 499,

  internalServerError: 500,
  notImplemented: 501,
  badGateway: 502,
  serviceUnavailable: 503,
  gatewayTimeout: 504,
  httpVersionNotSupported: 505,
  variantAlsoNegotiates: 506,
  insufficientStorageWebDAV: 507,
  loopDetectedWebDAV: 508,
  bandwidthLimitExceededApache: 509,
  notExtended: 510,
  networkAuthenticationRequired: 511,
  networkReadTimeoutError: 598,
  NetworkConnectTimeoutError: 599,

  /**
   * =================================================================================================================
   * The group error code custom by system for response
   * =================================================================================================================
   */
  errorMissParams: 1000,
  reasonMissParams: 'MISSING_PARAMS',

  errorWrongFormat: 1001,
  reasonWrongFormat: 'WRONG_FORMAT',

  errorExpiredTime: 1002,
  reasonExpiredTime: 'EXPIRED_TIME',

  errorCodeSystem: 1003,
  reasonErrorUnknown: 'ERROR_UNKNOWN',

  errorNotMatch: 1004,
  reasonNotMatch: 'NOT_MATCH',

  errorNotDelivered: 1005,
  reasonNotDelivered: 'NOT_DELIVERED',

  errorEmptyOrErrorDB: 1006,
  reasonEmptyOrErrorDB: 'NOT_EXISTS',

  errorCreateData: 1007,
  reasonCreateData: 'NOT_CREATED',

  errorUploadFiles: 1008,
  reasonUploadFiles: 'ERROR_UPLOAD',

  errorUpdated: 1009,
  reasonUpdated: 'ERROR_UPDATED',

  errorDecrypted: 1010,
  reasonDecrypted: 'ERROR_DECRYPTED',

  errorEncrypted: 1011,
  reasonEncrypted: 'ERROR_ENCRYPTED',

  errorMakeAccessToken: 1012,
  reasonMakeAccessToken: 'ERROR_CREATE_ACCESS_TOKEN',

  errorUserName: 1013,
  reasonUserName: 'WRONG_USERNAME',

  errorPassword: 1014,
  reasonPassword: 'WRONG_PASSWORD',

  errorPhone: 1015,
  reasonPhone: 'WRONG_PHONE_NUMBER',

  errorEmail: 1016,
  reasonEmail: 'WRONG_EMAIL',

  errorEmptyPublicKey: 1017,
  reasonEmptyPublicKey: 'EMPTY_PUBLIC_KEY',

  errorExists: 1018,
  reasonExists: 'ERROR_EXISTS',

  errorPermission: 1019,
  reasonPermission: 'ACCESS_DENIED',

  errorLimit: 1020,
  reasonLimit: 'ERROR_LIMIT',

  errorSelect: 1021,
  reasonSelect: 'ERROR_SELECT_DB',

  errorRequestParams: 1022,
  reasonRequestParams: 'PARAMS_INVALID',

  errorCreate: 1023,
  reasonCreate: 'ERROR_CREATE_DB',

  errorDelete: 1024,
  reasonDelete: 'ERROR_DELETE',

  errorAction: 1025,
  reasonAction: 'INVALID_ACTION',

  errorParseFormData: 1026,
  reasonParse: 'ERROR_PARSE_DATA',

  reasonBadRequest: 'BAD_REQUEST',
  /**
   * =================================================================================================================
   * The group status name for response
   * =================================================================================================================
   */
  stateDone: 'SUCCESS',
  stateError: 'ERROR',
  stateFail: 'FAILURE',
  stateWait: 'WAITING',
  stateDelivered: 'DELIVERED',
  stateRegistered: 'REGISTERED',
  stateUnAuth: 'UNAUTHENTICATED'
};
