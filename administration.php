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
            <div class="col-sm-8 text-left"
            <br>
            <br>
            <li class="active "><a href="add_user.php">Add user</a></li>
            <br>
            <li class="active "><a href="review_signup.php">Review sign up</a></li>
            <br>
            <?php if ($_SESSION['user_type_id'] == 1) {
                ?>
                <li class="active "><a href="admins.php">Manage admins</a></li>
            <?php
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