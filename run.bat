@echo off
SET SERVER_URL=localhost:8080

SET UPLOADS_FOLDER=uploads
SET FOLDERS="%UPLOADS_FOLDER%\products"

echo Creating necessary folders...
if not exist "%UPLOADS_FOLDER%" mkdir "%UPLOADS_FOLDER%"

for %%i in (%FOLDERS%) do (
    if not exist "%%~i" mkdir "%%~i"
)

echo Starting the server...
php -S %SERVER_URL%
