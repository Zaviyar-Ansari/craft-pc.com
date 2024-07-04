<?php
// Assuming $conn is your database connection variable
$conn = mysqli_connect("localhost", "root", "", "login_register");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
$row_count = mysqli_num_rows($select_rows);?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Custom Select Box</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Toggle class to show/hide dropdown options
            $(".select_wrap .default_option").click(function() {
                $(this).parent().toggleClass("active");
            });

            // Update selected item and image for all dropdown menus
            $(".select_wrap .select_ul li").click(function() {
                var currentele = $(this).html();
                var selectedPriceText = $(this).find("p:last-child").text().replace("PKR", "").trim();
                var selectedPrice = parseFloat(selectedPriceText.replace(/,/g, ""));
                var totalPrice = parseFloat($("#totalPrice").attr("data-total-price") || 0);

                totalPrice += selectedPrice;

                $("#totalPrice").text("Total Price: " + formatPrice(totalPrice) + " PKR").attr("data-total-price", totalPrice);

                $(this).closest(".select_wrap").find(".default_option li").html(currentele);
                var imgSrc = $(this).find('img').attr('src');
                $(this).closest(".select_wrap").siblings(".selected-product").find('.selected-img').attr('src', imgSrc);
                $(this).parents(".select_wrap").removeClass("active");
            });

            // Function to format the price with commas for better readability
            function formatPrice(price) {
                return price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            }
        });
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!--new links-->
    <link href="path/to/bootstrap.min.css" rel="stylesheet">
