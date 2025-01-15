<?php

namespace Controllers;

use Core\Database;
use Models\User;
use PDOException;
use RuntimeException;

class UserController extends Controller
{
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