<?php
/**
 * Created by RAPIDE Internet.
 * User: heppi_000
 * Date: 4-12-2015
 * Time: 09:52
 */

$input = "yzbqklnj";
$result = "000000";

for($i = 0; $i < 999999999999; $i++) {
    $md5 = md5($input . "" . $i);

    if(!strcmp(substr($md5, 0, strlen($result)), $result)) {
        echo substr($md5, 0, strlen($result)), "<br>";
        echo $i . "=" . $md5;
        break;
    }
}