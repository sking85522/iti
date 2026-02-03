const ensureAuth = (req, res, next) => {
  if (!req.session.user) {
    return res.redirect('/login');
  }
  return next();
};

const ensureGuest = (req, res, next) => {
  if (req.session.user) {
    return res.redirect('/dashboard');
  }
  return next();
};

module.exports = { ensureAuth, ensureGuest };
