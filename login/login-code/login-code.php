<?php
  include '../../config.php';
  include '../../functions.php';

  $Err1 = $success = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $u_id = $_POST['email'];
        $password = base64_encode($_POST['password']);

        // To protect MySQL injection...
        $u_id = stripslashes($u_id);
        $password = stripslashes($password);
        $u_id = mysqli_real_escape_string($conn,$u_id);
        $password = mysqli_real_escape_string($conn,$password);

        //Checking Validation...
        $get_valid2 = mysqli_query($conn,"SELECT * FROM login_tbl where BINARY mail_id='$u_id'");
        $get_valid3 = mysqli_query($conn,"SELECT * FROM login_tbl where BINARY mail_id='$u_id' and BINARY pass!='$password'");
        $get_valid4 = mysqli_query($conn,"SELECT * FROM login_tbl where BINARY mail_id='$u_id' and BINARY pass='$password' and stat='0'");

        if($row_valid2 = mysqli_fetch_array($get_valid2))
        {
          if($row_valid3 = mysqli_fetch_array($get_valid3))
          {
            echo "1";
          }
          elseif($row_valid4 = mysqli_fetch_array($get_valid4))
          {
            echo "2";
          }
          else
          {
            $get2 = mysqli_query($conn,"SELECT * FROM login_tbl where BINARY mail_id='$u_id' and BINARY pass='$password'");
            if($row2 = mysqli_fetch_array($get2))
            {
              // send the the cookie if needed
              $get3 = mysqli_query($conn,"SELECT * FROM login_tbl where BINARY mail_id='$u_id'and BINARY pass='$password' and stat='1'");
              if($row3 = mysqli_fetch_array($get3))
              {
                //$lvl_l=$row3['lvl'];
                $verify=$row3['very_stat'];
                if ($verify==1)
                {
                  session_start();
                  $_SESSION["pass"] = $password;
                  $_SESSION["id"] = $u_id;
                  //Advance Cookie code...for 1h
                  setcookie("rememberCookieUname", $u_id, time() + (86400 * 30), "/");
                  setcookie("rememberCookiePassword", $password, time() + (86400 * 30), "/");

                  $llg_in = date('d-m-Y h:i:s a', time());

                  $query = "UPDATE login_tbl SET llg_in='$llg_in' where mail_id='$u_id'";
                  $result = mysqli_query($conn,$query);

                  echo "3";
                }
                else
                {
                  echo "4";
                }
              }
              else
              {
                echo "5";
              }
            }
          }
        }
        else
        {
          echo "6";
        }
      }
?>
