<?php require base_path('resources/views/components/head.php') ?>
<?php require base_path('resources/views/components/navbar.php') ?>

<section class="section-container">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 mb-3">
                <div class="row gx-md-5">   
                    <!-- Profile Card -->
                    <div class="col-12 col-md-6 border white-bg">
                        <div class="d-flex flex-column py-4">
                            <div class="d-flex justify-content-center mb-3">
                                <img src="https://picsum.photos/seed/picsum/220/230" alt="" style="border-radius: 40px;">
                            </div>
                            <div class="d-flex flex-column justify-content-center px-3">
                                <h3 class="text-center mb-4">Jonas Vince Macawile</h3>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <p class="mb-0 fs-5">0<i class="material-symbols-rounded fs-6 align-baseline">shopping_cart</i></p>
                                        <h6>
                                            Carts
                                        </h6>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <p class="mb-0 fs-5">0<i class="material-symbols-rounded fs-6 align-baseline">receipt_long</i></p>
                                        <h6>
                                            Transactions
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex flex-column align-items-center mt-3">
                                <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">location_on</i>Dasmarinas City Cavite</span>
                                <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">mail</i>jonasemperor@gmail.com</span>
                                <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">call</i>09507373644</span>
                            </div>
                        </div>
                    </div>
                    <!-- Account Details -->
                    <div class="col-12 col-md-6">
                        <div class="row gy-3">
                            <!-- Acount Details -->
                            <div class="col-12 border white-bg py-4">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-4">Account Details</h5>
                                    <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">edit_square</i></span>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">First Name: </span>
                                    <p>Jonas Vince</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Last Name: </span>
                                    <p>Macawile</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Username: </span>
                                    <p>Pogiao123</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Date of Birth: </span>
                                    <p>August 24, 2005</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Gender: </span>
                                    <p>Male</p>
                                </div>
                            </div>
                            <!-- Shipping Address -->
                            <div class="col-12 border white-bg py-4">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-4">Shipping Address</h5>
                                    <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">edit_square</i></span>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Address: </span>
                                    <p>Blk J1 Lot 14</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Barangay: </span>
                                    <p>San Francisco 2</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">City: </span>
                                    <p>Dasmarinas City</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Provience: </span>
                                    <p>Cavite</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Country: </span>
                                    <p>Philippines</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-3 ms-lg-2">
                <div class="row gy-2">
                    <div class="col-12 border white-bg">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-4"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1 align-top">location_on</i>Shop Location</h5>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span class="text-secondary">Norte Cafe: </span>
                            <a href="#">Find Store</a>
                        </div>
                    </div>
                    <div class="col-12 border white-bg">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-4"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1 align-top">History</i>Previews Transactions</h5>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span class="text-secondary"></span>
                            <a href="#">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require base_path('resources/views/components/foot.php') ?>