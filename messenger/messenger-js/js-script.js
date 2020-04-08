function chat_start(uid){
  $("#chat_u_id").val(uid);
  $("#chat_head").load("jquery-pages/chat-head-load.php?userid="+uid).fadeIn("fast");
}

function reset_btn(){
  $("#message").val("");
}

// load messages every 1000 milliseconds from server.
var timeout = setTimeout(reloadChat, 1000);

function reloadChat ()
{
  var rusername = $('#chat_u_id').val();
  $('.chat-discussion').load('jquery-pages/chat-reload.php?userid='+rusername,function () {
  timeout = setTimeout(reloadChat, 1500);
  });
}

// $('#message').keydown(function (e){
// if(e.keyCode == 13){
//   var rusername = $('#chat_u_id').val();
//   var imessage = $('#message').val();
//   if (rusername != '')
//   {
//     post_data = {'rusername':rusername, 'message':imessage};
//     //send data to "shout.php" using jQuery $.post()
//     $.post('jquery-pages/chat-reload.php', post_data, function(data) {
//
//       //append data into messagebox with jQuery fade effect!
//       $(data).hide().appendTo('.chat-discussion').fadeIn();
//
//       //keep scrolled to bottom of chat!
//       var scrolltoh = $('.chat-discussion')[0].scrollHeight;
//       $('.chat-discussion').scrollTop(scrolltoh);
//
//       //reset value of message box
//       $('#message').val('');
//       //for scroll the div to bottom
//       $('#msgarea_chat').stop().animate({scrollTop: $("#msgarea_chat")[0].scrollHeight},400);
//     }).fail(function(err) {
//
//     //alert HTTP server error
//     alert(err.statusText);
//     });
//   }
//   else
//   {
//     return false;
//   }
// }
// });

function send_btn()
{
  var rusername = $('#chat_u_id').val();
  var imessage = $('#message').val();
  var imessage = imessage.replace(/\r?\n/g, '<br />');
  if (rusername != '')
  {
    post_data = {'rusername':rusername, 'message':imessage};
    //send data to "shout.php" using jQuery $.post()
    $.post('jquery-pages/chat-reload.php', post_data, function(data) {

      //append data into messagebox with jQuery fade effect!
      $(data).hide().appendTo('.chat-discussion').fadeIn();

      //keep scrolled to bottom of chat!
      var scrolltoh = $('.chat-discussion')[0].scrollHeight;
      $('.chat-discussion').scrollTop(scrolltoh);

      //Success Messege
      // setTimeout(function(){
      //   custom_f_msg('Success!','success','Messege sent successfully','5000','bottom-left');
      // }, 100);

      //reset value of message box
      $('#message').val('');
      //for scroll the div to bottom
      $('#msgarea_chat').stop().animate({scrollTop: $("#msgarea_chat")[0].scrollHeight},400);
    }).fail(function(err) {
    //alert HTTP server error
    setTimeout(function(){
      custom_f_msg('Error!','error',err.statusText,'5000','bottom-left');
    }, 100);
    });
  }
  else
  {
    setTimeout(function(){
      custom_f_msg('Error!','error','Please select any user to chat.','5000','bottom-left');
    }, 100);
  }
}
