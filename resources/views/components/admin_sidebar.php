<aside class="sidenav navbar navbar-vertical navbar-expand-xs z-index-3 border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="../../resources/assets/img/logo-ct-dark.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
            <span class="ms-1 text-sm text-dark">Creative Tim</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Interface</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="../pages/dashboard.html">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard (Not Working)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('transaction-queue-admin') ? 'active bg-gradient-dark' : 'text-dark' ?>" href="transaction-queue-admin">
                    <i class="material-symbols-rounded opacity-5">receipt_long</i>
                    <span class="nav-link-text ms-1">Transaction Queue</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Add records</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('menu-upload-admin') ? 'active bg-gradient-dark' : 'text-dark' ?>" href="menu-upload-admin">
                    <i class="material-symbols-rounded opacity-5">add_shopping_cart</i>
                    <span class="nav-link-text ms-1">Menu Item</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('add-ons-upload-admin') ? 'active bg-gradient-dark' : 'text-dark' ?>" href="add-ons-upload-admin">
                    <i class="material-symbols-rounded opacity-5">playlist_add</i>
                    <span class="nav-link-text ms-1">Add-On</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Tables</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('transaction-table-admin') ? 'active bg-gradient-dark text-light' : 'text-dark' ?>" href="transaction-table-admin">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Transactions</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('customer-table-admin') ? 'active bg-gradient-dark text-light' : 'text-dark' ?>" href="customer-table-admin">
                    <i class="material-symbols-rounded opacity-5">group</i>
                    <span class="nav-link-text ms-1">Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('menu-table-admin') ? 'active bg-gradient-dark text-light' : 'text-dark' ?>" href="menu-table-admin">
                    <i class="material-symbols-rounded opacity-5">menu</i>
                    <span class="nav-link-text ms-1">Menu Items</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="../pages/profile.html">
                    <i class="material-symbols-rounded opacity-5">person</i>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="../pages/sign-in.html">
                    <i class="material-symbols-rounded opacity-5">login</i>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="../pages/sign-up.html">
                    <i class="material-symbols-rounded opacity-5">assignment</i>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li>
        </ul>
    </div>
</aside>