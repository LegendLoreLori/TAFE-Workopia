<?php
// Challenge 1
class Article {
    public string $title;
    public string $content;
    private bool $published = false;

    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function publish() : void {
        if ($this->published === false) {
            $this->published = true;
        }
    }

    public function isPublished() : bool
    {
        return $this->published;
    }
}

$article1 = new Article("Title is good", "Good content");
$article2 = new Article("Title is bad", "Bad content");

$article1->publish();

var_dump($article1->isPublished());
var_dump($article2->isPublished());