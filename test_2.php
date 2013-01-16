<?php

$a = 'asdf';


function b(&$c) {
    $c = 'qwer';
    echo $c;
}

b($a);      // qwer
echo PHP_EOL;
echo $a;    // asdf
