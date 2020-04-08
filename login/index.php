<?php 
include "../config.php";
if($ck=='1')
{
    header("Location: ../dashboard/index.php");
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

    <title>Login - E-HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
    function show_pass()
    {
      $('#light_box1').load('forgot-pass.php').fadeIn("fast");
      $('#lightbox_model1').modal('show');
    }
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-lock"></i> E-HelpDesk Login</h3>
                    </div>
                    <div class="panel-body">
                        <form class="" role="form" id="login_frm" name="login_frm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" id="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" id="password" value="">
                                </div>
                                 <div class="form-group">
                                    <a href="#" onclick="show_pass();">Forgot Password?</a>
                                </div>
                                <button type="submit" name="login" id="login" class="btn btn-lg btn-primary btn-block"><i class="fa fa-sign-in "></i> Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="" id="error_id">
                    
                </div>
                <!--Footer-->
                <div style="margin-top: 20px;text-align: center;">
                <strong>&copy; 2017 E-Helpdesk | Final Year Project</strong><br><small>Shyam Janam Mahato & Jayanta Paul</small>
                </div>
                <!--Footer-->
            </div>
        </div>
    </div>
     <div id="lightbox_model1" class="modal fade" role="dialog">
        <div id="light_box1">

        </div>
    </div>
    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <!--JavascriptsLink-->
    <script src="login-js/login-js.js"></script>
</body>

</html>
