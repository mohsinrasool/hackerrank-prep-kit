<?php

// Complete the maximumToys function below.
function maximumToys($prices, $k) {

    $size = count($prices);
    $sum = 0;
    $tmp = 0;

    for( $i=0; $i < $size; $i++ ) {
        for( $j=$i; $j < $size; $j++ ) {
            if( $prices[$j] < $prices[$i] ) {
                $tmp = $prices[$j];
                $prices[$j] = $prices[$i];
                $prices[$i] = $tmp;
            }
        }
        $sum += $prices[$i];
        if( $sum > $k ) {
            echo "sum = " . $sum . " | k = " . $k . "\n";
            print_r($prices);
            break;
        }
    }

    return $i;

/*
    $prices = mergeSort($prices);

    $sum = 0;
    for($i=0; $i < count($prices); $i++) {
        $sum += $prices[$i];
        if( $sum >= $k )
            break;
    }

    return $i;
    */
}

function mergeSort($my_array){
    if(count($my_array) == 1 ) return $my_array;
    $mid = count($my_array) / 2;
    $left = array_slice($my_array, 0, $mid);
    $right = array_slice($my_array, $mid);
    $left = mergeSort($left);
    $right = mergeSort($right);
    return merge($left, $right);
}

function merge($left, $right){
    $res = array();
    while (count($left) > 0 && count($right) > 0){
        if($left[0] > $right[0]){
            $res[] = $right[0];
            $right = array_slice($right , 1);
        }else{
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }
    }
    while (count($left) > 0){
        $res[] = $left[0];
        $left = array_slice($left, 1);
    }
    while (count($right) > 0){
        $res[] = $right[0];
        $right = array_slice($right, 1);
    }
    return $res;
}


$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nk_temp);
$nk = explode(' ', $nk_temp);

$n = intval($nk[0]);

$k = intval($nk[1]);

fscanf($stdin, "%[^\n]", $prices_temp);

$prices = array_map('intval', preg_split('/ /', $prices_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = maximumToys($prices, $k);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
