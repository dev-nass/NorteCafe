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
                <a class="nav-link <?= urlIs('assigned-transaction-queue-rider') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="assigned-transaction-queue-rider">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Assigned Trans.</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('current-transaction-queue-rider') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="current-transaction-queue-rider">
                    <i class="material-symbols-rounded opacity-5">calendar_today</i>
                    <span class="nav-link-text ms-1">Current Trans.</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('delivered-transaction-queue-rider') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="delivered-transaction-queue-rider">
                    <i class="material-symbols-rounded opacity-5">local_shipping</i>
                    <span class="nav-link-text ms-1">Delivered</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('contact-shop-rider') ? 'active choco-gradient-bg' : 'text-dark' ?>" href="contact-shop-rider">
                    <i class="material-symbols-rounded opacity-5">call</i>
                    <span class="nav-link-text ms-1">Contact Shop</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= urlIs('profile-rider') ? 'active choco-gradient-bg text-light' : 'text-dark' ?>" href="profile-rider">
                    <i class="material-symbols-rounded opacity-5">person</i>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>