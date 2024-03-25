<?php
// challenge 1
$numbers = [1, 2, 3, 4, 5];
$amount = count($numbers);
$sum = 0;
foreach ($numbers as $num){
    $sum += $num;
}
echo "The sum of $amount numbers is $sum<br>";

// challenge 2
$colours = ["red", "blue", "green", "yellow"];
$colours = array_reverse($colours);
echo "<pre>" . print_r($colours, true) . "</pre>";

$colours = array_merge($colours, ["purple", "orange"]);
echo "<pre>" . print_r($colours, true) . "</pre>";

array_splice($colours,1,0, "pink");
echo "<pre>" . print_r($colours, true) . "</pre>";

array_pop($colours);
echo "<pre>" . print_r($colours, true) . "</pre>";


