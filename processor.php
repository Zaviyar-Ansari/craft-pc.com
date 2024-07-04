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
    <title>processor</title>
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
            <h3 class="font-weight-bold">Processor</h3>
            <hr>
            <p>Here you can check out our new products with fair pirce on Craft PC.</p>
        </div>
        <div class="row mx-auto container">
            <!--first part-->
            <!--first-->
            <div onclick="window.location.href='processor1.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/3d05d51cc87c6c6d23b8a0546b0a7919.jpg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">AMD Ryzen 7 5800X </h5>
                <h4 class="p-price"> PKR 75,990</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="93"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--second-->
            <div onclick="window.location.href='processor2.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/7ff8379604c6f1457ffc25c965c87987.jpg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i9-7920X X-Series</h5>
                <h4 class="p-price"> PKR 148,974</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="94"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third-->
            <div onclick="window.location.href='processor3.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/89f4962ee2d445c76ab32514829b5297.jpg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i9-9900K</h5>
                <h4 class="p-price"> PKR 134,890</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="95"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth-->
            <div onclick="window.location.href='processor4.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/124ee54e460d17b9e49daa4795d0d72c.jpg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i5 12600K</h5>
                <h4 class="p-price"> PKR 56,320</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="96"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--Second part-->
            <!--first-->
            <div onclick="window.location.href='processor5.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (1).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Pantium Gold</h5>
                <h4 class="p-price"> PKR 28,120</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="97"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--second-->
            <div onclick="window.location.href='processor6.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/320df5c3540aec0eed0f714fd8e2b35a.jpg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i7-10700K</h5>
                <h4 class="p-price"> PKR 76,877</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="98"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third-->
            <div onclick="window.location.href='processor7.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/919597ed66f9cb3ff6c812b64dad08f2.jpg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i7-8700K</h5>
                <h4 class="p-price"> PKR 68,520</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="99"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth-->
            <div onclick="window.location.href='processor8.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (14).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i9-9900KS </h5>
                <h4 class="p-price"> PKR 149,602</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="100"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third part-->
            <!--first-->
            <div onclick="window.location.href='processor9.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/a72cec11bbca7d01a1656168a2bd545c.jpg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">AMD Ryzen™ 9 5900X series</h5>
                <h4 class="p-price"> PKR 96,363</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="101"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--second-->
            <div onclick="window.location.href='processor10.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/dd19d2dd4bc915cddd851ea343530c11.jpg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i7-7820X</h5>
                <h4 class="p-price"> PKR 136,799</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="102"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third-->
            <div onclick="window.location.href='processor11.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (3).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i7-11700K</h5>
                <h4 class="p-price"> PKR 72,500</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="103"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth-->
            <div onclick="window.location.href='processor12.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (4).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">AMD Ryzen 7-7700X</h5>
                <h4 class="p-price"> PKR 74,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="104"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth part-->
            <!--first-->
            <div onclick="window.location.href='processor13.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (5).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i5-9600K</h5>
                <h4 class="p-price"> PKR 47,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="105"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--second-->
            <div onclick="window.location.href='processor14.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (6).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i3-10100 1.8GHZ</h5>
                <h4 class="p-price"> PKR 34,257</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="106"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third-->
            <div onclick="window.location.href='processor15.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (7).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i9-11900K</h5>
                <h4 class="p-price"> PKR 104,000</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="107"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth-->
            <div onclick="window.location.href='processor16.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (8).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Core i9-9980X Extreme</h5>
                <h4 class="p-price"> PKR 297,121</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="108"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--Fifth part-->
            <!--first-->
            <div onclick="window.location.href='processor17.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (9).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Xeon E Processor</h5>
                <h4 class="p-price"> PKR 31,733</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="109"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--second-->
            <div onclick="window.location.href='processor18.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (10).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Xeon E Series</h5>
                <h4 class="p-price"> PKR 168,430</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="110"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third-->
            <div onclick="window.location.href='processor19.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (11).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Xeon Gold </h5>
                <h4 class="p-price"> PKR 350,899</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="111"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth-->
            <div onclick="window.location.href='processor20.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="accessories/processor/images (12).jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <h5 class="p-name">Intel Xeon 4116 Dodeca-core Silver</h5>
                <h4 class="p-price"> PKR 344,067</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="112"> <!-- Set the product ID -->
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