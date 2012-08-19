$(document).ready(function() {
  resizeLayout();
  // Set streams overscroll:
  $("#livestreams").overscroll();
  $("#messages").overscroll();
  //$("#ml-centre").overscroll();
  // Updates heights when the page is resized:
  $(window).resize(function(){
    resizeLayout();
  });
});

function resizeLayout() {
  // Set column height:
  $("#ml-left").height($(window).height());
  $("#ml-right").height($(window).height());
  $("#ml-centre").height($(window).height());
  $("#livestreams").height($(window).height() - 400);
  $("#chat").height($(window).height() - 127);
  $("#messages").height($(window).height() - 259);
  var navHeight = $(window).height() - 290;
  $("#live_embed_player_flash").css({ "max-height": navHeight + 'px' });
  $("#streambox").css({ "max-height": navHeight + 'px' });
  $("#streambox").height((($("#streambox").width() / 16) * 9) + 35);
}