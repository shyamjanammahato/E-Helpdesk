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

    <title>Video - GIMT HelpDesk</title>
    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
    function del_doc(sl)
    {
      var r = confirm("Are you sure to delete ?");
      if (r == true) 
      {
        window.location.href = "delete-file.php?sl="+sl;
      } 
      else 
      {
        return false;
      }
    }
    function load_sub(sl)
    {
      var teacher_id = $("#teacher_id").val();
      $('#sub_load').html("<strong><label>Loading...</label><br><input type='text' placeholder='Loading Subjects' class='form-control' disabled></strong>").fadeIn("fast");
      setTimeout(function(){
        $('#sub_load').load('load-sub.php?sl='+sl+'&t_id='+teacher_id).fadeIn("fast");
      }, 1000);
    }
    function show_modal(u_id,s_id,topic)
    {
      var topic1=escape(topic);
      $('#light_box1').load('add-video.php?u_id='+u_id+'&s_id='+s_id+'&topic='+topic1).fadeIn("fast");
      $('#lightbox_model1').modal('show');
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
            <h1 class="page-header"><i class="fa fa-plus-square fa-fw"></i>Add Youtube Link</h1>
              <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <i class="fa fa-edit fa-fw"></i>Entry Form
                    </div>
                    <div class="panel-body">
                    <form class="" role="form" id="add_link_frm" name="add_link_frm" method="post">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <?php
                            $get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' ");
                            if($row_query=mysqli_fetch_array($get_query))
                            {
                              $u_id=$row_query['u_id'];
                            }
                            $get_query1=mysqli_query($conn,"SELECT * FROM user_details where unique_id='$u_id' ");
                            if($row_query1=mysqli_fetch_array($get_query1))
                            {
                              $course=$row_query1['course_id'];
                              $depart=$row_query1['depart_id'];
                              $sem=$row_query1['sem_id'];
                            }
                            $get_course=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course' and stat='1' ");
                            if($row_course=mysqli_fetch_array($get_course))
                            {
                              $course_name=$row_course['course_name'];
                              $course_sl=$row_course['sl'];
                            }
                            $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$depart' and stat='1' ");
                            if($row_depart=mysqli_fetch_array($get_depart))
                            {
                              $depart_name=$row_depart['depart_nm'];
                            }        
                          ?>
                            <input type="hidden" name="teacher_id" id="teacher_id" value="<?php echo $u_id;?>">
                            <label>Course <font style="color:red">*</font></label>
                            <input type="text" class="form-control" value="<?php echo $course_name;?>" readonly>
                            <input type="hidden" class="form-control" name="course_id" id="course_id" value="<?php echo $course_sl;?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Department <font style="color:red">*</font></label>
                          <input type="text" class="form-control" name="depart_id" id="depart_id" value="<?php echo $depart_name;?>" readonly>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Sem <font style="color:red">*</font></label>
                          <select class="form-control" name="sem_id" id="sem_id" onchange="load_sub(this.value)">
                            <option value="">---Select---</option>
                              <?php
                                $get_sem=mysqli_query($conn,"SELECT distinct sem_id FROM assign_subject where teacher_id='$u_id' and stat='1' ");
                                while($row_sem=mysqli_fetch_array($get_sem))
                                {
                                  $sem1=$row_sem['sem_id'];
                                  $get_sem1=mysqli_query($conn,"SELECT * FROM semester_tbl where sl='$sem1' and stat='1' ");
                                  if($row_sem1=mysqli_fetch_array($get_sem1))
                                  {
                                    $stud_sem=$row_sem1['sem'];
                                    $sl=$row_sem1['sl'];
                                  }
                              ?>
                                  <option value="<?php echo $sl;?>"><?php echo $stud_sem;?></option>
                              <?php
                                }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group" id="sub_load">
                          <label>Subjects <font style="color:red">*</font></label>
                          <select class="form-control" name="subjects" id="subjects">
                            <option value="">---Select---</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Topic Name <font style="color:red">*</font></label>
                          <input class="form-control" type="text" name="topic_name" id="topic_name" placeholder="Topic name or Chapter Name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Video Link <font style="color:red">*</font></label>
                          <input type="text" class="form-control" id="video_link" name="video_link">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group" id="sub_load">
                          <label>Description <font style="color:red">*</font></label>
                          <textarea rows="4" class="form-control" id="descp" name="descp" placeholder="Say something about the topic"></textarea>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group" style="text-align: right;">
                          <button type="reset" class="btn btn-default">Reset</button>
                          <button type="button" class="btn btn-primary" name="add_link_submit" id="add_link_submit">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="panel-footer" style="background:white">
                    <div class="" id="error_id"></div>
                    <div class="" id="error_id1"></div>
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
                <i class="fa fa-search"></i> View Links
              </div>
              <div class="panel-body">
                <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Action</th>
                      <th>Semester</th>
                      <th>Subject</th>
                      <th>Topic Name</th>
                      <th>Link</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $scl=1;
                      $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where teacher_id='$u_id' and file_type='2' order by sl desc");
                      while($row_sem=mysqli_fetch_array($get_file))
                      {
                        $edt=$row_sem['edt'];
                        $file_sl=$row_sem['sl'];
                        $subject_id=$row_sem['subject_id'];
                        $topic_nm=$row_sem['topic_nm'];
                        $stat=$row_sem['stat'];
                        $sem_id=$row_sem['sem_id'];
                        $file=$row_sem['file'];;
                        //$ext = pathinfo($video, PATHINFO_EXTENSION);
                        $get_subs=mysqli_query($conn,"SELECT * FROM subject_tbl where sl='$subject_id' and stat='1' ");
                        if($row_sub=mysqli_fetch_array($get_subs))
                        {
                          $subj=$row_sub['subject_nm'];
                        }
                        $get_sem1=mysqli_query($conn,"SELECT * FROM semester_tbl where sl='$sem_id' and stat='1' ");
                        if($row_sem1=mysqli_fetch_array($get_sem1))
                        {
                          $stud_sem=$row_sem1['sem'];
                        }
                    ?>
                        <tr class="">
                          <td><?php echo $scl; ?></td>
                          <td>
                            <div class="btn-group">
                              <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                <li><a href="edit-notes.php?sl=<?php echo base64_encode(base64_encode($file_sl));?>">Edit</a></li>
                                <li><a href="#" onclick="del_doc('<?php echo base64_encode(base64_encode($file_sl));?>');">Delete</a></li>
                              </ul>
                            </div>
                          </td>
                          <td><?php echo $stud_sem; ?></td>
                          <td><?php echo $subj; ?></td>
                          <td><?php echo $topic_nm; ?></td>
                          <td><a href="#"><?php echo $file;?></a></td>
                          <td>
                            <?php
                              if($stat=='0')
                              {
                                echo "<span class='label label-danger'>Not Verified</span>";
                              }
                              else
                              {
                                echo "<span class='label label-success'>Verified</span>";
                              }
                            ?>  
                          </td>
                        </tr>
                    <?php
                        $scl++;
                    ?> 
                    <?php
                      }
                    ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div id="lightbox_model1" class="modal fade" role="dialog">
          <div id="light_box1"></div>
        </div>
      </div>
    </div>
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
    <script src="add-link-js/add-link-details.js"></script>
</body>

</html>
