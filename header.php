<header id="masthead" class="site-header">
    <div id="header-1" class="header-area header-fixed " style="top: 0px;">
        <div id="tophead" class="header-top-bar align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tophead-contact">
                            <ul>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+44 20 8590 4858">+44 20 8590 4858</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:71sizzling@gmail.com">71sizzling@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tophead-right tophead-address">
                            <i class="fa fa-map-marker" aria-hidden="true"></i><span> 71, Chadwell heath lane, Romford, United Kingdom</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container masthead-container" id="sticker">
            <div class="row">
                <div class="col-sm-2 col-xs-12">
                    <div class="site-branding">
                        <a class="dark-logo" href="index.php"><img src="assets/img/sizzling-logo.png" alt="<?php echo $config['SITE_NAME'] = 'SIZZLING'; ?>"></a>
                        <a class="light-logo" href="index.php"><img src="assets/img/sizzling-logo.png" alt="<?php echo $config['SITE_NAME'] = 'SIZZLING'; ?>"></a>
                    </div>
                </div>
                <div class="col-sm-10 col-xs-12">
                    <?php
                    $arr1 = array();
                    $sql1 = "SELECT * FROM tbl_product_category WHERE product_category_parent_id=0";
                    $res1 = mysqli_query($con, $sql1);
                    ?>
                    <div id="site-navigation" class="main-navigation">
                        <nav class="menu-main-menu-container">
                            <ul id="menu-main-menu" class="menu">
                                <li id="menu-item-3067" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-3067"><a href="index.php">Home</a></li>
                                <li id="menu-item-460" class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-320 menu-item-460">
                                    <a href="about-us.php">About</a></li>
<!--                                <li id="menu-item-3113" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-3113"><a href="#">Menu</a>-->
<!--                                    <ul class="sub-menu">-->
<!--                                        <li><a href="christmas-menu.php">Christmas Menu</a></li>-->
<!--                                        <li><a href="ala-carte.php">Ala Carte</a></li>-->
<!--                                        <li><a href="valentine-menu.php">Valentine Menu</a></li>-->
<!--                                        <li><a href="allergen-chart.php">Allergen Chart</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
                                <li id="menu-item-3264" class="menu-item"><a href="order-online.php">Order online</a></li>
                                <li id="menu-item-3116" class="menu-item"><a href="gallery.php">Gallery</a></li>
                                <!--                                <li id="menu-item-451" class="menu-item"><a href="reservation.php">Reservation</a></li>-->
                                <li id="menu-item-2399" class="menu-item"><a href="contact-us.php">Contact</a></li>
                                <?php if (checkUserLogin()): ?>
                                    <li id="menu-item-3113" class="menu-item"><a href="dashboard.php"><i class="fa fa-user"></i><?php echo getSession("user_name"); ?></a>
                                    </li>
                                <?php else: ?>
                                    <li id="menu-item-3113" class="menu-item menu-item-has-children"><a href="#"><i class="fa fa-user"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                                            <li><a href="registration.php">Registration</a></li>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Login to Your Account</h1><br>
            <form id="login-form" method="POST" action="">
                <input type="text" name="login_user_mobile" id="login_user_mobile" placeholder="Your Email Address" required="required">
                <input type="password" name="login_user_password" id="login_user_password" placeholder="Your Password" required="required">
                <button name="btnLogin" class="btn btn-block btn-lg btn-primary btn-login btn-send-message" type="button" return="false" id="btnLogin">Login</button>
            </form>
            <div class="login-help">
                <a href="registration.php">Register</a> - <a href="#">Forgot Password</a>
            </div>
        </div>
    </div>
</div>
<div class="se-pre-con"></div>
