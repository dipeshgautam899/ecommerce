<?php 
include ('config/db.php');
include ('config/secure.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>E-Commerce Website</title>
</head>

<body>

    <nav class="nav bg-secondary p-3" style="text-decoration: none;">
        <a class="nav-link active text-light fw-bolder" aria-current="page" href="#">Xdezo Ecommerce</a>
        <a class="nav-link text-light" href="index.php">Home</a>
        <a class="nav-link text-light" href="product.php">Product</a>

        <div class="position-absolute end-0 pe-2">
            <a href="cart.php"><button class="btn btn-info">Cart</button></a>
            <a href="cart.php"><button class="btn btn-info">Profile</button></a>
            <a href="config/logout.php"><button class="btn btn-info">Log-out</button></a>
        </div>
    </nav>

    <?php
// Start the session
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $select);
    $data = $result->fetch_assoc();

    // Get product details and add to cart
    $product_id = $_GET['id'];
    $product_image = $data['product_image'];
    $product_name = $data['product_name'];
    $product_price = $data['price'];
    $quantity = 1;

    // Check if item is already in the cart
    if (isset($_SESSION['shopping_cart'][$product_id])) {
        $quantity = $_SESSION['shopping_cart'][$product_id]['quantity'] + 1;
    }

    $item_array = array(
        'product_id' => $product_id,
        'product_image' => $product_image,
        'product_name' => $product_name,
        'product_price' => $product_price,
        'quantity' => $quantity
    );

    // Add item to cart array
    $_SESSION['shopping_cart'][$product_id] = $item_array;
}

if (isset($_POST['quantity']) && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if (isset($_SESSION['shopping_cart'][$product_id])) {
        if ($_POST['quantity'] == 0) {
            // If quantity is zero, remove item from cart array
            unset($_SESSION['shopping_cart'][$product_id]);
        } else {
            // Update quantity in cart array based on plus or minus button click
            if (isset($_POST['operation']) && $_POST['operation'] == 'minus') {
                $_SESSION['shopping_cart'][$product_id]['quantity'] = max(1, $_SESSION['shopping_cart'][$product_id]['quantity'] - 1);
            } else if (isset($_POST['operation']) && $_POST['operation'] == 'plus') {
                $_SESSION['shopping_cart'][$product_id]['quantity'] = $_SESSION['shopping_cart'][$product_id]['quantity'] + 1;
            } else {
                $_SESSION['shopping_cart'][$product_id]['quantity'] = max(1, $quantity);
            }
        }
    }
}

// Remove item from cart
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
        if ($value['product_id'] == $_GET['id']) {
            // Remove item from cart array
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
}
?>
<!-- <div class="row">
    <div class="col">
        <h4 class="text-center">Products</h4>
    </div>
    <div class="col">
        <h4 class="text-center">Details</h4>
    </div>
    <div class="col">
        <h4 class="text-center">Total</h4>
    </div>
</div> -->
<?php

// Display cart items
if (!empty($_SESSION['shopping_cart'])) {
    $total = 0;
    $no=1;
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
        $total += ($value['product_price'] * $value['quantity']);
        ?>

         <div class="w-100 p-4">
            <div class="row pb-3 border-bottom">
                <div class="col">
                <p class="fw-bold float-left"><?php echo $no++ ?>.</p>
                <div class="text-center">
                    <img src="uploads/img/<?php echo $value['product_image']; ?>" alt="Product-image">
                </div>
                    
                </div> 

                <div class="col">
                    <h3><b><?php echo $value['product_name'];?></b></h3>
                    <h5>Rs <?php echo $value['product_price']; ?></h5>

                    <form method="post" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">

                        <label for="quantity" class="fw-bold">Quantity:</label>
                        <div class="quantity">
                            <button type="submit" name="operation" value="minus" class="bg-primary text-light rounded-pill border-0 " style="width:5%">-</button>
                            <input type="text" name="quantity" value="<?php echo $value['quantity']; ?>" id="quantity" class="text-center" style="width: 5%;">
                            <button type="submit" name="operation" value="plus" class="bg-primary text-light rounded-pill border-0 " style="width:5%">+</button>
                        </div>
                        <br>
                        <p class="fw-bolder">Subtotal: Rs <?php echo ($value['product_price'] * $value['quantity']); ?> </p>
                        <!-- <button type="submit" name="update" value="Update">Update</button> -->
                        <a href="cart.php?action=delete&id=" class="bg-success rounded text-light p-2" style="text-decoration:none;">Buy now</a>
                        <a href="cart.php?action=delete&id=<?php echo $value['product_id']; ?>" class="bg-danger rounded text-light p-2" style="text-decoration:none;">Remove</a>
                    </form>
                </div> 
            </div>
        </div>
        <?php
    }
    ?>
    <div class="row p-1 w-100">
        <h3 class="fw-bolder">
            Total:- <?php echo $total ?>
        </h3> 
        <a href="" class="btn btn-success">Buy</a>
    </div>
    <?php
} else {
    // echo '<p>Your cart is empty.</p>';
    ?>
   <div class="container">
    <h1 class="fw-bold text-center text-info">CART</h1>
   <div class="position-absolute top-50 start-50 translate-middle">
        <h2 class="text-danger fw-bolder">Your cart is empty :(</h2>
    </div>
   </div>
    <?php
}

?>


    <footer class="w-100 page-footer font-small blue pt-4 p-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-5 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">About</h5>
                    <p>Our Company focuses on building the best and interactive E-commerce <br> website for customers to
                        be easy to use and efficient.</p>
                </div>

                <hr class="clearfix w-100 d-md-none pb-3">

                <div class="col-md-3 mb-md-0 mb-3">

                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="index.php" style="text-decoration: none;" class="text-dark">Home</a>
                        </li>
                        <li>
                            <a href="product.php" style="text-decoration: none;" class="text-dark">Products</a>
                        </li>
                        <li>
                            <a href="profile.php" style="text-decoration: none;" class="text-dark">Profile</a>
                        </li>
                        <li>
                            <a href="config/logout.php" style="text-decoration: none;" class="text-dark">Logout</a>
                        </li>
                    </ul>

                </div>
                <div class="col-md-4 mb-md-0 mb-3 ">
                    <h5 class="text-uppercase">Location</h5>
                    <!--Google map-->
                    <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 80px">
                        <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                    <!--Google Maps-->
                </div>

            </div>

        </div>

        <div class="footer-copyright text-center pt-5">© 2023 Copyright:
            <a href="start.php" style="text-decoration: none; color: #000;"> XdezoEcommerce.com</a>
        </div>

    </footer>
    <!-- Footer -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>