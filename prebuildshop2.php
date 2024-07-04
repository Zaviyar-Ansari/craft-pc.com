<?php
// Assuming $conn is your database connection variable
$conn = mysqli_connect("localhost", "root", "", "login_register");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
$row_count = mysqli_num_rows($select_rows);?><?php
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
?><!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pre Build PC</title>
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
            <h3 class="font-weight-bold">Pre Build PC</h3>
            <hr>
            <p>Here you can check out our new pre Build PC with fair pirce on Craft PC.</p>
        </div>
        <div class="row mx-auto container">
            <!--first part-->
            <!--first-->
            <div onclick="window.location.href='2prebuild1.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/3e0116f6-a546-4c2f-9f2e-0398e0170580.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Speed Demon XT</h5>
                <h4 class="p-price"> PKR 90,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="21"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--second-->
            <div onclick="window.location.href='2prebuild2.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/921a98ab-5752-4cfe-bae7-ec05a7dde541.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">EliteGamer X</h5>
                <h4 class="p-price"> PKR 120,000 </h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="22"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>

            <!--third-->
            <div onclick="window.location.href='2prebuild3.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/Acer Predator Orion 3000 gaming desktop now configurable with an Intel Core i7-11700 and Nvidia GeForce RTX 3070.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">MegaMultitasker 3000</h5>
                <h4 class="p-price"> PKR 110,000 </h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="23"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth-->
            <div onclick="window.location.href='2prebuild4.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/2ab3e001-31df-428f-b36e-ed23db0c655f.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">PowerBeast Pro</h5>
                <h4 class="p-price"> PKR 150,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="24"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--Second part-->
            <!--first-->
            <div onclick="window.location.href='2prebuild5.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/CiT Goblin Mesh Gaming Case Black_Green Interior USB3 12cm Green LED Toolless.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">UltimateWorkstation 5000</h5>
                <h4 class="p-price"> PKR 180,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="25"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--second-->
            <div onclick="window.location.href='2prebuild6.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/CLX Gaming - Gaming PCs, Prebuilt Gaming PCs, PC Builder.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Shadow Nova </h5>
                <h4 class="p-price"> PKR 125,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="26"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third-->
            <div onclick="window.location.href='2prebuild7.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/ACER Predator Orion 3000 PO3-630 Gaming PC - Intel®Core_ i7, RTX 3060, 1 TB HDD & 512 GB SSD.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">GamingTitan X2</h5>
                <h4 class="p-price"> PKR 130,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="27"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth-->
            <div onclick="window.location.href='2prebuild8.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/News｜ASUS Global.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">SilentMaster Deluxe</h5>
                <h4 class="p-price"> PKR 100,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="28"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third part-->
            <!--first-->
            <div onclick="window.location.href='2prebuild9.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/Maior E-commerce de Tecnologia e Games da América Latina.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">BudgetBeast Lite</h5>
                <h4 class="p-price"> PKR 70,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="29"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--second-->
            <div onclick="window.location.href='2prebuild10.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/Clx Set Vr Gaming Desktop, I9-13900Kf, 64Gb, 1Tb Ssd+6Tb Hdd, Rtx 4080, W11H In White.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">ProCreator Plus</h5>
                <h4 class="p-price"> PKR 160,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="30"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third-->
            <div onclick="window.location.href='2prebuild11.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/PCSPECIALIST Tornado R9i Gaming PC - AMD Ryzen 9, RTX 3080 Ti, 2 TB HDD & 1 TB SSD.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">PowerBeast Pro</h5>
                <h4 class="p-price"> PKR 150,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="31"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth-->
            <div onclick="window.location.href='2prebuild12.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/PCSPECIALIST Tornado R5i Gaming PC - AMD Ryzen 5, GTX 1660 Ti, 1 TB HDD & 512 GB SSD.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Quantum Blaze</h5>
                <h4 class="p-price"> PKR 120,000 </h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="32"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth part-->
            <!--first-->
            <div onclick="window.location.href='2prebuild13.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/PCSPECIALIST Official Fnatic Gaming PC - AMD Ryzen 7, RX 6800 XT, 2 TB HDD & 500 SSD.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Phoenix Ascendant</h5>
                <h4 class="p-price"> PKR 140,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="33"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--second-->
            <div onclick="window.location.href='2prebuild14.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/Thermaltake - AH-370 Gaming PC - AMD Ryzen 7 3700X CPU - NVIDIA GeForce RTX 3070 - 3600Mhz DDR4 Memory - NVMe 1TB M_2.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Stealth Vortex</h5>
                <h4 class="p-price">PKR 135,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="34"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third-->
            <div onclick="window.location.href='2prebuild15.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/Predator Orion Series Desktops to Feature New 9th Gen Intel Core Desktop Processors to Deliver Powerful Gaming Experiences.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Phoenix Ascendant</h5>
                <h4 class="p-price">PKR 140,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="35"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth-->
            <div onclick="window.location.href='2prebuild16.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/Predator Orion _ Predator _ Acer United States.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Aurora Pulse</h5>
                <h4 class="p-price"> PKR 115,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="36"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--Fifth part-->
            <!--first-->
            <div onclick="window.location.href='2prebuild17.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/download.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Galactic Fury</h5>
                <h4 class="p-price">PKR 130,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="37"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--second-->
            <div onclick="window.location.href='2prebuild18.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/Memory PC Gamer Intel i7-9700K 8 x 3,6 GHz, 32 Go DDR4 RAM, 480 Go SSD + 2000 Go HDD, 8 Go RT___.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Cyber Serenity</h5>
                <h4 class="p-price">PKR 150,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="38"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third-->
            <div onclick="window.location.href='2prebuild19.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/PCSPECIALIST ESL Tournament Gaming PC - Intel®Core i7, RTX 3070, 2 TB HDD & 512 GB SSD.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Mirage Master</h5>
                <h4 class="p-price">PKR 130,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="39"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth-->
            <div onclick="window.location.href='2prebuild20.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="prebuildimg2/PCSPECIALIST Vortex ST-S Gaming PC - Intel®Core_ i7, RTX 3070, 2 TB HDD & 512 GB SSD (1).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Nebula Nova</h5>
                <h4 class="p-price">PKR 140,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="40"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <nav aria-label="...">
                <ul class="pagination mt-5">
                    <li class="page-item">
                        <a class="page-link" href="prebuildshop1.php">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="prebuildshop1.php">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="prebuildshop2.php">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="prebuildshop3.php">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="prebuildshop3.php">Next</a>
                    </li>
                </ul>
            </nav>

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