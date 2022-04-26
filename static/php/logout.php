<?php
    session_start();
    echo $JSON = json_encode($_SESSION);
    session_destroy();
?>