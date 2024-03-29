<?php

// Easy implementation
$convertFahrenheit = fn ($tempF) : string =>
    $tempF . "F = " . 5/9 * ($tempF - 32) . "C";

echo $convertFahrenheit(54);
