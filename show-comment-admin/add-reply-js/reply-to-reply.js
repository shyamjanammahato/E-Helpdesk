$(function() {

 $('#reply_reply_submit').click(function(event) {

    event.preventDefault();

    var comment = $('#comment').val();
    var reply_id = $('#reply_sl').val();

    if (comment=='')
    {
      setTimeout(function(){
        $("#error_id1").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Please Enter your Comment.</div>").fadeIn("fast");
      }, 100);
    }
    else
    {
      $.ajax({
      type: 'POST',
      url: 'add-reply-code/reply-to-reply-code.php',
      data: ({ comment: comment , reply_id: reply_id }),
      success: function(response) {
      if(response == "1")
      {
        setTimeout(function(){
          $("#error_id1").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Replied...</div>").fadeIn("fast");
        }, 1000);

        setTimeout(function(){
         document.location.href='../navbar/show-all-notification.php';
       }, 1000);
      }
      else
      {
        setTimeout(function(){
          $("#error_id1").html("<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Unknown Error.</div>").fadeIn("fast");
        }, 100);
      }
      }
      });
    }
  });
});
