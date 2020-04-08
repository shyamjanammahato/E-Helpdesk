$(function() {

 $('#assign_subject_submit').click(function(event) {

    var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    event.preventDefault();

    var course_id = $('#course_id').val();
    var department_id = $('#department_id').val();
    var sem_id = $('#sem_id').val();
    var mobile = $('#mobile').val();
    var teacher_id = $('#teacher_id').val();
    var subjects = $('#subjects').val();

    if (course_id=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Course.</div>").fadeIn("fast");
      }, 100);
    }
    else if (department_id=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Department.</div>").fadeIn("fast");
      }, 100);
    }
    else if (sem_id=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Semester.</div>").fadeIn("fast");
      }, 100);
    }
    else if (mobile=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Teacher's Mobile No..</div>").fadeIn("fast");
      }, 100);
    }
    else if (subjects=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Subjects.</div>").fadeIn("fast");
      }, 100);
    }
    else if (teacher_id=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Teacher Name can not be left Blank.</div>").fadeIn("fast");
      }, 100);
    }
    else
    {
      $.ajax({
      type: 'POST',
      url: 'assign-subject-code/assign-subject-code.php',
      data: ({ course_id: course_id , department_id: department_id , mobile: mobile , subjects: subjects , teacher_id: teacher_id , sem_id: sem_id}),
      success: function(response) {
      if(response == "2")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Subject Already Assigned. <a href='#'>UPDATE</a></div>").fadeIn("fast");
        }, 1000);
      }
      else if(response == "1")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Subject Assigned Successfully.</div>").fadeIn("fast");
        }, 1000);

        setTimeout(function(){
         document.location.href='../assign-subject/index.php';
       }, 1800);
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
