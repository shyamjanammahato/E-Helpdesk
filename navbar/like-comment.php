<?php 
include "../config.php";
include "../functions.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}

    $comment_like_sl=base64_decode(base64_decode(base64_decode($_REQUEST['comment_sl'])));
    $post_sl=base64_decode(base64_decode($_REQUEST['post_sl']));

    echo $comment_like_sl;
    echo $post_sl;

      $table="post_question";
      $data='';
      $data.="'$id1'";
      $data.=",'null'";
      $data.=",'null'";
      $data.=",'null'";
      $data.=",'null'";
      $data.=",'null'";
      $data.=",'$comment_like_sl'";
      $data.=",'4'";
      $data.=",'null'";
      $data.=",'$dt'";
      $data.=",'$time'";
      $data.=",'0'";
      $data.=",'0'";

      $insert = insert($table,$data);
      echo "1";

        $get_valid2 = mysqli_query($conn,"SELECT distinct by_u_id FROM user_notification where notify_id='$post_sl' and notify_type!='1' and by_u_id!='$id1' and stat='0' ");
        while($row_valid2 = mysqli_fetch_array($get_valid2))
        {
          $by_u_id=$row_valid2['by_u_id'];

          $table1="user_notification";
          $data1='';
          $data1.="'4'";
          $data1.=",'$post_sl'";
          $data1.=",'$id1'";
          $data1.=",'$by_u_id'";
          $data1.=",'$dt'";
          $data1.=",'$time'";
          $data1.=",'0'";
          $data1.=",'1'";

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
          $data2.=",'1'";

          $insert2 = insert($table2,$data2);
        }
      
      ?>
      <i class="fa fa-thumbs-up fa-fw" style="color:#FF5733"></a>
 ?>