<?php 
    include "../config.php";
    $to_update_sl=base64_decode(base64_decode($_REQUEST['sl']));

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

    <title>Notes - GIMT HelpDesk</title>
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
        $('#light_box1').load('add-file.php?u_id='+u_id+'&s_id='+s_id+'&topic='+topic1).fadeIn("fast");
        $('#lightbox_model1').modal('show');
    }
    function show_pdf(file)
    {
      window.location.href = "show-pdf.php?file="+file;
    }
    function show_doc(file)
    {
      $('#light_box1').load('show-docum.php?file='+file).fadeIn("fast");
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
                        <h1 class="page-header"><i class="fa fa-edit fa-fw"></i>Edit Notes</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-edit fa-fw"></i>Entry Forms 
                                    </div>
                                    <div class="panel-body">
                                            <form class="" role="form" id="edit_notes_frm" name="edit_notes_frm" method="post">
                                                <!--1st Part-->
                                            <?php
                                                $get=mysqli_query($conn,"SELECT * FROM uploaded_file WHERE sl='$to_update_sl' ");
                                                while($row=mysqli_fetch_array($get))
                                                {
                                                  $subject_id=$row['subject_id'];
                                                  $sem_id=$row['sem_id'];
                                                  $topic_nm=$row['topic_nm'];
                                                  $topic_descp=base64_decode($row['topic_descp']);
                                              ?>
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
                                                            }
                                                            $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$depart' and stat='1' ");
                                                            if($row_depart=mysqli_fetch_array($get_depart))
                                                            {
                                                               $depart_name=$row_depart['depart_nm'];
                                                            }
                                                                
                                                        ?>
                                                        <input type="hidden" name="update_sl" id="update_sl" value="<?php echo $to_update_sl;?>">
                                                            <label>Course <font style="color:red">*</font></label>
                                                            <input type="text" class="form-control" name="course_id" id="course_id" value="<?php echo $course_name;?>" readonly>
                                                    </div>
                                                </div>
                                                <!--1st Part-->
                                                <!--2nd Part-->
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
                                                            $get_sem1=mysqli_query($conn,"SELECT * FROM uploaded_file where sem_id='$sem1' ");
                                                              while($row_sem1=mysqli_fetch_array($get_sem1))
                                                              {
                                                                $stud_sem=$row_sem1['sem_id'];
                                                                $subject_id=$row_sem1['subject_id'];
                                                              }
                                                    ?>
                                                           <option value="<?php echo $stud_sem;?>" <?php echo ($sem1 == $stud_sem) ? 'selected' : '';?>><?php echo $sem1;?></option>
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
                                                      <?php
                                                          $get_subs=mysqli_query($conn,"SELECT * FROM subject_tbl where sl='$subject_id' and stat='1' ");
                                                          if($row_sub=mysqli_fetch_array($get_subs))
                                                          {
                                                            $aaa=$row_sub['subject_nm'];
                                                            $subject_id_new=$row_sub['sl'];
                                                      ?>
                                                          <option value="<?php echo $subject_id_new;?>" selected><?php echo $aaa;?></option>
                                                      <?php
                                                          }
                                                      ?>
                                                      </select>
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="form-group" id="">
                                                      <label>Topic Name <font style="color:red">*</font></label>
                                                      <input class="form-control" type="text" name="topic_name" id="topic_name" placeholder="Topic name or Chapter Name" value="<?php echo $topic_nm;?>">
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group" id="">
                                                      <label>Topic Description <font style="color:red">*</font></label>
                                                      <textarea class="form-control" id="descp" name="descp" placeholder="Say something about the topic."><?php echo $topic_descp;?></textarea>
                                                  </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group" style="text-align: right;">
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                        <button type="button" class="btn btn-primary" onclick="show_data_tbl();" name="edit_notes_submit" id="edit_notes_submit">Save Changes</button>
                                                    </div>
                                                </div>
                                                <!--Full Part Button col 12-->
                                                <?php } ?>
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
                <div id="lightbox_model1" class="modal fade" role="dialog">
                    <div id="light_box1">

                    </div>
                </div>
            </div>
        </div>
        <!-- Main Page Content -->
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
    <script src="add-file-js/edit-file-details.js"></script>
</body>

</html>
