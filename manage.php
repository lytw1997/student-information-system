<?php
include 'config.php';
$matric = $_SESSION[ 'matric' ];
$ic = $_SESSION[ 'ic' ];
$userid = $_SESSION[ 'userid' ];
$getstudentname = "SELECT * FROM user WHERE id='$userid'";
$result = mysqli_query( $connection, $getstudentname )or die( 'Error in query:$query.' . mysql_error() );
if ( mysqli_num_rows( $result ) > 0 ) {
    while ( $row = mysqli_fetch_row( $result ) ) {
        ?>
        <div id="title">
            <h1 class="text-center mt-5">Manage Account</h1>
            <p class="text-center mt-2 mb-2">Create new username and password</p>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Old Username</span>
            </div>
            <input type="text" class="form-control" value="<?php echo $row[1];?>" readonly>
        </div>
        <form action="manage2.php" method="post" class="ajax">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">New Username</span>
                </div>
                <input type="text" class="form-control" placeholder="Enter your new username" name="username" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Old Password</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $row[2];}}?>" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">New Password</span>
                </div>
                <input type="password" class="form-control" placeholder="Enter your new password" name="password" id="password-field" required>
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button"><span toggle="#password-field" class="passwordShow toggle-password">&#10058;</span></button>
                </div>
            </div>
            <div class="button-group text-center">
                <input id="submitmodify" type="button" class="btn btn-secondary mr-3" value="Reset">
            </div>
        </form>
        <?php
        mysqli_free_result( $result );
        ?>
        <script src="assests/js/manage.js"></script>