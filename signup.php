<?php
include("connection.php");
include("functions.php");

if (empty($_COOKIE['auth_token'])) {
    setcookie('auth_token', random_cookie(), time() + 60);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $auth_token = $_COOKIE['auth_token'];
    $user_name = $_POST['user_name'];
    $salt = random_salt();
    $password = md5($salt . $_POST['password']);
    if (!empty($user_name) && !empty($password)) {
        $query = "SELECT * FROM users WHERE user_name='$user_name'";
        $result = mysqli_query($con, $query);
    } else {
        echo "Please enter some valid information!";
        header("Location: /");
    }

    if (mysqli_num_rows($result) == 0 && !empty($user_name) && !empty($password)) {
        $auth_token = $_COOKIE['auth_token'];
        $query = "INSERT into users (user_name, auth_token, password, salt) VALUES ('$user_name', '$auth_token', '$password', '$salt')";
        $result = mysqli_query($con, $query);

        header("Location: signin.php");
        die;
    } else {
        echo "Username already taken!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Registration page</title>
    <style type="text/css">
        div {
            border: 3px solid #f1f1f1;
            text-align: center;
            align-content: center;
        }

        input[type=text],
        input[type=password] {
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
        <form action="signup.php" method="post">
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