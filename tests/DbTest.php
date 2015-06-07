<?php

class DbTest extends PHPUnit_Framework_TestCase {

    public function testGetInstance() {
        $this->assertNotNull(App::$db);
        $this->assertInstanceOf('PDO',App::$db->getPdo());
    }

}
