$('#notice_frm').submit(function(e){
	e.preventDefault();
		 $("#add_sem_notice").html("<i class='fa fa-spin fa-spinner'></i>&nbsp;Uploading...").fadeIn("fast");
     $.ajax({
     url: $(this).attr('action'),
     type: "POST",
     data: new FormData(this),
     contentType: false,
     cache: false,
     processData: false,
      success: function(data) 
      { 
        if(data=='2')
        {
          $("#add_sem_notice").html("Submit").fadeIn("fast");
          setTimeout(function(){
            $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter Notice Title. </div>").fadeIn("fast");
             }, 100);
        }
        else if(data=='3')
        {
          $("#add_sem_notice").html("Submit").fadeIn("fast");
          setTimeout(function(){
            $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Select Semester. </div>").fadeIn("fast");
             }, 100);
        }
        else if(data=='0')
        {
          $("#add_sem_notice").html("Submit").fadeIn("fast");
          setTimeout(function(){
            $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Write Desciption of the Notice. </div>").fadeIn("fast");
             }, 100);
        }
        else if(data=='4')
        {
					$("#add_sem_notice").html("Submit").fadeIn("fast");
          setTimeout(function(){
            $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Return Code: </div>").fadeIn("fast");
             }, 100);
        }
        else if(data=='5')
        {
          $("#add_sem_notice").html("Submit").fadeIn("fast");
          setTimeout(function(){
            $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Same File Already Exists. </div>").fadeIn("fast");
             }, 100);
        }
        else if(data=='6')
        {
          $("#add_sem_notice").html("Submit").fadeIn("fast");
          setTimeout(function(){
            $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Invalid File Type. </div>").fadeIn("fast");
             }, 100);
        }
        else if(data=='7')
        {
          $("#add_sem_notice").html("Submit").fadeIn("fast");
          setTimeout(function(){
            $("#error_id").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Same Notice with this title already exists for this semester. </div>").fadeIn("fast");
             }, 100);
        }
        else if(data=='1')
        {
          $("#add_sem_notice").html("Submit").fadeIn("fast");
            setTimeout(function(){
               $("#error_id").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Notice Successfully Added.</div>").fadeIn("fast");
              }, 1000);
            setTimeout(function(){
           document.location.href='../add-notice-sem-wise/index.php';
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