const pool = require('../db');

const dashboard = async (req, res) => {
  if (req.session.user.role === 'admin') {
    return res.redirect('/admin');
  }
  if (req.session.user.role === 'worker') {
    return res.redirect('/worker');
  }
  const [settingsRows] = await pool.query('SELECT key_name, value_text FROM site_settings');
  const settings = settingsRows.reduce((acc, row) => {
    acc[row.key_name] = row.value_text;
    return acc;
  }, {});
  return res.render('pages/user-dashboard', {
    title: 'User Dashboard',
    settings,
    user: req.session.user
  });
};

module.exports = { dashboard };
