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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ecommerce Registration Page</title>
</head>
<body>

    <?php

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $role = $_POST['role'];

        if($name != "" && $email != "" && $password != "" && $cpassword != ""){
            if(strlen($password) >= 8){
                if($password == $cpassword){
                    $password = md5($password);
                    $check_email = "SELECT * FROM users WHERE email='$email'";
                    $email_res = mysqli_query($conn, $check_email);
                    $count = mysqli_num_rows($email_res);
                    if($count == 0){
                        $insert = "INSERT INTO users(name, email, password, role) VALUES('$name', '$email', '$password', '$role')";
                        $result = mysqli_query($conn, $insert);
                        if($result){
                            echo header('location:index.php?msg=registered');
                        } 
                    } else{
                        ?>
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <div class="p-5 mt-5 alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong class="pt-3" style="text-align: center;">You're Email already exists !</strong>
                                </div>
                            </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <div class="p-5 mt-5 alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong class="pt-3" style="text-align: center;">You're password doesn't match with confirmation !</strong>
                        </div>
                    </div>
                <?php

                }

            } else{
                ?>
                <div class="position-absolute top-50 start-50 translate-middle">
                    <div class="p-5 mt-5 alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong class="pt-3" style="text-align: center;">You're password must be of 8 characters</strong>
                    </div>
                </div>
                <?php
            }
        } else{
            ?>

            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="p-5 mt-5 alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong class="pt-3" style="text-align: center;">Please fill all the details !</strong>
                </div>
            </div>

            <?php
        }
    }
    ?>

    <div class="container w-50 p-4 mt-5">
        <div class="border border-secondary p-5 mt-4">
            <form action="" method="POST" enctype="multipart/form-data" class="form-login">
                <h2 class="text-center mb-4 fw-bolder fs-1 p-2">Add Users</h2>
                <div class="form-group p-1">
                    <label>Name:</label>
                    <input type="text" class="form-control" placeholder="Rajesh Hamal" name="name">
                </div>
                <div class="form-group p-1">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" placeholder="example: john123@gmail.com" name="email">
                </div>
                <div class="form-group p-1">
                    <label for="email">Role:</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option value="1">Normal User</option>
                        <option value="0">Admin</option>
                    </select>
                </div>
                <div class="form-group p-1">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password">
                </div>
                <div class="form-group p-1">
                    <label for="cpassword">Confirm Password:</label>
                    <input type="password" class="form-control" id="cpassword" placeholder="Re-enter password" name="cpassword">
                </div>

                <button type="submit" name="submit" class="btn btn-success btn-block m-1" id="bt">Add User</button>
                <a href="index.php" class="btn btn-secondary btn-block m-1">Back</a>
            </form>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>
</html>
