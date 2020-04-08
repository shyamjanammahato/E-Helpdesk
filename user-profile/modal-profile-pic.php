<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $unique_id=$_REQUEST['unique_id'];
   
 ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript">
    </script>
</head>
<body>
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Update Profile Picture</h4>
        </div>
        <form class="" id="update_photo" name="update_photo" method="POST" action="photo-update-code/photo-update-code.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
           <div class="row stu-photo-form text-center">
                <div class="col-md-12">
                    <?php 
                     $get_name=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$unique_id' ");
                        while($row_name=mysqli_fetch_array($get_name))
                        {
                            $photo=$row_name['dp_pic'];
                        
                        if($photo=='null')
                        {
                    ?>
                            <img class="center-block img-circle img-thumbnail img-responsive" src="../images/user_image/default2.png" alt="No Image" style="width:100px;height:100px"> 
                    <?php
                        }
                        else
                        {
                    ?>
                           <img class="center-block img-circle img-thumbnail img-responsive" src='../images/user_image/<?php echo $photo;?>.jpg' alt='No Image' style="width:100px;height:100px"> 
                    <?php
                        }
                    }
                    ?>   
                </div>
                <input type="hidden" name="unique_id" id="unique_id" value="<?php echo $unique_id;?>" >
                <div class="col-md-12 col-sm-offset-4">
                    <br>
                    <div class="form-group">
                         <input type='file' id="file" name="file" value="" />
                    </div>  
                </div>
                <div class="col-sm-12 text-red">
                    <b>NOTE : Upload JPG and PNG image smaller than 2MB.</b>
                </div>
                <div class="col-sm-12 text-right">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" value="Upload" name="add_profile_pic" id="add_profile_pic" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
        </form>
        <div class="" id="error_id">

        </div>
        <div class="" id="error_id1">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
<script src="photo-update-js/photo-update.js"></script>
</body>
</html>
