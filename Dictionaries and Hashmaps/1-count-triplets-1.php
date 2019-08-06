<?php

// Complete the countTriplets function below.
function countTriplets($arr, $r) {

    $countTriplets = 0;
    $n = count( $arr );

    for( $i=0; $i < $n; $i++) {
        for( $j=$i; $j < $n; $j++) {
            for( $k=$j; $k < $n; $k++) {

                if($arr[$i] == $arr[$j]/$r && $arr[$j] == $arr[$k]/$r) {
                    //echo "(".$arr[$i].",".$arr[$j].",".$arr[$k].")\n";
                    echo "(".$i.",".$j.",".$k.")\n";
                    $countTriplets ++;
                }
            }
        }
    }
    return $countTriplets;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$nr = explode(' ', rtrim(fgets(STDIN)));

$n = intval($nr[0]);

$r = intval($nr[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$ans = countTriplets($arr, $r);

fwrite($fptr, $ans . "\n");

fclose($fptr);
