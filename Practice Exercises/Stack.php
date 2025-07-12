<?php

class Stack
{
    public array $stack;
    public int $max;
    public int $top;

    function __construct()
    {
        $this->stack = [];
        $this->top = -1;
        $this->max = (int)readline("Enter the size: ");
    }

    function displayStack()
    {
        if ($this->top == -1) {
            echo "\nStack is empty.\n";
            return;
        }

        echo "\n[";
        for ($i = 0; $i <= $this->top; $i++) {
            echo " " . $this->stack[$i] . " ";
        }
        echo "]\n";
    }

    function push()
    {
        if ($this->top == $this->max - 1)
            echo "\nStack overflow!\n";
        else {
            $this->top++;
            $number = readline("\nEnter the number to push: ");
            $this->stack[$this->top] = $number;
        }
    }

    function pop()
    {
        if ($this->top == -1)
            echo "\nStack underflow!\n";
        else {
            unset($this->stack[$this->top]);
            $this->top--;
        }
    }

    function menu()
    {
        while (true) {
            echo "\n=== STACK MENU ===\n1. Display\n2. Push\n3. Pop\n4. Exit";
            $choice = readline("\nEnter the option: ");
            if ($choice == 1)
                $this->displayStack();
            elseif ($choice == 2)
                $this->push();
            elseif ($choice == 3)
                $this->pop();
            elseif ($choice == 4) {
                break;
            } else
                echo "Invalid entry. Try again.\n";
        }
    }
}

$stack1 = new Stack;
$stack1->menu();
