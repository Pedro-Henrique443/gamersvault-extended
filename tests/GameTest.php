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

        $user_id = 1;
        $game_id = 2;
        $price_paid = 59.99;

        $result = $this->gameController->purchaseGame($user_id, $game_id, $price_paid);

        $this->assertTrue($result);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_verify_if_purchased(): void
    {
        $user_id = 1;
        $game_id = 2;

        $this->mockGameModel->expects($this->once())->method('hasPurchased')
        ->with($user_id, $game_id) ->willReturn(true);

        $result = $this->gameController->hasPurchased($user_id, $game_id);

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
        $this->assertEquals('49.99', (string) $gameResult['price']);
    }

}

?>