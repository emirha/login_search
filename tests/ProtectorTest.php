<?php

class ProtectorTest extends PHPUnit_Framework_TestCase {

    function testLoginSuccess() {
        $protector = new Protector();
        $protector->login($this->username(), $this->password());
        $this->assertTrue($protector->loggedIn());
    }

    function testLoginFailure() {
        $protector = new Protector();
        $protector->login('...', '...');
        $this->assertFalse($protector->loggedIn());
    }

    function testLoginEmptyFailure() {
        $protector = new Protector();
        $protector->login('', '');
        $this->assertFalse($protector->loggedIn());
    }

    private function user() {
        return new User(
            array('name' => 'Emir',
                  'email' => 'emirhadyc@hotmail.com',
                  'password' => 'test',
            )
        );
    }

    private function username() {
        return 'emirhadyc@hotmail.com';
    }

    private function password() {
        return 'test';
    }

}
