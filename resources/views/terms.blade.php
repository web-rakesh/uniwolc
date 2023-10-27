<?php include('includes/config.php');
// PHP program to calculate the sum of digits
function sum($num)
{
    $sum = 0;
    for ($i = 0; $i < strlen($num); $i++) {
        $sum += round($num[$i]);
    }
    return $sum;
}

if (isset($_REQUEST['submit'])) {
    header('location:search.php?category=' . $_REQUEST['category'] . '&position=' . $_REQUEST['position'] . '&number=' . $_REQUEST['number'] . '&sum=' . $_REQUEST['sum_number'] . '&price=' . $_REQUEST['price']);
}

if (isset($_REQUEST['search_number'])) {
    header('location:search.php?category=' . $_REQUEST['category'] . '&position=' . $_REQUEST['position'] . '&number=' . $_REQUEST['number'] . '&sum=' . $_REQUEST['sum_number'] . '&price=' . $_REQUEST['price']);
}
$home_meta = mysqli_fetch_array(mysqli_query($CONN, "SELECT * FROM `meta_settings` WHERE `id` = '3'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Uniocde -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow" />
    <!--[if IE]>
    <meta http-equiv="X-UA Compatible" content="IE=edge">
    <![endif]-->
    <!-- Title -->
    <?php if ($_REQUEST['title'] == '') { ?>
        <?= $home_meta['description'] ?>
    <?php } else {
        $category_data = mysqli_fetch_array(mysqli_query($CONN, "SELECT * FROM `categories` WHERE `id` = '" . $_REQUEST['category'] . "'")); ?>
        <title><?= str_replace('-', ' ', $_REQUEST['title']) ?> | Numberwala</title>
        <meta name="keywords" content="<?= $category_data['meta_description'] ?>" />
        <meta name="description" content="<?= $category_data['meta_keyword'] ?>">
    <?php } ?>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= $baseURL ?>assets1/images/favicon.png">
    <!-- Animations -->
    <!--<link rel="stylesheet" href="assets/css/animations.css" type="text/css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <!-- owl carousel Slider -->
    <link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/css/owl.theme.default.min.css">
    <!-- Slick Slider -->
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css'>
    <link rel='stylesheet' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
    <link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/css/animate.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $baseURL ?>assets/css/rs-spacing.css" type="text/css">
    <link rel="stylesheet" href="<?= $baseURL ?>assets/css/menu.css" type="text/css">
    <link rel="stylesheet" href="<?= $baseURL ?>assets/css/component.css" type="text/css">
    <link rel="stylesheet" href="<?= $baseURL ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= $baseURL ?>assets/css/responsive.css" type="text/css">
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .vipNumberDesktopBox {
            display: none;
        }

        .vipNumberMobileBox {
            display: none;
        }

        .view_more_area {
            text-align: center;
        }

        .view_more_area .view_more_btn {
            padding: 10px 25px;
            font-size: 14px;
        }

        .view_more_area .view_more_btn:before {
            display: none;
        }

        .desktopview_more_area {
            display: block;
        }

        .mobileview_more_area {
            display: none;
        }

        @media(max-width:575px) {
            .desktopview_more_area {
                display: none;
            }

            .mobileview_more_area {
                display: block;
            }
        }


        /* Preloader */

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            /* change if the mask should have another color then white */
            z-index: 99;
            /* makes sure it stays on top */
        }

        #status {
            width: 285px;
            height: 200px;
            position: absolute;
            left: 50%;
            /* centers the loading animation horizontally one the screen */
            top: 50%;
            /* centers the loading animation vertically one the screen */
            background-image: url(assets/images/status.gif);
            /* path to your loading animation */
            background-repeat: no-repeat;
            background-position: center;
            margin: -100px 0 0 -100px;
            /* is width and height divided by two */
        }
    </style>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5DKCB64');
    </script>
    <!-- End Google Tag Manager -->

</head>

<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<?php $category_name = mysqli_fetch_array(mysqli_query($CONN, "SELECT * FROM `categories` WHERE `id` = '" . $_REQUEST['category'] . "'")); ?>

