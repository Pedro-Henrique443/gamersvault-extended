<?php

use PHPUnit\Framework\TestCase;
use Controller\UserController;
use Model\User;

class UserTest extends TestCase
{
    private $userController;
    private $mockUserModel;

    public function setUp(): void
    {
        $this->mockUserModel = $this->createMock(User::class);
        $this->UserController = new UserController($this->mockUserModel);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    // REALIZAR LOGIN COM INFORMAÇÕES INCORRETAS
    public function it_should_not_login_with_incorrect_credentials()
    {
        $this->mockUserModel->method('getUserByEmail')->willReturn([
            'id' => 1,
            'username' => 'João',
             'email' => 'joao@example.com',
             'password' => '12345',
        ]);

        $_SESSION = [];

    $result = $this->userController->login('joao@example','1234');

    $this->assertFalse($result,'Login falha com senha incorreta');
    $this->assertArrayNotHasKey('id',$_SESSION,'Sessão não deve conter ID do usuário');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    // CHECAR USUÁRIO POR E-MAIL
    public function it_should_check_user_by_email()
    {
        $this->mockUserModel->method('getUserByEmail')->willReturn([
            'id'=> 2,
            'username' => 'Gustavo',
            'email' => 'gustavo@example.com',
            'password' => '12345'
        ]);

        $result = $this->userController->checkUserByEmail('gustavo@example.com');

        $this->assertNotNull($result,'Usuário não deveria ser nulo');
        $this->assertEquals('gustavo@example.com',$result['email']);
        $this->assertEquals('Gustavo',$result['username']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    // VERIFICAR SE ESTÁ LOGADO
    public function it_should_verify_if_user_is_logged_in()
    {
        $_SESSION = ['id' => 5];

        $this->assertTrue(
            $this->userController->isLoggedIn(),
            'Deve retornar true quando há ID na sessão'
        );

        $_SESSION = [];

        $this->AssertFalse(
            $this->userController->isLoggedIn(),
            'Deve retornar false quando não ID na sessão'
        );
    }
    
}

?>