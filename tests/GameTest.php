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
    public function it_should_reject_invalid_information(): void
    {
        $this->mockGameModel->method('registerGame')->willReturn(true);

        $result = $this->gameController->createGame(null, null, null, null, null);

        $this->assertFalse($result);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_be_able_to_purchase_game(): void
    {
        $this->mockGameModel->method('purchaseGame')->willReturn(true);

        $result = $this->gameController->purchaseGame(1, 2, 59.99);

        $this->assertTrue($result);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_verify_if_purchased(): void
    {
        // Simples: mocka hasPurchased para retornar true e verifica o resultado
        $this->mockGameModel->method('hasPurchased')->willReturn(true);

        $result = $this->gameController->hasPurchased(1, 2);

        $this->assertTrue($result);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_return_game_information(): void
    {
        $this->mockGameModel->method('getGameInfo')->willReturn([
            'game_cover' => 'cover.jpg',
            'title' => 'Fictional Game',
            'price' => '49.99',
            'developer' => 'DevStudio',
            'publisher' => 'PubHouse'
        ]);

        $gameResult = $this->gameController->getGameData(2, 'cover.jpg', 'Fictional Game', 49.99, 'DevStudio', 'PubHouse');

        $this->assertNotNull($gameResult);
        $this->assertEquals('Fictional Game', $gameResult['title']);
        $this->assertEquals('49.99', (string)$gameResult['price']);
    }

}

?>