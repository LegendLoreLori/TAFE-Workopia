<?php
// 1
// Easy implementation
$convertFahrenheit = fn ($tempF) : string =>
    $tempF . "F = " . 5/9 * ($tempF - 32) . "C";

echo $convertFahrenheit(54);

// Harder implementation
$temperature = 32;

$convertFahrenheit2 = function ($tempF) use (&$temperature) {
  return $tempF . "F = " . 5/9 * ($tempF - $temperature) . "C";
};

echo "<br>" . $convertFahrenheit2(54) . "<br>";

// 2
$names = ["Jane", "Alice", "steven", "rick", "boWie", "hogan", "joe"];

function printNamesToUpperCase($names) : void{
    foreach ($names as $name) {
        echo strtoupper($name) . "<br>";
    }
}

printNamesToUpperCase($names);

// 3
$pangram = "Sphinx of black quartz judge my vow";
function findLongestWord($sentence) : string {
    $longest = "";
    $words = explode(" ", $sentence);
    foreach ($words as $word) {
        $word = trim($word);
        if (strlen($word) > strlen($longest)) {
            $longest = $word;
        }
    }
    return $longest;
};

echo findLongestWord($pangram) . "<br>";
