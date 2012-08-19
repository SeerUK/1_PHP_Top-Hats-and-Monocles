<?php

  /*
   //
   // Iris Mail
   // 13/01/2012
   //
   // Elliot Wright
   // modules/core/pages/base/footer.inc.php
   //
  */

?>
  </div>
</div>
</div>

<script language="javascript" type="text/javascript">

    // Current stream viewer count:
    $("#mn-l-vwrcnt").load('?module=functions&pid=fn-vwrcnt&sid=<?php echo $streamID; ?>&check=vwrcnt');
    // Auto refresh:
    var refreshId = setInterval(function() {
      $("#mn-l-vwrcnt").load('?module=functions&pid=fn-vwrcnt&sid=<?php echo $streamID; ?>&check=vwrcnt');
    }, 60000);  
  
</script>

</body>
</html>