<?php include("config/db.php"); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Test1</title>
</head>
<body>

    <h1 class="text-center fw-bold fs-1 p-5 m-5"><spam class="text-danger">X</spam><spam class="text-success">E</spam></h1>
    



    <?php
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $item = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => $quantity
    );
    
    array_push($_SESSION['cart'], $item);
    
    
    foreach ($_SESSION['cart'] as $item) {
        echo $item['name'] . ' - ' . $item['quantity'] . ' x ' . $item['price'] . '<br>';
    }
    
    ?>




    <?php
    if(isset($_SESSION['cart'])){
        ?>
        <div class="container w-100">

        <?php
            foreach($_SESSION['cart'] as $data){
                ?>
                <div class="row p-2">
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="https://dummyimage.com/180x120/dbdbdb/787878.png&text=Image+cap" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['name']; ?></h5>
                            <p class="card-text"><?php echo $data['price']; ?></p>
                            <a href="#" class="btn btn-primary">Delete</a>
                        </div>
                    </div>
                </div>
                <?php
                
            }
        ?>
        </div>
        <?php
    }
    ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
