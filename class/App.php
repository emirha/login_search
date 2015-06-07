<?php

class App {

    /**
     * @var Db
     */
    public static $db;
    /**
     * @var Display
     */
    public static $display;

    /**
     * @var Protector
     */
    public static $protector;

    /**
     * @var App
     */
    private static $instance = null;

    /**
     * @return App
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new App();
        }

        return self::$instance;
    }

    private function __construct() {
        self::$db = new Db('emir_hellofresh','emir_hellofresh','k7awE8');
        self::$display = new Display();
        self::$protector = new Protector();
    }

    /**
     * @param $newURL
     *
     * Redirect browser to other url
     */
    static public function redirect($newURL) {
        header('Location: '.$newURL);
        exit();
    }

}