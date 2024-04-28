<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class UserController {
    protected $db;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Display login page
     *
     * @return void
     */
    public function login(): void
    {
        loadView('users/login');
    }

    /**
     * Display register page
     *
     * @return void
     */
    public function create(): void
    {
        loadView('users/create');
    }
}
