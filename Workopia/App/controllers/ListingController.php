<?php

namespace App\controllers;

use Framework\Database;
use Framework\Validation;

class ListingController
{
    protected Database $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Display the listings index view
     *
     * @return void
     * @throws \Exception
     */
    public function index(): void
    {
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();
        /** @var array $data */
        loadView('listings/index', [
            'listings' => $listings
        ]);
    }

    /**
     * Display the listings create view
     *
     * @return void
     */
    public function create(): void
    {
        loadView('listings/create');
    }

    /**
     * Display a single listing view
     *
     * @param array $params
     * @return void
     * @throws \Exception
     */
    public function show(array $params): void
    {
        $id = $params['id'];
        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        // if listing exists
        if (!$listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

        loadView('/listings/show', [
            'listing' => $listing
        ]);
    }

    /**
     * Store data in database
     *
     * @return void
     * @throws \Exception
     */
    public function store(): void
    {
        $allowedFields = ['title', 'description', 'salary', 'tags', 'company',
                          'address', 'city', 'state', 'phone', 'email',
                          'requirements', 'benefits'];
        $requiredFields = ['title', 'description', 'salary', 'email', 'city',
                           'state'];

        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));
        // TODO: replace hard coded userID when authentication added
        // TODO: remember, USER_ID is required field
        $newListingData['user_id'] = 1;
        // reassigned with sanitised data with array_map
        $newListingData = array_map('sanitise', $newListingData);

        $errors = [];
        foreach ($requiredFields as $field) {
            if (empty($newListingData[$field]) || !Validation::string($newListingData[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            // Reload view with errors
            loadView('listings/create', [
                'errors' => $errors,
                'listing' => $newListingData
            ]);
        } else {
            // Submit data
            $fields = [];
            $values = [];
            foreach ($newListingData as $field => $value) {
                $fields[] = $field;
                if ($value === '') {
                    $newListingData[$field] = null;
                }
                $values[] = ':' . $field;
            }
            $fields = implode(', ', $fields);
            $values = implode(', ', $values);

            $query = "INSERT INTO listings ($fields) VALUES ({$values})";

            $this->db->query($query, $newListingData);
            redirect('/listings');
        }
    }
}
