<?php
/*
* @param mixed $data
* @return void
*/
function prePrint($data){
    echo '<pre>'.var_dump($data).'</pre>';
}