<?php

function is_active($file_name){
    $current_filename = basename($_SERVER['SCRIPT_FILENAME']);
    if(in_array($current_filename,$file_name)){
        return true;
    }
    return false;
}

function show_notification(){
    if(isset($_SESSION['success']) && $_SESSION['success']==true){
        echo '<p class="success-msg">'.$_SESSION['message'].'</p>';
        unset($_SESSION['success']);
        unset($_SESSION['message']);
    }
      
    if(isset($_SESSION['success']) && $_SESSION['success']==false){
        echo '<p class="error-msg">'.$_SESSION['message'].'</p>';
        unset($_SESSION['success']);
        unset($_SESSION['message']);
    }
}