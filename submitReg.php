<?php
	include 'config.php';
	extract($_POST);
    $username = (!isset($_POST ['username']) || !preg_match ('/^(?=.*[a-z])(?=.*\d){3,20}.*$/', $_POST ['username'])) ? die ('1') : (trim($_POST['username']));
    $password = (!isset($_POST ['password']) || !preg_match ('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){5,10}.*$/', $_POST ['password'])) ? die ('2') : (trim($_POST['password']));
    $email = (!isset($_POST ['email']) || !preg_match ('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^', $_POST ['email'])) ? die ('3') : (trim($_POST['email']));
    $phone = (!isset($_POST ['phone']) || !preg_match ('^(\+?6?01)[0-46-9]-*[0-9]{7,8}$^', $_POST ['phone'])) ? die ('4') : (trim($_POST['phone']));
    if(empty($address)){
        die ("5");
    }
    $count="SELECT count(*) FROM user";
    $role="student";
    $checkusercount=mysqli_query($connection,$count) or die ('Error in query:$query.'.mysql_error());
    $row = mysqli_fetch_row ($checkusercount);
    if ($row[0]==0){
        $rowid=1;
        $queryinsert="INSERT INTO user VALUES ('$rowid', '$username', '$password', '$role')";
        mysqli_query($connection,$queryinsert) or die ('6'.mysql_error());
        $sql="UPDATE student SET student_email='$email', student_phone='$phone', student_dob='$dob', student_gender='$gender', student_address='$address', student_userid='$rowid' WHERE student_matric='$matric'";
        mysqli_query($connection,$sql) or die ('Error in query:$query.'.mysql_error());
        $_SESSION['userid']=$rowid;
    }
    else{
        $rowid=$row[0]+1;
        $queryinsert="INSERT INTO user VALUES ('$rowid', '$username', '$password', '$role')";
        mysqli_query($connection,$queryinsert) or die ('6'.mysql_error());
        $sql="UPDATE student SET student_email='$email', student_phone='$phone', student_dob='$dob', student_gender='$gender', student_address='$address', student_userid='$rowid' WHERE student_matric='$matric'";
        mysqli_query($connection,$sql) or die ('Error in query:$query.'.mysql_error());
        $_SESSION['userid']=$rowid;
    }
    unset($_SESSION['register']);
?>