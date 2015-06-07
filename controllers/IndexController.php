<?php

class IndexController {

    function index() {
        if (App::$protector->loggedIn())
            App::redirect('/search');

        App::$display->show('index.php');
    }

    function login_error() {
        App::$display->add('error','Error logging you in.');
        $this->index();
    }


    public function login() {
        if (App::$protector->login($_POST['username'],$_POST['password'])) {
            App::redirect('/search');
        }

        App::redirect('/index/login_error');
    }

    public function logout() {
        App::$protector->logout();
        App::redirect('/');

    }

}