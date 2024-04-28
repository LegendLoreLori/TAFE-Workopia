<?php

namespace Framework\middleware;

use Framework\Session;

class Authorise
{
    /**
     * Check if user is authenticated
     *
     * @return bool
     */
    public function isAuthenticated(): bool
    {
        return Session::has('user');
    }

    /**
     * Handle the user's request
     *
     * @param string $role
     * @return void
     */
    public function handle(string $role): void // brad moment
    {
        // TODO: change return type to bool because only void works with this
        // implementation
        if ($role === 'guest' && $this->isAuthenticated()) {
            redirect('/');
        } elseif ($role === 'auth' && !$this->isAuthenticated()) {
            redirect('/auth/login');
        }
    }
}