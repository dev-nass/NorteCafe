<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xl-6 mb-xl-0 mb-4">
                        <div class="card bg-transparent shadow-xl">
                            <div class="overflow-hidden position-relative border-radius-xl">
                                <img src="../../resources/assets/img/illustrations/pattern-tree.svg" class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
                                <span class="mask bg-gradient-dark opacity-10"></span>
                                <div class="card-body position-relative z-index-1 p-3">
                                    <h5 class="text-white mt-4">Transaction ID: <?= $transactions[0]['transaction_id'] ?></h5>
                                    <div class="pb-4">
                                        <p class="text-white text-sm opacity-8 mb-0">Status: <span class="text-white mb-0"><?= $transactions[0]['status'] ?></span></p>
                                    </div>
                                    <div class="d-flex" style="padding-top: 2.3rem;">
                                        <div class="d-flex">
                                            <div class="me-4">
                                                <p class="text-white text-xs opacity-8 mb-0">Customer Name</p>
                                                <h6 class="text-white mb-0"><?= $transactions[0]['username'] ?></h6>
                                            </div>
                                            <div>
                                                <p class="text-white text-xs opacity-8 mb-0">Placed At</p>
                                                <h6 class="text-white mb-0"><?= date("F d, Y \a\\t h:i A", strtotime($transactions[0]['created_at']));  ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                                            <i class="material-symbols-rounded opacity-10">payments</i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 text-center">
                                        <h6 class="text-center mb-0">Amount Due</h6>
                                        <span class="text-xs">To be paid by the customer</span>
                                        <hr class="horizontal dark my-3">
                                        <h5 class="mb-0">₱<?= $transactions[0]['amount_due'] ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                                            <i class="material-symbols-rounded opacity-10">delivery_truck_speed</i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 text-center">
                                        <h6 class="text-center mb-0">Shipping Fee</h6>
                                        <span class="text-xs">Default fee each order</span>
                                        <hr class="horizontal dark my-3">
                                        <h5 class="mb-0">₱50.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-lg-0 mb-4">
                        <div class="card mt-4">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <h6 class="mb-0">Payment Method</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-12 mb-md-0 mb-4">
                                        <div class="card card-body border card-plain border-radius-lg d-flex align-items-center justify-content-between flex-row">
                                            <div>
                                                <h6 class="mb-0">Phone Number: 09071055556</h6>
                                                <span class="">Method: </span>
                                            </div>

                                            <div>
                                                <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                                                    <i class="material-symbols-rounded opacity-10">photo_library</i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Rider Details</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-0 d-flex flex-column justify-content-between">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column justify-content-between">
                                    <div class="d-flex flex-column">
                                        <h4 class="mb-1 text-dark font-weight-bold">Aruthuro Velaskes</h4>
                                        <span class="text-xs">09507373644</span>
                                    </div>
                                    <div class="d-flex align-items-center text-sm">
                                        Online
                                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-symbols-rounded text-lg position-relative me-1">picture_as_pdf</i> View</button>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="mb-1">
                            <img class="w-75 h-100" src="../../storage/frontend/admin/transaction/delivery-proof-dummy.jpg" alt="delivery-proof">
                        </div>

                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="mb-1 text-xs">Delivery At: </span>
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Amount Due: </h6>
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Amount Tendered: </h6>
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Change: </h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3 d-flex justify-content-between">
                        <h6 class="mb-0">Order Details</h6>
                        <div class="d-flex align-items-center">
                            <span class="me-2 text-sm">Archive </span>
                            <form id="transaction-archive" action="transaction-archive" method="POST">
                                <input
                                    class="d-none"
                                    name="transaction-id"
                                    value="<?= $transactions[0]['transaction_id'] ?>">
                                <button form="transaction-archive" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-symbols-rounded text-lg">close</i></button>
                            </form>
                        </div>

                    </div>
                    <div class="card-body pt-4 p-3">
                        <?php foreach ($transactions as $transaction) : ?>
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-row">
                                        <div class="w-25 me-4">
                                            <img class="w-100 h-100" src="<?= $transaction['image_dir'] ?>" alt="">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-3 text-sm"><?= $transaction['menu_item_name'] ?></h6>
                                            <span class="mb-2 text-xs">Category: <span class="text-dark font-weight-bold ms-sm-2"><?= $transaction['category'] ?></span></span>
                                            <span class="mb-2 text-xs">Add Ons: <span class="text-dark ms-sm-2 font-weight-bold"><?= $transaction['add_on_name'] ?></span></span>
                                        </div>
                                        <div class="ms-auto d-flex flex-column justify-content-end">
                                            <span class="mb-2 text-xs text-end">Quantity: <span class="text-dark ms-sm-2 font-weight-bold"><?= $transaction['quantity'] ?></span></span>
                                            <span class="mb-2 text-xs">Price: <span class="text-dark ms-sm-2 font-weight-bold">₱<?= number_format($transaction['total_price'] + $transaction['add_on_price'], '2', '.')  ?></span></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="mb-0">Previews Transactions</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                        <ul class="list-group">
                            <?php foreach ($previewsTransactions as $previews) : ?>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <a class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center" href="transaction-show?transaction_id=<?= $previews['transaction_id'] ?>"><i class="material-symbols-rounded text-lg">info_i</i></a>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Transaction ID: <?= $previews['transaction_id'] ?></h6>
                                            <span class="text-xs"><?= date("F d, Y \a\\t h:i A", strtotime($previews['created_at'])); ?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                        ₱<?= $previews['amount_due'] ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php require base_path('resources/views/components/admin_foot.php') ?>