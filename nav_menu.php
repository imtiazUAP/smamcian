<?php
session_start();
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="glyphicon glyphicon-tint navbar-brand" style="color:red" href="index.php">SMAMCIAN</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active "><a href="index.php">Home</a></li>
                <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="blood_bank.php">Blood Bank<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="blood_bank.php?group_id=1"> A+ </a></li>
                        <li><a href="blood_bank.php?group_id=2"> A- </a></li>
                        <li><a href="blood_bank.php?group_id=3"> AB+ </a></li>
                        <li><a href="blood_bank.php?group_id=4"> AB- </a></li>
                        <li><a href="blood_bank.php?group_id=5"> B+ </a></li>
                        <li><a href="blood_bank.php?group_id=6"> B- </a></li>
                        <li><a href="blood_bank.php?group_id=7"> O+ </a></li>
                        <li><a href="blood_bank.php?group_id=8"> O- </a></li>
                        <li><a href="blood_bank.php?group_id=9"> Anonymous </a></li>
                    </ul>
                </li>
                <li class="active"><a href="find_blood.php">Find Blood</a></li>
                <li class="active"><a href="about.php">About</a></li>
                <li class="active"><a href="contact_us.php">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(!$_SESSION['user_email']){
                    ?>
                <li class="active"><a title="" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } else { ?>
                    <li class="active"><a title="" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Log In</h4>
            </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="container">
                            <table>
                                <tr>
                                    <td>
                                        <label><b>E-mail</b></label>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="Enter Email" name="useremail" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label><b>Password</b></label>
                                    </td>
                                    <td>
                                        <input type="password" placeholder="Enter Password" name="password" required>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        </br>
                        <input type="checkbox" checked="checked"> Remember password
                        <button name="login" type="submit" class="btn btn-success">Login</button>
                    </div>
                    <div class="modal-footer">
                        <span class="psw">Forgot <a href="#">password?</a></span>
                        <button type="button" class="btn btn-warning" href="#signupModal" data-toggle="modal" data-dismiss="modal">Sign Up</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
                <?php
                //Function to console php value START
                function debug_to_console( $data ) {
                    if ( is_array( $data ) )
                        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
                    else
                        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
                    echo $output;
                }
                //Function to console php value END
                //NOTE: Use it to call console php value :::::debug_to_console( "Test" );

                if ( isset($_POST['login']) && !empty($_REQUEST['useremail'])) {
                    $usname = $_REQUEST['useremail'];
                    $uspass = $_REQUEST['password'];
                    $qry = "select * from user where user_email='" . ($usname) . "' && user_password='" . ($uspass) . "' ";
                    $usresult = mysql_query($qry);
                    $usdata = mysql_fetch_assoc($usresult);
                    $_SESSION['user_email'] = $usdata['user_email'];
                    $_SESSION['user_id'] = $usdata['user_id'];
                    session_write_close();
                    debug_to_console($_SESSION);
                    ?>



                    <?php
                    if($_SESSION['user_email']){
                        //IF session set then modal close, otherwise not close
                    }else{
                        //debug_to_console( "Failed" );
                     } ?>

                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>
<!-- END OF MODAL -->

<!-- Sign up Modal Start -->
<div class="modal fade" id="signupModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                                    <input type="text" placeholder="Enter First Name" name="firstName" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Last Name</b></label>
                                </td>
                                <td>
                                    <input type="text" placeholder="Enter Last Name" name="lastName" required>
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
                                    <input type="text" placeholder="Enter Phone" name="phone" required>
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
                                    <input type="text" placeholder="Enter Address" name="userAddress" required>
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
                                    <input type="date" placeholder="Enter Last donation date" name="lastDonated" >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Total donated</b></label>
                                </td>
                                <td>
                                    <input type="number" placeholder="Enter total donation" name="totalDonated" > Times
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
                                    <input type="email" placeholder="Enter Email" name="userEmail" required>
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
                    <button name="signup" type="submit" class="btn btn-success">Sign Up</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
            <?php
            if (isset($_POST['signup']) && !empty($_REQUEST['firstName'])) {
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
                    user_email,
                    user_password
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
                    '$_POST[userEmail]',
                    '$_POST[userPassword]'

                    )";
                    if (!mysql_query($sql)) {
                        die('Error:' . mysql_error());
                    }
                }
            }
            ?>

        </div>
    </div>
</div>
<!-- END OF Sign up MODAL -->