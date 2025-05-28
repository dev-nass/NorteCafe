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
                            <div class="overflow-hidden position-relative border-radius-xl choco-gradient-bg-v2">
                                <img src="../../resources/assets/img/illustrations/pattern-tree.svg" class="position-absolute opacity-3 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
                                <div class="card-body position-relative z-index-1 px-3">
                                    <h5 class="text-white mt-2">Transaction ID: <?= $transactions[0]['transaction_id'] ?></h5>
                                    <div class="pb-4">
                                        <p class="text-white text-sm opacity-8 mb-0">Status: <span class="text-white mb-0"><?= $transactions[0]['status'] ?></span></p>
                                    </div>
                                    <div class="d-flex" style="padding-top: 1rem;">
                                        <div class="">
                                            <div class="mb-2">
                                                <p class="text-white text-sm mb-0">Customer Name: <a class="fw-light text-light text-decoration-underline" href="customer-show-admin?customer_id=<?= $transactions[0]['user_id'] ?>"><?= $transactions[0]['username'] ?></a></p>
                                                <h6 class="text-white mb-0"></h6>
                                            </div>
                                            <div class="mb-2">
                                                <p class="text-white text-sm mb-0">Placed At: <span class="fw-light"><?= date("F d, Y \a\\t h:i A", strtotime($transactions[0]['created_at']));  ?></span></p>
                                            </div>
                                            <div>
                                                <h6 class="mb-lg-1 text-white text-sm">Address: <span class="fw-light"><?= $transactions[0]['location'] ?></span></h6>
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
                                        <div class="icon icon-shape icon-lg choco-gradient-bg-v2 shadow text-center border-radius-lg">
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
                                        <div class="icon icon-shape icon-lg choco-gradient-bg-v2 shadow text-center border-radius-lg">
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
                    <div class="col-md-12 w-100 mb-lg-0 mb-4">
                        <div class="card mt-4 p-2 shadow-sm">
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
                                        <div class="card card-body border card-plain border-radius-lg pb-2 d-flex align-items-center justify-content-between flex-row">
                                            <div>
                                                <h6 class="mb-0">Phone Number: 09071055556</h6>
                                                <span class="">Method: <?= $transactions[0]['payment_method'] ?></span>
                                            </div>

                                            <div>
                                                <button title="Proof of Payment" type="button" class="btn choco-gradient-bg-v2" data-bs-toggle="modal" data-bs-target="#proofOfPaymentModal">
                                                    <div class="icon icon-shape icon-lg shadow text-center border-radius-lg d-flex align-items-center justify-content-center rounded">
                                                        <i class="material-symbols-rounded opacity-10 text-white">photo_library</i>
                                                    </div>
                                                </button>

                                            </div>

                                            <!-- Proof of Payment Modal -->
                                            <div class="modal fade" id="proofOfPaymentModal" tabindex="-1" aria-labelledby="proofOfPaymentModal" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Proof of Payment</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="border h-100">
                                                                <img class="w-100" style="object-fit: cover;" src="<?= $transactions[0]['payment_proof_dir'] ?>" alt="delivery-proof">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="pb-0 p-3 white-bg">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Rider Details</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0 pb-0 d-flex flex-column justify-content-between">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column justify-content-between">
                                    <div class="d-flex flex-column">
                                        <h4 class="mb-1 text-dark font-weight-bold"><?= $transactions[0]['rider_name'] ?></h4>
                                        <span class="text-xs"><?= $transactions[0]['rider_contact_number'] ?></span>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="p-0 border h-100">
                            <img class="w-100 responsive-height" style="object-fit: cover;" src="<?= $transactions[0]['delivery_proof_dir'] ?>" alt="delivery-proof">
                        </div>

                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="mb-1 text-xs" style="font-size: .8rem">Delivered At: <?= !empty($transactions[0]['delivered_at']) ? date("F d, Y \a\\t h:i A", strtotime($transactions[0]['delivered_at'])) : '' ?></span>
                                        <h6 class="mb-md-2 mb-lg-1 text-secondary">Discount: <span class="text-dark"><?= $transactions[0]['discount_name'] ?></span></h6>
                                        <h6 class="mb-md-2 mb-lg-1 text-secondary">Amount Due: <span class="text-dark">₱<?= $transactions[0]['amount_due'] ?></span></h6>
                                        <h6 class="mb-md-2 mb-lg-1 text-secondary">Amount Tendered: <span class="text-dark">₱<?= $transactions[0]['amount_tendered'] ?></span></h6>
                                        <h6 class="mb-md-2 mb-lg-1 text-secondary">Change: <span class="text-dark">₱<?= $transactions[0]['change'] ?></span></h6>
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
                            <form id="transaction-archive" action="transaction-archive-admin" method="POST">
                                <input
                                    class="d-none"
                                    name="transaction-id"
                                    value="<?= $transactions[0]['transaction_id'] ?>">
                                <button title="Archive" form="transaction-archive" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-symbols-rounded text-lg">close</i></button>
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
                                <h6 class="mb-0">Previous Transactions</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                        <ul class="list-group">
                            <?php foreach ($previousTransactions as $previous) : ?>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <a class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center" href="transaction-show-admin?transaction_id=<?= $previous['transaction_id'] ?>"><i class="material-symbols-rounded text-lg">info_i</i></a>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Transaction ID: <?= $previous['transaction_id'] ?></h6>
                                            <span class="text-xs"><?= date("F d, Y \a\\t h:i A", strtotime($previous['created_at'])); ?></span>
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

</main>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const archiveForm = document.querySelector('#transaction-archive');

    archiveForm.addEventListener('submit', (e) => {
        e.preventDefault();
        Swal.fire({
            icon: "question",
            title: "Are you sure",
            text: "You really want to archive this transaction record?",
            allowOutsideClick: false,
            confirmButtonText: "Yes",
            showCancelButton: true
        }).then((sureOrNot) => {
            // console.log(sureOrNot);
            if (sureOrNot.isConfirmed) {
                archiveForm.submit();
            }
        });
    });
</script>

<?php if (isset($_SESSION['__flash']['rider_assigned'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Transaction assigned to <?= $transactions[0]['rider_name'] ?>!",
            allowOutsideClick: false,
        });
    </script>
<?php elseif (isset($_SESSION['__flash']['rejected'])) :  ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Transaction rejected!",
            allowOutsideClick: false,
        });
    </script>
<?php elseif (isset($_SESSION['__flash']['cancellation']) && $_SESSION['__flash']['cancellation'] === 'Cancelled') :  ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Transaction cancelled!",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>

<?php require base_path('resources/views/components/admin_foot.php') ?>