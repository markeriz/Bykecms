<?php
    /*
    Attention!
    sortable.js conflicts with laravel app.js
    */
    ?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
    $( function() {
      //$( "#sortable" ).sortable();
        var fixHelper = function(e, ui) {  
        ui.children().each(function() {  
            $(this).width($(this).width());  
        });  
        return ui;  
        };
        $('#sort tbody').sortable({  
        helper: fixHelper  
        }).disableSelection();  
    } );
    </script>