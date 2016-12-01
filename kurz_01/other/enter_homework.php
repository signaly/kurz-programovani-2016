<?php 

function minMaxAvg($input)
{
    if (count($input) === 0) {
        return [null, null, null];
    }

    $minValue = null;
    $maxValue = null;
    $sum = 0;
    $count = 0;

    foreach ($input as $value) {
        $sum += $value;
        $count += 1;

        if ($value > $maxValue || $maxValue === null) {
            $maxValue = $value;
        }
        if ($value < $minValue || $minValue === null) {
            $minValue = $value;
        }
    }

    if ($count !== 0) {
        $avg = $sum / $count;
    } else {
        $avg = null;
    }

    return [$minValue, $maxValue, $avg];
}


function printResults(int $minValue, int $maxValue, float $avg)
{
    echo "Prumer:\t" . $avg . "\n";
    echo "Max hodnota:\t" . $maxValue . "\n";
    echo "Min hodnota:\t" . $minValue . "\n";
}


function test($expected, $actual) 
{
    if ($expected !== $actual) {
        throw new Exception("Hodnoty se nerovnaji: $expected != $actual");
    }
}

$result = minMaxAvg([2, 1, 3, 4]);
test(1, $result[0]);
test(4, $result[1]);
test(2.5, $result[2]);


$result = minMaxAvg([4, 3, 2, 1]);
test(1, $result[0]);
test(4, $result[1]);
test(2.5, $result[2]);


$result = minMaxAvg([-9, -7, -100, 0]);
test(-100, $result[0]);
test(0, $result[1]);
test(-29, $result[2]);


$result = minMaxAvg([]);
test(null, $result[0]);
test(null, $result[1]);
test(null, $result[2]);


$result = minMaxAvg([1]);
test(1, $result[0]);
test(1, $result[1]);
test(1, $result[2]);

echo "<strong>tučně</strong>";

//printResults(...minMaxAvg([-8, -9, 1, 9, 6, 7, 4, 7, 2, 3, 123, 31, 492, -2]));
//printResults(...[1, 2, 3]);
