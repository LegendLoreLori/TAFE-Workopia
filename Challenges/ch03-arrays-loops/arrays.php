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

//challenge 3
$listings = [
    [
        'id' => 1,
        'job_title' => 'PHP Developer',
        'company' => 'ABC Company',
        'contact_email' => 'john@email.com',
        'contact_phone' => '123-456-7890',
        'skills' => ['PHP', 'MySQL', 'JavaScript', 'HTML', 'CSS']
    ],
    [
        'id' => 2,
        'job_title' => 'Web Designer',
        'company' => 'XYZ Company',
        'contact_email' => 'steph@email.com',
        'contact_phone' => '123-456-7890',
        'skills' => ['Photoshop', 'Illustrator', 'HTML', 'CSS']
    ],
    [
        'id' => 3,
        'job_title' => 'Web Developer',
        'company' => '123 Company',
        'contact_email' => 'peter@email.com',
        'contact_phone' => '123-456-7890',
        'skills' => ['Python', 'PostgreSQL', 'JavaScript', 'HTML', 'CSS']
    ]
];
$listings[] = ['id' => 4,
    'job_title' => 'Software Engineer',
    'company' => 'THE Company',
    'contact_email' => 'bob@email.com',
    'contact_phone' => '0412 321 123',
    'skills' => ['Rust', 'C', 'HLSL', 'holyC', 'JavaScript', 'C++']];

echo "<pre>" . print_r($listings, true) . "</pre>";

echo $listings[1]['job_title'] . "<br>";
echo $listings[2]['skills'][0] . "<br>";
