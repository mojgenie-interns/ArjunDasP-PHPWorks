<?php
    
    interface gridDisplayInterface
    {
        function display(circularGrid $grid);
    }

    class consoleDisplay implements gridDisplayInterface
    {
        function display(circularGrid $grid)
        {
            foreach($grid->getData() as $row)
            {
                foreach($row as $column)
                {
                    echo $column."\t";
                }
                echo PHP_EOL;
            }
        }
    }

    class circularGrid
    {
        public $data;
        public $size;
        public $currentRow;
        public $currentColumn;

        function __construct($size)
        {
            $this->size=$size;
            $this->data = array_fill(0,$size,array_fill(0,$size,0));
            $this->currentRow = 0;
            $this->currentColumn = (int)($size / 2);
        }

        function moveDown()
        {
            $this->currentRow = ($this->currentRow + 1) % $this->size;
        }

        function set($row,$column,$value)
        {
            $this->data[$row][$column] = $value;
        }

        function isOccupied($row,$column)
        {
            return $this->data[$row][$column] != 0;
        }

        function setCurrent($value)
        {
            $this->set($this->currentRow,$this->currentColumn,$value);
        }

        function getData()
        {
            return $this->data;
        }
    }

    class magicSquare extends circularGrid
    {
        public $size;

        function __construct($size)
        {
            if($size % 2 == 0)
                throw new Exception("Enter an odd number");
            $this->size=$size;
            parent::__construct($size);
        }

        function generate()
        {
            for($number = 1;$number <= $this->size * $this->size;$number++)
            {
                $this->setCurrent($number);
                $nextRow=($this->currentRow - 1 + $this->size) % $this->size;
                $nextColumn=($this->currentColumn + 1) % $this->size;
                if($this->isOccupied($nextRow,$nextColumn))
                    $this->moveDown();
                else
                    {
                        $this->currentRow = $nextRow;
                        $this->currentColumn = $nextColumn;
                    }
            }   
        }

        function getMagicSum()
        {
            return (int) ($this->size * ($this->size ** 2 + 1) / 2);
        }

        function display(gridDisplayInterface $display)
        {
            $display->display($this);
        }

        function isMagic()
        {
            $sumExpected=$this->getMagicSum();
            
            for($row = 0;$row<$this->size;$row++)
            {
                $sum = 0;
                for($column = 0;$column<$this->size;$column++)
                {
                    $sum+=$this->data[$row][$column];
                }
                echo "\nSum of row $row=",$sum;
            }

            for($column = 0;$column<$this->size;$column++)
            {
                $sum = 0;
                for($row = 0;$row<$this->size;$row++)
                {
                    $sum += $this->data[$row][$column];
                }
                echo "\nSum of column $column=",$sum;
            }

            $sumOfDiagonal1 = 0;
            for($i = 0;$i<$this->size;$i++)
                $sumOfDiagonal1 += $this->data[$i][$i];
            echo "\nSum of diagonal 1=",$sumOfDiagonal1;

            $sumOfDiagonal2 = 0;
            for($i = 0;$i<$this->size;$i++)
                $sumOfDiagonal2 += $this->data[$i][$this->size - $i - 1];
           echo "\nSum of diagonal 2=",$sumOfDiagonal2;
        }
    }

    $size=readline("Enter the size: ");
    $magicSquare1=new magicSquare($size);
    $magicSquare1->generate();
    $magicSquare1->display(new consoleDisplay());
    echo "Magic sum=",$magicSquare1->getMagicSum(),PHP_EOL;
    $magicSquare1->isMagic();
?>