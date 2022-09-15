<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] === $password) {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <title>Login</title>
    <style type="text/css">
        div {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            padding: 12px 20px;
            margin: 8px 0;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <h1>Login</h1>
    <div>
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
            <a href="signup.php">Signup</a><br><br>
        </form>
    </div>
</body>

</html>