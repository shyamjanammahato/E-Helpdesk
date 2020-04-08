<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $acad_yr= $_POST['acad_yr'];
      $course_id= $_POST['course_id'];

        $get_valid = mysqli_query($conn,"SELECT * FROM academic_yr where course_id='$course_id' and acad_yr='$acad_yr' and stat='1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else
        {
            $table="academic_yr";
            $data='';
            $data.="'$course_id'";
            $data.=",'$acad_yr'";
            $data.=",'$cdate'";
            $data.=",'$id1'";
            $data.=",'1'";

            $insert = insert($table,$data);
            echo "1";
        }
    }
  ?>
