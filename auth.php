<?php
	include 'config.php';
	extract($_POST);
	$sql="SELECT * FROM user WHERE username='$username' AND password='$password' AND role='$role'";
	$result=mysqli_query($connection,$sql) or die ('Error in query1:$query.'.mysql_error());
	if (mysqli_num_rows ($result)>0){
        while($row = mysqli_fetch_row ($result)){
            $getmatricandic="SELECT * FROM student WHERE student_userid='$row[0]'";
            $result1=mysqli_query($connection,$getmatricandic) or die ('Error in query:$query.'.mysql_error());
            mysqli_num_rows ($result1);
            $row2 = mysqli_fetch_row ($result1);
            $_SESSION['matric']=$row2[9];
            $_SESSION['ic']=$row2[10];
            $_SESSION['studentid']=$row2[0];
            $_SESSION['user']="1";
            $_SESSION['userid']=$row[0];
            $_SESSION['studentsession']=$row2[13];
            $_SESSION['studentsemester']=$row2[14];
		    header('Location:dashboard.php');
        }
	}
	else{
		$_SESSION['errorsignin']="1";
		header('Location:login.php');
	}  
    mysqli_free_result($result);
    mysqli_free_result($result1);
?>