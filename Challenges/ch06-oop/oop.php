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

// Challenge 2
class StringUtility {
  public function __construct()
  {
  }

  public static function shout($string) : string
  {
      return strtoupper($string) . "!";
  }

  public static function whisper($string) : string
  {
      return strtolower($string) . "ch06-oop";
  }

  public static function repeat($string, $times=2) : string
  {
      return str_repeat($string, $times);
  }
}

$stringUtility = new StringUtility();

echo "<br>";

echo $stringUtility::shout("Egg") . "<br>";
echo $stringUtility::whisper("eGG") . "<br>";
echo $stringUtility::repeat("Egg", 10) . "<br>";
