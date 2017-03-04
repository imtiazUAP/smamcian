<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    error_reporting(0);
    session_start();
    include("header.php");
    ?>
</head>
<body>
<?php
include("nav_menu.php");
if ($_SESSION['user_id'] == $_GET["user_id"] || $_SESSION['user_type_id'] == '2' || $_SESSION['user_type_id'] == '1') {
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
    $userAreaId = mysql_result($results, $i, "user_area_id");
    $userAreaName = mysql_result($results, $i, "user_area_name");
    $availableToDonate = mysql_result($results, $i, "available_to_donate");
    $lastDonated = mysql_result($results, $i, "last_donated");
    $totalDonated = mysql_result($results, $i, "total_donated");
    $batchId = mysql_result($results, $i, "batch_id");
    $batchName = mysql_result($results, $i, "batch_name");
    $userTypeId = mysql_result($results, $i, "user_type_id");
    $userEmail = mysql_result($results, $i, "user_email");
    ?>
    <div class="modal-header">
        <h4 class="modal-title">Edit Profile</h4>
    </div>
    <form action="" enctype="multipart/form-data" class="span8 form-inline" method="post">
        <div class="modal-body">
            <div class="container">
                <table>
                    <tr>
                        <td>
                            <label><b>First Name</b></label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter First Name" name="firstName"
                                   value="<?= $userFirstName ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Last Name</b></label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Last Name" name="lastName"
                                   value="<?= $userLastName ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Phone</b></label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Phone" value="<?= $phone ?>" name="phone" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Living Area</b></label>
                        </td>
                        <td><select name="areaId" class="form-control" id="areaId" value="<?= $userFirstName ?>"
                                    required>
                                <?php
                                $query = "SELECT DISTINCT user_area_id,user_area_name FROM area ORDER BY user_area_id";
                                $rs = mysql_query($query) or die ('Error submitting');
                                while ($rows = mysql_fetch_assoc($rs)) {
                                    if ($userAreaId == $rows["user_area_id"]) {
                                        $selected = 'selected="selected"';
                                    } else {
                                        $selected = '';
                                    }
                                    print("<option value=\"" . $rows["user_area_id"] . "\" " . $selected . "  >" . $rows["user_area_name"] . "</option>");
                                }
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Address</b></label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Address" name="userAddress"
                                   value="<?= $userAddress ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Last donated</b></label>
                        </td>
                        <td>
                            <input type="date" placeholder="Enter Last donation date" name="lastDonated"
                                   value="<?php print(date("Y-m-d")); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Total donated</b></label>
                        </td>
                        <td>
                            <input type="number" placeholder="Enter total donation" name="totalDonated"
                                   value="<?= $totalDonated ?>"> Times
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Upload photo</b></label>
                        </td>
                        <td>
                            <input type="file" name="file" id="file" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>E-mail</b></label>
                        </td>
                        <td>
                            <input type="email" placeholder="Enter Email" name="userEmail" value="<?= $userEmail ?>"
                                   required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Password</b></label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter Password" name="userPassword" required>
                        </td>
                    </tr>
                </table>
            </div>
            </br>
        </div>
        <div class="modal-footer">
            <button name="btnSubmit" id="btnSubmit" type="submit" class="btn btn-success">Update Info</button>
        </div>
    </form>
    <?php
    if (isset($_POST["btnSubmit"]) && $_REQUEST['userEmail']) {
        $post_photo = $_FILES['file']['name'];
        $post_photo_tmp = $_FILES['file']['tmp_name'];
        $ext = pathinfo($post_photo, PATHINFO_EXTENSION); // getting image extension
        if ($ext == 'png' || $ext == 'PNG' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'gif' || $ext == 'GIF') {
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG') {
                ini_set('memory_limit', '-1'); //It will take unlimited memory usage of server
                $src = imagecreatefromjpeg($post_photo_tmp);
            }
            if ($ext == 'png' || $ext == 'PNG') {
                ini_set('memory_limit', '-1'); //It will take unlimited memory usage of server
                $src = imagecreatefrompng($post_photo_tmp);
            }
            if ($ext == 'gif' || $ext == 'GIF') {
                ini_set('memory_limit', '-1'); //It will take unlimited memory usage of server
                $src = imagecreatefromgif($post_photo_tmp);
            }
            list($width_min, $height_min) = getimagesize($post_photo_tmp);
            $newwidth_min = 350;
            $newheight_min = ($height_min / $width_min) * $newwidth_min;
            $tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);
            imagecopyresampled($tmp_min, $src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);
            $newfilename = round(microtime(true)) . '.' . $ext;
            imagejpeg($tmp_min, "images/users/" . $newfilename, 80); //copy image in folder//
            $photo_name = $newfilename; // new name with path to save in database

            if ($photoUrl) {
                unlink('images/users/' . $photoUrl);
            }

            $strquery = "UPDATE
                    user
                    SET
                    user_first_name= '" . ($_POST['firstName']) . "',
                    user_last_name= '" . $_REQUEST['lastName'] . "',
                    phone= '" . $_REQUEST['phone'] . "',
                    user_area_id= '" . $_REQUEST['areaId'] . "',
                    last_donated= '" . $_REQUEST['lastDonated'] . "',
                    total_donated= '" . $_REQUEST['totalDonated'] . "',
                    photo_url='" . $photo_name . "',
                    user_email= '" . $_REQUEST['userEmail'] . "',
                    user_password= '" . $_REQUEST['userPassword'] . "'
                     WHERE user_id='" . $userId . "'";
            $result = mysql_query($strquery);

            if ($result) {
                ?>
                <script language="JavaScript">window.location = "my_profile.php?user_id=<?= $userId ?>";</script>
            <?php
            } else {
                die('Error:' . mysql_error());
            }
        }
    }
    ?>
    </div>
    <?php
    include("right_sidebar.php");
    ?>
    </div>
    </div>

<?php
}
include("footer.php");
?>

</body>
</html>