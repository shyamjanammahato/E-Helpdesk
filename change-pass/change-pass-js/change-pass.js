$(function() {

 $('#update_pass').click(function(event) {

    var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    event.preventDefault();

    var curr_pass = $('#curr_pass').val();
    var new_pass = $('#new_pass').val();
    var conf_new_pass = $('#conf_new_pass').val();
    var email = $('#email').val();

    if (curr_pass=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Your Current Password.</div>").fadeIn("fast");
      }, 100);
    }
    else if (new_pass=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter New Password.</div>").fadeIn("fast");
      }, 100);
    }
    else if (conf_new_pass=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Re-Enter New Password.</div>").fadeIn("fast");
      }, 100);
    }
    else
    {
      $.ajax({
      type: 'POST',
      url: 'change-pass-code/change-pass-code.php',
      data: ({ curr_pass: curr_pass , new_pass: new_pass , conf_new_pass: conf_new_pass ,email: email }),
      success: function(response) {
      if(response == "2")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Current Password does not matched .</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == "3")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> New Password and Confirm Password does not matched.</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == "4")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> New Password is same as current Password.</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == "5")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Password must be greater than 8 characters.</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == "6")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Password can not be greater than 12 characters.</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == "1")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Password Changed Successfully.</div>").fadeIn("fast");
        }, 100);

        setTimeout(function(){
         document.location.href='../logout.php';
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
