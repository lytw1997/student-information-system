<?php
	include 'config.php';
	extract($_POST);
	$_SESSION['matric']=$matric;
	$_SESSION['ic']=$ic;
	$sql="SELECT * FROM student_register WHERE student_matric='$matric' AND student_ic='$ic'";
	$result=mysqli_query($connection,$sql) or die ('Error in query:$query.'.mysql_error());
	$checkusername="SELECT * FROM student WHERE student_matric='$matric' AND student_ic='$ic'";
	$result1=mysqli_query($connection,$checkusername) or die ('Error in query:$query.'.mysql_error());
	if (mysqli_num_rows ($result1)){
        $row=mysqli_fetch_row($result1);
        $_SESSION['studentid']=$row[0];
        $_SESSION['studentsession']=$row[13];
        $_SESSION['studentsemester']=$row[14];
		if ($row[11]!=""){
			$_SESSION['userexist']="1";
			header('Location:sign.php');
            exit;
		}
    }
    if (mysqli_num_rows ($result1)){
        $_SESSION['register']="1";
        header('Location:studentReg.php');
    }
    else{
        $_SESSION['errorsignup']="1";
        header('Location:sign.php');
    }
    mysqli_free_result ($result);
	mysqli_free_result ($result1);
?>