<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        //save to database
        $user_id = random_num(5);
        $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <title>Signup</title>
</head>

<body>
    <h1>Signup</h1>
    <style type="text/css">
        div,
        h1 {
            background-color: #704A41;
            color: whitesmoke;
            font-size: 22px;
        }

        table {
            text-align: center;
            margin: auto;
        }

        button {
            color: aliceblue;
            text-align: center;
        }
    </style>

    <div id="box>
        <form method=" post">
        <div>Регистрация</div>
        <table>
            <tr>
                <td>
                    Введите логин:
                </td>
                <td><input type="text" name="user_name" /></td>
            </tr>
            <tr>
                <td>
                    Введите пароль:
                </td>
                <td><input type="password" name="password" /></td>
            </tr>
        </table>
        <input id="button" type="submit" value="Signup"><br><br>
        <a href="login.php">Login</a><br><br>
        </form>
    </div>


</body>

</html>