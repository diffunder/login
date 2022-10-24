<?php

include("functions.php");
include("connection.php");

if (!checkAuth()) {
    header("Location: signin.php");
    die;
}

