<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $u_type= $_POST['u_type'];
      if($u_type =='3')
      {
        $user_nm= $_POST['user_nm'];
        $unique_id= $_POST['u_id'];
        $user_gender= $_POST['user_gender'];
        $user_dob= $_POST['user_dob'];
        $user_mob_no= $_POST['user_mob_no'];
        $user_course_id= $_POST['user_course_id'];
        $user_department_id= $_POST['user_department_id'];
        $stud_reg_no= $_POST['stud_reg_no'];
        $stud_batch= $_POST['stud_batch'];
        $stud_sem= $_POST['stud_sem'];
        $stud_roll= $_POST['stud_roll'];

        $get_valid = mysqli_query($conn,"SELECT * FROM login_tbl where u_id!='$unique_id' and mob='$user_mob_no' and stat='1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
          echo "2";
        }
        else 
        {
          $get_valid1 = mysqli_query($conn,"SELECT * FROM user_details where unique_id!='$unique_id' and roll_no='$stud_roll' and stat='1' ");
          if($row_valid1 = mysqli_fetch_array($get_valid1))
          {
            echo "3";
          }
          else
          {
            $get_valid2 = mysqli_query($conn,"SELECT * FROM user_details where unique_id!='$unique_id' and registration_no='$stud_reg_no' and stat='1' ");
            if($row_valid2 = mysqli_fetch_array($get_valid2))
            {
                echo "4";
            }
            else
            {
              $query_update=mysqli_query($conn,"UPDATE user_details SET gender='$user_gender' , dob='$user_dob' , course_id='$user_course_id' , roll_no='$stud_roll' , depart_id='$user_department_id' , sem_id='$stud_sem' , registration_no='$stud_reg_no' , batch='$stud_batch' where unique_id='$unique_id' ");

               $query_update1=mysqli_query($conn,"UPDATE login_tbl SET full_nm='$user_nm' , mob='$user_mob_no' where u_id='$unique_id' ");

                echo "1";
            }
          }
        }
      }
      else
      {
        $user_nm= $_POST['user_nm'];
        $u_id= $_POST['u_id'];
        $user_gender= $_POST['user_gender'];
        $user_dob= $_POST['user_dob'];
        $user_mob_no= $_POST['user_mob_no'];
        $user_course_id= $_POST['user_course_id'];
        $user_department_id= $_POST['user_department_id'];

        $get_valid = mysqli_query($conn,"SELECT * FROM login_tbl where u_id!='$u_id' and mob='$user_mob_no' and stat='1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else 
        {
          $query_update=mysqli_query($conn,"UPDATE user_details SET gender='$user_gender' , dob='$user_dob' , course_id='$user_course_id' , depart_id='$user_department_id' where unique_id='$u_id' ");

          $query_update1=mysqli_query($conn,"UPDATE login_tbl SET full_nm='$user_nm' , mob='$user_mob_no' where u_id='$u_id' ");
              echo "1";
        }
      }
    }
  ?>