<link href="path/to/fontawesome.min.css" rel="stylesheet">


    <!--new links end-->
    <link rel="stylesheet" href="customstyle.css">
    <style>
        .option p {
            display: block;
        }
        
        .option .product-info {
            display: inline-block;
            vertical-align: middle;
        }
        
        .option .product-info p {
            margin: 0;
        }
        
        .option img {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            /* Adjust margin as needed */
            max-width: 100px;
            /* Set maximum width */
            max-height: 70px;
            /* Set maximum height */
        }
        
        .selected-product {
            position: fixed;
            left: calc(40% - 800px);
            /* Adjust left position as needed */
            top: 22%;
            transform: translateY(-50%);
        }
        
        .selected-img {
            margin-top: 70px;
            padding-top: 80px;
            max-width: 600px;
            /* Set the maximum width */
            max-height: 580px;
        }
        
        .select_wrap .select_ul {
            position: absolute;
            top: 100%;
            /* Position dropdown below select box */
            left: 0;
            width: 100%;
            background: #fff;
            border-radius: 5px;
            display: none;
            z-index: 1;
            /* Ensure dropdown appears on top */
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
                    <!-- Inside your cart icon -->
<!-- Inside your cart icon -->
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
    <div class="wrapper">
        <div class="title">
            Custom Build
        </div>
        <div class="selected-product">
            <img class="selected-img" src="accessories/customiconimg/download (1).jpeg" alt="Selected Image">
        </div>
        <!-- Case dropdown menu -->
        <div class="select_wrap">
            <!-- Default option for the first dropdown menu -->
            <ul class="default_option">
                <li>
                    <div class="option pizza">
                        <img src="accessories/customiconimg/InWin D-Frame 2_0.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Cases</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Options for the first dropdown menu -->
            <ul class="select_ul">
                <li>
                    <div class="option pizza">
                        <img src="accessories/case/Amazon_com_ Thermaltake Tower 100 Racing Green Edition Tempered Glass Mini Tower Computer Chassis Supports Mini-ITX CA-1R3-00SCWN-00 _ Industrial & Scientific.jpeg.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>The Tower 100 Turquoise Mini Chassis</p>
                            <p>35,939 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                    <!-- Options -->
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/case/Antec Torque Black _ Red - E-ATX.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Torque Black/Red ATX Mid Tower</p>
                            <p>107,188 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                    <!-- Options -->
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/case/3024ac8c-3cfe-41d7-9c52-ede2bc36efeb.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Corsair Alpha Mid-Tower</p>
                            <p>25,384 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                    <!-- Options -->
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/case/download.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Antec Gaming Series 900 Mid-Tower</p>
                            <p>105,334 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                    <!-- Options -->
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/case/Fractal Design Torrent Clear Tempered Glass E-Atx Mid-Tower Case In White.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Fractal Design Torrent White E-ATX Tempered Glass</p>
                            <p>61,841 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                    <!-- Options -->
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/case/Corsair Graphite Series 780T Full Tower PC Case - White (CC-9011059-WW).jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Graphite Series 780T white Full-Tower Case</p>
                            <p>29,500 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                    <!-- Options -->
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/case/Jonsbo Mod3 RGB Cristal Templado USB 3_0.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Jonsbo MOD3 Big-Tower ShowCase Tempered Glass</p>
                            <p>85,139 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                    <!-- Options -->
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/case/Overclockers UK Product Search.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>InWin's KingSize H-Frame open-air Chassis</p>
                            <p>78,943 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                    <!-- Options -->
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/case/NZXT Custom & Prebuilt Gaming PCs, Parts, Peripherals _ NZXT.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>NZXT Vulcan Black Computer Case</p>
                            <p>17,929 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                    <!-- Options -->
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/case/TORQUE BLACK _ WHITE is the Best Cheap Gaming PC Mid Tower Case in australia with E-ATX_Aluminum_USB 3_1 Type-C_Tempered Glass Side Panels - Antec.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Antex TOEQUE White/Black Aluminum ATX Mid Tower</p>
                            <p>121,047 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                    <!-- Options -->
                </li>

            </ul>
        </div>
        <!-- Motherboard dropdown menu -->
        <div class="select_wrap">
            <!-- Default option for the second dropdown menu -->
            <ul class="default_option">
                <li>
                    <div class="option pizza">
                        <img src="accessories/customiconimg/RedUSERS - Noticias de tecnología, celulares, tablets, hardware, software y trucos.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Motherboard</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Options for the second dropdown menu -->
            <ul class="select_ul">
                <li>
                    <div class="option pizza">
                        <img src="accessories/motherboard/3534397929332088a93552e1c7e8fcf5.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>MSI MEG X570 ACE Motherboard</p>
                            <p>153,674 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/motherboard/32282e9b761a490b189f29bc0440b72e.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>ASUS ROG MAXIMUS VIII HERO ALPHA</p>
                            <p>68,957 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/motherboard/560a5259c02570a35ea1e5db86e9287e.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>ASUS TUF Z270 Mark 1</p>
                            <p>73,960 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/motherboard/7179cd7ef82ce1645bae70580b175f35.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>MSI X99A GAMING PRO CARBON LGA 2011-v3</p>
                            <p>167,903 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/motherboard/32282e9b761a490b189f29bc0440b72e.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>ASUS Sabertooth Z170 S</p>
                            <p>47,142 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/motherboard/3534397929332088a93552e1c7e8fcf5.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>ASUS ROG Strix X390-E Gaming</p>
                            <p>46,750 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/motherboard/b2e0c4efe3e3c9bf8d995f728117a252.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>GIgabyte X399 Arous Gaming 7</p>
                            <p>212,899 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/motherboard/c7b336d7f3373244ef92c0fc590c6940.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>ASUS PRIME Z370-A LGA1151</p>
                            <p>48,532 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/motherboard/This motherboard looks sick.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>ASUS MAXIMUS VII FORMULA lGA1150</p>
                            <p>137,037 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/motherboard/MSI Releases Z490 Chipset Motherboards For Intel 10th Gen CPUs.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Msi MPG intel Z490 Gamming</p>
                            <p>76,799 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Processor dropdown menu -->
        <div class="select_wrap">
            <!-- Default option for the second dropdown menu -->
            <ul class="default_option">
                <li>
                    <div class="option pizza">
                        <img src="accessories/customiconimg/pc Factory • Tecnología para ti.jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Processor</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Options for the second dropdown menu -->
            <ul class="select_ul">
                <li>
                    <div class="option pizza">
                        <img src="accessories/processor/7ff8379604c6f1457ffc25c965c87987.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Intel Core i9-7920X X-Series</p>
                            <p>148,974 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/processor/89f4962ee2d445c76ab32514829b5297.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Intel Core i9-9900K</p>
                            <p>134,890 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/processor/3d05d51cc87c6c6d23b8a0546b0a7919.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>AMD Ryzen 7 5800X</p>
                            <p>75,990 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/processor/320df5c3540aec0eed0f714fd8e2b35a.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Intel Core i7-10700K</p>
                            <p>76,877 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/processor/124ee54e460d17b9e49daa4795d0d72c.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Intel Core i5 12600K</p>
                            <p>56,320 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/processor/dd19d2dd4bc915cddd851ea343530c11.jpg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Intel Core i7-7820X</p>
                            <p>136,799 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/processor/images (8).jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Intel Core i9-9980X Extreme</p>
                            <p>297,121 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/processor/images (6).jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Intel Core i3-10100 1.8GHZ</p>
                            <p>34,257 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/processor/images (11).jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Intel Xeon Gold</p>
                            <p>350,899 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/processor/images (4).jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>AMD Ryzen 7-7700X</p>
                            <p>74,000 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Graphic card dropdown menu -->
        <div class="select_wrap">
            <!-- Default option for the second dropdown menu -->
            <ul class="default_option">
                <li>
                    <div class="option pizza">
                        <img src="accessories/customiconimg/MSI NVIDIA GTX 1080 Aero 8G OC Grafikkarte (HDMI, DP, DL-DVI-D, 2 Slot Afterburner OC, VR Ready, 4K-optimiert).jpeg" alt="Pizza Image">
                        <div class="product-info">
                            <p>Graphic Card</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Options for the second dropdown menu -->
            <ul class="select_ul">
                <li>
                    <div class="option pizza">
                        <img src="accessories/graphiccard/6c5e97544be87c5330d28e5bce91debe.jpg" alt=" Pizza Image ">
                        <div class="product-info ">
                            <p>XFX AMD Radeon RX 580 GTS XXX Edition</p>
                            <p>85,516 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/graphiccard/0d6d8cdcc6da2bfee711c55056b49cbc.jpg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Sapphire VAPOR-X AMD Radeon R9 290 TRI-X OC</p>
                            <p>134,954 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/graphiccard/31d5b8987d05a33f233c981875ac3cbf.jpg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>NVIDIA GT 710 Grpahic Card</p>
                            <p>12,000 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/graphiccard/3013b150453e4212c4713c8827945934.jpg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>ASUS ROG Strix GeForce RTX 4080</p>
                            <p>412,543 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/graphiccard/18f2235f5547359539c330c8b46356f7.jpg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>ASUS Radeon RX 560 14CU </p>
                            <p>202,046 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/graphiccard/ac4fe8ccbae500c3d0e18ae615db9e5a.jpg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>ASUS GeForce RTX 2080 O8G ROG STRIX OC</p>
                            <p>191,399 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/graphiccard/a61bf69b1814c835159fb6471960553d.jpg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>SAPLOS Radeon RX 560</p>
                            <p>31,123 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/graphiccard/b2bcad5fcf62c1c071ce430108fafe19.jpg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>ZOTAC GeForce GTX 1070 Ti AMP Edition</p>
                            <p>38,907 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/graphiccard/d8abeb9a719b627191eda6d194b06b0c.jpg" alt=" Pizza Image ">
                        <div class="product-info ">
                            <p>PULSE AMD Radeon RX 6600</p>
                            <p>62,719 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/graphiccard/f228439516f73579e191be51319203ef.jpg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>EVGA GeForce GTX 1080 Ti SC Hydro Copper</p>
                            <p>140,761 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!--Power supply dropdown meu-->
        <div class="select_wrap ">
            <!-- Default option for the second dropdown menu -->
            <ul class="default_option ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/customiconimg/Best Buy_ CORSAIR HX Series HX1200 1200W 80 Plus Platinum Fully Modular ATX Power Supply Black CP-9020140-NA.jpeg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Power supply</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Options for the second dropdown menu -->
            <ul class="select_ul ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/powersupply/3fd7cc844151625d07a32979891f423a.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Silverstone SST-ST1500 Strider ST-1500Watt</p>
                            <p>114,179 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/powersupply/339164239d7b28431f10aaa4ca4bb672.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Thermaltake Smart M 650 Bronze</p>
                            <p>19,956 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/powersupply/7c53e055aefe0218992bee2204887c09.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Seasonic FOCUS GX-550Watt</p>
                            <p>8,656 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/powersupply/8c639f9c0b9c8220ff11fc9f23907ca8.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Corsair Pro Series Gold AX-650</p>
                            <p>25,751 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/powersupply/93e21cd45b7b6c12af0b74200bbbee7d.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>DARK POWER 12 1000Watt silent high-end Power</p>
                            <p>68,533 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/powersupply/522f912613d59fdd5266cc2e4c216f73.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Chieftec PowerPlay 750Watt 20+4 pins ATX PS/2</p>
                            <p>42,711 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/powersupply/4385a103cf5a17a3371893a45afe3c28.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Corsair AXi-1200Watt 80 PLUS</p>
                            <p>85,562 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/powersupply/9521e8e16132062b93f37e237db466f3.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Corsair RMe1000Watt ATX 3.0</p>
                            <p>49,717 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/powersupply/97287016cd4ad5ea2892ea78feca0b01.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>EVGA SuperNOVA 750 G5</p>
                            <p>34,209 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/powersupply/b820bb40db73c1b439bfae704301b51a.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>MSI MPG A850GF</p>
                            <p>38,557 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>

            </ul>
        </div>
        <!-- RAM dropdown menu -->
        <div class="select_wrap ">
            <!-- Default option for the second dropdown menu -->
            <ul class="default_option ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/customiconimg/G_Skill Trident Z NEO Series 32GB (2 x 16GB).jpeg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>RAMs</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Options for the second dropdown menu -->
            <ul class="select_ul ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ram/2d3d91afbdd80337a2de0435591064d2.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>DDR4 RAM Memory Asgard 32GB</p>
                            <p>9,403 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ram/2e133aa9170100d2bbe42e474b43c504.jpg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Kingston FURY Beast DDR5</p>
                            <p>33,562 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ram/0dedd143eb36ab2b4d35d9dbe70adce1.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Trident Z Royal 16gb</p>
                            <p>28,199 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ram/62e2b916058482fb0f273eb886d13ccc.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>PNY 16\gb XLR8 Gamming DDR4</p>
                            <p>PKR 13,000 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ram/4517a7ccd6470828d4fc5171e38e4fb8.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Corsair Dominator Platinum Series 16GB</p>
                            <p>39,099 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ram/a8e7fcc2ed1bf7b1b8cf88480f255a1d.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Corsair VENGEANCE LED 16GB DDR4</p>
                            <p>28,536 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ram/ab0fd4dd3340ab6abbd14400508ac972.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Corsair DOMINATOR PLATINUM RGB 32GB DDR5</p>
                            <p>34,244 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ram/b67f11909b85a47722da3119a364746b.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>XPG Spectrix D41 DDR4 RGB</p>
                            <p>41,093 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ram/b560018f8e15b57ed064f7046c601352.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>TEAMGROUP T-FORCE Delta RGB DDR5</p>
                            <p>31,390 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ram/faf1026defdd572731867c7942dc9e7b.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>T-Force Xcalibur RGB DDR4 16GB</p>
                            <p>20,500 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- seven dropdown menu -->
        <div class="select_wrap ">
            <!-- Default option for the second dropdown menu -->
            <ul class="default_option ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/customiconimg/Samsung's Tiny SSD 950 Pro Solid State Drive Set To Make PCs Fly In October.jpeg" alt=" Pizza Image ">
                        <div class="product-info ">
                            <p>SSD's</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Options for the second dropdown menu -->
            <ul class="select_ul ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ssd/3f7880f8ab21c9d757f8d8a353a6e100.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Lexar Pro NM800 SSD 1TB PCIe Gen4 NVMe M.2</p>
                            <p>2,816,144 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ssd/04d539030daef35ef77cfc44ee5dc1d6.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Corsair Force Series MP510 1920GB M.2 SSD</p>
                            <p>32,382 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ssd/9fbf80c80c6c195e8a53b417e8ba824b.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Corsair MP600 PRO XT 1TB M.2 NVMe PCIe Gen.4x4 SSD</p>
                            <p>21,118 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ssd/337e659e991a9b3c51a6344e21294dd9.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Synology M2D20 M.2 Adapter Card</p>
                            <p>47,871 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ssd/24eee82924c6f030202050ec8ec74a39.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Portable SSD T7 TOUCH USB 3.2 1TB/p>
                                <p>29,500 PKR</p>
                                <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ssd/32543f6279d557ad411d1116cf7744e9.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>XPC GAMMING S70 BlADE 1TB PCIe Gen4x4 M.2 2280</p>
                            <p>32,000 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ssd/acecd10f075c7de1dcdef3135d3fda4b.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Force Series Gen.4 PCIe MP600 1TB NVMe M.2 SSD</p>
                            <p>34,900 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ssd/2811695f16d0ba053541ea46d74a662d.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Samsung SSD 1TB PM9A1 NVMe PCIe 4.0</p>
                            <p>26,316 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ssd/caba0ce0c764c440f58a9436a56c4448.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Force Series Gen.4 PCIe MP600 1TB NVMe M.2 SSD</p>
                            <p>21,990 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/ssd/eb2df4051b8170357456bc030e6b37c5.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Samsung 960 EVO M.2 2TB</p>
                            <p>166,149,68 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Hard Disk dropdown menu -->
        <div class="select_wrap ">
            <!-- Default option for the second dropdown menu -->
            <ul class="default_option ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/customiconimg/WD Black 4TB Performance Desktop Hard Drive_ 3_5-inch, SATA 6 Gb_s, 7200 RPM, 64MB Cache WD4003FZEX.jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Hard Disk</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Options for the second dropdown menu -->
            <ul class="select_ul ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/harddisk/8b00cc4f8a564353a51c922507c24fbe.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>WD Caviar Black 3.5 SATA II HDD</p>
                            <p>4,266 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/harddisk/f92e30278cfa4790e7ebb10a7ae07514.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>WD Black 3.5-Inch</p>
                            <p>58,999 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/harddisk/bbf230214786be76008353b176204a29.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>WD Caviar Black SATA III 6TB harddisk</p>
                            <p>62,883 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/harddisk/images (9).jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>WD SATA Hard Drive 6TB</p>
                            <p>36,000 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/harddisk/images (12).jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Seagate SATA 3.5 Hard Drive 4TB</p>
                            <p>25,199 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- CPU Cooler dropdown menu -->
        <div class="select_wrap ">
            <!-- Default option for the second dropdown menu -->
            <ul class="default_option ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/customiconimg/Deepcool AK620 Digital ARGB CPU Air Cooler - Black, R-AK620-BKADMN-G CPU Coolers (Air) (1).jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>CPU Cooler</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Options for the second dropdown menu -->
            <ul class="select_ul ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/cpucooler/629c65c1c9fde98112d87cffc195d912.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>ATC700 CPU Air Cooler</p>
                            <p>24,094 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/cpucooler/64dbfe2a9eb0373711622f185974bb24.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>DEEPCOOL GAMMAXX 400 CPU Cooler 4 Heatpipes 120mm</p>
                            <p>13,684 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/cpucooler/8b90e310acc42322dc3f475a1abb3be3.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>cryoring CPU Cooler Single Fan Side Flow AMD, H7 V2</p>
                            <p>10,352 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/cpucooler/5634bd07dba4f5cc5ea8f1b0e97c8ab7.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Cooler Master V8 GTS</p>
                            <p>23,499 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/cpucooler/b0809daf785ac2ef468c336c2b3c5bfb.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Corsair A500 Dual Fan CPU Cooler</p>
                            <p>28,507 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/cpucooler/cc7ed87fe88617e4a1e1619d876c41da.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Cooler MasterAir Maker 8</p>
                            <p>38,199 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/cpucooler/f9fa8c4490c42723e30462f6cc922b54.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Cooler Master Hyper TX3 EVO</p>
                            <p>31,113 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/cpucooler/images (16).jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Corsair H55 RGB 120mm Liquid CPU Cooler</p>
                            <p>21,600 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/cpucooler/2904c7457dc17ca32b904a173a218db9.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Cool Master V8 GTS 3Tower Heatsink</p>
                            <p>56,430 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/cpucooler/images (19).jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Alseye EL120 Cooling Kit CPU Cooler</p>
                            <p>10,000 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Cooling Fans dropdown meu-->
        <div class="select_wrap ">
            <!-- Default option for the second dropdown menu -->
            <ul class="default_option ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/customiconimg/How to Make a Battery Powered Fan.jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Cooling Fans</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Options for the second dropdown menu -->
            <ul class="select_ul ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingfan/fan-pack-1.png" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>MSI MAX F12A-3 120mm ARGB</p>
                            <p>15,134 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingfan/images (26).jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>MSI Rainbow Fan Pack</p>
                            <p>64,089 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingfan/46395514255e9980998dda5ced901db3.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Corsair iCUE SP120 RGB ELITE Performance</p>
                            <p>22,672 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingfan/images (27).jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>DEEPCOOL RF 120mm 3in1 Ultra Quite Intelligent PWM Fan</p>
                            <p>17,779 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingfan/cl-f100-pl12sw-a-min.webp" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Thermaltake Riing Quad 12 RGB Radiator Fan/3 Pack</p>
                            <p>36,280 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingfan/6146CBG6wpL._AC_UF1000,1000_QL80_.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>GTRACING 3pcs 120mm RGB</p>
                            <p>18,969 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingfan/Thermaltake-Pure-Plus-12-RGB-Software-Enabled-Case-Fan-Three-Pack-120mm_6d655199-6732-45ac-8691-52035af67ed4_1.cb063094a24b5e1b4f9509261f60680a.jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Thermaltake Pure 12 ARGB Sync Radiator Fan TT Premium Edition</p>
                            <p>12,826 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- eleven dropdown menu -->
        <div class="select_wrap ">
            <!-- Default option for the second dropdown menu -->
            <ul class="default_option ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/customiconimg/765d1b2a-73f6-40fb-a72b-13a2754a2755.jpeg " alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Cooling System</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Options for the second dropdown menu -->
            <ul class="select_ul ">
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingsystem/images (29).jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Master Liquid Maker 240</p>
                            <p>43,559 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingsystem/download.jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>DIY Liquid Cooler120/240/360</p>
                            <p>13,168PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingsystem/images (32).jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Vbesrlife RG 374 Water Cooling</p>
                            <p>62,437PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza">
                        <img src="accessories/collingsystem/images (37).jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>DIY Liquid Syscooling System</p>
                            <p>122,999PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingsystem/images (40).jpeg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>Fursuit Liquid Cooling System</p>
                            <p>54,675 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option pizza ">
                        <img src="accessories/collingsystem/61nm2nZsccL._AC_UF894,1000_QL80_.jpg" alt="Pizza Image ">
                        <div class="product-info ">
                            <p>DIY Liquid Cooling System Pack</p>
                            <p>19,530 PKR</p>
                            <!-- Example price -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>



        <!-- Additional dropdown menus can be added here -->
        <div id="totalPrice">Total Price: 0 PKR</div>
        <button id="shopNowBtn ">Shop Now</button>
    </div>
    <script src="path/to/bootstrap.min.js"></script>
</body>

</html>