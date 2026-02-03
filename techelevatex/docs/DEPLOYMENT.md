# Deployment Guide

## Production Checklist
- Configure MySQL backups and monitoring.
- Set environment variables from `.env.example`.
- Enable HTTPS and secure cookies at the server level.

## Deploy on Shared Hosting
1. Upload the `techelevatex` folder to `public_html/techelevatex`.
2. Create a MySQL database and import `sql/schema.sql`.
3. Set database credentials in your hosting control panel environment variables or in a secure config file.
4. Point your domain (techelevatex.in) to the hosting root.

## Deploy on a VPS (Ubuntu)
1. Install PHP 8+, MySQL, and Nginx/Apache.
2. Clone the repository.
3. Import the schema:
   ```bash
   mysql -u root -p techelevatex < sql/schema.sql
   ```
4. Configure environment variables (`SITE_URL`, `DB_HOST`, `DB_USER`, `DB_PASSWORD`, `DB_NAME`).
5. Point your web server to the `/workspace/iti` root so `/techelevatex/index.php` is accessible.
6. Add SSL certificates via Let's Encrypt.
