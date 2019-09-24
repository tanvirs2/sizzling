<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li id="dashActive"><a href="<?php echo baseUrl('admin/view/dashboard.php'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>General Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <!--                <ul class="treeview-menu">-->
                <!--                    <li id="deliveryActive"><a href="--><?php //echo baseUrl('admin/view/delivery/index.php'); ?><!--"><i class="fa fa-circle-o"></i> Delivery Charge</a></li>-->
                <!--                </ul>-->
                <ul class="treeview-menu">
                    <li id="bannerActive"><a href="<?php echo baseUrl('admin/view/banner/index.php'); ?>"><i class="fa fa-circle-o"></i> Banner</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cart-plus"></i>
                    <span>Product Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="proCategoryActive"><a href="<?php echo baseUrl('admin/view/product_category/index.php'); ?>"><i class="fa fa-circle-o"></i> Product Category</a></li>
                    <li id="proCollectionActive"><a href="<?php echo baseUrl('admin/view/product_collection/index.php'); ?>"><i class="fa fa-circle-o"></i> Product Collection</a></li>
                    <li id="productActive"><a href="<?php echo baseUrl('admin/view/product/list.php'); ?>"><i class="fa fa-circle-o"></i> Product List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cart-arrow-down"></i>
                    <span>Order Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="orderActive"><a href="<?php echo baseUrl('admin/view/order/index.php'); ?>"><i class="fa fa-circle-o"></i> Orders List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Brand Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="brandActive"><a href="<?php echo baseUrl('admin/view/brand/index.php'); ?>"><i class="fa fa-circle-o"></i> Brand List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span>Contact Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="subscriberActive"><a href="<?php echo baseUrl('admin/view/contact/index.php'); ?>"><i class="fa fa-circle-o"></i> Subscriber List</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>