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
                            <h6 class="mb-0">Assigned Transaction Queue (empty before the day ends)</h6>
                            <p class="text-sm mb-0">Status: Assigned to you</p>
                        </div>
                        <div>
                            <form id="reject-all-assigned" action="transaction-reject-all-rider" method="POST">
                                <input
                                    id="cancel-reason"
                                    class="d-none"
                                    type="text"
                                    name="reason">
                                <?php foreach ($assigned_transactions as $assigned) : ?>
                                    <input
                                        class="d-none"
                                        type="text"
                                        name="status"
                                        value="Rejected by Rider">
                                    <input
                                        class="d-none"
                                        type="text"
                                        name="transaction-ids[]"
                                        value="<?= $assigned['transaction_id'] ?>"
                                        readonly>
                                <?php endforeach; ?>
                                <button class="btn btn-outline-danger" <?= $assigned_transactions ? '' : 'disabled' ?>>Reject All</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div id="assign-trans-container" class="row">
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
                                            <span class="m-2 text-xs">Status: Pending</span>
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

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const form = document.querySelector('#reject-all-assigned');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        Swal.fire({
            icon: "question",
            title: "Are you sure?",
            text: "You want to reject all assigned transactions",
            allowOutsideClick: false,
            showConfirmButton: true,
            showCancelButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: "question",
                    title: "Send customer your reason",
                    allowOutsideClick: false,
                    input: "textarea",
                    inputPlaceholder: "Type your message here...",
                    inputAttributes: {
                        "aria-label": "Type your message here"
                    },
                    inputValidator: (value) => {
                        if (!value) {
                            return "This field is required!";
                        }
                    },
                    confirmButtonText: "Send",
                    showCancelButton: true // Optional: adds a cancel button
                }).then((resultv2) => {
                    document.querySelector('#cancel-reason').value = resultv2.value
                    if (resultv2.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: 'Sending...',
                            text: 'Please wait while we send your email.',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading(); // Show loading spinner
                            }
                        });
                    }
                })
            }
        });
    });
</script>

<?php if (isset($_SESSION['__flash']['reject_all'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Successfully rejected all assigned transactions!",
            allowOutsideClick: false,
        });
    </script>
<?php elseif (isset($_SESSION['__flash']['rider_changed_status'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Status changed to <?= $_SESSION['__flash']['rider_changed_status'] ?>!",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>

<?php require base_path('resources/views/components/rider_foot.php') ?>