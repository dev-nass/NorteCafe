<?php require base_path('resources/views/components/head.php') ?>
<?php require base_path('resources/views/components/navbar.php') ?>

<section class="section-container">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xl-6 mb-xl-0 mb-4">
                        <div class="card bg-transparent shadow">
                            <div class="overflow-hidden position-relative border-radius-xl choco-gradient-bg">
                                <img src="../../resources/assets/img/illustrations/pattern-tree.svg" class="position-absolute opacity-25 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
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
                                <div class="card p-3 shadow-sm">
                                    <div class="card-header mx-4 p-3 text-center choco-gradient-bg mb-2 rounded">
                                        <div class="icon icon-shape text-center">
                                            <i class="material-symbols-rounded opacity-10 text-center text-white">payments</i>
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
                                <div class="card p-3 shadow-sm">
                                    <div class="card-header mx-4 p-3 text-center choco-gradient-bg mb-2 rounded">
                                        <div class="icon icon-shape icon-lg text-center">
                                            <i class="material-symbols-rounded opacity-10 text-white">delivery_truck_speed</i>
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
                        <div class="card mt-4 shadow-sm">
                            <div class="pb-0 p-3">
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
                                                <span class="">Method: <?= $transactions[0]['payment_method'] ?></span>
                                            </div>

                                            <div>
                                                <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg choco-gradient-bg p-3 rounded">
                                                    <i class="material-symbols-rounded opacity-10 text-white">photo_library</i>
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
                <div class="card h-100 shadow-sm">
                    <div class="pb-0 p-3 white-bg">
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
                                        <span class="mb-1" style="font-size: .8rem">Delivery At: </span>
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
                <div class="card shadow-sm">
                    <div class="pt-4 px-4 d-flex justify-content-between align-items-center white-bg">
                        <h6 class="mb-0">Order Details</h6>
                        <div class="d-flex align-items-center">
                            <span class="me-2 text-sm">Cancel </span>
                            <form id="transaction-archive" action="transaction-update" method="POST">
                                <input
                                    class="d-none"
                                    name="transaction-id"
                                    value="<?= $transactions[0]['transaction_id'] ?>">
                                <input
                                    class="d-none"
                                    name="status"
                                    value="Cancelled">
                                <button form="transaction-archive" class="btn btn-circle btn-outline-danger mb-0 p-2 btn-sm d-flex align-items-center justify-content-center"><i class="material-symbols-rounded fs-6">close</i></button>
                            </form>
                        </div>

                    </div>
                    <div class="card-body pt-2 px-3">
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
                <div class="card h-100 mb-4 shadow-sm">
                    <div class="pt-4 px-4 white-bg">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="mb-0">Previews Transactions (Newest)</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($previewsTransactions as $previews) : ?>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <a class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-2 btn-sm d-flex align-items-center justify-content-center btn-circle" href="transaction-show?id=<?= $previews['transaction_id'] ?>"><i class="material-symbols-rounded fs-6">info_i</i></a>
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
</section>

<?php require base_path('resources/views/components/foot.php') ?>