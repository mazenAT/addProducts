<?php

include('config/db_connection.php');
class Controller 
{
    function addDVD($dvd)
    {
        $conn = db();    
        $sku = mysqli_real_escape_string($conn,$dvd->getSKU());
        $name = mysqli_real_escape_string($conn,$dvd->getName());
        $price = mysqli_real_escape_string($conn,$dvd->getPrice());
        $type = mysqli_real_escape_string($conn,$dvd->getType());
        $size = mysqli_real_escape_string($conn,$dvd->getSize());
        $sql = "INSERT INTO product (SKU,pname,price,ptype,psize,pheight,pwidth,plength,pweight) VALUES ('$sku','$name','$price','$type','$size',0,0,0,0)";
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          mysqli_close($conn);
    }
    function addFurnture($furnture)
    {
        $conn = db();    
        $sku = mysqli_real_escape_string($conn,$furnture->getSKU());
        $name = mysqli_real_escape_string($conn,$furnture->getName());
        $price = mysqli_real_escape_string($conn,$furnture->getPrice());
        $type = mysqli_real_escape_string($conn,$furnture->getType());
        $height = mysqli_real_escape_string($conn,$furnture->getHeight());
        $width = mysqli_real_escape_string($conn,$furnture->getWidth());
        $lenght = mysqli_real_escape_string($conn,$furnture->getLength());
        $sql = "INSERT INTO product (SKU,pname,price,ptype,psize,pheight,pwidth,plength,pweight) VALUES ('$sku','$name','$price','$type',0,$height,$width,$lenght,0)";
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        
    }
     function addBook($book)
    {
        $conn = db();    
        $sku = mysqli_real_escape_string($conn,$book->getSKU());
        $name = mysqli_real_escape_string($conn,$book->getName());
        $price = mysqli_real_escape_string($conn,$book->getPrice());
        $type = mysqli_real_escape_string($conn,$book->getType());
        $weight = mysqli_real_escape_string($conn,$book->getWeight());
        $sql = "INSERT INTO product (SKU,pname,price,ptype,psize,pheight,pwidth,plength,pweight) VALUES ('$sku','$name','$price','$type',0,0,0,0,'$weight')";
    
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        mysqli_close($conn);
    } 
    function getProducts(){
        $conn = db();    
    $sql = 'SELECT * FROM product';
	//make query and get result
	$result = mysqli_query($conn,$sql);
	//fetch the resulting rows as an array
	return $products = mysqli_fetch_all($result,MYSQLI_ASSOC);

	//close the conncetion
	mysqli_close($conn);

    }
    function deleteRecords($data,$num){
        $conn = db();
        for ($i=0; $i <$num ; $i++) { 
            $skuToDelete = $data['records'][$i];
            $sql = "DELETE FROM product where SKU = '$skuToDelete'";
            mysqli_query($conn,$sql);      
          }
          header('Location:index.php');
    }   
}



?>



