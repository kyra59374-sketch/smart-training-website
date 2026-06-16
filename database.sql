CREATE DATABASE IF NOT EXISTS smart_training;
USE smart_training;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('student','admin') DEFAULT 'student',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(120) NOT NULL,
    category VARCHAR(80) NOT NULL,
    duration VARCHAR(80) NOT NULL,
    price DECIMAL(8,2) NOT NULL,
    description TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS instructors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    role VARCHAR(100) NOT NULL,
    details TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_id INT NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

INSERT INTO users (full_name, email, password, role)
VALUES ('Admin User', 'admin@smart.com', 'admin123', 'admin')
ON DUPLICATE KEY UPDATE email=email;
-- Admin password: admin123

INSERT INTO courses (title, category, duration, price, description) VALUES
('6-Week Web Development Bootcamp','Web Development','6 weeks - 2 sessions per week',300,'Learn HTML, CSS, JavaScript, PHP and MySQL to build websites.'),
('Data Analysis Fundamentals','Data Science','8 weeks',350,'Learn basic data analysis skills using practical examples.'),
('Cybersecurity Essentials','Cybersecurity','6 weeks',320,'Learn security basics, threats, protection methods and safe practices.'),
('Cloud Computing Workshop','Cloud Computing','4 weeks',280,'Learn cloud concepts and basic deployment ideas.'),
('Private Training Session','Personal Training','One hour',40,'One-to-one training with a professional instructor.'),
('Student Package','Training Package','Flexible',100,'Discounted training package for university students.');

INSERT INTO instructors (name, role, details) VALUES
('Dr. Ahmad Khalil','Head Training Instructor','PhD in Computer Science with 10 years teaching experience.'),
('Lina Haddad','Web Development Instructor','Full-stack developer with MSc in Software Engineering.'),
('Omar Nasser','Data Science Instructor','Data scientist with MSc in Artificial Intelligence.'),
('Rana Majed','Cybersecurity Instructor','Certified Ethical Hacker and CISSP holder.'),
('Sami Qattan','Cloud Computing Instructor','AWS Certified Solutions Architect.'),
('Noor Salim','Career Coach','Specialises in IT career development.');
