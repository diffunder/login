<meta charset="utf-8">
<?php

include("connection.php");
include("functions.php");

	$id = $_SESSION['user_id']; // id юзера из сессии
	$query = "SELECT * FROM users WHERE id='$id'";
	
	$result = mysqli_query($con, $query);
	$user = mysqli_fetch_assoc($result);
	
	$newPassword = $_POST['new_password'];
	
	$query = "UPDATE users SET password='$newPassword' WHERE id='$id'";
	mysqli_query($con, $query);
?>

<html>
    <head>

    </head>

<body>
<form action="" method="POST">
	<input name="new_password">
	<input type="submit" name="submit">
</form><br>
</body>    
</html>