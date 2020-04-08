<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
  $get_sl=$_REQUEST['sl'];
  $sl=base64_decode($get_sl);

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

    <title>Subject - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
      function show_depart(sl)
      {
        $('#auto_load').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading Departments' class='form-control' disabled></strong>").fadeIn("fast");
        $('#auto_load1').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading Batch' class='form-control' disabled></strong>").fadeIn("fast");
        $('#sem_load').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading Semester' class='form-control' disabled></strong>").fadeIn("fast");
        setTimeout(function(){
          $('#auto_load').load('depart-load.php?sl='+sl).fadeIn("fast");
          $('#auto_load1').load('academic-yr-load.php?sl='+sl).fadeIn("fast");
          $('#sem_load').load('sem-load.php?sl='+sl).fadeIn("fast");
        }, 1000);

      }
      function show_data_tbl()
      {
        var course = $("#course_id").val();
        var depart = $("#department_id").val();
        var batch = $("#batch").val();

        $('#data_auto_load').html("<strong>Loading...</strong>").fadeIn("fast");
        setTimeout(function(){
        $('#data_auto_load').load('data-table-load.php?course='+course+'&depart='+depart+'&batch='+batch).fadeIn("fast");
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
                        <h1 class="page-header"><i class="fa fa-book fa-fw"></i>Edit Subject</h1>
                        <div class="row">
                        <?php
                            $scl=0;
                            $get_name=mysqli_query($conn,"SELECT * FROM subject_tbl where sl='$sl' ");
                            if($row_name=mysqli_fetch_array($get_name))
                            {
                                $scl++;
                                $sl=$row_name['sl'];
                                $course=$row_name['course_id'];
                                $depart=$row_name['depart_id'];
                                $sem=$row_name['sem_id'];
                                $batch=$row_name['batch_id'];
                                $subject_nm=$row_name['subject_nm'];
                                $subject_code=$row_name['subject_code'];

                                $get_course=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course' and stat='1' ");
                                if($row_course=mysqli_fetch_array($get_course))
                                {
                                    $course_name=$row_course['course_name'];
                                }
                                $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$depart' and stat='1' ");
                                if($row_depart=mysqli_fetch_array($get_depart))
                                {
                                    $depart_nm=$row_depart['depart_nm'];
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
                            }
                            ?>
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-edit fa-fw"></i>Subject Form
                                    </div>
                                    <div class="panel-body">
                                            <form class="" role="form" id="edit_subject_frm" name="edit_subject_frm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                <!--1st Part-->
                                                <div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label>Course <font style="color:red">*</font></label>
                                                      <select onchange="show_depart(this.value)" class="form-control" name="course_id" id="course_id">
                                                        <option value="">---Select---</option>
                                                          <?php
                                                            $get_course1=mysqli_query($conn,"SELECT * FROM course_tbl ");
                                                            while($row_course1=mysqli_fetch_array($get_course1))
                                                            {
                                                                $course_id_all=$row_course1['sl'];
                                                                $course_name_all=$row_course1['course_name'];
                                                            ?>
                                                                <option value="<?php echo $course_id_all;?>" <?php echo ($course_id_all == $course) ? 'selected' : '';?>><?php echo $course_name_all;?></option>

                                                            <?php  
                                                            }
                                                            ?>
                                                      </select>
                                                </div>
                                              </div>
                                              <input type="hidden" name="sl1" id="sl1" value="<?php echo $sl; ?>">
                                                <!--1st Part-->
                                                <!--2nd Part-->
                                                <div class="col-lg-6">
                                                  <div class="form-group" id="auto_load">
                                                      <label>Department <font style="color:red">*</font></label>
                                                      <select class="form-control" name="department_id" id="department_id">
                                                          <option value="<?php echo $depart;?>"><?php echo $depart_nm;?></option>
                                                      </select>
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="form-group" id="sem_load">
                                                      <label>Sem <font style="color:red">*</font></label>
                                                      <select class="form-control" name="sem_id" id="sem_id">
                                                          <option value="<?php echo $sem;?>"><?php echo $stud_sem;?></option>
                                                      </select>
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="form-group" id="auto_load1">
                                                      <label>Batch <font style="color:red">*</font></label>
                                                      <select class="form-control" name="batch_id" id="batch_id">
                                                          <option value="<?php echo $batch;?>"><?php echo $stud_batch;?></option>
                                                      </select>
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="form-group" id="">
                                                      <label>Subject Name <font style="color:red">*</font></label>
                                                      <input class="form-control" type="text" name="subject_nm" id="subject_nm" value="<?php echo $subject_nm;?>">
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="form-group" id="">
                                                      <label>Subject Code <font style="color:red">*</font></label>
                                                      <input class="form-control" type="text" name="subject_code" id="subject_code" value="<?php echo $subject_code;?> ">
                                                  </div>
                                                </div>
                                                <!--2nd Part-->
                                                <!--Full Part Button col 12-->
                                                <div class="col-lg-12">
                                                    <div class="form-group" style="text-align: right;">
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                        <button type="button" class="btn btn-primary" name="edit_subject_submit" id="edit_subject_submit">Submit</button>
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
                    </div>
                  </div>
                </div>
        <!-- Main Page Content -->
    <!-- /#wrapper -->

    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <script src="edit-subject-js/edit-subject.js">
    </script>
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
