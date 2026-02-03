# Techelevatex

Techelevatex is a technology branding and scalable solutions platform focused on exam panel management, workflow optimization, cloud hosting, and Hindi-first educational resources.

## Features
- Full authentication with UID auto-generation
- User, worker, and admin panels with role-based access
- Language pack support with browser detection and profile overrides
- CSRF protection, validation, and bcrypt password hashing
- Responsive UI and reusable PHP includes

## Tech Stack
- **Backend:** PHP 8+
- **Frontend:** HTML5, CSS3, JavaScript
- **Database:** MySQL (SQL schema included)

## Local Setup
1. Create a MySQL database named `techelevatex`.
2. Import the schema:
   ```bash
   mysql -u root -p techelevatex < sql/schema.sql
   ```
3. Copy the environment file:
   ```bash
   cp .env.example .env
   ```
4. Update `.env` with your database credentials.
5. Start the PHP server:
   ```bash
   php -S localhost:8000 -t /workspace/iti
   ```
6. Visit `http://localhost:8000/techelevatex/index.php`.

## Panels
- **Admin:** `/techelevatex/admin/dashboard.php`
- **Worker:** `/techelevatex/worker/dashboard.php`
- **User:** `/techelevatex/user/dashboard.php`

## Language Packs
Techelevatex defaults to English (`en`). The app checks the browser `Accept-Language` header (and India locales) to auto-select a language, and users can override it in the settings page. Language packs live in `language/`.

## Deployment
See [docs/DEPLOYMENT.md](docs/DEPLOYMENT.md) for cloud hosting instructions.
