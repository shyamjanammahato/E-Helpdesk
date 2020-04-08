<?php
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
$get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' ");
while($row_query=mysqli_fetch_array($get_query))
{
    $lvl=$row_query['lvl'];
    $name=$row_query['full_nm'];
    $unique_id=$row_query['u_id'];
    $llg_out=$row_query['llg_out'];
    $s = strtotime($llg_out);
    $u_log_date = date('d/m/y', $s);
    $u_log_time = date('H:m:s A',$s);

}
$get_query1=mysqli_query($conn,"SELECT * FROM user_details where unique_id='$unique_id' ");
while($row_query1=mysqli_fetch_array($get_query1))
{
    $course_id=$row_query1['course_id'];
    $sem_id=$row_query1['sem_id'];
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

    <title>Dashboard - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
         function show_notice(sl)
        {
          $('#light_box1').load('show-notice.php?sl='+sl).fadeIn("fast");
          $('#lightbox_model1').modal('show');
        }
    </script>
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
                        <h1 class="page-header"><i class="fa fa-home fa-fw"></i>
                        Welcome <?php echo $name; ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <?php
                                if($lvl=='0' || $lvl=='-5')
                                {
                                    $c=0;
                                    $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where stat='1' and file_type='1' ");
                                    while($row_file=mysqli_fetch_array($get_file))
                                    {
                                        $c++;
                                    }
                                ?>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $c;?></div>
                                        <div>Total Files Uploaded!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../show-doc-to-admin/index.php?file_type=<?php echo base64_encode(1);?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <?php
                                }
                                else if($lvl=='-10')
                                {
                                    $c=0;
                                    $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where teacher_id='$unique_id' and file_type='1' and stat='1' ");
                                    while($row_file=mysqli_fetch_array($get_file))
                                    {
                                        $c++;
                                    }
                            ?>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $c;?></div>
                                            <div>Total Files Uploaded!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../show-doc-to-admin/index.php?file_type=<?php echo base64_encode(1);?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            <?php
                                }
                                else if($lvl=='-15')
                                {
                                    $c=0;
                                    $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where course_id='$course_id' and sem_id='$sem_id' and file_type='1' and stat='1' ");
                                    while($row_file=mysqli_fetch_array($get_file))
                                    {
                                        $c++;
                                    }
                            ?>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $c;?></div>
                                            <div>Total Files!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../show-doc-to-admin/index.php?file_type=<?php echo base64_encode(1);?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <?php
                                if($lvl=='0' || $lvl=='-5')
                                {
                                    $c1=0;
                                    $get_video=mysqli_query($conn,"SELECT * FROM uploaded_file where stat='1' and file_type='2' ");
                                    while($row_video=mysqli_fetch_array($get_video))
                                    {
                                        $c1++;
                                    }
                                ?>
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-youtube-play fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge"><?php echo $c1;?></div>
                                                <div>Total Video Links!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="../show-doc-to-admin/index.php?file_type=<?php echo base64_encode(2);?>">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                <?php
                                }
                                else if($lvl=='-10')
                                {
                                    $c=0;
                                    $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where teacher_id='$unique_id' and file_type='2' and stat='1' ");
                                    while($row_file=mysqli_fetch_array($get_file))
                                    {
                                        $c++;
                                    }
                            ?>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-youtube-play fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $c;?></div>
                                            <div>Total Video Links!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../show-doc-to-admin/index.php?file_type=<?php echo base64_encode(2);?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            <?php
                                }
                                else if($lvl=='-15')
                                {
                                    $c=0;
                                    $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where course_id='$course_id' and sem_id='$sem_id' and file_type='2' and stat='1' ");
                                    while($row_file=mysqli_fetch_array($get_file))
                                    {
                                        $c++;
                                    }
                            ?>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-youtube-play fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $c;?></div>
                                            <div>Total Videos!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../show-doc-to-admin/index.php?file_type=<?php echo base64_encode(2);?>">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <?php
                                if($lvl=='0' || $lvl=='-5' || $lvl=='-10')
                                {
                                    $c2=0;
                                    $get_posts=mysqli_query($conn,"SELECT * FROM post_question where p_stat='0' and lvl='1' ");
                                    while($row_post=mysqli_fetch_array($get_posts))
                                    {
                                        $c2++;
                                    }
                                ?>
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-desktop fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge"><?php echo $c2;?></div>
                                                <div>New Posts!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="../show-post-admin/index.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                            <?php
                                }
                                else if($lvl=='-15')
                                {
                                    $c2=0;
                                    $get_file=mysqli_query($conn,"SELECT * FROM post_question where u_id='$id1' and parent='0' and p_stat='0' ");
                                    while($row_file=mysqli_fetch_array($get_file))
                                    {
                                        $c2++;
                                    }
                            ?>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-desktop fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $c2;?></div>
                                            <div>Your Posts!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../show-post-admin/index.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <?php
                                if($lvl=='-5' || $lvl=='0')
                                {
                                    $c3=0;
                                    $get_co=mysqli_query($conn,"SELECT * FROM post_question where lvl!='1' and p_stat='0' ");
                                        while($row_co=mysqli_fetch_array($get_co))
                                        {
                                            $c3++;
                                        }
                                ?>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $c3;?></div>
                                            <div>New Comments!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../show-comment-admin/index.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            <?php
                                }
                                else if($lvl=='-10')
                                {
                                    $c4=0;
                                    $get_f=mysqli_query($conn,"SELECT * FROM user_notification where to_u_id='$id1' and notify_type!='1' and view_stat_n='1' ");
                                    while($row_f=mysqli_fetch_array($get_f))
                                    {
                                        $c4++;
                                    }
                            ?>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $c4;?></div>
                                            <div>New Comments!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../show-post-admin/index.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            <?php
                                }
                                else
                                {
                                    $c3=0;
                                    $get_file=mysqli_query($conn,"SELECT * FROM user_notification where to_u_id='$id1' and view_stat_n='0' ");
                                    while($row_file=mysqli_fetch_array($get_file))
                                    {
                                        $c3++;
                                    }
                            ?>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $c3;?></div>
                                            <div>New Comments!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../show-post-admin/index.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-thumb-tack fa-fw"></i> Notice Board
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                            <?php
                            $get_notice1=mysqli_query($conn,"SELECT * FROM notice_tbl where stat='1' order by sl desc");
                            if($row_notice1=mysqli_fetch_array($get_notice1))
                            {
                                $get_notice=mysqli_query($conn,"SELECT * FROM notice_tbl where stat='1' order by sl desc");
                                    while($row_notice=mysqli_fetch_array($get_notice))
                                    {
                                        $sem_dept_id=$row_notice['sem_dept_id'];
                                        $title=$row_notice['title'];
                                        $notice_descp=$row_notice['notice_descp'];
                                        $post_type=$row_notice['post_type'];
                                        $to_copy=$row_notice['to_copy'];
                                        $notice_dt=$row_notice['notice_dt'];
                                        $notice_time=$row_notice['notice_time'];
                                        $eby=$row_notice['eby'];
                                        $notice_sl=$row_notice['sl'];

                                        $s = strtotime($notice_dt);
                                        $n_date = date('d/m/y', $s);
                                        if($lvl=='0' || $lvl=='-5')
                                        {
                                            if($post_type!='3')
                                            {
                                    ?>
                                            <a href="javascript:void(0)" class="list-group-item" onclick="show_notice('<?php echo base64_encode(base64_encode($notice_sl));?>')">
                                                <i class="fa fa-unlock-alt fa-fw"></i> <?php echo $title;?>
                                                <span class="pull-right text-muted small"><em><?php echo $notice_dt." ";?><?php echo $notice_time;?></em>
                                                </span>
                                            </a>
                                    <?php
                                            }
                                        }
                                        else if($lvl=='-10')
                                        {
                                            if($post_type=='3' && $to_copy!='3')
                                            {
                                    ?>
                                            <a href="javascript:void(0)" class="list-group-item" onclick="show_notice('<?php echo base64_encode(base64_encode($notice_sl));?>')">
                                                <i class="fa fa-unlock-alt fa-fw"></i> <?php echo $title;?>
                                                <span class="pull-right text-muted small"><em><?php echo $notice_dt." ";?><?php echo $notice_time;?></em>
                                                </span>
                                            </a>
                                    <?php
                                            }
                                        }
                                        else if($lvl=='-15')
                                        {
                                            if($to_copy!='2')
                                            {
                                    ?>
                                            <a href="javascript:void(0)" class="list-group-item" onclick="show_notice('<?php echo base64_encode(base64_encode($notice_sl));?>')">
                                                <i class="fa fa-unlock-alt fa-fw"></i> <?php echo $title;?>
                                            <?php
                                                if($n_date > $u_log_date || $n_date == $u_log_date)
                                                {
                                                    if($notice_time > $u_log_time || $notice_time = $u_log_time)
                                                    {
                                            ?>
                                                <span class="pull-center text-muted small"><em><img src=../images/new.gif width="50px;height=40px;"></em>
                                                </span>
                                            <?php
                                                }}
                                            ?>
                                                <span class="pull-right text-muted small"><em><?php echo $notice_dt." ";?><?php echo $notice_time;?></em>
                                                </span>
                                            </a>
                                    <?php
                                            }
                                        }
                                    }
                                }
                                else
                                {
                                    echo "No Notice";
                                }
                                ?>
                            </div>
                            <div id="lightbox_model1" class="modal fade" role="dialog">
                                <div id="light_box1">

                                </div>
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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
