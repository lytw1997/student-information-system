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
    <link rel="stylesheet" type="text/css" href="assests/css/profile.css"/>
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
                                <a href="#" class="btn btn-dark btn-sm">Profile</a>
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
                <li><a href="profile.php" class="active">Profile</a>
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
                </li>
                <li><a href="timetable.php">Timetable</a>
                </li>
            </ul>
        </aside>
        <section id="content">
            <div class="container-fluid">
                <div id="profile-content">
                    <div id="title">
                        <h1 class="text-center mt-4 mb-2">Profile</h1>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Matric Number</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row[9];?>" name="matric" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">IC/Passport No.</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row[10];?>" name="IC" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Name</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row[1];?>" name="name" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Gender</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row[4];?>" name="gender" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Date of Birth</span>
                        </div>
                        <input type="date" class="form-control" value="<?php echo $row[5];?>" name="dob" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email</span>
                        </div>
                        <input type="email" class="form-control" value="<?php echo $row[2];?>" name="email" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Phone</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row[3];?>" name="phone" readonly>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Address</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row[6];?>" name="address" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Faculty</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row[7];?>" name="fac" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Programme</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row[8];?>" name="degree" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Year of Study</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row[12];?>" name="year" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Session</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row[13];?>" name="session" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Semester</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row[14];}}?>" name="semester" readonly>
                    </div>
                    <div class="button-group text-center pb-3">
                        <input id="modify" type="button" class="btn btn-secondary mr-2" value="Update Profile">
                        <input id="manage" type="button" class="btn btn-secondary ml-2" value="Manage Account">
                    </div>
                </div>
            </div>
             <footer class="text-white pl-3" style="position:fixed; bottom:0px; height:40px; background:#222222; width:100%;"><p class="m-0 pt-1">&copy; 2019 WIB2005 | by <a href="https://github.com/lytw1997">LOUIS YEW</a></p>
    </div>
    </div>
    </section>
    </div>
    <script src="assests/js/navigationbar.js"></script>
    <script src="assests/js/profile.js"></script>
    <?php 
        mysqli_free_result($result);
    ?>
</body>
</html>