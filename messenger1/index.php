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

    <title>Blank - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <style>
        .scrollit {
    overflow:scroll;
    height:100px;
    height: 80%;
}
    </style>
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
                        <h1 class="page-header">Messenger</h1>
                        <div class="chat-panel panel panel-default">
                            <div class="panel-heading" id="chat_head">
                                <i class="fa fa-comments fa-fw"></i> Chat
                            </div>
                            <div class="panel-body">
                                <ul class="chat">
                                    <?php
                                    $get_chat_user=mysqli_query($conn,"SELECT * FROM login_tbl WHERE stat=1 AND mail_id!='$id1' ORDER BY full_nm ASC");
                                    while ($row_chat_user=mysqli_fetch_array($get_chat_user))
                                    {
                                      $mail_id = $row_chat_user['mail_id'];
                                      $user_name = $row_chat_user['full_nm'];
                                      $user_picture = $row_chat_user['dp_pic'];
                                    ?>
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="#" alt="" class="img-circle">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                    <strong class="primary-font"><a href="javascript:void(0);" onclick="chat_start('<?php echo base64_encode($mail_id);?>')"><?php echo $user_name;?></a></strong>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                </div>
                                <!-- /.panel-body -->
                                <div class="scrollit" id="msgarea_chat">
                                <div class="chat-discussion"></div>
                            </div>
                            <div class="panel-footer">
                                <div class="input-group">
                                    <input type="hidden" name="chat_u_id" id="chat_u_id">
                                    <input id="message" name="message" type="text" class="form-control input-sm" placeholder="Type your message here...">
                                    <span class="input-group-btn">
                                        <div class="form-group" style="text-align:right;">
                                            <button type="button" class="btn btn-danger" onclick="reset_btn();"><i class="fa fa-refresh"></i>&nbsp;Reset</button>
                                            <button type="button" class="btn btn-primary" onclick="send_btn();"><i class="fa fa-paper-plane-o"></i>&nbsp;Send</button>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <!-- /.panel-footer -->
                        </div>
                        <div id="error_id"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Page Content -->
    </div>
    <!-- /#wrapper -->

    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <script type="text/javascript" src="messenger-js/js-script.js"></script>
    <!--JavascriptsLink-->
</body>

</html>
