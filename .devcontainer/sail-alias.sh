#!/bin/bash

# This script sets up the sail alias in the Codespace environment

echo "Setting up sail alias..."

# Create a .bashrc if it doesn't exist
touch ~/.bashrc

# Add sail alias to the user's bashrc if it doesn't exist already
if ! grep -q "alias sail=" ~/.bashrc; then
  echo 'alias sail="[ -f sail ] && sh sail || sh vendor/bin/sail"' >> ~/.bashrc
  echo "sail alias added to .bashrc"
fi

# Source the bashrc to make the alias available immediately
source ~/.bashrc

echo "You can now use the 'sail' command in your terminal."
echo "Try 'sail up -d' to start the environment."
