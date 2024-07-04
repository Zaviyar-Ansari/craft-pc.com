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
    <!--blog forth page-->
    <div class="wrapper1">
        <img src="blogpageimg/download (1).jpeg" alt="">
        <div class="text-box">
            <h2>The Prebuilt PC Paradigm: Unveiling Ready-to-Use Powerhouses</h2>
            <p><span>Introduction: </span>In the ever-evolving world of computing, the demand for high-performance machines has given rise to a new paradigm: prebuilt PCs. These ready-to-use powerhouses offer convenience and impressive specs, making them
                an enticing option for users who seek top-notch performance without the hassle of DIY assembly. In this blog, we'll dive into the world of prebuilt PCs, unveiling their advantages, highlighting popular models, and helping you make informed
                choices when considering one for your computing needs.
                <br> <br> <span>1. The Appeal of Prebuilt PCs:</span> Plug and Play Convenience Prebuilt PCs, as the name suggests, arrive fully assembled and ready to use. Discover the convenience they offer, sparing users from the complexities of selecting
                components and building a system from scratch. Unbox, plug in, and start enjoying the power and performance you desire.
                <br> <br><span>2. Advantages of Prebuilt PCs:</span> Time, Assurance, and Support We'll explore the myriad advantages of opting for a prebuilt PC, including time savings, quality assurance, and customer support. Learn how these aspects
                can simplify your computing experience and provide peace of mind.
                <br> <br> <span>3.
                    Top Prebuilt PC Models:</span> Unveiling the Powerhouses Delve into the world of top prebuilt PC models, including popular options from renowned manufacturers. We'll review the specs, performance, and features of these powerhouses
                to help you choose the right one for your specific needs.
                <br> <br> <span>  4. Gaming Prebuilt PCs:</span> Conquering the Virtual Worlds For gamers, prebuilt PCs offer a hassle-free way to experience gaming at its best. We'll take a close look at gaming-oriented prebuilt systems, including their
                gaming capabilities, graphics cards, and immersive features.
                <br> <br> <span> 5. Content Creation and Workstation Prebuilt PCs:</span> Fueling Creativity Explore prebuilt PCs designed for content creators and professionals. These workstations provide the computational muscle needed for tasks like
                video editing, 3D modeling, and more. Discover the components and features that make them ideal for creative work.
                <br> <br> <span> 6. Customization and Upgradability:</span> Tailoring Your Prebuilt PC Prebuilt PCs are not limited to off-the-shelf configurations. Learn how to customize and upgrade your prebuilt system to adapt to your evolving needs,
                ensuring a long-lasting investment.
                <br> <br> <span> 7. Prebuilt PCs vs. Custom-Built PCs:</span> Making the Right Choice We'll compare prebuilt PCs to custom-built counterparts, highlighting the pros and cons of each. By the end of this section, you'll have a clear understanding
                of which option aligns better with your preferences and requirements.
                <br> <br> <span> 8. Maintenance
                    and Optimization:</span> Keeping Your Prebuilt PC at Its Best While prebuilt PCs are ready-to-use, they still require maintenance and optimization to ensure longevity and peak performance. We'll provide valuable tips on how to keep
                your prebuilt powerhouse running smoothly.
                <br> <br> <span>Conclusion:</span> <br>The prebuilt PC paradigm offers an exciting and convenient way to access powerful computing solutions. With various models tailored to different needs, these ready-to-use powerhouses can cater to
                gamers, content creators, professionals, and general users alike. Whether you're seeking top-notch gaming performance or a workstation for intensive tasks, prebuilt PCs offer a compelling alternative to custom-built systems. Explore your
                options, make an informed choice, and unlock the potential of a prebuilt PC that perfectly suits your computing needs.

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