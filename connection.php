<?php
try{
$connection =new PDO("mysql:host=localhost;dbname=productdb","root","");
}catch (PDOException $exception){
    echo $exception->getMessage();
}