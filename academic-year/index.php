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

    <title>Batch - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
      function delete_fn(sl) {
          var r = confirm("Are you sure to delete ?");
          if (r == true) {
            window.location.href = "delete-year.php?sl="+sl;
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
                        <h1 class="page-header"><i class="fa fa-plus-square fa-fw"></i>Add New Batch</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-edit fa-fw"></i>Create Form
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <form class="" role="form" id="academic_yr_frm" name="academic_yr_frm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                <!--1st Part-->
                                                <div class="col-lg-12">
                                                  <div class="form-group">
                                                      <label>Select Course <font style="color:red">*</font></label>
                                                      <select class="form-control" name="course_id" id="course_id">
                                                        <option value="">----Select----</option>
                                                        <?php
                                                          $scl=0;
                                                          $get_all_course=mysqli_query($conn,"SELECT * FROM course_tbl");
                                                          while($row_all_course=mysqli_fetch_array($get_all_course))
                                                            {
                                                              //$scl++;
                                                              $sl=$row_all_course['sl'];
                                                              $course_name=$row_all_course['course_name'];
                                                        ?>
                                                        <option value="<?php echo $sl; ?>"><?php echo $course_name; ?></option>
                                                        <?php } ?>
                                                      </select>
                                                  </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Batch(Academic Year) <font style="color:red">*</font></label>
                                                        <input class="form-control" type="text" name="acad_yr" id="acad_yr">
                                                    </div>
                                                </div>
                                                <!--2nd Part-->
                                                <!--Full Part Button col 12-->
                                                <div class="col-lg-12">
                                                    <div class="form-group" style="text-align: right;">
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                        <button type="submit" class="btn btn-primary" name="add_acad_yr" id="add_acad_yr">Submit</button>
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
                    <!--Data table-->
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <i class="fa fa-search"></i> View Batch (Academic Year)
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course</th>
                                                <th>Batch/Year</th>
                                                <th>Entry By</th>
                                                <th>Date/Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="">
                                              <?php
                                                $scl=0;
                                                $get_all_yr=mysqli_query($conn,"SELECT * FROM academic_yr ");
                                                while($row_all_yr=mysqli_fetch_array($get_all_yr))
                                                  {
                                                    $scl++;
                                                    $sl=$row_all_yr['sl'];
                                                    $course_id=$row_all_yr['course_id'];
                                                    $acad_yr=$row_all_yr['acad_yr'];
                                                    $edt=$row_all_yr['edt'];
                                                    $eby=$row_all_yr['eby'];

                                                    $get_course=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course_id' ");
                                                    while($row_course=mysqli_fetch_array($get_course))
                                                    {
                                                      $course_name=$row_course['course_name'];
                                                      $course_code=$row_course['course_code'];
                                                    }
                                              ?>
                                                <td><?php echo $scl ?></td>
                                                <td><?php echo $course_name ?></td>
                                                <td><?php echo $acad_yr ?></td>
                                                <td class="center"><?php echo $eby ?></td>
                                                <td class="center"><?php echo $edt ?></td>
                                            </tr>
                                            <?php } ?>
                </div>
                <!-- Main Page Content -->
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
    <script src="academic-year-js/academic-year-js.js"></script>
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
