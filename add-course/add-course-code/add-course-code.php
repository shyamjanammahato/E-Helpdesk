<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $course_name= $_POST['course_name'];
      $course_code= $_POST['course_code'];

        $get_valid = mysqli_query($conn,"SELECT * FROM course_tbl where course_name='$course_name' and stat='1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else
        {
            $table="course_tbl";
            $data='';
            $data.="'$course_name'";
            $data.=",'$course_code'";
            $data.=",'1'";
            $data.=",'$cdate'";
            $data.=",'$id1'";

            $insert = insert($table,$data);
            echo "1";
        }
    }
  ?>
