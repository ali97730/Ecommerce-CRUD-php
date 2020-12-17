<?php

//start session
 session_start();
 require_once('php/CreateDb.php');
 require_once('./php/component.php');

 //create insance of CreateDB Class
 $db = new CreateDb("Productdb","Producttb");
 $db2 = new CreateDb("Productdb","Productstb");
//  $item_array = array(
//     'product_id' => $_POST['productid']
// );
// echo $_POST['productname'];
// echo $_POST['productid'];
//print_r($item_array['product_id']);
//print_r($_POST);
// echo $_POST['productimg'];
// echo $_POST['productprice'];
if(isset($_POST['delete'])){
    $item_array = array(
        'product_id' => $_POST['productid']
    );

    echo  "<script>alert(\"Alert are you sure u want to delete the Product!\")</script>";
    echo "<script>window.location = 'admin.php'</script>";
            
  
   
    $db->deleteData($item_array['product_id']);
    $db2->deleteData($item_array['product_id']);
   
}
if(isset($_POST['update'])){
    $db->updateData($_POST['productid'],$_POST['productname'],$_POST['productprice'],$_POST['productimg']);
    $db2->updateData($_POST['productid'],$_POST['productname'],$_POST['productprice'],$_POST['productimg']);
}
  
  if(isset($_POST['addproduct']) && $_POST['productname'] !=""){
   $result = $db->addData($_POST['productname'],$_POST['productprice'],$_POST['productimg']);
   if($result){
        unset($_POST['addproduct']);
       }
  }
  if(isset($_POST['addproduct2']) && $_POST['productname'] !=""){
    $result = $db2->addData($_POST['productname'],$_POST['productprice'],$_POST['productimg']);
    if($result){
         unset($_POST['addproduct']);
        }
   }
   

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- CSS -->
    <link rel="stylesheet" href="mystyle.css">
    <!--BootStrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- FontAwesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    
</head>
<body>

<h1 class="text-center bg-primary">Admin Dashboard </h1>


<h4>

<?php
    $result = $db->getData();
    $result2 = $db2->getData();

        if($result){
        while ($row = mysqli_fetch_assoc($result)  ){
            
             adminElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
        }
    }
        
?>
        <hr>
        <hr>


<div class="container-fluid">
            <div class="row">
                <div class="col-12  bg-warning">
                        <h3 class="text-center text-white">Add a New Product in Electronics/Gadgets Database</h3>
                 </div>
             </div>
             <hr>
        <div class="row">
            <div class="col-12">
           
        
        <form action="admin.php"  method="post" class="cart-items">
                            <div class="form-row">
                                    <div class="form-group col-sm-4">
                                            <label class="sr-only" for="exampleInputEmail3">Product Name</label>
                                            <input type="text" name="productname" class="form-control  form-control-sm mr-1" value="" id="exampleInputEmail3" placeholder="$productname">
                                    </div>
                                    <div class="form-group col-sm-4 ">
                                        <label class="sr-only" for="exampleInputPassword3">Price</label>
                                        <input type="text" name="productprice" class="form-control form-control-sm mr-1" value="" id="exampleInputPassword3" placeholder="Price">
                                    </div>
                                    <div class="col-sm-4 ">
                                    <label class="sr-only" for="exampleInputPassword3">Image Path</label>
                                    <input type="text" name="productimg" class="form-control form-control-sm mr-1" value="" id="exampleInputPassword3" placeholder="Path of image">
                                
                                    </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-sm-4 offset-5 ">
                                    <button type="submit" name="addproduct" class="btn btn-primary btn-lg  mt-5 ">ADD</button>
                                           
                                </div>
                            </div>
                    </form>
                    </div>
                    </div>
        </div>
        <hr>

        <?php
        
        if($result2){
        while ($row = mysqli_fetch_assoc($result2)  ){
            adminElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
        }
    }
        
        ?>
 
        <hr>
      
        <div class="container-fluid">
            <div class="row">
                <div class="col-12  bg-warning">
                        <h3 class="text-center text-white">Add a New Product in Shoes/Outfit Database</h3>
                 </div>
             </div>
             <hr>
        <div class="row">
            <div class="col-12">
        <form action="admin.php"  method="post" class="cart-items">
                            <div class="form-row">
                                    <div class="form-group col-sm-4">
                                            <label class="sr-only" for="exampleInputEmail3">Product Name</label>
                                            <input type="text" name="productname" class="form-control  form-control-sm mr-1" value="" id="exampleInputEmail3" placeholder="$productname">
                                    </div>
                                    <div class="form-group col-sm-4 ">
                                        <label class="sr-only" for="exampleInputPassword3">Price</label>
                                        <input type="text" name="productprice" class="form-control form-control-sm mr-1" value="" id="exampleInputPassword3" placeholder="Price">
                                    </div>
                                    <div class="col-sm-4 ">
                                    <label class="sr-only" for="exampleInputPassword3">Image Path</label>
                                    <input type="text" name="productimg" class="form-control form-control-sm mr-1" value="" id="exampleInputPassword3" placeholder="Path of image">
                                
                                    </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-sm-4 offset-5 ">
                                    <button type="submit" name="addproduct2" class="btn btn-primary btn-lg  mt-5 ">ADD</button>
                                           
                                </div>
                            </div>
                    </form>
                    </div>
                    </div>
        </div>


</h4>
    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> 

</body>
</html>