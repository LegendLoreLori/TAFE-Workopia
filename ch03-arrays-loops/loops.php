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

// Challenge 3
$students = [
    [
        "name" => "Rhys",
        "grades" => [80, 53, 83, 91]
    ],
    [
        "name" => "Janice",
        "grades" => [92, 89, 78, 94]
    ],
    [
        "name" => "Hector",
        "grades" => [60, 74, 65, 68]
    ]
];

foreach ($students as $student) {
    echo $student["name"] . ": ";
    echo array_sum($student["grades"]) / count($student["grades"]) . "<br>";
}