<?php
include('../../config/db.php');
include('../../config/secure.php');
include('../../config/admin.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>
    <!-- <div class="w-100 position-relative p-2">
        <a href="../../product.php" class="btn btn-secondary position-absolute start-0 ms-2">Back</a>
    </div> -->

    <?php
    if(isset($_POST['submit'])){


        $filename = $_FILES['product_image']['name'];
        $size = $_FILES['product_image']['size'];

        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        // $description = $_POST['description'];

        
        if($product_name != "" & $price != "" & $quantity != ""){
            

            $newname = str_replace(" ", "", $filename);
            $newname = strtolower($newname);
            $newname = explode(".", $newname);

            
            $ext = $newname[1];
            $firstname = $newname[0];
            $finalname = $firstname."-".time().".".$ext;

            if($ext == "jpeg" || $ext == "jpg" || $ext == "png" || $ext == "gif"){
                if($size < 2097152){
          
                    if(move_uploaded_file($_FILES['product_image']['tmp_name'], '../uploads/img/'.$finalname)){
                        $insert = "INSERT INTO products(product_image,product_name, price, quantity) VALUES ('$finalname','$product_name', '$price', '$quantity')";
                        $result = mysqli_query($conn, $insert);
                        if($result){
                            echo header("location:../product.php?msg=Product-Added");
                        }

                    }else{
                        ?>
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <div class="p-5 mt-5 alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong class="pt-3" style="text-align: center;">Upload failed !</strong>
                            </div>
                        </div>

                    <?php
                    }
                }else{
                    ?>
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <div class="p-5 mt-5 alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong class="pt-3" style="text-align: center;">File exceeds more than 20MB !</strong>
                            </div>
                        </div>
                    <?php

                }
            } else{
                ?>
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <div class="p-5 mt-5 alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong class="pt-3" style="text-align: center;">Unsupported Format !</strong>
                        </div>
                    </div>
                <?php
            }
            


            
        }else{
        ?>
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="p-5 mt-5 alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong class="pt-3" style="text-align: center;">Please Fill all the details !</strong>
                </div>
            </div>

        <?php

        }
    }
    ?>
    
    <div class="container w-50 p-4 mt-5">
        <div class="border border-secondary p-5 mt-4">
            <form action="#" method="POST" enctype="multipart/form-data" class="form-login">
                <h2 class="text-center mb-4 fw-bolder fs-1 p-2">Add Products</h2>
                
                <div class="form-group p-1">
                    <label>Product Image:</label>
                    <input type="file" class="form-control" name="product_image">
                </div>
                <div class="form-group p-1">
                    <label>Product Name:</label>
                    <input type="text" class="form-control" name="product_name">
                </div>
                <div class="form-group p-1">
                    <label for="price">Product Price:</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="form-group p-1">
                    <label for="quantity">Quantity:</label>
                    <input type="text" class="form-control" placeholder="Enter your quantity" name="quantity">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block m-1">ADD</button>
                <a href="../../product.php" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>