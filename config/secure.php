<?php

session_start();
if($_SESSION['email'] && $_SESSION['id']){

} else{
    ?>
    <script>
        location.replace("http://localhost/ecommerce/start.php?msg=accessdenied");
    </script>
    <?php
}

?>