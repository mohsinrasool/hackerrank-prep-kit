<?php

// Complete the maximumPerimeterTriangle function below.
function maximumPerimeterTriangle($sticks) {

    $size = count( $sticks );

    if( $size < 3 )
        return -1;

    $tmp = 0;

    // sort the array 
    for( $i=0; $i < $size; $i++ ) {
        for( $j=$i; $j < $size; $j++ ) {
            if( $sticks[$i] > $sticks[$j] ) {
                $tmp = $sticks[$j];
                $sticks[$j] = $sticks[$i];
                $sticks[$i] = $tmp;
            }
        }
    }

    $max = 0;       // to ensure that maximum perimeter triangle is selected
    $points = array(); // to store the max permieter triangle

    for( $i=0; $i < $size-2; $i++ ) {
        // check if non-degenerate triangle is possible
        if( $sticks[$i] + $sticks[$i+1] > $sticks[$i+2] ) {
            // check if its the maximum non-degenerate triangle
            if( $sticks[$i] + $sticks[$i+1] + $sticks[$i+2] > $max ) {
                // update the $max and $points
                $max = $sticks[$i] + $sticks[$i+1] + $sticks[$i+2];
                $points = array( $sticks[$i], $sticks[$i+1], $sticks[$i+2] );
            } 
        }
    }

    return empty($points) ? -1 : $points;
}


$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $sticks_temp);

$sticks = array_map('intval', preg_split('/ /', $sticks_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = maximumPerimeterTriangle($sticks);

if( is_array($result) )
    fwrite($fptr, implode(" ", $result) . "\n");
else
    fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
