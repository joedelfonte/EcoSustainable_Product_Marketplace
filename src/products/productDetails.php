<?php
    require_once realpath(dirname(__FILE__) . '/../../config.php');
    require_once(ROOT_PATH .'/src/database/crudProd.php');
    require ROOT_PATH .'/assets/pageTemplate/header.php';
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="singleProd.css">

<?php


    try {
        if (!empty($_GET['product'])){
            $ltemp = strlen($_GET['product']);
            
            if ($ltemp = 7){
                $code = htmlspecialchars(trim($_GET['product']));
                $product = new Products();
                $result = $product->readAll($code, 1);
                $prodImg = $row['imageDir'] = null ? $row['imageDir'] : '';

                    if ($result) {
                        ?>
                        <div class="full-details">
                            <div class="product-container">
                                <div class="product-image">
                                    <img src="<?php $prodImg ?>" alt="Product Image">
                                </div>
                                <div class="product-details">
                                    <?php  
                                        //var_dump($result);
                                        foreach($result as $row){
                                        ?>
                                        <!-- <form action="AddtoCart.php" method="POST"> -->
                                            <h1 class="product-title"><?= $row['ProductName']?></h1>
                                            <p class="product-description"><?= $row['description']?></p>
                                            <div class="product-price">Price : &#8369 <?=$row['price']?></div>
                                            <div>Stocks :<?= $row['quantity']?></div>
                                            <div class="quantity-container">
                                                <span>Quantity :</span>
                                                <input type="number" id="quantity" name="addHowMany" value="1" min="1">
                                                
                                            </div><br>
                                            
                                            <button type="submit" id="addCart" name="AddToCart" class="add-to-cart-btn">Add to Cart</button>
                                        <!-- </form> -->

                                        <script>
                                            $(document).ready(function() {
                                                const thisProduct = "<?= $row['productCode'];?>";
                                                $('#addCart').on('click', function() {
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "/project/BSIT2102-EcoSustainable-Product-Marketplace/src/products/AddtoCart.php",
                                                        data: { 
                                                            productCode : thisProduct,
                                                            count : "quantity",
                                                            userEcoId : '1'
                                                        
                                                        },
                                                        
                                                        success: function(response){
                                                            responseObject = JSON.parse(response);
                                                            console.log('response:', responseObject.status);
                                                            if (responseObject.status == 'success'){
                                                                Swal.fire({
                                                                    title: 'Success',
                                                                    text: responseObject.message,
                                                                    icon: 'success',
                                                                    confirmButtonText: 'OK'
                                                                });
                                                            }  else {
                                                                Swal.fire({
                                                                    title: 'Error',
                                                                    text: responseObject.message,
                                                                    icon: 'error',
                                                                    confirmButtonText: 'OK'
                                                                });
                                                            }
                                                        },
                                                        error: function(xhr, status, error) { 
                                                            console.error('Failed to Fetch Data: ' + error); 
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                        
                                        <?php
                                        }
                                    ?>
                
                                    
                                </div>
                            </div>
                
                            <div class="product-container">
                                <h5 class="rating-head">Description</h5>
                            </div>
        
                            <div class="mall-container">
                                <h5 class="rating-head">Store</h5>
                                <div class="malldetails">
                                    <div class="mall-image">
                                        <img src="" alt="Store Image">
                                    </div>
                                    <div class="product-details">
                                        <a href="" class="custom-link" style="text-decoration: none; color: inherit;" id='mylink'><h5><?= $row['storeName'] ?></h5></a>
                                        <p><?= $row['storeDescription'] ?></p>
                                    </div>
                                
                                </div>
                            </div>
                
                            
                
                            <div class="product-container full-details">
                                <h5 class="rating-head">Rating</h5>
                                <div class="product-details"><span>Rating Content</span></div>
                            </div>
                        </div>
                        <?php
                    }else {
                        include_once('../../error.html');
                    ?>   
                    <?php
        
                    }     
            } else {
                $code = null;
                $e = 'Error Product Code Sent';
            }
        
        }
        
    }   catch (Exeption $e){
        include_once('../../error.html');
        error_log($e);
        $code = NULL;
    }

    

?>

</body>
</html>
