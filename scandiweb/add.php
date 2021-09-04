<?php 
include('products.php');

if (isset($_POST['submit'])) {
    $DVD = new Dvd($_POST['SKU'],$_POST['name'],$_POST['price'],$_POST['type'],$_POST['size']);
    $Furnture = new Furnture($_POST['SKU'],$_POST['name'],$_POST['price'],$_POST['type'],$_POST['height'],$_POST['width'],$_POST['length']);
    $Book = new Book($_POST['SKU'],$_POST['name'],$_POST['price'],$_POST['type'],$_POST['weight']);
    if ($_POST['type']=='DVD') {
      $DVD->addProduct($DVD);
      header('Location:index.php');
    }elseif ($_POST['type']=='Furnture') {
      $Furnture->addProduct($Furnture);
      header('Location:index.php');
    }elseif ($_POST['type']=='Book') {
      $Book->addProduct($Book);
      header('Location:index.php');
    }else {
      echo 'insertion faild';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>
<div class="container">
  <form id="product_form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
      <h1>Add Product</h1>
    <div class="mb-3">
      <label for="SKU" class="form-label">SKU</label>
      <input type="text" name="SKU" class="form-control" id="sku">
    </div>
    <div class="mb-3">
      <label for="Name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
      <label for="Price" class="form-label">Price</label>
      <input type="text" name="price" class="form-control" id="price">
    </div>
      <div class="mb-3">
          <select class="form-select" id="productType" aria-label="Default select" name="type">
          <option selected>Select Product Type</option>
          <option value="DVD">DVD</option>
          <option value="Furnture">Furniture</option>
          <option value="Book">Book</option>
          </select>
      </div>
      <div id="details-container">
        <div class="DVD details" style="display:none;">
          <div class="mb-3">
            <label for="exampleInputsize" class="form-label">size</label>
            <input type="text" name="size" class="form-control" id="size">
          </div>
          <p>please provide the size in mb</p>
        </div>
        <div class="Furnture details" style="display:none;">
          <div class="mb-3">
            <label for="exampleInputheight" class="form-label">height</label>
            <input type="text" name="height" class="form-control" id="height">
          </div>
          <div class="mb-3">
            <label for="exampleInputwidth" class="form-label">width</label>
            <input type="text" name="width" class="form-control" id="width">
          </div>
          <div class="mb-3">
            <label for="length" class="form-label">length</label>
            <input type="text" name="length" class="form-control" id="length">
          </div>
          <p>please provide the dimensions in HxWxL</p>
        </div>
        <div class="Book details" style="display:none;">
          <div class="mb-3">
            <label for="exampleInputweight" class="form-label">weight</label>
            <input type="text" name="weight" class="form-control" id="weight">
          </div>
          <p>please provide the weight in KG</p>
        </div>
      </div>
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
    <input type="button" value="Cancel" class="btn btn-primary" onClick="document.location.href='index.php'" />

  </form>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $("#productType").change(function() {
      var type = $("#productType").val();
      $(".details").hide();
      $("."+type).show();
    })
  })
</script>
<?php include('templates/footer.php') ?>    
</html>