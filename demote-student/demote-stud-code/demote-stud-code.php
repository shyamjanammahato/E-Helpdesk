<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $course_id= $_POST['course_id'];
      $department_id= $_POST['department_id'];
      $batch= $_POST['batch'];

      $s=0;
      $get_valid = mysqli_query($conn,"SELECT * FROM semester_tbl where course_id='$course_id' and  stat='1' ");
      while($row_valid = mysqli_fetch_array($get_valid))
      {   
        $s++;
        $no_of_sem=$row_valid['sem'];
      }

      $get_valid1 = mysqli_query($conn,"SELECT * FROM stud_details WHERE course_id='$course_id' and depart_id='$department_id' and sem_id ='$s' and stat='1' ");
      while($row_valid1 = mysqli_fetch_array($get_valid1))
      {
          $sl=$row_valid1['sl'];
          $update_query=mysqli_query($conn,"UPDATE stud_details SET sem_id='0' WHERE sl='$sl' and stat='1' ");
      }
      
        $get_valid2 = mysqli_query($conn,"SELECT * FROM stud_details where course_id='$course_id' and depart_id='$department_id' and sem_id !='$s' and sem_id!='0' and stat='1' ");
        while($row_valid2 = mysqli_fetch_array($get_valid2))
        {
          $promote_sem=$row_valid2['sem_id'] + 1;
          $sl=$row_valid2['sl'];

          $update_query1=mysqli_query($conn,"UPDATE stud_details SET sem_id='$promote_sem' where sl='$sl' and stat='1' ");
        }
        echo "1";
      }
  ?>
