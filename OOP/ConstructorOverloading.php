<?php
    class Books
    {
        var $title;
        var $author;
        function __construct(string $title="TITLE",string $author="Author")
        {
          $this->title=$title;
          $this->author=$author;
          echo "$this->title by $this->author\n";
        }
    }
    $book2=new Books();
    $book1=new Books("THINK LIKE A MONK","Jay Shetty");
    // $book2=new Books("BOYS TOWN",Arjun Nishadasan);
?>