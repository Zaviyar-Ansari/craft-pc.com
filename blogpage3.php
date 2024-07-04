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
    <!--blog third page-->
    <div class="wrapper1">
        <img src="blogpageimg/download.jpeg" alt="">
        <div class="text-box">
            <h2>Crafting Custom PC Experiences: From Vision to Reality</h2>
            <p><span>Introduction:</span> In a world where technology is constantly evolving, the desire for a personalized and powerful computing experience has never been stronger. Custom PCs are the answer, offering the flexibility to create a machine
                that matches your unique needs and desires. In this blog, we'll explore the journey of crafting custom PC experiences – from envisioning your dream system to turning it into a reality. Join us as we delve into the art of building the perfect
                custom PC.
                <br><br><span>1. Define Your Vision:</span> Your Dream, Your PC Every custom PC begins with a vision. Are you an avid gamer looking for maximum performance, a content creator seeking exceptional rendering power, or a professional in need
                of a specialized workstation? Defining your vision is the first step to crafting a custom PC that caters to your specific requirements.
                <br><br> <span> 2. Component Selection:</span> Building Blocks of Excellence Customization starts with selecting the right components. Dive into the world of processors, graphics cards, RAM, storage, motherboards, and more. We'll guide
                you through the process of choosing components that align with your vision, whether you're focused on raw power, efficient multitasking, or speedy data access.
                <br><br> <span>3. The Art of Balance:</span> Crafting Your Perfect Configuration Balancing components is a key aspect of custom PC creation. We'll discuss how to optimize your configuration, ensuring that every part harmonizes with the
                others to create a well-rounded system. Discover how to achieve that perfect equilibrium between performance, aesthetics, and cost.
                <br><br> <span>4. Assembly and Wiring:</span> Bringing Your Vision to Life With components in hand, it's time to bring your vision to life. We'll walk you through the assembly process, from securing the motherboard to connecting power
                cables, and installing cooling solutions. Whether you're an experienced builder or a first-timer, you'll find tips and tricks to ensure a smooth build.
                <br><br> <span>5. Aesthetics and Customization:</span> Beyond Performance A custom PC is not just about raw performance; it's an expression of your style. Learn how to personalize your PC with RGB lighting, custom cases, cable management,
                and more. Make your PC a reflection of your personality while ensuring optimal functionality.
                <br><br> <span>6. Testing and Optimization:</span> Fine-Tuning for Perfection Building your custom PC is only part of the journey. We'll discuss the importance of testing your system for stability and performance. Fine-tuning your PC through
                software tweaks and updates is equally crucial to achieving your desired experience.
                <br><br> <span>7. Maintenance and Upgrades:</span> Future-Proofing Your Investment As technology advances, your custom PC will benefit from periodic maintenance and upgrades. We'll provide insights on how to keep your PC running smoothly
                and extend its lifespan with component replacements and performance enhancements.
                <br><br> <span>Conclusion:</span><br> Crafting custom PC experiences is a journey that allows you to turn your vision into a reality. Whether you're seeking a gaming powerhouse, a content creation workhorse, or a versatile everyday system,
                customization empowers you to build a PC that's uniquely yours. With careful component selection, thoughtful assembly, and an eye for aesthetics, you can create a computing experience that not only meets but exceeds your expectations.
                Stay tuned for more insights, tips, and recommendations on custom PC building as we continue to explore the limitless possibilities of crafting your dream PC.</p>
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