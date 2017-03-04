<?php
error_reporting(0);
session_start();
include("header.php");

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'approve':
            approve();
            break;
        case 'delete':
            delete();
            break;
        case 'addAdmin':
            addAdmin();
            break;
        case 'removeAdmin':
            removeAdmin();
            break;
        case 'Mark Available':
            markAvailable();
            break;
        case 'Mark Unavailable':
            markUnavailable();
            break;
    }
}

function delete()
{
    $qry = "DELETE FROM USER where user_id='" . ($_POST['user_id']) . "'";
    $usresult = mysql_query($qry);
    header("Refresh:0; url=review_signup.php");
}

function approve()
{
    $qry = "UPDATE USER SET active_flag=1, added_by='" . ($_SESSION['user_id']) . "' where user_id='" . ($_POST['user_id']) . "'";
    $usresult = mysql_query($qry);

    if ($usresult) {
        $email = $_POST['user_email'];
        $from = "info@smamcian.net"; // sender
        $subject = "Membership Approved";
        $message = "Your Membership is Approved at http://www.smsmcian.com please log in to continue.... Thank You!!!";
        $message = wordwrap($message, 70);
        mail("$email", $subject, $message, "From: $from\n");
    }
    header("Refresh:0; url=review_signup.php");
}

function addAdmin()
{
    $qry = "UPDATE USER SET user_type_id = 2 where user_email='" . ($_POST['user_email']) . "'";
    $usresult = mysql_query($qry);
    header("Refresh:0; url=admins.php");
}

function removeAdmin()
{
    $qry = "UPDATE USER SET user_type_id = 3 where user_email='" . ($_POST['user_email']) . "'";
    $usresult = mysql_query($qry);
    header("Refresh:0; url=admins.php");
}

function markAvailable()
{
    $qry = "UPDATE USER SET available_to_donate = 1 where user_id='" . ($_POST['user_id']) . "'";
    $usresult = mysql_query($qry);
    header("Refresh:0; url=my_profile.php?user_id='" . ($_POST['user_id']) . "'");
}

function markUnavailable()
{
    $qry = "UPDATE USER SET available_to_donate = 0 where user_id='" . ($_POST['user_id']) . "'";
    $usresult = mysql_query($qry);
    header("Refresh:0; url=my_profile.php?user_id='" . ($_POST['user_id']) . "'");
}

?>