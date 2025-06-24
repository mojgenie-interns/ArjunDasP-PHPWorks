<?php
    class NumbersFromOneToTen
    {
        function displayNumbers(iterable $numbers)
        {
            foreach($numbers as $number)
            {
                echo $number."\t";
            }

        }
    }

    $firstRun=new NumbersFromOneToTen();
    $firstRun->displayNumbers([1,2,3,4,5,6,7,8,9,10]);
?>