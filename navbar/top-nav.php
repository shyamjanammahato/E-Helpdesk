<?php 
include "../config.php";
$get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' ");
if($row_query=mysqli_fetch_array($get_query))
{
    $unique_id=$row_query['u_id'];
}
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">E-HELPDESK</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <!-- <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="#">
                        <div>
                            <strong>Shyam Janam Mahato</strong>
                            <span class="pull-right text-muted">
                                <em>Yesterday</em>
                            </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul> -->
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-tasks">
                
                    <?php 
                        $get_query2=mysqli_query($conn,"SELECT * FROM user_details where unique_id='$unique_id' ");
                        if($row_query2=mysqli_fetch_array($get_query2))
                        {
                            $user_type=$row_query2['user_type'];
                        }
                        $c=0;
                        if($user_type=='2')
                        {
                            $get_query1=mysqli_query($conn,"SELECT * FROM uploaded_file where teacher_id='$unique_id' and file='null' ");
                            while($row_query1=mysqli_fetch_array($get_query1))
                            {
                                $c++;
                                $topic=$row_query1['topic_nm'];
                                $file_type=$row_query1['file_type'];
                                if($file_type=='1')
                                {
                        ?>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task <?php echo $c;?></strong><hr>
                                                Upload File of <?php echo $topic;?>
                                                <span class="pull-right text-muted">50% Complete</span>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                                        <span class="sr-only"> 50% Complete (warning)</span>
                                                    </div>
                                                </div>
                                            </p><hr>
                                        </div>
                                    </a>
                                </li>
                            <?php
                                }
                                else
                                {
                            ?>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task <?php echo $c;?></strong><hr>
                                                Upload Video of <?php echo $topic;?>
                                                <span class="pull-right text-muted">50% Complete</span>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                                        <span class="sr-only"> 50% Complete (warning)</span>
                                                    </div>
                                                </div>
                                            </p><hr>
                                        </div>
                                    </a>
                                </li>
                            <?php
                                }  
                            }
                            ?>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>See All Tasks</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            <?php
                        }
                        else if($user_type=='1')
                        {
                            $c=0;
                            $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where stat='0' order by sl desc ");
                            while($row_file=mysqli_fetch_array($get_file))
                            {
                                $c++;
                                $topic=$row_file['topic_nm'];
                                $file_type=$row_file['file_type'];
                                if($c<6)
                                {
                        ?>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task - Approval <?php echo $c;?></strong><br>
                                                Topic Name - <?php echo $topic;?>
                                            </p><hr>
                                        </div>
                                    </a>
                                </li>
                        <?php 
                                }
                            }
                        ?>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>See All Tasks</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                        <?php
                        }
                        if($c==0)
                                {
                            ?>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p>
                                                    <strong>No Task Left</strong><hr>
                                                    <span class="pull-right text-muted">100% Complete</span>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                            <span class="sr-only"> 100% Complete (warning)</span>
                                                        </div>
                                                    </div>
                                                </p><hr>
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                } 
                        ?> 
            </ul>
            <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <?php 
                        $c=0;
                        $get_alert=mysqli_query($conn,"SELECT * FROM user_notification where to_u_id='$id1' and view_stat_n='0' ");
                        while($row_alert=mysqli_fetch_array($get_alert))
                        {
                            $c++;
                        }
                            if($c!='0')
                            {
                        ?>
                            <a href="../navbar/show-all-notification.php">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have <?php echo $c++;?> new messages.
                                </div>
                            </a>
                        <?php
                            }
                            else
                            {
                        ?>
                                <a href="#">
                                <div>
                                    <p>
                                        <strong>No Notification</strong>
                                    </p>
                                </div>
                                </a>
                        <?php
                            } 
                 ?>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="../user-profile/index.php?unique_id=<?php echo base64_encode(base64_encode(base64_encode($unique_id))); ?>"><i class="fa fa-user fa-fw"></i> Profile</a></li>
                <li><a href="../change-pass/index.php"><i class="fa fa-gear fa-fw"></i> Change Password</a></li>
                <li class="divider"></li>
                <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->