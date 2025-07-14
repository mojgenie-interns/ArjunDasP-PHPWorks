<?php

interface FileSystemMenu
{
    public function display();
}

class SimpleFileSystem implements FileSystemMenu
{
    private $fileName;
    private $fileHandle;

    function __construct() {}

    function createFile()
    {
        $this->fileHandle = fopen($this->fileName, 'w');
        if ($this->fileHandle) {
            echo "\nFile created successfully.\n";
            fclose($this->fileHandle);
        } else {
            echo "\nFailed to create file.\n";
        }
    }

    function openFile()
    {
        if (!file_exists($this->fileName)) {
            echo "\nFile does not exist.\n";
            return;
        }
        $this->fileHandle = fopen($this->fileName, 'r');
        if ($this->fileHandle) {
            echo "\nFile opened successfully.\n";
            while (($line = fgets($this->fileHandle)) !== false) {
                echo $line;
            }
            fclose($this->fileHandle);
        } else {
            echo "\nFailed to open file.\n";
        }
    }

    function writeFile()
    {
        $content = readline("\nEnter content to write: ");
        $this->fileHandle = fopen($this->fileName, 'w');
        if ($this->fileHandle) {
            fwrite($this->fileHandle, $content . "\n");
            fclose($this->fileHandle);
            echo "Content written successfully.\n";
        } else {
            echo "Failed to write to file.\n";
        }
    }

    function appendFile()
    {
        $content = readline("\nEnter content to append: ");
        $this->fileHandle = fopen($this->fileName, 'a');
        if ($this->fileHandle) {
            fwrite($this->fileHandle, $content . "\n");
            fclose($this->fileHandle);
            echo "Content appended successfully:\n";
        } else {
            echo "\nFailed to append to file.\n";
        }
    }

    function display()
    {
        $this->fileName = readline("Enter the filename: ");
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
                echo "Invalid input. Try again.\n";
        }
    }
}

$menu = new SimpleFileSystem();
$menu->display();
