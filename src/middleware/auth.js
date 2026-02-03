const jwt = require("jsonwebtoken");
const pool = require("../db");

const authenticate = async (req, res, next) => {
  const token = req.cookies.auth_token;
  if (!token) {
    return res.redirect("/login");
  }

  try {
    const payload = jwt.verify(token, process.env.JWT_SECRET);
    const [rows] = await pool.query(
      "SELECT uid, name, email, role, language, photo_url FROM users WHERE uid = ?",
      [payload.uid]
    );

    if (rows.length === 0) {
      res.clearCookie("auth_token");
      return res.redirect("/login");
    }

    req.user = rows[0];
    return next();
  } catch (error) {
    res.clearCookie("auth_token");
    return res.redirect("/login");
  }
};

const requireRole = (...roles) => (req, res, next) => {
  if (!req.user || !roles.includes(req.user.role)) {
    return res.status(403).render("error", {
      title: "Access denied",
      message: "You do not have permission to access this resource."
    });
  }
  return next();
};

module.exports = { authenticate, requireRole };
