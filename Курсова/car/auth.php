<?php
require_once 'config.php';
    $link = new mysqli($host, $user, $password, $database);
if(isset($_POST["login"]) && isset($_POST["pass"]))
{
    if($link->connect_error){
        die("Ошибка: " . $link->connect_error);
    }
    $login = $link->real_escape_string($_POST["login"]);
    $pass = $link->real_escape_string($_POST["pass"]);
    $query = "SELECT login, password, id_user FROM users";
    $result = mysqli_query($link, $query);
    $auth = FALSE;
	while ($row = mysqli_fetch_array($result)) {
			if (($row[0] == $login) && ($row[1] == $pass)){
				$auth = TRUE;
				$id_user = $row[2];
			}
		}
		mysqli_free_result($result);
    if($auth == TRUE){
    	setcookie("id_user", $id_user, time() + 3600*24);

        header("Location: my_cars.php");
    }
    else{
        header("Location: error.html");
    }
    $conn->close();
}