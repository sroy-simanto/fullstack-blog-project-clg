
<?php
    session_start();
    include "../config/config.php";

    // if(!isset($_SESSION['is_loggend']) &&  $_SESSION['is_loggend'] == false){
    //     header("location:index.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- primary meta tag -->
        <meta name="title" content="tinygone admin panel" />
        <meta name="author" content="simanto roy" />

        <!-- favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

        <title>Tinygone - admin panel</title>

        <!-- bootstrap 5 cdn -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- summer note cdn -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <!-- dropify cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
        <!-- select2 cdn -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- font awesome cdn -->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- custom css -->
        <link href="assets/css/styles.css" rel="stylesheet" />

        <style>
            .dropify-wrapper .dropify-message p {
                font-size: initial;
            }
        </style>

    </head>
