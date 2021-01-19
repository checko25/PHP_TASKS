<?php

if (isset($_POST['time']) and isset($_POST['cycle'])){
$time=$_POST['time'];
$cycle = $_POST['cycle'];
} else {
    echo ("Where is POST?");
}
Function getResult($time,$cycle)

{
    $count = $time / $cycle;
    $red_bact = 1;
    $green_bact = 1;
    for ($i = 0; $i < $count; $i++) {
        $green_new = $red_bact * 2 + $green_bact * 2;
        $red_new = $green_bact * 3;
        $green_bact = $green_new;
        $red_bact = $red_new;
    }
    echo "Количество полученных зеленых бактерий за ".$time." секунд: ".($green_bact).'<br>';
    echo "Количество полученных красных бактерий за ".$time." секунд: ".($red_bact).'<br>';
}
require ('form.php');
if (isset($time) and isset($cycle)) {
    getResult($time,$cycle);
}
?>