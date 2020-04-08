$(function() {

 $('#update_dtl').click(function(event) {

    event.preventDefault();

    var user_nm = $('#user_nm').val();
    var u_id = $('#u_id').val();
    var user_gender = $('#user_gender').val();
    var user_dob = $('#user_dob').val();
    var user_mob_no = $('#user_mob_no').val();
    var user_course_id = $('#user_course_id').val();
    var stud_roll = $('#stud_roll').val();
    var user_department_id = $('#user_department_id').val();
    var stud_reg_no = $('#stud_reg_no').val();
    var stud_adm_dt = $('#stud_adm_dt').val();
    var stud_batch = $('#stud_batch').val();
    var stud_sem = $('#stud_sem').val();
    var u_type = $('#u_type').val();

    var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (user_nm=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Full Name.</div>").fadeIn("fast");
      }, 1000);
    }
    else if (user_mob_no=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Mobile Number.</div>").fadeIn("fast");
      }, 1000);
    }
    else if (!/^\d{10}$/.test(user_mob_no))
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Valid Mobile Number.</div>").fadeIn("fast");
      }, 1000);
    }
    else if (user_gender=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Gender.</div>").fadeIn("fast");
      }, 1000);
    }
    else if(user_dob=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Date of Birth.</div>").fadeIn("fast");
      }, 1000);
    }
    else if (stud_adm_dt=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Admission Date.</div>").fadeIn("fast");
      }, 1000);
    }
    else if (user_course_id=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Course.</div>").fadeIn("fast");
      }, 1000);
    }
    else if (user_department_id=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Department.</div>").fadeIn("fast");
      }, 1000);
    }
    else if (stud_batch=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Batch.</div>").fadeIn("fast");
      }, 1000);
    }
    else if (stud_roll=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Roll No.</div>").fadeIn("fast");
      }, 1000);
    }
    else if (stud_reg_no=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Registration No.</div>").fadeIn("fast");
      }, 1000);
    }
    else if (stud_sem=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Semester.</div>").fadeIn("fast");
      }, 1000);
    }
    else
    {
      $.ajax({
      type: 'POST',
      url: 'edit-user-code/edit-user.php',
      data: ({ u_id: u_id , user_nm: user_nm , user_gender: user_gender , user_dob: user_dob , user_mob_no: user_mob_no , user_course_id: user_course_id , stud_roll: stud_roll , user_department_id: user_department_id , stud_reg_no: stud_reg_no , stud_batch: stud_batch , stud_sem: stud_sem , u_type: u_type }),
      success: function(response) {
      if(response == "2")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Mobile Number registered with other user.</div>").fadeIn("fast");
        }, 1000);
      }
      else if(response == "3")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Invalid Roll Number.</div>").fadeIn("fast");
        }, 1000);
      }
      else if(response == "4")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Invalid Registration  Number.</div>").fadeIn("fast");
        }, 1000);
      }
      else if(response == "1")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Information updated Successfully.</div>").fadeIn("fast");
        }, 1000);
        setTimeout(function(){
         $("#error_id1").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Close and Reload the Page.</div>").fadeIn("fast");
        }, 1000);
      }
      else
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Unknown Error.</div>").fadeIn("fast");
        }, 1000);
      }
      }
      });
    }
  });
});
