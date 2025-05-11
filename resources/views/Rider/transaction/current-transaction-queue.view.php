<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/rider_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 overflow-hidden">

        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card" aria-hidden="true">
                    <div class="card-header pb-0 px-3 d-flex justify-content-between">
                        <div>
                            <h6 class="mb-0">Assigned Transaction Queue</h6>
                            <p class="text-sm mb-0">Status: Approved by Rider</p>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div class="row">
                            <?php foreach ($current_transactions as $trans) : ?>
                                <div class="col-12 col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="row w-100">
                                                <div class="col-7 d-flex flex-column">
                                                    <h6 class="mb-3 fs-5">Transaction ID: <?= $trans['transaction_id'] ?></h6>
                                                    <span class="mb-2 text-xs">Location: <span class="text-dark ms-sm-2 font-weight-bold"><?= $trans['location'] ?></span></span>
                                                    <span class="mb-2 text-xs">Contact Number: <span class="text-dark ms-sm-2 font-weight-bold"><?= $trans['contact_number'] ?></span></span>
                                                    <span class="mb-2 text-xs">Payment Method: <span class="text-dark ms-sm-2 font-weight-bold"><?= $trans['payment_method'] ?></span></span>
                                                    <span class="text-xs">Total Price: <span class="text-dark ms-sm-2 font-weight-bold">₱<?= $trans['amount_due'] ?></span></span>
                                                </div>

                                                <div class="col-5 d-flex flex-column align-items-end justify-content-between">
                                                    <div>
                                                        <div class="text-end">
                                                            <span class="mb-1 text-xs text-end">Placed At: <?= date("F d, Y \a\\t h:i A", strtotime($trans['trans_created_at'])) ?></span>
                                                        </div>
                                                        <div class="text-end">
                                                            <span class="mb-1 text-xs">Status: <?= $trans['transaction_status'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a class="mb-2 choco-btn text-dark px-3 mb-0 text-sm" href="transaction-show-rider?transaction_id=<?= $trans['transaction_id'] ?>">View Order</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            <?php endforeach; ?>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php require base_path('resources/views/components/rider_foot.php') ?>