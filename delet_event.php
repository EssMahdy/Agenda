<?php
session_start();
include_once("connect.php");
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    $delete_row = "DELETE FROM creneaux WHERE id='$id'";
    $result = mysqli_query($conn, $delete_row);
    if(mysqli_affected_rows($conn)){
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Event successfully deleted!</div>';
        header("Location: calendar.php");
    }else{
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Error: Event was not deleted!</div>';
        header("Location: calendar.php");
    }
}else{    
    $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Error: Event ID not found!</div>';
    header("Location: calendar.php");
}
?>
