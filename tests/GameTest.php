<?php 

use Controller\GameController;

use PHPUnit\Framework\TestCase;

use Model\Game;

class GameTest extends TestCase {
    private $gameController;
    private $mockGameModel;

    public function setUp(): void {
        $this->mockGameModel = $this->createMock(Game::class);

        $this->gameController = new GameController($this->mockGameModel);
    }
}

?>