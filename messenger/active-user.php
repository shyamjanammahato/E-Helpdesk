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

    <title>Active Users- GIMT HelpDesk</title>

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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chat</h1>
                        <div class="chat-panel panel panel-default">
                          <div class="panel-heading">
                              <i class="fa fa-comments fa-fw"></i> Contacts
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
                                $get_chat_user=mysqli_query($conn,"SELECT * FROM login_tbl WHERE stat=1 AND mail_id!='$id1' ORDER BY full_nm ASC");
                                while ($row_chat_user=mysqli_fetch_array($get_chat_user))
                                {
                                  $user_id = $row_chat_user['u_id'];
                                  $sl = $row_chat_user['sl'];
                                  $user_name = $row_chat_user['full_nm'];
                                  $user_pic = $row_chat_user['dp_pic'];
                                  $llg_out = $row_chat_user['llg_out'];
                                  $llg_in = $row_chat_user['llg_in'];
                                  $time_now= date("h:i:sa");
                                  $dt_now=date("Y/m/d");
                                  $d = strtotime($llg_in);
                                  $dat = date('m/d/y', $d);
                                  $tme = date('H:m:s A',$d);
                              ?>
                                    <li class="left clearfix">
                                      <span class="chat-img pull-left">
                                          <img src="../images/user_image/1.jpg" alt="" class="img-circle" style="width:50px;height: 40px;">
                                      </span>
                                      <div class="chat-body clearfix">
                                          <div class="header">
                                              <strong class="primary-font"><a href="chat.php?sl=<?php echo $sl;?>"><?php echo $user_name;?></a></strong>
                                              <small class="pull-right text-muted">
                                                <?php
                                                  if($dat < $dt_now && $tme < $time_now)
                                                  {
                                                    echo "<i class='fa fa-clock-o fa-fw'></i> Active";
                                                  }
                                                  else
                                                  {
                                                  echo "<i class='fa fa-clock-o fa-fw'></i> Last seen at $llg_out";
                                                  }
                                                ?>
                                              </small>
                                          </div>
                                      </div>
                                    </li>
                                  <?php }?>
                              </ul>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Page Content -->
    </div>
    <!-- /#wrapper -->

    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <!--JavascriptsLink-->
</body>

</html>
