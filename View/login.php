<?php

require_once '../vendor/autoload.php';

use Controller\UserController;

$userController = new UserController();
$loginMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($userController->login($email, $password)) {
        header('Location: View/home.php');
        exit();
    } else {
        $loginMessage = "Email ou senha incorretos.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamersVault</title>
    <link rel="stylesheet" href="../templates/assets/css/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <header>
        <img src="../images/Novo Projeto.png" alt="">
        <img id="nomelogo" src="../images/nomelogo.png" alt="">
        <button id="btn_register">Registrar</button>
        <button id="btn_login">Login</button>
    </header>

    <main>

        <div class="login-div">
            <h1>Login</h1>

            <form action="" method="post">
                <label id="userEmail" for="email">
                    <i class="bi bi-envelope-at"></i>
                    <input type="email" id="email" autocomplete="username" placeholder="Email" required>
                </label>

                <label id="userPassword" for="password">
                    <i class="bi bi-key"></i>
                    <input type="password" id="password" autocomplete="current-password" placeholder="Senha" required>
                </label>
                <button id="btn_entrar" type="submit">ENTRAR</button>
                Não tem uma conta?
                <a href="register.php">Registre-se</a>
            </form>
        </div>

    </main>


</body>

<footer>
    <p>© 2025 GAMERSVAULT. Todos os direitos reservados.</p>
</footer>

</html>