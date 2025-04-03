#!/bin/bash

# This script initializes the Laravel project in GitHub Codespaces

echo "Initializing Laravel Sail environment in GitHub Codespaces..."

# Make sure .env file exists
if [ ! -f .env ]; then
  echo "Creating .env file..."
  cp .env.example .env || echo "Error: .env.example not found"
fi

# Install Composer dependencies if not already installed
if [ ! -d "vendor" ]; then
  echo "Installing Composer dependencies..."
  composer install
else
  echo "Composer dependencies already installed."
fi

# Install NPM dependencies if not already installed
if [ ! -d "node_modules" ]; then
  echo "Installing NPM dependencies..."
  npm install
else
  echo "NPM dependencies already installed."
fi

# Generate application key if not already set
if grep -q "APP_KEY=base64:" .env; then
  echo "Application key already set."
else
  echo "Generating application key..."
  php artisan key:generate
fi

# Set up the sail alias
source .devcontainer/sail-alias.sh

echo "Environment setup complete! Use 'sail up -d' to start the containers."
