# Library management

Welcome to the Library Management repository! This guide will walk you through the steps to clone this project from GitHub.

## Prerequisites

Before you begin, ensure that you have the following installed on your machine:

-   Git: [Installation Guide](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
-   Composer: [Installation Guide](https://getcomposer.org/download/)
-   NodeJs: [Installation Guide](https://nodejs.org/en/download)

For local server, you may use any of these two:

-   Xampp: [Installation Guide](https://www.apachefriends.org/download.html)
-   Wamp: [Installation Guide](https://www.wampserver.com/en/download-wampserver-64bits/)

## Clone the Project

To clone this project to your local machine, follow these steps:

1. Open your terminal or command prompt.

2. Navigate to the directory where you want to clone the project.

3. Run the following command to clone the repository:
4. `git clone https://github.com/angieM-30/library-management.git` and press Enter.
5. Wait for the cloning process to complete. Once finished, you will have a local copy of the project on your machine.

## Usage

Here are some instructions on how to use the project once it's cloned:

1. Navigate into the project directory:
2. Open the project folder via a command prompt and run the following command: `composer install` and press Enter.
3. Then, run the following command: `npm install` and press Enter.
4. Next is to copy the .env.example file: To do this, run the command: `copy .env.example .env` and press Enter.
5. After that, run this command `php artisan key:generate` and press Enter.
6. make sure your local server is running before proceeding to the next step.
7. Run the following command: `php artisan migrate --seed` to create the database. If a promt asking you to create the database, enter Yes to the terminal and press Enter.
8. To compile the project, run the command `npm run dev` and press Enter.
9. Open another terminal in the same directory, and run `php artisan serve` and press Enter. This will generate a localhost server like `http://127.0.0.1:8000` where you can copy and paste into the browser.

That's all.
