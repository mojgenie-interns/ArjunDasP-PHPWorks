<?php
    class Movies
    {
        public $title;
        public $language;
        public $year;

        function setTitle($title)
        {
            $this->title=$title;
        }

        function getTitle()
        {
            return $this->title;
        }

    }

    $movie1=new Movies();
    $movie1->setTitle("#Single\n");
    echo $movie1->getTitle();

    $movie2=new Movies();
    $movie2->setTitle("Steamboy\n");
    echo $movie2->getTitle();

    var_dump($movie1 instanceof Movies);
?>