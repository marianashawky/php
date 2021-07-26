<?php
require "connection.php";
if(isset($_POST["add"])&&!empty($_POST)){
    $name=$_POST["name"];
    $brand=$_POST["brand"];
    $expire=$_POST["expire"];
    $vali=$_POST["vali"];
    $sqlQuery=$connection->prepare("INSERT INTO products (name,brand,expirydate,availbilty)VALUES(?,?,?,?)");
    if($sqlQuery->execute([$name,$brand,$expire,$vali])){
        header("Location:index.php");
    }else{
        echo"Error";
        header("Refresh: 2;URL=index.php");
    }
}else{
    header("Refresh: 2;URL=index.php");
}

