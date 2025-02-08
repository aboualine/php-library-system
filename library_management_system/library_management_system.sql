CREATE DATABASE library_management_system;
USE library_management_system;

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    isbn VARCHAR(20) NOT NULL UNIQUE,
    genre VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    type ENUM('borrow', 'return') NOT NULL,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    due_date DATE NOT NULL,
    returned_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);

INSERT INTO books (title, author, isbn, genre, quantity) VALUES
('The Great Gatsby', 'F. Scott Fitzgerald', '9780743273565', 'Fiction', 5),
('To Kill a Mockingbird', 'Harper Lee', '9780061120084', 'Fiction', 3),
('1984', 'George Orwell', '9780451524935', 'Dystopian', 7);

INSERT INTO users (name, email, password, role) VALUES
('John Doe', 'john@example.com', 'hashedpassword123', 'user'),
('Jane Smith', 'jane@example.com', 'hashedpassword456', 'admin');

INSERT INTO transactions (user_id, book_id, type, due_date) VALUES
(1, 1, 'borrow', '2023-12-15'),
(2, 2, 'borrow', '2023-12-20');