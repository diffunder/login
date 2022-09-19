<meta charset="utf-8">
<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    if (!empty($user_name) && !empty($password)) {

        //save to database
        $user_id = random_num(5);
        $query = "INSERT into users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";
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

<html lang="ru">

<head>
    <title>Signup</title>
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
    <h1>Signup</h1>
    

    <div>
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
        <a href="signin.php">Login</a><br><br>
        </form>
    </div>

</body>

</html>