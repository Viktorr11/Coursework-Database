<?php 
require_once 'config.php';
    $link = new mysqli($host, $user, $password, $database);
if(isset($_POST["login"]) && isset($_POST["pass"]) && isset($_POST["name"]) && isset($_POST["email"])){
    if($link->connect_error){
        die("Ошибка: " . $link->connect_error);
    }
    $login = $link->real_escape_string($_POST["login"]);
    $pass = $link->real_escape_string($_POST["pass"]);
    $name = $link->real_escape_string($_POST["name"]);
    $email = $link->real_escape_string($_POST["email"]);

$insert_sql = "INSERT INTO users (`login`, `password`, `name_user`, `email`)" .
"VALUES('{$login}', '{$pass}', '{$name}', '{$email}');";
setcookie("login", $login, time() + 3600*24);
if($link->query($insert_sql)){

        header("Location: reg1.php");
    }
    else{
        echo "Помилка: " . $link->error;
    }
    $link->close();
}
