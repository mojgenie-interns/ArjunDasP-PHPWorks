<?php

class PalindromeChecker
{
    public string $text;

    function __construct()
    {
        $this->text = "";
    }

    function readText()
    {
        $this->text = readline("Enter the text: ");
    }

    function methodOne()
    {
        $text = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $this->text)); // removes all characters that are not letters or digits
        $length = strlen($text);
        $isPalindrome = true;

        for ($i = 0; $i < (int)($length / 2); $i++) {
            if ($text[$i] !== $text[$length - $i - 1]) {
                $isPalindrome = false;
                break;
            }
        }

        if ($isPalindrome)
            echo "String is palindrome.\n";
        else
            echo "String is not palindrome.\n";
    }

    function methodTwo()
    {
        if ($this->text === strrev($this->text))
            echo "String is palindrome.\n";
        else
            echo "String is not palindrome.\n";
    }
}

$check1 = new PalindromeChecker;
$check1->readText();
$check1->methodOne();
$check1->methodTwo();
