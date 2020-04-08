<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $file=$_REQUEST['file'];
 ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">File</h4>
        </div>
        <div class="modal-body">
           <div class="row stu-photo-form text-center">
                <div class="col-lg-12">
                	 <img class="center-block img-square img-responsive" src="../files/<?php echo $file;?>" style="width:1000px;height:700px""> 
                </div>
           </div>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

    </div>
</div>