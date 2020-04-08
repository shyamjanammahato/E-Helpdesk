$(function() {

 $('#add_notes_submit').click(function(event) {

    var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    event.preventDefault();

    var subjects = $('#subjects').val();
    var sem_id = $('#sem_id').val();
    var topic_name = $('#topic_name').val();
    var descp = $('#descp').val();
    var teacher_id = $('#teacher_id').val();
    var topic_nm = $('#topic_nm').val();
    var course_id = $('#course_id').val();
    var sub_id = $('#sub_id').val();

    if (sem_id=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Semester.</div>").fadeIn("fast");
      }, 100);
    }
    else if (subjects=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Subjects.</div>").fadeIn("fast");
      }, 100);
    }
    else if (topic_name=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Topic Name.</div>").fadeIn("fast");
      }, 100);
    }
    else if (descp=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Write Description of the Documents.</div>").fadeIn("fast");
      }, 100);
    }
    else
    {
      $.ajax({
      type: 'POST',
      url: 'add-file-code/add-file-details.php',
      data: ({ sem_id: sem_id , subjects: subjects , topic_name: topic_name , descp: descp , teacher_id: teacher_id , topic_nm: topic_nm , sub_id: sub_id ,course_id: course_id }),
      success: function(response) {
      if(response == "2")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Same Topic Name already Exits.</div>").fadeIn("fast");
        }, 1000);
      }
      else if(response == "1")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> File Title Successfully Added.</div>").fadeIn("fast");
        }, 100);
        setTimeout(function(){
          $("#error_id1").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Please Upload File of the File Title.</div>").fadeIn("fast");
        }, 100);
        setTimeout(function(){
         document.location.href='../add-notes/index.php';
       }, 2000);
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
