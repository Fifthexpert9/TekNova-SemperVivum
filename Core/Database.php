<?php

namespace Core;

use PDO;
use PDOStatement;

/**
 * Handles the connection to the database and provides methods for querying the database.
 * Modify the `HOST`, `DB_NAME`, `USERNAME`, and `PASSWORD` constants to match your database configuration.
 * By default, the configuration is set to connect to a MySQL database that uses XAMPP's default settings.
 * @package Core
 */
class Database
{
    private const HOST = "localhost";
    private const DB_NAME = "sempervivum";
    private const USERNAME = "root";
    private const PASSWORD = "";

    private static $conn = null;

    private function __construct() {}

    /**
     * Creates a connection to the database if it doesn't exist; otherwise, returns the existing connection.
     * @return PDO|null
     */
    public static function getConnection()
    {
        if (self::$conn == null) {
            self::$conn = new PDO(
                "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME,
                self::USERNAME,
                self::PASSWORD
            );

            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }

        return self::$conn;
    }

    /**
     * Queries the database with the given SQL statement and parameters.
     * @param $sql - The SQL statement to execute.
     * @param $params - The parameters to bind to the SQL statement.
     * @return false|PDOStatement - The PDOStatement object.
     */
    public static function query($sql, $params = [])
    {
        $stmt = self::getConnection()->prepare($sql);
        $stmt->execute($params);

        return $stmt;
    }

    /**
     * Executes an INSERT statement on the database.
     * @param $sql - The SQL statement to execute.
     * @param $params - The parameters to bind to the SQL statement.
     * @return bool - Whether the INSERT statement was successful.
     */
    public static function insert($sql, $params = [])
    {
        $stmt = self::getConnection()->prepare($sql);
        $stmt->execute($params);

        return $stmt->rowCount() > 0;
    }

    /**
     * Fetches the first row from the result set.
     * @param $sql - The SQL statement to execute.
     * @param $params - The parameters to bind to the SQL statement.
     * @return mixed - The first row from the result set.
     */
    public static function fetch($sql, $params = [])
    {
        return self::query($sql, $params)->fetch();
    }

    /**
     * Same as `fetch` but returns all rows from the result set.
     * @param $sql - The SQL statement to execute.
     * @param $params - The parameters to bind to the SQL statement.
     * @return array|false - All rows from the result set.
     * @see fetch
     */
    public static function fetchAll($sql, $params = [])
    {
        return self::query($sql, $params)->fetchAll();
    }

    /**
     * Returns the last inserted ID.
     * @return false|string - The last inserted ID.
     */
    public static function lastInsertId()
    {
        return self::getConnection()->lastInsertId();
    }

    /**
     * Begins a transaction.
     * @return bool - Whether the transaction was started successfully.
     */
    public static function beginTransaction()
    {
        return self::getConnection()->beginTransaction();
    }

    /**
     * Commits a transaction.
     * @return bool - Whether the transaction was committed successfully.
     */
    public static function commit()
    {
        return self::getConnection()->commit();
    }

    /**
     * Rolls back a transaction.
     * @return bool - Whether the transaction was rolled back successfully.
     */
    public static function rollback()
    {
        return self::getConnection()->rollback();
    }

    /**
     * Closes the connection to the database.
     * @return void
     */
    public static function close()
    {
        self::$conn = null;
    }
}