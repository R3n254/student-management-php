# Student Management System (PHP)

A secure, full-stack relational CRUD web application built with PHP, MySQL, and Bootstrap 5.

## Features
- **Relational Database:** Links students to specific majors using foreign keys.
- **Secure Authentication:** Password hashing (`password_verify`, `password_hash`) and session management.
- **Role-Based Access Control (RBAC):** Restricts administrative actions and sensitive pages (like user management and record deletion) exclusively to admins using server-side guards.
- **Security Defenses:** Prepared statements to prevent SQL Injection and `htmlspecialchars()` output escaping to mitigate XSS vulnerabilities.
- **Responsive UI:** Styled cleanly with Bootstrap 5.

## Tech Stack
- **Backend:** PHP 8.2
- **Database:** MySQL / MariaDB (via XAMPP)
- **Frontend:** HTML5, Bootstrap 5

## Setup Instructions

1. Clone or download this repository into your local server directory (e.g., `C:\xampp\htdocs\studentPHP`).
2. Start **Apache** and **MySQL** via the XAMPP Control Panel.
3. Create a MySQL database named `db_school` and import the schema below using phpMyAdmin (`http://localhost/phpmyadmin/`).
4. Open your browser and navigate to:
   `http://localhost/studentPHP/index.php`

## Database Schema

```sql
CREATE DATABASE db_school;
USE db_school;

CREATE TABLE majors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO majors (name) VALUES ('Informatics'), ('Information Systems'), ('Computer Science');

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    name VARCHAR(100) NOT NULL,
    major_id INT NOT NULL,
    CONSTRAINT fk_students_major FOREIGN KEY (major_id) REFERENCES majors(id) ON DELETE RESTRICT
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff') NOT NULL DEFAULT 'staff'
);