<body class="sticky-header">

    <?php include('includes/header.php'); ?>

    <main class="body_container">

        <section class="page_breadcrumbs_sec">
            <div class="container">
                <div class="page_breadcrumbs_secinner">
                    <div class="page_breadcrumbs_content">
                        <h1 class="page_title"><?php if ($_REQUEST['title'] == '') { ?>Premium Numbers<?php }
                                                                                                    if ($_REQUEST['title'] != '') { ?><?= $category_name['category'] ?><?php } ?></h1>
                        <ul class="breadcrumbs">
                            <li><a href="https://numberwala.in/">Home</a></li>
                            <li><span>Premium Numbers</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-80 pb-80 listing_page_sec">
            <div class="container ">
                <div class="listing_page_secinner ">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 listing_sidebar_shop ">
                            <div class="listing_left_sidebar">
                                <div class="sidebar_backdrop"></div>
                                <div class="listing_left_sidebar_container">
                                    <div class="sidebar_head">
                                        <a class="toggle_action" href="javascript:void(0)"><span class="txt" style="color:#1a1a1a;">Filter</span> <!--<i class="fa-light fa-filter"></i>--></a>
                                    </div>
                                    <div class="listing_sidebar_scrollable">
                                        <div class="listing_sidebar_blk_area">

                                            <div class="listing_sidebar_blk">
                                                <div class="listing_sidebar_header">
                                                    <h3>Sum Total</h3>
                                                </div>
                                                <div class="listing_sidebar_details" <?php if ($_REQUEST['sum'] != '') { ?> style="display:block;" <?php } ?>>
                                                    <div class="listing_sidebar_search_area">
                                                        <form>
                                                            <div class="listing_sidebar_search_areainner">
                                                                <input type="text" name="sum_number" class="form-control" value="<?= $_REQUEST['sum'] ?>" placeholder="Enter Number Like 1 to 9">
                                                                <button type="submit" name="submit" class="search_btn"><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="listing_sidebar_blk">
                                                <div class="listing_sidebar_header">
                                                    <h3>Categories</h3>
                                                </div>
                                                <div class="listing_sidebar_details" <?php if ($_REQUEST['category'] != '') { ?> style="display:block;" <?php } ?>>
                                                    <div class="listing_sidebar_category_area">
                                                        <div class="listing_sidebar_category_hd_ttl">
                                                        </div>
                                                        <ul class="listing_sidebar_category_list">
                                                            <li class="listing_sidebar_category_item"><a class="listing_sidebar_category_item_link" href="https://numberwala.in/premium-number">All Categories</a></li>
                                                            <?php $categories = mysqli_query($CONN, "SELECT * FROM `categories` ORDER BY `category` ASC");
                                                            while ($categoriesArr = mysqli_fetch_array($categories)) { ?>
                                                                <li class="listing_sidebar_category_item <?php if ($_REQUEST['category'] == $categoriesArr['id']) { ?>active<?php } ?>">
                                                                    <a href="https://numberwala.in/category/<?= $categoriesArr['id'] ?>/<?= strtolower($categoriesArr['slug']) ?>" class="listing_sidebar_category_item_link"><?= $categoriesArr['category'] ?></a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="listing_sidebar_blk">
                                                <div class="listing_sidebar_header">
                                                    <h3>Pricing</h3>
                                                </div>
                                                <div class="listing_sidebar_details" <?php if ($_REQUEST['price'] != '') { ?> style="display:block;" <?php } ?>>
                                                    <div class="listing_sidebar_price_area">

                                                        <ul class="listing_sidebar_category_list">
                                                            <li class="listing_sidebar_category_item <?php if ($_REQUEST['price'] == '') { ?>active<?php } ?>">
                                                                <a href="<?= $baseURL ?>premium-number.php?category=<?= $_REQUEST['category'] ?>&position=<?= $_REQUEST['position'] ?>&number=<?= $_REQUEST['number'] ?>&price=" class="listing_sidebar_category_item_link">Any Price</a>
                                                            </li>
                                                            <li class="listing_sidebar_category_item <?php if ($_REQUEST['price'] == '0-1500') { ?>active<?php } ?>">
                                                                <a href="<?= $baseURL ?>premium-number.php?category=<?= $_REQUEST['category'] ?>&position=<?= $_REQUEST['position'] ?>&number=<?= $_REQUEST['number'] ?>&price=0-1500" class="listing_sidebar_category_item_link">0 - 1500</a>
                                                            </li>
                                                            <li class="listing_sidebar_category_item <?php if ($_REQUEST['price'] == '1501-3000') { ?>active<?php } ?>">
                                                                <a href="<?= $baseURL ?>premium-number.php?category=<?= $_REQUEST['category'] ?>&position=<?= $_REQUEST['position'] ?>&number=<?= $_REQUEST['number'] ?>&price=1501-3000" class="listing_sidebar_category_item_link">1501 - 3000</a>
                                                            </li>
                                                            <li class="listing_sidebar_category_item <?php if ($_REQUEST['price'] == '3001-5000') { ?>active<?php } ?>">
                                                                <a href="<?= $baseURL ?>premium-number.php?category=<?= $_REQUEST['category'] ?>&position=<?= $_REQUEST['position'] ?>&number=<?= $_REQUEST['number'] ?>&price=3001-5000" class="listing_sidebar_category_item_link">3001 - 5000</a>
                                                            </li>
                                                            <li class="listing_sidebar_category_item <?php if ($_REQUEST['price'] == '5001-10000') { ?>active<?php } ?>">
                                                                <a href="<?= $baseURL ?>premium-number.php?category=<?= $_REQUEST['category'] ?>&position=<?= $_REQUEST['position'] ?>&number=<?= $_REQUEST['number'] ?>&price=5001-10000" class="listing_sidebar_category_item_link">5001 - 10000</a>
                                                            </li>
                                                            <li class="listing_sidebar_category_item <?php if ($_REQUEST['price'] == '10001-30000') { ?>active<?php } ?>">
                                                                <a href="<?= $baseURL ?>premium-number.php?category=<?= $_REQUEST['category'] ?>&position=<?= $_REQUEST['position'] ?>&number=<?= $_REQUEST['number'] ?>&price=10001-30000" class="listing_sidebar_category_item_link">10001 - 30000</a>
                                                            </li>
                                                            <li class="listing_sidebar_category_item <?php if ($_REQUEST['price'] == '30001-50000') { ?>active<?php } ?>">
                                                                <a href="<?= $baseURL ?>premium-number.php?category=<?= $_REQUEST['category'] ?>&position=<?= $_REQUEST['position'] ?>&number=<?= $_REQUEST['number'] ?>&price=30001-50000" class="listing_sidebar_category_item_link">30001 - 50000</a>
                                                            </li>
                                                            <li class="listing_sidebar_category_item <?php if ($_REQUEST['price'] == '50001-100000') { ?>active<?php } ?>">
                                                                <a href="<?= $baseURL ?>premium-number.php?category=<?= $_REQUEST['category'] ?>&position=<?= $_REQUEST['position'] ?>&number=<?= $_REQUEST['number'] ?>&price=50001-100000" class="listing_sidebar_category_item_link">50001 - 100000</a>
                                                            </li>
                                                            <li class="listing_sidebar_category_item <?php if ($_REQUEST['price'] == '100001-10000000') { ?>active<?php } ?>">
                                                                <a href="<?= $baseURL ?>premium-number.php?category=<?= $_REQUEST['category'] ?>&position=<?= $_REQUEST['position'] ?>&number=<?= $_REQUEST['number'] ?>&price=100001-10000000" class="listing_sidebar_category_item_link">100001 & Above</a>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-12 col-12 listing_view_area ">
                            <div class="listing_search_area">
                                <div class="listing_search_areainner">
                                    <form>
                                        <div class="listing_search_form_area">
                                            <select name="position" class="form-control select_dropdown">
                                                <option value="Anywhere" <?php if ($_REQUEST['position'] == 'Anywhere') { ?> selected <?php } ?>>Anywhere</option>
                                                <option value="End With" <?php if ($_REQUEST['position'] == 'End With') { ?> selected <?php } ?>>End With</option>
                                                <option value="Start With" <?php if ($_REQUEST['position'] == 'Start With') { ?> selected <?php } ?>>Start With</option>
                                            </select>
                                            <input type="text" name="number" class="form-control" placeholder="Search Number" value="<?= $_REQUEST['number'] ?>">
                                            <button type="submit" name="search_number" class="theme_btn"><span class="txt"><i class="fa-solid fa-magnifying-glass"></i> Search</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div class="listing_view_areainner ">
                                <div class="vip_number_listing_secinner">
                                    <div class="row row_box">

                                        <?php

                                        $query = "SELECT * FROM `vip_numbers` WHERE `status` = 'Y'";

                                        if (!empty($_REQUEST['sum'])) {
                                            $query .= " AND `number_sum` = '" . $_REQUEST['sum'] . "'";
                                        }

                                        if (!empty($_REQUEST['category'])) {
                                            $query .= " AND `category` = '" . $_REQUEST['category'] . "'";
                                        }

                                        if (!empty($_REQUEST['number'])) {
                                            $number = $_REQUEST['number'];
                                            $position = $_REQUEST['position'];

                                            if ($position == 'Anywhere') {
                                                $query .= " AND (`numbers` LIKE '%" . $number . "%' OR `vip_number` LIKE '%" . $number . "%')";
                                            } elseif ($position == 'End With') {
                                                $query .= " AND (`numbers` LIKE '%" . $number . "' OR `vip_number` LIKE '%" . $number . "')";
                                            } elseif ($position == 'Start With') {
                                                $query .= " AND (`numbers` LIKE '" . $number . "%' OR `vip_number` LIKE '" . $number . "%')";
                                            }
                                        }

                                        if (!empty($_REQUEST['price'])) {
                                            $price = explode("-", $_REQUEST['price']);
                                            $start_price = $price[0];
                                            $end_price = $price[1];
                                            $query .= " AND `sale_price` BETWEEN '$start_price' AND '$end_price'";
                                        }


                                        // pagination

                                        if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                        } else {
                                            $pageno = 1;
                                        }

                                        $total_rows = $CONN->query($query)->num_rows;

                                        $no_of_records_per_page = 21;
                                        $offset = ($pageno-1) * $no_of_records_per_page;

                                        $total_pages = ceil($total_rows / $no_of_records_per_page);


                                        $query .= " ORDER BY RAND() LIMIT $offset, $no_of_records_per_page";
                                        $numbers = $CONN->query($query);



                                        if (mysqli_num_rows($numbers) > 0) {
                                            while ($numbersArr = mysqli_fetch_array($numbers)) {

                                                $num = sum($numbersArr['vip_number']);
                                                $sum = 0;
                                                $rem = 0;
                                                for ($i = 0; $i <= strlen($num); $i++) {
                                                    $rem = $num % 10;
                                                    $sum = $sum + $rem;
                                                    $num = $num / 10;
                                                }

                                        ?>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 vip_number_box vip_number_box1 column_box vipNumberDesktopBox">
                                                    <div class="vip_number_boxinner">
                                                        <div class="vip_number_box_area">
                                                            <div class="amount">₹ <?= number_format($numbersArr['sale_price']) ?>/-</div>
                                                            <h2 class="number"><?= $numbersArr['vip_number'] ?></h2>
                                                            <div class="sum_total">
                                                                <h3 class="ttl" style="font-size: 16px;">SUM-TOTAL<b></br>
                                                                    </b>
                                                                    <?php

                                                                    $tsub = array_sum(str_split($numbersArr['vip_number']));
                                                                    $sudfd = array_sum(str_split($tsub));
                                                                    $sud = array_sum(str_split($sudfd));

                                                                    echo $tsub . ' - ';
                                                                    if ($sudfd != $sud) {
                                                                        echo $sudfd . ' - ' . $sud;
                                                                    } else {
                                                                        echo $sudfd;
                                                                    }
                                                                    ?>

                                                                </h3>
                                                                <a href="<?= $baseURL ?>vanity-number.php?number=<?= $numbersArr['vip_number'] ?>" class="view_details_link">View Details</a>
                                                            </div>
                                                            <div class="higlight_txt">Ready to Port</div>
                                                            <div class="vip_number_box_btn_area">
                                                                <!--<a href="vanity-number.php?number=<?= $numbersArr['vip_number'] ?>" class="enquire_btn vip_number_box_btn"><span class="txt">Enquire Now</span></a>-->
                                                                <a href="<?= $baseURL ?>buy_now.php?number=<?= $numbersArr['vip_number'] ?>" class="theme_btn2 vip_number_box_btn"><span class="txt">Buy Now</span></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 columnBox vipNumberBox vipNumberMobileBox">
                                                    <div class="vipNumberBoxinner">
                                                        <div class="vipNumberBoxTop">
                                                            <h2><?= $numbersArr['vip_number'] ?></h2>
                                                        </div>
                                                        <div class="vipNumberBoxMiddle">
                                                            <h4>
                                                                Sum -
                                                                <?= $tsub ?>
                                                                | Total =
                                                                <?= $sud ?>
                                                            </h4>
                                                        </div>
                                                        <div class="vipNumberBoxBtm">
                                                            <div class="numberPrice">
                                                                <span class="currentPrice">
                                                                    ₹
                                                                    <?= number_format($numbersArr['sale_price']) ?>/-
                                                                </span>
                                                                <span class="oldPrice"></span>
                                                            </div>
                                                            <a href="buy_now.php?number=<?= $numbersArr['vip_number'] ?>" class="buyNowBtn">
                                                                <span class="txt">Buy Now</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php }
                                        } else { ?>
                                            <div style="padding:75px 0; text-align:center;">
                                                <div>
                                                    <h4>Ooops, Item Not Found.</h4>
                                                </div>
                                                <div>Try rewarding your search or entering a new number.</div>
                                            </div>
                                        <?php } ?>

                                    </div>



                                    <ul class="pagination" style="display: flex; justify-content: space-between;">

                                        <li class="nav-item <?php if($pageno <= 1){ echo 'disabled'; } ?>" style="margin-right:10px;">

                                            <?php
                                                $presld = [];

                                                if ($pageno > 1) {
                                                    $presld[] = "pageno=" . ($pageno - 1);
                                                }

                                                foreach ($_GET as $key => $value) {
                                                    if ($key != 'pageno') {
                                                        $presld[] = "$key=$value";
                                                    }
                                                }
                                            ?>

                                            <a class="theme_btn2 vip_number_box_btn" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?".implode('&', $presld); } ?>">Prev</a>

                                        </li>

                                        <li class="nav-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">

                                            <?php
                                                $nextsld = [];

                                                if ($pageno >= 1) {
                                                    $nextsld[] = "pageno=" . ($pageno + 1);
                                                }

                                                foreach ($_GET as $key => $value) {
                                                    if ($key != 'pageno') {
                                                        $nextsld[] = "$key=$value";
                                                    }
                                                }
                                            ?>

                                            <a class="btn-sm theme_btn2 vip_number_box_btn" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?".implode('&', $nextsld); } ?>">Next</a>
                                        </li>
                                    </ul>

                                    <?php if (mysqli_num_rows($numbers) > 24) { ?>
                                        <div class="view_more_area desktopview_more_area">
                                            <a href="#" id="loadMore1" class="theme_btn view_more_btn"><span class="txt">View More</span></a>
                                        </div>
                                        <div class="view_more_area mobileview_more_area">
                                            <a href="#" id="loadMore2" class="theme_btn view_more_btn"><span class="txt">View More</span></a>
                                        </div>
                                    <?php } ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>


    <?php include('includes/footer.php'); ?>

    <!-- Javascript Files -->
    <script src="<?= $baseURL ?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?= $baseURL ?>assets/js/classie.js"></script>
    <script type="text/javascript" src="<?= $baseURL ?>assets/js/cbpAnimatedHeader.js"></script>
    <script type="text/javascript" src="<?= $baseURL ?>assets/js/owl.carousel.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js'></script>
    <script src="<?= $baseURL ?>assets/js/main.js"></script>

    <script>
        $(window).ready(function() {
            if ($(window).width() <= 575) {
                $(".vipNumberMobileBox").slice(0, 24).show();
                $("#loadMore2").on("click", function(e) {
                    e.preventDefault();
                    $(".vipNumberMobileBox:hidden").slice(0, 24).slideDown();
                    if ($(".vipNumberMobileBox:hidden").length == 0) {
                        $("#vipNumberMobileBox").text("No Content").addClass("noContent");
                    }
                });
            } else {
                $(".vipNumberDesktopBox").slice(0, 24).show();
                $("#loadMore1").on("click", function(e) {
                    e.preventDefault();
                    $(".vipNumberDesktopBox:hidden").slice(0, 24).slideDown();
                    if ($(".vipNumberBox:hidden").length == 0) {
                        $("#vipNumberDesktopBox").text("No Content").addClass("noContent");
                    }
                });
            }
        });
    </script>

    <script>
        $(window).on("load", function() {
            // makes sure the whole site is loaded
            $("#status").fadeOut(); // will first fade out the loading animation
            $("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
        });
    </script>

</body>

</html>
