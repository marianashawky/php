<?php
if(isset($_GET["id"])){

require "connection.php";
$id= $_GET["id"];
$sqlQuery=$connection->prepare("UPDATE  products SET Active=0 WHERE id=?");
if($sqlQuery->execute([$id])){
    header("Location:index.php");
}else{
    echo"Error";
}

}
else{
    header("Refresh: 2;URL=index.php");
}


