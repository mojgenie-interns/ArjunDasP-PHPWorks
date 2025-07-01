<?php
    
    class ticTacToe
    {
        public $board;
        public $currentPlayer;
        
        function __construct()
        {
            $this->board=[[0,0,0],[0,0,0],[0,0,0]];
            $this->currentPlayer='X';
        }

        function displayBoard()
        {
            foreach($this->board as $row)
            {
                foreach($row as $column)
                {
                    echo $column."\t";
                }
                echo PHP_EOL;
            }
            echo PHP_EOL;
        }

        function isValidMove($row,$column)
        {
            return $row>0 && $row<3 && $column>0 && $column<3 && $this->board[$row][$column]==0;
        }

        function checkWinner()
        {

            for($i=0;$i<=3;$i++)
            {
                if($this->board[$i][0]==$this->board[$i][1] && $this->board[$i][1]==$this->board[$i][2] && $this->board[$i][2]!=0)
                    return true;
                if($this->board[0][$i]==$this->board[1][$i] && $this->board[1][$i]==$this->board[0][$i] && $this->board[0][$i]!=0)
                    return true;
            }
            if($this->board[0][0]==$this->board[1][1] && $this->board[1][1]==$this->board[2][2] && $this->board[2][2]!=0)
                return true;
            if($this->board[0][1]==$this->board[1][1] && $this->board[1][1]==$this->board[2][0] && $this->board[2][0]!=0)
                return true;
            return false;
        }

        public function play()
        {
            $turn=0;
            while(true)
            {
                $this->displayBoard();
                $cell=readline("Player $this->currentPlayer, enter the row and column: ");
                list($row,$column)=explode("",$cell);
            }
        }
    }

    $test1=new ticTacToe();
    $test1->displayBoard();
?>