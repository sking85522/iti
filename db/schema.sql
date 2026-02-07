CREATE DATABASE IF NOT EXISTS techelevatex;
USE techelevatex;

CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  uid VARCHAR(32) NOT NULL UNIQUE,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin', 'worker', 'user') NOT NULL DEFAULT 'user',
  language VARCHAR(10) NOT NULL DEFAULT 'en',
  photo_url VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE workers (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  assigned_tasks TEXT,
  status ENUM('active', 'paused', 'completed') NOT NULL DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_workers_user
    FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE
);

CREATE TABLE admin_logs (
  id INT PRIMARY KEY AUTO_INCREMENT,
  admin_user_id INT NOT NULL,
  action VARCHAR(255) NOT NULL,
  metadata JSON NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_admin_logs_user
    FOREIGN KEY (admin_user_id) REFERENCES users(id)
    ON DELETE CASCADE
);

CREATE TABLE site_settings (
  id INT PRIMARY KEY AUTO_INCREMENT,
  key_name VARCHAR(80) NOT NULL UNIQUE,
  value_text TEXT NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO site_settings (key_name, value_text)
VALUES
  ('site_name', 'Techelevatex'),
  ('default_language', 'en');
