<?php

use Factory\UserFactory;

class SearchController {

    private $minSearchLength = 2;

    public function __construct() {
        App::$protector->protect();
    }

    public function index() {
        App::$display->show('search/welcome.php');
    }

    public function search() {
        $doSearch = true;
        $users = array();
        $searchError = '';

        if (empty($_POST['search'])) {
            $doSearch = false;
            $searchError = 'Search string cannot be empty';
        }

        if (strlen($_POST['search']) < $this->minSearchLength) {
            $doSearch = false;
            $searchError = 'Search string must be at least '.$this->minSearchLength.' chars long';
        }

        if ($doSearch) {
            $users = UserFactory::search($_POST['search']);
        }

        App::$display->add('users',$users);
        App::$display->add('searchError',$searchError);
        App::$display->show('search/results.php');
    }
}