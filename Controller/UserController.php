<?php

namespace Controller;

use Model\User;
// use Exception;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    // REGISTRO DE USUÁRIO
    public function createUser($username, $email, $password)
    {

        if (empty($username) or empty($email) or empty($password)) {
            return false;
        }

        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        return $this->userModel->registerUser($username, $email, $password);

    }

    // E-MAIL JÁ CADASTRADO?
    public function checkUserByEmail($email)
    {
        return $this->userModel->getUserByEmail($email);
    }

    // LOGIN DE USUÁRIO
    public function login($email, $password)
    {
        $user = $this->userModel->getUserByEmail($email);

        /**
         * $user = [
         *    "id" => 1,
         *    "username" => "Teste",
         *    "email" => "teste@example.com",
         *    "password" => "$2y$10$19ujCfISbUFtFqPRJx9PN.G8fGcqNCkWTnitJpMOdJZ0x6TYL6EzC",
         *    ...
         * ]
         */
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            // var_dump($user);
            return true;
        }
        return false;
    }

    // USUÁRIO LOGADO?
    public function isLoggedIn()
    {
        return isset($_SESSION['id']);
    }

    // CHECAR SE O USUÁRIO É ADMIN
    public function isAdmin()
    {
        if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) {
            return true;
        }
        return false;
    }

    // RESGATAR DADOS DO USUÁRIO
    public function getUserData($id, $username, $email, $is_admin)
    {
        return $this->userModel->getUserInfo($id, $username, $email, $is_admin);
    }
}

?>