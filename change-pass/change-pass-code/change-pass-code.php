<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $curr_pass= $_POST['curr_pass'];
      $new_pass= $_POST['new_pass'];
      $conf_new_pass= $_POST['conf_new_pass'];
      $email= $_POST['email'];

      $get_valid = mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$email' ");
      if($row_valid = mysqli_fetch_array($get_valid))
      {
        $pass=$row_valid['pass'];
      }
      if($pass!=$curr_pass)
      {
        echo "2";
      }
      else if(strlen($new_pass)<8)
      {
        echo "5";
      }
      else if(strlen($new_pass)>12)
      {
        echo "6";
      }  
      else if($new_pass!=$conf_new_pass)
      {
        echo "3";
      } 
      else if($new_pass==$curr_pass)
      {
        echo "4";
      } 
      else
      {
        $get_valid = mysqli_query($conn,"UPDATE login_tbl SET pass='$new_pass' where mail_id='$email' ");
        echo "1";
      }
    }
  ?>
