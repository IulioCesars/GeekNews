<?php
session_start();
if(session_destroy()){
    $_SESSION = null;
    header("Location: ../index.php");
}
