<?php

function random_salt()
{
    $salt = '';
    $saltLength = 8;

    for ($i = 0; $i < $saltLength; $i++) {
        $salt .= chr(mt_rand(33, 126));
    }

    return $salt;
}
