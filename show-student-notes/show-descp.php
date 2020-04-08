<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $sl=$_REQUEST['sl'];
    $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where sl='$sl' ");
    if($row_sem=mysqli_fetch_array($get_file))
    {
        $topic_descp=base64_decode($row_sem['topic_descp']);
        $topic_nm=$row_sem['topic_nm'];
        $teacher_id=$row_sem['teacher_id'];
        $edt=$row_sem['edt'];
    }
    $get_teacher_name=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$teacher_id' and stat='1' ");
    if($row_name=mysqli_fetch_array($get_teacher_name))
    {
        $name=$row_name['full_nm'];
        $name1=strtoupper($name);
    }
 ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $topic_nm;?></h4>
        </div>
        <div class="modal-body">
           <div class="row stu-photo-form text-center">
                <div class="col-lg-12">
                	 <?php echo $topic_descp;?> 
                </div>
           </div>
        </div>
    <div class="modal-footer">
        <div align="left"><font color="blue"><strong><?php echo "UPLOADED BY ".''.$name1.' ON '.$edt;?></strong></font></div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

    </div>
</div>