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
        <form action="" enctype="multipart/form-data" class="span8 form-inline" method="post">
            <div class="modal-body">
                    <table>
                        <tr>
                            <td>
                                <label><b>E-mail of user:</b></label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter email" name="email" required>
                            </td>
                        </tr>
                    </table>
                <h4>Type a users Email & hit the Add Admin button to add him as a admin</h4>
            </div>
            <div class="modal-footer">
                <button name="signup" id="btnSubmit" type="submit" class="btn btn-success">Add Admin</button>
            </div>
        </form>
            <?php
            if (isset($_POST["btnSubmit"]) && isset($_POST['submit']) && $_REQUEST['firstName']) {
                $sql = "Insert
                into
                    user(
                    user_type_id
                    )
                values
                    ('1')";

                $result = mysql_query($sql);
            }
            ?>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Area</th>
                    <th>Blood Group</th>
                    <th>Review</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $getBloodGroupId = $_GET["group_id"];
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
                                          u.user_type_id = 1";
                $results = mysql_query($strquery);
                $num = mysql_numrows($results);


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

                    <tr>
                        <td>
                            <?= $userId ?>
                        </td>
                        <td>
                            <figure>
                                <a class="open-ProfileModal" title="" data-toggle="modal"
                                   data-userid="<?php echo $userId; ?>"
                                   data-firstname="<?php echo $userFirstName; ?>"
                                   data-lastname="<?php echo $userLastName; ?>"
                                   data-photourl="<?php echo $photoUrl; ?>"
                                   data-phonenumber="<?php echo $phone; ?>"
                                   data-bloodgroupid="<?php echo $bloodGroupId; ?>"
                                   data-bloodgroupname="<?php echo $bloodGroupName; ?>"
                                   data-useraddress="<?php echo $userAddress; ?>"
                                   data-userareaname="<?php echo $userAreaName; ?>"
                                   data-availabletodonate="<?php echo $availableToDonate; ?>"
                                   data-lastdonated="<?php echo $lastDonated; ?>"
                                   data-totaldonated="<?php echo $totalDonated; ?>"
                                   data-batchid="<?php echo $batchId; ?>"
                                   data-batchname="<?php echo $batchName; ?>"
                                   data-useremail="<?php echo $userEmail; ?>"

                                   data-target="#myModal" href="#myModal">
                                    <img class="row_image" src="images/users/<?php echo $photoUrl ?>"
                                         class="img-responsive voc_list_preview_img" alt="" title="">
                                    <figcaption><?php echo $userFirstName ?></figcaption>

                                </a>
                            </figure>
                        </td>
                        <td><?php echo $phone ?></td>
                        <td><?php echo $userAreaName ?></td>
                        <td><a href="#" title="">
                                <img class="row_image" src="images/system/<?php echo $bloodGroupName ?>.png"
                                     class="img-responsive voc_list_preview_img" alt="" title="">
                                <figcaption><?php echo ($bloodGroupName != 'Anonymous') ? $bloodGroupName . 'Ve' : 'Anonymous' ?></figcaption>
                            </a>
                        </td>
                        <td>
                            <button type="submit" id="btnDelete" class="btn btn-danger">Remove Admin</button>
                        </td>
                    </tr>

                    <?php
                    $i++;
                }
                ?>
                </tbody>
            </table>

        </div>
        <?php
        include("right_sidebar.php");
        ?>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="userFirstName" class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <img class="modal_image" id="photoUrl" src="" class="img-responsive voc_list_preview_img" alt=""
                             title=""></br>
                        <label id="availableToDonate"
                               class="label <?= ($availableToDonate == 1) ? 'label-success' : 'label-danger' ?>"></label></br>
                        <label id="phoneNumber"></label></br>
                        <label>Email: </label><label id="userEmail"></label></br>
                        <label>Area: </label><span id="userareaname"></span></br>
                        <label>Address: </label>

                        <p id="useraddress"></p>
                        <label>Blood Group: </label><span id="bloodgroupname" class="label label-danger"></span></br>
                        <label>Last Donated: </label><span id="lastdonated"></span></br>
                        <label>Donated for: </label><span id="totaldonated" class="label label-warning"></span></br>
                        <label>Batch: </label><span id="batchname"></span></br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).on("click", ".open-ProfileModal", function () {
                var userId = $(this).data('userid');
                var userFirstName = $(this).data('firstname');
                var userLastName = $(this).data('lastname');
                var userEmail = $(this).data('useremail');
                var photoUrl = $(this).data('photourl');
                var availableDonate = $(this).data('availabletodonate');
                if (availableDonate == 1) {
                    availableToDonate = "Available to donate"
                } else {
                    availableToDonate = "Not available to donate"
                }
                var phoneNumber = $(this).data('phonenumber');
                var userareaname = $(this).data('userareaname');
                var useraddress = $(this).data('useraddress');
                var bloodgroupname = $(this).data('bloodgroupname');
                var lastdonated = $(this).data('lastdonated');
                var totaldonated = $(this).data('totaldonated');
                var batchname = $(this).data('batchname');
                document.getElementById('userFirstName').innerHTML = userFirstName + " " + userLastName;
                document.getElementById('userEmail').innerHTML = userEmail;
                document.getElementById('availableToDonate').innerHTML = availableToDonate;
                document.getElementById('phoneNumber').innerHTML = phoneNumber;
                document.getElementById('userareaname').innerHTML = userareaname;
                document.getElementById('useraddress').innerHTML = useraddress;
                document.getElementById('bloodgroupname').innerHTML = bloodgroupname;
                document.getElementById('lastdonated').innerHTML = lastdonated;
                document.getElementById('totaldonated').innerHTML = totaldonated + " times";
                document.getElementById('batchname').innerHTML = batchname;
                document.getElementById('photoUrl').src = "images/users/" + photoUrl;
            });
        </script>
        <!-- END OF MODAL -->
    </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>

</body>
</html>