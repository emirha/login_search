<?php

use Factory\UserFactory;

class RegisterController {

    function __construct() {
        $this->user = new User();
    }

    public function index() {
        App::$display->add('user',$this->user);
        App::$display->show('register.php');
    }

    public function register() {
        $this->user = new User($_POST);

        if ($this->user->validate($_POST['password_confirm'])) {
            UserFactory::save($this->user);
            App::redirect('/register/success');
        } else {
            $this->index();
        }
    }

    public function success() {
        include FCPATH.'/views/register_success.php';
    }

    private $user;

}