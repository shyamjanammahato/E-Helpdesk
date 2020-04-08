<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
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

    <title>Posts - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
</head>
    <script>
        function show_post(post_sl)
        {
            $('#auto_load').html("<strong><label>Loading...</label></strong>").fadeIn("fast");
            setTimeout(function(){
              $('#auto_load').load('show.php?post_sl='+post_sl).fadeIn("fast");
            }, 1000);
        }
    </script>
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
                        <h1 class="page-header"><i class="fa fa-laptop fa-fw"></i>Total Post</h1>
                        <div class="col-lg-5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bell fa-fw"></i> Post Panel
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="list-group">
                                    <?php
                                $qu=mysqli_query($conn,"SELECT * FROM post_question where lvl='1' and p_stat='0' ");
                                if($ro=mysqli_fetch_array($qu))
                                {
                                    $query=mysqli_query($conn,"SELECT * FROM post_question where lvl='1' and p_stat='0' ");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                        $subject_id=$row['p_sub'];
                                        $subject_other=$row['p_sub_others'];
                                        $post_sl=$row['sl'];
                                        $by_u_id=$row['u_id'];
                                        $dt=$row['p_dt'];
                                        $tm=$row['p_time'];

                                        $get_name=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$by_u_id' ");
                                        if($row_name=mysqli_fetch_array($get_name))
                                        {
                                            $name=$row_name['full_nm'];
                                        }
                                        if($subject_other=='null')
                                        {
                                            $query_subject=mysqli_query($conn,"SELECT * FROM subject_tbl where sl='$subject_id' and stat='1' ");
                                            if($row_subject=mysqli_fetch_array($query_subject))
                                            {
                                                $subject_name=$row_subject['subject_nm'];
                                            }
                                        ?>
                                            <a href="#" class="list-group-item" onclick="show_post('<?php echo base64_encode(base64_encode($post_sl));?>');");">
                                                <i class="fa fa-info-circle fa-fw"></i><?php echo  $name." "."Posted a Question of Subject "." ".$subject_name;?>
                                                <span class="pull-right text-muted small"><em><?php echo date("d, M'y", strtotime($dt));?><?php echo " ".$tm;?></em>
                                                </span>
                                            </a>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <a href="#" class="list-group-item" onclick="show_post('<?php echo base64_encode(base64_encode($post_sl));?>');");">
                                                <i class="fa fa-info-circle fa-fw"></i> <?php echo  $name." "."Posted a Question of Subject / Question "." ".$subject_other;?>
                                                <span class="pull-right text-muted small"><em><?php echo date("d, M'y", strtotime($dt));?><?php echo " ".$tm;?></em>
                                                </span>
                                            </a>
                                        <?php
                                        } 
                                        
                                    } 
                                }
                                    ?>
                                    </div>
                                    <!-- /.list-group -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                        </div>
                        <div class="col-lg-7" id="auto_load">
                            
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
