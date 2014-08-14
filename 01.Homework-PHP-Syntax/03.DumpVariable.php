<?php
$input = array("hello", 15,1.234, array(1,2,3),(object)[2,34]);
for ($i=0; $i<sizeof($input); $i++){
    $numeric = $input[$i];
    $notNumeric = gettype($numeric);
    if ($notNumeric=="double" || $notNumeric=="integer"){
        echo var_dump($numeric);
    }
    else{
        echo $notNumeric;
    }
    echo '<br/>';
}
?>