<?php
  include '../../config.php';
  include '../../functions.php';

$dt=date("Y/m/d");
$time= date("h:i:sa");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $reply= base64_encode($_POST['reply']);
      $post_sl= $_POST['post_sl'];

      $get_valid1 = mysqli_query($conn,"SELECT * FROM post_question where post_question='$reply' and u_id='$id1' and lvl='2' and p_stat='0' ");
      if($row_valid1 = mysqli_fetch_array($get_valid1))
      {
          echo "2";
      }
      else
      {
        $table="post_question";
        $data='';
        $data.="'$id1'";
        $data.=",'null'";
        $data.=",'null'";
        $data.=",'null'";
        $data.=",'null'";
        $data.=",'$reply'";
        $data.=",'$post_sl'";
        $data.=",'2'";
        $data.=",'null'";
        $data.=",'$dt'";
        $data.=",'$time'";
        $data.=",'0'";
        $data.=",'0'";

        $insert = insert($table,$data);
        echo "1";

        $get_valid2 = mysqli_query($conn,"SELECT * FROM user_notification where notify_id='$post_sl' and notify_type='1' and to_u_id='$id1' and stat='0' ");
        while($row_valid2 = mysqli_fetch_array($get_valid2))
        {
          $by_u_id=$row_valid2['by_u_id'];

          $table1="user_notification";
          $data1='';
          $data1.="'2'";
          $data1.=",'$post_sl'";
          $data1.=",'$id1'";
          $data1.=",'$by_u_id'";
          $data1.=",'$dt'";
          $data1.=",'$time'";
          $data1.=",'0'";
          $data1.=",'0'";

          $insert1 = insert($table1,$data1);
        }
        $get_valid3 = mysqli_query($conn,"SELECT * FROM user_notification where notify_id='$post_sl' and notify_type='1' and to_u_id!='$id1' and stat='0' ");
        while($row_valid3 = mysqli_fetch_array($get_valid3))
        {
          $to_u_id=$row_valid3['to_u_id'];

          $table2="user_notification";
          $data2='';
          $data2.="'2'";
          $data2.=",'$post_sl'";
          $data2.=",'$id1'";
          $data2.=",'$to_u_id'";
          $data2.=",'$dt'";
          $data2.=",'$time'";
          $data2.=",'0'";
          $data2.=",'0'";

          $insert2 = insert($table2,$data2);
        }
      }
    }
  ?>
