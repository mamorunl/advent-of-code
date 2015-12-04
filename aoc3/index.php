<?php
/**
 * Created by RAPIDE Internet.
 * User: heppi_000
 * Date: 4-12-2015
 * Time: 09:39
 */

$file = file('i')[0];
$instructions = str_split($file);
$current_x = [0, 0];
$current_y = [0, 0];
$houses_array = [];
$current_player = 1;
foreach ($instructions as $instruction) {

    if ($instruction == '^') {
        $current_y[$current_player]++;
    }

    if ($instruction == 'v') {
        $current_y[$current_player]--;
    }

    if ($instruction == '>') {
        $current_x[$current_player]++;
    }

    if ($instruction == '<') {
        $current_x[$current_player]--;
    }

    $current_house_str = $current_x[$current_player] . "-" . $current_y[$current_player];
    $houses_array[$current_house_str] = "X";
    $current_player = !$current_player;
}

echo count($houses_array);