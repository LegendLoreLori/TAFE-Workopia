<?php
// Challenge 1
for ($i = 1; $i <= 12; $i++) {
    for ($j = 1; $j <=12 ; $j++) {
        echo "$i * $j = " . $i * $j . "<br>";
    }
}

// Challenge 2
$numbers = [1, 2, 3, 4, 5];
$amount = count($numbers);
$sum = 0;
foreach ($numbers as $num){
    $sum += $num;
}
echo "The sum of $amount numbers is $sum<br>";
