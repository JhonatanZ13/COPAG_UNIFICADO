<?php

    if (!isset($_SESSION['auth'])=="ok") {
        redirect("login.php");
    }

?>