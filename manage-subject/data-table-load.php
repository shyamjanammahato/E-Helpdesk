<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
$course=$_REQUEST['course'];
$depart=$_REQUEST['depart'];
$batch_id =$_REQUEST['batch_id'];
$sem_id =$_REQUEST['sem_id'];

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <script>
     function delete_fn(sl) {
         var r = confirm("Are you sure to delete ?");
         if (r == true) {
           window.location.href = "delete.php?sl="+sl;
         } else {
           return false;
         }
     }
     function deactivate(sl)
        {

          var r = confirm("Are you sure to Deactivate this Subject ?");
          if (r == true) {
            window.location.href = "deactivate.php?sl="+sl;
          } else {
            return false;
          }
        }
        function activate(sl)
           {

             var r = confirm("Are you sure to activate this Subject ?");
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
                <i class="fa fa-search"></i> View Subjects
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Course</th>
                            <th>Department</th>
                            <th>Batch</th>
                            <th>Sem</th>
                            <th>Subject Name</th>
                            <th>Subject code</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                          <tr class="">
                          <?php
                            $scl=0;
                            $get_sub=mysqli_query($conn,"SELECT * FROM subject_tbl where course_id='$course' and depart_id='$depart' and batch_id='$batch_id' and sem_id='$sem_id' ");
                            while($row_sub=mysqli_fetch_array($get_sub))
                            {
                              $scl++;
                              $sl=$row_sub['sl'];
                              $sub_name=$row_sub['subject_nm'];
                              $sub_code=$row_sub['subject_code'];
                              $stat=$row_sub['stat'];

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
                              $get_batch=mysqli_query($conn,"SELECT * FROM academic_yr where sl='$batch_id' and stat='1' ");
                              while($row_batch=mysqli_fetch_array($get_batch))
                              {
                                $stud_batch=$row_batch['acad_yr'];
                              }
                              $get_sem=mysqli_query($conn,"SELECT * FROM semester_tbl where sl='$sem_id' and stat='1' ");
                              while($row_sem=mysqli_fetch_array($get_sem))
                              {
                                $sem=$row_sem['sem'];
                              }
                            ?>
                            <td><?php echo $scl; ?></td>
                            <td>
                              <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="edit-subject.php?sl=<?php echo base64_encode($sl);?>">Edit</a></li>
                                    <li><a href="javascript:void(0);" onclick="delete_fn('<?php echo base64_encode($sl);?>')">Delete</a></li>
                                    <?php
                                    //for intro page background
                                    if($stat=='1')
                                      {
                                    ?>
                                       <li><a href="javascript:void(0);" onclick="deactivate('<?php echo $sl;?>')">Deactivate</a></li>
                                    <?php
                                       }
                                       else
                                       {
                                    ?>
                                        <li><a href="javascript:void(0);" onclick="activate('<?php echo $sl;?>');">Activate</a></li>
                                    <?php # code...
                                       }
                                       //end intro page background
                                    ?>
                                </ul>
                              </div>
                            </td>
                            <td><?php echo $course_code; ?></td>
                            <td><?php echo $depart_code; ?></td>
                            <td><?php echo $stud_batch; ?></td>
                            <td><?php echo $sem; ?></td>
                            <td><?php echo $sub_name; ?></td>
                            <td><?php echo $sub_code; ?></td>
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
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
