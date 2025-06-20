<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 pt-3">

        <form id="addOn_update" class="needs-validation" action="add-ons-update-admin" method="POST" enctype="multipart/form-data" novalidate>
            <!-- Added for the update -->
            <input
                class="d-none"
                type="text"
                name="add_on_id"
                value="<?= $addOns['add_on_id'] ?>"
                readonly>
            <div class="row">
                <div class="col-12">
                    <div class="bg-white py-4 px-4 shadow-sm rounded">
                        <h3 class="mb-4">Edit Add-Ons</h3>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom01" class="form-label">Add On Name</label>
                                <input type="text" class="form-control border border-dark px-2" id="validationCustom01" name="add_on_name" placeholder="Honey Syrup" value="<?= old('add_on_name') ?? $addOns['name'] ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid Add On Name!
                                </div>
                                <?php error('add_on_name') ?>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="validationCustom02" class="form-label">Category</label>
                                <input type="text" class="form-control border border-dark px-2" id="validationCustom02" name="add_on_category" placeholder="MILKTEA" value="<?= $addOns['category'] ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid category!
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="validationCustom03" class="form-label">Price</label>
                                <input type="text" class="form-control border border-dark px-2" id="validationCustom03" name="add_on_price" placeholder="25.00" value="<?= number_format($addOns['price'], '2', '.', '') ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid price!
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="validationCustom04" class="form-label">Availability</label>
                                <select class="form-select border border-dark px-2" id="validationCustom04" name="available" required>
                                    <option value="1" <?= $addOns['available'] == 1 ? "checked" : "" ?>>Available</option>
                                    <option value="0" <?= $addOns['available'] == 0 ? "checked" : "" ?>>Not Available</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button class="mt-3 btn btn-primary" value="id<?= $addOns['add_on_id'] ?>">Submit</button>
                            <?php if ($addOns['status'] == 1) : ?>
                                <button form="addOns_delete" class="btn btn-outline-warning mt-3 ms-2">Archive</button>
                            <?php elseif ($addOns['status'] == 0) : ?>
                                <button form="addOns_reactivate" class="btn btn-outline-success mt-3 ms-2">Reactivate</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php if ($addOns['status'] == 1) : ?>
            <form id="addOns_delete" action="add-ons-delete-admin" method="POST">
                <input
                    class="d-none"
                    name="add_ons_id"
                    value="<?= $addOns['add_on_id'] ?>"
                    type="text"
                    readonly>
            </form>
        <?php elseif ($addOns['status'] == 0) : ?>
            <form id="addOns_reactivate" action="add-ons-reactivate-admin" method="POST">
                <input
                    class="d-none"
                    name="add_ons_id"
                    value="<?= $addOns['add_on_id'] ?>"
                    type="text"
                    readonly>
            </form>
        <?php endif; ?>
    </div>


    <footer class="footer py-4">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                        for a better web.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </div>

</main>

<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const formArchive = document.querySelector('#addOns_delete');

    formArchive.addEventListener('submit', (e) => {
        e.preventDefault();
        Swal.fire({
            icon: "question",
            title: "Are you sure",
            text: "You really want to archive this add on?",
            allowOutsideClick: false,
            confirmButtonText: "Yes",
            showCancelButton: true
        }).then((sureOrNot) => {
            // console.log(sureOrNot);
            if (sureOrNot.isConfirmed) {
                formArchive.submit();
            }
        });

    });
</script>

<script>
    const formReactivate = document.querySelector('#addOns_reactivate');

    formReactivate.addEventListener('submit', (e) => {
        e.preventDefault();
        Swal.fire({
            icon: "question",
            title: "Are you sure",
            text: "You really want to reactivate this add on?",
            allowOutsideClick: false,
            confirmButtonText: "Yes",
            showCancelButton: true
        }).then((sureOrNot) => {
            // console.log(sureOrNot);
            if (sureOrNot.isConfirmed) {
                formReactivate.submit();
            }
        });

    });
</script>

<?php if (isset($_SESSION['__flash']['add_ons_uploaded'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Add ons updated successfully!",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>

<?php require base_path('resources/views/components/admin_foot.php') ?>