<?php

include("connection.php");

if (empty($_COOKIE['auth_token'])) {
    setcookie('auth_token', random_cookie(), time() +  60 * 60 * 24);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $query = "SELECT * FROM users WHERE user_name='$user_name' limit 1";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);

    if (!empty($user_data)) {

        $salt = $user_data['salt'];
        $hash = $user_data['password'];
        $password = md5($salt . $_POST['password']);

        if ($password == $hash) {
            setcookie('auth_token', $user_data['auth_token'], time() +  60 * 60 * 24);
            header("Location: index.php");
            die;
        } else {
            echo "Wrong login or password!";
        }
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<html lang="ru">

<head>
    <title>Login</title>
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
        <h1>Вход на сайт</h1>
        <form method="post">
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
            <input id="button" type="submit" value="Login"><br><br>
            <a href="signup.php">Signup</a>
        </form>
    </div>
</body>

</html>