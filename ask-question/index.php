<?php
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
$get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' ");
if($row_query=mysqli_fetch_array($get_query))
{
  $unique_id=$row_query['u_id'];
}
$get_query1=mysqli_query($conn,"SELECT * FROM user_details where unique_id='$unique_id' ");
if($row_query1=mysqli_fetch_array($get_query1))
{
    $sem_id=$row_query1['sem_id'];
    $course_id=$row_query1['course_id'];
}
$get_query2=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course_id' ");
if($row_query2=mysqli_fetch_array($get_query2))
{
    $course_name=$row_query2['course_name'];
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

    <title>Ask Question - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
      function delete_fn(sl) {
          var r = confirm("Are you sure to delete ?");
          if (r == true) {
            window.location.href = "delete-department.php?sl="+sl;
          } else {
            return false;
          }
      }
      function show_other(value1)
      {
        var value=escape(value1);
        $('#auto_load').html("<strong><label>Loading...</label><br><input type='text' placeholder='Loading..' class='form-control' disabled></strong>").fadeIn("fast");
        setTimeout(function(){
          $('#auto_load').load('load-other-div.php?value='+value).fadeIn("fast");
        }, 100);
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
                        <h1 class="page-header"><i class="fa fa-question-circle fa-fw"></i>Post Question</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-edit fa-fw"></i> Query Form
                                    </div>
                                    <div class="panel-body">
                                        <form class="floating-labels" id="ask_question_frm" name="ask_question_frm" method="POST" action="ask-question-code/ask-question-code.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Select Department <font style="color:red">*</font></label>
                                                <select class="form-control" name="select_depart" id="select_depart" >
                                                    <option value="">----Select----</option>
                                                    <?php
                                                        $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where course_id='$course_id' and stat='1' ");
                                                        while($row_depart=mysqli_fetch_array($get_depart))
                                                        {
                                                            $depart_nm=$row_depart['depart_nm'];
                                                            $depart_id=$row_depart['sl'];
                                                    ?>
                                                            <option value="<?php echo $depart_id;?>"><?php echo $depart_nm;?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id;?>">
                                            <div class="form-group">
                                                <label>Select Subject <font style="color:red">*</font></label>
                                                <select class="form-control" name="select_sub" id="select_sub" onchange="show_other(this.value)";>
                                                    <option value="">----Select----</option>
                                                    <?php
                                                        $get_details=mysqli_query($conn,"SELECT * FROM user_details where unique_id='$u_id' ");
                                                        if($row_details=mysqli_fetch_array($get_details))
                                                        {
                                                            $course=$row_details['course_id'];
                                                            $depart=$row_details['depart_id'];
                                                            $sem_id=$row_details['sem_id'];
                                                        }
                                                        $get_sub=mysqli_query($conn,"SELECT * FROM subject_tbl where course_id='$course' and depart_id='$depart' and sem_id='$sem_id' ");
                                                        while($row_sub=mysqli_fetch_array($get_sub))
                                                        {
                                                            $subject_sl=$row_sub['sl'];
                                                            $sub_name=$row_sub['subject_nm'];
                                                    ?>
                                                            <option value="<?php echo $subject_sl;?>"><?php echo $sub_name;?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                        <option value="0">Others</option>
                                                    <?php
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group" id="auto_load">
                                            </div>
                                            <div class="form-group">
                                                <label>Question<font style="color:red">*</font></label>
                                                <textarea class="form-control" rows="4" name="question" id="question"></textarea>
                                                <label><font style="color:black">*You can also upload Image of Your Question.</font></label>
                                            </div>
                                            <div class="form-group">
                                                <label>File</label>
                                                <input type="file" class="form-control" name="file" id="file">
                                                <label><font style="color:black">*</font>File is not Mandatory.</label>
                                            <div class="form-group" style="text-align: right;">
                                                <button type="reset" class="btn btn-default">Reset</button>
                                                <button type="submit" class="btn btn-primary" name="ask_question" id="ask_question">Submit</button>
                                            </div>
                                        </form>
                                        <div class="" id="error_id5">

                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>

            <!--Data table-->
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-search"></i> View Posted Queries
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department</th>
                                        <th>Subject</th>
                                        <th>Question</th>
                                        <th>File</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                      <?php
                                        $scl=0;
                                        $get_all=mysqli_query($conn,"SELECT * FROM post_question where u_id='$id1' order by sl desc ");
                                        while($row_all=mysqli_fetch_array($get_all))
                                          {
                                            $scl++;
                                            $sl=$row_all['sl'];
                                            $p_depart_id=$row_all['p_depart_id'];
                                            $p_sub=$row_all['p_sub'];
                                            $p_sub_others=$row_all['p_sub_others'];
                                            $post_question=base64_decode($row_all['post_question']);
                                            $file=$row_all['file'];
                                            $stat=$row_all['p_stat'];

                                            $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$p_depart_id' ");
                                            if($row_depart=mysqli_fetch_array($get_depart))
                                            {
                                              $depart_code=$row_depart['depart_code'];
                                            }
                                            $get_sub=mysqli_query($conn,"SELECT * FROM subject_tbl where sl='$p_sub' ");
                                            if($row_sub=mysqli_fetch_array($get_sub))
                                            {
                                              $subject_nm=$row_sub['subject_nm'];
                                            }
                                      ?>
                                      <tr class="">
                                        <td><?php echo $scl;?></td>
                                        <td><?php echo $depart_code ?></td>
                                        <?php
                                            if($p_sub=='0')
                                            {
                                        ?>
                                            <td><?php echo $p_sub_others;?></td>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                            <td><?php echo $p_sub;?></td>
                                        <?php
                                            }
                                         ?>
                                         </td>
                                        <td><?php echo $post_question ?></td>
                                        <td>
                                        <?php
                                            if($file=='null' || $file==0)
                                            {
                                                echo "No File";
                                            }
                                            else
                                            {
                                        ?>
                                                <img src="../files/ask-question/<?php echo $file;?>.jpg" alt=" " height="80" width="100" onclick="show_pdf('<?php echo basename($file);?>')"><?php echo basename($file);?>
                                        <?php
                                            }
                                         ?>
                                         </td>
                                        <td class="center">
                                        <?php
                                            if($stat=='0')
                                            {
                                                echo "<span class='label label-success'>Posted</span>";
                                            }
                                            else if($stat=='2')
                                            {
                                                echo "<span class='label label-danger'>Deleted by Admin</span>";
                                            }
                                        ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                    </div>
                    <!-- Main Page Content -->
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>
    <!-- /#wrapper -->
    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <!--JavascriptsLink-->
    <script src="ask-question-js/ask-question.js"></script>
</body>

</html>
