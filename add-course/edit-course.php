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

    <title>Edit Course - GIMT HelpDesk</title>

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
                        <h1 class="page-header"><i class="fa fa-edit fa-fw"></i>Edit Course</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-edit fa-fw"></i> Course Form
                                    </div>
                                    <div class="panel-body">
                                        <form class="" role="form" id="edit_course_frm" name="edit_course_frm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                          <?php
                                            $get_all_course1=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$to_update_sl' and stat='1' ");
                                            if($row_all_course1=mysqli_fetch_array($get_all_course1))
                                              {
                                                $scl=0;
                                                $scl++;
                                                $sl=$row_all_course1['sl'];
                                                $course_name=$row_all_course1['course_name'];
                                                $course_code=$row_all_course1['course_code'];
                                          ?>
                                          <input type="hidden" name="sl" id="sl" value="<?php echo $sl ;?>">
                                            <div class="form-group">
                                                <label>Course Name <font style="color:red">*</font></label>
                                                <input class="form-control" name="course_name" id="course_name" value="<?php echo $course_name; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Course Code <font style="color:red">*</font></label>
                                                <input class="form-control" name="course_code" id="course_code" value="<?php echo $course_code; ?>">
                                            </div>
                                            <div class="form-group" style="text-align: right;">
                                                <button type="reset" class="btn btn-default">Reset</button>
                                                <button type="submit" class="btn btn-primary" name="edit_course" id="edit_course">Update</button>
                                            </div>
                                            <?php } ?>
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
                            <i class="fa fa-search"></i> View Courses List
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
                                        <th>Entry By</th>
                                        <th>Date/Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                      <?php
                                        $scl=0;
                                        $get_all_course=mysqli_query($conn,"SELECT * FROM course_tbl");
                                        while($row_all_course=mysqli_fetch_array($get_all_course))
                                          {
                                            $scl++;
                                            $sl=$row_all_course['sl'];
                                            $course_name=$row_all_course['course_name'];
                                            $course_code=$row_all_course['course_code'];
                                            $edt=$row_all_course['edt'];
                                            $eby=$row_all_course['eby'];
                                      ?>
                                        <td><?php echo $scl ?></td>
                                        <td>
                                          <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="edit-course.php?sl=<?php echo base64_encode($sl);?>">Edit</a></li>
                                                 <li><a href="javascript:void(0);" onclick="delete_fn('<?php echo base64_encode($sl);?>')">Delete</a></li>
                                            </ul>
                                          </div>
                                        </td>
                                        <td><?php echo $course_name ?></td>
                                        <td><?php echo $course_code ?></td>
                                        <td class="center"><?php echo $eby ?></td>
                                        <td class="center"><?php echo $edt ?></td>
                                    </tr>
                                    <?php } ?>
        </div>
        <!-- Main Page Content -->
    </div>
  </div>
    <!-- /#wrapper -->
    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <script src="add-course-js/edit-course.js"></script>
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
