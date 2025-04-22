<?php require base_path('resources/views/components/head.php')?>
<?php require base_path('resources/views/components/navbar.php')?>

<!-- Added for 1st time account log-in -->
<?php if(isset($_SESSION['__currentUser']['credentials']['verified'])) : ?>
    <input
    class="d-none"
    id="user_verified_status"
    value="<?= $_SESSION['__currentUser']['credentials']['verified'] ?>">
<?php endif ; ?>


<!-- SECTION 1 (Hero Section) -->
<section class="section-container white-bg">
    <div class="container py-5">
        <div class="row">

            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center hero-left">
                <img src="../../storage/frontend/user/img/index/hero-icon-white.png" class="hero-grid" />
            </div>

            <div class="col-12 col-md-6 py-4 hero-right">
                <div>
                    <h3 class="hero-header">
                        Discover the drinks and desserts that set you in the right mood.
                    </h3>
                </div>
                <div class="mt-2 mb-4">
                    <p>Explore a variety of rich, handcrafted coffees, delightful pastries, and savory treats. From classic brews to sweet indulgences, there’s something for every craving.</p>
                </div>
                <div class="mt-3 mb-4">
                    <a href="menu" class="choco-btn">
                        Order Now
                    </a>
                    <a href="contactUs" class="btn ms-2">Contact Us</a>
                </div>
                <div class="row">
                    <div class="col-6 mt-2">
                        <div class="d-flex">
                            <div class="square"><i class="fa-solid fa-door-open h4 square-icon"></i></div>
                            <div class="ms-2">Open Everday <br> (Except Holidays)</div>
                        </div>
                    </div>
                    <div class="col-6 mt-2">
                        <div class="d-flex">
                            <div class="square"><i class="fa-solid fa-clock h4 square-icon"></i></div>
                            <div class="ms-2">Open From <br> 10am-9pm</div>
                        </div>
                    </div>
                    <div class="col-6 mt-2">
                        <div class="d-flex">
                            <div class="square"><i class="fa-solid fa-utensils h4 square-icon"></i></div>
                            <div class="ms-2">For <br> Dine In</div>
                        </div>
                    </div>
                    <div class="col-6 mt-2">
                        <div class="d-flex">
                            <div class="square"><i class="fa-solid fa-truck h4 square-icon"></i></div>
                            <div class="ms-2">Online <br> Delivery</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 2 (Explore Our Menu) -->
<section class="section-container">
    <div class="container">
        <div>
            <h1 class="section-header text-center top-slide">Explore Our Menu</h1>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 d-flex justify-content-center container-interval-slide">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="../../storage/frontend/user/img/index/croffle.jpg" class="img-fluid rounded-start h-100" alt="...">
                        </div>
                        <div class="col-8 choco-bg">
                            <div class="card-body">
                                <h5 class="card-title">Croffle</h5>
                                <p class="card-text mt-2 mb-4">A crispy, flaky croissant pressed like a waffle, sweet or savory.</p>
                                <a href="category-filter?search=CROFFLES" class="white-choco-btn">View Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center container-interval-slide">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-8 choco-bg">
                            <div class="card-body">
                                <h5 class="card-title">Sandwhich & Nachos</h5>
                                <p class="card-text mt-2 mb-4">Crunchy nachos and hearty sandwiches, packed with flavors.</p>
                                <a href="category-filter?search=NACHOS" class="white-choco-btn">View Product</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <img src="../../storage/frontend/user/img/index/sandwhich-nachos.jpg" class="img-fluid rounded-start h-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 d-flex justify-content-center container-interval-slide">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="../../storage/frontend/user/img/index/coffee.jpg" class="img-fluid rounded-start h-100" alt="...">
                        </div>
                        <div class="col-8 dark-bg">
                            <div class="card-body">
                                <h5 class="card-title">Coffee</h5>
                                <p class="card-text mt-2 mb-4">Rich, aromatic coffee brewed to perfection for a delightful experience for everybody.</p>
                                <a href="category-filter?search=COFFEE" class="white-choco-btn">View Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center container-interval-slide">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-8 dark-bg">
                            <div class="card-body">
                                <h5 class="card-title">Milktea</h5>
                                <p class="card-text mt-2 mb-4">Creamy, flavorful, savoring milk tea with chewy boba for a refreshing treat.</p>
                                <a href="category-filter?search=MILKTEA" class="white-choco-btn">View Product</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <img src="../../storage/frontend/user/img/index/milktea.jpg" class="img-fluid rounded-start h-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>

