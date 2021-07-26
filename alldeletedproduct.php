<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>Deleted Product</title>
</head>
<body>
<?php
require  "product.php";
require "connection.php";
$sqlQuary=$connection->prepare("SELECT * FROM  products WHERE Active=0");
$sqlQuary->execute();
$products=$sqlQuary->fetchAll( PDO::FETCH_CLASS ,"Product");
?>

<div class="container">

<?php

include "menu.php";
?>

<?php  if(!empty($products)){?>

<h2>Deleted Product</h2>
<table class="table table-sm table-danger">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Brand</th>
      <th scope="col">ExpiryDate</th>
      <th scope="col">Availbilty</th>
      <th scope="col">Delete</th>
      <th scope="col">Restore</th>


    </tr>
  </thead>
  <tbody>

  <?php   
  foreach ($products as $product ) {  ?>


    <tr>
      <th scope="row"><?=$product->id   ?></th>
      <td><?=$product->name?></td>
      <td><?=$product->brand?></td>
      <td><?=$product->expirydate?></td>
      <td><?php
      if($product->availbilty==0)
      {
        echo "Unavailable
        ";
      }
      if($product->availbilty==1)
      {
        echo "Available
        ";
      }

      ?>
</td>
      <td><a onclick="return confirm('Are your sure delete that product for ever?')" href="delete.php?id=<?=$product->id?>"><i class="material-icons" style="color:darkred">delete</i></a></td>
      <td><a  href="restore.php?id=<?=$product->id?>"><i class="material-icons" style="color:#696969">restore_include_path</i></a></td>


    </tr>


    <?php  };  ?>



  </tbody>
</table>
<?php }else{
    echo"not deleted data";
    
}?>

</div>

</body>
</html>