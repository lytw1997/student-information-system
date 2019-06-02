<?php
include 'config.php';
if(!isset($_SESSION['studentid'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assests/images/logo.jpeg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assests/css/navbar.css"/>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="#" id="menu-toggle" style="width:200px;"><span style="font-size:20px;cursor:pointer">&#9776; </span>MyUniversity</a>
            <ul class="navbar-nav ml-auto">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              			<span><?php 
							$matric=$_SESSION['matric'];
							$ic=$_SESSION['ic'];
							$getstudentname="SELECT * FROM student WHERE student_matric='$matric' AND student_ic='$ic'";
							$result=mysqli_query($connection,$getstudentname) or die ('Error in query:$query.'.mysql_error());
							if (mysqli_num_rows ($result)>0){
				                while($row = mysqli_fetch_row ($result)){
								    echo $row[1];
							?></span>
            		</a>
                


                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="user-header">
                            <img src="assests/images/unregister.png" style="width:100px; height:100px;" class="img-circle" alt="User Image">
                            <h6>
                                <?php echo $row[1];?>
                            </h6>
                            <p>
                                <?php echo $row[9];?>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="profile.php" class="btn btn-dark btn-sm">Profile</a>
                            </div>
                            <div class="push-right">
                                <a href="logout.php" class="btn btn-dark btn-sm">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <div id="wrapper">
        <aside id="sidebar" class="bg-secondary">
            <ul class="sidebar-nav">
                <li><a href="dashboard.php">Dashboard</a>
                </li>
                <li><a href="profile.php">Profile</a>
                </li>
                <li><a class="active">Course</a></li>
                    <ul class="navbar-nav">
                        <li class="nav-item" style="line-height:20px;">
                            <a class="nav-link" href="viewcourse.php" style="background:#3D3D3D; color:white; font-size:14px;"><span style="font-size:15px;">&#8594;</span> View Course</a>
                        </li>
                        <li class="nav-item" style="line-height:20px;">
                            <a class="nav-link" href="registercourse.php" style="background:#3D3D3D; color:white; font-size:14px;"><span style="font-size:15px;">&#8594;</span> Register Course</a>
                        </li>
                    </ul>
                </li>
                <li><a href="timetable.php">Timetable</a>
                </li>
            </ul>
        </aside>
        <section id="content">
            <div class="container-fluid">
                <div id="registercourse-content">
                    <div id="view-title">
                        <div class="card mt-3 border-secondary">
                            <div class="card-body">
                                <h4 class="card-title">Information</h4>
                                <p class="m-0"><p class="m-0" style="width:150px; display: inline-block;">Programme Name<span style="float: right; width:10px;">:</span></p><?php echo "$row[8]";?></p>
                                <p class="m-0"><p class="m-0" style="width:150px; display: inline-block;">Session Intake<span style="float: right; width:10px;">:</span></p><?php echo "$row[17]";?></p>
                                <p class="m-0"><p class="m-0" style="width:150px; display: inline-block;">Registration No<span style="float: right; width:10px;">:</span></p><?php echo "$row[9]";}}?></p>
                            </div>
                        </div>
                        <?php
                            $studentid=$_SESSION['studentid'];
                            $getmaxsem="SELECT MAX(student_semester) FROM student_course";
							$result1=mysqli_query($connection,$getmaxsem) or die ('Error in query:$query.'.mysql_error());
							if (mysqli_num_rows ($result1)>0){
				                while($row1 = mysqli_fetch_row ($result1)){
								    $max= $row1[0];
                                }
                            }
                            mysqli_free_result($result1);
                            for($i=1;$i<=$max;$i++){
                                $getsession="SELECT * FROM student_course WHERE student_semester=$i";
                                $result2=mysqli_query($connection,$getsession) or die ('Error in query:$query.'.mysql_error());
                                if (mysqli_num_rows ($result2)>0){
				                    while($row2 = mysqli_fetch_row ($result2)){
								        $session= $row2[6];
                                    }
                                }
                                mysqli_free_result($result2);
                                if(($i%2)==0){
                                    $semester=2;
                                }
                                else{
                                    $semester=1;
                                }
                                $getcoursedetail="SELECT course.course_code, course.course_name, course.course_creditHour, student_course.scourse_grade, student_course.scourse_gradePoint FROM course INNER JOIN student_course ON course.course_id=student_course.course_id WHERE student_course.student_id=$studentid AND student_course.student_semester=$i";
                                $result3=mysqli_query($connection,$getcoursedetail) or die ('Error in query:$query.'.mysql_error());
                                if (mysqli_num_rows ($result3)>0){
                                    $no=1;
                                    echo "<h4 class='text-center mt-4 mb-4'>Session Registered: Semester $semester, Session $session</h4>";
                                    echo '<table class="table table-bordered table-hover">';
                                    echo '<thead class="thead-dark"><tr><th scope="col"><b>NO</b></th><th scope="col"><b>COURSE CODE</b></th><th scope="col"><b>COURSE NAME</b></th><th scope="col"><b>CREDITS</b></th><th scope="col"><b>GRADE</b></th><th scope="col"><b>GRADE POINT</b></th></tr></thead>';
                                    echo '<tbody>';
				                    while($row3 = mysqli_fetch_row ($result3)){
                                        echo '<tr>';
		                                echo '<td>'.$no.'</td>';
		                                echo '<td>' . $row3[0] . '</td>';
		                                echo '<td>' . $row3[1] . '</td>';
                                        echo '<td>' . $row3[2] . '</td>';
                                        echo '<td>' . $row3[3] . '</td>';
                                        echo '<td>' . $row3[4] . '</td>';
		                                echo '</tr>';
                                        $no++; 
                                    }
                                    echo '</tbody></table>';
                                }
                            }
                            $studentsession=$_SESSION['studentsession'];
                            $studentsemester=$_SESSION['studentsemester'];
                            $getregistrationstatus="SELECT registration_status FROM registration WHERE registration_session='$studentsession' AND registration_semester='$studentsemester'";
							$result4=mysqli_query($connection,$getregistrationstatus) or die ('Error in query:$query.'.mysql_error());
                            $getCourseNum="SELECT COUNT(*) FROM student_course WHERE student_session='$studentsession' AND student_currentSemester='$studentsemester' AND student_id='$studentid'";
                            $result5=mysqli_query($connection,$getCourseNum) or die ('Error in query:$query.'.mysql_error());
							if (mysqli_num_rows ($result4)>0){
				                while($row4 = mysqli_fetch_row ($result4)){
								    $status=$row4[0];
                                }
                            }
                            if($status="Open"){
                                $_SESSION['courseregistration']=1;
                            }
                            if (mysqli_num_rows ($result5)>0){
				                while($row5 = mysqli_fetch_row ($result5)){
								    $courseNum=$row5[0];
                                }
                            }
                            mysqli_free_result($result4);
                            mysqli_free_result($result5);
                            if(isset($_SESSION['courseregistration']) && $courseNum<1){
                                echo "<h4 class='text-center mt-4 mb-3'>Semester $studentsemester, Session $studentsession</h4>";
                                echo "<p class='text-center'>Registration is now open.</p>"
				        ?>
                        <div class="button-group text-center mb-3">
                            <input id="submitregister" type="button" class="btn btn-secondary mr-3" value="Register Course">
                        </div>
                        <?php
                            }
                            elseif(isset($_SESSION['courseregistration']) && $courseNum>=1){
                                echo "<h4 class='text-center mt-4 mb-2'>Semester $studentsemester, Session $studentsession</h4>";
                                echo "<p class='text-center'>Registration is still open.</p>"
                        ?>
                        <div class="button-group text-center mb-3">
                            <input id="submitregister" type="button" class="btn btn-secondary mr-3" value="Register Course">
                            <input id="submitdrop" type="button" class="btn btn-secondary ml-3" value="Drop Course">
                        </div>
                        <?php
                            }
                            else{
                                echo "
                                <div class='alert alert-info text-center' role='alert'>
                                    Registration for Semester $studentsemester, Session $studentsession is not yet open.
                                </div>";
                            }
                        ?>
                    </div>
                </div>
                <br/><br/>
            </div>
            <footer class="text-white pl-3" style="position:fixed; bottom:0px; height:40px; background:#222222; width:100%;"><p class="m-0 pt-1">&copy; 2019 WIB2005 | by <a href="https://github.com/lytw1997">LOUIS YEW</a></p>
    </section>
    </div>
    <script src="assests/js/navigationbar.js"></script>
    <script src="assests/js/registercourse.js"></script>
    <script src="assests/js/dropcourse.js"></script>
    <?php 
        mysqli_free_result($result);
        mysqli_free_result($result3);
    ?>
</body>
</html>