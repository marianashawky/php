<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>P M S</title>
</head>
<body>
<?php
require  "product.php";
require "connection.php";
$sqlQuary=$connection->prepare("SELECT * FROM  products WHERE Active=1");
$sqlQuary->execute();
$products=$sqlQuary->fetchAll( PDO::FETCH_CLASS ,"Product");
?>
<div class="container">
<?php

include "menu.php";
?>
<h2>Products System</h2>
<table class="table table-sm table-danger">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Brand</th>
      <th scope="col">ExpiryDate</th>
      <th scope="col">Availbilty</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>


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
      <td><a href="softdelete.php?id=<?=$product->id?>"><i class="material-icons" style="color:darkred">delete</i></a></td>
      <td><a  href="edit.php?id=<?=$product->id?>"><i class="material-icons" style="color:darkblue">edit</i></a></td>


    </tr>


    <?php  };  ?>



  </tbody>
</table>

</div>

<div class="container" style="margin-top:60px">

<form method="post" action="insertdata.php">
<div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Brand</label>
    <select class="form-control" id="exampleFormControlSelect1" name="brand">
      <option>.....</option>
      <option>Apple</option>
      <option>Samsung</option>
      <option>Dell</option>
    </select>
  </div>
  <div class="form-group">
  <label for="exampleFormControlInput1">ExpiryDate</label>
    <input type="date" class="form-control" id="exampleFormControlInput1"name="expire" placeholder="ExpiryDate">
  </div>


  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Availbilte Brand</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="vali" id="gridRadios1" value="1">
          <label class="form-check-label" for="gridRadios1">
            Available
           </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="vali" id="gridRadios2" value="0">
          <label class="form-check-label" for="gridRadios2">
          Unavailable
         </label>
      </div>
    </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-dark" name="add">add product</button>
    </div>
  </div>
</form>

</div>



</body>
</html>