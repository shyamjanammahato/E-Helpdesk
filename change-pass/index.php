<?php 
include "../config.php";
if($ck=='1')
{
    header("Location: ../dashboard/index.php");
}
$get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' ");
if($row_query=mysqli_fetch_array($get_query))
{
    $unique_id=$row_query['u_id'];
    $mail_id=$row_query['mail_id'];
}
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

    <title>Change Password - GIMT HelpDesk</title>

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
                        <h1 class="page-header"><i class="fa fa-key fa-fw"></i>Change Password</h1>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-edit fa-fw"></i>Update Form
                                    </div>
                                    <div class="panel-body text-align center">
                                        <div class="row">
                                            <form class="" role="form" id="update_pass_frm" name="update_pass_frm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                <!--1st Part-->
                                                <input type="hidden" name="email" id="email" value="<?php echo $mail_id;?>">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Current Password <font style="color:red">*</font></label>
                                                        <input class="form-control" type="password" name="curr_pass" id="curr_pass">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>New Password <font style="color:red">*</font></label>
                                                        <input class="form-control" type="password" name="new_pass" id="new_pass">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Confirm Password <font style="color:red">*</font></label>
                                                        <input class="form-control" type="password" name="conf_new_pass" id="conf_new_pass">
                                                    </div>
                                                    <label><font style="color:red">*Enter Strong Password with Case Sensitive and Some Special Characters.</font></label>
                                                </div>
                                                <!--2nd Part-->
                                                <!--Full Part Button col 12-->
                                                <div class="col-lg-12">
                                                    <div class="form-group" style="text-align: right;">
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                        <button type="submit" class="btn btn-primary" name="update_pass" id="update_pass">Save Changes</button>
                                                    </div>
                                                </div>
                                                <!--Full Part Button col 12-->
                                            </form>
                                        </div>
                                        <div class="" id="error_id">

                                        </div>
                                    </div>
                                </div>
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
    <script src="change-pass-js/change-pass.js"></script>
</body>

</html>
