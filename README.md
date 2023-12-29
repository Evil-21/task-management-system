# Task Management System

This is a simple Task Management System built with Laravel.

## Features

* Create, read, update, and delete tasks
* Filter tasks by date and status
* Mark tasks as completed or not completed
* View task details

## Getting Started

These instructions will help you set up and run the Task Management System on your local machine.

### Prerequisites

* [Composer](https://getcomposer.org/) installed
* [PHP](https://www.php.net/) installed (recommended version: 8 or higher)
* [MySQL](https://www.mysql.com/) or another relational database of your choice

### Installation

1. Clone the repository:
   git clone https://github.com/Evil-21/task-management-system.git
2. Navigate to the project directory:
   cd the-project-folder
3. Install dependencies:
   composer install
4. Copy the `.env.example` file to `.env` and configure your database:
   cp .env.example .env
   update the database connecttion details in `.env` file
5. Generate the application key:
   php artisan key:generate
6. Run database migrations and seed data:
   php artisan migrate

### Usage

Start the development server: php artisan serve

Access the application in your browser: [http://localhost:8000]()
