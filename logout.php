<?php

setcookie('auth_token', '', time());
unset($_COOKIE['auth_token']);

header("Location: signin.php");
die;
