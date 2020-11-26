<?php


//1 задание

function arrangeBiggestNumber($numbers = null)
{
    if(is_null($numbers))
        echo 'Заполните массив';

    usort($numbers, function ($prev, $next) {
        $numberx= (int) ($next . $prev);
        $numbery = (int) ($prev . $next);
        return bccomp($numberx, $numbery);
    });

    return implode('', $numbers);
}

echo '<p>1 задание</p>' .arrangeBiggestNumber([1, 34, 3, 98, 9, 76, 45, 4]). '<br>';

//2 задание

function summaryRanges($arr)
{
    $first = 0;
    $counter = 0;
    $result = [];
    for ($i = 1; $i < count($arr); $i++) {
        $diff = $arr[$i] - $arr[$i - 1];
        if ($diff == 1) {
            if ($counter == 0) {
                $first = $arr[$i - 1];
                $counter++;
            } elseif ($i == (count($arr) - 1)) {
                $last = $arr[$i];
                $counter--;
                $result[] = "{$first}->{$last}";
            }
        } elseif ($counter) {
            $last = $arr[$i - 1];
            $counter--;
            $result[] = "{$first}->{$last}";
        }
    }
    return $result;
}

$arrays = summaryRanges([0, 1, 2, 4, 5, 7]);

echo '<p>2 задание</p>';

foreach($arrays as $array)
{
    print $array." ";
}
echo '<br />';

//3 задание

function longestLength($text)
{
    $max = 0;
    $result = [];

    $symbols = str_split($text);

    if (empty($symbols[0])) {
        return 0;
    }

    foreach ($symbols as $symbol) {
        $key = array_search($symbol, $result);
        $result[] = $symbol;

        if ($key !== false) {
            $result = array_slice($result, $key + 1);
        }

        $sumOfSymbols = count($result);
        if ($sumOfSymbols > $max) {
            $max = $sumOfSymbols;
        }
    }

    return $max;
}

echo '<p>3 адание</p>';

echo "longestLength('abcdeef') = ";
print_r(longestLength('abcdeef'));// 5
echo "<br />longestLength('jabjcdel') = ";
print_r(longestLength('jabjcdel')); // 7

