<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
  $sl=$_REQUEST['sl'];
  $to_update_sl=base64_decode($sl);
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

    <title>Department - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
      function delete_fn(sl) {
          var r = confirm("Are you sure to delete ?");
          if (r == true) {
            window.location.href = "delete-course.php?sl="+sl;
          } else {
            return false;
          }
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
                        <h1 class="page-header"><i class="fa fa-edit fa-fw"></i>Edit Department</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-edit fa-fw"></i> Department Form
                                    </div>
                                    <div class="panel-body">
                                        <form class="" role="form" id="edit_department_frm" name="edit_department_frm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                              <?php
                                              $get_all_depart1=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$to_update_sl' and stat='1' ");
                                              while($row_all_depart1=mysqli_fetch_array($get_all_depart1))
                                                {
                                                  $sl=$row_all_depart1['sl'];
                                                  $course_id=$row_all_depart1['course_id'];
                                                  $depart_nm=$row_all_depart1['depart_nm'];
                                                  $depart_code=$row_all_depart1['depart_code'];
                                                  $edt=$row_all_depart1['edt'];
                                                  $eby=$row_all_depart1['eby'];
                                                }
                                                ?>
                                                <div class="form-group">
                                                  <label>Select Course <font style="color:red">*</font></label>
                                                  <select class="form-control" name="course_id" id="course_id">
                                                    <option value="">----Select----</option>
                                                  <?php
                                                  $get_course1=mysqli_query($conn,"SELECT * FROM course_tbl ");
                                                  while($row_course1=mysqli_fetch_array($get_course1))
                                                  {
                                                    $course_id_new=$row_course1['sl'];
                                                    $course_name=$row_course1['course_name'];
                                                    $course_code=$row_course1['course_code'];
                                                ?>
                                                   <option value="<?php echo $course_id_new;?>" <?php echo ($course_id_new == $course_id) ? 'selected' : '';?>><?php echo $course_name;?></option>

                                                   <?php  } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                              <input type="hidden" name="sl" id="sl" value="<?php echo $to_update_sl; ?>">
                                                <label>Department Name <font style="color:red">*</font></label>
                                                <input class="form-control" name="depart_name" id="depart_name" value="<?php echo $depart_nm; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Department Code <font style="color:red">*</font></label>
                                                <input class="form-control" name="depart_code" id="depart_code" value="<?php echo $depart_code; ?>">
                                            </div>
                                            <div class="form-group" style="text-align: right;">
                                                <button type="reset" class="btn btn-default">Reset</button>
                                                <button type="submit" class="btn btn-primary" name="edit_depart" id="edit_depart">Update</button>
                                            </div>
                                        </form>
                                        <div class="" id="error_id">

                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            <!--Data table-->
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-search"></i> View Department List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Action</th>
                                        <th>Course Name</th>
                                        <th>Course Code</th>
                                        <th>Department Name</th>
                                        <th>Department Code</th>
                                        <th>Entry By</th>
                                        <th>Date/Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                      <?php
                                        $scl=0;
                                        $get_all_depart=mysqli_query($conn,"SELECT * FROM depart_tbl ");
                                        while($row_all_depart=mysqli_fetch_array($get_all_depart))
                                          {
                                            $scl++;
                                            $sl=$row_all_depart['sl'];
                                            $course_id=$row_all_depart['course_id'];
                                            $depart_nm=$row_all_depart['depart_nm'];
                                            $depart_code=$row_all_depart['depart_code'];
                                            $edt=$row_all_depart['edt'];
                                            $eby=$row_all_depart['eby'];

                                            $get_course=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course_id' ");
                                            while($row_course=mysqli_fetch_array($get_course))
                                            {
                                              $course_name=$row_course['course_name'];
                                              $course_code=$row_course['course_code'];
                                            }
                                      ?>
                                        <td><?php echo $scl;?></td>
                                        <td>
                                          <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="edit-course.php?sl=<?php echo base64_encode($sl);?>">Edit</a></li>
                                                 <li><a href="javascript:void(0);" onclick="delete_fn('<?php echo base64_encode($sl);?>')">Delete</a></li>
                                            </ul>
                                          </div>
                                        </td>
                                        <td><?php echo $course_name;?></td>
                                        <td><?php echo $course_code;?></td>
                                        <td><?php echo $depart_nm;?></td>
                                        <td><?php echo $depart_code;?></td>
                                        <td class="center"><?php echo $eby;?></td>
                                        <td class="center"><?php echo $edt;?></td>
                                    </tr>
                                    <?php } ?>
        </div>
        <!-- Main Page Content -->
    </div>
  </div>
    <!-- /#wrapper -->
    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <script src="add-department-js/edit-department-js.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <!--JavascriptsLink-->
</body>

</html>
