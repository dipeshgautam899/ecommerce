<?php
include('../../config/db.php');
include('../../config/secure.php');
include('../../config/admin.php');
?>

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = "DELETE FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $delete);

    echo header('Location:/ecommerce/product.php');
}

?>
