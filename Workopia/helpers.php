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
    $viewPath = basePath("views/$name.php");
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
 * @return void
 */
function loadPartial(string $name) : void {
    $partialPath = basePath("views/partials/$name.php");
    if(file_exists($partialPath)) {
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