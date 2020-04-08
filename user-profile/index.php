<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
else
{
    $unique_id=base64_decode(base64_decode(base64_decode($_REQUEST['unique_id'])));
    if(!$unique_id)
    {
        header("Location: ../dashboard/index.php");
    }
    $get=mysqli_query($conn,"SELECT * from user_details where unique_id='$unique_id' ");
    if($row_name=mysqli_fetch_array($get))
    {
        $id=$row_name['unique_id'];
        $gender=$row_name['gender'];
        $dob=$row_name['dob'];
        $registration_no=$row_name['registration_no'];
        $course=$row_name['course_id'];
        $depart=$row_name['depart_id'];
        $sem=$row_name['sem_id'];
        $batch=$row_name['batch'];
        $adm_dt=$row_name['adm_dt'];
        $stat=$row_name['stat'];
        $user_type=$row_name['user_type'];
        $subject=$row_name['subject'];
        $edt=$row_name['edt'];
    }
    $get_name1=mysqli_query($conn,"SELECT * from login_tbl where u_id='$id' ");
    if($row_name1=mysqli_fetch_array($get_name1))
    {
        $name=$row_name1['full_nm'];
        $email1=$row_name1['mail_id'];
        $pass=$row_name1['pass'];
        $photo=$row_name1['dp_pic'];
        $mob=$row_name1['mob'];
    }
    $pass_decoded=base64_decode($pass);
    $get_course=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course' and stat='1' ");
    if($row_course=mysqli_fetch_array($get_course))
    {
        $course_name=$row_course['course_name'];
    }
    $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$depart' and stat='1' ");
    if($row_depart=mysqli_fetch_array($get_depart))
    {
        $depart_name=$row_depart['depart_nm'];
    }
    $get_batch=mysqli_query($conn,"SELECT * FROM academic_yr where sl='$batch' and stat='1' ");
    if($row_batch=mysqli_fetch_array($get_batch))
    {
        $stud_batch=$row_batch['acad_yr'];
    }
    $get_sem=mysqli_query($conn,"SELECT * FROM semester_tbl where sl='$sem' and stat='1' ");
    if($row_sem=mysqli_fetch_array($get_sem))
    {
        $stud_sem=$row_sem['sem'];
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
    <meta name="author" content="Shyam Janam Mahato | Jayanta Paul">

    <title>Profile - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script type="text/javascript">
        function modal(u_id)
        {
            $('#light_box').load('modal-profile-pic.php?unique_id='+u_id).fadeIn("fast");
            $('#lightbox_model').modal('show');
        }
        function open_modal(u_id)
        {
            $('#light_box1').load('show-profile-photo.php?unique_id='+u_id).fadeIn("fast");
            $('#lightbox_model1').modal('show');
        }
         function edit_dtl_modal(id)
        {
            $('#light_box2').load('edit-profile.php?id='+id).fadeIn("fast");
            $('#lightbox_model2').modal('show');
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
                        <h1 class="page-header"><i class="fa fa-eye fa-fw"></i>View Profile</h1>
                        <div class="col-lg-9">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <i class="fa fa-edit fa-fw"></i> Profile
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#profile-pills" data-toggle="tab">Profile</a></li>
                                        <?php
                                        $get_ty=mysqli_query($conn,"SELECT * from user_details where unique_id='$id' ");
                                        if($row_ty=mysqli_fetch_array($get_ty))
                                        {
                                            $u_type1=$row_ty['user_type'];
                                            if($u_type1=='2' || $u_type1=='3')
                                            {
                                            ?>
                                            <li><a href="#academic-pills" data-toggle="tab">Academic</a></li>
                                            <?php 
                                            }?>
                                        </ul>
                                        <!-- Tab panes --><br>
                                        <div class="tab-content">
                                            <p class="text-right">
                                            <?php
                                            if($u_type1=='2' || $u_type1=='3')
                                            {
                                            ?>
                                            <a class="btn btn-primary btn-md" onclick="edit_dtl_modal('<?php echo $id;?>');"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></p>
                                        <?php
                                        }}?>
                                        <div class="tab-pane fade in active" id="profile-pills">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <colgroup>
                                                        <col style="width:15%">
                                                        <col style="width:35%">
                                                        <col style="width:15%">
                                                        <col style="width:35%">
                                                    </colgroup>
                                                    <tbody>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td><?php echo $name;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Password</th>
                                                        <td><?php echo $pass_decoded;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender</th>
                                                        <td><?php echo $gender;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Date of Birth</th>
                                                        <td><?php echo $dob;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nationality</th>
                                                        <td>Indian</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mobile</th>
                                                        <td><?php echo $mob;?></td>
                                                    </tr>
                                                </tbody></table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="academic-pills">
                                            <div class="table-responsive">
                                                <table class="table">
                                                <colgroup>
                                                        <col style="width:15%">
                                                        <col style="width:35%">
                                                        <col style="width:15%">
                                                        <col style="width:35%">
                                                    </colgroup>
                                                    <tbody>
                                                    <tr>
                                                        <th>Course</th>
                                                        <td><?php echo $course_name;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Department</th>
                                                        <td><?php echo $depart_name;?></td>
                                                    <tr> 
                                                    <?php
                                                    $get_type=mysqli_query($conn,"SELECT * from user_details where unique_id='$id' ");
                                                        if($row_type=mysqli_fetch_array($get_type))
                                                        {
                                                            $u_type=$row_type['user_type'];
                                    
                                                            if($u_type=='3')
                                                            {       
                                                        ?>
                                                            <th>Batch</th>
                                                            <td><?php echo $stud_batch;?></td>
                                                        <?php
                                                            }
                                                            else if($u_type=='2')
                                                            {
                                                        ?>
                                                            <th>Sem-Subject</th>
                                                            <?php
                                                            $c=0;
                                                            $get_assign_sub=mysqli_query($conn,"SELECT * FROM assign_subject where teacher_id='$id' and stat='1' ");
                                                                while($row_assig_sub=mysqli_fetch_array($get_assign_sub))
                                                                {
                                                                    $sem_id=$row_assig_sub['sem_id'];
                                                                    $ubject_id=$row_assig_sub['subjects'];

                                                                    $get_sub=mysqli_query($conn,"SELECT * FROM subject_tbl where sl='$ubject_id' and stat='1' ");
                                                                    if($row_sub=mysqli_fetch_array($get_sub))
                                                                    {
                                                                        $c++;
                                                                        $teacher_subject=$row_sub['subject_nm'];
                                                                    }
                                                            ?>
                                                                    <td width="10%"><?php echo $c.'-'.$teacher_subject; echo'<br>'?></td>
                                                            <?php
                                                                }
                                                            ?>
                                                        <?php
                                                            }}
                                                        ?>
                                                    </tr>
                                                    <tr>
                                                    <?php
                                                        if($sem!='-50')
                                                        {
                                                    ?>
                                                        <th>Semester</th>
                                                        <td><?php echo $sem;?></td>
                                                    <?php
                                                        }
                                                    ?>
                                                    </tr>
                                                    <tr>
                                                        <th>Enrollment Date/Time</th>
                                                        <td><?php echo $edt;?></td>
                                                    </tr>
                                                    <tr>
                                                    <?php
                                                    $get_type2=mysqli_query($conn,"SELECT * from login_tbl where u_id='$id' ");
                                                        if($row_type2=mysqli_fetch_array($get_type2))
                                                        {
                                                            $llg_in=$row_type2['llg_in_time'];
                                                            $llg_out=$row_type2['llg_out'];
                                                    ?>
                                                        <th>Last Login</th>
                                                        <td><?php echo $llg_in;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Last Logout</th>
                                                        <td><?php echo $llg_out;?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody></table>
                                            </div>
                                        </div>
                                         <div class="tab-pane fade" id="setting-pills">
                                            <div class="table-responsive">
                                                <table class="table">
                                                <colgroup>
                                                        <col style="width:15%">
                                                        <col style="width:35%">
                                                        <col style="width:15%">
                                                        <col style="width:35%">
                                                    </colgroup>
                                                    <tbody>
                                                </tbody></table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                                <div class="panel-footer">
                                    <p>© 2017 GIMT HelpDesk | Final Year Project.</p>
                                </div>
                            </div>
                            <!-- /.panel -->
                        </div> 
                        <!-- /.col-lg-6 -->
                        <div class="col-md-3">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <i class="fa fa-edit fa-fw"></i>Account Details
                                </div>
                                <div class="panel-body">
                                    <?php 
                                        if($photo=='null')
                                        {
                                        ?>
                                        <img class="center-block img-circle img-thumbnail img-responsive" src="../images/user_image/default2.png" alt="No Image" style="width:130px;height:130px"> 
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <img class="center-block img-circle img-thumbnail img-responsive" src="../images/user_image/<?php echo $photo;?>.jpg" style="width:130px;height:130px" onclick="open_modal('<?php echo $id;?>');"> 
                                        <?php
                                        }
                                     ?>
                                                                       
                                    <a class="text-center center-block" href="javascript:void(0);"  onclick="modal('<?php echo $id;?>');"><i class="fa fa-pencil-square" aria-hidden="true"></i> Change Picture</a>                
                                    <h4 class="profile-username text-center"><?php echo $name;?></h4>
                                    <?php
                                        if($stat=='1')
                                        {
                                          echo "<h5 class='text-center'><span class='label label-success'>ACTIVE</span></h5>";
                                        }
                                        else
                                        {
                                          echo "<h5 class='text-center'><span class='label label-danger'>DEACTIVE</span></h5>";
                                        }
                                    ?>
                                    <hr>
                                    <strong>ID</strong>
                                    <p class="text-muted"><?php echo $unique_id;?></p>
                                    <strong>Email/Login Id</strong>
                                    <p class="text-muted"><?php echo $email1;?></p>
                                    <strong>Mobile No </strong>
                                    <p class="text-muted"><?php echo $mob;?></p>         
                                </div><!--./pannel-body-->
                            </div><!--./pannel-default-->
                        </div><!-- /.col-lg-6 -->    
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
    <div id="lightbox_model" class="modal fade" role="dialog">
        <div id="light_box">

        </div>
    </div>
    <div id="lightbox_model1" class="modal fade" role="dialog">
        <div id="light_box1">

        </div>
    </div>
    <div id="lightbox_model2" class="modal fade" role="dialog">
        <div id="light_box2">

        </div>
    </div>
</body>

</html>
<?php
}
?>