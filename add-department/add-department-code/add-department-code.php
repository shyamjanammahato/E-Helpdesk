<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $depart_name= $_POST['depart_name'];
      $depart_code= $_POST['depart_code'];
      $course_id= $_POST['course_id'];

      $get_valid1 = mysqli_query($conn,"SELECT * FROM depart_tbl where course_id='$course_id' and depart_nm='$depart_name' and stat='1' ");
      if($row_valid1 = mysqli_fetch_array($get_valid1))
      {
          echo "2";
      }

        else
        {
            $table="depart_tbl";
            $data='';
            $data.="'$course_id'";
            $data.=",'$depart_name'";
            $data.=",'$depart_code'";
            $data.=",'$cdate'";
            $data.=",'$id1'";
            $data.=",'1'";

            $insert = insert($table,$data);
            echo "1";
        }
    }
  ?>
