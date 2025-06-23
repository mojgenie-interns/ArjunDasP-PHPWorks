<?php
    class DisplayStudentDetails
    {
        function studentDetails(iterable $students)
        {
            foreach($students as $student)
            {
                echo $student,"\t";
            }
        }
    }

    $student1=new DisplayStudentDetails();
    echo "Roll No.\tName\tDate of Birth\n";
    $student1->studentDetails([4,"Arjun Das P","20-10-2002"]);
?>