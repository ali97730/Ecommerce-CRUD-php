<?php

//start session
 session_start();
 require_once('php/CreateDb.php');
 require_once('./php/component.php');

 //create insance of CreateDB Class
 $database = new CreateDb("Productdb","Producttb");
 $database2 = new CreateDb("Productdb","Productstb");

    
 if (isset($_POST['add'])){
     
   // print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );
       
        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Application</title>
    <!-- CSS -->
    <link rel="stylesheet" href="mystyle.css">
    <!--BootStrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- FontAwesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    

</head>
<body>



<div id="loginModal" class="modal fade" role="dialog">

            <div class="modal-dialog modal-lg" role="content">

                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title"> Login </h4>
                       <button type="button" class="close" data-dismiss="modal"> &times;</button> 
                    </div>
                    <div class="modal-body">
                         
                    <form action="loginphp.php" method="post">
                        <div class="form-row">
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                        <label class="sr-only" for="exampleInputEmail3">Enter UserName</label>
                                        <input type="text" class="form-control form-control-sm mr-1" id="exampleInputEmail3" placeholder="Enter Username">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="sr-only" for="exampleInputPassword3">Password</label>
                                    <input type="password" class="form-control form-control-sm mr-1" id="exampleInputPassword3" placeholder="Password">
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label"> Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <button type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-sm ml-1">Login</button>        
                            </div>
                        </form>
                        
                    </div>

                </div>

            </div>

        </div>

    <!-- Header from header.php -->
    <?php 
    require_once("./php/header.php")
    ?>   
         
         
            
    

    <div class="container">

    <div class="row px-5">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"> <h4>Electronics</h4></li>
                <li class="breadcrumb-item"><h4>Gadgets Cetegory</h4></li>
             </ol>
            
        </div>

        <div class="row text-ce
        nter py-5">
            <?php
             $result =$database->getData();
            while($row = mysqli_fetch_assoc($result)){
                component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
            }
            ?>

        </div>
    </div>

    <div class="container">

<div class="row px-5 ">
        <ol class="col-12 breadcrumb bg-success">
            <li class="breadcrumb-item"> <h4>Shoes</h4></li>
            <li class="breadcrumb-item"><h4>Outfit Cetegory</h4></li>
         </ol>
        
    </div>

    <div class="row text-ce
    nter py-5">
        <?php
         $result =$database2->getData();
        while($row = mysqli_fetch_assoc($result)){
            component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
        }
        ?>

    </div>
</div>

    <!--jquery js bootstrap  -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> 
</body>
</html>