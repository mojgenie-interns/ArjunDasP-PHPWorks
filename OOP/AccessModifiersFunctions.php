<?php
    class Instagram
    {
        public $accountName;
        public $userName;
        public $password;

        function setAccountName($accountName)
        {
            $this->accountName=$accountName;
        }
        private function setUserName($userName)
        {
            $this->userName=$userName;
        }
        protected function setPassword($password)
        {
            $this->password=$password;
        }

    }
    $user1=new Instagram();
    $user1->setAccountName("Arjun");
    $user1->setUserName("nishadasan");
    $user2->setPassword(8547323068);
?>