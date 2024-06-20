<?php 
require_once 'config.php';
    $link = new mysqli($host, $user, $password, $database);
if(isset($_COOKIE['login'])){
    $login = $_COOKIE['login'];


    if($link->connect_error){
        die("Ошибка: " . $link->connect_error);
    }

$query  = "SELECT `id_user` FROM `users` WHERE `login` = '{$login}'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
                     $id_user = $row[0];
                     }
            mysqli_free_result($result);

if($link->query($query)){
    setcookie("id_user", $id_user, time() + 3600*24);
        header("Location: my_cars.php");
    }
    else{
        echo "Помилка: " . $link->error;
    }
    $link->close();
}
