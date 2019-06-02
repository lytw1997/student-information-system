<?php
include 'config.php';
$matric = $_SESSION[ 'matric' ];
$ic = $_SESSION[ 'ic' ];
$student_id = $_SESSION[ 'studentid' ];
$getstudentinfo = "SELECT * FROM student WHERE student_matric='$matric' AND student_ic='$ic'";
$result = mysqli_query( $connection, $getstudentinfo )or die( 'Error in query:$query.' . mysql_error() );
if ( mysqli_num_rows( $result ) > 0 ) {
    while ( $row = mysqli_fetch_row( $result ) ) {
        ?>
            <h4 class="text-center mt-4 mb-4">Student Information</h4>
            <div class="card border-secondary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="m-0"><p class="m-0" style="width:120px; display: inline-block;">Name<span style="float: right; width:10px;">:</span></p><?php echo "$row[1]";?></p>
                            <p class="m-0"><p class="m-0" style="width:120px; display: inline-block;">Matric No<span style="float: right; width:10px;">:</span></p><?php echo "$row[9]";?></p>
                            <p class="m-0"><p class="m-0" style="width:120px; display: inline-block;">IC/Passport No<span style="float: right; width:10px;">:</span></p><?php echo "$row[10]";?></p>
                            <p class="m-0"><p class="m-0" style="width:120px; display: inline-block;">Programme<span style="float: right; width:10px;">:</span></p><?php echo "$row[8]";?></p>
                        </div>
                        <div class="col-6">
                            <p class="m-0"><p class="m-0" style="width:120px; display: inline-block;">Session<span style="float: right; width:10px;">:</span></p><?php echo "$row[13]";?></p>
                            <p class="m-0"><p class="m-0" style="width:120px; display: inline-block;">Semester<span style="float: right; width:10px;">:</span></p><?php echo "$row[14]";?></p>
                            <p class="m-0"><p class="m-0" style="width:120px; display: inline-block;">Current CGPA<span style="float: right; width:10px;">:</span></p><?php echo "$row[18]";?></p>
                            <p class="m-0"><p class="m-0" style="width:120px; display: inline-block;">Credit Hours<span style="float: right; width:10px;">:</span></p><?php echo "$row[15]";?></p>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="text-center mt-4 mb-4">You can only register one course at one time</h6>
            <p class="text-center">Remaining Credit Hours: <?php echo "$row[15]";}}?></p>
            <form action="registercourse3.php" method="post" class="ajax">
            <?php
                $havntRegCou = "SELECT course_id FROM course WHERE course_id NOT IN (SELECT course_id FROM student_course WHERE student_id = '$student_id')";
                $result1 = mysqli_query( $connection, $havntRegCou )or die( 'Error in query:$query.' . mysql_error() );
                if ( mysqli_num_rows( $result1 ) > 0 ) {
                    echo '<table class="table table-bordered table-hover">';
                    echo '<thead class="thead-dark"><tr><th scope="col"><b>NO</b></th><th scope="col"><b>COURSE CODE</b></th><th scope="col"><b>COURSE NAME</b></th><th scope="col"><b>CREDIT HOURS</b></th><th scope="col"><b>DAY</b></th><th scope="col"><b>TIME</b></th></tr></thead>';
                    echo '<tbody>';
                    while ( $row1 = mysqli_fetch_row( $result1 ) ) {
                        $getCourseDetail = "SELECT course.course_id, course.course_code, course.course_name, course.course_creditHour, course_timetable.ctimetable_day, course_timetable.ctimetable_startTime, course_timetable.ctimetable_endTime, course_timetable.ctimetable_lecLocation, course_timetable.ctimetable_examDate, course_timetable.ctimetable_examStart FROM course INNER JOIN course_timetable ON course.course_id = course_timetable.course_id WHERE course.course_id='$row1[0]' AND course.course_capacity>='1'";
                        $result2 = mysqli_query( $connection, $getCourseDetail )or die( 'Error in query:$query.' . mysql_error() );
                        if ( mysqli_num_rows( $result2 ) > 0 ) {
                            while ( $row2 = mysqli_fetch_row( $result2 ) ) {
                                echo "<tr>";
                                echo "<td><input class='radioInput' type='radio' name='course' value='$row2[0]'></td>";
                                echo "<td>$row2[1]</td>";
                                echo "<td>$row2[2]</td>";
                                echo "<td>$row2[3]</td>";
                                echo "<td>$row2[4]</td>";
                                echo "<td>";
                                echo date('H:i A', strtotime("$row2[5]")); 
                                echo " - "; 
                                echo date("H:i A", strtotime("$row2[6]"));
                                echo "</td></tr>";
                        
                            }
                        }
                        mysqli_free_result( $result2 );  
                    }
                    echo '</tbody></table>';
                }
            ?>
            <div class="button-group text-center mb-3">
                <input id="submitregister2" type="button" class="btn btn-secondary" value="Register">
            </div>
            </form>
            <script src="assests/js/registercourse2.js"></script>
<?php
mysqli_free_result( $result );
mysqli_free_result( $result1 );
?>