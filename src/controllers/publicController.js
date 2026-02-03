const pool = require('../db');

const home = async (req, res) => {
  let settings = {};
  try {
    const [settingsRows] = await pool.query('SELECT key_name, value_text FROM site_settings');
    settings = settingsRows.reduce((acc, row) => {
      acc[row.key_name] = row.value_text;
      return acc;
    }, {});
  } catch (error) {
    settings = { site_name: 'Techelevatex', default_language: 'en' };
  }
  return res.render('pages/index', { title: 'Techelevatex', settings });
};

const about = (req, res) => res.render('pages/about', { title: 'About Techelevatex' });
const services = (req, res) => res.render('pages/services', { title: 'Services' });
const contact = (req, res) => res.render('pages/contact', { title: 'Contact Us', success: false });
const contactSubmit = (req, res) =>
  res.render('pages/contact', { title: 'Contact Us', success: true });
const blog = (req, res) => res.render('pages/blog', { title: 'Resources' });

module.exports = { home, about, services, contact, contactSubmit, blog };
