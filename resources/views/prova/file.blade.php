<?php
use Storage;
?>
<html>
    <head>
        
    </head>
    
    <body>
        <form action="/savefile" method="post" enctype="multipart/form-data">
                <!--{!! csrf_field() !!}-->
            <input type="file" name="image" />
            </br>
            
            <input type="submit" name="send" value="submit" />
            
        </form>
    </body>
    
</html>