<?php
include('../../config/db.php');
include('../../config/secure.php');
// include('../../config/admin.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>

<body>
    
    <?php
    
    if(isset($_GET['id'])){
        
        $id = $_GET['id'];
        
        // $select = "SELECT FROM products WHERE id = '$id'";
        $select = "SELECT * FROM products WHERE id = '$id'";

        
        $result = mysqli_query($conn, $select);
        $row = $result->fetch_assoc();
        ?>

        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card" style="width: 22rem;">
                <img src="../../uploads/img/<?php echo $row['product_image']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center fw-bold"><?php echo $row['product_name']?></h5>
                    <h6 class="card-title text-center">Rs. <?php echo $row['price']?> per piece</h6>
                    <h6 class="card-title text-center">Quantity: <?php echo $row['quantity']?></h6>
                    <h6 class="card-title text-center"><?php echo $row['created_at']?></h6>
                    <div class="text-center">
                        <a href="../../product.php" class="btn btn-secondary w-50">Back</a>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>