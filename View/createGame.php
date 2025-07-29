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
        </div>

        <div class="header-right">
            <button id="btn_notificacao"><i class="bi bi-bell"></i></button>
            <button id="btn_conta"><i class="bi bi-person-circle"></i></button>
        </div>
    </header>
    
    
    <main>
        <h1>Publique o seu jogo</h1>
        <div class="cadastro-game">
            
            <form action="" method="post">
                <label id="cover_image" for="cover_image">
                    <figure>
                        <!-- botar imagem de pré-visualização aqui -->
                    </figure>
             
                    <i style="margin-left :-4.7rem" class="bi bi-key"></i>
                    <input type="text" id="cover_image" placeholder="URL da Imagem de Capa" required>
                </label>
                <label id="title" for="title">
                    <i class="bi bi-person"></i>
                    <input type="text" id="title" placeholder="Título do jogo" required>
                </label>

                <label id="price" for="price">
                    <i class="bi bi-envelope-at"></i>
                    <input type="number" id="price" placeholder="Preço" required>
                </label>

                <label id="developer" for="developer">
                    <i class="bi bi-key"></i>
                    <input type="text" id="developer" placeholder="Desenvolvedor" required>
                </label>

                <label id="publisher" for="publisher">
                    <i class="bi bi-key"></i>
                    <input type="text" id="publisher" placeholder="Distribuidora" required>
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