<?php 

namespace core;

use data\Database;

class Model {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }
}