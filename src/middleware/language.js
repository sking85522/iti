const fs = require("fs");
const path = require("path");

const supportedLanguages = ["en", "hi"];

const loadLanguagePack = (language) => {
  const filePath = path.join(__dirname, "..", "..", "locales", `${language}.json`);
  const raw = fs.readFileSync(filePath, "utf8");
  return JSON.parse(raw);
};

const detectLanguage = (req) => {
  if (req.user && req.user.language) {
    return req.user.language;
  }
  if (req.cookies.language) {
    return req.cookies.language;
  }
  const header = req.headers["accept-language"];
  if (header) {
    const candidate = header.split(",")[0].split("-")[0];
    if (supportedLanguages.includes(candidate)) {
      return candidate;
    }
  }
  return "en";
};

const languageMiddleware = (req, res, next) => {
  const language = detectLanguage(req);
  const pack = loadLanguagePack(language);
  res.locals.language = language;
  res.locals.t = (key) => pack[key] || key;
  res.locals.supportedLanguages = supportedLanguages;
  next();
};

module.exports = { languageMiddleware, supportedLanguages };
