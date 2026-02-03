CREATE TABLE users (
  uid VARCHAR(32) PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(190) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin', 'worker', 'user') DEFAULT 'user',
  language VARCHAR(5) DEFAULT 'en',
  photo_url VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE workers (
  worker_id INT AUTO_INCREMENT PRIMARY KEY,
  user_uid VARCHAR(32) NOT NULL,
  assigned_tasks TEXT NOT NULL,
  status ENUM('active', 'paused', 'completed') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_worker_user FOREIGN KEY (user_uid) REFERENCES users(uid) ON DELETE CASCADE
);

CREATE TABLE admin_logs (
  log_id INT AUTO_INCREMENT PRIMARY KEY,
  admin_uid VARCHAR(32) NOT NULL,
  action VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_admin_user FOREIGN KEY (admin_uid) REFERENCES users(uid) ON DELETE CASCADE
);
