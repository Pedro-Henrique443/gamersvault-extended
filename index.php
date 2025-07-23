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
            <img src="./images/Novo Projeto.png" alt="">
            <img id="nomelogo" src="./images/nomelogo.png" alt="">

            <button id="btn_perfil">Perfil</button>
            <button id="btn_biblioteca">Biblioteca</button>
            <button id="btn_comunidade">Comunidade</button>
        </div>

        <div class="header-right">
            <button id="btn_notificacao"><i class="bi bi-bell"></i></button>
            <button id="btn_conta"><i class="bi bi-person-circle"></i></button>
        </div>
    </header>

    <main>
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/reddead.png" class="d-block w-100" alt="...">
                </div>
                <!-- <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div> -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
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
        <div class="container mt-4">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Pesquisar..." aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form>
        </div>
        <div class="container-fluid"
            style="display: flex; justify-content: space-between; gap: 2rem; max-width: 700px; margin: 2rem auto 0 auto;">
            <div class="card mb-3" style="max-width: 200px; height: 400px;">
                <div class="row g-0" style="height: 100%;" >
                    <div class="col-md-6" style="height: 100%; padding: 0;">
                        <img src="./images/reddead.png" alt="..."
                            style="display: block; width: 100%; height: 100%; object-fit: cover; border-radius: 0;">
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 200px; height: 400px;">
                <div class="row g-0" style="height: 100%;">
                    <div class="col-md-6" style="height: 100%; padding: 0;">
                        <img src="./images/reddead.png" alt="..."
                            style="display: block; width: 100%; height: 100%; object-fit: cover; border-radius: 0;">
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 200px; height: 400px;">
                <div class="row g-0" style="height: 100%;">
                    <div class="col-md-6" style="height: 100%; padding: 0;">
                        <img src="./images/reddead.png" alt="..."
                            style="display: block; width: 100%; height: 100%; object-fit: cover; border-radius: 0;">
                    </div>
                </div>
            </div>
        </div>
        <div class="explore-games">
            <h1>EXPLORE DIVERSOS JOGOS</h1>
            <div class="explore-games-wrapper"
                style="display: flex; justify-content: space-between; gap: 2rem; max-width: 60rem; margin: 2rem auto;">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card’s content.</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card’s content.</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card’s content.</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card’s content.</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card’s content.</p>
                    </div>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>