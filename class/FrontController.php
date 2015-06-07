<?php

class FrontController {

    const DEFAULT_CONTROLLER = "IndexController";
    const DEFAULT_ACTION     = "index";

    public function __construct(array $options = array()) {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");

        if (strpos($path, $this->basePath) === 0) {
            $path = substr($path, strlen($this->basePath));
        }

        $controller = null;
        $action = null;
        $params = null;
        @list($controller, $action, $params) = explode("/", $path, 3);

        if ($controller != null) {
            $this->setController($controller);
        }

        if ($action != null) {
            $this->setAction($action);
        }

        if ($params != null) {
            $this->setParams(explode("/", $params));
        }
    }

    /**
     *
     * Method to run controller
     *
     */
    public function run() {
        call_user_func_array(array(new $this->controller, $this->action), $this->params);
    }

    /**
     * @param $controller
     *
     * @return $this
     */
    private function setController($controller) {
        $controller = ucfirst(strtolower($controller)) . "Controller";
        if (!class_exists($controller)) {
            throw new InvalidArgumentException(
                "The action controller '$controller' has not been defined.");
        }
        $this->controller = $controller;
        return $this;
    }

    /**
     * @param $action
     *
     * @return $this
     */
    private function setAction($action) {
        $reflector = new ReflectionClass($this->controller);
        if (!$reflector->hasMethod($action)) {
            throw new InvalidArgumentException(
                "The controller action '$action' has been not defined.");
        }
        $this->action = $action;
        return $this;
    }

    /**
     * @param array $params
     *
     * @return $this
     */
    private function setParams(array $params) {
        $this->params = $params;
        return $this;
    }

    private $controller    = self::DEFAULT_CONTROLLER;
    private $action        = self::DEFAULT_ACTION;
    private $params        = array();
    private $basePath      = FCPATH;

}