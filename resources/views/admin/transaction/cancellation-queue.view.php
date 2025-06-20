<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card" aria-hidden="true">
                    <div class="card-header pb-0 px-3 d-flex justify-content-between">
                        <div>
                            <h6 class="mb-0">Cancellation Transactions Queue (empty before the day ends)</h6>
                            <p class="text-sm mb-0">Status: Cancellation</p>
                        </div>
                        <div>
                            <form id="approve-all-cancellation" action="transaction-cancellation-approve-all-admin" method="POST">  
                                <?php foreach($cancellation_transactions as $trans) : ?>
                                <input 
                                    class="d-none"
                                    type="text"
                                    name="status"
                                    value="Cancelled">
                                <input 
                                    class="d-none"
                                    type="text"
                                    name="transaction-ids[]"
                                    value="<?= $trans['transaction_id'] ?>"
                                    readonly>
                                <?php endforeach ; ?>
                                <button class="btn btn-outline-success" <?= $cancellation_transactions ? '' : 'disabled' ?> >Approve All</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div id="order-cancellation-queue-container" class="row">
                            <div class="col-12 col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 fs-5 placeholder-glow"><span class="placeholder col-7"></span></h6>
                                            <span class="mb-2 text-xs placeholder-glow">Transaction ID: <span class="placeholder col-4"></span></span>
                                            <span class="mb-2 text-xs placeholder-glow">Address: <span class="placeholder col-8"></span></span>
                                            <span class="text-xs placeholder-glow">Contact Number: <span class="placeholder col-6"></span></span>
                                        </div>
                                        <div class="ms-auto d-flex flex-column align-items-end">
                                            <!-- <select class="form-select w-75" aria-label="Default select example">
                                                <option selected>Status: </option>
                                                <option value="1">Pending</option>
                                                <option value="2">Approved</option>
                                                <option value="3">Delivery</option>
                                                <option value="4">Delivered</option>
                                            </select> -->
                                            <span class="m-2 text-xs">Status: Pending</span>
                                            <a class="btn btn-link text-danger text-gradient px-3 mt-2 mb-0" href="javascript:;"><i class="material-symbols-rounded text-sm me-2">delete</i>Delete</a>
                                            <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-symbols-rounded text-sm me-2">edit</i>View Order</a>
                                        </div>
                                    </li>
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

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const approveAllForm = document.querySelector('#approve-all-cancellation');

    approveAllForm.addEventListener('submit', (e) => {
        e.preventDefault();
        Swal.fire({
            icon: "question",
            title: "Are you sure?",
            text: "You really want to approve all of these transaction cancellation request?",
            allowOutsideClick: false,
            confirmButtonText: "Yes",
            showCancelButton: true
        }).then((sureOrNot) => {
            // console.log(sureOrNot);
            if (sureOrNot.isConfirmed) {
                approveAllForm.submit();
            }
        });
    });
</script>

<?php if (isset($_SESSION['__flash']['approve_all'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Successfully approved all cancellation transactions!",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>