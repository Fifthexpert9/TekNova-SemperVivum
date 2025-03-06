@echo off

SET SERVER_URL=localhost:8080
SET UPLOADS_FOLDER=uploads uploads\products

echo "Creating necessary folders..."
for %%i in (%UPLOADS_FOLDER%) do (
    if not exist %%i mkdir %%i
)

echo "Starting the server..."
C:\xampp\php\php.exe -S %SERVER_URL%