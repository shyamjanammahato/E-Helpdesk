<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $course_id= $_POST['course_id'];
      $department_id= $_POST['department_id'];
      $batch_id= $_POST['batch_id'];
      $subject_nm= $_POST['subject_nm'];
      $subject_code= $_POST['subject_code'];
      $sem_id= $_POST['sem_id'];
      $sl1= $_POST['sl1'];

        $get_valid = mysqli_query($conn,"SELECT * FROM subject_tbl where course_id='$course_id' and depart_id='$department_id' and sem_id='$sem_id' and subject_nm='$subject_nm' and stat='1' and sl!='$sl1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else
        {
            $query_update=mysqli_query($conn,"UPDATE subject_tbl SET course_id='$course_id' , depart_id='$department_id' , sem_id='$sem_id' , batch_id='$batch_id' , subject_nm='$subject_nm' , subject_code='$subject_code' WHERE sl='$sl1' ");
            echo "1";
          }
        }
  ?>
