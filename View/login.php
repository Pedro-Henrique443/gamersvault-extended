<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamersVault</title>
    <link rel="stylesheet" href="../templates/assets/css/login.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body style="background-image: url('../images/fundo.png');">

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
            <h3>Email</h3>
                <label id="userEmail" for="email">
                    <input type="email" id="email" autocomplete="username" placeholder="Email">
                    <i></i>
                </label>
                <h3>Senha</h3>
                <label id="userPassword" for="password">
                    <input type="password" id="password" autocomplete="current-password" placeholder="Senha">
                    <i></i>
                </label>
            <button id="btn_entrar" type="submit">ENTRAR</button>
            <div class="form-footer">
                Não tem uma conta?
                <a href="#">Registre-se</a>
        </form>
    </div>

</main>


</body>

<footer>
    <p>© 2025 GAMERSVAULT. Todos os direitos reservados.</p>
</footer>

</html>