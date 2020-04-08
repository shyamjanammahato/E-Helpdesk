$(function() {

 $('#stud_adm_frm').click(function(event) {

    event.preventDefault();

    var stud_nm = $('#stud_nm').val();
    var stud_gender = $('#stud_gender').val();
    var stud_dob = $('#stud_dob').val();
    var stud_mob_no = $('#stud_mob_no').val();
    var stud_course_id = $('#stud_course_id').val();
    var stud_roll = $('#stud_roll').val();
    var stud_email = $('#stud_email').val();
    var stud_department_id = $('#stud_department_id').val();
    var stud_reg_no = $('#stud_reg_no').val();
    var stud_adm_dt = $('#stud_adm_dt').val();
    var stud_batch = $('#stud_batch').val();
    var stud_enrol_dt = $('#stud_enrol_dt').val();
    var stud_sem = $('#stud_sem').val();

    var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;


    if (stud_nm=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Full Name.</div>").fadeIn("fast");
      }, 100);
    }
    else if (stud_email=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Email Id.</div>").fadeIn("fast");
      }, 100);
    }
    else if (filter.test(stud_email) == false)
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter valid Email- Id.</div>").fadeIn("fast");
      }, 100);
    }
    else if (stud_mob_no=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Mobile Number.</div>").fadeIn("fast");
      }, 100);
    }
    else if (!/^\d{10}$/.test(stud_mob_no))
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Valid Mobile Number.</div>").fadeIn("fast");
      }, 100);
    }
    else if (stud_gender=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Gender.</div>").fadeIn("fast");
      }, 100);
    }
    else if(stud_dob=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Date of Birth.</div>").fadeIn("fast");
      }, 100);
    }
    else if (stud_adm_dt=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Admission Date.</div>").fadeIn("fast");
      }, 100);
    }
    else if (stud_course_id=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Course.</div>").fadeIn("fast");
      }, 100);
    }
    else if (stud_department_id=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Department.</div>").fadeIn("fast");
      }, 100);
    }
    else if (stud_batch=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Batch.</div>").fadeIn("fast");
      }, 100);
    }
    else if (stud_roll=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Roll No.</div>").fadeIn("fast");
      }, 100);
    }
    else if (stud_reg_no=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Registration No.</div>").fadeIn("fast");
      }, 100);
    }
    else if (stud_sem=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Semester.</div>").fadeIn("fast");
      }, 100);
    }
    else
    {
      $.ajax({
      type: 'POST',
      url: 'add-student-code/add-student.php',
      data: ({ stud_nm: stud_nm , stud_gender: stud_gender , stud_dob: stud_dob , stud_mob_no: stud_mob_no , stud_course_id: stud_course_id , stud_roll: stud_roll , stud_email: stud_email , stud_department_id: stud_department_id , stud_reg_no: stud_reg_no , stud_adm_dt: stud_adm_dt , stud_batch: stud_batch , stud_sem: stud_sem }),
      success: function(response) {
      if(response == "2")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Email-Id registered with other user.</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == "3")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Invalid Roll Number.</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == "4")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Invalid Registration  Number.</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == "1")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Student Added Successfully.</div>").fadeIn("fast");
        }, 100);

        setTimeout(function(){
         document.location.href='../add-student/';
        }, 100);
      }
      else
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Unknown Error.</div>").fadeIn("fast");
        }, 100);
      }
      }
      });
    }
  });
});
