<?php
session_start();
?>
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
            <h1>About Us</h1>

            <div class="well">
                <img src="images/contents/medicine1.jpg" class="img-responsive" alt="Cinque Terre">
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                ut aliquip ex ea commodo consequat.</p>
            <hr>
            <h3>History</h3>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est </p>

                <?php
                $strquery = "SELECT
                                          u.*,
                                          a.user_area_name,
                                          b.blood_group_name,
                                          bt.batch_name
                                        FROM user AS u
                                          LEFT OUTER JOIN blood_group b
                                            ON b.blood_group_id = u.blood_group_id
                                          LEFT OUTER JOIN area a
                                            ON a.user_area_id = u.user_area_id
                                            LEFT OUTER JOIN batch bt
                                            ON bt.batch_id = u.batch_id
                                          WHERE
                                          u.user_type_id= '2'
                                          OR
                                          u.user_type_id = '1'
                                          AND
                                          u.active_flag = '1'";
                $results = mysql_query($strquery);
                $num = mysql_num_rows($results);

                $i = 0;
                while ($i < $num) {
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
                        <div class="profile">
                            <div class="col-md-4 profile container"">
                                <div class="profile-sidebar">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                        <img src="images/users/<?= $photoUrl ?>" class="img-responsive" alt="">
                                    </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name">
                                            <?= $userFirstName . ' ' . $userLastName ?>
                                        </div>
                                        <li style="list-style: none">
                                            <span>
                                                <?= ($userTypeId ==1) ? 'Founder or smamcian' : 'Admin of smamcian' ?>
                                            </span>
                                        </li>
                                        <li style="list-style: none">
                                            <a href="#">
                                                <i class="glyphicon glyphicon-education"></i>
                                                <?= $batchName ?></a>
                                        </li>
                                    </div>
                                    <div class="profile-usermenu">
                                        <ul class="nav">
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
                                        </ul>
                                    </div>
                                    <!-- END MENU -->
                                </div>
                            </div>
                        </div>
                    <script>
                        $(document).ready(function () {
                            $('.markAvailable').click(function () {
                                var clickBtnValue = $(this).val();
                                var userId = $(this).data('userid');
                                var ajaxurl = 'ajax.php',
                                    data = {'action': clickBtnValue, 'user_id': userId};
                                $.post(ajaxurl, data, function (response) {
                                    location.reload(); //reload sign up review page after approve or delete
                                });
                            });

                        });
                    </script>

                <?php
                $i++;
                }
                ?>

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