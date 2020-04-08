<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
$course=$_REQUEST['course'];
$depart=$_REQUEST['depart'];
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <script>
     function deactivate(sl)
        {

          var r = confirm("Are you sure to Deactivate this account ?");
          if (r == true) {
            window.location.href = "deactivate.php?sl="+sl;
          } else {
            return false;
          }
        }
        function activate(sl)
           {

             var r = confirm("Are you sure to activate this account ?");
             if (r == true) {
               window.location.href = "activate.php?sl="+sl;
             } else {
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
                <i class="fa fa-search"></i> View Teacher
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Action</th>
                          <th>Name</th>
                          <th>Id</th>
                          <th>Email/Login-Id</th>
                          <th>Course</th>
                          <th>Department</th>
                          <th>Status</th>
                        </tr>
                    </thead>
                     <tbody>
                            <?php
                              $scl=0;
                              $get_query=mysqli_query($conn,"SELECT * from user_details where course_id='$course' and depart_id='$depart' and user_type='2'");
                              while($row_query=mysqli_fetch_array($get_query))
                              {
                              $unique_id=$row_query['unique_id'];
                              $get_name=mysqli_query($conn,"SELECT * FROM  login_tbl where u_id='$unique_id' ");
                              if($row_name=mysqli_fetch_array($get_name))
                              {
                                $scl++;
                                $sl=$row_name['sl'];
                                $name=$row_name['full_nm'];
                                $pass=base64_decode($row_name['pass']);
                                $email1=$row_name['mail_id'];
                                $stat=$row_name['stat'];
                              }
                                $get_course=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course' and stat='1' ");
                                while($row_course=mysqli_fetch_array($get_course))
                                {
                                  $course_name=$row_course['course_name'];
                                  $course_code=$row_course['course_code'];
                                }
                                $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$depart' and stat='1' ");
                                while($row_depart=mysqli_fetch_array($get_depart))
                                {
                                  $depart_name=$row_depart['depart_nm'];
                                  $depart_code=$row_depart['depart_code'];
                                }
                              ?>
                              <tr class="<?php if($stat=='1'):echo "success";else:echo "danger"; endif; ?>">
                              <td><?php echo $scl; ?></td>
                              <td>
                                <div class="btn-group">
                                  <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                  <ul class="dropdown-menu">
                                      <li><a href="../user-profile/index.php?unique_id=<?php echo base64_encode(base64_encode( base64_encode($unique_id)));?>">Edit</a></li>
                                      <?php
                                      //for intro page background
                                      if($stat=='1')
                                        {
                                      ?>
                                         <li><a href="javascript:void(0);" onclick="deactivate('<?php echo base64_encode(base64_encode(base64_encode($unique_id)));?>')">Deactivate</a></li>
                                      <?php
                                         }
                                         else
                                         {
                                      ?>
                                          <li><a href="javascript:void(0);" onclick="activate('<?php echo base64_encode(base64_encode(base64_encode($unique_id)));?>');">Activate</a></li>
                                      <?php # code...
                                         }
                                         //end intro page background
                                      ?>
                                  </ul>
                                </div>
                              </td>
                              <td><a href="../user-profile/index.php?unique_id=<?php echo base64_encode(base64_encode(base64_encode($unique_id)));?>"><?php echo $name;?></a></td>
                              <td><?php echo $unique_id;?></td>
                              <td><?php echo $email1;?></td>
                              <td><?php echo $course_code ;?></td>
                              <td><?php echo $depart_code; ?></td>
                              <td>
                                <?php
                                if($stat=='1')
                                {
                                  echo "<span class='label label-success'>ACTIVE</span>";
                                }
                                else
                                {
                                  echo "<span class='label label-danger'>DEACTIVE</span>";
                                }
                                ?>
                              </td>
                        </tr>
                        <?php }
                        ?>
                        </tbody>
                      </table>
        </div>
        <!-- Main Page Content -->
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
