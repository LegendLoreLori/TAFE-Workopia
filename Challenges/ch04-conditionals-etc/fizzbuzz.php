<?php
$fizz = 3;
$buzz = 5;

for ($i = 1; $i <= 100; $i++) {
    if ($i % $fizz == 0 && $i % $buzz == 0) {
        echo "$i fizzbuzz<br>";
    } else if ($i % $fizz == 0) {
        echo "$i fizz<br>";
    } else if ($i % $buzz == 0) {
        echo "$i buzz<br>";
    } else {
        echo "$i<br>";
    }
}