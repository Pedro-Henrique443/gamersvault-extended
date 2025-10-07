<?php

use PHPUnit\Framework\TestCase;

use Controller\UserController;

use Model\User;

class UserTest extends TestCase {
    private $userController;
    private $mockUserModel;

    public function setUp(): void {
        $this->mockUserModel = $this->createMock(User::class);

        $this->userController = new UserController($this->mockUserModel);
    }

      #[\PHPUnit\Framework\Attributes\Test]
      public function it_should_be_able_to_create_user(){

        $this->mockUserModel->method('registerUser')->willReturn(true);
        
        $userResult = $this->userController->createUser('Juan Arthur', 'arthur@example.com', '10203040');

        return $this->assertTrue($userResult);

      }
      
      #[\PHPUnit\Framework\Attributes\Test]
      public function it_shouldnt_be_able_to_create_user_with_null_credentials(){

        $this->mockUserModel->method('registerUser')->willReturn(true);
        
        $userResult = $this->userController->createUser('Juan Arthur', null, '10203040');

        return $this->assertFalse($userResult);

      }
      
       #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_be_able_to_sign_in()
    {
        $this->mockUserModel->method('getUserByEmail')->willReturn([
            "id" => 1,
            "user_fullname" => "Juan Arthur",
            "email" => "arthur@example.com",
            "password" => password_hash("10203040", PASSWORD_DEFAULT)
        ]);

        $userResult = $this->userController->login('arthur@example.com', '10203040');

        $this->assertTrue($userResult);

        $this->assertEquals(1, $_SESSION['id']);
        $this->assertEquals('Juan Arthur', $_SESSION['user_fullname']);
        $this->assertEquals('arthur@example.com', $_SESSION['email']);
    
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