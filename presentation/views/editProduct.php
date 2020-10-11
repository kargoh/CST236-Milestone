<?php

require_once "../../header.php";
require_once "../../Autoloader.php";


$id = $_GET['id'];

$bs = new ProductBusinessService();
$product = $bs->findbyID($id);
?>
<div class="container">
  <h1>Edit Product</h1>
  <form action="../handlers/process-update-product.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $product->getId() ?>">
    </div>
    <div class="form-group">
      <label for="productname">Product Name</label>
      <input type="text" class="form-control" id="productname" name="productname" value="<?php echo $product->getName() ?>">
    </div>
    <div class="form-group">
      <label for="productdescription">Description</label>
      <input type="text" class="form-control" id="productdescription" name="productdescription" value="<?php echo $product->getDescription() ?>">
    </div>
    <div class="form-group">
      <label for="productprice">Price</label>
      <input type="number" step="0.01" class="form-control" id="productprice" name="productprice" value="<?php echo $product->getPrice() ?>">
    </div>
    <div class="form-group">
      <label for="productphoto">Product Photo</label>
      <input type="file" class="form-control" name="productphoto" id="productphoto">  
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>