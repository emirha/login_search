<?php
use Factory\UserFactory;

/**
 * Created by PhpStorm.
 * User: emirhadzic
 * Date: 06/06/15
 * Time: 15:34
 */

class UserTest extends PHPUnit_Framework_TestCase {

    public function testRegisterUser () {
        App::$db->getPdo()->beginTransaction();
        $saveResult = UserFactory::save($this->user());
        App::$db->getPdo()->rollBack();
//        App::$db->getPdo()->commit();
        $this->assertNotNull($saveResult);
    }

    public function testValidatePasswordCorrect() {
        $validationResult = $this->user()->validatePassword('test');
        $this->assertTrue($validationResult);
    }

    public function testValidatePasswordWrong() {
        $validationResult = $this->user()->validatePassword('differentThanTest');
        $this->assertFalse($validationResult);
    }

    public function testValidatePasswordCapitalization() {
        $validationResult = $this->user()->validatePassword('Test');
        $this->assertFalse($validationResult);
    }

    public function testValidatePasswordEmpty() {
        $validationResult = $this->user()->validatePassword('');
        $this->assertFalse($validationResult);
    }

    public function testValidateEmail() {
        $validationResult = $this->user()->validateEmail();
        $this->assertTrue($validationResult);
    }

    public function testValidateEmailWrong() {
        $user = $this->user();
        $user->setEmail('emirhadyc');
        $validationResult = $user->validateEmail();
        $this->assertFalse($validationResult);
    }

    private function user() {
        return new User(
            array('name' => 'Emir',
                  'email' => 'emirhadyc@hotmail.com',
                  'password' => 'test',
            )
        );
    }


}
