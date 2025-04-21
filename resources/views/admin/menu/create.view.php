<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 pt-3">

        <form class="menu_item_store needs-validation" action="menu-store-admin" method="POST" enctype="multipart/form-data" novalidate>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="bg-white py-4 px-4 shadow-sm rounded">
                        <h3 class="mb-4">Add new item</h3>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="validationCustom01" class="form-label">Item Name</label>
                                <input type="text" class="form-control border border-dark px-2" id="validationCustom01" name="menu_name" placeholder="Chocolate Frappe" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid Item Name!
                                </div>
                                <?php if (isset($errors['menu_name'])): ?>
                                    <ul class="m-0 p-0" style="list-style: none;">
                                        <?php foreach ($errors['menu_name'] as $error): ?>
                                            <li class="text-danger"><?= htmlspecialchars($error) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="validationCustom02" class="form-label">Size</label>
                                <input type="text" class="form-control border border-dark px-2" id="validationCustom02" name="menu_size" placeholder="M" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid size!
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="validationCustom03" class="form-label">Price</label>
                                <input type="text" class="form-control border border-dark px-2" id="validationCustom03" name="menu_size_price" placeholder="40.00" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid price!
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="validationCustom04" class="form-label">Category</label>
                                <input type="text" class="form-control border border-dark px-2" id="validationCustom04" name="menu_category" placeholder="MILKTEA" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid category!
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="validationCustom05" class="form-label">Description</label>
                                <textarea
                                    type="text"
                                    class="form-control border border-dark px-2"
                                    id="validationCustom05"
                                    name="menu_description"
                                    placeholder="Masarap kahit walang sauce..." maxlength="200" rows="5" required></textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter a valid Description!
                                </div>
                                <?php if (isset($errors['menu_description'])): ?>
                                    <ul class="m-0 p-0" style="list-style: none;">
                                        <?php foreach ($errors['menu_description'] as $error): ?>
                                            <li class="text-danger"><?= htmlspecialchars($error) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button class="mt-3 btn btn-primary">Submit</button>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-4">
                    <div class="bg-white p-4 shadow-sm rounded h-100">
                        <label class="drop-area h-100 w-100 form-control" for="input-upload-item">
                            <input class="input-upload-item d-none" name="menu-item-img" type="file" accept="image/*" id="input-upload-item">
                            <div class="image-view-container rounded d-flex flex-column align-items-center justify-content-center h-100" style="border: 1px dashed black; object-fit: cover; background-position: center;">
                                <img class="w-25" src="../../storage/frontend/admin/transaction/upload-logo.png" alt="upload-logo">
                                <p class="opacity-4 m-0">500x500</p>
                                <p class="text-center text-md mb-0">Click here to upload image</p>
                            </div>
                        </label>
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