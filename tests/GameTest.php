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
            ->with($user_id, $game_id)->willReturn(true);

        $result = $this->gameController->hasPurchased($user_id, $game_id);

        $this->assertTrue($result);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_return_game_information(): void
    {
        $this->mockGameModel->method('getGameInfo')->willReturn([
            'game_cover' => 'the_witcher_3_cover.jpg',
            'title' => 'The Witcher 3: Wild Hunt',
            'price' => '39.99',
            'developer' => 'CD Projekt Red',
            'publisher' => 'CD Projekt'
        ]);

        $result = $this->gameController->getGameData(
            2,
            'the_witcher_3_cover.jpg',
            'The Witcher 3: Wild Hunt',
            39.99,
            'CD Projekt Red',
            'CD Projekt'
        );

        $this->assertNotNull($result);
        $this->assertEquals('the_witcher_3_cover.jpg', $result['game_cover']);
        $this->assertEquals('The Witcher 3: Wild Hunt', $result['title']);
        $this->assertEquals('39.99', (string) $result['price']);
        $this->assertEquals('CD Projekt Red', $result['developer']);
        $this->assertEquals('CD Projekt', $result['publisher']);

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