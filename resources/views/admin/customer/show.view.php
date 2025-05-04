<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="d-flex justify-content-end px-4">
        <form action="customer-delete-admin" method="POST">
            <input
                class="d-none"
                name="user_id"
                value="<?= $user['user_id'] ?>"
                readonlys
                type="text">
                <button class="btn btn-danger mb-0">Archive</button>
        </form>
    </div>
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
        </div>
        <div class="card card-body mx-2 mx-md-2 mt-n6">
            <div class="row gx-4 mb-2 px-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="<?= $user['profile_dir'] ?? '../../storage/frontend/user/img/index/default-pfp.jpg' ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
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
                <div class="col-auto ms-auto">
                    <div class="row">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="d-flex flex-column align-items-center rounded-3 py-2 px-3 me-3" style="background-color: #f5f5f5;">
                                <p class="mb-0 text-md"><?= $cart_count["COUNT(user_id)"] ?><i class="material-symbols-rounded fs-6 align-baseline">shopping_cart</i></p>
                                <h6 class="text-sm">
                                    Carts
                                </h6>
                            </div>
                            <div class="d-flex flex-column align-items-center rounded-3 py-2 px-3" style="background-color: #f5f5f5;">
                                <p class="mb-0 text-md"><?= $transaction_count["COUNT(user_id)"] ?><i class="material-symbols-rounded fs-6 align-baseline">receipt_long</i></p>
                                <h6 class="text-sm">
                                    Trans.
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pe-0">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <div class="row">
                            <div class="col-6">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Profile Information</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> <?= $user['first_name'] . ' ' . $user['last_name'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Username:</strong> <?= $user['username'] ?></li>
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
                    <div class="col-12 col-xl-4">
                        <div class="card card-plain h-100 rounded-3" style="background-color: #f5f5f5;">
                            <div class="card-header pb-0 p-3" style="background-color: #f5f5f5;">
                                <h6 class="mb-0">Previous Transactions</h6>
                            </div>
                            <div class="card-body pe-0">
                                <ul class="list-group">
                                    <?php foreach ($previousTransactions as $previous) : ?>
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background-color: #f5f5f5;">
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center" href="transaction-show-admin?transaction_id=<?= $previous['transaction_id'] ?>"><i class="material-symbols-rounded text-lg">info_i</i></a>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Transaction ID: <?= $previous['transaction_id'] ?></h6>
                                                    <span class="text-xs"><?= date("F d, Y", strtotime($previous['created_at'])); ?></span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                                ₱<?= $previous['amount_due'] ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require base_path('resources/views/components/admin_foot.php') ?>