const express = require("express");

const router = express.Router();

router.get("/", (req, res) => {
  res.render("home", { title: "Techelevatex" });
});

router.get("/about", (req, res) => {
  res.render("about", { title: "About Techelevatex" });
});

router.get("/services", (req, res) => {
  res.render("services", { title: "Services" });
});

router.get("/contact", (req, res) => {
  res.render("contact", { title: "Contact" });
});

router.get("/blog", (req, res) => {
  res.render("blog", { title: "Resources" });
});

module.exports = router;
