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

      //password generator
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++)
          {
          $n = rand(0, $alphaLength);
          $pass[] = $alphabet[$n];
          }
        $passs=implode($pass);
        $pass_encoded=base64_encode($passs);
      //password generator

      //id generator
        $unique_id=substr(str_shuffle("012345678901234567890123456789012345678901234567890123456789"), 0, 6);
      //id generator

      $get_valid1 = mysqli_query($conn,"SELECT * FROM login_tbl where mob='$mode_mob' and stat='1' ");
      if($row_valid1 = mysqli_fetch_array($get_valid1))
      {
          echo "2";
      }
      else
      {
      $get_valid2 = mysqli_query($conn,"SELECT * FROM login_tbl where full_nm='$mode_name' and stat='1' ");
        if($row_valid2 = mysqli_fetch_array($get_valid2))
        {
            echo "3";
        }
        else
        {
          $get_valid3 = mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$mode_email' and stat='1' ");
          if($row_valid3 = mysqli_fetch_array($get_valid3))
          {
              echo "4";
          }
          else
          {
              $table="login_tbl";
              $data='';
              $data.="'$mode_email'";
              $data.=",'$mode_name'";
              $data.=",'$unique_id'";
              $data.=",'$pass_encoded'";
              $data.=",'$mode_mob'";
              $data.=",'$cdate'";
              $data.=",'null'";
              $data.=",'null'";
              $data.=",'null'";
              $data.=",'1'";
              $data.=",'-5'";
              $data.=",'1'";
              $data.=",'null'";
              $insert = insert($table,$data);

              $table1="user_details";
              $data1='';
              $data1.="'Moderator'";
              $data1.=",'1'";
              $data1.=",'$unique_id'";
              $data1.=",'$mode_gender'";
              $data1.=",'null'";
              $data1.=",'null'";
              $data1.=",'null'";
              $data1.=",'null'";
              $data1.=",'-50'";//for teacher sem is -0...
              $data1.=",'null'";
              $data1.=",'null'";
              $data1.=",'null'";
              $data1.=",'null'";
              $data1.=",'$cdate'";
              $data1.=",'$id1'";
              $data1.=",'1'";
              $insert1 = insert($table1,$data1);
              echo "1";
          }
        }
      }
    }
  ?>
