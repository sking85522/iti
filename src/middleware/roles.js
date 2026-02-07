const requireRole = (roles) => (req, res, next) => {
  if (!req.session.user || !roles.includes(req.session.user.role)) {
    return res.status(403).render('pages/403', { title: 'Access denied' });
  }
  return next();
};

module.exports = { requireRole };
