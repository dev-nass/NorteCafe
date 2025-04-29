<aside class="sidenav navbar navbar-vertical navbar-expand-xs z-index-3 border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="../../storage/frontend/user/img/index/rabbit-admin.png" class="navbar-brand-img" width="30" height="30" alt="main_logo">
            <span class="ms-1 text-sm text-dark">Norte Cafe</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Interface</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('dashboard') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="dashboard">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('transaction-queue-admin') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="transaction-queue-admin">
                    <i class="material-symbols-rounded opacity-5">receipt_long</i>
                    <span class="nav-link-text ms-1">Transaction Queue</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Add records</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('menu-create-admin') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="menu-create-admin">
                    <i class="material-symbols-rounded opacity-5">add_shopping_cart</i>
                    <span class="nav-link-text ms-1">Menu Item</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('size-create-admin') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="size-create-admin">
                    <i class="material-symbols-rounded opacity-5">masked_transitions_add</i>
                    <span class="nav-link-text ms-1">Menu Size</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('add-ons-create-admin') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="add-ons-create-admin">
                    <i class="material-symbols-rounded opacity-5">playlist_add</i>
                    <span class="nav-link-text ms-1">Add-On</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('discount-create-admin') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="discount-create-admin">
                    <i class="material-symbols-rounded opacity-5">add_card</i>
                    <span class="nav-link-text ms-1">Discount</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('employee-create-admin') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="employee-create-admin">
                    <i class="material-symbols-rounded opacity-5">person_add</i>
                    <span class="nav-link-text ms-1">Employee</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('rider-create-admin') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="rider-create-admin">
                    <i class="material-symbols-rounded opacity-5">sports_motorsports</i>
                    <span class="nav-link-text ms-1">Rider</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Tables</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('transaction-table-admin') ? 'active choco-gradient-bg text-light' : 'text-dark' ?>" href="transaction-table-admin">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Transactions</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('customer-table-admin') ? 'active choco-gradient-bg text-light' : 'text-dark' ?>" href="customer-table-admin">
                    <i class="material-symbols-rounded opacity-5">group</i>
                    <span class="nav-link-text ms-1">Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('employee-table-admin') ? 'active choco-gradient-bg text-light' : 'text-dark' ?>" href="employee-table-admin">
                    <i class="material-symbols-rounded opacity-5">badge</i>
                    <span class="nav-link-text ms-1">Employees</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('rider-table-admin') ? 'active choco-gradient-bg text-light' : 'text-dark' ?>" href="rider-table-admin">
                    <i class="material-symbols-rounded opacity-5">moped</i>
                    <span class="nav-link-text ms-1">Riders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('menu-table-admin') ? 'active choco-gradient-bg text-light' : 'text-dark' ?>" href="menu-table-admin">
                    <i class="material-symbols-rounded opacity-5">shopping_cart</i>
                    <span class="nav-link-text ms-1">Menu Items</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('add-ons-table-admin') ? 'active choco-gradient-bg text-light' : 'text-dark' ?>" href="add-ons-table-admin">
                    <i class="material-symbols-rounded opacity-5">menu</i>
                    <span class="nav-link-text ms-1">Add-On</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('discount-table-admin') ? 'active choco-gradient-bg text-light' : 'text-dark' ?>" href="discount-table-admin">
                    <i class="material-symbols-rounded opacity-5">credit_card</i>
                    <span class="nav-link-text ms-1">Discount</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('profile-admin') ? 'active choco-gradient-bg text-light' : 'text-dark' ?>" href="profile-admin">
                    <i class="material-symbols-rounded opacity-5">person</i>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>