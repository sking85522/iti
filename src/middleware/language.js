const { detectLanguage, loadPack } = require('../services/languageService');

const languageMiddleware = (req, res, next) => {
  const sessionLang = req.session.user?.language;
  const detected = sessionLang || detectLanguage(req);
  res.locals.language = detected;
  res.locals.t = loadPack(detected);
  return next();
};

module.exports = languageMiddleware;
