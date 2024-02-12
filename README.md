# Laravel Project Setup

## Step 1: Clone Project From GitHub

Run the following command to clone the project from GitHub and install the dependencies:

git clone https://github.com/your-username/authentication-todo-list.git

cd authentication-todo-list

composer install


## Step 2: Set Up Database

Create a new database and update the `.env` file with your database credentials:

* DB_CONNECTION=mysql
* DB_HOST=your_database_host
* DB_PORT=your_database_port
* DB_DATABASE=your_database_name
* DB_USERNAME=your_database_username
* DB_PASSWORD=your_database_password


## Step 3: Run Migrations

Run the following command to create the necessary tables in the database:

php artisan migrate


## Note

Interfaces/: Contains interface files (UserRepository.php and ToDoRepository.php), defining the contract that repository classes must adhere to.
Eloquent/: Contains repository implementation files (UserRepositoryEloquent.php and ToDoRepositoryEloquent.php), providing concrete implementations of the interfaces using Eloquent models.
This organization segregates interfaces and implementations, making it easier to manage and understand the codebase. Additionally, it follows the principle of separation of concerns, ensuring a clear distinction between interface definitions and their concrete implementations.


app/
└── Repositories/
    ├── Interfaces/
    │   ├── UserRepository.php
    │   └── ToDoRepository.php
    ├── Eloquent/
    │   ├── UserRepositoryEloquent.php
    │   └── ToDoRepositoryEloquent.php
    └──


