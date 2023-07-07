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
    <title>Edit User</title>
</head>
<body>



    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $select = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($conn, $select);

        $user_data = $result->fetch_assoc();
    }
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="text-center">
                        <h1 class="p-3">Update Users</h1>
                    </div>
                    <div class="form-group py-2">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $user_data['name']?>">
                    </div>
                    <div class="form-group py-3">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email"
                            value="<?php echo $user_data['email']?>">
                    </div>
                    <div class="form-group py-3">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address"
                            value="<?php echo $user_data['address']?>">
                    </div>
                    <div class="form-group py-3">
                        <label>Contact</label>
                        <input type="text" class="form-control" name="contact"
                            value="<?php echo $user_data['contact']?>">
                    </div>
                    <div class="form-group py-3">
                        <label>Role</label>
                            <?php 
                            if($user_data['role'] == 1){
                                ?>
                                <select class="form-select" aria-label="Default select example" name="role">
                                    <option value="1">Normal User</option>
                                    <option value="0">Admin</option>
                                </select>
                                <?php
                                
                            } else{
                                ?>
                                <select class="form-select" aria-label="Default select example" name="role">
                                    <option value="0">Admin</option>
                                    <option value="1">Normal User</option>
                                </select>
                                <?php
                            }
                            ?>       
                    </div>
                    <button type="submit" class="btn btn-primary my-1" name="submit">Update</button>
                    <a href="../../product.php"><button class="btn btn-secondary my-1" name="submit">Back</button></a>
                </form>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>


