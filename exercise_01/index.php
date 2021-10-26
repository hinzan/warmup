<?php
class RepeatingLetters{
    public function get($string){
        $string = strtolower(preg_replace('/[^A-Za-z0-9.!?[:space:]]/', '', $string));
        $string_array = str_split($string);
        $result = array_count_values($string_array);   
        foreach($result as $r){
            if($r > 1){
                return FALSE;
            }
        } 
        return TRUE;  
    }
}

$o = new RepeatingLetters();
var_dump($o->get('six-year-old'));
//var_dump($o->get('six-year-old'));
?> 