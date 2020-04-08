<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $mode_name= $_POST['mode_name'];
      $mode_email= $_POST['mode_email'];
      $mode_gender= $_POST['mode_gender'];
      $mode_mob= $_POST['mode_mob'];
      $sl= $_POST['sl'];

      $get_valid1 = mysqli_query($conn,"SELECT * FROM stud_details where email='$mode_email' and mob='$mode_mob' and sl!='$sl' and stat='1' ");
      if($row_valid1 = mysqli_fetch_array($get_valid1))
      {
          echo "2";
      }

        else
        {
            $query_update=mysqli_query($conn,"UPDATE stud_details SET f_nm='$mode_name' , gender='$mode_gender' , mob='$mode_mob' where sl='$sl' ");
            echo "1";
        }
    }
  ?>
