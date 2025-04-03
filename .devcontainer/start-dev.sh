#!/bin/bash

# This script runs the development server and sets up additional services

# Start Apache in the background
sudo service apache2 start

# Install dependencies if not already installed
if [ ! -d "vendor" ]; then
    echo "Installing Composer dependencies..."
    composer install
fi

if [ ! -d "node_modules" ]; then
    echo "Installing NPM dependencies..."
    npm install
fi

# Run database migrations
php artisan migrate

# Start the Vite development server
npm run dev
