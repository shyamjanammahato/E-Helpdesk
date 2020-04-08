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

    <title>Add Employee - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
    function show_depart(sl)
    {
      $('#auto_load').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading departments' class='form-control' disabled></strong>").fadeIn("fast");
      setTimeout(function(){
        $('#auto_load').load('depart-load.php?sl='+sl).fadeIn("fast");
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
                        <h2 class="page-header"><i class="fa fa-plus-square fa-fw"></i>Add Employee</h2>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                      <i class="fa fa-edit fa-fw"></i>Personal Details
                                    </div>
                                    <div class="panel-body">
                                       <form class="" role="form" id="emp_adm" name="emp_adm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        <div class="row">
                                                <!--1st Part-->
                                                <div class="col-lg-4">
                                                     <div class="form-group">
                                                        <label>Full Name <font style="color:red">*</font></label>
                                                        <input class="form-control" id="emp_nm" name="emp_nm">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Gender <font style="color:red">*</font></label>
                                                        <select class="form-control" name="emp_gender" id="emp_gender">
                                                          <option value="">----Select-----</option>
                                                          <option value="Male">Male</option>
                                                          <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Course <font style="color:red">*</font></label>
                                                        <select onchange="show_depart(this.value)" class="form-control" name="emp_course_id" id="emp_course_id">
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
                                                <div class="col-lg-4">
                                                  <div class="form-group">
                                                        <label>Mobile No. <font style="color:red">*</font></label>
                                                        <input class="form-control" id="emp_mob_no" name="emp_mob_no" maxlength="10">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date of Birth<font style="color:red">*</font></label>
                                                        <input class="form-control" type="text" id="emp_dob" name="emp_dob">
                                                    </div>
                                                    <div class="form-group" id="auto_load">
                                                        <label>Department <font style="color:red">*</font></label>
                                                        <select class="form-control" name="emp_department_id" id="emp_department_id" >
                                                            <option value="">---Select---</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--2nd Part-->
                                                <!--3rd Part-->
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Email/Login ID <font style="color:red">*</font></label>
                                                        <input class="form-control" type="email" id="emp_email" name="emp_email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Enroll Date <font style="color:red">*</font></label>
                                                        <input class="form-control" value="<?php echo date('d/m/y');?>" readonly>
                                                    </div>
                                                </div>
                                                <!--3rd Part-->
                                                <!--Full Part Button col 12-->
                                                <div class="col-lg-12">
                                                    <div class="form-group" style="text-align: right;">
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                        <button type="submit" class="btn btn-primary" name="emp_adm_frm" id="emp_adm_frm">Submit</button>
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
                                    <i class="fa fa-search"></i> View Created Employee
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
                                                  <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <tr class="">
                                              <?php
                                                $scl=0;
                                                $get_name=mysqli_query($conn,"SELECT * FROM  login_tbl,user_details where login_tbl.u_id=user_details.unique_id and user_details.user_type='2' ");
                                                while($row_name=mysqli_fetch_array($get_name))
                                                {
                                                  $scl++;
                                                  $sl=$row_name['sl'];
                                                  $name=$row_name['full_nm'];
                                                  $unique_id=$row_name['unique_id'];
                                                  $pass=base64_decode($row_name['pass']);
                                                  $course_id=$row_name['course_id'];
                                                  $depart_id=$row_name['depart_id'];
                                                  $email1=$row_name['mail_id'];
                                                  $stat=$row_name['stat'];

                                                  $get_course=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course_id' and stat='1' ");
                                                  while($row_course=mysqli_fetch_array($get_course))
                                                  {
                                                    $course_code=$row_course['course_code'];
                                                  }
                                                  $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$depart_id' and stat='1' ");
                                                  while($row_depart=mysqli_fetch_array($get_depart))
                                                  {
                                                    $depart_code=$row_depart['depart_code'];
                                                  }
                                                ?>
                                                <td><?php echo $scl; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $unique_id; ?></td>
                                                <td><?php echo $email1; ?></td>
                                                <td><?php echo $pass; ?></td>
                                                <td><?php echo $course_code; ?></td>
                                                <td><?php echo $depart_code; ?></td>
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
                </div>
        </div>
        <!-- Main Page Content -->
    </div>
    <!-- /#wrapper -->

    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <script src="add-employee-js/add-employee.js"></script>
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
        $('#emp_dob').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
        });   
      });
    </script>
    <!--JavascriptsLink-->
</body>
</html>
