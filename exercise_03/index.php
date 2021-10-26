<?php

class Stringmerge{
    
    public function get($param1, $param2){
        $param1 = (string)$param1;
        $param2 = (string)$param2;
        return $this->set($param1, $param2);
    }

    private function set($param1, $param2){
        $param1_a = str_split($param1);
        $param2_a = str_split($param2);      
       echo  $this->merge($param1_a, $param2_a);
    }

    private function merge($param1, $param2){
            $i = 0;
            $j = 0;
            $k = 0;
            $param1_count = count($param1); 
            $param2_count = count($param2);
            $result_array = array();
            $result = "";

            while ($i <= $param1_count && $j <= $param2_count){
                $result_array[$k++] = @$param1[$i++];
                $result_array[$k++] = @$param2[$j++];
            }

            while ($i < $param1_count) {
                $result_array[$k++] = $param1[$i++];
            }

            while($j < $param2_count) {
                $result_array[$k++] = $param2[$j++];
            }

            for ($i = 0; $i < ($param1_count + $param2_count); $i++){
                $result .= $result_array[$i];
            }
            return $result;
    }
}
$o = new Stringmerge();
echo $o->get('MICHAEL', 'JORDAN');
?>