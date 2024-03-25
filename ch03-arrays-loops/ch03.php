<?php
// challenge 1
$numbers = [1, 2, 3, 4, 5];
$amount = count($numbers);
$sum = 0;
foreach ($numbers as $num){
    $sum += $num;
}
echo "The sum of $amount numbers is $sum";