<?php 

namespace data;

class User {
    public $id;
    public $name;
    public $password;

    public function __construct($name, $password) {
        $this->name = $name;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->password;
    }
}