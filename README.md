# Techelevatex

Techelevatex is a technology branding and scalable solutions provider focused on education-first workflows, exam panel management, workflow optimization, cloud hosting, and Hindi educational resources.

**Site URL:** https://techelevatex.in

## Features

- Full authentication system with UID auto-generation
- Role-based panels (Admin, Worker, User)
- Editable user profiles with language preference
- Language packs with auto-detection and manual override
- Responsive, professional front-end
- Secure password storage with bcrypt and JWT session cookies
- CSRF protection, input validation, and audit logs

## Tech Stack

- **Backend:** Node.js (Express)
- **Frontend:** HTML5, CSS3, JavaScript (EJS templates)
- **Database:** MySQL (schema provided in `sql/schema.sql`)

## Getting Started (Local)

### 1) Install dependencies

```bash
npm install
```

### 2) Configure environment variables

Create a `.env` file in the root:

```bash
PORT=3000
NODE_ENV=development
DB_HOST=localhost
DB_USER=techelevatex
DB_PASSWORD=your_password
DB_NAME=techelevatex
JWT_SECRET=replace_with_a_long_random_string
```

### 3) Create the database

```bash
mysql -u root -p
CREATE DATABASE techelevatex;
```

Then load the schema:

```bash
mysql -u root -p techelevatex < sql/schema.sql
```

### 4) Run the app

```bash
npm start
```

Visit `http://localhost:3000`.

## Panels & Roles

- **Admin Panel** (`/admin`): manage users, workers, site settings, and logs.
- **Worker Panel** (`/worker`): manage assigned tasks only.
- **User Panel** (`/dashboard`): profile management, language preference, and resources.

## Language System

- Default language is English.
- Auto-detection uses the browser `Accept-Language` header.
- Users can override language in their profile or from the footer selector.

## Security Highlights

- Passwords hashed with bcrypt.
- JWT stored in HTTP-only cookies.
- CSRF protection on forms.
- Input validation and sanitization with `express-validator`.
- Role-based access control for panels.

## Deployment (Cloud)

1. Provision a Node.js host (AWS EC2, DigitalOcean, Render, Railway, etc.).
2. Set the same `.env` variables in your hosting dashboard.
3. Use a managed MySQL instance or provision your own.
4. Run migrations using `sql/schema.sql`.
5. Start the server with `npm start`.

### Example PM2 setup

```bash
npm install -g pm2
pm2 start src/server.js --name techelevatex
pm2 save
```

## Project Structure

```
.
├── locales/            # Language packs
├── public/             # Static assets
├── sql/                # Database schema
└── src/
    ├── middleware/     # Auth and language helpers
    ├── routes/         # Express routes
    └── views/          # EJS templates
```

## Notes

- For a production setup, enable HTTPS and set `NODE_ENV=production` to enforce secure cookies.
- Create your first admin by updating the role in the database or using the admin role update form after registering.
