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
                <ul class="treeview-menu">
                    <li id="bannerActive"><a href="<?php echo baseUrl('admin/view/banner/index.php'); ?>"><i class="fa fa-circle-o"></i> Banner</a></li>
                    <li id="reviewActive"><a href="<?php echo baseUrl('admin/view/review/index.php'); ?>"><i class="fa fa-circle-o"></i> Clients Review</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cutlery"></i>
                    <span>Online Order Menu</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="proCategoryActive"><a href="<?php echo baseUrl('admin/view/menu_category/index.php'); ?>"><i class="fa fa-circle-o"></i> Menu Category</a></li>
                    <li id="productActive"><a href="<?php echo baseUrl('admin/view/menu/list.php'); ?>"><i class="fa fa-circle-o"></i> Menu List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cart-arrow-down"></i>
                    <span>Order Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="orderActive"><a href="<?php echo baseUrl('admin/view/order/index.php'); ?>"><i class="fa fa-circle-o"></i> Recent Orders</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-image-o"></i>
                    <span>Gallery Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="galleryActive"><a href="<?php echo baseUrl('admin/view/gallery/index.php'); ?>"><i class="fa fa-circle-o"></i> Gallery Image</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>User Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="userActive"><a href="<?php echo baseUrl('admin/view/user/index.php'); ?>"><i class="fa fa-circle-o"></i> Registered Users</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-inbox"></i>
                    <span>Contact Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="contactActive"><a href="<?php echo baseUrl('admin/view/contact/index.php'); ?>"><i class="fa fa-circle-o"></i> Contact list</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>