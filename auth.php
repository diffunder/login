<?php
include("connection.php");

$user_token = $_COOKIE['auth_token'];

$query = "SELECT * FROM users WHERE auth_token='$user_token' limit 1";
$result = mysqli_query($con, $query);
$user_data = mysqli_fetch_assoc($result);
var_dump($user_data);
if ($_COOKIE['auth_token'] == $user_data['auth_token']) {
    header("Location: index.php");
    die;
} else {
    echo "Not authenticated!";
    header("Location: signin.php");
}
