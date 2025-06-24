<?php
    class Books
    {
        protected $title;
        protected $writer;
        function setBook($title,$writer)
        {
            $this->title=$title;
            $this->writer=$writer;
        }
        function getBook()
        {
            echo "\nTitle: $this->title\nWriter: $this->writer\n";
        }
    }

    class Comics extends Books
    {
        private $artist;
        public function setBook($title,$writer,$artist="")
        {
            parent::setBook($title,$writer);
            $this->artist=$artist;
        }
        function getBook()
        {
            echo "\nTitle: $this->title\nWriter: $this->writer\nArtist: $this->artist\n";
        }
        
    }

    $book1=new Books();
    $book1->setBook("Randamoozham","MT Vasudevan Nair");
    $book1->getBook();

    $book2=new Comics();
    $book2->setBook("All-Star Superman","Grant Morrison","Frank Quitley");
    $book2->getBook();
?>