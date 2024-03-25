<?php
$title = "Introduction to PHP";
$author = "<p>By: John Doe</p>";
$body = "<p>
        PHP (Hypertext Preprocessor) is a widely used server-side scripting
        language that has revolutionized web development. With its simplicity,
        flexibility, and vast community support, PHP has become the backbone of
        countless dynamic websites and web applications.
    </p>";
$page_title = "Brad's PHP Blog | $title"

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $page_title ?></title>
</head>
<body>
<main>
    <h1><?= $title ?></h1>
    <?= $author ?>
    <?= $body ?>
</main>
</body>
</html>
