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

    <title>Add Student - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
    function show_depart(sl)
    {
      $('#auto_load').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading departments' class='form-control' disabled></strong>").fadeIn("fast");
      $('#auto_load1').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading batch' class='form-control' disabled></strong>").fadeIn("fast");
      $('#load_sem').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading Semesters' class='form-control' disabled></strong>").fadeIn("fast");
      setTimeout(function(){
        $('#auto_load').load('depart-load.php?sl='+sl).fadeIn("fast");
        $('#auto_load1').load('academic-yr-load.php?sl='+sl).fadeIn("fast");
        $('#load_sem').load('load-sem.php?sl='+sl).fadeIn("fast");
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
                        <h2 class="page-header"><i class="fa fa-plus-square fa-fw"></i>Add Student</h2>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                      <i class="fa fa-edit fa-fw"></i>Personal Details
                                    </div>
                                    <div class="panel-body">
                                       <form class="" role="form" id="stud_adm_frm1" name="stud_adm_frm1" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        <div class="row">
                                                <!--1st Part-->
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Full Name <font style="color:red">*</font></label>
                                                        <input class="form-control" id="stud_nm" name="stud_nm">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Gender <font style="color:red">*</font></label>
                                                        <select class="form-control" name="stud_gender" id="stud_gender">
                                                          <option value="">----Select-----</option>
                                                          <option value="Male">Male</option>
                                                          <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Course <font style="color:red">*</font></label>
                                                        <select onchange="show_depart(this.value)" class="form-control" name="stud_course_id" id="stud_course_id">
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
                                                    <div class="form-group">
                                                        <label>Roll Number <font style="color:red">*</font></label>
                                                        <input class="form-control" id="stud_roll" name="stud_roll">
                                                    </div>
                                                </div>
                                                <!--1st Part-->
                                                <!--2nd Part-->
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Email/Login ID <font style="color:red">*</font></label>
                                                        <input class="form-control" type="email" id="stud_email" name="stud_email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date of Birth<font style="color:red">*</font></label>
                                                        <input class="form-control" type="text" id="stud_dob" name="stud_dob">
                                                    </div>
                                                    <div class="form-group" id="auto_load">
                                                        <label>Department <font style="color:red">*</font></label>
                                                        <select class="form-control" name="stud_department_id" id="stud_department_id">
                                                            <option value="">---Select---</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Registration Number <font style="color:red">*</font></label>
                                                        <input class="form-control" id="stud_reg_no" name="stud_reg_no">
                                                    </div>
                                                </div>
                                                <!--2nd Part-->
                                                <!--3rd Part-->
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Mobile No. <font style="color:red">*</font></label>
                                                        <input class="form-control" id="stud_mob_no" name="stud_mob_no" maxlength="10">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Admission Date <font style="color:red">*</font></label>
                                                        <input class="form-control" type="text" id="stud_adm_dt" name="stud_adm_dt">
                                                    </div>
                                                    <div class="form-group" id="auto_load1">
                                                        <label>Batch <font style="color:red">*</font></label>
                                                        <select class="form-control" name="stud_batch" id="stud_batch">
                                                            <option value="">---Select---</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="load_sem">
                                                        <label>Semester <font style="color:red">*</font></label>
                                                        <select class="form-control" name="stud_sem" id="stud_sem">
                                                            <option value="">---Select---</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="hidden" type="date" value="<?php echo date('Y-m-d'); ?>" name="stud_enrol_dt" id="stud_enrol_dt" readonly/>
                                                    </div>
                                                </div>
                                                <!--3rd Part-->
                                                <!--Full Part Button col 12-->
                                                <div class="col-lg-12">
                                                    <div class="form-group" style="text-align: right;">
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                        <button type="submit" class="btn btn-primary" name="stud_adm_frm" id="stud_adm_frm">Submit</button>
                                                    </div>
                                                </div>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <i class="fa fa-search"></i> View Created Student
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                  <th>#</th>
                                                  <th>Name</th>
                                                  <th>Id</th>
                                                  <th>Email/Login-Id</th>
                                                  <th>Password</th>
                                                  <th>Course</th>
                                                  <th>Department</th>
                                                  <th>Batch</th>
                                                  <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <tr class="">
                                              <?php
                                                $scl=0;
                                                $get_query=mysqli_query($conn,"SELECT * from user_details where user_type='3'");
                                                if($row_query=mysqli_fetch_array($get_query))
                                                {
                                                $get_name=mysqli_query($conn,"SELECT * FROM  login_tbl,user_details where login_tbl.u_id=user_details.unique_id and user_details.user_type='3' ");
                                                while($row_name=mysqli_fetch_array($get_name))
                                                {
                                                  $scl++;
                                                  $sl=$row_name['sl'];
                                                  $name=$row_name['full_nm'];
                                                  $unique_id=$row_name['unique_id'];
                                                  $pass=base64_decode($row_name['pass']);
                                                  $course=$row_name['course_id'];
                                                  $depart=$row_name['depart_id'];
                                                  $email1=$row_name['mail_id'];
                                                  $batch=$row_name['batch'];
                                                  $stat=$row_name['stat'];

                                                  $get_course=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course' and stat='1' ");
                                                  if($row_course=mysqli_fetch_array($get_course))
                                                  {
                                                    $course_code=$row_course['course_code'];
                                                  }
                                                  $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$depart' and stat='1' ");
                                                  if($row_depart=mysqli_fetch_array($get_depart))
                                                  {
                                                    $depart_code=$row_depart['depart_code'];
                                                  }
                                                  $get_batch=mysqli_query($conn,"SELECT * FROM academic_yr where sl='$batch' and stat='1' ");
                                                  if($row_batch=mysqli_fetch_array($get_batch))
                                                  {
                                                    $stud_batch=$row_batch['acad_yr'];
                                                  }
                                                ?>
                                                <td><?php echo $scl; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $unique_id; ?></td>
                                                <td><?php echo $email1; ?></td>
                                                <td><?php echo $pass; ?></td>
                                                <td><?php echo $course_code; ?></td>
                                                <td><?php echo $depart_code; ?></td>
                                                <td><?php echo $stud_batch; ?></td>
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
                                            <?php }}
                                            ?>
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
    <script src="add-student-js/add-student.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <script type="text/javascript">
      // When the document is ready
      $(document).ready(function () {  
        $('#stud_dob').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
        });
        $('#stud_adm_dt').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
        });    
      });
    </script>
    <!--JavascriptsLink-->
</body>

</html>
