<?php
error_reporting(0);
session_start() ;
include("header.php");

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'approve':
            approve();
            break;
        case 'delete':
            delete();
            break;
    }
}

function delete() {
    $qry = "DELETE FROM USER where user_id='".($_POST['user_id'])."'";
    $usresult = mysql_query($qry);
    header("Refresh:0; url=review_signup.php");
}

function approve() {
    $qry = "UPDATE USER SET active_flag=1, added_by='".($_SESSION['user_id'])."' where user_id='".($_POST['user_id'])."'";
    $usresult = mysql_query($qry);
    header("Refresh:0; url=review_signup.php");
}
?>