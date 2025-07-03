<?php

    class TextAdventureGame 
    {
        public $playerName;
        function __construct()
        {
            $this->playerName=readline("Enter your name: ");         
        }
        function opening()
        {
            echo "$this->playerName\n";
        }

    }

    $play=new TextAdventureGame();
    $play->opening();
?>