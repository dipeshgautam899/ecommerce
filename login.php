<?php include("config/db.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ecommerce Login Page</title>
</head>

<body>


    <?php
    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $check_email = "SELECT * FROM users WHERE email ='$email' AND password ='$password'";
        $result = mysqli_query($conn, $check_email);
        $count = mysqli_num_rows($result);
        $data = $result->fetch_assoc();
        
        if($count == 1){
            session_start();
            $_SESSION['email'] = $data['email'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['role'] = $data['role'];
            ?>
            <script>
                location.replace("http://localhost/ecommerce/index.php?msg=LoginSuccessful");
            </script>
            <?php
        } else{
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong style="text-align: center;">THE USER EMAIL DOESN'T EXISTS</strong>
            </div>
        <?php
        }
    }
    ?>


    <div class="mt-5 pt-5 sm-col-3">
        <div class="container w-25 mt-5 pt-5">
            <div class="border border-secondary p-4 mt-4">
                <form class="form-login" action="#" method="POST" enctype="multipart/form-data">
                    <h2 class="text-center mb-4 fw-bolder fs-1 p-2">Login</h2>

                    <div class="form-group p-1">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="example: john123@gmail.com" name="email">
                    </div>

                    <div class="form-group p-1">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-block m-1" id="bt">Log-in</button>
                    <a href="start.php" class="btn btn-secondary btn-block m-1">Back</a>
                    <p class="p-1">Don't have an account ? <a href="registration.php">Sign-up</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- <style>
        #bt:hover{
            background-color: lightgray;
            font-size:18px;
        }         
    </style> -->
</body>
</html>