# The Huran project 💩

## Introduction

This document provides step-by-step instructions to set up and run this project on a Windows 10 system. If you're new to programming or web development, don't worry! Just follow these steps carefully, and you'll have the project up and running.

## Prerequisites

Before you begin, make sure you have administrative access to your computer, as some installations may require it.

### Step 1: Install XAMPP

1. Download XAMPP from the [official website](https://www.apachefriends.org/index.html).
2. Run the installer and follow the prompts. Accept the default settings unless you have specific preferences.
3. Once installed, open the XAMPP Control Panel and start the Apache and MySQL modules by clicking the 'Start' button next to each.

### Step 2: Install Composer

1. Download Composer from the [official website](https://getcomposer.org/).
2. Run the installer and follow the prompts. Make sure to allow Composer to add to your system's PATH variable.
3. Verify the installation by opening Command Prompt and typing `composer --version`. You should see the Composer version displayed.

### Step 3: Install Git (Optional)

If you want to clone the project from GitHub, you'll need Git. If you prefer to download the project directly, you can skip this step.

1. Download Git from the [official website](https://git-scm.com/).
2. Run the installer and follow the prompts. Accept the default settings.
3. Verify the installation by opening Command Prompt and typing `git --version`. You should see the Git version displayed.

## Installation

### Step 4: Get the Project

#### Option A: Clone from GitHub (requires Git)

1. Open Command Prompt and navigate to the folder where you want the project (e.g., `cd C:\xampp\htdocs`).
2. Clone the project by running `git clone https://github.com/yourusername/yourproject.git`.

#### Option B: Download Directly

1. Download the project as a ZIP file from GitHub.
2. Extract the ZIP file to your desired location (e.g., `C:\xampp\htdocs`).

### Step 5: Install Project Dependencies

1. Open Command Prompt and navigate to the project folder (e.g., `cd C:\xampp\htdocs\yourproject`).
2. Run `composer install` to install the required dependencies.

### Step 6: Configure Environment

1. Rename the `.env.example` file to `.env`.
2. Open the `.env` file and configure your database settings (e.g., DB_HOST, DB_DATABASE, etc.) to match your XAMPP MySQL settings.

### Step 7: Set Up Database

1. Open Command Prompt and navigate to the project folder.
2. Run `php artisan migrate` to create the necessary database tables.

### Step 8: Start the Project

1. Run `php artisan serve` to start the local development server.
2. Open your web browser and navigate to [http://127.0.0.1:8000](http://127.0.0.1:8000) to view the project.

## Support

If you encounter any issues or have questions, please feel free to reach out by creating an issue on GitHub or contacting the project maintainer.

## License

Please refer to the LICENSE file for information on the project's license.

---

Happy coding!
