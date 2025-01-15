<?php

namespace Controllers;

use Core\Database;
use Models\User;
use PDOException;
use RuntimeException;

/**
 * Handles user-related operations.
 * @package Controllers
 */
class UserController extends Controller
{
    /**
     * Registers a new user and stores it in the database.
     * @param array $data - The data of the user to be registered.
     * @return bool - `true` if the user was successfully registered, `false` otherwise.
     */
    public static function create($data)
    {
        $newData = $data;
        $newData['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $user = User::fromArray($newData);

        try {
            $sql = 'INSERT INTO users (first_name, last_name, email, password) VALUES
                (:first_name, :last_name, :email, :password)';

            return Database::insert($sql, [
                ':first_name' => $user->getFirstName(),
                ':last_name' => $user->getLastName(),
                ':email' => $user->getEmail(),
                ':password' => $user->getPassword()
            ]);
        } catch (PDOException $e) {
            throw new RuntimeException('Database error: ' . $e->getMessage());
        }
    }

    /**
     * Retrieves a user from the database by their email.
     * @param string $email - The email of the user to be retrieved.
     * @return ?User User|null - The user if found, `null` otherwise.
     */
    public static function findByEmail($email)
    {
        try {
            $sql = 'SELECT id, first_name, last_name, email, password, role, created_at, updated_at FROM users WHERE email = :email';

            $result = Database::fetch($sql, [':email' => $email]);

            if (empty($result)) {
                return null;
            }

            return User::fromArray($result);
        } catch (PDOException $e) {
            throw new RuntimeException('Database error: ' . $e->getMessage());
        }
    }

    /**
     * Retrieves a user from the database by their ID.
     * @param int $userId - The ID of the user to be retrieved.
     * @return ?User User|null - The user if found, `null` otherwise.
     */
    public static function findById($userId)
    {
        try {
            $sql = 'SELECT id, first_name, last_name, email, password, role, created_at, updated_at FROM users WHERE id = :id';

            $result = Database::fetch($sql, [':id' => $userId]);

            if (empty($result)) {
                return null;
            }

            return User::fromArray($result);
        } catch (PDOException $e) {
            throw new RuntimeException('Database error: ' . $e->getMessage());
        }
    }
}