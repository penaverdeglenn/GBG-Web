<?php
 $db = mysqli_connect('localhost', 'root', 'usbw') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'gbg' ) or die(mysqli_error($db));
?>