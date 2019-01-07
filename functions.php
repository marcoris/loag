<?php

/**
 * This function returns an array beautyfied
 * 
 * @param array $array the array to display beautyfied
 * 
 * @output print pre array
 */
function pvd($array)
{
    $data = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT,1);
    
    print "pvd::".$data[0]["file"]."->".$data[0]["line"]."<br>";
    print "<pre title='".$data[0]["file"]."->".$data[0]["line"]."'>";
    var_dump($array);
    print "</pre>";
}
