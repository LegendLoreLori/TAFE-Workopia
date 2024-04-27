<?php

namespace Framework;

class Validation
{
    /**
     * Validate a string of user input
     *
     * @param string $value
     * @param int $min
     * @param int | float $max
     * @return bool
     */
    public static function string(string $value, int $min = 1, int | float $max = INF): bool
    {
//         typehinting solves this but traversy did it this way
//        if (is_string($value)) {
//            $value = trim($value);
//            $length = strlen($value);
//            return $length >= $min && $length <= $max;
//        }
//        return false;

        // my solution
        $value = trim($value);
        $length = strlen($value);
        return $length >= $min && $length <= $max;
    }

    /**
     * Validate an email address
     *
     * @param string $value
     * @return mixed
     */
    public static function email(string $value) : mixed
    {
        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Match string value against another
     *
     * @param string $value1
     * @param string $value2
     * @return bool
     */
    public static function match(string $value1, string $value2) : bool
    {
        $value1 = trim($value1);
        $value2 = trim($value2);

        return $value1 === $value2;
    }
}