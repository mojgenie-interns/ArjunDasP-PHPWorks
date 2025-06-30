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
            $this->data=array_fill(0,$size,array_fill(0,$size,0));
            $this->currentRow=0;
            $this->currentColumn=(int)($size/2);
        }

        function moveDown()
        {
            $this->currentRow=($this->currentRow+1)%$this->size;
        }

        function set($row,$column,$value)
        {
            $this->data[$row][$column]=$value;
        }

        function get($row,$column)
        {
            return $this->data[$row][$column];
        }

        function isOccupied($row,$column)
        {
            return $this->get($row,$column)!=0;
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

    class magicSquare
    {
        public circularGrid $grid;
        public $size;

        function __construct($size)
        {
            if($size%2==0)
                throw new Exception("Enter an odd number");
            $this->size=$size;
            $this->grid=new circularGrid($size);
        }

        function generate()
        {
            for($number=1;$number<=$this->size*$this->size;$number++)
            {
                $this->grid->setCurrent($number);
                $nextRow=($this->grid->currentRow-1+$this->size)%$this->size;
                $nextColumn=($this->grid->currentColumn+1)%$this->size;
                if($this->grid->isOccupied($nextRow,$nextColumn))
                    $this->grid->moveDown();
                else
                    {
                        $this->grid->currentRow=$nextRow;
                        $this->grid->currentColumn=$nextColumn;
                    }
            }   
        }

        function getMagicSum()
        {
            return (int) ($this->size*($this->size**2+1)/2);
        }

        function display(gridDisplayInterface $display)
        {
            $display->display($this->grid);
        }
    }

    $size=readline("Enter the size: ");
    $magicSquare1=new magicSquare($size);
    $magicSquare1->generate();
    $magicSquare1->display(new consoleDisplay());
    echo "Magic sum=",$magicSquare1->getMagicSum();
?>