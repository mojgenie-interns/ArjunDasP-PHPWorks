<?php
    class Movies
    {
        public $title;
        public $year;
        public $language;

        function __construct($title,$year,$language)
        {
            $this->title=$title;
            $this->year=$year;
            $this->language=$language;
        }

        function __destruct()
        {
            echo "\nTitle: $this->title\nYear: $this->year\nLanguage: $this->language\n";
        }
    }
    $movie1=new Movies("#Single",2025,"Telugu");
    $movie2=new Movies("Steamboy",2004,"Japanese");
    
?>