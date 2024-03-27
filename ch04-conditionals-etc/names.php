<?php
$names = ['Alex', 'Beth', 'Caroline', 'Dave', 'Elanor', 'Anna', 'Freddie', 'Adam'];
foreach ($names as $name) {
    if (ucwords($name)[0] == 'A') {
        continue;
    }
    echo strtolower(strrev($name)) . "<br>";
}