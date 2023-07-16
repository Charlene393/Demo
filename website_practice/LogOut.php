<?php
session_start();
if(session_destroy()){
    header("location:Sign_in.php");
}
?>