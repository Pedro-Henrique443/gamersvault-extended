<?php

use Controller\UserController;

use PHPUnit\Framework\TestCase;

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

        $result = $this->userController->login('joao@example', '1234');

        $this->assertFalse($result, 'Login falha com senha incorreta');
        $this->assertArrayNotHasKey('id', $_SESSION, 'Sessão não deve conter ID do usuário');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    // CHECAR USUÁRIO POR E-MAIL
    public function it_should_check_user_by_email()
    {
        $this->mockUserModel->method('getUserByEmail')->willReturn([
            'id' => 2,
            'username' => 'Gustavo',
            'email' => 'gustavo@example.com',
            'password' => '12345'
        ]);

        $result = $this->userController->checkUserByEmail('gustavo@example.com');

        $this->assertNotNull($result, 'Usuário não deveria ser nulo');
        $this->assertEquals('gustavo@example.com', $result['email']);
        $this->assertEquals('Gustavo', $result['username']);
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

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_should_be_able_to_create_user()
    {

        $this->mockUserModel->method('registerUser')->willReturn(true);

        $userResult = $this->userController->createUser('Juan Arthur', 'arthur@example.com', '10203040');

        return $this->assertTrue($userResult);

    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_shouldnt_be_able_to_create_user_with_null_credentials()
    {

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