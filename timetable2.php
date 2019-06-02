<div>
<?php
    include 'config.php';
    extract($_POST);
    $checkCourseCode="SELECT course_code FROM course WHERE course_code='$course'";
    $result=mysqli_query($connection,$checkCourseCode) or die ('Error in query:$query.'.mysql_error());
    if (mysqli_num_rows ($result)>0){
        while ($row=mysqli_fetch_row ($result)){
            $getResult="SELECT course.course_code, course.course_name, course.course_creditHour, course.course_type, course.course_capacity, course_timetable.ctimetable_day, course_timetable.ctimetable_startTime, course_timetable.ctimetable_endTime, course_timetable.ctimetable_lecLocation, course_timetable.ctimetable_examDate, course_timetable.ctimetable_examTime FROM course INNER JOIN course_timetable ON course.course_id = course_timetable.course_id WHERE course.course_code='$course'";
            $result1=mysqli_query($connection,$getResult) or die ('Error in query:$query.'.mysql_error());
            if (mysqli_num_rows ($result1)>0){
                echo '<table class="table table-bordered">';
                echo '<thead class="thead-dark"><tr><th scope="col"><b>Course Code</b></th><th scope="col"><b>Description</b></th><th scope="col"><b>Credit Hour</b></th></tr></thead>';
                echo '<tbody>';
                while($row1 = mysqli_fetch_row ($result1)){
                    echo '<tr>';
		            echo '<td>' . $row1[0] . '</td>';
		            echo "<td>
                            <h4 class='text-center'>$row1[1]</h4>
                            <p class='text-center'>Course Type: $row1[3]<p>
                            <table class='table table-bordered'>
                            <thead class='thead-secondary'><tr><th colspan='4'><b>Timetable</b></th></tr></thead>
                            <tbody>
                            <tr><td>Day</td><td>Time</td><td>Location</td><td>Capacity</td></tr>
                            <tr><td>$row1[5]</td><td>"; 
                            echo date('H:i A', strtotime("$row1[6]")); 
                            echo " - "; 
                            echo date("H:i A", strtotime("$row1[7]"));
                            echo "</td><td>$row1[8]</td><td>$row1[4]</td></tr>
                            </tbody></table>";
                    echo "<table class='table table-bordered'>
                          <thead class='thead-secondary'><tr><th><b>Examination Schedule</b></th></tr></thead>
                          <tbody><tr><td><p>Date: $row1[9]</p><p>Time: "; 
                    echo date('H:i A', strtotime("$row1[10]"));
                    echo "</p></td></tr></tbody></table>";        
                    echo "</td>";
                    echo '<td>' . $row1[2] . '</td>';
		            echo '</tr>';
                    
                }
                echo '</tbody></table>';
            }
        }
    }
    else{
        echo "<h4 class='text-center mt-3'>No Result Found</h4>";
    }
?>
</div>