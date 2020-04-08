<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $unique_id=$_REQUEST['id'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
 </head>
 <script>
    function show_depart(sl)
    {
      $('#auto_load').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading departments' class='form-control' disabled></strong>").fadeIn("fast");
      $('#auto_load1').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading batch' class='form-control' disabled></strong>").fadeIn("fast");
      $('#load_sem').html("<strong><label>Loading...</label><br><input type='input' placeholder='Loading Semesters' class='form-control' disabled></strong>").fadeIn("fast");
      setTimeout(function(){
        $('#auto_load').load('depart-load.php?sl='+sl).fadeIn("fast");
        $('#auto_load1').load('academic-yr-load.php?sl='+sl).fadeIn("fast");
        $('#load_sem').load('load-sem.php?sl='+sl).fadeIn("fast");
      }, 1000);

    }
    </script>
 <body>
 
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Update Details</h4>
        </div>
        <div class="modal-body">
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel-body">
                        <form class="" role="form" id="update_user_dtl" name="update_user_dtl" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="row">
                            <?php
                                $get_name=mysqli_query($conn,"SELECT * from user_details where unique_id='$unique_id' ");
                                if($row_name=mysqli_fetch_array($get_name))
                                {
                                    $sl=$row_name['sl'];
                                    $gender=$row_name['gender'];
                                    $dob=$row_name['dob'];
                                    $registration_no=$row_name['registration_no'];
                                    $course=$row_name['course_id'];
                                    $depart=$row_name['depart_id'];
                                    $sem=$row_name['sem_id'];
                                    $batch=$row_name['batch'];
                                    $adm_dt=$row_name['adm_dt'];
                                    $stat=$row_name['stat'];
                                    $stud_roll=$row_name['roll_no'];
                                    $edt=$row_name['edt'];
                                    $subject=$row_name['subject'];
                                    $user_type=$row_name['user_type'];
                                    $title=$row_name['title'];
                                }
                                $get_name1=mysqli_query($conn,"SELECT * from login_tbl where u_id='$unique_id' ");
                                if($row_name1=mysqli_fetch_array($get_name1))
                                {
                                    $name=$row_name1['full_nm'];
                                    $pass=base64_decode($row_name1['pass']);
                                    $email=$row_name1['mail_id'];
                                    $pass=$row_name1['pass'];
                                    $photo=$row_name1['dp_pic'];
                                    $mob=$row_name1['mob'];
                                }
                                $get_course=mysqli_query($conn,"SELECT * FROM course_tbl where sl='$course' and stat='1' ");
                                if($row_course=mysqli_fetch_array($get_course))
                                {
                                    $course_name=$row_course['course_name'];
                                }
                                $get_depart=mysqli_query($conn,"SELECT * FROM depart_tbl where sl='$depart' and stat='1' ");
                                if($row_depart=mysqli_fetch_array($get_depart))
                                {
                                    $depart_name=$row_depart['depart_nm'];
                                }
                                $get_batch=mysqli_query($conn,"SELECT * FROM academic_yr where sl='$batch' and stat='1' ");
                                if($row_batch=mysqli_fetch_array($get_batch))
                                {
                                    $stud_batch=$row_batch['acad_yr'];
                                }
                                $get_sem=mysqli_query($conn,"SELECT * FROM semester_tbl where sl='$sem' and stat='1' ");
                                if($row_sem=mysqli_fetch_array($get_sem))
                                {
                                    $stud_sem=$row_sem['sem'];
                                }
                            ?>
                            <input type="hidden" name="u_type" id="u_type" value="<?php echo $user_type;?>">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Full Name <font style="color:red">*</font></label>
                                    <input class="form-control" id="user_nm" name="user_nm" value="<?php echo $name;?>">
                                </div>
                                <div class="form-group">
                                    <label>Gender <font style="color:red">*</font></label>
                                    <select class="form-control" name="user_gender" id="user_gender">
                                        <option value="">----Select-----</option>
                                    <?php
                                        if($gender=="Male")
                                        {
                                    ?>        <option value="Male" selected="1">Male</option>
                                    ?>        <option value="Female">Female</option>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>        <option value="Female" selected="1">Female</option>
                                    ?>        <option value="Male">Male</option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Course <font style="color:red">*</font></label>
                                    <select onchange="show_depart(this.value)" class="form-control" name="user_course_id" id="user_course_id">
                                        <option value="">---Select---</option>
                                        <?php
                                        $get_course1=mysqli_query($conn,"SELECT * FROM course_tbl ");
                                        while($row_course1=mysqli_fetch_array($get_course1))
                                        {
                                            $course_id_all=$row_course1['sl'];
                                            $course_name_all=$row_course1['course_name'];
                                        ?>
                                            <option value="<?php echo $course_id_all;?>" <?php echo ($course_id_all == $course) ? 'selected' : '';?>><?php echo $course_name_all;?></option>

                                        <?php  
                                        }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                    if($user_type=='3')
                                    {
                                ?>
                                    <div class="form-group">
                                        <label>Roll Number <font style="color:red">*</font></label>
                                        <input class="form-control" id="stud_roll" name="stud_roll" value="<?php echo $stud_roll;?>">
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                <input type="hidden" name="u_id" id="u_id" value="<?php echo $unique_id;?>">
                                    <label>Email/Login ID <font style="color:red">*</font></label>
                                    <input class="form-control" type="email" id="user_email" name="user_email" value="<?php echo $email;?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth<font style="color:red">*</font></label>
                                    <input class="form-control" type="date" id="user_dob" name="user_dob" value="<?php echo $dob;?>">
                                </div>
                                <?php
                                    if($user_type=='3')
                                    {
                                ?>
                                    <div class="form-group" id="auto_load">
                                        <label>Department <font style="color:red">*</font></label>
                                        <select class="form-control" name="user_department_id" id="user_department_id">
                                            <option value="<?php echo $depart;?>"><?php echo $depart_name;?></option>
                                        </select>
                                    </div>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                    <div class="form-group" id="auto_load">
                                        <label>Department <font style="color:red">*</font></label>
                                        <select class="form-control" name="user_department_id" id="user_department_id">
                                            <option value="<?php echo $depart;?>"><?php echo $depart_name;?></option>
                                        </select>
                                    </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($user_type=='3')
                                    {
                                ?>
                                    <div class="form-group">
                                        <label>Registration Number <font style="color:red">*</font></label>
                                        <input class="form-control" id="stud_reg_no" name="stud_reg_no" value="<?php echo $registration_no;?>">
                                    </div>
                                <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="col-lg-4">
                            <?php
                                if($user_type=='3')
                                {
                            ?>
                                <div class="form-group">
                                    <label>Mobile No. <font style="color:red">*</font></label>
                                    <input class="form-control" id="user_mob_no" name="user_mob_no" value="<?php echo $mob;?>" maxlength="10">
                                </div>
                            <?php
                                }
                            ?>
                                <?php
                                    if($user_type=='3')
                                    {
                                ?>
                                    <div class="form-group">
                                        <label>Admission Date <font style="color:red">*</font></label>
                                        <input class="form-control" type="date" id="stud_adm_dt" name="stud_adm_dt" value="<?php echo $adm_dt;?>">
                                    </div>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                    <div class="form-group">
                                        <label>Mobile No. <font style="color:red">*</font></label>
                                        <input class="form-control" id="user_mob_no" name="user_mob_no" value="<?php echo $mob;?>" maxlength="10">
                                    </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($user_type=='3')
                                    {
                                ?>
                                    <div class="form-group" id="auto_load1">
                                        <label>Batch <font style="color:red">*</font></label>
                                        <select class="form-control" name="stud_batch" id="stud_batch">
                                            <option value="<?php echo $batch;?>"><?php echo $stud_batch;?></option>
                                        </select>
                                    </div>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                    <div class="form-group">
                                        <label>Designation <font style="color:red">*</font></label>
                                        <input type="text" class="form-control" name="emp_design" id="emp_design" value="<?php echo $title;?>" readonly>
                                    </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($user_type=='3')
                                    {
                                ?>
                                    <div class="form-group" id="load_sem">
                                        <label>Semester <font style="color:red">*</font></label>
                                        <select class="form-control" name="stud_sem" id="stud_sem">
                                            <option value="<?php echo $sem;?>"><?php echo $stud_sem;?></option>
                                        </select>
                                    </div>
                                <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group" style="text-align: right;">
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button type="submit" class="btn btn-primary" name="update_dtl" id="update_dtl">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="" id="error_id">

                    </div>
                    <div class="" id="error_id1">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
    <script src="edit-user-js/edit-user.js"></script>
 </body>
 </html>