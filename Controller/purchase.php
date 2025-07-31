<?php
session_start();
require_once '../vendor/autoload.php';

use Controller\GameController;
use Model\Game;

$user_id = $_SESSION['id'];
$game_id = intval($_POST['game_id']);
$price_paid = floatval($_POST['price_paid']);

$gameController = new GameController();
$success = $gameController->purchaseGame($user_id, $game_id, $price_paid);

if ($success) {
    // Redireciona ou mostra mensagem de sucesso
    header('Location: ../index.php');
} else {
    header('Location: ../index.php');
}
exit();
?>