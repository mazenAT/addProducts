<?php 
  include('db_controller.php');
  $cont = new Controller();
  $products = $cont->getProducts();
  if (isset($_POST['massdelete'])) {
    $checkBoxs = count($_POST['records']);
    $cont->deleteRecords($_POST,$checkBoxs);
  }
?>



<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>

<div class="container">
<nav class="nav justify-content-end">
  <a class="nav-link active" aria-current="page" href="add.php">ADD</a>
  <form action="<?php echo $_SERVER['PHP_SELF']?>"  method="POST" style="margin:0px; padding=0;">
  <div class= "form-group">
  <button class="btn btn-dark" id="delete-product-btn" type="submit" name="massdelete" value="Delete">MASS DELETE</button>
  </div>
</nav>
  <div class="row">
      <h1>Products</h1>
      <?php foreach ($products as $product) {?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <input class="form-check-input delete-checkbox" type="checkbox"  name="records[]" value ="<?php echo htmlspecialchars($product['SKU']);  ?>">
                </form>
                <?php if (htmlspecialchars($product['ptype'])=="DVD") { ?>
                  <h5 class="card-title"><?php echo htmlspecialchars($product['SKU']) ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($product['pname']) ?></h6>
                  <p class="card-text"><?php echo htmlspecialchars($product['price']).'$' ?></p>
                  <p class="card-text"><?php echo 'Size: '. htmlspecialchars($product['psize']).'mb' ?></p>
                <?php } ?>
                <?php if (htmlspecialchars($product['ptype'])=="Furnture") { ?>
                  <h5 class="card-title"><?php echo htmlspecialchars($product['SKU']) ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($product['pname']) ?></h6>
                  <p class="card-text"><?php echo $product['price'].'$' ?></p>
                  <p class="card-text"><?php echo 'Dimensions: '. htmlspecialchars($product['pheight']).'x'.htmlspecialchars($product['pwidth']).'x'.htmlspecialchars($product['plength']) ?></p>
                <?php } ?>
                <?php if (htmlspecialchars($product['ptype'])=="Book") { ?>
                  <h5 class="card-title"><?php echo htmlspecialchars($product['SKU']) ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($product['pname']) ?></h6>
                  <p class="card-text"><?php echo htmlspecialchars($product['price']).'$' ?></p>
                  <p class="card-text"><?php echo 'Weight: '. htmlspecialchars($product['pweight']).'kg' ?></p>
                <?php } ?>
                </div>
            </div>
        </div>
     <?php } ?>
  </div>
</div>


<?php include('templates/footer.php') ?>
    
</html>