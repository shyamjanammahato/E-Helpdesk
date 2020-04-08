<?php 
include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="content" content="GIMT HelpDesk">
    <meta name="keyword" content="Final Year Project @ 2017 Batch | GIMT HelpDesk">
    <meta name="description" content="Global Institute of Management & Technology | Final Year Project @ 2017 Batch">
    <meta name="author" content="Shyam Janam Mahato | Jayanta Pal">

    <title>Chatbox - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
</head>

<body>

    <div id="wrapper">
        <!--Top Navbar Include-->
        <?php include '../navbar/top-nav.php';?>
        <!--Top Navbar Include-->

        <!--Sidebar Include-->
        <?php include '../navbar/sidebar.php';?>
        <!--Sidebar Include-->

        <!-- Main Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
            <form class="" role="form" id="chat_frm" name="chat_frm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chat</h1>
                        <div class="chat-panel panel panel-default">
                          <div class="panel-heading">
                              <i class="fa fa-comments fa-fw"></i> Chat
                              <div class="btn-group pull-right">
                                  <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                      <i class="fa fa-chevron-down"></i>
                                  </button>
                                  <ul class="dropdown-menu slidedown">
                                      <li>
                                          <a href="#">
                                              <i class="fa fa-refresh fa-fw"></i> Refresh
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <i class="fa fa-check-circle fa-fw"></i> Available
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <i class="fa fa-times fa-fw"></i> Busy
                                          </a>
                                      </li>
                                      <li>
                                          <a href="#">
                                              <i class="fa fa-clock-o fa-fw"></i> Away
                                          </a>
                                      </li>
                                      <li class="divider"></li>
                                      <li>
                                          <a href="#">
                                              <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                          </a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <!-- /.panel-heading -->
                          <div class="panel-body">
                              <ul class="chat">
                                <?php
                                $chat_with=$_REQUEST['sl'];
                                $get_chat_user=mysqli_query($conn,"SELECT * FROM login_tbl WHERE sl='$chat_with' ");
                                if ($row_chat_user=mysqli_fetch_array($get_chat_user))
                                {
                                  $mail_id = $row_chat_user['mail_id'];
                                  $user_name = $row_chat_user['full_nm'];
                                  $user_pic = $row_chat_user['dp_pic'];
                                }
                                $row_chat_user_msg=mysqli_query($conn,"SELECT * FROM tech_messenger WHERE receiver='$id1' and sender='$mail_id' ");
                                while ($get_chat_user_msg=mysqli_fetch_array($row_chat_user_msg))
                                {
                                  $msg = $get_chat_user_msg['msg'];
                                  $messg=base64_decode($msg);
                                  $dt = $get_chat_user_msg['dt'];
                                  $time_c = $get_chat_user_msg['time_c'];
                                  $sender = $get_chat_user_msg['sender'];
                                  $receiver = $get_chat_user_msg['receiver'];
                                ?>
                                  <li class="left clearfix">
                                      <span class="chat-img pull-left">
                                          <img src="../images/user_image/1.jpg" alt="" class="img-circle" style="width:50px;height: 40px;">
                                      </span>
                                      <div class="chat-body clearfix">
                                          <div class="header">
                                              <strong class="primary-font"><?php echo $user_name;?></strong>
                                              <small class="pull-right text-muted">
                                                  <i class="fa fa-clock-o fa-fw"></i> 12 minutes ago
                                              </small>
                                          </div>
                                          <?php echo $messg;?>
                                      </div>
                                  </li>
                                  <?php }
                                  $get_chat_user=mysqli_query($conn,"SELECT * FROM login_tbl WHERE sl='$chat_with' ");
                                  if ($row_chat_user=mysqli_fetch_array($get_chat_user))
                                  {
                                    $mail_id = $row_chat_user['mail_id'];
                                    $user_name = $row_chat_user['full_nm'];
                                    $user_pic = $row_chat_user['dp_pic'];
                                  }
                                  $row_chat_user_msg=mysqli_query($conn,"SELECT * FROM tech_messenger WHERE receiver='$mail_id' and sender='$id1' ");
                                  while ($get_chat_user_msg=mysqli_fetch_array($row_chat_user_msg))
                                  {
                                    $msg = $get_chat_user_msg['msg'];
                                    $messg=base64_decode($msg);
                                    $dt = $get_chat_user_msg['dt'];
                                    $time_c = $get_chat_user_msg['time_c'];
                                    $sender = $get_chat_user_msg['sender'];
                                    $receiver = $get_chat_user_msg['receiver'];
                                  ?>
                                  <li class="right clearfix">
                                      <div class="chat-body clearfix">
                                          <div class="header">
                                              <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                          </div>
                                          <?php echo $messg;?>
                                      </div>
                                  </li>
                                  <?php } ?>
                              </ul>
                          </div>
                          <!-- /.panel-body -->
                          <div class="panel-footer">
                              <div class="input-group">
                              <input type="hidden" name="receiver" id="receiver" value="<?php echo $mail_id;?>">
                                  <input id="msg" name="msg" type="text" class="form-control input-sm" placeholder="Type your message here...">
                                  <span class="input-group-btn">
                                      <button class="btn btn-warning btn-sm" id="send_msg" name="send_msg">
                                          Send
                                      </button>
                                  </span>
                              </div>
                          </div>
                          <!-- /.panel-footer -->
                      </div>
                      <div id="error_id"></div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Main Page Content -->
    </div>
    <!-- /#wrapper -->

    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <script src="send-msg-js/send-msg.js"></script>
    <!--JavascriptsLink-->
</body>

</html>
