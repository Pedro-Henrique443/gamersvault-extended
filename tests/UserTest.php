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
}

?>