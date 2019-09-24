<?php
include './config/config.php';
if (isset($_GET['name'])) {
    $product_category_id = $_GET['name'];
}
$product_category_id;
$name = str_replace('-', ' ', $product_category_id);
$product_category_name = $name;
//get category data
$sqlCategory = "SELECT product_category_id,product_category_name,product_category_description, product_category_keywords FROM tbl_product_category WHERE product_category_name = '$product_category_name'";
$resultCategory = mysqli_query($con, $sqlCategory);
if ($resultCategory) {
    $productListCategory = mysqli_fetch_object($resultCategory);
}
$product_category_id = $productListCategory->product_category_id;
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $config['SITE_NAME']; ?> | <?php echo $product_category_name; ?></title>
    <meta name="description" content="<?php echo $productListCategory->product_category_description; ?>">
    <meta name="keywords" content="<?php echo $productListCategory->product_category_keywords; ?>">
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="author" content="Nazrul Kabir">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "header_script.php"; ?>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <style>
        .pagination > li > a, .pagination > li > span {color: black;}
        .pagination > li > a, .pagination > li > span {padding: 11px 12px;}
    </style>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Body main wrapper start -->
<div class="wrapper fixed__footer">
    <!-- Start Header Style -->
    <?php include "header.php"; ?>
    <!-- End Header Style -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <?php
                        $product_category_name;
                        ?>
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title"><?php echo $productListCategory->product_category_name; ?></h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Products</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Our Product Area -->
    <section class="htc__product__area shop__page ptb--110 bg__white">
        <div class="container">
            <div class="htc__product__container">
                <!-- Start Product MEnu -->
                <div class="row">
                    <div class="product__list">
                        <?php
                        $array = array();
                        $sql = "SELECT * FROM tbl_product WHERE product_category_id = '$product_category_id' ORDER BY product_id";
                        $result = mysqli_query($con, $sql);
                        $total = mysqli_num_rows($result);
                        $adjacents = 6;
                        $targetpage = "category.php";
                        $limit = 20;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 0;
                        }
                        if ($page) {
                            $start = ($page - 1) * $limit;
                        } else {
                            $start = 0;
                        }
                        if ($page == 0) {
                            $page = 1;
                        }
                        $prev = $page - 1;
                        $next = $page + 1;
                        $lastpage = ceil($total / $limit);
                        $lpm1 = $lastpage - 1;
                        $sql2 = "SELECT * FROM tbl_product WHERE product_category_id = $product_category_id ORDER BY product_id DESC LIMIT $start ,$limit";
                        $sql_query = mysqli_query($con, $sql2);
                        while ($productList = mysqli_fetch_object($sql_query)) {
                            $array[] = $productList;
                        }
                        /* CREATE THE PAGINATION */
                        $counter = 0;
                        $pagination = "";
                        if ($lastpage > 1) {
                            $pagination .= "<nav aria-label=\"Page navigation example\">";
                            $pagination .= "<ul class='pagination pg-blue'>";
                            if ($page > $counter + 1) {
                                $pagination .= "<li class='page-item'><a href=\"$targetpage?page=$prev&name=$product_category_name\">Prev</a></li>";
                            }
                            if ($lastpage < 7 + ($adjacents * 2)) {
                                for ($counter = 1; $counter <= $lastpage; $counter++) {
                                    if ($counter == $page) {
                                        $pagination .= "<li class='page-item active'><a class='page-link' href='#'>$counter</a></li>";
                                    } else {
                                        $pagination .= "<li class='page-item'><a class='page-link' href=\"$targetpage?page=$counter&name=$product_category_name\">$counter</a></li>";
                                    }
                                }
                            } elseif ($lastpage > 5 + ($adjacents * 2)) {
                                if ($page < 1 + ($adjacents * 2)) {
                                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                                        if ($counter == $page)
                                            $pagination .= "<li class='active'><a href='#' >$counter</a></li>";
                                        else
                                            $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                    }
                                    $pagination .= "<li></li>";
                                    $pagination .= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                                    $pagination .= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";
                                }
                                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                                    $pagination .= "<li><a href=\"$targetpage?page=1\">1</a></li>";
                                    $pagination .= "<li><a href=\"$targetpage?page=2\">2</a></li>";
                                    $pagination .= "<li></li>";
                                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                                        if ($counter == $page) {
                                            $pagination .= "<li class='active'><a href='#'>$counter</a></li>";
                                        } else {
                                            $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                        }
                                    }
                                    $pagination .= "<li></li>";
                                    $pagination .= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                                    $pagination .= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";
                                } else {
                                    $pagination .= "<li class='page-item'><a class='page-link' href=\"$targetpage?page=1\">1</a></li>";
                                    $pagination .= "<li class='page-item'><a class='page-link' href=\"$targetpage?page=2\">2</a></li>";
                                    $pagination .= "<li class='page-item'></li>";
                                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                                        if ($counter == $page) {
                                            $pagination .= "<li class='page-item active'><a class='page-link' href='#'>$counter</a></li>";
                                        } else {
                                            $pagination .= "<li class='page-item'><a class='page-link' href=\"$targetpage?page=$counter\">$counter</a></li>";
                                        }
                                    }
                                }
                            }
                            if ($page < $counter - 1) {
                                $pagination .= "<li><a href=\"$targetpage?page=$next&id=$product_category_id\">Next</a></li>";
                            } else {
                                $pagination .= "";
                                $pagination .= "</ul>\n";
                                $pagination .= "</nav>\n";
                            }
                        }
                        ?>
                        <!-- Start Single Product -->
                        <?php foreach ($array AS $productList): ?>
                            <!--                        --><?php //debug($productList); ?>
                            <div class="col-md-3 single__pro col-lg-3 col-sm-4 col-xs-12">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <?php if($productList->product_status !== 'Active') : ?>
                                            <div class="ribbon red"><span>SOLD OUT</span></div>
                                        <?php endif; ?>
                                        <div class="pro__thumb">
                                            <a href="product-details?id=<?php echo $productList->product_id; ?>">
                                                <img src="upload/product_image/<?php echo $productList->product_image; ?>" alt="<?php echo $productList->product_title; ?>">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a title="Quick View" class="quick-view modal-view detail-link" href="product-details?id=<?php echo $productList->product_id; ?>"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="#.html"><span class="ti-shopping-cart"></span></a></li>
                                            </ul>
                                        </div>
                                        <div class="add__to__wishlist">
                                            <a data-toggle="tooltip" title="Add To Wishlist" class="add-to-cart" href="#"><span class="ti-heart"></span></a>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="product-details?id=<?php echo $productList->product_id; ?>"><?php echo $productList->product_title; ?></a></h2>
                                        <ul class="product__price">
                                            <?php if($productList->product_old_price != '0.00') : ?>
                                                <li class="old__price">৳<?php echo $productList->product_new_price; ?></li>
                                            <?php endif; ?>
                                            <li class="new__price">৳<?php echo $productList->product_new_price; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- End Single Product -->
                    </div>
                </div>
                <!-- Start Load More BTn -->
                <div class="row mt--60">
                    <div class="col-md-12">
                        <div class="htc__loadmore__btn">
                            <!--                        <a href="#">load more</a>-->
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
                <!-- End Load More BTn -->
            </div>
        </div>
    </section>
    <?php include 'footer.php' ?>
    <!-- End Footer Area -->
</div>
<!-- Placed js at the end of the document so the pages load faster -->
<?php include 'footer_script.php'?>
</body>
</html>