<?php

// Complete the countTriplets function below.
function countTriplets($arr, $r) {
    
    $countTriplets = 0;
    $n = count( $arr );
    $dict = array();
    $bag1 = array();
    $bag2 = array();

    for( $i=0; $i < $n; $i++) {
        $current = $arr[$i];
        $next = $current * $r;

        // if current in bag to, means triplet occured
        if( isset( $bag2[$current]) ) 
            $countTriplets += $bag2[$current];


        // if current is in bag 1, put the next in bag 2
        if( isset( $bag1[$current]) )  {
            if( !isset( $bag2[$next] ) )
                $bag2[$next] = 0;
            $bag2[$next] += $bag1[$current];
        }

        if( !isset( $bag1[$next] ) )
            $bag1[$next] = 0;
        // put next in bag 1
        $bag1[$next] ++;
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
