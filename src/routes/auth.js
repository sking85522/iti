const express = require("express");
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");
const { body, validationResult } = require("express-validator");
const pool = require("../db");

const router = express.Router();

const generateUid = () => {
  const timestamp = Date.now().toString(36).toUpperCase();
  const random = Math.random().toString(36).slice(2, 8).toUpperCase();
  return `UID-${timestamp}-${random}`;
};

router.get("/register", (req, res) => {
  res.render("register", { title: "Create your account", errors: [], form: {} });
});

router.post(
  "/register",
  [
    body("name").trim().isLength({ min: 2 }).withMessage("Name is required"),
    body("email").isEmail().withMessage("Valid email required"),
    body("password")
      .isLength({ min: 8 })
      .withMessage("Password must be at least 8 characters")
  ],
  async (req, res) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).render("register", {
        title: "Create your account",
        errors: errors.array(),
        form: req.body
      });
    }

    const { name, email, password } = req.body;
    const [existing] = await pool.query("SELECT uid FROM users WHERE email = ?", [email]);
    if (existing.length > 0) {
      return res.status(400).render("register", {
        title: "Create your account",
        errors: [{ msg: "Email already registered" }],
        form: req.body
      });
    }

    const hashedPassword = await bcrypt.hash(password, 12);
    const uid = generateUid();
    const language = req.cookies.language || "en";

    await pool.query(
      "INSERT INTO users (uid, name, email, password, role, language) VALUES (?, ?, ?, ?, ?, ?)",
      [uid, name, email, hashedPassword, "user", language]
    );

    return res.redirect("/login");
  }
);

router.get("/login", (req, res) => {
  res.render("login", { title: "Sign in", errors: [], form: {} });
});

router.post(
  "/login",
  [
    body("email").isEmail().withMessage("Valid email required"),
    body("password").notEmpty().withMessage("Password required")
  ],
  async (req, res) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).render("login", {
        title: "Sign in",
        errors: errors.array(),
        form: req.body
      });
    }

    const { email, password } = req.body;
    const [rows] = await pool.query(
      "SELECT uid, password, role FROM users WHERE email = ?",
      [email]
    );

    if (rows.length === 0) {
      return res.status(400).render("login", {
        title: "Sign in",
        errors: [{ msg: "Invalid credentials" }],
        form: req.body
      });
    }

    const isValid = await bcrypt.compare(password, rows[0].password);
    if (!isValid) {
      return res.status(400).render("login", {
        title: "Sign in",
        errors: [{ msg: "Invalid credentials" }],
        form: req.body
      });
    }

    const token = jwt.sign(
      { uid: rows[0].uid, role: rows[0].role },
      process.env.JWT_SECRET,
      { expiresIn: "2h" }
    );

    res.cookie("auth_token", token, {
      httpOnly: true,
      sameSite: "lax",
      secure: process.env.NODE_ENV === "production",
      maxAge: 2 * 60 * 60 * 1000
    });

    return res.redirect("/dashboard");
  }
);

router.post("/logout", (req, res) => {
  res.clearCookie("auth_token");
  res.redirect("/");
});

module.exports = router;
