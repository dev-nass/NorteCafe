<?php require base_path('resources/views/components/head.php') ?>
<?php require base_path('resources/views/components/navbar.php') ?>

<section class="section-container">
    <div class="container py-5">
        <h5 class="hero-header fs-2 ms-lg-3">Current Transactions</h5>
        <p class="ms-3">(Pending & Approved)</p>
        <div class="row">
            <?php if (! $currentTransactions) : ?>
                <p class="ms-3">An empty void found!</p>
            <?php else : ?>
                <?php foreach ($currentTransactions as $transaction) : ?>
                    <div class="col-12 col-md-6 mt-2">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 fs-5">Transaction ID: <?= $transaction['transaction_id'] ?></h6>
                                    <span class="mb-2 text-xs text-secondary">Location: <span class="text-dark ms-sm-2 font-weight-bold"><?= $transaction['address'] ?></span></span>
                                    <span class="mb-2 text-xs text-secondary">Email: <span class="text-dark font-weight-bold ms-sm-2"><?= $transaction['email'] ?></span></span>
                                    <span class="mb-2 text-xs text-secondary">Contact Number: <span class="text-dark ms-sm-2 font-weight-bold"><?= $transaction['contact_number'] ?></span></span>
                                    <span class="text-xs text-secondary">Total Price: <span class="text-dark ms-sm-2 font-weight-bold">₱<?= $transaction['amount_due'] ?></span></span>
                                </div>
                                <div class="ms-auto d-flex flex-column align-items-end">
                                    <span class="m-2 text-xs text-secondary">Status: <span class="text-dark"><?= $transaction['status'] ?></span></span>
                                    <a class="btn btn-link text-danger text-gradient px-3 mt-2 mb-0" href="javascript:;"><i class="material-symbols-rounded text-sm me-2">delete</i>Delete</a>
                                    <a class="mb-2 btn btn-link text-dark px-3 mb-0" href="transaction-show?id=<?= $transaction['transaction_id'] ?>"><i class="material-symbols-rounded text-sm me-2">edit</i>View Order</a>
                                    <span class="text-xs text-secondary">Placed At: <span class="text-dark"><?= $transaction['created_at'] ?></span></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require base_path('resources/views/components/foot.php') ?>