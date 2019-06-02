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
    <link rel="stylesheet" type="text/css" href="assests/css/dashboard.css"/>
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
        <div id="sidebar" class="bg-secondary">
            <ul class="sidebar-nav">
                <li><a href="#" class="active">Dashboard</a></li>
                <li><a href="profile.php">Profile</a></li>
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
                <li><a href="timetable.php">Timetable</a></li>
            </ul>
        </div>
        <div id="content">
            <div class="container-fluid">
                <div id="dashboard-content">
                    <div class="text-center p-3 mt-3 mb-4">
                        <img src="assests/images/logo.jpeg" alt="Logo">
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Profile</h5>
                                    <p class="card-text">View profile, update profile and manage account.</p>
                                    <a href="profile.php" class="btn btn-dark float-right">Go!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Course</h5>
                                    <p class="card-text">View courses, register courses.</p>
                                    <a href="viewcourse.php" class="btn btn-dark float-right">Go!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-6">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Timetable</h5>
                                    <p class="card-text">Search course, view timetable and exam schedule.</p>
                                    <a href="timetable.php" class="btn btn-dark float-right">Go!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Result</h5>
                                    <p class="card-text">View exam results.</p>
                                    <a href="registercourse.php" class="btn btn-dark float-right">Go!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="text-white pl-3" style="position:fixed; bottom:0px; height:40px; background:#222222; width:100%;"><p class="m-0 pt-1">&copy; 2019 WIB2005 | by <a href="https://github.com/lytw1997">LOUIS YEW</a></p>
        </div>
    </div>
    <script src="assests/js/navigationbar.js"></script>
    <?php 
        mysqli_free_result($result);
    ?>
</body>
</html>