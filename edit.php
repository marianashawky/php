
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <title>Edit</title>
</head>
<body> 




<?php
require "connection.php";
require "product.php";
$id= $_GET["id"];
$sqlQuery=$connection->prepare("SELECT*FROM products WHERE id=?");
if($sqlQuery->execute([$id])){
    $products=$sqlQuery->fetchAll( PDO::FETCH_CLASS ,"Product");
    foreach ($products as $product) {
   

?>

<div class="container" style="margin-top:60px">

<h2> Edit Products</h2>

<form method="post" action="editdb.php">
<div class="form-group">
<input type="hidden"   value="<?=$product->id?>"  name="id">

    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name"  value="<?=$product->name?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Brand</label>
    <select class="form-control" id="exampleFormControlSelect1" name="brand"  value="<?=$product->brand?>">
      <option>.....</option>
      <option value="Apple" <?= ($product->brand=="Apple")?"selected":"";?>>Apple</option>
      <option value="Samsung" <?= ($product->brand=="Samsung" )?"selected":"";?>>Samsung</option>
      <option  value="Dell" <?= ($product->brand=="Dell")?"selected":"";?>>Dell</option>
    </select>
  </div>
  <div class="form-group">
  <label for="exampleFormControlInput1">ExpiryDate</label>
    <input type="date" class="form-control" id="exampleFormControlInput1"name="expire" placeholder="ExpiryDate"  value="<?=$product->expirydate?>">
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Availbilte Brand</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="vali" id="gridRadios1" value="1"<?= ($product->availbilty=="1")?"checked":"";?>>
          <label class="form-check-label" for="gridRadios1">
            Available
           </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="vali" id="gridRadios2" value="0"<?= ($product->availbilty=="0")?"checked":"";?>>
          <label class="form-check-label" for="gridRadios2">
          Unavailable
                   </label>
      </div>
    </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-dark" name="Edit">Edit product</button>
    </div>
  </div>
</form>
</div>
<?php

}}else{
  echo"Error";
  header("Refresh: 2;URL=index.php");
}
?>
</body>
</html>














