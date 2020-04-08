<?php
  include '../../config.php';
  include '../../functions.php';

$dt=date("Y/m/d");
$time= date("h:i:sa");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $depart=$_POST['select_depart'];
      $sub=$_POST['select_sub'];
      $course_id=$_POST['course_id'];
      $question=base64_encode($_POST['question']);

      if(isset($_POST['other_sub']))
      {
        $other_sub=$_POST['other_sub'];
      }
      else
      {
        $other_sub='null';
      }
      if($depart=='')
      {
        echo "1";
      }
      else if($sub=='')
      {
        echo "2";
      }
      else if($question=='')
      {
        echo "4";
      }
      else if(basename($_FILES["file"]["size"] > 600000))
      {
        echo "6";
      }
      else
      {
        $get_valid = mysqli_query($conn,"SELECT * FROM post_question where p_depart_id='$depart' and p_sub='$sub' and post_question='$question' and p_stat='1' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
          echo "5";
        }
        else
        {
          $r_char1 = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz') , 0 , 5 );
          $nm1=$r_char1."_spic";
          if (basename( $_FILES["file"]["name"])!='')
          {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png")
            || ($_FILES["file"]["type"] == "image/GIF")
            || ($_FILES["file"]["type"] == "image/JPEG")
            || ($_FILES["file"]["type"] == "image/JPG")
            || ($_FILES["file"]["type"] == "image/PJPEG")
            || ($_FILES["file"]["type"] == "image/X-PNG")
            || ($_FILES["file"]["type"] == "image/PNG"))
            && ($_FILES["file"]["size"] < 600000)
            && in_array($extension, $allowedExts))
              {
                if ($_FILES["file"]["error"] > 0)
                {
                  echo "7";
                }
                else
                {
                  if (file_exists("../../files/ask-question/".$nm1.".jpg"))
                  {
                    echo "8";
                  }
                  else
                  {
                    $pic2="../../files/ask-question/".$nm1.".jpg";
                    $pic_nm1= $nm1;
                    move_uploaded_file($_FILES["file"]["tmp_name"],$pic2);

                    if($sub==0)
                    {
                      $table="post_question";
                      $data='';
                      $data.="'$id1'";
                      $data.=",'$course_id'";
                      $data.=",'$depart'";
                      $data.=",'0'";
                      $data.=",'$other_sub'";
                      $data.=",'$question'";
                      $data.=",'0'";
                      $data.=",'1'";
                      $data.=",'$pic_nm1'";
                      $data.=",'$dt'";
                      $data.=",'$time'";
                      $data.=",'0'";
                      $data.=",'0'";

                      $insert = insert($table,$data);
                      echo "9";

                      $get_query=mysqli_query($conn,"SELECT * FROM post_question where u_id='$id1' order by sl desc ");
                      if($row_query=mysqli_fetch_array($get_query))
                      {
                        $notify_id=$row_query['sl'];
                      }
                      $get_teacher_all=mysqli_query($conn,"SELECT * FROM user_details where course_id='$course_id' and depart_id='$depart' and user_type='2' and stat='1' ");
                      while($row_teacher_all=mysqli_fetch_array($get_teacher_all))
                      {
                        $unique_id=$row_teacher_all['unique_id'];
                        $get_teacher_id=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$unique_id' ");
                        if($row_teacher_id=mysqli_fetch_array($get_teacher_id))
                        {
                        $teacher_id=$row_teacher_id['mail_id'];
                        }
                        $table1="user_notification";
                        $data1='';
                        $data1.="'1'";
                        $data1.=",'$notify_id'";
                        $data1.=",'$id1'";
                        $data1.=",'$teacher_id'";
                        $data1.=",'$dt'";
                        $data1.=",'$time'";
                        $data1.=",'0'";
                        $data1.=",'0'";

                        $insert1 = insert($table1,$data1);
                      }
                      //get moderator...and send notification
                      $get_admin=mysqli_query($conn,"SELECT * FROM user_details where user_type='1' and stat='1' ");
                      while($row_admin=mysqli_fetch_array($get_admin))
                      {
                        $unique_id=$row_admin['unique_id'];
                        $get_id=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$unique_id' ");
                        if($row_id=mysqli_fetch_array($get_id))
                        {
                        $u_id=$row_id['mail_id'];
                        
                        $table2="user_notification";
                        $data2='';
                        $data2.="'1'";
                        $data2.=",'$notify_id'";
                        $data2.=",'$id1'";
                        $data2.=",'$u_id'";
                        $data2.=",'$dt'";
                        $data2.=",'$time'";
                        $data2.=",'0'";
                        $data2.=",'0'";
        
                        $insert2 = insert($table2,$data2);
                        }
                      }
                        $table3="user_notification";
                        $data3='';
                        $data3.="'1'";
                        $data3.=",'$notify_id'";
                        $data3.=",'$id1'";
                        $data3.=",'techscooper'";
                        $data3.=",'$dt'";
                        $data3.=",'$time'";
                        $data3.=",'0'";
                        $data3.=",'0'";
                        $insert3 = insert($table3,$data3);
                    }
                    else
                    {
                      $table="post_question";
                      $data='';
                      $data.="'$id1'";
                      $data.=",'$course_id'";
                      $data.=",'$depart'";
                      $data.=",'$sub'";
                      $data.=",'null'";
                      $data.=",'$question'";
                      $data.=",'0'";
                      $data.=",'1'";
                      $data.=",'$pic_nm1'";
                      $data.=",'$dt'";
                      $data.=",'$time'";
                      $data.=",'0'";
                      $data.=",'0'";

                      $insert = insert($table,$data);
                      echo "9";

                      $get_query=mysqli_query($conn,"SELECT * FROM post_question where u_id='$id1' order by sl desc ");
                      if($row_query=mysqli_fetch_array($get_query))
                      {
                        $notify_id=$row_query['sl'];
                      }
                      $get_teacher=mysqli_query($conn,"SELECT * FROM assign_subject where course_id='$course_id' and depart_id='$depart' and subjects='$sub' and stat='1' ");
                      while($row_teacher=mysqli_fetch_array($get_teacher))
                      {
                        $teacher_id=$row_teacher['teacher_id'];
                        $get_teacher_id=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$teacher_id' ");
                        if($row_teacher_id=mysqli_fetch_array($get_teacher_id))
                        {
                        $teacher_id=$row_teacher_id['mail_id'];
                        }
                        $table1="user_notification";
                        $data1='';
                        $data1.="'1'";
                        $data1.=",'$notify_id'";
                        $data1.=",'$id1'";
                        $data1.=",'$teacher_id'";
                        $data1.=",'$dt'";
                        $data1.=",'$time'";
                        $data1.=",'0'";
                        $data1.=",'0'";

                        $insert1 = insert($table1,$data1);
                      }
                      //get moderator...and send notification
                      $get_admin=mysqli_query($conn,"SELECT * FROM user_details where user_type='1' and stat='1' ");
                      while($row_admin=mysqli_fetch_array($get_admin))
                      {
                        $unique_id=$row_admin['unique_id'];
                        $get_id=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$unique_id' ");
                        if($row_id=mysqli_fetch_array($get_id))
                        {
                        $u_id=$row_id['mail_id'];
                        $table2="user_notification";
                        $data2='';
                        $data2.="'1'";
                        $data2.=",'$notify_id'";
                        $data2.=",'$id1'";
                        $data2.=",'$u_id'";
                        $data2.=",'$dt'";
                        $data2.=",'$time'";
                        $data2.=",'0'";
                        $data2.=",'0'";
                        $insert2 = insert($table2,$data2);
                        }
                      }
                        $table3="user_notification";
                        $data3='';
                        $data3.="'1'";
                        $data3.=",'$notify_id'";
                        $data3.=",'$id1'";
                        $data3.=",'techscooper'";
                        $data3.=",'$dt'";
                        $data3.=",'$time'";
                        $data3.=",'0'";
                        $data3.=",'0'";
                        $insert3 = insert($table3,$data3);
                    }
                  }
                }
              }
              else
              {
                echo "10";
              }
            }
            else
            {
             if($sub==0)
                    {
                      $table="post_question";
                      $data='';
                      $data.="'$id1'";
                      $data.=",'$course_id'";
                      $data.=",'$depart'";
                      $data.=",'0'";
                      $data.=",'$other_sub'";
                      $data.=",'$question'";
                      $data.=",'0'";
                      $data.=",'1'";
                      $data.=",'null'";
                      $data.=",'$dt'";
                      $data.=",'$time'";
                      $data.=",'0'";
                      $data.=",'0'";

                      $insert = insert($table,$data);
                      echo "9";

                      $get_query=mysqli_query($conn,"SELECT * FROM post_question where u_id='$id1' order by sl desc ");
                      if($row_query=mysqli_fetch_array($get_query))
                      {
                        $notify_id=$row_query['sl'];
                      }
                      $get_teacher_all=mysqli_query($conn,"SELECT * FROM user_details where course_id='$course_id' and depart_id='$depart' and user_type='2' and stat='1' ");
                      while($row_teacher_all=mysqli_fetch_array($get_teacher_all))
                      {
                        $unique_id=$row_teacher_all['unique_id'];
                        $get_teacher_id=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$unique_id' ");
                        if($row_teacher_id=mysqli_fetch_array($get_teacher_id))
                        {
                        $teacher_id=$row_teacher_id['mail_id'];
                        }
                        $table1="user_notification";
                        $data1='';
                        $data1.="'1'";
                        $data1.=",'$notify_id'";
                        $data1.=",'$id1'";
                        $data1.=",'$teacher_id'";
                        $data1.=",'$dt'";
                        $data1.=",'$time'";
                        $data1.=",'0'";
                        $data1.=",'0'";

                        $insert1 = insert($table1,$data1);
                      }
                      //get moderator...and send notification
                      $get_admin=mysqli_query($conn,"SELECT * FROM user_details where user_type='1' and stat='1' ");
                      while($row_admin=mysqli_fetch_array($get_admin))
                      {
                        $unique_id=$row_admin['unique_id'];
                        $get_id=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$unique_id' ");
                        if($row_id=mysqli_fetch_array($get_id))
                        {
                        $u_id=$row_id['mail_id'];
                        $table2="user_notification";
                        $data2='';
                        $data2.="'1'";
                        $data2.=",'$notify_id'";
                        $data2.=",'$id1'";
                        $data2.=",'$u_id'";
                        $data2.=",'$dt'";
                        $data2.=",'$time'";
                        $data2.=",'0'";
                        $data2.=",'0'";
          
                        $insert2 = insert($table2,$data2);
                        }
                      }
                        $table3="user_notification";
                        $data3='';
                        $data3.="'1'";
                        $data3.=",'$notify_id'";
                        $data3.=",'$id1'";
                        $data3.=",'techscooper'";
                        $data3.=",'$dt'";
                        $data3.=",'$time'";
                        $data3.=",'0'";
                        $data3.=",'0'";
                        $insert3 = insert($table3,$data3);
                    }
                    else
                    {
                      $table="post_question";
                      $data='';
                      $data.="'$id1'";
                      $data.=",'$course_id'";
                      $data.=",'$depart'";
                      $data.=",'$sub'";
                      $data.=",'null'";
                      $data.=",'$question'";
                      $data.=",'0'";
                      $data.=",'1'";
                      $data.=",'null'";
                      $data.=",'$dt'";
                      $data.=",'$time'";
                      $data.=",'0'";
                      $data.=",'0'";

                      $insert = insert($table,$data);
                      echo "9";

                      $get_query=mysqli_query($conn,"SELECT * FROM post_question where u_id='$id1' order by sl desc ");
                      if($row_query=mysqli_fetch_array($get_query))
                      {
                        $notify_id=$row_query['sl'];
                      }
                      $get_teacher=mysqli_query($conn,"SELECT * FROM assign_subject where course_id='$course_id' and depart_id='$depart' and subjects='$sub' and stat='1' ");
                      while($row_teacher=mysqli_fetch_array($get_teacher))
                      {
                        $teacher_u_id=$row_teacher['teacher_id'];
                        $get_teacher_id=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$teacher_u_id' ");
                        if($row_teacher_id=mysqli_fetch_array($get_teacher_id))
                        {
                        $teacher_id=$row_teacher_id['mail_id'];
                        }
                        $table1="user_notification";
                        $data1='';
                        $data1.="'1'";
                        $data1.=",'$notify_id'";
                        $data1.=",'$id1'";
                        $data1.=",'$teacher_id'";
                        $data1.=",'$dt'";
                        $data1.=",'$time'";
                        $data1.=",'0'";
                        $data1.=",'0'";

                        $insert1 = insert($table1,$data1);
                      }
                      //get moderator...and send notification
                      $get_admin=mysqli_query($conn,"SELECT * FROM user_details where user_type='1' and stat='1' ");
                      while($row_admin=mysqli_fetch_array($get_admin))
                      {
                        $unique_id=$row_admin['unique_id'];
                        $get_id=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$unique_id' ");
                        if($row_id=mysqli_fetch_array($get_id))
                        {
                        $m_id=$row_id['mail_id'];

                        $table2="user_notification";
                        $data2='';
                        $data2.="'1'";
                        $data2.=",'$notify_id'";
                        $data2.=",'$id1'";
                        $data2.=",'$m_id'";
                        $data2.=",'$dt'";
                        $data2.=",'$time'";
                        $data2.=",'0'";
                        $data2.=",'0'";

                        $insert2 = insert($table2,$data2);
                        }
                      }
                        $table3="user_notification";
                        $data3='';
                        $data3.="'1'";
                        $data3.=",'$notify_id'";
                        $data3.=",'$id1'";
                        $data3.=",'techscooper'";
                        $data3.=",'$dt'";
                        $data3.=",'$time'";
                        $data3.=",'0'";
                        $data3.=",'0'";
                        $insert3 = insert($table3,$data3);
                    }
              }
      }
    }
  }
?>
