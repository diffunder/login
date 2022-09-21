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
    <title>Фанклуб Сонхуна</title>
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
        <h1>Фанклуб Сонхуна из ENHYPEN</h1>
        Hello, <?php echo $user_data['user_name']; ?>.<br><br>
        
        <a href="logout.php">Logout</a><br><br>
    </div>
    
</body>

</html>