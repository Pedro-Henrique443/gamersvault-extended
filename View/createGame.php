<?php
session_start();
// BUSCANDO E CARREGANDO O ARQUIVO AUTOLOAD
require_once '../vendor/autoload.php';

// IMPORTANDO O USERCONTROLLER
use Controller\GameController;

$gameController = new GameController();

if ($_SESSION['is_admin'] !== 1) {
    header('Location: View/login.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['game_cover'], $_POST['title'], $_POST['price'], $_POST['developer'], $_POST['publisher'])) {
        $game_cover = $_POST['game_cover'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $developer = $_POST['developer'];
        $publisher = $_POST['publisher'];

        // USO DO CONTROLLER PARA VERIFICAÇÃO DE E-MAIL E CADASTRO DE USUÁRIO
        if ($gameController->createGame($game_cover, $title, $price, $developer, $publisher)) {
            // REDIRECIONAR PARA UMA OUTRA PÁGINA, QUANDO O USUÁRIO FOR CADASTRADO
            header('Location: ../index.php');
            exit();
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
    <link rel="stylesheet" href="../templates/assets/css/createGame.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <header>
        <div class="header-left">
            <img src="../images/gamersvaultlogo.png" alt="">
            <img id="nomelogo" src="../images/nomelogo.png" alt="">

            <button id="btn_perfil">Perfil</button>
            <button id="btn_biblioteca">Biblioteca</button>
            <button id="btn_comunidade">Comunidade</button>
            <button id="btn_publicar">Publicar</button>
        </div>

        <div class="header-right">
            <button id="btn_notificacao"><i class="bi bi-bell"></i></button>
            <button id="btn_conta"><i class="bi bi-person-circle"></i></button>
        </div>
    </header>


    <main>
        <h1>Publique o seu jogo</h1>
        <div class="cadastro-game">

            <form action="" method="POST">
                <label id="game_cover" for="game_cover">
                    <figure>
                        <!-- botar imagem de pré-visualização aqui -->
                    </figure>

                    <i style="margin-left :-4.7rem" class="bi bi-key"></i>
                    <input type="text" name="game_cover" id="game_cover" placeholder="URL da Imagem de Capa" required>
                </label>
                <label id="title" for="title">
                    <i class="bi bi-person"></i>
                    <input type="text" name="title" id="title" placeholder="Título do jogo" required>
                </label>

                <label id="price" for="price">
                    <i class="bi bi-envelope-at"></i>
                    <input type="number" name="price" id="price" placeholder="Preço" required step="0.01">
                </label>

                <label id="developer" for="developer">
                    <i class="bi bi-key"></i>
                    <input type="text" name="developer" id="developer" placeholder="Desenvolvedor" required>
                </label>

                <label id="publisher" for="publisher">
                    <i class="bi bi-key"></i>
                    <input type="text" name="publisher" id="publisher" placeholder="Distribuidora" required>
                </label>
                <button id="btn_confirmar" type="submit">ENVIAR</button>

            </form>
        </div>

    </main>


</body>

<footer>
    <p>© 2025 GAMERSVAULT. Todos os direitos reservados.</p>
</footer>

</html>