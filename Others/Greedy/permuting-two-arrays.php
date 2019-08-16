<?php

// Complete the twoArrays function below.
function twoArrays($k, $A, $B) {

    sort($A);
    rsort($B);

    for( $i=0; $i < count($A); $i++ ) {
        if( $A[$i] + $B[$i] < $k )
            return 'NO';
    }
    return 'YES';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $q);

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    fscanf($stdin, "%[^\n]", $nk_temp);
    $nk = explode(' ', $nk_temp);

    $n = intval($nk[0]);

    $k = intval($nk[1]);

    fscanf($stdin, "%[^\n]", $A_temp);

    $A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));

    fscanf($stdin, "%[^\n]", $B_temp);

    $B = array_map('intval', preg_split('/ /', $B_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = twoArrays($k, $A, $B);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
