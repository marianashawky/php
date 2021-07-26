<?php


if(isset($_POST["Edit"])&&!empty($_POST)){

require "connection.php";
$name=$_POST["name"];
$brand=$_POST["brand"];
$expire=$_POST["expire"];
$vali=$_POST["vali"];
$id= $_POST["id"];
$sqlQuery=$connection->prepare("UPDATE  products SET name=?,brand=?,expirydate=?,availbilty=? WHERE id=?");
if($sqlQuery->execute([$name,$brand,$expire,$vali,$id])){
    header("Location:index.php");
}else{
    echo"Error";
}

}
else{
    header("Refresh: 2;URL=index.php");
}


