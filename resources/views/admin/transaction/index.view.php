<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 px-1">
        <div class="responsive-table">
            <table id="transaction-table" class="table table-striped custom-data-table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Customer Details</th>
                        <th scope="col">Rider Details</th>
                        <th scope="col">Date</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Amount Due</th>
                        <th scope="col">Amount Tendered</th>
                        <th scope="col">Change</th>
                        <th scope="col">Status</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $transaction): ?>
                        <tr>
                            <th scope="row"><?= $transaction['transaction_id'] ?></th>
                            <td><?= $transaction['customer_detail'] ?></td>
                            <td><?= $transaction['rider_detail'] ?></td>
                            <td><?= date("F d, Y \a\\t h:i A", strtotime($transaction['created_at']));  ?></td>
                            <td><?= $transaction['payment_method'] ?></td>
                            <td>₱<?= $transaction['amount_due'] ?></td>
                            <td>₱<?= $transaction['amount_tendered'] ?></td>
                            <td>₱<?= $transaction['change'] ?></td>
                            <td><?= $transaction['status'] ?></td>
                            <td><a class="btn btn-dark" href="transaction-show-admin?transaction_id=<?= $transaction['transaction_id'] ?>">View</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</main>

<?php require base_path('resources/views/components/admin_foot.php') ?>