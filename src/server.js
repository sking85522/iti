require("dotenv").config();
const path = require("path");
const express = require("express");
const cookieParser = require("cookie-parser");
const csrf = require("csurf");
const helmet = require("helmet");
const morgan = require("morgan");
const pages = require("./routes/pages");
const auth = require("./routes/auth");
const panels = require("./routes/panels");
const { languageMiddleware } = require("./middleware/language");

const app = express();

app.set("view engine", "ejs");
app.set("views", path.join(__dirname, "views"));

app.use(helmet());
app.use(morgan("dev"));
app.use(express.urlencoded({ extended: false }));
app.use(express.json());
app.use(cookieParser());
app.use(express.static(path.join(__dirname, "..", "public")));

const csrfProtection = csrf({ cookie: true });

app.use(languageMiddleware);
app.use(csrfProtection);

app.use((req, res, next) => {
  res.locals.csrfToken = req.csrfToken();
  res.locals.currentPath = req.path;
  res.locals.user = req.user || null;
  next();
});

app.use(pages);
app.use(auth);
app.use(panels);

app.use((err, req, res, next) => {
  if (err.code === "EBADCSRFTOKEN") {
    return res.status(403).render("error", {
      title: "Invalid request",
      message: "Form expired. Please refresh and try again."
    });
  }
  return next(err);
});

app.use((err, req, res, next) => {
  res.status(500).render("error", {
    title: "Server error",
    message: "Something went wrong. Please try again later."
  });
  next();
});

const port = process.env.PORT || 3000;
app.listen(port, () => {
  console.log(`Techelevatex running on port ${port}`);
});
