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

    <title>Employee - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
      function show_depart(sl)
      {
        $('#auto_load').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading Departments' class='form-control' disabled></strong>").fadeIn("fast");
        setTimeout(function(){
          $('#auto_load').load('depart-load.php?sl='+sl).fadeIn("fast");
        }, 1000);

      }
      function show_data_tbl()
      {
        var course = $("#course_id").val();
        var depart = $("#department_id").val();

        $('#data_auto_load').html("<strong>Loading...</strong>").fadeIn("fast");
        setTimeout(function(){
        $('#data_auto_load').load('data-table-load.php?course='+course+'&depart='+depart).fadeIn("fast");
      }, 1000);

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
                        <h1 class="page-header"><i class="fa fa-search fa-fw"></i>Search Employees</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-eye fa-fw"></i>Search Employee
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <form class="" role="form" id="stud_search" name="stud_search">
                                                <!--1st Part-->
                                                <div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label>Course <font style="color:red">*</font></label>
                                                      <select onchange="show_depart(this.value)" class="form-control" name="course_id" id="course_id">
                                                        <option value="">---Select---</option>
                                                        <?php
                                                          $get_all_course=mysqli_query($conn,"SELECT * FROM course_tbl");
                                                          while($row_all_course=mysqli_fetch_array($get_all_course))
                                                            {
                                                              $sl=$row_all_course['sl'];
                                                              $course_name=$row_all_course['course_name'];
                                                        ?>
                                                          <option value="<?php echo $sl; ?>"><?php echo $course_name; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                      </select>
                                                  </div>
                                                </div>
                                                <!--1st Part-->
                                                <!--2nd Part-->
                                                <div class="col-lg-6">
                                                  <div class="form-group" id="auto_load">
                                                      <label>Department <font style="color:red">*</font></label>
                                                      <select class="form-control" name="department_id" id="department_id">
                                                          <option value="">---Select---</option>
                                                      </select>
                                                  </div>
                                                </div>
                                                <!--2nd Part-->
                                                <!--Full Part Button col 12-->
                                                <div class="col-lg-12">
                                                    <div class="form-group" style="text-align: right;">
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                        <button type="button" class="btn btn-primary" onclick="show_data_tbl();" name="emp_search_submit" id="emp_search_submit">Search</button>
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
                    <div class="col-lg-12" id="data_auto_load">
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
    <script src="student-search-js/student-search.js"></script>
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
