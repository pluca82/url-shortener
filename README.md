
Laravel URL Shortener
This project is a Laravel-based URL shortener application. It allows users to shorten long URLs into more manageable links. This README will guide you through the process of setting up and running the application on your local machine.

Prerequisites
PHP 7.3 or higher
Composer
Node.js and npm
MySQL
Installation
Clone the Repository
Open your terminal and navigate to the directory where you want to clone the project. Then, run the following command:

Install Dependencies
Navigate into the project directory and install the PHP dependencies using Composer:

cd laravel-url-shortener
composer install
Next, install the JavaScript dependencies and build the frontend assets:

npm install
npm run build
Environment Configuration
Copy the .env.example file to create a new .env file:

cp .env.example .env
Open the .env file and update the following variables with your local environment details:

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:QAWmD3UHD9/uGwy0zWd9dzejtMEbYy3qR8MCyMm5wHM=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=url_shortener
DB_USERNAME=root
DB_PASSWORD= password


Database Setup
Create a new MySQL database named url_shortener and update the DB_DATABASE, DB_USERNAME, and DB_PASSWORD variables in the .env file accordingly.

Then, run the following command to migrate the database:

php artisan migrate
Start the Application
To start the backend, run:
php artisan serve
To start the frontend, run:
npm run dev
The application will be accessible at http://localhost:8000.

Usage
Once the application is running, you can start using it to shorten URLs. Simply navigate to the application in your web browser, enter a long URL, and click the "Shorten" button. The application will generate a shortened URL that you can share or use as needed.
