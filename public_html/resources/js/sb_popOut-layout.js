$(document).ready(function() {
  resizeLayout();
  // Set streams overscroll:
  $("#messages").overscroll();
  //$("#ml-centre").overscroll();
  // Updates heights when the page is resized:
  $(window).resize(function(){
    resizeLayout();
  });
});

function resizeLayout() {
  $("#chat").height($(window).height());
  $("#messages").height($(window).height() - 132);
  $("#messages").width($(window).width() - 20);
  $("#controls").width($(window).width() - 40);
  $("#sb-modcp").width($(window).width() - 14);
  $("#txt_msg").width($(window).width() - 60);
}