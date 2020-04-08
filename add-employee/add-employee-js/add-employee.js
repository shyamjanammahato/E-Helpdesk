$(function() {

 $('#emp_adm_frm').click(function(event) {

    event.preventDefault();

    var emp_nm = $('#emp_nm').val();
    var emp_dob = $('#emp_dob').val();
    var emp_mob_no = $('#emp_mob_no').val();
    var emp_course_id = $('#emp_course_id').val();
    var emp_gender = $('#emp_gender').val();
    var emp_email = $('#emp_email').val();
    var emp_department_id = $('#emp_department_id').val();

    var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (emp_nm=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Full Name.</div>").fadeIn("fast");
      }, 100);
    }
    else if (emp_email=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Email Id.</div>").fadeIn("fast");
      }, 100);
    }
    else if (filter.test(emp_email) == false)
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter valid Email- Id.</div>").fadeIn("fast");
      }, 100);
    }
    else if (emp_gender=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Gender.</div>").fadeIn("fast");
      }, 100);
    }
    else if(emp_dob=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Date of Birth.</div>").fadeIn("fast");
      }, 100);
    }
    else if (emp_mob_no=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Mobile Number.</div>").fadeIn("fast");
      }, 100);
    }
    else if (!/^\d{10}$/.test(emp_mob_no))
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Valid Mobile Number.</div>").fadeIn("fast");
      }, 100);
    }
    else if (emp_course_id=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Course.</div>").fadeIn("fast");
      }, 100);
    }
    else if (emp_department_id=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Department.</div>").fadeIn("fast");
      }, 100);
    }
    else
    {
      $.ajax({
      type: 'POST',
      url: 'add-employee-code/add-employee.php',
      data: ({ emp_nm: emp_nm , emp_gender: emp_gender , emp_dob: emp_dob , emp_mob_no: emp_mob_no , emp_course_id: emp_course_id , emp_email: emp_email ,emp_department_id: emp_department_id }),
      success: function(response)
      {
        alert(response);
        if(response == 2)
        {
          setTimeout(function(){
            $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Email-Id registered with other user.</div>").fadeIn("fast");
          }, 100);
        }
      else if(response == 3)
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Mobile Number registered with other user.</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == 1)
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Teacher Added Successfully.</div>").fadeIn("fast");
        }, 100);

        setTimeout(function(){
         document.location.href='../add-employee/';
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
