<?php

function average()
{
    $numargs = func_num_args();
    $sum = 0;
    for ($i = 0; $i < $numargs; $i++) {
        $sum += func_get_args()[$i];
    }
    echo $sum / $numargs;
}

average(1, 2, 3, 4, 5);

setcookie('country', 'Kazakhstan', time() + 86400);

$cookieCountry = $_COOKIE['country'] ?? 'not set';
