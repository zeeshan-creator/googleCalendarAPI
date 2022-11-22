<?php
// require_once __DIR__ . '/vendor/autoload.php';
require_once "./vendor/autoload.php";
require_once "config/app.php";

?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.1.9/jquery.datetimepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.1.9/jquery.datetimepicker.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//unpkg.com/mar-rrule@2.2.0/lib/rrule.js"></script>

</head>

<style type="text/css">
    #form-container {
        width: 400px;
        margin: 10px auto;
    }

    #form-container input[type="text"] {
        border: 1px solid rgba(0, 0, 0, 0.15);
        font-family: inherit;
        font-size: inherit;
        padding: 8px;
        border-radius: 0px;
        outline: none;
        display: block;
        margin: 0 0 20px 0;
        width: 100%;
        box-sizing: border-box;
    }

    #form-container select {
        border: 1px solid rgba(0, 0, 0, 0.15);
        font-family: inherit;
        font-size: inherit;
        padding: 8px;
        border-radius: 2px;
        display: block;
        width: 100%;
        box-sizing: border-box;
        outline: none;
        background: none;
        margin: 0 0 20px 0;
    }

    #form-container .input-error {
        border: 1px solid red !important;
    }

    #form-container #event-date {
        display: none;
    }

    #form-container #create-update-event {
        background: none;
        width: 100%;
        display: block;
        margin: 0 auto;
        border: 2px solid #2980b9;
        padding: 8px;
        background: none;
        color: #2980b9;
        cursor: pointer;
    }

    #form-container #delete-event {
        background: none;
        width: 100%;
        display: block;
        margin: 20px auto 0 auto;
        border: 2px solid #2980b9;
        padding: 8px;
        background: none;
        color: #2980b9;
        cursor: pointer;
    }
</style>