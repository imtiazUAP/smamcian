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

            <marquee><span style="font-size: 22px; color: red">Login Failed, Please try again or if you forgot your password then as admins to reset your password</span></span>
            </marquee>

            <center>
                <div style="">
                    <img src="images/system/login_failed.png" width="20%" alt="Login failed">
                </div>
            </center>
            <div>
                <h4 style="color: red">যে যে কারনে সাইন ইন ফেইল হতে পারে...</h4>

                <div>
                    <ol>
                        <li>আপনার ইমেইল অথবা পাসওয়ার্ড টাইপ করতে ভুল হয়েছে</li>
                        <li>আপনি আপনার পাসওয়ার্ড ভুলে গেছেন</li>
                        <li>আপনি smamcian এর রেজিস্টার্ড মেম্বার নন</li>
                        <li>আপনার মেম্বারশীপ এখনো এডমিন মহোদয় একসেপ্ট করেন নি</li>
                    </ol>
                </div>
            </div>
            <br>

            <div>
                <h4 style="color: green">যেভাবে নতুন পাসওয়ার্ড পেতে পারেন</h4>

                <div>
                    <ol>
                        <li>ইমেইল এবং পাসওয়ার্ড আবার সঠিকভাবে দিয়ে চেস্টা করুনয়েছে</li>
                        <li>এডমিনদের কাওকে আপনার নতুন পাসওয়ার্ড সেট করার জন্য অনুরোধ করুন</li>
                        <li>এখনো সাইন-আপ না করে থাকলে সাইন-আপ করুন এবং এডমিন এপ্রুভালের জন্যে অপেক্ষা করুন</li>
                    </ol>
                </div>
            </div>
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