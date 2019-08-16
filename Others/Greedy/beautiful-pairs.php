<?php

// Complete the beautifulPairs function below.
function beautifulPairs($A, $B) {

    $noOfPairs = 0;
    $usedAi = array();
    $nonUsedAi = -1;
    $nonUsedBi = -1;

    for( $i=0; $i < count($A); $i++ ) {
        for( $j=0; $j < count($B); $j++ ) {

            if( $A[$i] == $B[$j]  ) {
                $usedAi[$i] = 1;
                $B[$j] = -1;
                $noOfPairs ++;
                break;
            }
        }

        // Locate non used element in A  
        if( $nonUsedAi == -1 && !isset( $usedAi[$i] ) ) 
            $nonUsedAi = $i;
    }

    // Find non used element in B
    for( $j=0; $j < count($B); $j++ ) {
        if( $B[$j] != -1 ) {
            $nonUsedBi = $j;
            break; 
        }
    }

    // If there are non used elements, additional pair is possible
    if( $nonUsedAi != -1 && $nonUsedBi != -1 )
        $noOfPairs ++;
    else 
        $noOfPairs --; // We have to change exactly one element in B which cause us to loss a pair.

    return $noOfPairs;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $A_temp);

$A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));

fscanf($stdin, "%[^\n]", $B_temp);

$B = array_map('intval', preg_split('/ /', $B_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = beautifulPairs($A, $B);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
