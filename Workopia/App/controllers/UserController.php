<?php

namespace App\controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;
use JetBrains\PhpStorm\NoReturn;

class UserController
{
    protected Database $db;

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

    /**
     * Store user in database
     *
     * @return void
     * @throws \Exception
     */
    public function store(): void
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $password = $_POST['password'];
        $passwordConfirmation = $_POST['password_confirmation'];

        // validation
        $errors = [];
        if (!Validation::email($email)) {
            $errors['email'] = "Please enter a valid email address";
        }
        if (!Validation::string($name, 2, 50)) {
            $errors['name'] = "Name must be between 2 and 50 characters";
        }
        if (!Validation::string($password, 6)) {
            $errors['password'] = "Password must be at least 6 characters";
        }
        if (!Validation::match($password, $passwordConfirmation)) {
            $errors['password_confirmation'] = "Passwords do not match";
        }

        if (!empty($errors)) {
            loadView('/users/create', [
                'errors' => $errors,
                'user' => [
                    'name' => $name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state
                ]
            ]);
            exit;
        }

        // check if user already exists
        $params = [
            'email' => $email
        ];
        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();
        if ($user) {
            $errors['email'] = 'Email already exists';
            loadView('users/create', [
                'errors' => $errors,
                'user' => [
                    'name' => $name,
                    'city' => $city,
                    'state' => $state
                ]
            ]);
            exit;
        }

        // create user account
        $params = [
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        $this->db->query('INSERT INTO users (name, email, password, city, state) VALUES (:name, :email, :password, :city, :state)', $params);

        // get new user ID
        $userId = $this->db->conn->lastInsertId();

        // set user session
        Session::set('user', [
            'id' => $userId,
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state
        ]);

        redirect('/');
    }

    /**
     * Logout user and kill session
     *
     * @return void
     */
    #[NoReturn] public function logout(): void
    {
        Session::clearAll();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

        redirect('/');
    }

    /**
     * Authenticate a user with email and password
     *
     * @return void
     * @throws \Exception
     */
    #[NoReturn] public function authenticate(): void
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // validation
        $errors = [];
        if(!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email';
        }
        if(!Validation::string($password, 6)) {
            $errors['password'] = 'Password must be at least 6 characters';
        }

        if(!empty($errors)) {
            loadView('/users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // check for existing email
        $params = [
            'email' => $email
        ];
        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();
        if(!$user) {
            $errors['credentials'] = 'Username or password incorrect';
            loadView('/users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // check for password
        if(!password_verify($password, $user->password)) {
            $errors['credentials'] = 'Username or password incorrect';
            loadView('/users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // set user session
        Session::set('user', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'city' => $user->city,
            'state' => $user->state
        ]);

        redirect('/');
    }
}
