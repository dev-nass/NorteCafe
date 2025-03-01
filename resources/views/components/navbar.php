<header class="main-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container">
            <!-- Brand Name/logo -->
            <a id="brand" href="index.php">
                <div class="mb-0"><img src="img/brand-logo.jpg" alt=""></div>
            </a>

            <!-- Menu -->
            <div id="navbar-collapse-toggle" class="collapse navbar-collapse justify-content-end">

                <!-- Profile (Small screen) -->
                <div class="ms-auto d-flex d-lg-none flex-column align-items-center justify-content-center mt-3">
                    <div class="profile">
                        <div class="dropdown-center">
                            <button class="btn dropdown-toggle no-arrow p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user m-3"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="#" class="normal-font dropdown-item">Hello, Guest </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="#"><a class="normal-font dropdown-item" href="php/previousOrderHistoryPage.php">Previous Order <i class="fa-solid fa-rotate-left"></i></a></li>
                                <li class="#">
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="php/logout.php" method="POST">
                                        <button type="submit" class="dropdown-item text-success">
                                            Login<i class="fa-solid fa-right-from-bracket ms-1"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <ul class="navbar-nav mx-auto">
                    <li>
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li>
                        <a href="php/itemList.php" class="nav-link">Guitars</a>
                    </li>
                    <li>
                        <a href="aboutUs.php" class="nav-link">About</a>
                    </li>
                    <li>
                        <a href="findStore.php" class="nav-link">Find Store</a>
                    </li>
                </ul>

                <!-- <div id="div-search" class="ms-auto d-flex d-lg-none justify-content-center">
            <input id="input-search" class="form-control w-auto me-2" type="search" placeholder="Search" aria-label="Search">
            <button id="button-search" class="btn btn-outline-light" type="submit">Search</button>
          </div> -->




            </div>

            <!-- Profile (Large scren) -->
            <div class="ms-auto d-none d-lg-flex align-items-center">
                <div class="profile">
                    <div class="dropdown-center">
                        <button class="btn dropdown-toggle no-arrow p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user m-3"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="normal-font dropdown-item" href="#">Hello, Guest </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="normal-font dropdown-item" href="#">Previous Orders <i class="fa-solid fa-clock-rotate-left"></i></a></li>
                            <li class="">
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="php/logout.php" method="POST">
                                    <button type="submit" class="dropdown-item text-success">
                                        Login<i class="fa-solid fa-right-from-bracket ms-1"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

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