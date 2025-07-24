<?php
// BUSCANDO E CARREGANDO O ARQUIVO AUTOLOAD
require_once '../vendor/autoload.php';

// IMPORTANDO O USERCONTROLLER
use Controller\UserController;

$userController = new UserController();

$registerUserMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // USO DO CONTROLLER PARA VERIFICAÇÃO DE E-MAIL E CADASTRO DE USUÁRIO

        // JÁ EXISTE UM E-MAIL CADASTRADO?
        if ($userController->checkUserByEmail($email)) {
            $registerUserMessage = "Já existe um usuário cadastrado com esse endereço de e-mail.";
        } else {
            // SE O E-MAIL JÁ EXISTE, CRIE O USUÁRIO
            if ($userController->createUser($username, $email, $password)) {
                // REDIRECIONAR PARA UMA OUTRA PÁGINA, QUANDO O USUÁRIO FOR CADASTRADO
                header('Location: ../index.php');
                exit();
            } else {
                $registerUserMessage = 'Erro ao registrar informações.';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamersVault</title>
    <link rel="stylesheet" href="../templates/assets/css/register.css">
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
            <h1>Registre-se</h1>

            <form action="" method="post">
                <label id="username" for="username">
                    <i class="bi bi-person"></i>
                    <input type="text" id="username" autocomplete="username" placeholder="Usuário" required>
                </label>

                <label id="email" for="email">
                    <i class="bi bi-envelope-at"></i>
                    <input type="email" id="email" autocomplete="email" placeholder="Email" required>
                </label>

                <label id="password" for="password">
                    <i class="bi bi-key"></i>
                    <input type="password" id="password" placeholder="Senha" required>
                </label>

                <label id="confirmPassword" for="confirmPassword">
                    <i class="bi bi-key"></i>
                    <input type="password" id="confirmPassword" placeholder="Confirme sua senha" required>
                </label>

                <button id="btn_entrar" type="submit">REGISTRAR</button>
                Já possui uma conta?
                <a href="login.php">Entrar</a>
            </form>
            <p> <?php echo $registerUserMessage; ?> </p>
        </div>

    </main>


</body>

<footer>
    <p>© 2025 GAMERSVAULT. Todos os direitos reservados.</p>
</footer>

</html>