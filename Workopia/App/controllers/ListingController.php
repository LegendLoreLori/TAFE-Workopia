<?php

namespace App\controllers;

use Framework\Database;

class ListingController
{
    protected Database $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index(): void
    {
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();
        /** @var array $data */
        loadView('listings/index', [
            'listings' => $listings
        ]);
    }

    public function create(): void
    {
        loadView('listings/create');
    }

    public function show(): void
    {
        $id = $_GET['id'];
        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        loadView('/listings/show', [
            'listing' => $listing
        ]);
    }
}
