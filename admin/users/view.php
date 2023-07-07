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
    <title>Title</title>
</head>

<body>
    
    <?php
    
    if(isset($_GET['id'])){
        
        $id = $_GET['id'];
        $select = "SELECT * FROM users WHERE id = '$id'";

        
        $result = mysqli_query($conn, $select);
        $row = $result->fetch_assoc();
        ?>

        <div class="position-absolute top-50 start-50 translate-middle">

            <div class="card" style="width: 22rem;">
                <div class="card-body" >
                    <div class="text-center p-2">
                        <img src="../../assets/img/default-img.jpg" alt="Profile img" class="rounded-circle" style="height: 16rem;" >
                    </div>
                    
                    <h5 class="card-title text-center">Name: <?php echo $row['name']?></h5>
                    <h6 class="card-title text-center">
                        Role:
                        <?php
                        if($row ['role'] ==0){
                            echo "Admin";
                        } else{
                            echo "User";
                        }
                        ?>
                    </h6>
                    <h6 class="card-title text-center">Email: <?php echo $row['email']?></h6>
                    <h6 class="card-title text-center">Contact: <?php echo $row['contact']?></h6>
                    <h6 class="card-title text-center">Address: <?php echo $row['address']?></h6>
                    <h6 class="card-title text-center">Joined in: <?php echo $row['created_at']?></h6>
                    
                    <div class="text-center">
                        <a href="index.php" class="btn btn-secondary w-50">Back</a>
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