@echo off

SET SERVER_URL=localhost:8080
SET UPLOADS_FOLDER=uploads

echo "Creating necessary folders..."
if not exist %UPLOADS_FOLDER% mkdir %UPLOADS_FOLDER%

echo "Starting the server..."
C:\xampp\php\php.exe -S %SERVER_URL%