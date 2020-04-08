  <?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");
  $llg_in = date('d-m-Y h:i:s a', time());

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $emp_nm= $_POST['emp_nm'];
      $emp_gender= $_POST['emp_gender'];
      $emp_dob= $_POST['emp_dob'];
      $emp_mob_no= $_POST['emp_mob_no'];
      $emp_course_id= $_POST['emp_course_id'];
      $emp_email= $_POST['emp_email'];
      $emp_department_id= $_POST['emp_department_id'];
      //password generator
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++)
          {
          $n = rand(0, $alphaLength);
          $pass[] = $alphabet[$n];
          }
        $pass1=implode($pass);
        $pass_encoded=base64_encode($pass1);
      //password generator

      //id generator
        $unique_id=substr(str_shuffle("012345678901234567890123456789012345678901234567890123456789"), 0, 6);
      //id generator


        $get_valid = mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$emp_email' and stat='1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else 
        {
          $get_valid1 = mysqli_query($conn,"SELECT * FROM login_tbl where mob='$emp_mob_no' and stat='1' ");
          if($row_valid1 = mysqli_fetch_array($get_valid1))
          {
              echo "3";
          }
          else
          {
            $table="login_tbl";
            $data='';
            $data.="'$emp_email'";
            $data.=",'$emp_nm'";
            $data.=",'$unique_id'";
            $data.=",'$pass_encoded'";
            $data.=",'$emp_mob_no'";
            $data.=",'$cdate'";
            $data.=",'null'";
            $data.=",'null'";
            $data.=",'null'";
            $data.=",'1'";
            $data.=",'-10'";
            $data.=",'1'";
            $data.=",'null'";
            $insert = insert($table,$data);

            $table1="user_details";
            $data1='';
            $data1.="'Teacher'";
            $data1.=",'2'";
            $data1.=",'$unique_id'";
            $data1.=",'$emp_gender'";
            $data1.=",'$emp_dob'";
            $data1.=",'$emp_course_id'";
            $data1.=",'null'";
            $data1.=",'$emp_department_id'";
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
  ?>
