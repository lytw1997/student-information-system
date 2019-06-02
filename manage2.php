<?php
    include 'config.php';                       
    $username = (!isset($_POST ['username']) || !preg_match ('/^(?=.*[a-z])(?=.*\d){3,20}.*$/', $_POST ['username'])) ? die ('2') : (trim($_POST['username']));
    $password = (!isset($_POST ['password']) || !preg_match ('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){5,10}.*$/', $_POST ['password'])) ? die ('3') : (trim($_POST['password']));
    $userid = $_SESSION[ 'userid' ];
    $sql="UPDATE user SET username='$username', password='$password' WHERE id='$userid'";
    mysqli_query($connection,$sql) or die ('1'.mysql_error());
?>