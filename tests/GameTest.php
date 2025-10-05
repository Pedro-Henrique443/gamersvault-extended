<?php

use Controller\GameController;

use PHPUnit\Framework\TestCase;

use Model\Game;

class GameTest extends TestCase
{
    private $gameController;
    private $mockGameModel;

    public function setUp(): void
    {
        $this->mockGameModel = $this->createMock(Game::class);

        $this->gameController = new GameController($this->mockGameModel);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function testInformacoesInvalidas(): void
    {
        $this->mockGameModel->method('registerGame')->willReturn(true);

        $result = $this->gameController->createGame(null, null, null, null, null);

        $this->assertFalse($result);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function testComprarJogo(): void
    {
        $this->mockGameModel->method('purchaseGame')->willReturn(true);

        $result = $this->gameController->purchaseGame(1, 2, 59.99);

        $this->assertTrue($result);
    }

}

?>