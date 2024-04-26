<?php

namespace App\controllers;

class ErrorController
{
    /**
     * 404 not found
     *
     * @param string $message
     * @return void
     */
    public static function notFound(string $message = 'Resource not found') : void
    {
        http_response_code(404);


        loadView('error', [
            'status' => '404',
            'message' => $message
        ]);
    }

    /**
     * 403 forbidden
     *
     * @param string $message
     * @return void
     */
    public static function forbidden(string $message = 'Forbidden') : void
    {
        http_response_code(403);

        loadView('error', [
            'status' => '403',
            'message' => $message
        ]);
    }
}
