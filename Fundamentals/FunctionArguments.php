<?php
    function studentDetails($rollNo,$name,$college)
    {
        echo "Roll no: $rollNo\tName: $name\tCollege: $college\n";       
    }

    $rollNo=readline("Enter the roll no: ");
    $name=readline("Enter the name: ");
    $college=readline("Enter the college name: ");
    studentDetails($rollNo,$name,$college);
?>