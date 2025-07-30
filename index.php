<?php
session_start();
require_once 'vendor/autoload.php';

use Controller\UserController;
use Controller\GameController;

$userController = new UserController();
$gameController = new GameController();

// VERIFICANDO SE HOUVE LOGIN
if (!$userController->isLoggedIn()) {
    header('Location: View/login.php');
    exit();
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$is_admin = $_SESSION['is_admin'];

$userInfo = $userController->getUserData($id, $username, $email, $is_admin);

$games = $gameController->getAllGames();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamersVault</title>
    <link rel="stylesheet" href="templates/assets/css/index.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="header-left">
            <img src="images/gamersvaultlogo.png" alt="">
            <img id="nomelogo" src="images/nomelogo.png" alt="">

            <button id="btn_perfil">Perfil</button>
            <button id="btn_biblioteca">Biblioteca</button>
            <button id="btn_comunidade">Comunidade</button>
            <?php
            if ($is_admin === 1) {
                echo "<button>Publicar</button>";
            }
            ?>
        </div>

        <div class="header-right">
            <button id="btn_notificacao"><i class="bi bi-bell"></i></button>
            <button id="btn_conta"><i class="bi bi-person-circle"></i></button>
        </div>
    </header>

    <main>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/r2dr1080.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h4 style="font-size: 1.7rem; font-weight: bold;">Explore o Velho Oeste como nunca em Red Dead
                            Redemption 2</h4>
                        <p>
                            Explore um mundo aberto imersivo cheio de ação, honra e escolhas difíceis.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./images/ghost_of_tsushima.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h4 style="font-size: 1.7rem; font-weight: bold;">Viva a jornada de um verdadeiro samurai em
                            Ghost of Tsushima </h4>
                        <p>Honra, ação e uma história inesquecível te aguardam!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./images/battlefield_1_faceoff.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h4 style="font-size: 1.7rem; font-weight: bold;">Mergulhe na intensidade da Primeira Guerra
                            Mundial em Battlefield 1</h4>
                        <p>Ação épica, batalhas históricas e multiplayer insano te esperam!</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="secoes">
            <button class="jgs_gratuitos">JOGOS GRATUITOS</button>
            <button class="ofertas">OFERTAS</button>
            <button class="lancamentos">LANÇAMENTOS</button>
        </div>
        <div class="container mt-3">
            <form style="margin-top: 2rem" class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Pesquisar..." aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form>
        </div>
        <div class="container-fluid"
            style="display: flex; justify-content: space-between; gap: 2rem; max-width: 1200px; margin: 2rem auto 0 auto;">
            <div class="card mb-3" style="width: 1400px; height: 400px; ">
                <div class="row g-0" style="height: 100%;">
                    <div class="col-md-6" style="height: 100%; padding: 0;">
                        <img src="./images/half-life.jpg" alt="..."
                            style="display: block; width: 200%; height: 100%; object-fit: cover; border-radius: 0;">
                    </div>
                    <img class="halflifelogo" src="./images/halflifelogo.png" alt="...">
                </div>
            </div>
            <div class="card mb-3" style="width: 1400px; height: 400px;">
                <div class="row g-0" style="height: 100%;">
                    <div class="col-md-6" style="height: 100%; padding: 0;">
                        <img src="./images/fifa-22.jpg" alt="..."
                            style="display: block; width: 200%; height: 100%; object-fit: cover; border-radius: 0;">
                    </div>
                    <img class="fifalogo" src="./images/fifalogo.png" alt="...">
                </div>
            </div>
            <div class="card mb-3" style="width: 1400px; height: 400px;">
                <div class="row g-0" style="height: 100%;">
                    <div class="col-md-6" style="height: 100%; padding: 0;">
                        <img src="./images/Borderlands-Psychos-Costume.png" alt="..."
                            style="display: block; width: 200%; height: 100%; object-fit: cover; border-radius: 0;">
                    </div>
                    <img class="borderlandslogo" src="./images/Borderlands-Logo-2009.png" alt="...">
                </div>
            </div>
            <div class="card mb-3" style="width: 1400px; height: 400px;">
                <div class="row g-0" style="height: 100%;">
                    <div class="col-md-6" style="height: 100%; padding: 0;">
                        <img src="./images/Skyrim.jpg" alt="..."
                            style="display: block; width: 200%; height: 100%; object-fit: cover; border-radius: 0;">
                    </div>
                    <img class="skyrimlogo" src="./images/skyrimlogo.png" alt="...">
                </div>
            </div>
        </div>

        <div class="explore-games1">
            <h1>EXPLORE DIVERSOS JOGOS</h1>

            <div class="contain-card-games">
                <?php foreach ($games as $game): ?>
                    <div class="games-card">
                        <img src="<?php echo htmlspecialchars($game['game_cover']); ?>" class="card-img-top" alt="...">
                        <div>
                            <h2><?php echo htmlspecialchars($game['title']); ?></h2>
                            <p><?php echo htmlspecialchars($game['developer']); ?></p>
                            <p><?php echo htmlspecialchars($game['publisher']); ?></p>
                            <span>R$ <?php echo number_format($game['price'], 2, ',', '.'); ?></span>
                            <button>Comprar</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </main>
    <footer>
        <p>© 2025 GAMERSVAULT. Todos os direitos reservados.</p>
        <div class="social-icons">
            <a href="https://web.whatsapp.com/" target="_blank"><i class="bi bi-whatsapp"></i></a>
            <a href="https://www.youtube.com/" target="_blank"><i class="bi bi-youtube"></i></a>
            <a href="https://x.com/" target="_blank"><i class="bi bi-twitter-x"></i></a>
            <a href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
        </div>
    </footer>

    <script src="templates/assets/js/publishButton.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>