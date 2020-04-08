<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $unique_id=$_REQUEST['unique_id'];
   echo $unique_id;
   	$ss=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$unique_id' ");
 	while($yy=mysqli_fetch_array($ss))
    {
     $pic=$yy['dp_pic'];
 	}
    echo $pic;
 ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Profile Photo</h4>
        </div>
        <div class="modal-body">
           <div class="row stu-photo-form text-center">
                <div class="col-md-12">
                	 <img class="center-block img-circle img-thumbnail img-responsive" src="../images/user_image/<?php echo $pic;?>.jpg" style="width:350px;height:350px""> 
                </div>
           </div>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

    </div>
</div>