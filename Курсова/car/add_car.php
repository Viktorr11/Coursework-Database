<?php 
require_once 'config.php';
    $conn = new mysqli($host, $user, $password, $database);
if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["details"]) && isset($_POST["link"])){


    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $id = $conn->real_escape_string($_POST["id"]);
    $name = $conn->real_escape_string($_POST["name"]);
    $price = $conn->real_escape_string($_POST["price"]);
    $details = $conn->real_escape_string($_POST["details"]);
    $link = $conn->real_escape_string($_POST["link"]);

$insert_sql = "INSERT INTO cars (`name_car`, `price_car`, `details`, `photo_car`, `id_user`)" .
"VALUES('{$name}', '{$price}', '{$details}', '{$link}', '{$id}');";
if($conn->query($insert_sql)){

        header("Location: my_cars.php");
    }
    else{
        echo "Помилка: " . $conn->error;
    }
    $conn->close();
}
