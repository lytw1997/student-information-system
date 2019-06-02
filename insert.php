<?php
    include 'config.php';
    extract($_POST);
    $matric = $_SESSION[ 'matric' ];
    $email = (!isset($_POST ['email']) || !preg_match ('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^', $_POST ['email'])) ? die ('1') : (trim($_POST['email']));
    $phone = (!isset($_POST ['phone']) || !preg_match ('^(\+?6?01)[0-46-9]-*[0-9]{7,8}$^', $_POST ['phone'])) ? die ('2') : (trim($_POST['phone']));
    if(empty($address)){
        die ("3");
    }
    $sql="UPDATE student SET student_email='$email', student_phone='$phone', student_address='$address' WHERE student_matric='$matric'";
    mysqli_query($connection,$sql) or die ('3'.mysql_error());
?>