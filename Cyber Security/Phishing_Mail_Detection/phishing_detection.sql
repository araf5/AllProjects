-- Create the database
CREATE DATABASE IF NOT EXISTS phishing_detection;

-- Use the created database
USE phishing_detection;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create the admin table
CREATE TABLE IF NOT EXISTS admin (
    username VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL
);

-- Create the phishing_keywords table
CREATE TABLE IF NOT EXISTS phishing_keywords (
    id INT PRIMARY KEY,
    keyword VARCHAR(255) NOT NULL
);

-- Create the sent_messages table
CREATE TABLE IF NOT EXISTS sent_messages (
    id INT PRIMARY KEY,
    sender_id INT NOT NULL,
    to_id INT NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES users(id),
    FOREIGN KEY (to_id) REFERENCES users(id)
);

-- Create the received_messages table
CREATE TABLE IF NOT EXISTS received_messages (
    id INT PRIMARY KEY,
    sender_id INT NOT NULL,
    to_id INT NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES users(id),
    FOREIGN KEY (to_id) REFERENCES users(id)
);

-- Insert data into tables
INSERT INTO admin (username, password) VALUES ('admin', 'admin');

INSERT INTO users (id, username, email, password) VALUES
(121, 'arafat', 'arafat@gmail.com', 'a1122'),
(122, 'ayan', 'ayan@gmail.com', 'i1122'),
(123, 'umme', 'umme@gmail.com', 'u1122');

INSERT INTO phishing_keywords (id, keyword) VALUES
(1, 'kill'),
(2, 'shoot'),
(3, 'exhort');
