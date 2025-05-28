<?php require base_path('resources/views/components/head.php') ?>
<?php require base_path('resources/views/components/navbar.php') ?>

<section class="section-container">
    <div class="container py-5">
        <h5 class="hero-header fs-2 ms-lg-3">Current Transactions</h5>
        <p class="ms-3">(Pending, Cancellation & Approved)</p>
        <div class="row gx-5">
            <?php if (! $currentTransactions) : ?>
                <p class="ms-3">An empty void found!</p>
            <?php else : ?>
                <?php foreach ($currentTransactions as $transaction) : ?>
                    <div class="col-12 col-lg-6 mt-3">
                        <div class="row white-bg shadow rounded p-3">
                            <div class="col-7">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 fs-5">Transaction ID: <?= $transaction['transaction_id'] ?></h6>
                                    <span class="mb-2 fs-6 text-secondary">Location: <span class="text-dark ms-sm-2 font-weight-bold"><?= substr($transaction['location'], 0, 40) ?>...</span></span>
                                    <span class="mb-2 fs-6 text-secondary">Email: <span class="text-dark font-weight-bold ms-sm-2"><?= $transaction['email'] ?></span></span>
                                    <span class="mb-2 fs-6 text-secondary">Contact Number: <span class="text-dark ms-sm-2 font-weight-bold"><?= $transaction['contact_number'] ?></span></span>
                                    <span class="text-xs text-secondary">Total Price: <span class="text-dark ms-sm-2 font-weight-bold">₱<?= $transaction['amount_due'] ?></span></span>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="ms-auto d-flex flex-column align-items-end justify-content-between h-100">
                                    <div class="text-end">
                                        <span class="text-xs text-secondary text-end" style="font-size: .9rem;">Placed At: <span class="text-dark"><?= date("F d, Y", strtotime($transaction['created_at'])); ?></span></span>
                                        <span class="m-2 fs-6 text-secondary" style="font-size: .9rem;">Status: <span class="text-dark"><?= $transaction['status'] ?></span></span>
                                    </div>
                                    <a class="mb-2 choco-btn px-3 mb-0" style="font-size: .9rem;" href="transaction-show?id=<?= $transaction['transaction_id'] ?>">View Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require base_path('resources/views/components/foot.php') ?>