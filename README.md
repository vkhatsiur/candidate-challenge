Following application built using Laravel and Livewire. It allows users to create, delete, view, and search listings with features like status management (draft or published).

## Features

- **Create Listing Page**: Users can create listings with a title, description, price, category, and currency.
- **Listing Detail Page**: Displays detailed information about a specific listing.
- **Listing Search Page**: Search by title or category.
- **Simple auth**: Only authorized user can create/delete a own listing.

## Installation

To get started with this project follow the next steps below:

### 1. Clone the repository
```bash
git https://github.com/vkhatsiur/candidate-challenge.git
cd candidate-challenge
```

### 2. Install dependencies
```bash
composer install
```

### 3. Set up the database
```bash
php artisan migrate
php artisan db:seed
```