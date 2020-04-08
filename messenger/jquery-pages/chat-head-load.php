<?php
include '../../config.php';

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
  $user_id_r = base64_decode($_REQUEST['userid']);

  $get_chat_user_ch=mysqli_query($conn,"SELECT * FROM ts_login_tbl WHERE u_id='$user_id_r'");
  if ($row_chat_user_ch=mysqli_fetch_array($get_chat_user_ch))
  {
    $user_name_s = $row_chat_user_ch['full_nm'];
  }

  $msg_time_last = $msg_date_last ="";
  $get_chat_last = mysqli_query($conn,"SELECT * FROM tech_messenger WHERE sender='$id1' AND receiver='$user_id_r' ORDER BY sl DESC");
  if($row_chat_last = mysqli_fetch_array($get_chat_last))
  {
    $msg_date_last=$row_chat_last['dt'];
    $msg_time_last=$row_chat_last['time_c'];
  }
  ?>
  <small class="pull-right text-muted">Last message:  <?php if($msg_date_last!=''): echo date("d, M'y", strtotime($msg_date_last));endif;?> - <?php if($msg_time_last!=''): echo date("H:i", strtotime($msg_time_last));endif;?></small>
  <i class="fa fa-comment"></i>&nbsp;TechScooper Messenger [To: <?php echo $user_name_s;?>]
  <?php
}
