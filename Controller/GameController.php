<?php

namespace Controller;

use Model\Game;
// use Exception;

class GameController
{
    private $gameModel;

    public function __construct()
    {
        $this->gameModel = new Game();
    }

    // REGISTRO DE JOGO
    public function createGame($game_cover, $title, $price, $developer, $publisher)
    {
        if (empty($game_cover) or empty($title) or empty($price) or empty($developer) or empty($publisher)) {
            return false;
        }

        return $this->gameModel->registerGame($game_cover, $title, $price, $developer, $publisher);
    }

    // RESGATAR DADOS DO JOGO
    public function getGameData($id, $game_cover, $title, $price, $developer, $publisher)
    {
        return $this->gameModel->getGameInfo($id, $game_cover, $title, $price, $developer, $publisher);
    }

    // RESGATAR DADOS DE TODOS OS JOGOS
    public function getAllGames()
    {
        return $this->gameModel->getAllGames();
    }

    public function purchaseGame($user_id, $game_id, $price_paid)
    {
        return $this->gameModel->purchaseGame($user_id, $game_id, $price_paid);
    }

    public function hasPurchased($user_id, $game_id)
    {
        return $this->gameModel->hasPurchased($user_id, $game_id);
    }
}

?>