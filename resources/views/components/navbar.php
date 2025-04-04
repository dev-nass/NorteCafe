<header class="main-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container">

            <!-- Brand Name/logo -->
            <a id="brand" href="index">
                <h4 class="mb-0"><span class="logo-text-1">Norte</span> <span class="logo-text-2">Cafe</span></h4>
            </a>

            <!-- Menu -->
            <div id="navbar-collapse-toggle" class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav mx-auto">
                    <li>
                        <a href="index" class="nav-link">Home</a>
                    </li>
                    <li>
                        <a href="menu" class="nav-link">Menu</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="about-us-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ABOUT
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="aboutUsNorteCafe">Norte Cafe</a></li>
                                <li><a class="dropdown-item" href="aboutUsDevelopers">Developers</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="findStore.php" class="nav-link">Find Store</a>
                    </li>
                </ul>

                <!-- <div id="div-search" class="ms-auto d-flex d-lg-none justify-content-center">
                    <input id="input-search" class="form-control w-auto me-2" type="search" placeholder="Search" aria-label="Search">
                    <button id="button-search" class="btn btn-outline-light" type="submit">Search</button>
                    </div> -->
                <!-- Profile (Small screen) -->
                <div class="ms-auto d-flex d-lg-none flex-column align-items-center justify-content-center mt-3">
                    <a href="cart" class="text-dark"><i class="fa-solid fa-cart-shopping mb-4"></i></a>
                    <div class="profile">
                        <?php if (isset($_SESSION['__currentUser'])) : ?>
                            <a href="profile" class="choco-btn">
                                <?= $_SESSION['__currentUser']['credentials']['username'] ?>
                            </a>
                        <?php else : ?>
                            <a href="login" class="choco-btn">
                                Sign In
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Profile (Large scren) -->
            <div class="ms-auto d-none d-lg-flex align-items-center">
                <a href="cart" class="text-dark position-relative">
                    <i class="fa-solid fa-cart-shopping fs-6"></i>
                    <?php if (isset($_SESSION['__currentUserCarts'])) : ?>
                        <span class="position-absolute top-25 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: .6rem;">
                            <?= $_SESSION['__currentUserCarts']['cart_count']['COUNT(user_id)'] ?>
                        </span>
                    <?php endif; ?>
                </a>
                <div class="profile ms-3">
                    <?php if (isset($_SESSION['__currentUser'])) : ?>
                        <a href="profile" class="choco-btn">
                            <?= $_SESSION['__currentUser']['credentials']['username'] ?>
                        </a>
                    <?php else : ?>
                        <a href="login" class="choco-btn">
                            Sign In
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Small screen toggle -->
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>
</header>