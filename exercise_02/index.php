<?php
class Literal{
    public function get($date_string){
        $string = trim($date_string, "The");
        $date = new DateTime($string);
        return $date_string . " => " . $date->format('Y-m-d');       
    }
}

$o = new Literal();
echo $o->get('The last Wednesday of October 2019');
?> 