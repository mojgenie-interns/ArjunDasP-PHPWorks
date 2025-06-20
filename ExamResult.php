<?php
    $marks=readline("Enter your marks: ");
    if($marks>40 && $marks<=50)
        echo "You got A grade.";
    elseif($marks>30 && $marks<=40)
        echo "You got B grade.";
    elseif($marks>20 && $marks<=30)
        echo "You got C grade.";
    elseif($marks>10 && $marks<=20)
        echo "You got D grade.";
    elseif($marks<=10)
        echo "You got E grade.";
    else
        echo "Invalid entry";
?>
    
