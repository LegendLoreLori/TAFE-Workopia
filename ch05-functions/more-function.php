<?php
// Easy implementation
$convertFahrenheit = fn ($tempF) : string =>
    $tempF . "F = " . 5/9 * ($tempF - 32) . "C";

echo $convertFahrenheit(54);

// Harder implementation
$temperature = 32;

$convertFahrenheit2 = function ($tempF) use (&$temperature) {
  return $tempF . "F = " . 5/9 * ($tempF - $temperature) . "C";
};

echo "<br>";
echo $convertFahrenheit2(54);