<!-- SECTION 3 (Delivery Info) -->
<section class="section-container white-bg py-5">
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-12 col-md-6 left-slide">
                <h1 class="section-header delivery-header">Deliver Your Cravings at ⤦ Your Doorstep</h1>
                <p class="mt-3 mb-4">Satisfy your cravings with fast, fresh, and hassle-free online delivery. Enjoy delicious meals, snacks, and drinks brought straight to your doorstep with just a few clicks!</p>
                <a href="delivery-details" class="choco-btn mt-4">Learn More</a>
                <a href="faqs" class="btn ms-2">FAQ's</a>
            </div>
            <div class="col-12 col-md-6 mt-sm-5 mt-md-4 d-flex justify-content-center align-items-center right-slide">
                <div>
                    <img src="../../storage/frontend/user/img/index/delivery-logo.png" class="delivery-logo" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 4 (We Value) -->
<section class="section-container">
    <div class="container">
        <h1 class="section-header text-center top-slide">We Value</h1>
        <div class="row border mt-4">
            <div class="col-sm-6 col-lg-3 container-interval-slide">
                <div class="d-flex justify-content-between align-items-center flex-row flex-lg-column text-sm-start text-lg-center">
                    <div>
                        <div class="cirlce-container me-2 me-sm-3 mb-lg-3">
                            <i class="feature-icon fa fa-truck text-light"></i>
                        </div>
                    </div>
                    <div>
                        <p class="d-block mb-1 fw-bold">Fast & Free Shipping</p>
                        <p>We deliver your foods & drinks to your door with the utmost care and ease.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 container-interval-slide">
                <div class="d-flex justify-content-between align-items-center flex-row flex-lg-column text-sm-start text-lg-center">
                    <div>
                        <div class="cirlce-container me-2 me-sm-3 mb-lg-3">
                            <i class="feature-icon fa fa-lock text-light"></i>
                        </div>
                    </div>
                    <div>
                        <p class="d-block mb-1 fw-bold">Secure Payment</p>
                        <p>Shop confidently with secure transactions protecting your privacy.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 container-interval-slide">
                <div class="d-flex justify-content-between align-items-center flex-row flex-lg-column text-sm-start text-lg-center">
                    <div>
                        <div class="cirlce-container me-2 me-sm-3 mb-lg-3">
                            <i class="feature-icon fa fa-heart text-light"></i>
                        </div>
                    </div>
                    <div>
                        <p class="d-block mb-1 fw-bold">Customer Satisfaction</p>
                        <p>Your happiness is our priority, ensuring quality service always.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 container-interval-slide">
                <div class="d-flex justify-content-between align-items-center flex-row flex-lg-column text-sm-start text-lg-center">
                    <div>
                        <div class="cirlce-container me-2 me-sm-3 mb-lg-3">
                            <i class="feature-icon fa fa-comments text-light"></i>
                        </div>
                    </div>
                    <div>
                        <p class="d-block mb-1 fw-bold">Customer Support</p>
                        <p> We're here to assist you anytime, ensuring your needs are met.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 5 (Our Story) -->
<section class="pt-5 pb-2 white-bg">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center left-slide">
                <img src="../../storage/frontend/user/img/index/our-story.jpg" class="our-story-img w-sm-50" />
            </div>

            <div class="col-12 col-md-6 py-4 right-slide">
                <div>
                    <h1 class="section-header">
                        Story behind Norte Cafe by Cafe Buny
                    </h1>
                </div>
                <div class="mt-3 mb-4">
                    <p>Founded by two kindred hearts, our coffee shop is a tale of love, warmth, and shared dreams—brewing passion into every cup for you to enjoy. What started as a simple dream became a cozy haven where every sip tells a story, inviting you to experience comfort, connection, and heartfelt flavors.</p>
                </div>
                <div class="mt-3 mb-4">
                    <a href="aboutUsNorteCafe" class="choco-btn">
                        Learn More
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php require base_path('resources/views/components/foot.php')?>