<?php

use JetBrains\PhpStorm\NoReturn;

/**
 * Get the base path
 *
 * @param string $path
 * @return string
 */
function basePath(string $path = '') : string {
    return __DIR__ . '/' . $path;
}

/**
 * Load a view
 *
 * @param string $name
 * @param array $data
 * @return void
 */
function loadView(string $name, array $data = []) : void {
    $viewPath = basePath("App/views/$name.php");
    if(file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
      echo "View '$name' not found.";
    }
}

/**
 * Load a partial
 *
 * @param string $name
 * @param array $data
 * @return void
 */
function loadPartial(string $name, array $data = []) : void {

    $partialPath = basePath("App/views/partials/$name.php");
    if(file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        echo "Partial '$name' not found.";
    }
}

/**
 * Inspect a value
 *
 * @param mixed $value
 * @return void
 */
function inspect(mixed $value) : void
{
    echo '<pre>';
    var_dump($value);
    echo '<pre>';
}

/**
 * Inspect a value and die
 *
 * @param mixed $value
 * @return void
 */
#[NoReturn] function inspectAndDie(mixed $value) : void
{
    echo '<pre>';
    var_dump($value);
    echo '<pre>';
    die();
}

/**
 * Format salary
 *
 * @param string $salary
 * @return string Formatted salary
 */
function formatSalary(string $salary) : string {
    return '$' . number_format(floatval($salary));
}

/**
 * Sanitise data
 *
 * @param string $dirty
 * $return string
 */
function sanitise(string $dirty) : string
{
    return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}

/**
 * Redirect to given URL
 *
 *@param string $url
 *@return void
 */
#[NoReturn] function redirect(string $url) : void
{
    header("Location: $url");
    exit;
}