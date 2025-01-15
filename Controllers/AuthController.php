<?php

namespace Controllers;

use Constants\Routes;
use Controllers\UserController;
use Core\Auth;
use Core\ErrorManager;

use Core\Session;
use Exception;
use InvalidArgumentException;
use Utils\ValidationUtils;
use Utils\WebUtils;

class AuthController extends Controller
{
    public static function loginView()
    {
        $error = ErrorManager::getError();
        return self::view('auth/login.view', ['error' => $error]);
    }

    public static function registerView()
    {
        $error = ErrorManager::getError();
        return self::view('auth/register.view', ['error' => $error]);
    }

    public static function login()
    {
        try {
            $data = [
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? ''
            ];

            if (empty($data['email']) || empty($data['password'])) {
                throw new InvalidArgumentException('Todos los campos son obligatorios.');
            }

            if (!ValidationUtils::validateEmail($data['email'])) {
                throw new InvalidArgumentException('El correo electrónico no es válido.');
            }

            $email = $data['email'];
            $password = $data['password'];

            $user = UserController::findByEmail($email);

            if (!$user) {
                throw new InvalidArgumentException('El correo electrónico no está registrado.');
            }

            if (!$user->verifyPassword($password)) {
                throw new InvalidArgumentException('La contraseña es incorrecta.');
            }

            Auth::login($user->getId(), $user->getRole());
            WebUtils::redirect(Routes::HOME);
        } catch (Exception $e) {
            ErrorManager::setError($e->getMessage());
            WebUtils::redirect(Routes::LOGIN);
        }
    }

    public static function register()
    {
        try {
            $data = [
                'first_name' => $_POST['first-name'] ?? '',
                'last_name' => $_POST['last-name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? ''
            ];

            if (empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || empty($data['password'])) {
                throw new InvalidArgumentException('Todos los campos son obligatorios.');
            }

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException('El correo electrónico no es válido.');
            }

            if (UserController::findByEmail($data['email'])) {
                throw new InvalidArgumentException('El correo electrónico ya está en uso.');
            }

            if (!UserController::create($data)) {
                throw new \RuntimeException('No se pudo registrar al usuario. Inténtalo de nuevo más tarde.');
            }

            WebUtils::redirect(Routes::LOGIN);
        } catch (Exception $e) {
            ErrorManager::setError($e->getMessage());
            WebUtils::redirect(Routes::REGISTER);
        }
    }

    public static function logout()
    {
        Auth::logout();
        WebUtils::redirect(Routes::LOGIN);
    }
}
