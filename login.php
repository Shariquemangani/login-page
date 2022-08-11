<?php
$username = $_POST['username'];
$password = $_POST['password'];
$state = $_POST['state'];
$gender = $_POST['gender'];
$address = $_POST['address'];

//    Database connection//
$conn = new mysqli('localhost','root','','login_db');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into login(username, password, state, gender, address)
    values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$username, $password, $state, $gender, $address);
    $stmt->execute();
    echo "login successfully";
    $stmt->close();
    $conn->close();
}
?>