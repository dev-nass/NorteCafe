<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 pt-3">

        <form id="discount_store" class="needs-validation" action="discount-store-admin" method="POST" enctype="multipart/form-data" novalidate>
            <div class="row">
                <div class="col-12">
                    <div class="bg-white py-4 px-4 shadow-sm rounded">
                        <h3 class="mb-4">Create Discount</h3>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom01" class="form-label">Discount Name</label>
                                <input type="text" class="form-control border border-dark px-2" id="validationCustom01" name="discount_name" placeholder="50% off" value="<?= old('discount_name') ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid discount name!
                                </div>
                                <?php error('discount_name') ?>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="validationCustom02" class="form-label">Type</label>
                                <input type="text" class="form-control border border-dark px-2" id="validationCustom02" name="discount_type" placeholder="percentage" value="<?= old('discount_type') ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid type!
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="validationCustom03" class="form-label">Discount Value</label>
                                <input type="text" class="form-control border border-dark px-2" id="validationCustom03" name="discount_value" placeholder="10.00 / 0.010" value="<?= old('discount_value') ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid value!
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="validationCustom04" class="form-label">Min Amount</label>
                                <input type="text" class="form-control border border-dark px-2" id="validationCustom04" name="discount_min_amount" placeholder="500.00" value="<?= old('discount_min_amount') ?>" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid min amount!
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button class="mt-3 btn btn-primary">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
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

<?php require base_path('resources/views/components/admin_foot.php') ?>