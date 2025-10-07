<?php

use Controller\UserController;

use PHPUnit\Framework\TestCase;

use Model\User;

class UserTest extends TestCase {
    private $userController;
    private $mockUserModel;

    public function setUp(): void {
        $this->mockUserModel = $this->createMock(User::class);

        $this->userController = new UserController($this->mockUserModel);
    }

    
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_verify_if_is_an_admin()
    {
        $_SESSION['is_admin'] = 1;

        $userResult = $this->userController->isAdmin();

        $this->assertTrue($userResult);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_verify_if_isnt_an_admin()
    {
        $_SESSION['is_admin'] = 0;

        $userResult = $this->userController->isAdmin();

        $this->assertFalse($userResult);
    }

}

?>