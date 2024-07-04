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
    <title>www.Craft PC.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="style1.css">
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

    <!--upper section of blog page-->
    <section id="blog-home" class="pt-5 mt-5 container">
        <h1 class="font-weight-bold pt-5">Blogs</h1>
        <hr>
    </section>
    <!--blog second page-->
    <div class="wrapper1">
        <img src="blogpageimg/download (2).jpeg" alt="">
        <div class="text-box">
            <h2>Component Chronicles: Exploring the Heart of Custom PCs.</h2>
            <p><span>Introduction:</span> When it comes to custom PCs, the components you choose are the building blocks that define your system's performance and capabilities. In this blog, we embark on a journey through the "Component Chronicles," where
                we'll explore the essential elements that form the heart of custom PCs. From powerful processors to high-performance graphics cards, we'll delve into the world of computer components to help you make informed choices for your dream PC.
                Let's get started!<br><br>
                <br><br> <span>1: The Processor (CPU):</span> The Brain of Your PC At the core of every computer lies the central processing unit (CPU), often referred to as the brain of the system. Explore the various CPU options available, from high-performance
                models designed for gaming and content creation to budget-friendly choices for everyday computing. Learn about clock speed, cores, and threads, and discover how to select the right CPU for your specific needs.
                <br><br> <span>2: Graphics Card (GPU):</span> Unleashing Visual Power For gamers and content creators, the graphics card (GPU) is a critical component. Dive into the world of GPUs, from entry-level options to high-end gaming monsters.
                Understand the role of VRAM, CUDA cores, and ray tracing capabilities, and discover how to choose the perfect GPU to bring your visuals to life.
                <br><br> <span>3: Memory (RAM):</span> Multitasking Mastery RAM (Random Access Memory) is the memory your PC uses to run applications and manage tasks simultaneously. Learn how to select the ideal RAM size and speed for your custom PC,
                ensuring seamless multitasking and lightning-fast data access.
                <br><br> <span>4: Storage Solutions:</span> Speed vs. Capacity Storage is where your files, games, and applications reside. Compare the benefits of Solid-State Drives (SSDs) and Hard Disk Drives (HDDs) to find the perfect balance between
                speed and capacity. We'll also explore M.2 drives and NVMe SSDs for ultra-fast data access.
                <br><br> <span>5: Motherboards: </span>The Nervous System of Your PC The motherboard is the central hub where all components connect. Explore different motherboard sizes, form factors, and chipsets to understand how they impact your PC's
                capabilities. Find out which motherboard suits your specific CPU and future upgrade plans.
                <br><br> <span>6: Power Supply Unit (PSU):</span> Ensuring a Steady Flow of Power Your PC's power supply unit (PSU) is crucial for maintaining stability and preventing damage. Discover how to choose the right wattage, efficiency rating,
                and connectors for your custom PC to ensure a reliable power source. Cooling Solutions: Keeping Temperatures in Check Efficient cooling is essential to prevent overheating and maintain your PC's performance. Explore air cooling, liquid
                cooling, and other cooling solutions to keep your components at optimal temperatures, whether you're gaming or engaging in resource-intensive tasks.
                <br><br><span>7: Peripherals:</span> Completing Your Setup Your custom PC is incomplete without the right peripherals. We'll discuss essential accessories like gaming keyboards, mice, monitors, and headsets, helping you create a well-rounded
                and immersive computing experience.
                <br><br><span>Conclusion:</span><br> The "Component Chronicles" have taken us through the heart of custom PCs, revealing the key components that shape your system's performance and capabilities. Armed with this knowledge, you're now better
                equipped to make informed decisions when building your dream PC. Whether you're a gamer, content creator, or a casual user, choosing the right components is the first step toward creating a powerful and customized computing experience.
                Stay tuned for more in-depth insights and recommendations in our future blogs as we continue to explore the exciting world of custom PCs.</p>
        </div>
    </div>

    <!--footer-->
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