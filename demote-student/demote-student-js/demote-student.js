$(function() {

 $('#stud_promote').click(function(event) {

    var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    event.preventDefault();

    var course_id = $('#course_id').val();
    var department_id = $('#department_id').val();
    var batch = $('#batch').val();

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
    else if (batch=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Batch.</div>").fadeIn("fast");
      }, 100);
    }
     else
    {
      $.ajax({
      type: 'POST',
      url: 'promote-stud-code/promote-stud-code.php',
      data: ({ course_id: course_id , department_id: department_id , batch: batch }),
      success: function(response) {
      if(response == "1")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Successfully Promoted.</div>").fadeIn("fast");
        }, 1000);

        setTimeout(function(){
         document.location.href='../promote-student/index.php';
       }, 1000);
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
