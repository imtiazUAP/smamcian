<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("header.php");
    ?>
</head>
<body>
<?php
include("nav_menu.php");
?>

<div class="container-fluid text-center">
    <div class="row content">
        <?php
        include("left_sidebar.php");
        ?>
        <div class="col-sm-8 text-left">
            <?php
            $userId = $_GET["user_id"];
            $strquery = "SELECT
            u.*,
            a.user_area_name,
            b.blood_group_name,
            bt.batch_name
            FROM USER AS u
            LEFT OUTER JOIN blood_group b
            ON b.blood_group_id = u.blood_group_id
            LEFT OUTER JOIN AREA a
            ON a.user_area_id = u.user_area_id
            LEFT OUTER JOIN batch bt
            ON bt.batch_id = u.batch_id
            WHERE
            u.user_id = '$userId'";
            $results = mysql_query($strquery);
            $num = mysql_numrows($results);

            $i = 0;
            $userId = mysql_result($results, $i, "user_id");
            $userFirstName = mysql_result($results, $i, "user_first_name");
            $userLastName = mysql_result($results, $i, "user_last_name");
            $photoUrl = mysql_result($results, $i, "photo_url");
            $phone = mysql_result($results, $i, "phone");
            $bloodGroupId = mysql_result($results, $i, "blood_group_id");
            $bloodGroupName = mysql_result($results, $i, "blood_group_name");
            $userAddress = mysql_result($results, $i, "user_address");
            $userAreaName = mysql_result($results, $i, "user_area_name");
            $availableToDonate = mysql_result($results, $i, "available_to_donate");
            $lastDonated = mysql_result($results, $i, "last_donated");
            $totalDonated = mysql_result($results, $i, "total_donated");
            $batchId = mysql_result($results, $i, "batch_id");
            $batchName = mysql_result($results, $i, "batch_name");
            $userTypeId = mysql_result($results, $i, "user_type_id");
            $userEmail = mysql_result($results, $i, "user_email");
            ?>

            <center>
            <div class="container">
                <div class="row profile">
                    <div class="col-md-9">
                        <div class="profile-sidebar">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="images/users/<?= $photoUrl ?>" class="img-responsive" alt="">
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">
                                    <?= $userFirstName.' '.$userLastName ?>
                                </div>
                                <div class="profile-usertitle-job">
                                    Proudly Blood Donor
                                </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="profile-userbuttons">
                                <button type="button" class="btn btn-success btn-sm">Mark Available</button>
                                <button type="button" class="btn btn-danger btn-sm">Mark Unavailable</button>
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li>
                                        <a href="#">
                                            <i class="glyphicon glyphicon-heart"></i>Blood group:
                                            <?= $bloodGroupName ?> </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="glyphicon glyphicon-earphone"></i>
                                            <?= $phone ?> </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="glyphicon glyphicon-envelope"></i>
                                            <?= $userEmail ?>  </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="glyphicon glyphicon-home"></i>
                                            <?= $userAddress ?> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="<?= $availableToDonate ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove'?>"></i>
                                            <?= $availableToDonate ? 'Available to donate' : 'Not available to donate' ?> </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="glyphicon glyphicon-flag"></i>Last donated:
                                            <?= $lastDonated ?> </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="glyphicon glyphicon-plus"></i>Total donated for:
                                            <?= $totalDonated ?> times </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
        <?php
        include("right_sidebar.php");
        ?>
    </div>
</div>

<?php
include("footer.php");
?>

</body>
</html>