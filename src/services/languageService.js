const fs = require('fs');
const path = require('path');
const geoip = require('geoip-lite');

const supportedLanguages = ['en', 'hi'];

const loadPack = (code) => {
  const safeCode = supportedLanguages.includes(code) ? code : 'en';
  const filePath = path.join(__dirname, '..', '..', 'lang', `${safeCode}.json`);
  return JSON.parse(fs.readFileSync(filePath, 'utf-8'));
};

const detectLanguage = (req) => {
  const ip = req.ip || req.connection?.remoteAddress;
  const geo = ip ? geoip.lookup(ip) : null;
  if (geo?.country === 'IN') {
    return 'hi';
  }
  const accept = req.headers['accept-language'];
  if (accept) {
    const match = accept.split(',')[0]?.trim().slice(0, 2);
    if (supportedLanguages.includes(match)) {
      return match;
    }
  }
  return 'en';
};

module.exports = {
  supportedLanguages,
  loadPack,
  detectLanguage
};
