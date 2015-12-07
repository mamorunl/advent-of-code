<?php
/**
 * Created by RAPIDE Internet.
 * User: heppi_000
 * Date: 7-12-2015
 * Time: 10:04
 */

$vowels = ['a', 'e', 'i', 'o', 'u'];
$file = file('i');
$str = [];
$nice = 0;
/*foreach($file as $key => $string) {
    $last_letter = "";
    $str[$key] = [];
    $str[$key]['has_double'] = false;
    if(strpos($string, "ab") !== false || strpos($string, "cd") !== false || strpos($string, "pq") !== false || strpos($string, "xy") !== false) {
        $str[$key]['nice'] = false;
        continue;
    }

    foreach(str_split($string) as $char) {
        if(!isset($str[$key]['vowels'])) {
            $str[$key]['vowels'] = 0;
        }

        if(in_array($char, $vowels)) {
            $str[$key]['vowels']++;
        }

        if($last_letter == $char) {
            $str[$key]['has_double'] = true;
        }

        $last_letter = $char;
    }

    $str[$key]['nice'] = false;

    if($str[$key]['vowels'] >= 3 && $str[$key]['has_double']) {
        $str[$key]['nice'] = true;
        $nice++;
    }
}*/

//echo $nice . "<hr>";
$nice = 0;

foreach($file as $key => $string) {
    $string = trim($string);
    $str = str_split($string);
    $has_two = false;
    $pairs = [];
    $last_pair = "";
    foreach($str as $index => $char) {
        if($index == 0) continue;
//        echo $str[$index-1] . $char . ", ";
        if($str[$index-1] . $char != $last_pair) {
            if(isset($pairs[$str[$index-1] . $char])) {
                $pairs[$str[$index-1] . $char]++;
            } else {
                $pairs[$str[$index-1] . $char] = 1;
            }
        }

        $last_pair =$str[$index-1] . $char;

        if($index >= 2 && $char == $str[$index-2]) {
            $has_two = true;
        }
    }

    foreach($pairs as $pair) {
        if($pair == 2 && $has_two) {
            echo "<pre>"; var_dump($string); echo "</pre>";
            $nice++;
            break;
        }
    }
}

echo " " . $nice;