<?php
include('../../config/db.php');
include('../../config/secure.php');
include('../../config/admin.php');
?>

<?php
echo "hwllo";

if(isset($_GET['id'])){
    echo "hwllo";
    $id = $_GET['id'];
    $delete = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $delete);

    if($result){
        echo header('Location:/ecommerce/admin/users/index.php');
    }
}

?>
