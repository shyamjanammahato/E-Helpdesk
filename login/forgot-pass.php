<?php 
include "../config.php";
if($ck=='1')
{
    header("Location: ../dashboard/index.php");
}
?>
<div class="modal-dialog modal-xs">
    <div class="modal-content">
        <form class="" role="form" id="reset_pass" name="reset_pass" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><strong>Reset Password</strong></h4>
            </div>
            <div class="modal-body">
               <div class="row stu-photo-form text-center">
                    <div class="col-lg-3">
                        <label>Enter Email</label>
                    </div>
                    <div class="col-lg-6">
                         <input type="email" name="email" class="form-control" id="email">
                    </div>
               </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" name="reset" id="reset>Reset</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>