<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $course_id= $_POST['course_id'];
      $department_id= $_POST['department_id'];
      $mobile= $_POST['mobile'];
      $subjects= $_POST['subjects'];
      $teacher_id= $_POST['teacher_id'];
      $sem_id= $_POST['sem_id'];

        $get_valid = mysqli_query($conn,"SELECT * FROM assign_subject where sem_id='$sem_id' and  teacher_id='$teacher_id' and subjects='$subjects' and stat='1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else
        {
            $table="assign_subject";
            $data='';
            $data.="'$course_id'";
            $data.=",'$department_id'";
            $data.=",'$teacher_id'";
            $data.=",'$sem_id'";
            $data.=",'$subjects'";
            $data.=",'1'";
            $data.=",'$cdate'";
            $data.=",'$id1'";
          
            $insert = insert($table,$data);
            echo "1";
          }
        }
  ?>
