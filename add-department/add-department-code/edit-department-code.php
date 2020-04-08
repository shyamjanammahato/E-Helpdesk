<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $depart_name= $_POST['depart_name'];
      $sl= $_POST['sl'];
      $depart_code= $_POST['depart_code'];
      $course_id= $_POST['course_id'];

        $get_valid = mysqli_query($conn,"SELECT * FROM depart_tbl where course_id='$course_id' and  sl!='$sl' and depart_nm='$depart_name' and stat='1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else
        {
          $query_update = mysqli_query($conn,"UPDATE depart_tbl SET course_id='$course_id' , depart_nm='$depart_name' ,  depart_code='$depart_code' WHERE sl='$sl' ");
          echo "1";
        }
    }
  ?>
