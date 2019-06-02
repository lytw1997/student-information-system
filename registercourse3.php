<?php
    include 'config.php';
    extract($_POST);
    $matric = $_SESSION[ 'matric' ];
    $student_id=$_SESSION['studentid'];
    $session=$_SESSION['studentsession'];
    $semester=$_SESSION['studentsemester'];
    $successRegister=1;
    $courseOverlapping=2;
    $LesscreditHours=3;
    $checkCreditHours=0;
    $checkCourseOverlapping=0;
    $getStudentCreditHours="SELECT student_creditHour FROM student WHERE student_id='$student_id'";
    $result=mysqli_query($connection,$getStudentCreditHours) or die ('Error in query:$query.'.mysql_error());
    if (mysqli_num_rows ($result)>0){
        while($row = mysqli_fetch_row ($result)){
            $StudentCreditHours = $row[0];
        }
    }
    $getCourseCreditHours="SELECT course_creditHour FROM course WHERE course_id='$course'";
    $result1=mysqli_query($connection,$getCourseCreditHours) or die ('Error in query:$query.'.mysql_error());
    if (mysqli_num_rows ($result1)>0){
        while($row1 = mysqli_fetch_row ($result1)){
            $CourseCreditHours = $row1[0];
        }
    }
    if($StudentCreditHours<$CourseCreditHours){
        $checkCreditHours = $checkCreditHours+1;
    }
    if($checkCreditHours>0){
        echo "$LesscreditHours";
        exit;
    }
    $getCourseDay="SELECT ctimetable_day, ctimetable_start, ctimetable_end FROM course_timetable WHERE course_id='$course'";
    $result2=mysqli_query($connection,$getCourseDay) or die ('Error in query:$query.'.mysql_error());
    if (mysqli_num_rows ($result2)>0){
        while($row2 = mysqli_fetch_row ($result2)){
            $CourseDay = $row2[0];
            $RegCourseStart = $row2[1];
            $RegCourseEnd = $row2[2];
        }
    }
    $getCourseRegistered="SELECT course_id FROM student_course WHERE student_currentSemester='$semester' AND student_session='$session' AND student_id='$student_id'";
    $result3=mysqli_query($connection,$getCourseRegistered) or die ('Error in query:$query.'.mysql_error());
    if (mysqli_num_rows ($result3)>0){
        while($row3 = mysqli_fetch_row ($result3)){
            $CourseRegistered = $row3[0];
            $getSameCourseDay = "SELECT course_id, ctimetable_start, ctimetable_end FROM course_timetable WHERE ctimetable_day='$CourseDay' AND course_id='$CourseRegistered'";
            $result4=mysqli_query($connection,$getSameCourseDay) or die ('Error in query:$query.'.mysql_error());
            if (mysqli_num_rows ($result4)>0){
                while($row4 = mysqli_fetch_row ($result4)){
                    $RegisteredCourseStart = $row4[1];
                    $RegisteredCourseEnd = $row4[2];
                    if($RegCourseStart<$RegisteredCourseStart){
                        if($RegCourseEnd>$RegisteredCourseStart){
                            $checkCourseOverlapping=$checkCourseOverlapping+1;
                        }
                    }
                    if($RegCourseStart>$RegisteredCourseStart){
                        if($RegCourseStart<$RegisteredCourseEnd){
                            $checkCourseOverlapping=$checkCourseOverlapping+1;
                        }
                    }
                    if(($RegCourseStart==$RegisteredCourseStart)||($RegCourseEnd==$RegisteredCourseEnd)){
                        $checkCourseOverlapping=$checkCourseOverlapping+1;
                    }
                }
            }
        }
        mysqli_free_result( $result3 );
        mysqli_free_result( $result4 );
    }
    if($checkCourseOverlapping>0){
        echo "$courseOverlapping";
        exit;
    }
    if($checkCourseOverlapping==0 && $checkCreditHours==0){
        $updateCredit="UPDATE student SET student_creditHour=student_creditHour-'$CourseCreditHours' WHERE student_id='$student_id'";
        mysqli_query($connection,$updateCredit) or die ('Error in query:$query.'.mysql_error());
        $updateCapacity="UPDATE course SET course_capacity=course_capacity-1 WHERE course_id='$course'";
        mysqli_query($connection,$updateCapacity) or die ('Error in query:$query.'.mysql_error());
        $getYearofStudy="SELECT student_currentSemester FROM student WHERE student_id='$student_id'";
        $result5=mysqli_query($connection,$getYearofStudy) or die ('Error in query:$query.'.mysql_error());
        if (mysqli_num_rows ($result5)>0){
            while($row5 = mysqli_fetch_row ($result5)){
                $thisSemester=$row5[0];
            }
        }
        $insertCourse="INSERT INTO student_course (course_id,student_id,student_semester,student_session,student_currentSemester) VALUES ($course,$student_id,$thisSemester,'$session',$semester)";
        mysqli_query($connection,$insertCourse) or die ('Error in query:$query.'.mysql_error());
        echo "$successRegister";
    }
    mysqli_free_result( $result );
    mysqli_free_result( $result1 );
    mysqli_free_result( $result2 );
    mysqli_free_result( $result5 );
?>