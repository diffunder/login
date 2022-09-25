<?php

function check_login($con)
{

    if (isset($_COOKIE['auth_token'])) {
        $auth_token = $_COOKIE['auth_token'];
        $query = "select * from users where auth_token = '$auth_token' limit 1";

        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: signin.php");
    die;
}

function random_salt()
{
    $salt = '';
    $saltLength = 8;

    for ($i = 0; $i < $saltLength; $i++) {
        $salt .= chr(mt_rand(33, 126));
    }

    return $salt;
}
