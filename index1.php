<?php
// Assuming $conn is your database connection variable
$conn = mysqli_connect("localhost", "root", "", "login_register");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
$row_count = mysqli_num_rows($select_rows);
?>
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
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>www.Craft PC.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="logintouser.js">

    <link rel="stylesheet" href="style1.css">
    <!--styling-->
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

    <section id="home">
        <div class="container">
            <h1>Build. Work. Enjoy.</h1>
            <h5>Build your own <span>Custom PC</span></h5>
            <button onclick="window.location.href='shop.php'" ;>Shop Now</button>
        </div>
    </section>
    <section class="brand">
        <div class="row">
            <img class="img-fluid col-lg-2 col-md-4 col-6 " src="brandimg/asus.png" alt="">
            <img class="img-fluid col-lg-2 col-md-4 col-6 " src="brandimg/corsair.png" alt="">
            <img class="img-fluid col-lg-2 col-md-4 col-6 " src="brandimg/intel.jpg" alt="">
            <img class="img-fluid col-lg-2 col-md-4 col-6 " src="brandimg/msi.png" alt="">
            <img class="img-fluid col-lg-2 col-md-4 col-6 " src="brandimg/rog.png" alt="">
            <img class="img-fluid col-lg-2 col-md-4 col-6 " src="brandimg/nvidia.png" alt="">
        </div>
    </section>
    <section id="new" class="w-100">
        <div class="pro-category">
            <h4>Product Category</h4>
            <hr class="mx-auto">
        </div>
        <div class="row p-0 m-0">
            <div class="one col-lg-4 col-md-12 col-12 p-0">
                <img class="image-fluid" src="prodcatgimg/catgimg1.jpeg" alt="">
                <div class="details">
                    <h2>Pre Build PC</h2>
                    <a href="prebuildshop1.php"><button class="text-uppercase">Shop Now</button></a>
                </div>
            </div>
            <div class="one col-lg-4 col-md-12 col-12 p-0">
                <img class="image-fluid" src="prodcatgimg/catgimg2.webp" alt="">
                <div class="details">
                    <h2>Custom Build </h2>
                    <a href="custombuild.php"><button class="text-uppercase">Shop Now</button></a>
                </div>
            </div>
            <div class="one col-lg-4 col-md-12 col-12 p-0">
                <img class="image-fluid" src="prodcatgimg/catgimg3.jpeg" alt="">
                <div class="details">
                    <h2>Acessories</h2>
                    <a href="acessories.php"><button class="text-uppercase">Shop Now</button></a>
                </div>
            </div>
        </div>
    </section>
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py5">
            <h3>Our Featured</h3>
            <hr class="mx-auto">
            <p>Here you can check out our new products with fair pirce on Craft PC.</p>
        </div>
        <div class="row mx-auto container-fluid">
            <!--first-->
            <div onclick="window.location.href='mainfeatured1.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="mainprodimg/pordimg1.jpg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5 class="p-name">ZNXT pre Build PC</h5>
                <h4 class="p-price"> PKR 1,929,399 </h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="318"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--second-->
            <div onclick="window.location.href='mainfeatured2.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="mainprodimg/pordimg2.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5 class="p-name">Corsiar pre Build PC</h5>
                <h4 class="p-price"> PKR 1,429,399</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="319"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--third-->
            <div onclick="window.location.href='mainfeatured3.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="mainprodimg/pordimg3.jpg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5 class="p-name">EVGA GeForce GTX TITAN 2</h5>
                <h4 class="p-price"> PKR 17,699</h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="320"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
            <!--forth-->
            <div onclick="window.location.href='mainfeatured4.php'" ; class="product text-center col-lg-3 col-md-4 col-12">
                <img class="img-fluid mb-3" src="mainprodimg/pordimg4.jpg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h5 class="p-name">MSI A320M-A PRO</h5>
                <h4 class="p-price"> PKR 15,500 </h4>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="321"> <!-- Set the product ID -->
                    <input type="submit" class="buy-btn" value="Add to Cart" name="add_to_cart">
                    </form>
            </div>
        </div>

    </section>
    <section id="banner" my-5 pb-5>
        <div class="container">
            <h4>MID SEASON'S SALES</h4>
            <h1>New Products <br> UP TO 20% OFF
            </h1>
            <button onclick="window.location.href='shop.php'" ; class="text-uppercase case-button">Shop Now</button>
        </div>
    </section>
    <section class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="testimonialsecton/6471ce7d09a5b.webp" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">CEO </span>
                    <span class="card__name">Hassan Ali</span>
                    <p class="card__text">
                        Exceptional custom PC builder and accessory selection. Top-notch customer support and product quality.
                    </p>
                </div>
            </div>
            <!--second card-->
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="testimonialsecton/toa-heftiba-O3ymvT7Wf9U-unsplash.jpg" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Bloger</span>
                    <span class="card__name">Fatima</span>
                    <p class="card__text">
                        Unbeatable custom PC builder and accessory selection, backed by outstanding gamer-centric customer support. My dream gaming rig exceeded all expectations. </p>
                </div>
            </div>
            <!--third card-->
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="testimonialsecton/download (2).jpeg" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Web Developer</span>
                    <span class="card__name">Amina </span>
                    <p class="card__text">
                        I recently used this website to build my own custom PC, and I was blown away by the user-friendly interface, wide selection of components, and the excellent customer support.
                    </p>

                </div>
            </div>
            <!--forth card-->
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="testimonialsecton/istockphoto-1350609350-170667a.webp" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Gamer</span>
                    <span class="card__name">Billal Ahmad</span>
                    <p class="card__text">
                        Your website made it a breeze to create my dream PC, and the prebuilt , accessories section offered everything I needed.
                    </p>

                </div>
            </div>
            <!--fifth card-->
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="testimonialsecton/360_F_243123463_zTooub557xEWABDLk0jJklDyLSGl2jrr.jpg" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Business Man</span>
                    <span class="card__name">Ali Hamza</span>
                    <p class="card__text">
                        This website is a game-changer for my business. It's become my go-to platform for all things PC-related.
                    </p>

                </div>
            </div>
            <!--sisth card-->
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="testimonialsecton/sergio-de-paula-c_GmwfHBDzk-unsplash.jpg" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Web Designer</span>
                    <span class="card__name">Asad Ali</span>
                    <p class="card__text">
                        Absolutely thrilled with my experience on this website! Building my custom PC was a breeze.
                    </p>

                </div>
            </div>
            <!--seventh card-->
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="testimonialsecton/jonas-kakaroto-Fs8ZFfVh-cg-unsplash.jpg" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Video Editor</span>
                    <span class="card__name">Fahad Hassan</span>
                    <p class="card__text">
                        This website has truly revolutionized my video editing workflow. It's my trusted destination for all things video editing.
                    </p>

                </div>
            </div>
            <!--eight card-->
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="testimonialsecton/istockphoto-1430286027-1024x1024.jpg" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Programmer</span>
                    <span class="card__name">Yasir</span>
                    <p class="card__text">
                        This website caters perfectly to a programmer's needs.It's my preferred destination for all things programming and development.
                    </p>

                </div>
            </div>
        </div>
    </section>
    <!--slider images-->
    <div class="wrapper">
        <img src="bannerimg/Content-Page-Banner-2.jpg" alt="">
    </div>
    <!--text boxes-->
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">10 MONTH WARRANTY</h5>
                <p class="card-text">Every Gaming PC form Craft PC includes 10 months fo local warranty for your peace of mind. <br> <br></p>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">FAST SERVICE</h5>
                <p class="card-text">Fast pace service at Zestro. We deliver all over Pakistan. Assembly time is 3-4 days and 2-3 days for shipping.</p>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">100% GENUINE</h5>
                <p class="card-text">At Craft PC quality comes first. We only work with trusted brands, and deal in genuine products</p>

            </div>
        </div>
    </div>
    <!--news-letter-->
    <section id="newsletter" class="section-p1">
        <div class="newstext">
            <h4>Sign Up for NewsLetter</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>

        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <a href="register.php"><button>Sign Up</button></a>
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
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 300,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
    <script src="js/script.js"></script> 

</body>

</html>