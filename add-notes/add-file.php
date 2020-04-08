<?php 
include "../config.php";


    $sl=$_REQUEST['sl'];
   
 ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">ADD FILES</h4>
        </div>
        <form class="" id="add_file_frm" name="add_file_frm" method="POST" action="add-file-code/add-file-code.php" enctype="multipart/form-data">
        <div class="modal-body">
           <div class="row stu-photo-form text-center">
                <div class="col-md-12">
                </div>
                <input type="hidden" name="sl" id="sl" value="<?php echo $sl;?>" >
                <div class="col-md-12 col-sm-offset-4">
                    <br>
                    <div class="form-group">
                         <input type='file' id="file" name="file" value="" />
                    </div>  
                </div>
                <div class="col-sm-12 text-red">
                    <b>NOTE : Upload PDF , DOC And JPG image File Only.</b>
                </div>
                <div class="col-sm-12 text-right">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" value="Upload" name="add_file" id="add_file" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
        </form>
        <div class="" id="error_id5">

        </div>
        <div class="" id="error_id6">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<script src="add-file-js/add-file.js"></script>
