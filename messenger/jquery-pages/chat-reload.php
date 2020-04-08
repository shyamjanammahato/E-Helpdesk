<?php
include '../../config.php';
include '../../functions.php';

if ($ck != 1)
{
  ?>
  <script type="text/javascript">
    alert("Your session expired");
    document.location.href ="../../logout.php";
  </script>
  <?php
}
else
{
  if (isset($_REQUEST['userid']) && $_REQUEST['userid']!='')
  {
    $r_userid=base64_decode($_REQUEST['userid']);
  }
  else
  {
    $r_userid = "";
  }

  if(isset($_POST["message"]) &&  strlen($_POST["message"]) > 0)
	{
		$s_userid = $id1;
		$r_userid = base64_decode($_POST["rusername"]);

    $message = filter_var(trim($_POST["message"])); //,FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH

    // To protect MySQL injection...
    $message = stripslashes($message);
    $message = mysqli_real_escape_string($conn,$message);

		$user_ip = $_SERVER['REMOTE_ADDR'];
    date_default_timezone_set('Asia/Kolkata');
		$msg_time = date('h:i:s a', time());
		$msg_date = date('Y-m-d', time());

		if($r_userid!='')
		{
      /*Encode Messege*/
      $en_messege = base64_encode($message);
			//insert new message in db
      $table="tech_messenger";

      $data='';
      $data.="'$s_userid'";
      $data.=",'$r_userid'";
      $data.=",'$en_messege'";
      $data.=",'$msg_date'";
      $data.=",'$msg_time'";
      $data.=",'$user_ip'";

      $insert1 = insert($table,$data);
		}
  }
  else
  {
    $old_dt=0;
		$get_chat = mysqli_query($conn,"SELECT * FROM tech_messenger WHERE (sender='$id1' and receiver='$r_userid') or (receiver='$id1' and sender='$r_userid') ORDER BY sl ASC");
		while($row_chat = mysqli_fetch_array($get_chat))
		{
			$messege=base64_decode($row_chat['msg']);
      $sender_id=$row_chat['sender'];
			$receiver_id=$row_chat['receiver'];
			$msg_date=$row_chat['dt'];
			$msg_time=$row_chat['time_c'];

      $to_time = strtotime(date("Y-m-d H:i"));
      $from_time = strtotime($msg_date." ".$msg_time);
      $time_diff = round(abs($to_time - $from_time) / 60,2);
      $time_diff = (integer)$time_diff;
      if ($time_diff==0)
      {
        $time_diff = "Just Now";
      }
      elseif ($time_diff==1)
      {
        $time_diff = $time_diff." minute ago";
      }
      elseif ($time_diff > 1 && $time_diff <= 60)
      {
        $time_diff = $time_diff." minutes ago";
      }
      else
      {
        $time_diff = date("H:i", strtotime($msg_time));
      }

      if($old_dt=='0' || $old_dt!=$msg_date)
			{
        ?>
          <div class="com-md-12" style="text-align:center;">
            <?php echo date("d, M'y", strtotime($msg_date));?>
          </div>
        <?php
      }
      $old_dt = $msg_date; //Assign New date.
      /*Display Messege Chat*/
      if ($sender_id == $id1)
      {
        $get_chat_user_s=mysqli_query($conn,"SELECT * FROM ts_login_tbl WHERE u_id='$sender_id'");
        if ($row_chat_user_s=mysqli_fetch_array($get_chat_user_s))
        {
          $user_name_s = $row_chat_user_s['full_nm'];
          $user_picture_s = $row_chat_user_s['dp_pic'];
        }
        ?>
        <div class="chat-message right">
          <img class="message-avatar" src="../images/employee-pics/<?php echo $user_picture_s;?>.jpg" alt="<?php echo $user_name_s;?>" >
          <div class="message">
            <a class="message-author" href="#"><?php echo $user_name_s;?></a>
            <span class="message-date"> <?php echo date("d, M'y",strtotime($msg_date));?> - <?php echo $time_diff;?>  </span>
            <span class="message-content">
              <?php echo $messege;?>
            </span>
          </div>
        </div>
        <?php
      }
      else
      {
        $get_chat_user_r=mysqli_query($conn,"SELECT * FROM ts_login_tbl WHERE u_id='$r_userid'");
        if ($row_chat_user_r=mysqli_fetch_array($get_chat_user_r))
        {
          $user_name_r = $row_chat_user_r['full_nm'];
          $user_picture_r = $row_chat_user_r['dp_pic'];
        }
        ?>
        <div class="chat-message left">
          <img class="message-avatar" src="../images/employee-pics/<?php echo $user_picture_r;?>.jpg" alt="<?php echo $user_name_s;?>" >
          <div class="message">
            <a class="message-author" href="#"><?php echo $user_name_r;?></a>
            <span class="message-date"> <?php echo date("d, M'y",strtotime($msg_date));?> - <?php echo $time_diff;?> </span>
            <span class="message-content">
              <?php echo $messege;?>
            </span>
          </div>
        </div>
        <?php
      }
    }
  }
}
?>
