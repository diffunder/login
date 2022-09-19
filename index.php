<meta charset="utf-8">
<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>

<head>
    <title>My website</title>
</head>

<body>
    <h1>Фанклуб Сонхуна из ENHYPEN</h1>
    <hr>
    <a href="logout.php">Logout</a>

    <br>
    Hello, <?php echo $user_data['user_name']; ?>.
    <a href="changePassword.php">Сменить пароль</a><br><br>
</body>

</html>