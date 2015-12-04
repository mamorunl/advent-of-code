<?php

$t = $r = 0;

foreach(file('i') as $x) {
    list($l, $w, $h) = $s = explode('x', $x);

    $v = [($l*$w), ($w*$h), ($h*$l)];

    $z = 2* $v[0] + 2* $v[1] + 2* $v[2] + min($v);

    sort($s, SORT_NUMERIC);

    $t += $z;

    $r += 2* $s[0] + 2* $s[1] + ($s[0] * $s[1] * $s[2]);
}

echo "$t,$r";