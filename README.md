
```markdown
# News Site Project

This is a dynamic **News Site** built using PHP that allows users to manage news articles with features like adding, updating, and deleting posts. The site is designed to provide an interactive experience with a robust CRUD functionality.

---

## Features

### User Management
- **Login/Logout System**: Secure login and logout functionality for users.
- Manage user accounts for site access.

### Post Management
- **Add New Posts**: Add news articles with images and categories.
- **Update Posts**: Edit existing news articles.
- **Delete Posts**: Remove unwanted news articles.

### Category Management
- Add, update, and delete categories for better organization.

### Additional Features
- Fully functional CRUD (Create, Read, Update, Delete) operations for all sections.
- Interactive user interface with real-time validations and feedback.

---

## Technology Stack

### Backend:
- **PHP**: Core language for dynamic content rendering and database interactions.

### Frontend:
- **HTML/CSS**: For structure and styling.
- **JavaScript**: For enhanced interactivity.

### Database:
- **MySQL**: Used to store and manage user, post, and category data.

---

## Setup and Installation

### Prerequisites
- A web server (e.g., Apache with XAMPP or WAMP).
- PHP installed (version 7.4 or later recommended).
- MySQL database server.
- Git (for version control).

### Steps to Run
1. Clone the repository:
   ```bash
   git clone https://github.com/mukeshyadav024/news-blog.git
   ```
2. Move the project to your web server's root directory (e.g., `htdocs` for XAMPP).
3. Import the database:
   - Open `phpMyAdmin` and create a new database (e.g., `news_site`).
   - Import the `news_site.sql` file provided in the repository.
4. Update the `config.php` file:
   - Set your database credentials:
     ```php
     $hostname = "http://localhost";
     $conn = mysqli_connect("localhost", "root", "", "news_site");
     ```
5. Start the server and access the project at:
   ```
   http://localhost/news-blog
   ```

---

## Project Structure
```
├── admin/
│   ├── add-user.php
│   ├── post.php
│   ├── category.php
│   ├── login.php
│   ├── logout.php
├── config.php
├── upload/
│   ├── (Uploaded images stored here)
├── index.php
├── README.md
```

---


## Screenshots
_(Add screenshots here of the user interface for better documentation)_

---

## License
This project is open-source and
