<?php
// Assuming $conn is your database connection variable
$conn = mysqli_connect("localhost", "root", "", "login_register");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
$row_count = mysqli_num_rows($select_rows);?><!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acessories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style1.css">
    <style>
        .p-name {
            font-size: 23px;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-4 fixed-top">
        <div class="container">
            <img src="logoimg/logo.png" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i id="bar" class="fa-solid fa-bars"></i></span>
</button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="index1.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogpage.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AboutUspage.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactuspage.php">Contact Us</a>
                    </li>
<li class="nav-item">
    <a href="cart.php">
        <i class="fa-solid fa-bag-shopping"></i>
        <span id="cartItemCount" class="badge badge-pill badge-primary"><?php echo $row_count; ?></span>
    </a>
    <a href="home.php">
        <i class="fa-regular fa-user"></i>
    </a>
</li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="featured" class="my-5 py-5">
        <div class="container  mt-5 py5">
            <h3 class="font-weight-bold">Acessories</h3>
            <hr>
            <p>Here you can check out the Accessories for your computer.</p>
        </div>
        <div class="row mx-auto container">
            <!--first part-->
            <!--first-->
            <div onclick="window.location.href='cases.php'" ; class="product text-center col-lg-4 col-md-4 col-12">
                <img class="img-fluid mb-3" src="catogries/15 Housing-Ideen _ computer, pc bauen, cube würfel.jpeg" alt="">
                <h5 class="p-name">Cases</h5>
            </div>
            <!--second-->
            <div onclick="window.location.href='motherboard.php'" ; class="product text-center col-lg-4 col-md-4 col-12">
                <img class="img-fluid mb-3" src="catogries/ROG STRIX Z490-E GAMING _ Motherboards _ ROG Global.jpeg" alt="">
                <h5 class="p-name">Motherboard</h5>
            </div>
            <!--third-->
            <div onclick="window.location.href='processor.php'" ; class="product text-center col-lg-4 col-md-4 col-12">
                <img class="img-fluid mb-3" src="catogries/13900K.jpg" alt="">
                <h5 class="p-name">Processor</h5>
            </div>
            <!--forth-->
            <div onclick="window.location.href='ram.php'" ; class="product text-center col-lg-4 col-md-4 col-12">
                <img class="img-fluid mb-3" src="catogries/Corsair Vengeance RGB Pro 64GB (4x16GB) DDR4 3200 (PC4-25600) C16 Desktop Memory – Black.jpeg" alt="">
                <h5 class="p-name">RAM</h5>
            </div>
            <!--Second part-->
            <!--first-->
            <div onclick="window.location.href='graphiccard.php'" ; class="product text-center col-lg-4 col-md-4 col-12">
                <img class="img-fluid mb-3" src="catogries/Nvidia GeForce RTX 3090 Ti - The Most Powerful GPU ever to date!.jpeg" alt="">
                <h5 class="p-name">Graphic Card</h5>
            </div>
            <!--second-->
            <div onclick="window.location.href='ssd.php'" ; class="product text-center col-lg-4 col-md-4 col-12">
                <img class="img-fluid mb-3" src="catogries/Samsung 970 EVO Plus NVMe® M_2 SSD 2TB(MZ-V7S2T0B_AM).jpeg" alt="">
                <h5 class="p-name">SSD</h5>
            </div>
            <!--third-->
            <div onclick="window.location.href='powersupply.php'" ; class="product text-center col-lg-4 col-md-4 col-12">
                <img class="img-fluid mb-3" src="catogries/Best Buy_ CORSAIR HX Series HX1200 1200W 80 Plus Platinum Fully Modular ATX Power Supply Black CP-9020140-NA.jpeg" alt="">
                <h5 class="p-name">Power Supply</h5>
            </div>
            <!--forth-->
            <div onclick="window.location.href='harddisk.php'" ; class="product text-center col-lg-4 col-md-4 col-12">
                <img class="img-fluid mb-3" src="catogries/Seagate ST1000DM010 Barracuda - Hard drive - 1 TB - internal - 3_5_ - SATA 6Gb_s - 7200 rpm - buffer_ 64 MB - (Components _ Internal Hard Drives).jpeg.jpeg" alt="">
                <h5 class="p-name">Hard Disk</h5>
            </div>
            <!--third part-->
            <!--first-->
            <div onclick="window.location.href='cpucooler.php'" ; class="product text-center col-lg-4 col-md-4 col-12">
                <img class="img-fluid mb-3" src="catogries/LGA 1366 CPU Cooler Group Test _ bit-tech_net.jpeg" alt="">
                <h5 class="p-name">CPU Cooler</h5>
            </div>
            <!--second-->
            <div onclick="window.location.href='coolingfan.php'" ; class="product text-center col-lg-4 col-md-4 col-12">
                <img class="img-fluid mb-3" src="catogries/Jonsbo FR925 9CM ARGB Computer Case PC Cooling Slient Fan For CPU Cooler Radiator Water Cooling PWM Quiet RGB LED Fan - ARGB.jpeg" alt="">
                <h5 class="p-name">Cooling Fans</h5>
            </div>
            <!--third-->
            <div onclick="window.location.href='coolingsystem.php'" ; class="product text-center col-lg-4 col-md-4 col-12">
                <img class="img-fluid mb-3" src="catogries/images.jpeg" alt="">
                <h5 class="p-name">Liquid Cooler</h5>
            </div>



        </div>

    </section>
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <img src="logoimg/logo.png" alt="">
                <p>Elevate your PC experience with Craft PC. Discover prebuilt PCs, build your custom rig, and shop accessories for the ultimate setup. Your ideal computing world is just a click away!</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <h5 class="pb-2">Featuted</h5>
                <ul class="text-uppercase list-unstyled">
                    <li><a href="#">Pre build</a></li>
                    <li><a href="#">Custom build</a></li>
                    <li><a href="#">Acessories</a></li>
                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6 class="text-uppercase">Address</h6>
                    <p>123 STREET NAEM, CITY, US</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone</h6>
                    <p>(+92)320-8433088</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>zawiyaransari5@gmail.com</p>
                </div>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Instagram</h5>
                <div class="row">
                    <img class="img-fluid w-25 h-100 m-2" src="Instaimg\img1.jpeg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="Instaimg\img2.jpeg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="Instaimg\img3.jpeg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="Instaimg\img4.jpeg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="Instaimg\img5.jpeg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="Instaimg\img6.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="copyright mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <img src="Paymentimg/mastecard.png" alt="">
                    <img src="Paymentimg/jazz.png" alt="">
                    <img src="Paymentimg/banktransfer.png" alt="">
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-nowrap mb-2">
                    <p>Craft PC eCommerce © 2023. All Rights Reserved</p>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>