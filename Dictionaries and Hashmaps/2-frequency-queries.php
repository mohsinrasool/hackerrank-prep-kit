<?php

// Complete the freqQuery function below.
function freqQuery($queries) {

    $dict = array();    // To store number of counts of each element
    $freq = array();    // To store number of elements with a specific freq
    $output = array();

    for($i=0; $i < count($queries); $i++) {
        $data = $queries[$i][1];

        switch( $queries[$i][0] ) {
            case 1:
                if( !isset( $dict[$data] ) )
                    $dict[ $data ] = 0;

                $oldFreq = $dict[ $data ];
                $newFreq = $oldFreq + 1;

                if( !isset( $freq[ $oldFreq ] ) )
                    $freq[ $oldFreq ] = 0;

                if( !isset( $freq[ $newFreq ] ) )
                    $freq[ $newFreq ] = 0;

                // remove element from earlier frequency bag
                $freq[ $oldFreq ] --;

                // add count
                $dict[ $data ] ++;

                // add element to new frequency bag
                $freq[ $newFreq ] ++;

                break;
            case 2:
            
                if( isset( $dict[$data] ) && $dict[$data] > 0) {

                    $oldFreq = $dict[ $data ];
                    $newFreq = $oldFreq - 1;

                    // remove element from earlier frequency bag
                    $freq[ $oldFreq ] --;

                    // reduce element count
                    $dict[ $data ] --;

                    // add element to current frequency bag
                    $freq[ $newFreq ] ++;
                }

                break;
            case 3:

                // return 1 if a frequency bag exists and has at least one element
                if( isset( $freq[$data] ) && $freq[$data] > 0 )
                    $output[] = 1;
                else
                    $output[] = 0;
                break;
        }
    }
    
    return $output;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

$queries = array();

for ($i = 0; $i < $q; $i++) {
    $queries_temp = rtrim(fgets(STDIN));

    $queries[] = array_map('intval', preg_split('/ /', $queries_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$ans = freqQuery($queries);

fwrite($fptr, implode("\n", $ans) . "\n");

fclose($fptr);
