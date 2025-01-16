#!/bin/bash

SERVER_URL="localhost:8080"
UPLOADS_FOLDER="uploads"

echo "Creating necessary folders..."
mkdir -p "$UPLOADS_FOLDER"

echo "Starting the server..."
php -S "$SERVER_URL"