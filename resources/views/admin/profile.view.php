<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid px-2 px-md-4">
        <div class="d-flex justify-content-end">
            <form action="logout" method="POST">
                <button class="btn btn-outline-danger mb-0">Logout</button>
            </form>
        </div>
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
        </div>
        <div class="card card-body mx-2 mx-md-2 mt-n6">
            <div class="row gx-4 mb-2 px-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="<?= $user['profile_dir'] ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <?= $user['first_name'] . ' ' . $user['last_name'] ?>
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm text-dark">
                            Role: <span class="text-success"><?= $user['role'] ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row pe-0">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Profile Information</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> <?= $user['first_name'] . ' ' . $user['last_name'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Usermae:</strong> <?= $user['email'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Gender:</strong> <?= $user['gender'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Date of Birth:</strong> <?= $user['date_of_birth'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">Contact Information</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Email:</strong> <?= $user['email'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Contact Number:</strong> <?= $user['contact_number'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">Shipping Address</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">House Number:</strong> <?= $user['house_number'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Street:</strong> <?= $user['street'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Barangay:</strong> <?= $user['barangay'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">City:</strong> <?= $user['city'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Provience:</strong> <?= $user['provience'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Region:</strong> <?= $user['region'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Postal Code:</strong> <?= $user['postal_code'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require base_path('resources/views/components/admin_foot.php') ?>