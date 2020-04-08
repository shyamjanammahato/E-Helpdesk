<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $course_name= $_POST['course_name'];
      $sl= $_POST['sl'];
      $course_code= $_POST['course_code'];

        $get_valid = mysqli_query($conn,"SELECT * FROM course_tbl where course_name='$course_name' and  sl!='$sl' and stat='1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else
        {
          $query_update = mysqli_query($conn,"UPDATE course_tbl SET course_name='$course_name' , course_code='$course_code' WHERE sl='$sl'");
          echo "1";
        }
    }
  ?>
