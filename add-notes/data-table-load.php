<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
$u_id=$_REQUEST['u_id'];

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
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
<!--Data table-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-search"></i> View Uploaded Files
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Files</th>
                            <th>Subject</th>
                            <th>Topic Name</th>
                            <th>Date/Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php
                      $scl=1;
                      $cdate = date("Y-m-d h:i:s A");
                      $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where teacher_id='$u_id' order by sl desc");
                      while($row_sem=mysqli_fetch_array($get_file))
                      {
                        $file=$row_sem['file'];
                        $edt=$row_sem['edt'];
                        $sl=$row_sem['sl'];
                        $subject_id=$row_sem['subject_id'];
                        $topic_nm=$row_sem['topic_nm'];
                        $stat=$row_sem['stat'];
                        $userfile_extn = explode(".", strtolower($file));

                         $get_subs=mysqli_query($conn,"SELECT * FROM subject_tbl where sl='$subject_id' and stat='1' ");
                        if($row_sub=mysqli_fetch_array($get_subs))
                        {
                          $subj=$row_sub['subject_nm'];
                          $sl=$row_sub['sl'];
                        }
                    ?>
                      <tbody>
                        <td><?php echo $scl; ?></td>
                      <td align="center">
                        <button type="button" class="btn btn-danger btn-circle btn-lg" onclick="del_doc('<?php echo base64_encode(base64_encode($sl));?>')"><i class="fa fa-times"></i></button>
                      </td>
                    <?php
                        if($userfile_extn[5]=="pdf")
                        {
                    ?>
                          <td><img src="../files/pdflogo.png" alt=" " height="80" width="100" onclick="show_pdf('<?php echo basename($file);?>')"><?php echo basename($file);?></td>
                    <?php
                        }
                        else
                        {
                    ?> 
                        <td>
                          <img src="files/<?php echo $file;?>" alt=" " height="80" width="100" onclick="show_doc('<?php echo basename($file);?>')">
                        </td>
                    <?php
                        }
                        if($subject_id=='0')
                        {
                    ?>
                          <td><?php echo "null";?></td>
                    <?php
                        }  
                    ?>    
                          <td><?php echo $topic_nm; ?></td>
                          <td><?php echo $edt; ?></td>
                          <td>
                    <?php
                          if($stat=='-1')
                          {
                            echo "<span class='label label-danger'>Not Submitted</span>";
                          }
                          else if($stat=='0')
                          {
                            echo "<span class='label label-danger'>Submitted but Not Verified</span>";
                          }
                          else
                          {
                            echo "<span class='label label-success'>Submitted & Verified</span>";
                          }
                    ?>
                          </td>
                    <?php
                        $scl++;
                    ?> 
                    <?php
                    }
                    ?>
                    </tbody>
                      </table>
        </div>
        <!-- Main Page Content -->
    </div>
  </div>
</div>
<div id="lightbox_model1" class="modal fade" role="dialog">
        <div id="light_box1">

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
