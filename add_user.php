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
if ($_SESSION['user_type_id'] == '2' || $_SESSION['user_type_id'] == '1') {
    ?>

    <div class="container-fluid text-center">
    <div class="row content">
    <?php
    include("left_sidebar.php");
    ?>
    <div class="col-sm-8 text-left">
    <div class="modal-header">
        <h4 class="modal-title">Sign Up</h4>
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
                            <input type="text" class="form-control" placeholder="Enter First Name" name="firstName" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Last Name</b></label>
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Enter Last Name" name="lastName" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>SMAMC Batch</b></label>
                        </td>
                        <td><select name="batchId" class="form-control" id="batchId" required>
                                <?php
                                $query = "SELECT DISTINCT batch_id,batch_name FROM batch ORDER BY batch_id";
                                $rs = mysql_query($query) or die ('Error submitting');
                                while ($row = mysql_fetch_assoc($rs)) {
                                    print("<option value=\"" . $row["batch_id"] . "\">" . $row["batch_name"] . "</option>");
                                }
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Phone</b></label>
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Enter Phone" name="phone" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Living Area</b></label>
                        </td>
                        <td><select name="areaId" class="form-control" id="areaId" required>
                                <?php
                                $query = "SELECT DISTINCT user_area_id,user_area_name FROM area ORDER BY user_area_id";
                                $rs = mysql_query($query) or die ('Error submitting');
                                while ($row = mysql_fetch_assoc($rs)) {
                                    print("<option value=\"" . $row["user_area_id"] . "\">" . $row["user_area_name"] . "</option>");
                                }
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Address</b></label>
                        </td>
                        <td>
                            <input type="text" class="form-control"placeholder="Enter Address" name="userAddress" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Blood group</b></label>
                        </td>
                        <td>
                            <select name="groupId" class="form-control" id="sel1" required>
                                <option value="1">A+</option>
                                <option value="2">A-</option>
                                <option value="3">AB+</option>
                                <option value="4">AB-</option>
                                <option value="5">B+</option>
                                <option value="6">B-</option>
                                <option value="7">O+</option>
                                <option value="8">O-</option>
                                <option value="9">Anonymous</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Last donated</b></label>
                        </td>
                        <td>
                            <input type="date" class="form-control" placeholder="Enter Last donation date" name="lastDonated">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Total donated</b></label>
                        </td>
                        <td>
                            <input type="number" class="form-control" placeholder="Enter total donation" name="totalDonated"> Times
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Upload photo</b></label>
                        </td>
                        <td>
                            <input type="file" class="form-control" name="file" id="file" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>E-mail</b></label>
                        </td>
                        <td>
                            <input type="email" class="form-control" placeholder="Enter Email" name="userEmail" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Password</b></label>
                        </td>
                        <td>
                            <input type="password" class="form-control" placeholder="Enter Password" name="userPassword" required>
                        </td>
                    </tr>
                </table>
            </div>
            </br>
        </div>
        <div class="modal-footer">
            <button name="signup" id="btnSubmit" type="submit" class="btn btn-success">Add User</button>
        </div>
    </form>
    <?php
    if (isset($_POST["btnSubmit"]) && isset($_POST['submit']) && $_REQUEST['firstName']) {
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

            $sql = "Insert
                into
                    user(
                    user_first_name,
                    user_last_name,
                    phone,
                    user_area_id,
                    user_address,
                    blood_group_id,
                    last_donated,
                    total_donated,
                    batch_id,
                    photo_url,
                    active_flag,
                    user_email,
                    user_password,
                    added_by
                    )
                values
                    ('$_POST[firstName]',
                    '$_POST[lastName]',
                    '$_POST[phone]',
                    '$_POST[areaId]',
                    '$_POST[userAddress]',
                    '$_POST[groupId]',
                    '$_POST[lastDonated]',
                    '$_POST[totalDonated]',
                    '$_POST[batchId]',
                    '$photo_name',
                    '1',
                    '$_POST[userEmail]',
                    '$_POST[userPassword]',
                    '$_SESSION[user_id]'
                    )";

            $result = mysql_query($sql);

            if ($result) {
                ?>
                <div><h3>User added, add next one...</h3></div>
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