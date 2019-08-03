<?php

// Complete the minimumSwaps function below.
function minimumSwaps($arr) {

    $swapCount = 0;
    $arrayLength = count( $arr );

    $min = $arr[0];
    for( $i=0; $i < $arrayLength; $i++ ) {
        $min = ($min > $arr[$i]) ? $arr[$i] : $min;
    }

    for( $i=0; $i < $arrayLength; ) {
        if( $arr[$i] != $i + $min ) {

            $tmp = $arr[ $arr[$i]-$min ] ; 
            $arr[ $arr[$i]-$min ] = $arr[$i];
            $arr[$i] = $tmp;
            $swapCount ++;
        }
        else
            $i ++;
    }

    return $swapCount;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$res = minimumSwaps($arr);

fwrite($fptr, $res . "\n");

fclose($stdin);
fclose($fptr);
