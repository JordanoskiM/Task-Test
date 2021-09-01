<p align="center"><a href="#" target="_blank"><img src="/public/img/logo/logo_VERTICAL_COLOR_400x400.png" width="400"></a></p>

## About Test Task

Simple subscription platform in which users can subscribe to websites

### Requirements 
This project is using Laravel version 8.56.0 and PHP version 7.3.0

### Prerequisites

Before you continue, ensure you have met the following requirements:

* You have installed Apache
* You have installed XAMPP or LAMP
* You have installed Laravel

### Install all the dependencies using composer
composer install

### Copy the example env file and make the required configuration changes in the .env file
cp .env.example .env

### Generate a new application key
php artisan key:generate

### Run the database migrations (Set the database connection in .env before migrating)
php artisan migrate

### Run the database seeders
php artisan db:seed

### Start the local development server
php artisan serve

## How to use

### Dashboard
* You can log in with one of the credentials in the seeders or you can register as a new user
* Visit the /dashboard and you can create a new websites
* Inside the website you can create new posts
* You can edit and delete websites and posts

### Home page
* On the Home page, everyone can see all the websites and their posts
* Everyone can subscribe to a website
* When new post is created, the subscriber will receive an email with post title and description
* In the email there is an option to view the new created post
* Subscriber can unsubscribe using the unsubscribe button from email that was sent

## Emails testing
* To test the emails, you can login to the MailTrap and find the credentials inside => Inboxes -> Demo inbox
* Change the API credentials in .env file for MailTrap  
