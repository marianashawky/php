<?php
require "connection.php";
$id= $_GET["id"];
$sqlQuery=$connection->prepare("DELETE  FROM products WHERE id=?");
if($sqlQuery->execute([$id])){
    header("Location:index.php");
}else{
    echo"Error";
    header("Refresh: 2;URL=index.php");
}
