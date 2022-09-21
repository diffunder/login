<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $salt = randomSalt();
    $password = md5($salt.$_POST['password']);
    if (!empty($user_name) && !empty($password)) {

        //save to database
        $user_id = random_num(5);
        $query = "INSERT into users (user_id, user_name, password, salt) VALUES ('$user_id', '$user_name', '$password', '$salt')";
        echo $query,PHP_EOL;
        mysqli_query($con, $query);
        echo $query,PHP_EOL;

        header("Location: signin.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<meta charset="utf-8">
<html lang="ru">
<head>
    <title>Registration page</title>
    <style type="text/css">
        div {
            border: 3px solid #f1f1f1;
            text-align: center;
            align-content: center;
        }
        input[type=text], input[type=password] {
            padding: 12px 20px;
            margin: 8px 0;
        }
        table {
            text-align: center;
            margin: auto;
        }
        form {
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
    <h1>Регистрация на сайте</h1>
        <form action = "signup.php" method="post">
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
        </table><br>
        <input id="button" type="submit" value="Signup"><br><br>
        <a href="signin.php">Login</a>
        </form>
    </div>
</body>

</html>