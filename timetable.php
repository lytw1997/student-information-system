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
                <nav class="navbar m-0 p-0" style="display:block; cursor:pointer">
                <li><a data-toggle="collapse" data-target="#collapsibleNavbar">
                    Course
                </a></li>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item" style="line-height:20px;">
                            <a class="nav-link" href="viewcourse.php" style="background:#3D3D3D; color:white; font-size:14px;"><span style="font-size:15px;">&#8594;</span> View Course</a>
                        </li>
                        <li class="nav-item" style="line-height:20px;">
                            <a class="nav-link" href="registercourse.php" style="background:#3D3D3D; color:white; font-size:14px;"><span style="font-size:15px;">&#8594;</span> Register Course</a>
                        </li>
                    </ul>
                </div>
                </nav>
                <li><a class="active" href="timetable.php">Timetable</a>
                </li>
            </ul>
        </aside>
        <section id="content">
            <div class="container-fluid">
                <div id="timetable-content">
                    <div class="timetable-title mt-4">
                        <h4 class="text-center">Course Timetable</h4>
                        <form action="timetable2.php" method="post" class="ajax">
                            <p class="text-center mt-4">Enter a course code: <input id="key" type="text" name="course"></p>
                            <div class="button-group text-center mb-3">
                                <input id="findCourse" type="button" class="btn btn-secondary" value="Find Course">
                            </div>
                        </form>
                    </div>
                    <div id="timetable"></div>
                </div>
            </div>
            <footer class="text-white pl-3" style="position:fixed; bottom:0px; height:40px; background:#222222; width:100%;"><p class="m-0 pt-1">&copy; 2019 WIB2005 | by <a href="https://github.com/lytw1997">LOUIS YEW</a></p>
    </section>
    </div>
    <script src="assests/js/navigationbar.js"></script>
    <script src="assests/js/timetable.js"></script>
</body>
</html>