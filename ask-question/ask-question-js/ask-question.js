$('#ask_question_frm').submit(function(e){
  e.preventDefault();
     $("#ask_question").html("<i class='fa fa-spin fa-spinner'></i>&nbsp;Uploading...").fadeIn("fast");
     $.ajax({
     url: $(this).attr('action'),
     type: "POST",
     data: new FormData(this),
     contentType: false,
     cache: false,
     processData: false,
      success: function(data) 
      { 
        if(data=="1")
        {
          $("#ask_question").html("Submit").fadeIn("fast");
          setTimeout(function(){
          $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Department.</div>").fadeIn("fast");
            }, 1000);
        }
        else if(data=="2")
        {
          $("#ask_question").html("Submit").fadeIn("fast");
          setTimeout(function(){
          $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Subject OR Enter Subject.</div>").fadeIn("fast");
            }, 1000);
        }
        else if(data=="3")
        {
          $("#ask_question").html("Submit").fadeIn("fast");
          setTimeout(function(){
          $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Subject.</div>").fadeIn("fast");
            }, 1000);
        }
        else if(data=="4")
        {
          $("#ask_question").html("Submit").fadeIn("fast");
          setTimeout(function(){
          $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Write Your Question or upload Image of Your Question.</div>").fadeIn("fast");
            }, 1000);
        }
        else if(data=="5")
        {
          $("#ask_question").html("Submit").fadeIn("fast");
          setTimeout(function(){
          $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong>Same Question of this Subject Already Posted.</div>").fadeIn("fast");
            }, 1000);
        }
        else if(data=="6")
        {
          $("#ask_question").html("Submit").fadeIn("fast");
          setTimeout(function(){
          $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong>File Size must be less than 600KB.</div>").fadeIn("fast");
            }, 1000);
        }
        else if(data=="7")
        {
          $("#ask_question").html("Submit").fadeIn("fast");
          setTimeout(function(){
          $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong>Return Code : Error.</div>").fadeIn("fast");
            }, 1000);
        }
        else if(data=="8")
        {
          $("#ask_question").html("Submit").fadeIn("fast");
          setTimeout(function(){
          $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong>Same File Already Exists.</div>").fadeIn("fast");
            }, 1000);
        }
        else if(data=="10")
        {
          $("#ask_question").html("Submit").fadeIn("fast");
          setTimeout(function(){
            $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> File Type Should Be a Image File.</div>").fadeIn("fast");
             }, 1000);
        }
        else if(data=="9")
        {
          $("#ask_question").html("Submit").fadeIn("fast");
            setTimeout(function(){
               $("#error_id5").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Question Successfully Posted</div>").fadeIn("fast");
              }, 1000);
            setTimeout(function(){
         document.location.href='../dashboard/index.php';
       }, 2000);
        }
        else
        {
          setTimeout(function(){
          $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Unknown Error.</div>").fadeIn("fast");
            }, 1000);
        }

 },
        error: function(){}
      });
  });