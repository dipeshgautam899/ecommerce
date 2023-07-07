<?php 
include('config/db.php'); 
include('config/secure.php'); 
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

    if(isset($_SESSION['cart'][$_GET['id']])) {
        $_SESSION['cart'][$_GET['id']]++;
    } else {
        $_SESSION['cart'][$_GET['id']] = 1;
    }

    ?>





    <nav class="nav bg-secondary p-3" style="text-decoration: none;">
        <a class="nav-link active text-light fw-bolder" aria-current="page" href="#">Xdezo Ecommerce</a>
        <a class="nav-link text-light" href="index.php">Home</a>
        <a class="nav-link text-light" href="product.php">Product</a>
        <?php
        if($_SESSION['role'] == 0){
            ?>
            <a class="nav-link text-light" href="admin/users/index.php">Users</a>
            <a class="nav-link text-light" href="admin/products/index.php">List-Products</a>
            <?php
        }
        ?>

        <div class="position-absolute end-0 pe-3">
            <!-- <a href="cart.php"><button class="btn btn-info">Cart</button></a> -->
            <!-- <a href="cart.php"><button class="btn btn-info">Profile</button></a> -->
            <div class="dropdown">
                <button class="btn text-light dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['name']; ?>
                </button>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="index.php"><?php echo $_SESSION['name'];?></a></li>
                    <li><a class="dropdown-item" href="cart.php">Cart</a></li>
                    <li><a class="dropdown-item" href="config/logout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    
    $select = "SELECT * FROM products";
    $result = mysqli_query($conn, $select);

    ?>

    <div class="row ps-5 pt-2 ms-2">
        <?php while($data = $result->fetch_assoc()){ ?>
        <div class="col-sm-3 col-md-3 col-lg-3 p-2">
            <div class="card p-1" style="width: 17rem;">
                <!-- <img src="https://dummyimage.com/180x120/dbdbdb/787878.png&text=Image+cap" class="card-img-top" alt="..."> -->
                <img src="uploads/img/<?php echo $data['product_image']?>" class="card-img-top" alt="..."
                    height="220px">
                <div class="card-body">
                    <h5 class="card-title py-1"><?php echo $data['product_name']; ?></h5>
                    <p class="card-text">Rs <?php echo $data['price']; ?></p>
               
                    <a class="btn btn-primary d-block" href="admin/products/view.php?id=<?php echo $data['id']?>">View</a>
       
                    <a href="cart.php?id=<?php echo $data['id'];?>" class="btn btn-success d-block mt-2">Add to Cart</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <footer class="page-footer font-small blue pt-4 p-4 position-relative bottom-0 ">

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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>