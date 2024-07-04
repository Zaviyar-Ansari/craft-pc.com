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
    <!--blog seventh page-->
    <div class="wrapper1">
        <img src="blogpageimg/pc-build-ideas-7.jpg" alt="">
        <div class="text-box">
            <h2>Custom PC Build Showcase: Inspirig Builds from Our Customers.</h2>
            <p>
                <span>Introduction:</span> At Craft PC, we're not just about selling components and prebuilt PCs; we're part of a vibrant community of tech enthusiasts, gamers, and creative professionals. We've been fortunate to witness some incredible
                custom PC builds by our customers, and in this blog, we're excited to showcase these inspiring creations. Get ready to be awed by the talent and creativity of our community members and find inspiration for your next custom PC build.

                <br> <br> <span>1. The Battlestation Titan: An Epic Gaming Rig</span> One of our customers, [Customer Name], shared their epic gaming rig build with us. Featuring a high-end CPU, multiple GPUs in SLI, and a custom liquid cooling loop,
                this PC is a true beast. The RGB lighting and custom cable management make it a visual masterpiece. [Customer Name] showcases how you can push the boundaries of gaming performance and aesthetics.

                <br> <br> <span>2. The Workstation Wonder: A Content Creator's Dream</span> For content creators, [Customer Name]'s build is a dream come true. Equipped with a powerful CPU, a high-capacity RAM, and multiple storage options, this PC handles
                video editing and rendering like a pro. The meticulously designed workstation setup with dual monitors shows that creativity and productivity go hand in hand.
                <br> <br> <span>
                    3. Steampunk Masterpiece: Aesthetic Meets Functionality</span> If you appreciate unique aesthetics, Zaviyar's steampunk-themed custom PC build is a work of art. The brass accents, antique gears, and custom-designed case make it a standout
                build. This build is proof that PC building is not just about performance but also a canvas for artistic expression.

                <br> <br> <span> 4. Minimalist Marvel: Clean and Elegant Design</span> Sometimes, less is more. [Customer Name]'s minimalist custom PC build is a testament to the elegance of simplicity. With a compact case, a single GPU, and clean cable
                management, this PC exemplifies the "less clutter, more focus" mantra. The build is not just about what's included but what's left out, creating a zen-like computing experience.

                <br> <br> <span>5. The Budget Beast: Value and Performance Combined</span> Not all inspiring builds come with a hefty price tag. [Customer Name] proves that a budget build can also be remarkable. Their custom PC features carefully chosen
                components that strike a balance between cost and performance. It's a perfect example of making the most of what you have and optimizing for value.

                <br> <br> <span>6. The Modder's Paradise: Creative Case Modding</span> Some customers take their custom PC builds to the next level by modifying their cases. [Customer Name]'s custom case mod, inspired by [Theme/Concept], is a sight to
                behold. It showcases the dedication and skills required for case modding and proves that a PC can be a piece of art.

                <br> <br> <span> Conclusion:</span><br> The custom PC build showcase from our customers is a testament to the diversity, creativity, and passion of the PC building community. Whether you're into gaming, content creation, aesthetics, or
                budget-friendly builds, there's something to inspire you. These builds are not just about the components; they represent the dedication, innovation, and craftsmanship of our customers. If you're planning your own custom PC build, take
                a page from these inspiring builds and let your imagination run wild. We're proud to be part of a community that continues to push the boundaries of what's possible in PC building. So, to all our customers who have shared their creations,
                thank you for inspiring us and others to dream bigger and build better.</p>
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