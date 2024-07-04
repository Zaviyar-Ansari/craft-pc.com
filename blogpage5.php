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
    <!--blog fifth page-->
    <div class="wrapper1">
        <img src="blogpageimg/download (3).jpeg" alt="">
        <div class="text-box">
            <h2>Prebuilt VS Custom PC: Which is Right for you?</h2>
            <p><span>Introduction: </span>When it comes to acquiring a new computer, the eternal debate between prebuilt and custom PCs rages on. Each option has its unique advantages and drawbacks, and the choice ultimately depends on your specific needs
                and preferences. In this blog, we'll compare prebuilt and custom PCs to help you determine which is the right choice for you. Let's dive into the world of computing and make an informed decision!
                <br><br><span>1. Prebuilt PCs:</span> Ready-to-Use Convenience Prebuilt PCs, as the name suggests, come fully assembled and ready for immediate use. Here are some reasons to consider them:
                <br><br><span>a. Time-Saving:</span> If you need a computer without the hassle of component selection and assembly, prebuilt PCs save you time.
                <br> <span>b. Quality Assurance:</span> Leading manufacturers rigorously test prebuilt systems, ensuring reliability and quality.
                <br><span>c. Warranty and Support:</span> Most prebuilt PCs come with warranties and customer support, offering peace of mind.
                <br><br> <span>2. Custom PCs:</span> Tailored to Your Specifications Custom PCs offer the ultimate in personalization and performance optimization. Consider these aspects:
                <br><br><span>a. Total Control:</span> Selecting individual components allows you to build a PC that perfectly matches your needs and preferences.
                <br><span>b. Performance Potential:</span> Custom PCs often outperform prebuilt systems, making them ideal for gamers and professionals.
                <br> <span>c. Upgradability:</span> Custom PCs are easier to upgrade, ensuring your system can adapt to changing needs.
                <br><br> <span>3. Budget Considerations: </span>The Cost Factor Budget is a significant factor when deciding between prebuilt and custom PCs:
                <br><br> <span>a. Prebuilt PCs:</span> While prebuilt systems are available at various price points, customizing one to your exact specifications might be costlier.
                <br> <span>b. Custom PCs: </span>Custom builds can be more cost-effective if you carefully select components and are willing to put in the effort.
                <br><br><span>4. Gaming Performance:</span> A Gamer's Dilemma For gamers, the choice between prebuilt and custom PCs can be critical:
                <br><br> <span>a. Prebuilt PCs:</span> Gaming-focused prebuilts often come with dedicated graphics cards and optimized configurations, making them a plug-and-play gaming solution.
                <br> <span>b. Custom PCs:</span> Building a gaming PC allows for better component selection, potentially resulting in a more powerful gaming rig.
                <br><br> <span>5. Content Creation and Professional Workstations:</span> Custom PCs shine when it comes to content creation and professional workstations:
                <br><br> <span>a. Custom PCs:</span> These can be fine-tuned for resource-intensive tasks, such as video editing, 3D modeling, and rendering.
                <br> <span>b. Prebuilt PCs:</span> While some prebuilt workstations exist, custom builds offer more flexibility and performance potential for professionals.
                <br><br> <span> 6. Maintenance and Support:</span> Consider the long-term care and support you'll need for your PC:
                <br><br> <span> a. Prebuilt PCs:</span> Typically come with warranties and readily available customer support.
                <br> <span>b. Custom PCs:</span> You may need to rely on individual component warranties and perform more hands-on maintenance.
                <br><br> <span>Conclusion:</span><br> The choice between prebuilt and custom PCs ultimately boils down to your specific requirements, budget, and personal preferences. Prebuilt PCs offer convenient, ready-to-use solutions with quality
                assurance and support, making them ideal for those seeking plug-and-play simplicity. Custom PCs, on the other hand, provide total control, unparalleled performance potential, and flexibility for upgrades. Before making your decision, carefully
                evaluate your computing needs and budget. Whether you choose prebuilt or custom, the goal is to ensure that your PC suits your unique requirements, making it the perfect tool for your computing journey.


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