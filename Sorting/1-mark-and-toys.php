<?php

// Complete the maximumToys function below.
function maximumToys($prices, $k) {

    $size = count($prices);
    $sum = 0;
    $tmp = 0;

    for( $i=0; $i < $size; $i++ ) {
        
        // loop starts from next element
        for( $j=$i; $j < $size; $j++ ) {
        
            if( $prices[$j] < $prices[$i] ) {

                // swap prices
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
