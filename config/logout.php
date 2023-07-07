<?php

session_start();
unset($_SESSION['email']);
unset($_SESSION['name']);
unset($_SESSION['id']);
?>
<script>
        location.replace("http://localhost/ecommerce/start.php?msg=LogoutSuccessful");
</script>