<?php

// Complete the countSwaps function below.
function countSwaps($a) {

    $size = count($a);
    $numSwaps = 0;
    $tmp = 0;

    for( $i=0; $i < $size; $i++ ) {
        for( $j=$i; $j < $size; $j++ ) {
            if( $a[$j] < $a[$i] ) {
                // Swap the two
                $a[$i] = $a[$j] + $a[$i];
                $a[$j] = $a[$i] - $a[$j];
                $a[$i] = $a[$i] - $a[$j];
                $numSwaps ++;
            }
        }
    }

    printf( "Array is sorted in %d swaps.\n", $numSwaps );
    printf( "First Element: %d\n", $a[0] );
    printf( "Last Element: %d\n", $a[$size-1] );
}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $a_temp);

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

countSwaps($a);

fclose($stdin);
