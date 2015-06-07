<?php

class User {

    public function __construct(array $userInfo = null) {
        if ($userInfo) {
            $this->init($userInfo);
        }
    }

    /**
     * @param array $userInfo
     */
    public function init (array $userInfo) {
        $this->name = $userInfo['name'];
        $this->email = $userInfo['email'];
        $this->password = $userInfo['password'];
        $this->validationErrors = array();
    }

    /**
     * @return string
     */
    public function getName () {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail () {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword () {
        return sha1($this->password);
    }

    /**
     * @param string $confirmationPassword
     *
     * @return bool
     */
    public function validate ($confirmationPassword = '') {
        $this->validationErrors = array();

        $this->validateEmail();
        $this->validateName();
        $this->validatePassword($confirmationPassword);

        return empty($this->validationErrors);
    }

    /**
     * @param $email
     */
    public function setEmail ($email) {
        $this->email = $email;
    }

    /**
     * @return bool
     */
    public function validateName() {
        if (empty($this->name)) {
            $this->validationErrors[] = 'Please fill in your name';
        }

        return true;
    }

    /**
     * @param $confirmationPassword
     *
     * @return bool
     */
    public function validatePassword ($confirmationPassword) {
        if (empty($this->password)) {
            $this->validationErrors[] = 'Password field is mandatory';
            return false;
        }

        if (empty($confirmationPassword)) {
            $this->validationErrors[] = 'Password validation field is mandatory';
            return false;
        }

        if ($this->password === $confirmationPassword) {
            return true;
        } else {
            $this->validationErrors[] = 'Pasword verification failed';
            return false;
        }
    }

    /**
     * @return bool
     */
    public function validateEmail () {
        $valid = true;

        if (empty($this->email)) {
            $this->validationErrors[] = 'Email empty';
            $valid = false;
        } else {
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
                $this->validationErrors[] = 'Email format is not valid';
                $valid = false;
            }
        }

        return $valid;
    }

    /**
     * @return array
     */
    public function getValidationErrors () {
        return $this->validationErrors;
    }

    /**
     * @return int
     */
    public function getId () {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId ($id) {
        $this->id = $id;
    }

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;
    /**
     * @var array
     */
    private $validationErrors;

}
