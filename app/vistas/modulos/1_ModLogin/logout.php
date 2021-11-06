<?php
    session_start();
    unset($_SESSION["s_user"]);
    session_destroy();
    header("Location: login.html");
?>