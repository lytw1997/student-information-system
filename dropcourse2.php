<?php
    include 'config.php';
    extract($_POST);
    $matric = $_SESSION[ 'matric' ];
    $student_id=$_SESSION['studentid'];
    $session=$_SESSION['studentsession'];
    $semester=$_SESSION['studentsemester'];
    $successDrop=1;
    $getCourse="SELECT * FROM course WHERE course_id='$course'";
    $result=mysqli_query($connection,$getCourse) or die ('Error in query:$query.'.mysql_error());
    if (mysqli_num_rows ($result)>0){
        while($row = mysqli_fetch_row ($result)){
            $creditHour=$row[4];
        }
    }
    $updateCredit="UPDATE student SET student_creditHour=student_creditHour+'$creditHour' WHERE student_id='$student_id'";
    mysqli_query($connection,$updateCredit) or die ('Error in query:$query.'.mysql_error());
    $updateCapacity="UPDATE course SET course_capacity=course_capacity+1 WHERE course_id='$course'";
    mysqli_query($connection,$updateCapacity) or die ('Error in query:$query.'.mysql_error());
    $deleteCourse="DELETE FROM student_course WHERE course_id='$course' AND student_id='$student_id'";
    $result1=mysqli_query($connection,$deleteCourse) or die ('Error in query:$query.'.mysql_error());
    if($result1){
        echo "$successDrop";
    }
    mysqli_free_result( $result );
?>