<?php
include 'config.php';
$matric = $_SESSION[ 'matric' ];
$ic = $_SESSION[ 'ic' ];
$student_id = $_SESSION[ 'studentid' ];
$studentsession=$_SESSION['studentsession'];
$studentsemester=$_SESSION['studentsemester'];
?>
<h4 class="text-center mt-4 mb-4">Drop Course</h4>
<h6 class="text-center mt-4 mb-4">You can only drop one course at one time</h6>
<form action="dropcourse2.php" method="post" class="ajax">
<?php
    $getCourseReg="SELECT course_id FROM student_course WHERE student_session='$studentsession' AND student_currentSemester='$studentsemester' AND student_id='$student_id'";
    $result = mysqli_query( $connection, $getCourseReg )or die( 'Error in query:$query.' . mysql_error() );
    if ( mysqli_num_rows( $result ) > 0 ) {
        echo '<table class="table table-bordered table-hover">';
        echo '<thead class="thead-dark"><tr><th scope="col"><b>NO</b></th><th scope="col"><b>COURSE CODE</b></th><th scope="col"><b>COURSE NAME</b></th><th scope="col"><b>CREDIT HOURS</b></th><th scope="col"><b>DAY</b></th><th scope="col"><b>TIME</b></th></tr></thead>';
        echo '<tbody>';
        while ( $row = mysqli_fetch_row( $result ) ) {
            $getCourseDetail = "SELECT course.course_id, course.course_code, course.course_name, course.course_creditHour, course_timetable.ctimetable_day, course_timetable.ctimetable_startTime, course_timetable.ctimetable_endTime, course_timetable.ctimetable_lecLocation, course_timetable.ctimetable_examDate, course_timetable.ctimetable_examStart FROM course INNER JOIN course_timetable ON course.course_id = course_timetable.course_id WHERE course.course_id='$row[0]'";
            $result1 = mysqli_query( $connection, $getCourseDetail )or die( 'Error in query:$query.' . mysql_error() );
            if ( mysqli_num_rows( $result1 ) > 0 ) {
                while ( $row1 = mysqli_fetch_row( $result1 ) ) {
                    echo "<tr>";
                    echo "<td><input class='radioInput' type='radio' name='course' value='$row1[0]'></td>";
                    echo "<td>$row1[1]</td>";
                    echo "<td>$row1[2]</td>";
                    echo "<td>$row1[3]</td>";
                    echo "<td>$row1[4]</td>";
                    echo "<td>";
                    echo date('H:i A', strtotime("$row1[5]")); 
                    echo " - "; 
                    echo date("H:i A", strtotime("$row1[6]"));
                    echo "</td></tr>";
                }
            }
            mysqli_free_result( $result1 );
        }
        echo '</tbody></table>';
    }            
?>
    <div class="button-group text-center mb-3">
        <input id="submitdrop2" type="button" class="btn btn-secondary" value="Drop">
    </div>
    </form>
    <script src="assests/js/dropcourse2.js"></script>
<?php
mysqli_free_result( $result );
?>