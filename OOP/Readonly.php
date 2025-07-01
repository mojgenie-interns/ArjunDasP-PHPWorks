<?php
    readonly class MaryMathaCollege
    {
        public int $rollNo;
        public string $name;
        public string $department;
        public string $college;
        function __construct($rollNo,$name,$department,$college)
        {
            $this->rollNo=$rollNo;
            $this->name=$name;
            $this->department=$department;
            $this->college=$college;
        }
        function getDetails()
        {
            echo "Roll No: $this->rollNo\nName: $this->name\nDepartment: $this->department\nCollege: $this->college\n";
        }
    }

    $student1=new MaryMathaCollege(1,"Abhiram E","Computer Science","Mary Matha Arts & Science College");
    $student1->getDetails();

    // $student1->college="Mahatma Gandhi College";
?>