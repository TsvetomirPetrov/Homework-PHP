<?php
$n = 145;
$has = 'no';
if ($n>100){
    for($i=100; $i<=$n; $i++){
        if($i>999){
            break;
        }
        $number = ''.$i;
        if($number[0]!=$number[1] && $number[1]!=$number[2] && $number[0]!=$number[2]){
            echo $i.', ';
            $has = 'yes';
        }
    }
}
if ($has=='no'){
    echo('no');
}
?>