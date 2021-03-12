<?php
include_once 'classes/EmailController.php';
$error="";
$email="";
$heading="Subscribe to newsletter";
$paragraph="Subscribe to our newsletter and get 10% discount on pineapple glasses.";
$success=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    if($email=="") {
        $error="Email address is required";
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error="Please provide a valid e-mail address";
    }
    else if(substr($email,-3)==".co") {
        $error="We are not accepting subscriptions from Colombia emails";
    }
    else if(!array_key_exists("tos",$_POST)) {
        $error="You must accept the terms and conditions";
    }
    else {
        $ec=new EmailController();
        $ec->saveEmail($email);
        $heading="Thanks for subscribing!";
        $paragraph="You have successfully subscribed to our email listing. Check your email for the discount code.";
        $success=true;
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<html lang="en">
    <head>
        <title>pineapple</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="js/jquery.min.js"></script>
        <script src="js/Validation.js"></script>
    </head>
    <body>
        <div class="content">
            <div class="topbar">
                <div class="pineapple"></div>
                <div class="pineappletext">
                    pineapple.
                </div>
                <div class="links">
                    <ul>
                        <li><a href="">About</a></li>
                        <li><a href="">How it works</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="other">
                <?php if($success): ?><div class="success"></div><?php endif; ?>
                <div class="textblock" style="<?php if($success): echo "margin-top: 30px;"; endif; ?>">
                    <div class="heading">
                        <?php echo $heading ?>
                    </div>
                    <div class="text">
                        <?php echo $paragraph ?>
                    </div>
                </div>
                <?php if(!$success): ?>
                    <form onsubmit="return Validate()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="input">
                            <input type="text" id="email" name="email" placeholder="Type your email address here…" maxlength="320" value="<?php echo $email?>">
                            <button id="submit" class="submit" type="submit"></button>
                        </div>
                        <div class="TOS">
                            <label>I agree to <a href="">terms of service</a>
                                <input type="checkbox" id="tos" name="tos">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div id="error"><?php echo $error ?></div>
                    </form>
                <?php endif; ?>
                <hr style="<?php if($success): echo "margin-top: 50px;"; endif; ?>">
                <div class="social">
                    <a href="" class="icon fbk">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="" class="icon ig">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="icon tw">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="" class="icon yt">
                        <i class="fa fa-youtube-play"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="imagebox"></div>
    </body>
</html>
