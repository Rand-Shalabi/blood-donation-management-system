-- Create bdms database
CREATE DATABASE IF NOT EXISTS bdms;
USE bdms;

-- Create user table
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    created_at DATE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','donor') NOT NULL
);

-- Create donor table
CREATE TABLE donor (
    donor_id INT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    photo VARCHAR(255),
    phone VARCHAR(20),
    gender ENUM('male','female') NOT NULL,
    blood_type VARCHAR(3) NOT NULL,
    last_donation DATE,
    donations INT DEFAULT 0,
    FOREIGN KEY (donor_id) REFERENCES user(id)
);

-- Seed admin account with hashed password
INSERT INTO user (created_at, email, password, role)
VALUES(CURDATE(), 'admin@example.com', '$2y$10$aJ3ltFpL0cig3b0PPWzLduIi1zCuXADQz8FjWAGzoRYsr3zKdfk/K', 'admin');
