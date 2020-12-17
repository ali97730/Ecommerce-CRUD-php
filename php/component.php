<?php 
    function component($productname,$productprice,$productimage,$product_id){
        $element = "

        <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
        <form action=\"index.php\" method=\"post\">
            <div class=\"card shadow\">
                <div>
                    <img src=\"$productimage\" alt=\"imgage1\" class=\"img-fluid-top\">                    
                </div>
                <div class=\"card-body\">
                <h5 class=\"card-title\">$productname</h5>
                <h6>
                <i class=\"fas fa-star\"></i>
                <i class=\"fas fa-sta\"></i>
                <i class=\"fas fa-star\"></i>
                <i class=\"fas fa-star\"></i>
                <i class=\"far fa-star\"></i>
                </h6>
                <p class=\"card-text\">
                    Some Quick example Text TO BUild on the card
                </p>
                <h5>
                <small><s class=\"text-secondary\">$519</s></small>
                <span class=\"price\">$$productprice</span>
                </h5>
                <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\" >Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
                <input type=\"hidden\" name=\"product_id\" value=\"$product_id\">
                </div>
            </div>
        </form>
    </div>
        ";
        echo $element;
    }

    function cartElement($productimg, $productname, $productprice, $productid){
        $element = "
        
        <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                        <div class=\"border rounded\">
                            <div class=\"row bg-white\">
                                <div class=\"col-md-3 pl-0\">
                                    <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                                </div>
                                <div class=\"col-md-6\">
                                    <h5 class=\"pt-2\">$productname</h5>
                                    <small class=\"text-secondary\">Seller: Mohsin ali</small>
                                    <h5 class=\"pt-2\">$$productprice</h5>
                                    <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                </div>
                                <div class=\"col-md-3 py-5\">
                                    <div>
                                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                        <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
        
        ";
        echo  $element;
    }


    function adminElement($productimg, $productname, $productprice, $productid){
        $element = "


       
        <div class=\"row bg-white\">  
        <div class=\"col-md-6\">
        <form action=\"admin.php\"  method=\"post\" class=\"cart-items\">
                    
                        <div class=\" row border rounded\">
                           
                                <div class=\"col-md-4 pl-0\">
                                    <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                                </div>
                                <div class=\"col-md-5 \">
                                    <h5 class=\"pt-2\">$productname</h5>
                                    <small class=\"text-secondary\">Seller: Mohsin ali</small>
                                    <h5 class=\"pt-2\">$$productprice</h5>
                                   
                                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"delete\" >Delete</button>
                                    <input type=\"hidden\" name=\"productid\" value=\"$productid\"> <h2>$productid</h2>
                                </div>
                                
                            
                        </div>
                    </form>
                        </div>
                        
                    <div class=\"col-md-6\">
                        <form action=\"admin.php\"  method=\"post\" class=\"cart-items\">
                            <div class=\"form-row\">
                                    <div class=\"form-group col-sm-4\">
                                            <label class=\"sr-only\" for=\"exampleInputEmail3\">Product Name</label>
                                            <input type=\"text\" name=\"productname\" class=\"form-control  form-control-sm mr-1\" value=\"\" id=\"exampleInputEmail3\" placeholder=\"$productname\">
                                    </div>
                                    <div class=\"form-group col-sm-4\">
                                        <label class=\"sr-only\" for=\"exampleInputPassword3\">Price</label>
                                        <input type=\"text\" name=\"productprice\" class=\"form-control form-control-sm mr-1\" value=\"\" id=\"exampleInputPassword3\" placeholder=\"Price\">
                                    </div>
                                    <div class=\"col-sm-4\">
                                    <label class=\"sr-only\" for=\"exampleInputPassword3\">Image Path</label>
                                    <input type=\"text\" name=\"productimg\" class=\"form-control form-control-sm mr-1\" value=\"\" id=\"exampleInputPassword3\" placeholder=\"Path of image\">
                                
                                    </div>
                                </div>
                                <div class=\"form-row\">
                                <div class=\"form-group col-sm-4 offset-2 \">
                                    <button type=\"submit\" name=\"update\" class=\"btn btn-primary btn-lg  mt-5 \">Update</button>
                                    <input type=\"hidden\" name=\"productid\" value=\"$productid\">       
                                </div>
                            </div>
                    </form>
                    
                        </div>
                    </div>
                    



        
        ";
        echo  $element;
    }