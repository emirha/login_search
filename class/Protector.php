<?php

use Factory\UserFactory;

class Protector {

    function __construct() {
        $this->user = empty($_SESSION['user']) ? null : unserialize($_SESSION['user']);
        if ($this->user)
            $this->loggedIn = true;
    }

    /**
     * @param $username
     * @param $password
     *
     * @return bool
     */
    function login($username, $password) {
        $this->loggedIn = false;
        $user = UserFactory::getUsernamePass($username, $password);
        if ($user) {
            $this->user = $user;
            $this->loggedIn = true;
            $_SESSION['user'] = serialize($this->user);
            return true;
        }
        return false;
    }

    /**
     *
     * Log user out of the system
     *
     */
    function logout() {
        $this->user = null;
        $this->loggedIn = false;
        $_SESSION['user'] = null;
        unset($_SESSION['user']);
    }

    /**
     * @return bool
     */
    public function loggedIn () {
        return $this->loggedIn;
    }

    /**
     *
     * This method is used to protect method(s) from unauthorized access
     *
     */
    public function protect() {
        if (!$this->loggedIn())
            App::redirect('/');
    }

    /**
     * @return User
     */
    public function getUser () {
        return $this->user;
    }

    /**
     * @var bool
     */
    private $loggedIn = false;
    /**
     * @var User
     */
    private $user = null;
}