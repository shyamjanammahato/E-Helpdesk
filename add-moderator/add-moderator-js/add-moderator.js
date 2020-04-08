$(function() {

 $('#add_mod_submit').click(function(event) {

    var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    event.preventDefault();

    var mode_name = $('#mode_name').val();
    var mode_email = $('#mode_email').val();
    var mode_gender = $('#mode_gender').val();
    var mode_mob = $('#mode_mob').val();

    if (mode_name=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Full Name</div>").fadeIn("fast");
      }, 100);
    }
    else if (mode_email=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Email Id.</div>").fadeIn("fast");
      }, 100);
    }
    else if (mode_gender=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Gender.</div>").fadeIn("fast");
      }, 100);
    }
    else if (mode_mob=='')
    {
      setTimeout(function(){
        $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Mobile Number.</div>").fadeIn("fast");
      }, 100);
    }
    else
    {
      $.ajax({
      type: 'POST',
      url: 'add-moderator-code/add-moderator-code.php',
      data: ({ mode_name: mode_name , mode_email: mode_email , mode_gender: mode_gender , mode_mob: mode_mob }),
      success: function(response) {
      if(response == "2")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Mobile No. already registered with other Moderator.</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == "3")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> This Name already registered with other Moderator.</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == "4")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Email_Id already registered with other Moderator.</div>").fadeIn("fast");
        }, 100);
      }
      else if(response == "1")
      {
        setTimeout(function(){
          $("#error_id").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Moderator Added Successfully.</div>").fadeIn("fast");
        }, 100);

        setTimeout(function(){
         document.location.href='../add-moderator/index.php';
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
