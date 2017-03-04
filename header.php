<?php
session_cache_limiter(FALSE);
session_start();
include("classes/utility/dbconnect.php");
?>
<title>SM Blood Donors</title>
<link rel="shortcut icon" href="images/system/blood_drop.ico"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
<link rel="stylesheet" type="text/css" href="engine1/style.css"/>
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="styles/main.css"/>
<style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
        margin-bottom: 0;
        border-radius: 0;
    }

    .table > thead > tr > th {
        text-align: center;
        background-color: #E11B22;
        color: white;
    }

    .table td {
        text-align: center;
    }

    .row_image {
        max-width: 50px;
        border-radius: 50%;
    }

    .modal_image {
        max-width: 150px;
        border-radius: 50%;
    }

    .navbar-inverse .navbar-nav > .active > a:hover {
        color: #fff;
        background-color: #E11B22;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
        height: 500px
    }

    /* Set gray background color and 100% height */
    .sidenav {
        padding-top: 20px;
        background-color: #f1f1f1;
        height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
        background-color: #E11B22;
        color: white;
        padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
        .sidenav {
            height: auto;
            padding: 15px;
        }

        .row.content {
            height: auto;
        }
    }
</style>