<?php

interface FileSystemMenu
{
    public function display();
}



class SimpleFileSystem implements FileSystemMenu
{
    function __construct() {}

    function createFile() {}

    function openFile() {}

    function writeFile() {}

    function appendFile() {}

    function save() {}

    function display()
    {
        $fileName = readline("Enter the filename: ");
        while (true) {
            echo "\n1. Open file\n2. Create file\n3. Write file\n4. Append file\n5. Close\n";
            $option = readline("Select the option: ");
            if ($option == 1)
                $this->openFile();
            elseif ($option == 2)
                $this->createFile();
            elseif ($option == 3)
                $this->writeFile();
            elseif ($option == 4)
                $this->appendFile();
            elseif ($option == 5)
                return;
            else
                echo "Invalid input. Try again.";
        }
    }
}
