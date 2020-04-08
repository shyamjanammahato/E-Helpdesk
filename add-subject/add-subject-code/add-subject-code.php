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

        $get_valid = mysqli_query($conn,"SELECT * FROM subject_tbl where course_id='$course_id' and depart_id='$department_id' and sem_id='$sem_id' and subject_nm='$subject_nm' and stat='1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else
        {
            $table="subject_tbl";
            $data='';
            $data.="'$course_id'";
            $data.=",'$department_id'";
            $data.=",'$sem_id'";
            $data.=",'$batch_id'";
            $data.=",'$subject_nm'";
            $data.=",'$subject_code'";
            $data.=",'$cdate'";
            $data.=",'$id1'";
            $data.=",'1'";

            $insert = insert($table,$data);
            echo "1";
          }
        }
  ?>
