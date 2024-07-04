<?php
@include 'config.php';

$message = array(); // Initialize an empty array for messages

// Check if the form was submitted
if(isset($_POST['add_to_cart'])){
    // Form submission logic
    $product_id = $_POST['product_id']; // Get the product ID from the form

    // Fetch product data based on the provided product ID
    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'");

    if(mysqli_num_rows($select_product) > 0){
        $product_data = mysqli_fetch_assoc($select_product);

        $product_name = $product_data['name'];
        $product_price = $product_data['price'];
        $product_image = $product_data['image'];
        $product_quantity = 1;

        // Check if the product is already in the cart
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

        if(mysqli_num_rows($select_cart) > 0){
            $message[] = 'Product already added to cart';
        } else {
            // Insert the product into the cart table
            $insert_product = mysqli_query($conn, "INSERT INTO `cart` (name, price, image, quantity) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')");
            if($insert_product){
                $message[] = 'Product added to cart successfully';

                // If you want to store the data in another table, you can do so here
                // For example, let's say you have a table named 'orders' to store order details
                $insert_order = mysqli_query($conn, "INSERT INTO `orders` (product_id, product_name, product_price, product_image, quantity) VALUES ('$product_id', '$product_name', '$product_price', '$product_image', '$product_quantity')");
                if($insert_order){
                    $message[] = 'Order details stored successfully';
                } else {
                    $message[] = 'Error storing order details: ' . mysqli_error($conn); // Display MySQL error message
                }
            } else {
                $message[] = 'Error adding product to cart: ' . mysqli_error($conn); // Display MySQL error message
            }
        }
        
        // Redirect to the same page to prevent form resubmission
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        $message[] = 'Product not found';
    }
}

