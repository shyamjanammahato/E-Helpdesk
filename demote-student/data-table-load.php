<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
$course=$_REQUEST['course'];
$depart=$_REQUEST['depart'];
$batch =$_REQUEST['batch'];
$sem_id =$_REQUEST['sem'];

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <script>
    function demote(unique_id)
    {
      var r = confirm("Are you sure to demote the student ?");
      if (r == true) 
      {
        window.location.href = "demote.php?unique_id="+unique_id;
      } 
      else 
      {
        return false;
      }
    }
    </script>
 </head>
<!--Data table-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-search"></i> View Student
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Department</th>
                            <th>Batch</th>
                            <th>Semester</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                          <tbody>
                            <?php
                              $scl=0;
                              $get_query=mysqli_query($conn,"SELECT * from user_details where course_id='$course' and depart_id='$depart' and batch='$batch' and sem_id='$sem_id' and user_type='3' ");
                              while($row_query=mysqli_fetch_array($get_query))
                              {
                              $unique_id=$row_query['unique_id'];
                              $get_name=mysqli_query($conn,"SELECT * FROM  login_tbl where u_id='$unique_id' ");
                              if($row_name=mysqli_fetch_array($get_name))
                              {
                                $scl++;
                                $sl=$row_name['sl'];
                                $name=$row_name['full_nm'];
                                $unique_id=$row_name['u_id'];
                                $pass=base64_decode($row_name['pass']);
                                $email1=$row_name['mail_id'];
                                $stat=$row_name['stat'];

                                $get_course=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course' and stat='1' ");
                                if($row_course=mysqli_fetch_array($get_course))
                                {
                                  $course_name=$row_course['course_name'];
                                  $course_code=$row_course['course_code'];
                                }
                                $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$depart' and stat='1' ");
                                if($row_depart=mysqli_fetch_array($get_depart))
                                {
                                  $depart_name=$row_depart['depart_nm'];
                                  $depart_code=$row_depart['depart_code'];
                                }
                                $get_batch=mysqli_query($conn,"SELECT * FROM academic_yr where sl='$batch' and stat='1' ");
                                if($row_batch=mysqli_fetch_array($get_batch))
                                {
                                  $stud_batch=$row_batch['acad_yr'];
                                }
                                $get_sem=mysqli_query($conn,"SELECT * FROM semester_tbl where sl='$sem_id' and stat='1' ");
                                if($row_sem=mysqli_fetch_array($get_sem))
                                {
                                  $stud_sem=$row_sem['sem'];
                                }
                              ?>
                              <tr class="<?php if($stat=='1'):echo "success";else:echo "danger"; endif; ?>">
                                <td><?php echo $scl; ?></td>
                                <td>
                                  <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <?php
                                        //for intro page background
                                        if($stud_sem=='1')
                                          {
                                        ?>
                                           <li><a href="javascript:void(0);">No option</a></li>
                                        <?php
                                           }
                                           else
                                           {
                                        ?>
                                            <li><a href="javascript:void(0);" onclick="demote('<?php echo base64_encode(base64_encode(base64_encode($unique_id)));?>');">Demote</a></li>
                                        <?php # code...
                                           }
                                           //end intro page background
                                        ?>
                                    </ul>
                                  </div>
                                </td>
                                <td><a href="../stud-profile/index.php?unique_id=<?php echo base64_encode(base64_encode(base64_encode($unique_id)));?>"><?php echo $name; ?></a></td>
                                <td><?php echo $course_code ;?></td>
                                <td><?php echo $depart_name; ?></td>
                                <td><?php echo $stud_batch; ?></td>
                                <td><?php echo $stud_sem; ?></td>
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
                      </tbody> 
                    </table>
        </div>
        <!-- Main Page Content -->
    </div>
  </div>
</div>
</html>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
