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

            <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
            <div id="wowslider-container1">
                <div class="ws_images"><ul>
                        <li><img src="data1/images/donating_blood_is_not_harmful_for_you_health.jpg" alt="Donating blood is not harmful for you health" title="Donating blood is not harmful for you health" id="wows1_0"/></li>
                        <li><img src="data1/images/save_lives_around_world_donate_blood.png" alt="Save lives around world donate blood" title="Save lives around world donate blood" id="wows1_1"/></li>
                        <li><a href="http://wowslider.net"><img src="data1/images/give_life_via_blood.jpg" alt="http://wowslider.net/" title="Give life via blood" id="wows1_2"/></a></li>
                        <li><img src="data1/images/donate_blood_and_save_lives.jpg" alt="Donate blood and save lives" title="Donate blood and save lives" id="wows1_3"/></li>
                    </ul></div>
                <div class="ws_bullets"><div>
                        <a href="#" title="Donating blood is not harmful for you health"><span><img src="data1/tooltips/donating_blood_is_not_harmful_for_you_health.jpg" alt="Donating blood is not harmful for you health"/>1</span></a>
                        <a href="#" title="Save lives around world donate blood"><span><img src="data1/tooltips/save_lives_around_world_donate_blood.png" alt="Save lives around world donate blood"/>2</span></a>
                        <a href="#" title="Give life via blood"><span><img src="data1/tooltips/give_life_via_blood.jpg" alt="Give life via blood"/>3</span></a>
                        <a href="#" title="Donate blood and save lives"><span><img src="data1/tooltips/donate_blood_and_save_lives.jpg" alt="Donate blood and save lives"/>4</span></a>
                    </div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">wowslideshow</a> by WOWSlider.com v8.7</div>
                <div class="ws_shadow"></div>
            </div>
            <script type="text/javascript" src="engine1/wowslider.js"></script>
            <script type="text/javascript" src="engine1/script.js"></script>
            <!-- End WOWSlider.com BODY section -->

            <h1>Welcome</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <hr>
            <h3>Test</h3>
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