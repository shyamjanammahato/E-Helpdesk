$('#update_photo').submit(function(e){
	e.preventDefault();
		 $("#add_profile_pic").html("<i class='fa fa-spin fa-spinner'></i>&nbsp;Uploading...").fadeIn("fast");
     $.ajax({
     url: $(this).attr('action'),
     type: "POST",
     data: new FormData(this),
     contentType: false,
     cache: false,
     processData: false,
      success: function(data) 
      { 
        if(data=="2")
        {
					$("#add_profile_pic").html("Submit").fadeIn("fast");
          setTimeout(function(){
          $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Upload Profile Photo.</div>").fadeIn("fast");
            }, 100);
        }
        else if(data=="4")
        {
					$("#add_profile_pic").html("Submit").fadeIn("fast");
          setTimeout(function(){
            $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Return Code: Error.</div>").fadeIn("fast");
             }, 100);
        }
        else if(data=="5")
        {
					$("#add_profile_pic").html("Submit").fadeIn("fast");
          setTimeout(function(){
            $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Same Image already exists.</div>").fadeIn("fast");
            }, 100);
        }
        else if(data=="8")
        {
          $("#add_profile_pic").html("Submit").fadeIn("fast");
            setTimeout(function(){
               $("#error_id").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Successfully Updated Profile Picture.</div>").fadeIn("fast");
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

 },
        error: function(){}
      });
  });