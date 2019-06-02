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
                                <?php echo $row[9];}}?>
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
                <div id="viewcourse-content">
                    <div id="view-title">
                        <h3 class="text-center mt-4 mb-2">Programme Structured</h3>
                        <?php 
							$getunicourse="SELECT * FROM course WHERE course_type='University Course'";
							$result1=mysqli_query($connection,$getunicourse) or die ('Error in query:$query.'.mysql_error());
							if (mysqli_num_rows ($result1)>0){
                                echo '<br/>';
                                echo '<table class="table table-bordered table-hover">';
                                echo '<thead class="thead-dark"><tr><th scope="col"><b>COURSE CODE</b></th><th scope="col"><b>UNIVERSITY COURSES</b></th><th scope="col"><b>CREDITS</b></th><th scope="col"><b>SEMESTER</b></th></tr></thead>';
                                echo '<tbody>';
				                while($row1 = mysqli_fetch_row ($result1)){
                                    echo '<tr>';
		                            echo '<td>' . $row1[1] . '</td>';
		                            echo '<td>' . $row1[2] . '</td>';
		                            echo '<td>' . $row1[4] . '</td>';
                                    echo '<td>' . $row1[3] . '</td>';
		                            echo '</tr>';
                                }
                                echo '</tbody></table>';
                            }
                            $getcorecourse="SELECT * FROM course WHERE course_type='Faculty Core Course'";
							$result2=mysqli_query($connection,$getcorecourse) or die ('Error in query:$query.'.mysql_error());
							if (mysqli_num_rows ($result2)>0){
                                echo '<br/>';
                                echo '<table class="table table-bordered table-hover">';
                                echo '<thead class="thead-dark"><tr><th scope="col"><b>COURSE CODE</b></th><th scope="col"><b>FACULTY CORE COURSES</b></th><th scope="col"><b>CREDITS</b></th><th scope="col"><b>SEMESTER</b></th></tr></thead>';
                                echo '<tbody>';
				                while($row2 = mysqli_fetch_row ($result2)){
                                    echo '<tr>';
		                            echo '<td>' . $row2[1] . '</td>';
		                            echo '<td>' . $row2[2] . '</td>';
		                            echo '<td>' . $row2[4] . '</td>';
                                    echo '<td>' . $row2[3] . '</td>';
		                            echo '</tr>';
                                }
                                echo '</tbody></table>';
                            }
                            $getpcorecourse="SELECT * FROM course WHERE course_type='Programme Core Course'";
							$result3=mysqli_query($connection,$getpcorecourse) or die ('Error in query:$query.'.mysql_error());
							if (mysqli_num_rows ($result3)>0){
                                echo '<br/>';
                                echo '<table class="table table-bordered table-hover">';
                                echo '<thead class="thead-dark"><tr><th scope="col"><b>COURSE CODE</b></th><th scope="col"><b>PROGRAMME CORE COURSES</b></th><th scope="col"><b>CREDITS</b></th><th scope="col"><b>SEMESTER</b></th></tr></thead>';
                                echo '<tbody>';
				                while($row3 = mysqli_fetch_row ($result3)){
                                    echo '<tr>';
		                            echo '<td>' . $row3[1] . '</td>';
		                            echo '<td>' . $row3[2] . '</td>';
		                            echo '<td>' . $row3[4] . '</td>';
                                    echo '<td>' . $row3[3] . '</td>';
		                            echo '</tr>';
                                }
                                echo '</tbody></table>';
                            }
                            $getspecourse="SELECT * FROM course WHERE course_type='Specialization Elective Course'";
							$result4=mysqli_query($connection,$getspecourse) or die ('Error in query:$query.'.mysql_error());
							if (mysqli_num_rows ($result4)>0){
                                echo '<br/>';
                                echo '<table class="table table-bordered table-hover">';
                                echo '<thead class="thead-dark"><tr><th scope="col"><b>COURSE CODE</b></th><th scope="col"><b>SPECIALIZATION ELECTIVE COURSES</b></th><th scope="col"><b>CREDITS</b></th><th scope="col"><b>SEMESTER</b></th></tr></thead>';
                                echo '<tbody>';
				                while($row4 = mysqli_fetch_row ($result4)){
                                    echo '<tr>';
		                            echo '<td>' . $row4[1] . '</td>';
		                            echo '<td>' . $row4[2] . '</td>';
		                            echo '<td>' . $row4[4] . '</td>';
                                    echo '<td>' . $row4[3] . '</td>';
		                            echo '</tr>';
                                }
                                echo '</tbody></table>';
                                echo '<br/>';
                            }
				        ?>
                    </div>
                </div>
                <br/>
            </div>
            <footer class="text-white pl-3" style="position:fixed; bottom:0px; height:40px; background:#222222; width:100%;"><p class="m-0 pt-1">&copy; 2019 WIB2005 | by <a href="https://github.com/lytw1997">LOUIS YEW</a></p>
    </section>
    </div>
    <script src="assests/js/navigationbar.js"></script>
    <?php 
        mysqli_free_result($result);
        mysqli_free_result($result1);
        mysqli_free_result($result2);
        mysqli_free_result($result3);
        mysqli_free_result($result4);
    ?>
</body>
</html>