$('#add_file_frm').submit(function(e){
	e.preventDefault();
		 $("#add_file").html("<i class='fa fa-spin fa-spinner'></i>&nbsp;Uploading...").fadeIn("fast");
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
					$("#add_file").html("Submit").fadeIn("fast");
          setTimeout(function(){
          $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please upload the Document.</div>").fadeIn("fast");
            }, 100);
        }
        else if(data=="3")
        {
					$("#add_file").html("Submit").fadeIn("fast");
          setTimeout(function(){
            $("#error_id5").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> File Type Should Be .Docx or .Pdf or .jpg Or .Doc</div>").fadeIn("fast");
             }, 100);
        }
        else if(data=="1")
        {
          $("#add_file").html("Submit").fadeIn("fast");
            setTimeout(function(){
               $("#error_id5").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> File Successfully Uploaded.</div>").fadeIn("fast");
              }, 1000);
            setTimeout(function(){
           document.location.href='../add-notes/index.php';
          }, 100);
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