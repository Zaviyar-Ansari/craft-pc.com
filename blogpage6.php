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
    <!--blog sixth page-->
    <div class="wrapper1">
        <img src="blogpageimg/images (2).jpeg" alt="">
        <div class="text-box">
            <h2>Choosing the Right Components for Your Custom PC: comprehensive Overwiew.</h2>
            <p>

                <span>Introduction:</span> Building a custom PC is an exciting journey that allows you to create a computer that perfectly suits your needs and preferences. One of the most critical aspects of custom PC building is selecting the right
                components. In this comprehensive guide, we will provide you with a detailed overview of the key components you need to consider when crafting your dream PC. Whether you're a gamer, content creator, or a professional, making informed component
                choices is essential for a satisfying computing experience.

                <br><br> <span>1. Central Processing Unit (CPU):</span> The Brain of Your PC The CPU is the heart of your custom PC. It determines the overall performance and capabilities of your system. Consider factors like clock speed, the number of
                cores, and hyperthreading when choosing a CPU. Gamers may prefer high-clock-speed processors, while content creators may prioritize multi-core CPUs for rendering tasks.

                <br><br> <span>2. Graphics Processing Unit (GPU):</span> Powering Your Visual Experience For gaming and content creation, the GPU is a crucial component. The choice between integrated and dedicated graphics depends on your specific needs.
                Gamers will want a powerful GPU, while content creators may opt for models optimized for rendering tasks. Ensure compatibility with your monitor's resolution and refresh rate.

                <br><br> <span>3. Memory (RAM):</span> Multitasking and Application Performance RAM is essential for multitasking and running applications smoothly. Consider your usage patterns to determine the appropriate RAM capacity. For gaming and
                general use, 8-16GB may suffice, while content creators and professionals may require 32GB or more.

                <br><br> <span>4. Storage:</span> Speed and Capacity Choices Storage solutions impact system speed and file storage. Choose between Solid-State Drives (SSDs) for speed and Hard Disk Drives (HDDs) for capacity. Alternatively, employ both
                for optimal performance. M.2 NVMe SSDs are ideal for ultra-fast data access.

                <br><br> <span>5. Motherboard:</span> The Central Nervous System Select a motherboard that complements your CPU choice and provides the features you need. Ensure compatibility with your RAM, GPU, and storage options. Motherboards come
                in different sizes, such as ATX, Micro-ATX, and Mini-ITX, so consider your case size and expansion needs.

                <br><br> <span>6. Power Supply Unit (PSU):</span> Sustaining Your System Your PSU provides power to all components, making it a critical choice. Ensure the wattage matches your system's requirements and consider efficiency ratings. Modular
                PSUs offer better cable management for a cleaner build.

                <br><br> <span>7. Case:</span> A Home for Your Components The case not only houses your components but also impacts cooling and aesthetics. Select a case that accommodates your chosen components, allows for efficient airflow, and matches
                your preferred style.

                <br><br> <span>8. Cooling Solutions:</span> Keeping Temperatures in Check Different CPUs and GPUs require varying cooling solutions. Some CPUs come with stock coolers, while others may benefit from aftermarket air or liquid coolers. Ensure
                that your cooling solution keeps temperatures at optimal levels.

                <br> <br><span>9. Peripherals:</span> Completing Your Setup Don't forget essential peripherals like a keyboard, mouse, monitor, and audio devices. Gaming peripherals, in particular, can enhance your gaming experience. Choose the ones that
                best suit your specific needs and preferences.

                <br><br> <span>Conclusion:</span><br> Choosing the right components for your custom PC is a crucial step in creating a system that perfectly matches your needs and expectations. Whether you're a gamer, content creator, or professional,
                the component choices you make will significantly impact your PC's performance and capabilities. Make informed decisions by considering your usage patterns, budget, and future upgrade potential. With the right components, your custom PC
                will provide a tailored and satisfying computing experience for years to come.

            </p>
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