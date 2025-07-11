<?php

class Chatbot
{

    private $question;
    private $questionArray;

    function __construct()
    {
        $this->questionArray = [];
        date_default_timezone_set('Asia/Kolkata');
    }

    function getResponse()
    {
        $this->question = strtolower(readline("You: "));
        $this->questionArray = explode(" ", $this->question);
        $this->giveReply();
    }

    function giveReply()
    {
        if (in_array('how', $this->questionArray) && in_array('you', $this->questionArray))
            echo "Computer: Fine. Thank you for asking.";
        elseif (in_array('fine', $this->questionArray) || in_array('good', $this->questionArray) || in_array('cool', $this->questionArray))
            echo "Computer: That's great.";
        elseif ((in_array('time', $this->questionArray)) || (in_array('time?', $this->questionArray)))
            echo "Computer: The time is " . date("H:i:s");
        elseif ((in_array('date', $this->questionArray)) || (in_array('date?', $this->questionArray)))
            echo "Computer: " . "It's " . date("Y-m-d");
        else
            echo "Computer: Can you specify the question?";
    }

    function run()
    {
        echo (("Computer: What's up?\n"));
        $this->getResponse();
    }
}

$chat = new Chatbot;
$chat->run();
