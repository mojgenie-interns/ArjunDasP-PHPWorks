<?php

class LibraryManagementSystem
{
    protected $file = 'log.json';
    protected $books = [];
    public $bookTitle;
    public $bookAuthor;
    public $bookLanguage;

    public function __construct()
    {
        if (file_exists($this->file))
            $this->books = json_decode(file_get_contents($this->file), true);
    }

    function save()
    {
        file_put_contents($this->file, json_encode($this->books, JSON_PRETTY_PRINT));
    }

    function libraryMenu()
    {
        echo "\n=== LIBRARY SYSTEM ===\n";
        while (true) {
            echo "\n--- MENU ---";
            $choice = readline("\n1. Take book\n2. Return book\n3. Exit\nEnter the option: ");
            if ($choice == 1)
                $this->takeBook();
            elseif ($choice == 2)
                $this->returnBook();
            elseif ($choice == 3) {
                break;
            } else
                echo "Invalid entry. Try again.\n";
        }
    }

    function takeBook()
    {
        echo "\n--- Available Books ---\n";
        foreach ($this->books as $book) {
            echo "- " . $book['title'] . " by " . $book['author'] . " (" . $book['language'] . ")\n";
        }

        $this->bookTitle = trim(readline("Enter the title to take: "));

        foreach ($this->books as $index => $book) {
            if (strtolower($this->bookTitle) === strtolower($book['title'])) {
                echo "\nYou have successfully taken " . $book['title'] . "\n";
                unset($this->books[$index]);
                return;
            }
        }

        echo "\nBook not found!\n";
    }


    function returnBook()
    {
        echo "\n--- Add New Book ---\n";
        $this->bookTitle = trim(readline("Enter the title: "));
        foreach ($this->books as $book)
            if ($this->bookTitle === $book['title']) {
                echo $this->bookTitle . " already exists!\n";
                return;
            }

        $this->bookAuthor = trim(readline("Enter the author's name: "));
        $this->bookLanguage = trim(readline("Enter the language: "));
        $this->books[] = [
            'title' => $this->bookTitle,
            'author' => $this->bookAuthor,
            'language' => $this->bookLanguage
        ];
        echo "Added successfully.\n";
        $this->save();
    }
}

$library = new LibraryManagementSystem();
$library->libraryMenu();
