# Library Management System

A **Library Management System** built using PHP, MySQL, HTML, CSS, JavaScript, and Bootstrap. This system allows users to manage books, borrow and return books, and search for books in the library.

## Features

### Book Management
- Add new books with details like **title, author, ISBN, genre, and quantity**.
- View all books in a table.
- Delete books from the library.

### User Management
- Register and log in as a **user** or **admin**.
- Admins can manage books and users.

### Transaction Management
- Borrow and return books.
- Track due dates and overdue books.

### Search Functionality
- Search for books by **title, author, or ISBN**.

### Responsive Design
- Built with **Bootstrap** for a modern and responsive UI.

## Technologies Used

### Frontend
- **HTML, CSS, JavaScript**
- **Bootstrap** (for styling)

### Backend
- **PHP** (for server-side logic)
- **MySQL** (for database management)

### Tools
- **XAMPP** (for local server setup)
- **Git** (for version control)

## Setup Instructions

### Prerequisites
- XAMPP (or any local server like WAMP/MAMP).
- MySQL database.
- Git (optional, for cloning the repository).

### Steps to Run the Project

#### Clone the Repository
```bash
git clone https://github.com/aboualine/library-management-system.git
cd library-management-system
```

#### Set Up the Database
1. Open **phpMyAdmin** (or any MySQL client).
2. Create a new database named **library_management_system**.
3. Import the SQL file (**database.sql**) located in the `sql/` directory.

#### Configure the Project
Open the `config.php` file and update the database credentials:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'library_management_system');
```

#### Run the Project
1. Move the project folder to the `htdocs` directory of your **XAMPP** installation.
2. Start **Apache** and **MySQL** from the XAMPP Control Panel.
3. Open your browser and navigate to:
```bash
http://localhost/library-management-system/
```

## Project Structure
```
library-management-system/
│
├── index.php           # Homepage (View Books)
├── add_book.php        # Add a new book
├── delete_book.php     # Delete a book
├── search_book.php     # Search for a book
├── login.php           # User login
├── register.php        # User registration
├── config.php          # Database configuration
├── styles.css          # Custom CSS
├── script.js           # Custom JavaScript
├── sql/
│   └── database.sql    # SQL dump for the database
└── README.md           # Project documentation
```

## Usage

### 1. Add a Book
- Navigate to `add_book.php`.
- Fill out the form with book details (**title, author, ISBN, genre, quantity**).
- Click **Add Book**.

### 2. View Books
- Go to `index.php`.
- All books will be displayed in a table.

### 3. Search Books
- Go to `search_book.php`.
- Enter a search query (**title, author, or ISBN**).
- Matching books will be displayed.

### 4. Borrow a Book
- Log in as a **user**.
- Go to `index.php`.
- Click **Borrow** next to the book you want to borrow.

### 5. Return a Book
- Log in as a **user**.
- Go to `index.php`.
- Click **Return** next to the book you want to return.

## Screenshots

### Homepage (View Books)

![image](https://github.com/user-attachments/assets/11748d7d-39b4-4d2c-b744-ec3ec56f4554)


### Add a Book

![image](https://github.com/user-attachments/assets/2adb4dc2-17ae-45d6-848b-2ae0e3e9bbab)

### Search Books

![image](https://github.com/user-attachments/assets/1979f5e3-4135-43fd-bb74-25aad235f26b)

## Contributing

Contributions are welcome! Follow these steps:

1. **Fork** the repository.
2. Create a new branch:
```bash
git checkout -b feature/your-feature-name
```
3. Commit your changes:
```bash
git commit -m "Add your message here"
```
4. Push to the branch:
```bash
git push origin feature/your-feature-name
```
5. Open a **pull request**.

## License

This project is licensed under the **MIT License**. See the `LICENSE` file for details.

## Acknowledgments
- **Bootstrap** for the responsive design.
- **PHP and MySQL** for backend functionality.
- **GitHub** for hosting the repository.

## Contact

For any questions or feedback, feel free to reach out:

📧 Email: [mohamedaboualine@example.com](mailto:mohamedaboualine@example.com)

🐙 GitHub: [aboualine](https://github.com/aboualine)

