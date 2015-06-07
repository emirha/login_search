<?php

class Display {

    /**
     * @param $key
     * @param $val
     */
    public function add($key, $val) {
        if ($this->data === null)
            $this->data = array();
        $this->data[$key] = $val;
    }

    /**
     * @param $key
     *
     * @return mixed|null
     */
    public function get($key) {
        return empty($this->data[$key]) ? null : $this->data[$key];
    }

    /**
     *
     * Clears content of data provided to a view
     *
     */
    public function clear() {
        $this->data = array();
    }

    /**
     * @param $file
     */
    public function show($file) {
        if (!empty($this->data))
            extract($this->data);

        include FCPATH.'/views/'.$file;
    }

    /**
     * @var array
     */
    private $data = null;

}