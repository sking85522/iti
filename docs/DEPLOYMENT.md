# Deployment Guide

## Local Deployment
1. Install Node.js 18+ and MySQL 8+.
2. Run `npm install`.
3. Configure `.env` using `.env.example`.
4. Apply the schema: `mysql -u root -p < db/schema.sql`.
5. Start the app: `npm start`.

## Cloud Deployment (Example: Ubuntu VM)
1. Provision a VM with Node.js and MySQL.
2. Clone the repository.
3. Run `npm install`.
4. Set environment variables in a `.env` file or a secrets manager.
5. Create the database and apply the schema.
6. Use a process manager like PM2:
   ```bash
   npm install -g pm2
   pm2 start src/app.js --name techelevatex
   pm2 save
   ```
7. Configure Nginx as a reverse proxy:
   ```nginx
   server {
     listen 80;
     server_name techelevatex.in;

     location / {
       proxy_pass http://localhost:3000;
       proxy_http_version 1.1;
       proxy_set_header Upgrade $http_upgrade;
       proxy_set_header Connection 'upgrade';
       proxy_set_header Host $host;
       proxy_cache_bypass $http_upgrade;
     }
   }
   ```
8. Enable HTTPS with Let's Encrypt.

## Database Backups
Schedule daily backups using `mysqldump` and store securely.
