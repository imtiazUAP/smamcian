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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <hr>
            <h3>History</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est </p>
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