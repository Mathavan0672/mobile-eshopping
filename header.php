<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- TITLE -->
    <title>Mobile Shopping - Samsung Best Deals</title>
    <!-- META DESCRIPTION -->
    <meta name="description"
        content="Hello there! You will now be amongst the first to hear the deals of our special price promotion" />
    <!-- META KEYWORD -->
    <meta name="keywords" content="Apple, Samsung, Vivo, Oppo, Radmi, Huawei, Headphones" />
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/ico" href="./favicon.ico" />
    <!-- CSS -->
    <link rel="stylesheet" href="./server.css" />
    <!-- Bootstap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <!-- Owl Carousel 2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Font-awesome-Icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php
        require('functions.php');
        ?>
</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <div class="container">
            <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
                <p class="font-rubik font-size-12 text-black-50 m-0">
                    Shop Add. No.73, Jalan Samarinda 28, Taman Mewah Jaya, 41200 Klang.
                </p>

                <div class="font-baloo font-size-16 text-danger">
                    <a href="login.php" class="border-right border-left px-3">Login</a>
                    <a href="logout.php" class="border-right border-left px-3">Logout</a>
                    <!-- <a href="login.php" class="border-right border-left px-3">Login</a> -->
                    <a href="./wishlist.php" class="border-right px-3 ">WishList
                        <span>( <?php echo count($product->getData('wishlist')) ?? 0 ;?> )</span></a>
                </div>
            </div>

            <!-- PRIMARY NAVIGATION -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php">Mobile Ecommerce</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto font-rubik">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">On Sale</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Category <i class="fas fa-chevron-down"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Blog <i class="fas fa-chevron-down"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Coming Soon</a>
                        </li>
                    </ul>
                </div>
                <form action="#" class="font-rale font-size-12">
                    <a href="./cart.php" class="py-2 rounded-pill color-yellow-bg">
                        <span class="text-dark px-2"><i class="fas fa-shopping-cart"></i></span>
                        <span
                            class="px-2 py-1 rounded-circle bg-light text-danger m-0"><?php echo count($product->getData('cart'))?></span>
                    </a>
                </form>
            </nav>
            <!-- #PRIMARY NAVIGATION -->
        </div>
    </header>
    <!-- #HEADER -->

    <!-- MAIN SITE -->
    <main id="main-site">