// Display messages
if(isset($message)){
    foreach($message as $msg){
        echo '<div class="message">' . $msg . '</div>';
    }
}
// Assuming $conn is your database connection variable
$conn = mysqli_connect("localhost", "root", "", "login_register");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
$row_count = mysqli_num_rows($select_rows);
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cases</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="style1.css">
        <style>
            .product img {
                width: 100%;
                height: auto;
                box-sizing: border-box;
                object-fit: cover;
            }
            
            #featured>div.row.mx-auto.container>nav>ul>li.page-item.active>a {
                background-color: black;
            }
            
            #featured>div.row.mx-auto.container>nav>ul>li:nth-child(n):hover>a {
                background-color: coral;
                color: white;
            }
            
            .pagination a {
                color: black;
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
                            <a class="nav-link" href="index1.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="shop.php">Shop</a>
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
        <!--Featured section of shop page-->
        <section id="featured" class="my-5 py-5">
            <div class="container  mt-5 py5">
                <h3 class="font-weight-bold">PC Cases</h3>
                <hr>
                <p>Here you can check out our new products with fair price on Craft PC.</p>
            </div>
            <div class="row mx-auto container">
                <!--first part-->
                <!--first-->
                <div onclick="window.location.href='case1.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/Amazon_com_ Thermaltake Tower 100 Racing Green Edition Tempered Glass Mini Tower Computer Chassis Supports Mini-ITX CA-1R3-00SCWN-00 _ Industrial & Scientific.jpeg.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">The Tower 100 Turquoise Mini Chassis</h5>
                    <h4 class="p-price"> PKR 35,939</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="49"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--second-->
                <div onclick="window.location.href='case2.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/3024ac8c-3cfe-41d7-9c52-ede2bc36efeb.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Corsair Alpha Mid-Tower</h5>
                    <h4 class="p-price"> PKR 25,384</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="50"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--third-->
                <div onclick="window.location.href='case3.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/Antec Torque Black _ Red - E-ATX.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Torque Black/Red ATX Mid Tower</h5>
                    <h4 class="p-price"> PKR 107,188</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="51"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--forth-->
                <div onclick="window.location.href='case4.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/c367f0a2-3c77-4d47-8257-8d2b92c2eb48.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">X2 SIRYUS</h5>
                    <h4 class="p-price"> PKR 73,655</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="52"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--Second part-->
                <!--first-->
                <div onclick="window.location.href='case5.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/7cfd0c50-17e9-4454-bae9-b644b2251bf4.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">JABSON MechWarrior MOD-3</h5>
                    <h4 class="p-price"> PKR 105,990</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="53"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--second-->
                <div onclick="window.location.href='case6.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/Corsair Graphite Series 780T Full Tower PC Case - White (CC-9011059-WW).jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Graphite Series 780T white Full-Tower Case</h5>
                    <h4 class="p-price"> PKR 29,500</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="54"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--third-->
                <div onclick="window.location.href='case7.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/download.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Antec Gaming Series 900 Mid-Tower</h5>
                    <h4 class="p-price"> PKR 105,334</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="55"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--forth-->
                <div onclick="window.location.href='case8.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/Sharkoon ELITE SHARK CA700 PC Case Review.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Sharkoon ELITE SHARK CA700 PC Case</h5>
                    <h4 class="p-price"> PKR 376,298</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="56"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--third part-->
                <!--first-->
                <div onclick="window.location.href='case9.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/15 Best Cases For Water Cooling 2023 – Mid, Full & Super Tower Options _ PC Mecca.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Crystal Series 570X RGB ATX Mid-Tower Case</h5>
                    <h4 class="p-price"> PKR 30,500</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="57"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--second-->
                <div onclick="window.location.href='case10.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/Fractal Design Torrent Clear Tempered Glass E-Atx Mid-Tower Case In White.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Fractal Design Torrent White E-ATX Tempered Glass</h5>
                    <h4 class="p-price"> PKR 61,841</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="58"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--third-->
                <div onclick="window.location.href='case11.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/Jonsbo Mod3 RGB Cristal Templado USB 3_0.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Jonsbo MOD3 Big-Tower ShowCase Tempered Glass</h5>
                    <h4 class="p-price"> PKR 85,139</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="59"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--forth-->
                <div onclick="window.location.href='case12.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/InWin D-Frame 2_0.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">In-Win IW-D-FRAME 2.0 BLACK GOLD</h5>
                    <h4 class="p-price"> PKR 341,602</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="60"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--forth part-->
                <!--first-->
                <div onclick="window.location.href='case13.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/Cougar Blazer Review.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">COUGAR Blazer-Mid Tower Gaming Case</h5>
                    <h4 class="p-price"> PKR 65,675</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="61"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--second-->
                <div onclick="window.location.href='case14.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/NZXT Custom & Prebuilt Gaming PCs, Parts, Peripherals _ NZXT.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">NZXT Vulcan Black Computer Case</h5>
                    <h4 class="p-price"> PKR 17,929</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="62"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--third-->
                <div onclick="window.location.href='case15.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/download (2).jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">InWin's KingSize H-Frame open-air Chassis</h5>
                    <h4 class="p-price"> PKR 78,943</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="68"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--forth-->
                <div onclick="window.location.href='case16.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/Xigmatek Perseus (1).jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Xigmatek Preseus X5 Cy120 ARGB </h5>
                    <h4 class="p-price"> PKR 22,999</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="63"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--Fifth part-->
                <!--first-->
                <div onclick="window.location.href='case17.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/TORQUE BLACK _ WHITE is the Best Cheap Gaming PC Mid Tower Case in australia with E-ATX_Aluminum_USB 3_1 Type-C_Tempered Glass Side Panels - Antec.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Antex TOEQUE White/Black Aluminum ATX Mid Tower</h5>
                    <h4 class="p-price"> PKR 121,047</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="64"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--second-->
                <div onclick="window.location.href='case18.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/MBX MKII Prototype I Gallery.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Murderbox MKII 008 ATX Temper Glass</h5>
                    <h4 class="p-price"> PKR 4,279</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="65"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--third-->
                <div onclick="window.location.href='case19.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/Xigmatek Perseus.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Xigmatek Perseus TG ARGB Mid Tower Chassis</h5>
                    <h4 class="p-price"> PKR 23,600</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="66"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
                <!--forth-->
                <div onclick="window.location.href='case20.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                    <img class="img-fluid mb-3" src="accessories/case/Unique PC Cases of 2022_ Stand Out with Style!.jpeg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h5 class="p-name">Cooler Master Cosmos C700M E-ATX Full-Tower Curved</h5>
                    <h4 class="p-price"> PKR 161,348</h4>
                    <form action="" method="post">
                    <input type="hidden" name="product_id" value="67"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>

            </div>

        </section>
        <!--Footer-->
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
        <script src="js/script.js"></script>   
    </body>

    </html>