<?php

// Complete the hourglassSum function below.
function hourglassSum($arr) {

    $maxSum = -1000;

    for($i = 1; $i < count($arr); $i++) {
        for($j = 1; $j < count($arr[0]); $j++) {
            $sum = 0;
            if(isset($arr[$i-1][$j-1]) && isset($arr[$i-1][$j]) && isset($arr[$i-1][$j+1])
                && isset($arr[$i][$j])
                && isset($arr[$i+1][$j-1]) && isset($arr[$i+1][$j]) && isset($arr[$i+1][$j+1])) {
                $sum += $arr[$i-1][$j-1] + $arr[$i-1][$j] + $arr[$i-1][$j+1];
                $sum += $arr[$i][$j];
                $sum += $arr[$i+1][$j-1] + $arr[$i+1][$j] + $arr[$i+1][$j+1];
                
                if($sum > $maxSum)
                    $maxSum = $sum;
            }
        }
    }

    return $maxSum;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$arr = array();

for ($i = 0; $i < 6; $i++) {
    fscanf($stdin, "%[^\n]", $arr_temp);
    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = hourglassSum($arr);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
