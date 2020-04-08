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
        function show_file(file)
        {
          $('#light_box1').load('show-file.php?file='+file).fadeIn("fast");
          $('#lightbox_model1').modal('show');
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
                        <h1 class="page-header"><i class="fa fa-plus-square fa-fw"></i><?php echo "Add Sem Wise Notice"?></h1>
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
                                                <label>Title<font style="color:red">*</font></label>
                                                <input class="form-control" name="notice_title" id="notice_title" placeholder="Notice Title">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Sem <font style="color:red">*</font></label>
                                                <select class="form-control" name="sem_id" id="sem_id" onchange="load_sub(this.value)">
                                                    <option value="">---Select---</option>
                                                <?php
                                                    $get_sem=mysqli_query($conn,"SELECT distinct sem_id FROM assign_subject where teacher_id='$unique_id' and stat='1' ");
                                                    while($row_sem=mysqli_fetch_array($get_sem))
                                                    {
                                                        $sem1=$row_sem['sem_id'];
                                                        $get_sem1=mysqli_query($conn,"SELECT * FROM semester_tbl where sl='$sem1' and stat='1' ");
                                                        if($row_sem1=mysqli_fetch_array($get_sem1))
                                                            {
                                                                $stud_sem=$row_sem1['sem'];
                                                                $sem_sl=$row_sem1['sl'];
                                                            }
                                                ?>
                                                        <option value="<?php echo $sem_sl;?>"><?php echo $stud_sem;?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
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
                                            <label><font style="color:red">*</font>File is not mandotary if not applicable</label>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" style="text-align: right;">
                                                <button type="reset" class="btn btn-default">Reset</button>
                                                <button type="submit" class="btn btn-primary" name="add_sem_notice" id="add_sem_notice">Submit</button>
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
                                            <th>Notice Title</th>
                                            <th>Semester</th>
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
                                            $get_name=mysqli_query($conn,"SELECT * FROM notice_tbl where post_type!='3' order by sl desc");
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
                                                $stat=$row_name['stat'];
                                                $eby=$row_name['eby'];
                                        ?>
                                                <tr class="">
                                                    <td><?php echo $scl;?></td>
                                                    <td><?php echo $title; ?></td>
                                                        <?php
                                                            $get_sem=mysqli_query($conn,"SELECT * FROM semester_tbl where sl='$sem_depart_id' and stat='1' ");
                                                            if($row_sem=mysqli_fetch_array($get_sem))
                                                            {
                                                                $notice_sem=$row_sem['sem'];
                                                            }
                                                                ?><td><?php echo $notice_sem;?><?php
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
                                                    <td><?php echo $eby; ?></td>
                                                    <td>
                                                      <?php
                                                      if($stat=='1')
                                                      {
                                                        echo "<span class='label label-success'>Verified</span>";
                                                      }
                                                      else
                                                      {
                                                        echo "<span class='label label-danger'>Not Verified</span>";
                                                      }
                                                      ?>
                                                    </td>

                                                </tr>
                                                     <?php }
                                            ?>
                                                </tbody>
                                                </table>
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
        </div>
        <!-- Main Page Content -->
    <!-- /#wrapper -->
    </div>
    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
    <!--JavascriptsLink-->
    <script src="add-notice-js/add-notice.js"></script>
</body>

</html>
