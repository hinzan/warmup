<?php
    class Superdigit{
        private $number;

        public function get($input){
            $this->number = $input;
            return $this->calc($this->clean());
        }

        private function clean(){
            $number = (string)$this->number;
            for($count=0; $count <= strlen($number)-1; $count++){
                    $num[$count] = (int)$number[$count];        
            }
            return $num;
        }

        private function calc($numbers){
            $sum = 0;
            foreach($numbers as $n){
                $sum +=$n; 
            }
            if(strlen((string)$sum) > 1){
                $this->number = $sum;
                return $this->calc($this->clean());
            } else {
                return $sum;
            }
        }
    }

    $o = new Superdigit();
    echo $o->get(12554);
?>