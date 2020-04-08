$(function() {

 $('#edit_notes_submit').click(function(event) {

    var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    event.preventDefault();

    var subjects = $('#subjects').val();
    var sem_id = $('#sem_id').val();
    var topic_name = $('#topic_name').val();
    var descp = $('#descp').val();
    var topic_nm = $('#topic_nm').val();
    var sub_id = $('#sub_id').val();
    var sl = $('#update_sl').val();

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
      url: 'add-file-code/edit-file-details.php',
      data: ({ sem_id: sem_id , subjects: subjects , topic_name: topic_name , descp: descp , sl: sl , topic_nm: topic_nm , sub_id: sub_id }),
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
          $("#error_id").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Information Updated Successfully.</div>").fadeIn("fast");
        }, 100);
        setTimeout(function(){
         document.location.href='../add-notes/index.php';
       }, 1500);
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
