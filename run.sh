#!/bin/bash

SERVER_URL="localhost:8080"

UPLOADS_FOLDER="uploads"
FOLDERS=("$UPLOADS_FOLDER/products")

echo "Creating necessary folders..."
mkdir -p "$UPLOADS_FOLDER"

for folder in "${FOLDERS[@]}"; do
    mkdir -p "$folder"
done

echo "Starting the server..."
php -S "$SERVER_URL"
