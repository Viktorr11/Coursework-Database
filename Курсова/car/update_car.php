<?php
require_once 'config.php';
$conn = new mysqli($host, $user, $password, $database);

if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["details"]) && isset($_POST["link"])){

$conn = new mysqli($host, $user, $password, $database);
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $id = $conn->real_escape_string($_POST["id"]);
    $name = $conn->real_escape_string($_POST["name"]);
    $price = $conn->real_escape_string($_POST["price"]);
    $details = $conn->real_escape_string($_POST["details"]);
    $link = $conn->real_escape_string($_POST["link"]);
    
    $sql = "UPDATE cars SET name_car = '$name', price_car = '$price', details = '$details', photo_car = '$link' WHERE id_car = ".$id."; ";
if($conn->query($sql)){

      header("Location: my_cars.php");
}
else{
  echo "Помилка: " . $conn->error;
}
$conn->close();
}
?>
