<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $course_id= $_POST['course_id'];
      $sem= $_POST['sem'];

      $get_valid1 = mysqli_query($conn,"SELECT * FROM semester_tbl where course_id='$course_id' and sem='$sem' and stat='1' ");
      if($row_valid1 = mysqli_fetch_array($get_valid1))
      {
          echo "2";
      }

        else
        {
            $table="semester_tbl";
            $data='';
            $data.="'$course_id'";
            $data.=",'$sem'";
            $data.=",'$cdate'";
            $data.=",'$id1'";
            $data.=",'1'";

            $insert = insert($table,$data);
            echo "1";
        }
    }
  ?>
