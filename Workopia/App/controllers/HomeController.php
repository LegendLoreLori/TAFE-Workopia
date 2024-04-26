<?php

namespace App\controllers;

use Framework\Database;

class HomeController {
    protected Database $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index()
    {
        $listings = $this->db->query('SELECT * FROM listings LIMIT 6')->fetchAll();
        /** @var array $data */
        loadView('home', [
            'listings' => $listings
        ]);
    }
}