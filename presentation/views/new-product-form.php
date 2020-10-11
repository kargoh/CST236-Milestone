<?php

require_once "../../header.php";
require_once "../../Autoloader.php";

?>
<head>
<link rel="stylesheet" type="text/css" href="../../css/form.css">
</head>
<div class="container">
  <h1>Create New Product</h1>
  <form class="input-form" method="POST" action="../handlers/process-new-product.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="productname">Product Name: </label>
      <input type="text" class="form-control" id="productname" name="productname" placeholder="Product Name">
    </div>
    <div class="form-group">
      <label for="productdescription">Product Description: </label>
      <textarea class="form-control" id="productdescription" name="productdescription" rows="4" cols="45" placeholder="Product Description"></textarea>
    </div>
    <div class="form-group">
      <label for="productprice">Product Price</label>
      <input type="number" step="0.01" class="form-control" id="productprice" name="productprice" placeholder="Product Price">
    </div>
    <div class="form-group">
      <label for="productphoto">Product Photo</label>
      <input type="file" class="form-control" name="productphoto" id="productphoto">  
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
