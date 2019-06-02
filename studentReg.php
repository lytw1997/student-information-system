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
    <link rel="stylesheet" type="text/css" href="assests/css/student_reg.css" />
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
							if ($row = mysqli_fetch_row ($result)){
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
                                <input type="submit" class="havntRegister btn btn-dark btn-sm" value="Profile">
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
                <li><a href="dashboard" class="active">Dashboard</a>
                </li>
                <li><a class="havntRegister" href="">Profile</a>
                </li>
                <li><a class="havntRegister" href="">Course</a>
                </li>
                <li><a class="havntRegister" href="">Timetable</a>
                </li>
            </ul>
        </aside>
        <section id="content">
            <div class="container-fluid">
                <div id="reg-box">
                    <div class="title">
                        <h1>Registration Form</h1>
                    </div>
                    <form action="submitReg.php" method="post" class="ajax">
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Matric Number</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row[9];?>" name="matric" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">IC/Passport No.</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row[10];?>" name="IC" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Name</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row[1];?>" name="name" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Gender</span>
                                    </div>
                                    <div class="form-check-inline pl-2">
                                        <label class="form-check-label">
    								<input type="radio" class="radioInput form-check-input" name="gender" value="Male">Male
  						    </label>
                                    
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
    								<input type="radio" class="radioInput form-check-input" name="gender" value="Female">Female
  						        </label>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Date of Birth</span>
                                    </div>
                                    <input type="date" class="form-control" placeholder="Enter your birth date" name="dob" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Email</span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Phone</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter your phone number" name="phone" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Address</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter your address" name="address" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Faculty</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row[7];?>" name="fac" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Programme</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row[8];?>" name="degree" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Year of Study</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row[12];?>" name="year" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Session</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row[13];?>" name="session" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Semester</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row[14];}?>" name="semester" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            <h2>Create Your Account</h2>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Username</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Create your username" name="username" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Password</span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Create your password" name="password" id="password-field" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button"><span toggle="#password-field" class="passwordShow toggle-password">&#10058;</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align:center;" class="form-group">
                            <input id="submitProfile" type="button" class="btn btn-primary" style="width:50%;cursor:pointer" value="Register">
                        </div>
                    </form>
                </div>
            </div>
            <footer class="text-white pl-3" style="position:fixed; bottom:0px; height:40px; background:#222222; width:100%;"><p class="m-0 pt-1">&copy; 2019 WIB2005 | by <a href="https://github.com/lytw1997">LOUIS YEW</a></p>
        </section>
    </div>
    <script src="assests/js/register.js"></script>
    <script src="assests/js/navigationbar.js"></script>
    <?php 
        mysqli_free_result($result);
    ?>
</body>
</html>