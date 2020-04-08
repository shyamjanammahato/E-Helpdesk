<?php
  include '../../config.php';
  include '../../functions.php';

$dt=date("Y/m/d");
$time= date("h:i:sa");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $comment= base64_encode($_POST['comment']);
      $reply_id= $_POST['reply_sl'];
      $post_sl= $_POST['post_sl'];

      if($comment!='')
      {
        $table="post_question";
        $data='';
        $data.="'$id1'";
        $data.=",'null'";
        $data.=",'null'";
        $data.=",'null'";
        $data.=",'null'";
        $data.=",'$comment'";
        $data.=",'$reply_id'";
        $data.=",'3'";
        $data.=",'null'";
        $data.=",'$dt'";
        $data.=",'$time'";
        $data.=",'0'";
        $data.=",'0'";

        $insert = insert($table,$data);
        ?>
            <script language="javascript">
               alert("Comment Posted Successfully.."); 
               window.history.go(-1);
            </script>
        <?php
        $get_valid2 = mysqli_query($conn,"SELECT * FROM user_notification where notify_id='$post_sl' and notify_type='1' and to_u_id='$id1' and stat='0' ");
        while($row_valid2 = mysqli_fetch_array($get_valid2))
        {
          $by_u_id=$row_valid2['by_u_id'];

          $table1="user_notification";
          $data1='';
          $data1.="'3'";
          $data1.=",'$post_sl'";
          $data1.=",'$id1'";
          $data1.=",'$by_u_id'";
          $data1.=",'$dt'";
          $data1.=",'$time'";
          $data1.=",'0'";
          $data1.=",'0'";

          $insert1 = insert($table1,$data1);
        }
        $get_valid3 = mysqli_query($conn,"SELECT distinct by_u_id FROM user_notification where notify_id='$post_sl' and notify_type='2' and by_u_id!='$id1' and stat='0' ");
        while($row_valid3 = mysqli_fetch_array($get_valid3))
        {
          $by_u_id=$row_valid3['by_u_id'];

          $table2="user_notification";
          $data2='';
          $data2.="'3'";
          $data2.=",'$post_sl'";
          $data2.=",'$id1'";
          $data2.=",'$by_u_id'";
          $data2.=",'$dt'";
          $data2.=",'$time'";
          $data2.=",'0'";
          $data2.=",'0'";

          $insert2 = insert($table2,$data2);
        }
      }
        else
        {
        ?>
            <script language="javascript">
               alert("Enter Comment"); 
               window.history.go(-1);
            </script>
        <?php
        }
    }
  ?>
