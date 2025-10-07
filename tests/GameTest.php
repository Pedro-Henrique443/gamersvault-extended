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

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_publish_a_game(): void
    {
        $this->mockGameModel->method('registerGame')->willReturn(true);

        $result = $this->gameController->createGame('cover.jpg', 'O jogo', '43.99', 'Teste', 'Teste');

        $this->assertTrue($result);
    }
}

?>