<?php
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $post_sl=base64_decode(base64_decode($_REQUEST['post_sl']));
    $query=mysqli_query($conn,"SELECT * FROM post_question where sl='$post_sl' and p_stat='0' ");
    if($row=mysqli_fetch_array($query))
    {
        $file=$row['file'];
        $question=base64_decode($row['post_question']);
    }
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $question;?></h4>
        </div>
        <div class="modal-body">
           <div class="row stu-photo-form text-center">
                <div class="col-md-12">
                	 <img class="center-block img-square img-responsive" src="../files/ask-question/<?php echo $file;?>.jpg" style="width:900px;height:700px;">
                </div>
           </div>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

    </div>
</div>
