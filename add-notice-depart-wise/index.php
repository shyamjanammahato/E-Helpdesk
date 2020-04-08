<?php
include "../config.php";
if($ck!='1')
{
    header("Location: ../dashboard/index.php");
}
$get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' ");
if($row_query=mysqli_fetch_array($get_query))
{
    $unique_id=$row_query['u_id'];
}
$type=base64_decode(base64_decode($_REQUEST['type']));
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

    <title>Add Notice - GIMT HelpDesk</title>
    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
</head>
    <script>
        function del_doc(sl)
        {

            var r = confirm("Are you sure to Delete this Notice ?");
            if (r == true)
            {
                window.location.href = "delete-notice.php?sl="+sl;
            }
            else
            {
                return false;
            }
        }
         function show_pdf(file)
        {
          window.location.href = "show-pdf.php?file="+file;
        }
    </script>
<body
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
                        <h1 class="page-header"><i class="fa fa-plus-square fa-fw"></i><?php echo "Add Notice"?></h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-edit fa-fw"></i> Notice Form
                                    </div>
                                    <div class="panel-body">
                                        <form class="" role="form" id="notice_frm" name="notice_frm" method="POST" action="add-notice-code/add-notice-code.php">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <input type="hidden" name="type" id="type" value="<?php echo $type;?>">
                                                <label>Title<font style="color:red">*</font></label>
                                                <input class="form-control" name="notice_title" id="notice_title" placeholder="Notice Title">
                                            </div>
                                        </div>
                                        <?php
                                        if($type=='2')
                                        {
                                            $get_depart=mysqli_query($conn,"SELECT * FROM user_details where unique_id='$unique_id' and stat='1' ");
                                            if($row_depart=mysqli_fetch_array($get_depart))
                                            {
                                                $depart_id=$row_depart['depart_id'];
                                                $row_depart1=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$depart_id' and stat='1' ");
                                                if($row_depart1=mysqli_fetch_array($row_depart1))
                                                {
                                                    $depart_nm=$row_depart1['depart_nm'];
                                                    $depart_sl=$row_depart1['sl'];
                                                ?>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Department <font style="color:red">*</font></label>
                                                    <input type="text" class="form-control" value="<?php echo $depart_nm;?>" readonly >
                                                    <input type="hidden" class="form-control" value="<?php echo $depart_sl;?>" id="depart_id" name="depart_id" >
                                                </div>
                                            </div>
                                        <?php
                                                }
                                            }
                                        }
                                        else
                                        {
                                        ?>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>To Copy <font style="color:red">*</font></label>
                                                    <select name="select_copy" id="select_copy" class="form-control">
                                                        <option value="0">Select</option>
                                                        <option value="1">To All</option>
                                                        <option value="2">To Employees Only</option>
                                                        <option value="3">To Students Only</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Notice Description<font style="color:red">*</font></label>
                                                <textarea class="form-control" rows="4" name="notice_descp" id="notice_descp"></textarea><br>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">File</span>
                                                <input type="file" class="form-control" id="file" name="file">
                                            </div>
                                            <label><font style="color:red">*</font>File is not mandotary if not applicable..In case , upload only PDF file</label>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" style="text-align: right;">
                                                <button type="reset" class="btn btn-default">Reset</button>
                                                <button type="submit" class="btn btn-primary" name="add_depart_notice" id="add_depart_notice">Submit</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="" id="error_id">

                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-search"></i> View Notice
                             </div>
                            <div class="panel-body">
                                <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Action</th>
                                            <th>Notice Title</th>
                                            <th>Semester/To</th>
                                            <th>File</th>
                                            <th>Notice Date</th>
                                            <th>Notice Time</th>
                                            <th>By</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $scl=0;
                                            $get_name=mysqli_query($conn,"SELECT * FROM notice_tbl where post_type='3' and post_type!='1' order by sl desc");
                                            while($row_name=mysqli_fetch_array($get_name))
                                            {
                                                $scl++;
                                                $notice_sl=$row_name['sl'];
                                                $sem_depart_id=$row_name['sem_dept_id'];
                                                $title=$row_name['title'];
                                                $notice_descp=$row_name['notice_descp'];
                                                $file=$row_name['file'];
                                                $notice_dt=$row_name['notice_dt'];
                                                $notice_time=$row_name['notice_time'];
                                                $post_type=$row_name['post_type'];
                                                $to_copy=$row_name['to_copy'];
                                                $stat=$row_name['stat'];
                                                $eby=$row_name['eby'];
                                        ?>
                                                <tr class="">
                                                    <td><?php echo $scl; ?></td>
                                                    <td>
                                                      <div class="btn-group">
                                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#" onclick="del_doc('<?php echo base64_encode(base64_encode($notice_sl));?>');">Delete</a></li>
                                                      </div>
                                                    </td>
                                                    <td><?php echo $title; ?></td>
                                                        <?php
                                                        if($post_type=='2')
                                                        {
                                                            $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$sem_depart_id' and stat='1' ");
                                                            if($row_depart=mysqli_fetch_array($get_depart))
                                                            {
                                                                $depart_nm=$row_depart['depart_nm'];
                                                                ?><td><?php echo $depart_nm;?><?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            if($to_copy=='1')
                                                            {
                                                                ?><td><?php echo "To All ";?><?php
                                                            }
                                                            else if($to_copy=='2')
                                                            {
                                                                ?><td><?php echo "To Employee ";?><?php
                                                            }
                                                            else
                                                            {
                                                                ?><td><?php echo "To Students ";?><?php
                                                            }
                                                        }
                                                        ?>
                                                     </td>
                                                    <td>
                                                <?php
                                                    if($file=='null')
                                                    {
                                                        echo "<span class='label label-danger'>No Files</span>";
                                                    }
                                                    else
                                                    {
                                                ?>
                                                    <img src="../files/pdflogo.png" alt=" " height="80" width="100" onclick="show_pdf('<?php echo basename($file);?>')"><?php echo basename($file);?>
                                                <?php
                                                    }
                                                ?>
                                                    </td>
                                                    <td><?php echo $notice_dt; ?></td>
                                                    <td><?php echo $notice_time; ?></td>
                                                    <td><?php echo $eby;?></td>
                                                    <td>
                                                      <?php
                                                      if($stat=='1')
                                                      {
                                                        echo "<span class='label label-success'>ACTIVE</span>";
                                                      }
                                                      else
                                                      {
                                                        echo "<span class='label label-danger'>Deactive</span>";
                                                      }
                                                      ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                            </div>
                            <!-- Main Page Content -->
                        </div>
                      </div>
                    </div>
                    <div id="lightbox_model1" class="modal fade" role="dialog">
                    <div id="light_box1">

                    </div>
            </div>
        </div>
        <!-- Main Page Content -->
    </div>
    <!-- /#wrapper -->

    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <!--JavascriptsLink-->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
    <script src="add-notice-js/add-notice.js"></script>
</body>

</html>
