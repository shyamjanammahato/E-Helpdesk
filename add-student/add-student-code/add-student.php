<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $stud_nm= $_POST['stud_nm'];
      $stud_gender= $_POST['stud_gender'];
      $stud_dob= $_POST['stud_dob'];
      $stud_mob_no= $_POST['stud_mob_no'];
      $stud_course_id= $_POST['stud_course_id'];
      $stud_roll= $_POST['stud_roll'];
      $stud_email= $_POST['stud_email'];
      $stud_department_id= $_POST['stud_department_id'];
      $stud_reg_no= $_POST['stud_reg_no'];
      $stud_adm_dt= $_POST['stud_adm_dt'];
      $stud_batch= $_POST['stud_batch'];
      
      $stud_sem= $_POST['stud_sem'];
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
      //password generator
        $pass_encoded=base64_encode($passs);
      //id generator
        $unique_id=substr(str_shuffle("012345678901234567890123456789012345678901234567890123456789"), 0, 6);
      //id generator


        $get_valid = mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$stud_email' and stat='1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else {
          $get_valid1 = mysqli_query($conn,"SELECT * FROM user_details where roll_no='$stud_roll' and stat='1' ");
          if($row_valid1 = mysqli_fetch_array($get_valid1))
          {
              echo "3";
          }
          else{
          $get_valid2 = mysqli_query($conn,"SELECT * FROM user_details where registration_no='$stud_reg_no' and stat='1' ");
          if($row_valid2 = mysqli_fetch_array($get_valid2))
          {
              echo "4";
          }
        else
        {
            $table="login_tbl";
            $data='';
            $data.="'$stud_email'";
            $data.=",'$stud_nm'";
            $data.=",'$unique_id'";
            $data.=",'$pass_encoded'";
            $data.=",'$stud_mob_no'";
            $data.=",'$cdate'";
            $data.=",'null'";
            $data.=",'null'";
            $data.=",'null'";
            $data.=",'1'";
            $data.=",'-15'";
            $data.=",'1'";
            $data.=",'null'";
            $insert = insert($table,$data);

            $table1="user_details";
            $data1='';
            $data1.="'Student'";
            $data1.=",'3'";
            $data1.=",'$unique_id'";
            $data1.=",'$stud_gender'";
            $data1.=",'$stud_dob'";
            $data1.=",'$stud_course_id'";
            $data1.=",'$stud_roll'";
            $data1.=",'$stud_department_id'";
            $data1.=",'$stud_sem'";//for teacher sem is -0...
            $data1.=",'null'";
            $data1.=",'$stud_reg_no'";
            $data1.=",'$stud_adm_dt'";
            $data1.=",'$stud_batch'";
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
