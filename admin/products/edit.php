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
    <title>Update</title>
</head>
<body>

    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $select = "SELECT * FROM products WHERE id = '$id'";
        $result = mysqli_query($conn, $select);
        $data = $result->fetch_assoc();
    ?>

    <?php
    if(isset($_POST['submit'])){
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $update = "UPDATE products SET product_name = '$product_name',, price = '$price', quantity = '$quantity' WHERE id= '$id'";
        $result = mysqli_query($conn, $update);
        if($result){
            // echo header('Location:/ecommerce/admin/products/edit.php?id='.$id);
            echo header('Location:/ecommerce/product.php');
        }
    }
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="text-center">
                        <h1 class="p-3">Update Products</h1>
                    </div>
                    <div class="form-group py-3">
                        <div class="text-center" style="background-color: lightblue;">
                            <img src="../../uploads/img/<?php echo $data['product_image']; ?>" alt="Product Image">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <label>Product:</label>
                        <input type="text" class="form-control" name="product_name" value="<?php echo $data['product_name']?>">
                    </div>
                    <div class="form-group py-3">
                        <label>Price:</label>
                        <input type="text" class="form-control" name="price"
                            value="<?php echo $data['price']?>">
                    </div>
                    <div class="form-group py-3">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="quantity"
                            value="<?php echo $data['quantity']?>">
                    </div>
                    <button type="submit" class="btn btn-primary my-1" name="submit">Update</button>
                    <a href="../../product.php"><button class="btn btn-secondary my-1" name="submit">Back</button></a>
                </form>
            </div>
        </div>
    </div>
    <?php
    }
    ?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
