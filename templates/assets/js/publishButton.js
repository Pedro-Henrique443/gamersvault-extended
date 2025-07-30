document.addEventListener("DOMContentLoaded", function () {
    // Procura pelo botão com texto "Publicar"
    const buttons = document.querySelectorAll("button");
    buttons.forEach(function (btn) {
        if (btn.textContent.trim() === "Publicar") {
            btn.addEventListener("click", function () {
                window.location.href = "View/createGame.php";
            });
        }
    });
});