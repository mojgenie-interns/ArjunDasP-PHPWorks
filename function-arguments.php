<?php
    function studentDetails($roll_no,$name,$college)
    {
        echo "Roll no: $roll_no\tName: $name\tCollege: $college\n";       
    }

    $roll_no=readline("Enter the roll no: ");
    $name=readline("Enter the name: ");
    $college=readline("Enter the college name: ");
    studentDetails($roll_no,$name,$college);
?>