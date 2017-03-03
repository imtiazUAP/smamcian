<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        error_reporting(0);
        session_start() ;
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
        <div class="col-sm-8 text-left"
             <br>
        <br>
            <li class="active "><a href="add_user.php">Add User</a></li>
            <br>
            <li class="active "><a href="review_signup.php">Review Sign Up</a></li>
            <br>
        <?php if($_SESSION['user_type_id'] == 1){
        ?>
            <li class="active "><a href="admins.php">Admins</a></li>
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
include("footer.php");
?>

</body>
</html>