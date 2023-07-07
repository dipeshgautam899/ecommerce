<?php
include('../../config/db.php');
include('../../config/secure.php');
include('../../config/admin.php');
?>

<?php
    $select = "SELECT * FROM products";
    $result = mysqli_query($conn, $select);
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
    <div class="w-100 position-relative p-2">
        <a href="../../product.php" class="btn btn-secondary position-absolute start-0 ms-2">Back</a>
        <a href="add_product.php" class="btn btn-success position-absolute end-0 me-2">Add-Products</a>
    </div>

    <div class="p-4">
        <h1 class="text-center fw-bolder fs-1 p-2">Products</h1>

        <table class="table table-bordered ">
            <thead>
                <tr class="bg-info">
                    <th scope="col" class="text-center">S.N.</th>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col" class="text-center">Product Name</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Created 'Date/Time'</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while($data = $result->fetch_assoc()){
                ?>
                <tr>
                    <th scope="row" class="text-center" style="line-height:3;"><?php echo $i++ ?></th>
                    <td class="text-center"><img src="../../uploads/img/<?php echo $data['product_image'];?>" alt="Product Img"></td>
                    <td class="text-center" style="line-height:3;"><?php echo $data['product_name'];?></td>
                    <td class="text-center" style="line-height:3;"><?php echo $data['price'];?></td>
                    <td class="text-center" style="line-height:3;"><?php echo $data['quantity'];?></td>
                    <td class="text-center" style="line-height:3;"><?php echo $data['created_at'];?></td>
                    <td class="text-center" style="line-height:3;">
                        <a href="view.php?id=<?php echo $data['id'];?>" class="btn btn-primary" name="view">View</a>
                        <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-secondary">Edit</a>
                        <a href="delete.php?id=<?php echo $data['id'];?>" class="btn btn-danger">Delete</a>
                        
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>