<?php

$connection = mysqli_connect('localhost','root','','buy_db');

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['name'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $products = $_POST['products'];
    $quantity = $_POST['quantity'];
    $buying_date = $_POST['buying_date'];


    $request = "insert into buy_from(name, email, phone, address, location, products, quantity, buying_date) values
    ('$name','$email','$phone','$address','$location','$products','$quantity','$buying_date')";

    mysqli_query($connection, $request);

    header('location:buy.php');
}else{
    echo 'something went wrong try again';
}

?>