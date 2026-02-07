const express = require("express");
const { body, validationResult } = require("express-validator");
const pool = require("../db");
const { authenticate, requireRole } = require("../middleware/auth");

const router = express.Router();

router.get("/dashboard", authenticate, async (req, res) => {
  res.render("dashboard", { title: "Dashboard", user: req.user });
});

router.get("/profile", authenticate, (req, res) => {
  res.render("profile", {
    title: "Your profile",
    user: req.user,
    errors: []
  });
});

router.post(
  "/profile",
  authenticate,
  [
    body("name").trim().isLength({ min: 2 }).withMessage("Name is required"),
    body("email").isEmail().withMessage("Valid email required"),
    body("photo_url").optional({ checkFalsy: true }).isURL().withMessage("Photo URL must be valid"),
    body("language").isIn(["en", "hi"]).withMessage("Unsupported language")
  ],
  async (req, res) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).render("profile", {
        title: "Your profile",
        user: { ...req.user, ...req.body },
        errors: errors.array()
      });
    }

    const { name, email, photo_url, language } = req.body;
    await pool.query(
      "UPDATE users SET name = ?, email = ?, photo_url = ?, language = ? WHERE uid = ?",
      [name, email, photo_url || null, language, req.user.uid]
    );

    res.cookie("language", language, {
      httpOnly: false,
      sameSite: "lax",
      maxAge: 30 * 24 * 60 * 60 * 1000
    });

    return res.redirect("/profile");
  }
);

router.get("/admin", authenticate, requireRole("admin"), async (req, res) => {
  const [users] = await pool.query("SELECT uid, name, email, role, language FROM users");
  const [workers] = await pool.query(
    "SELECT worker_id, user_uid, assigned_tasks, status FROM workers"
  );
  const [logs] = await pool.query(
    "SELECT action, created_at FROM admin_logs ORDER BY created_at DESC LIMIT 8"
  );
  res.render("admin", {
    title: "Admin panel",
    users,
    workers,
    logs
  });
});

router.post(
  "/admin/users",
  authenticate,
  requireRole("admin"),
  [
    body("uid").trim().notEmpty().withMessage("UID required"),
    body("role").isIn(["admin", "worker", "user"]).withMessage("Role invalid")
  ],
  async (req, res) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).render("error", {
        title: "Admin error",
        message: errors.array().map((err) => err.msg).join(", ")
      });
    }

    const { uid, role } = req.body;
    await pool.query("UPDATE users SET role = ? WHERE uid = ?", [role, uid]);
    await pool.query(
      "INSERT INTO admin_logs (admin_uid, action) VALUES (?, ?)",
      [req.user.uid, `Updated role for ${uid} to ${role}`]
    );

    return res.redirect("/admin");
  }
);

router.post(
  "/admin/workers",
  authenticate,
  requireRole("admin"),
  [
    body("user_uid").trim().notEmpty().withMessage("User UID required"),
    body("assigned_tasks").trim().isLength({ min: 3 }).withMessage("Task required"),
    body("status").isIn(["active", "paused", "completed"]).withMessage("Status invalid")
  ],
  async (req, res) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).render("error", {
        title: "Admin error",
        message: errors.array().map((err) => err.msg).join(", ")
      });
    }

    const { user_uid, assigned_tasks, status } = req.body;
    await pool.query(
      "INSERT INTO workers (user_uid, assigned_tasks, status) VALUES (?, ?, ?)",
      [user_uid, assigned_tasks, status]
    );
    await pool.query(
      "INSERT INTO admin_logs (admin_uid, action) VALUES (?, ?)",
      [req.user.uid, `Assigned worker tasks for ${user_uid}`]
    );

    return res.redirect("/admin");
  }
);

router.post(
  "/admin/users/delete",
  authenticate,
  requireRole("admin"),
  [body("uid").trim().notEmpty().withMessage("UID required")],
  async (req, res) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).render("error", {
        title: "Admin error",
        message: errors.array().map((err) => err.msg).join(", ")
      });
    }

    const { uid } = req.body;
    await pool.query("DELETE FROM users WHERE uid = ?", [uid]);
    await pool.query(
      "INSERT INTO admin_logs (admin_uid, action) VALUES (?, ?)",
      [req.user.uid, `Deleted user ${uid}`]
    );

    return res.redirect("/admin");
  }
);

router.get("/worker", authenticate, requireRole("worker", "admin"), async (req, res) => {
  const [tasks] = await pool.query(
    "SELECT worker_id, assigned_tasks, status FROM workers WHERE user_uid = ?",
    [req.user.uid]
  );
  res.render("worker", { title: "Worker panel", tasks });
});

router.post(
  "/worker/tasks",
  authenticate,
  requireRole("worker", "admin"),
  [
    body("worker_id").isInt().withMessage("Worker task required"),
    body("status").isIn(["active", "paused", "completed"]).withMessage("Status invalid")
  ],
  async (req, res) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).render("error", {
        title: "Worker error",
        message: errors.array().map((err) => err.msg).join(", ")
      });
    }

    const { worker_id, status } = req.body;
    await pool.query(
      "UPDATE workers SET status = ? WHERE worker_id = ? AND user_uid = ?",
      [status, worker_id, req.user.uid]
    );

    return res.redirect("/worker");
  }
);

router.post("/language", authenticate, async (req, res) => {
  const { language } = req.body;
  if (!["en", "hi"].includes(language)) {
    return res.status(400).render("error", {
      title: "Language error",
      message: "Unsupported language selection."
    });
  }

  await pool.query("UPDATE users SET language = ? WHERE uid = ?", [language, req.user.uid]);
  res.cookie("language", language, {
    httpOnly: false,
    sameSite: "lax",
    maxAge: 30 * 24 * 60 * 60 * 1000
  });

  return res.redirect("/dashboard");
});

module.exports = router;
