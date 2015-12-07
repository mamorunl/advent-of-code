<?php
/**
 * Created by RAPIDE Internet.
 * User: heppi_000
 * Date: 7-12-2015
 * Time: 12:24
 */

$instructions = file('i');
$grid = [];
for($i = 0; $i <= 999; $i++ ){
    for($j = 0; $j <= 999; $j++ ) {
        $grid[$i][$j] = 0;
    }
}

foreach($instructions as $instruction) {
    $matches = [];
    preg_match("/([a-z]+) ([0-9,]+) through ([0-9,]+)/i", $instruction, $matches);
    unset($matches[0]);
    if(!count($matches)) {
        echo $instruction . " did not match <br>\n";
    }
    turn($matches[1], $matches[2], $matches[3], $grid);
}

function turn($direction, $range_start, $range_stop, &$grid) {
    list($start_x, $start_y) = explode(",", $range_start);

    list($end_x, $end_y) = explode(",", $range_stop);

    for($x = $start_x; $x <= $end_x; $x++ ){
        for($y = $start_y; $y <= $end_y; $y++ ) {
            if($direction == "toggle") {
                $grid[$x][$y] += 2;
            } else {
                $grid[$x][$y] += ($direction == "on" ? 1 : -1);
                if($grid[$x][$y] < 0) {
                    $grid[$x][$y] = 0;
                }
            }
        }
    }
}

/*
 * Part 1 function
 * function turn($direction, $range_start, $range_stop, &$grid) {
    list($start_x, $start_y) = explode(",", $range_start);

    list($end_x, $end_y) = explode(",", $range_stop);

    for($x = $start_x; $x <= $end_x; $x++ ){
        for($y = $start_y; $y <= $end_y; $y++ ) {
            if($direction == "toggle") {
                $grid[$x][$y] = !$grid[$x][$y];
            } else {
                $grid[$x][$y] = ($direction == "on" ? 1 : 0);
            }
        }
    }
}*/

$brightness = 0;
for($x = 0; $x <= 999; $x++ ){
    for($y = 0; $y <= 999; $y++ ) {
        if ($grid[$x][$y]) {
            $brightness += $grid[$x][$y];
        }
    }
}

echo $brightness;