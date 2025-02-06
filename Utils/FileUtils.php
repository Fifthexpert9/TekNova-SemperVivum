<?php
namespace Utils;

class FileUtils
{
    /**
     * Gets the filename from a full path.
     * @param string $path - The full file path
     * @return string - The filename with extension
     */
    public static function getFilename($path)
    {
        return pathinfo($path, PATHINFO_BASENAME);
    }

    /**
     * Deletes a file if it exists.
     * @param string $path - The file path to delete
     */
    public static function delete($path)
    {
        if (!file_exists($path)) {
            return;
        }

        unlink($path);
    }

    /**
     * Moves an uploaded file to the designated directory and returns its new path.
     * @param array $file - The uploaded file from $_FILES
     * @param string $directory - The directory to move the file into
     * @return string|null - The new file path or null on failure
     */
    public static function moveUploadedFile($file, $directory)
    {
        if (!isset($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = uniqid('product_', true) . '.' . $fileExtension;
        $filePath = rtrim($directory, '/') . '/' . $fileName;

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return $filePath;
        }

        return null;
    }
}
