<?php

if($_SESSION['role'] == 0){

}else{
?>
    <script>
        location.replace("http://localhost/ecommerce/login.php?msg=Logged-In");
    </script>
<?php

}


?>