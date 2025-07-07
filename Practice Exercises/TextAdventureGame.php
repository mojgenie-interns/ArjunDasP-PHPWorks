<?php
//Vaval The Game

class LevelZero //Opening
{
    public string $protagonistName;
    private string $gameTitle;
    function __construct()
    {
        $this->protagonistName = readline("Enter your name: ");
        $this->gameTitle = "
        
 __ __   ____  __ __   ____  _         
|  |  | /    ||  |  | /    || |        
|  |  ||  o  ||  |  ||  o  || |        
|  |  ||     ||  |  ||     || |___     
|  :  ||  _  ||  :  ||  _  ||     |    
 \   / |  |  | \   / |  |  ||     |    
  \_/  |__|__|  \_/  |__|__||_____|    
                                       
";
    }
    function sceneOne()
    {
        echo "\nHow is your work going, $this->protagonistName?\n";
        readline("Enter the response: ");
        echo "Okay.\n";

        echo "\nAre you on the way to office?";
        $response1 = readline("\nEnter the response, yes[y] or no[n]: ");
        if ($response1 == 'y' || $response1 == 'Y')
            echo "Okay.\n";
        elseif ($response1 == 'n' || $response1 == 'N') {
            echo "\nOh, then where are you going this early?\n";
            readline("Enter the response: ");
        } else
            echo "Oh, man.\n";

        echo "\n$this->protagonistName, look at the store. There is somebody threatening the shopkeeper.";
        echo "\nWhat we are going to do about this?";
        echo "\nI know you have a bat mask in your bag.";
        readline("\nEnter the response: ");
        $response2 = readline("\nAre you ready to fight him?  yes[y] or no[n]: ");
        if ($response2 == 'y' || $response2 == 'Y') {
            echo "\nGreat, I think its hero time.\n";
            $this->sceneTwo();
        } elseif ($response1 == 'n' || $response1 == 'N') {
            echo "\nYou think you are not ready for this.\n";
            // echo "Bro, there is no perfect time. You waited for such a situation for a long time. Act!\n";
            echo "\nGame over!";
            $decision1 = readline("\nAre you going to continue your walk, yes[y] or no[n]: ");
            if ($response1 == 'y' || $response1 == 'Y')
                echo "OK! Then go.\nGame over!";
            elseif ($response1 == 'n' || $response1 == 'N') {
                echo "Then, come on man";
                $this->sceneThree();
            } else {
                echo "Bro, there is no perfect time. You waited for such a situation for a long time. Act!\n";
                $decision1A = readline("\nAre you ready?  yes[y] or no[n]: ");
                if ($response2 == 'y' || $response2 == 'Y') {
                    $this->sceneTwo();
                } else {
                    echo "Think $this->protagonistName think.\n";
                    echo "Game over!";
                }
            }
        }
    }

    function sceneTwo()
    {
        echo "\nIn the Store";
        $decision2 = readline("\nWhat are you going to do?\n1. Talk to the bad guy\n2. Run into him\n3. Throw him with something\n");
        if ($decision2 == 1) {
            echo "\nHe refuses to talk. He hit him.\n";
            $decision2A = readline("\nWhat are you gonna do now? Hit him back? yes[y] or no[n]: ");
            if ($decision2A == 'y' || $decision2A == 'Y') {
                echo "\nHe hit back\nThe bad guy blacked out.";
                $this->sceneThree();
            } elseif ($decision2A == 'n' || $decision2A == 'N') {
                echo "\nThe bad guy hit $this->protagonistName again and again and again, until he blacked out";
                echo "\nGame over!";
            }
        } elseif ($decision2 == 2) {
            echo "\nHe knocked him out in one punch";
            $this->sceneThree();
        } elseif ($decision2 == 3) {
            $decision2B = readline("\nTake something in the store to throw\n1. A beer bottle\n2. A cat\n3. A packet of snacks\n");
            switch ($decision2B) {
                case 1:
                    echo "The bad guy knocked out.";
                    $this->sceneThree();
                    break;

                case 2:
                    echo "The frightened cat ran away.";
                    echo "\nGame over!";
                    break;
                case 3:
                    echo "It has no effect on him.";
                    echo "\nGame over!";
                    break;
                default:
                    echo "Throw something bro";
                    echo "\nGame over!";
            }
        } else {
            echo "\nYou have to do something. ASAP.";
            echo "\nGame over!";
        }
    }

    function sceneThree()
    {
        echo "\n$this->protagonistName won.";
        echo "\nIt was his desire to be a hero from his childhood.";
        echo "\nPeople gathered around and praised him.";
        echo "\nFrom now he came to be known as the hero called...";
        echo "\nMeanwhile, some random kid from mob: Nokk mammy...";
        echo "\n" . $this->gameTitle;
    }
}

$play = new LevelZero;
$play->sceneOne();
