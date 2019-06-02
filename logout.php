<?php
    include 'config.php';
    mysqli_close ($connection);
    echo "Logging Out";
    session_unset();
    session_destroy();
    header("refresh: 1; url=login.php");
?>