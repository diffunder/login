<meta charset="utf-8">
<?php

function check_login($con) {

    if(isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    //redirect to login
    header("Location: signin.php");
    die;
}

function random_num($length) {
    $text = "";
    if($length < 3)
    {
        $length = 3;
    }
    $len = rand(2, $length);
    for ($i=0; $i<$len; $i++) {
        $text .= rand(0, 9);
    }
    return $text;
}

function randomSalt()
	{
		$salt = '';
		$saltLength = 8; // длина соли
		
		for($i = 0; $i < $saltLength; $i++) {
			$salt .= chr(mt_rand(33, 126));
		}
		
		return $salt;
	}