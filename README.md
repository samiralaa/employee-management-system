# Employee Management System

A web-based Employee Management System built with Laravel, designed to manage employees, their departments, managers, and tasks. This application includes features such as employee creation, updating, viewing, and deletion, as well as the ability to assign tasks and display employee details.

## Features

- Employee CRUD (Create, Read, Update, Delete) operations
- View employee details including department and manager information
- Assign and manage employee tasks
- Search functionality to quickly find employees
- Pagination and image handling for employee records

## Requirements

- PHP >= 8.2
- Laravel >= 11
- Composer
- MySQL or any other supported database

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/samiralaa/employee-management-system
   cd employee-management-system
   ```
   2. **Install dependencies:**
   ```bash
   composer install
   ```
   3. **Copy the example environment file and make the required configuration changes:**
   ```bash
   cp .env.example .env
   ```
   4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```
   5. **Create a new database and update the database configuration in the `.env` file:**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```
   6. **Run the database migrations:**
   ```bash
   php artisan migrate
   ```
   7. **Start the local development server:**
   ```bash
   php artisan serve
   ```
   8. **Open the application in your browser:**
   ```
   http://localhost:8000
   ```
   ## to run the tests
   