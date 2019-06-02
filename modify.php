<?php
include 'config.php';
$matric = $_SESSION[ 'matric' ];
$ic = $_SESSION[ 'ic' ];
$getstudentname = "SELECT * FROM student WHERE student_matric='$matric' AND student_ic='$ic'";
$result = mysqli_query( $connection, $getstudentname )or die( 'Error in query:$query.' . mysql_error() );
if ( mysqli_num_rows( $result ) > 0 ) {
    while ( $row = mysqli_fetch_row( $result ) ) {
        ?>
        <div id="title">
            <h1 class="text-center mt-4 mb-2">Manage Profile</h1>
            <p class="text-center">For additional content changing, please contact admin to modify your data.</p>
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
        <form action="insert.php" method="post" class="ajax">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Email</span>
            </div>
            <input type="email" class="form-control" placeholder="Enter your new email" name="email" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Phone</span>
                </div>
                <input type="text" class="form-control" placeholder="Enter your new phone" name="phone" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address</span>
                </div>
                <input type="text" class="form-control" placeholder="Enter your new address" name="address" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Faculty</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row[7];?>" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Programme</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row[8];?>" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Year of Study</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row[12];?>" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Session</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row[13];?>" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Semester</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row[14];}}?>" readonly>
            </div>
            <div class="button-group text-center pb-3">
                <input id="submitmodify" type="button" class="btn btn-secondary mr-3" value="Update">
            </div>
        </form>
        <?php
        mysqli_free_result( $result );
        ?>
        <script src="assests/js/modify.js"></script>