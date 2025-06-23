<?php
     class Username
     {
        public $username;
        final function display($username)
        {
            $this->username=$username;
            echo "Username: $username";
        }
     }
     class Password extends Username
     {
        public $password;
        function display($password)
        {
            $this->password=$password;
            echo "Password: $password";
        }
     }
     $user1=new Password();
     $user1->display("nishadasan");
?>