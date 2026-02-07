# Techelevatex

Professional website and portal platform for technology branding, exam panel management, workflow optimization, and Hindi-first educational resources.

## Features
- Public marketing site (home, about, services, resources, contact).
- Full authentication system with UID generation.
- Role-based dashboards for Admin, Worker, and User panels.
- Language auto-detection with manual preferences.
- CSRF protection, validation, and password hashing.
- Modular Express code structure.

## Tech Stack
- **Backend:** Node.js + Express
- **Frontend:** HTML5, CSS3, vanilla JavaScript (EJS templating)
- **Database:** MySQL (schema included)

## Getting Started

### 1. Install dependencies
```bash
npm install
```

### 2. Configure environment
Copy `.env.example` to `.env` and update database credentials.

### 3. Provision database
Run the SQL schema:
```bash
mysql -u root -p < db/schema.sql
```

### 4. Start the server
```bash
npm run dev
```
The site will be available at `http://localhost:3000`.

## Admin Setup
Create an admin user in the database, or register a user and update their role to `admin`.

## Deployment
See [docs/DEPLOYMENT.md](docs/DEPLOYMENT.md) for cloud deployment guidance.

## Project Structure
```
src/
  controllers/
  middleware/
  routes/
  services/
public/
  css/
  js/
views/
  pages/
  partials/
lang/
  en.json
  hi.json
```
