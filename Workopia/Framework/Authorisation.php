<?php

namespace Framework;

use Framework\Session;

class Authorisation {
    /**
     * Check if current logged-in user owns a resource
     *
     * @param int $resourceId
     * @return bool
     */
    public static function isOwner(int $resourceId): bool
    {
        $sessionUser = Session::get('user');

        if($sessionUser !== null && isset($sessionUser['id'])) {
            $sessionUserId = (int)$sessionUser['id'];
            return $sessionUserId === $resourceId;
        }
        return false;
    }
}