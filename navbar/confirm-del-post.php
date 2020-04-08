<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $post_sl=base64_decode(base64_decode($_REQUEST['post_sl']));
?>
 <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Delete Post</h4>
        </div>
        <form class="" role="form" id="delete_post" name="delete_post" method="post" action="delete-post.php">
        <div class="modal-body">
           <div class="row stu-photo-form text-center">
              <input type="hidden" name="post_sl" id="post_sl" value="<?php echo $post_sl;?>">
                <div class="col-lg-12">
                  <div class="form-group" style="text-align: center;">
                    <strong>Are You Sure you want to Delete this Post ??</strong>
                  </div>
                </div>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger" name="del_post_btn" id="del_post_btn">Delete</button>
        </div>
      </form>
    </div>
</div>
