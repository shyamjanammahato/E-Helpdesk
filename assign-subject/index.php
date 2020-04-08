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

    <title>Assign Subject - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
      function del_doc(sl)
      {
        var r = confirm("Are you sure to delete ?");
        if (r == true) 
        {
          window.location.href = "delete-doc.php?sl="+sl;
        } 
        else 
        {
          return false;
        }
      }
      function show_depart(sl)
      {
        $('#auto_load').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading Departments' class='form-control' disabled></strong>").fadeIn("fast");
        $('#sem_load').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading Semester' class='form-control' disabled></strong>").fadeIn("fast");
        setTimeout(function(){
          $('#auto_load').load('depart-load.php?sl='+sl).fadeIn("fast");
          $('#sem_load').load('sem-load.php?sl='+sl).fadeIn("fast");
        }, 1000);

      }
      function show_sub_by_sem(sem)
      {
        var depart = document.getElementById("department_id").value;
        var course = document.getElementById("course_id").value;
        $('#sub_load').html("<strong><label>Loading...</label><br><input type='text' placeholder='Loading Subjects' class='form-control' disabled></strong>").fadeIn("fast");
        setTimeout(function(){
          $('#sub_load').load('load-sub.php?sem='+sem+'&course='+course+'&depart='+depart).fadeIn("fast");
        }, 1000);
      }
      function show_teacher(sl)
      {
        $('#teacher_load').html("<strong><label>Loading...</label><br><input type='text' placeholder='Loading Teacher' class='form-control' disabled></strong>").fadeIn("fast");
        setTimeout(function(){
          $('#teacher_load').load('load-teacher.php?sl='+sl).fadeIn("fast");
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
                        <h1 class="page-header"><i class="fa fa-book fa-fw"></i>Assign Subject</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-edit fa-fw"></i>Assign Subject Form
                                    </div>
                                    <div class="panel-body">
                                            <form class="" role="form" id="assign_subject" name="assign_subject">
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
                                                      <select class="form-control" name="department_id" id="department_id" >
                                                          <option value="">---Select---</option>
                                                      </select>
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="form-group" id="sem_load">
                                                      <label>Sem <font style="color:red">*</font></label>
                                                      <select class="form-control" name="sem_id" id="sem_id" onchange="show_sub_by_sem(this.value);">
                                                          <option value="">---Select---</option>
                                                      </select>
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="form-group" id="sub_load">
                                                      <label>Subjects <font style="color:red">*</font></label>
                                                      <select class="form-control" name="subjects" id="subjects">
                                                          <option value="">----Subjects----</option>
                                                      </select>
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <label>Teacher's Mobile Number <font style="color:red">*</font></label>
                                                  <div class="form-group input-group">
                                                    <span class="input-group-addon">+91</span>
                                                    <input type="text" onchange="show_teacher(this.value)" class="form-control" placeholder="Mobile Number" name="mobile" id="mobile" maxlength="10">
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="form-group" id="teacher_load">
                                                      <label>Select Teacher <font style="color:red">*</font></label>
                                                      <select class="form-control" name="teacher_id" id="teacher_id">
                                                        <option value="">---Select---</option>
                                                      </select>
                                                  </div>
                                                </div>
                                                <!--2nd Part-->
                                                <!--Full Part Button col 12-->
                                                <div class="col-lg-12">
                                                    <div class="form-group" style="text-align: right;">
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                        <button type="button" class="btn btn-primary" name="assign_subject_submit" id="assign_subject_submit">Submit</button>
                                                    </div>
                                                </div>
                                                <!--Full Part Button col 12-->
                                            </form>
                                        </div>
                                        <div class="panel-footer" style="background:white">
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
                                    <i class="fa fa-search"></i> View Assigned Subjects
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                  <th>#</th>
                                                  <th>Teacher</th>
                                                  <th>Id</th>
                                                  <th>Email/Login-Id</th>
                                                  <th>Course</th>
                                                  <th>Department</th>
                                                  <th>Semester</th>
                                                  <th>Subjects</th>
                                                  <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              
                                              <?php
                                                $scl=0;
                                                $get_name=mysqli_query($conn,"SELECT * FROM assign_subject order by sl ");
                                                while($row_name=mysqli_fetch_array($get_name))
                                                {
                                                  $scl++;
                                                  $ass_teac_sl=$row_name['sl'];
                                                  $teacher_id=$row_name['teacher_id'];
                                                  $sem_id=$row_name['sem_id'];
                                                  $course_id=$row_name['course_id'];
                                                  $depart_id=$row_name['depart_id'];
                                                  $subjects=$row_name['subjects'];
                                                  $stat=$row_name['stat'];

                                                $get_query1=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$teacher_id' and stat='1' ");
                                                  if($row_query1=mysqli_fetch_array($get_query1))
                                                  {
                                                    $name=$row_query1['full_nm'];
                                                    $teacher_mail=$row_query1['mail_id'];
                                                  }
                                                  $get_sub=mysqli_query($conn,"SELECT * FROM subject_tbl where sl='$subjects' and stat='1' ");
                                                  if($row_sub=mysqli_fetch_array($get_sub))
                                                  {
                                                    $sub_nm=$row_sub['subject_nm'];
                                                  }
                                                  $get_course=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course_id' and stat='1' ");
                                                  if($row_course=mysqli_fetch_array($get_course))
                                                  {
                                                    $course_code=$row_course['course_code'];
                                                  }
                                                  $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$depart_id' and stat='1' ");
                                                  if($row_depart=mysqli_fetch_array($get_depart))
                                                  {
                                                    $depart_code=$row_depart['depart_code'];
                                                  }
                                                  $get_sem=mysqli_query($conn,"SELECT * FROM semester_tbl where sl='$sem_id' and stat='1' ");
                                                  if($row_sem=mysqli_fetch_array($get_sem))
                                                  {
                                                    $stud_sem=$row_sem['sem'];
                                                  }
                                                ?>
                                                <tr class="">
                                                <td><?php echo $scl; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $teacher_id; ?></td>
                                                <td><?php echo $teacher_mail; ?></td>
                                                <td><?php echo $course_code; ?></td>
                                                <td><?php echo $depart_code; ?></td>
                                                <td><?php echo $stud_sem; ?></td>
                                                <td><?php echo $sub_nm; ?></td>
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
                </div>
        <!-- Main Page Content -->
    <!-- /#wrapper -->

    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <!--<script src="add-subject-js/add-subject.js">-->
    </script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <!--JavascriptsLink-->
    <script src="assign-subject-js/assign-subject.js"></script>
</body>

</html>
