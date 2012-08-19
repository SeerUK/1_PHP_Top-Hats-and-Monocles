
/*
 * 
 * Ajax Shoutbox Test
 * 18/03/2012
 * Elliot Wright
 *
*/

function sb_popOut() {
    window.open( "http://www.tophatsandmonocles.net/?module=functions&pid=shoutbox", "sb_popOut", 
    "status = 1, height = 600, width = 300, resizable = 1" );
}

function clearChat() {
    $('#sb-modcp-cleara').text("Clearing chat...");
    $.ajax({
        type: 'POST',
        data: "type=clear",
        url: 'modules/functions/pages/shoutbox.php?action=clear',
        success: function(result) {
            if(result != "false") {
                $('#messages').load('modules/functions/pages/shoutbox.php?action=get');
                $('#sb-modcp-cleara').text("Clear Chat");
            } 
        }
    });
}

function sb_deleteMessage(messageNo) {
    $.ajax({
        type: 'POST',
        data: "type=deletemsg",
        url: 'modules/functions/pages/shoutbox.php?action=deletemsg&msg=' + messageNo,
        success: function(result) {
            if(result != "false") {
                $('#messages').load('modules/functions/pages/shoutbox.php?action=get');
            } 
        }
    });
}

function sb_onLoad() {
    
    // Load inital messages:
    $("#messages").load('modules/functions/pages/shoutbox.php?action=get', function() {
        var nHeight = $('#messages')[0].scrollHeight;
        $('#messages').scrollTop(nHeight);
    });
    
    // Auto refresh:
    var refreshId = setInterval(function() {
        if($('#messages')[0].scrollHeight - $('#messages').scrollTop() <= $('#messages').outerHeight()) {
            $('#messages').load('modules/functions/pages/shoutbox.php?action=get', function() {
                var nHeight = $('#messages')[0].scrollHeight;
                $('#messages').scrollTop(nHeight);
            });
        } else {
            //$("#messages").load('modules/functions/pages/shoutbox.php?action=get');
            $('#messages').load('modules/functions/pages/shoutbox.php?action=get');
        }
    }, 4500);
    
    $.ajaxSetup({ cache: false });
    
    // Handle form submission:
    $('#sbform').submit(function() {
        var message = $("#txt_msg").val();
        $("#txt_msg").val("");
        $.ajax({
            type: 'POST',
            data: "message=" + message,
            url: 'modules/functions/pages/shoutbox.php?action=submit',
            success: function(result) {
                if(result != "false") {
                    $('#messages').load('modules/functions/pages/shoutbox.php?action=get', function() {
                        var nHeight = $('#messages')[0].scrollHeight;
                        $('#messages').scrollTop(nHeight);
                    });
                } 
            }
        });
        return false;
    });
    
}

// When the form is submitted:
$(document).ready(function() {
    sb_onLoad();    
});