<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2">
        <div class="row mb-4">
            <div class="col-12 col-lg-9 mt-4">
                <div class="row rounded-3 px-3 py-5 shadow-sm bg-white">
                    <div class="col-5" style="background-color: #fbfbfb;">
                        <div class="h-100 mb-4 ">
                            <div class="card-body pt-4 p-3">
                                <ul class="list-group">
                                    <img class="" style="height: 300px;" src="<?= $menuItem[0]['image_dir'] ?>" alt="menu_item_img">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="h-100 px-2">
                            <div class="card-header pb-0 px-3 d-flex justify-content-between">
                                <div>
                                    <h3 class="mb-0"><?= $menuItem[0]['name'] ?></h3>
                                    <p class="<?= $menuItem[0]['available'] ? 'text-success' : 'text-danger' ?>"><?= $menuItem[0]['available'] ? "Availabble" : "Not Available" ?></p>
                                </div>
                                <div>
                                    <button class="btn btn-primary p-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                                        <i class="material-symbols-rounded text-lg">edit_note</i>
                                    </button>
                                </div>
                                <!-- Off canvas -->
                                <div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="staticBackdropLabel">Edit <?= $menuItem[0]['name'] ?></h5>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="material-symbols-rounded text-lg">close</i></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div>
                                            <form class="menu_item_store row g-3 needs-validation" action="menu-update-admin" method="POST" enctype="multipart/form-data" novalidate>
                                                <div class="col-12" style="height: 350px">
                                                    <div class="bg-white rounded h-100">
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
                                                <!-- Used for upddating -->
                                                <input
                                                    class="d-none"
                                                    name="menu_item_id"
                                                    value="<?= $menuItem[0]['menu_item_id'] ?>">
                                                <div class="col-12">
                                                    <label for="validationCustom01" class="form-label">Item Name</label>
                                                    <input name="item_name" type="text" class="form-control border px-2" id="validationCustom01" value="<?= $menuItem[0]['name'] ?>" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="validationCustom02" class="form-label">Category</label>
                                                    <input name="category" type="text" class="form-control border px-2" id="validationCustom02" value="<?= $menuItem[0]['category'] ?>" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="validationCustom03" class="form-label">Description</label>
                                                    <textarea name="description" type="text" class="form-control border px-2" id="validationCustom03" required><?= $menuItem[0]['description'] ?></textarea>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="validationCustom04" class="form-label">Availability</label>
                                                    <select class="form-select border px-2" name="available">
                                                        <option value="1" <?php $menuItem[0]['available'] == 1 ? "seelcted" : "" ?> >Available</option>
                                                        <option value="2" <?php $menuItem[0]['available'] == 0 ? "seelcted" : "" ?> >Not Available</option>
                                                    </select>
                                                </div>
                                                <?php foreach ($menuItem as $item) : ?>
                                                    <div class="col-12">
                                                        <!-- For updating the size -->
                                                        <input
                                                            class="d-none"
                                                            name="menu_item_sizes_id[]"
                                                            value="<?= $item['menu_item_size_id'] ?>"
                                                            type="text">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="validationCustom<?= $item['menu_item_size_id'] ?>" class="form-label">Size</label>
                                                                <input name="sizes[]" type="text" class="form-control border px-2" id="validationCustom<?= $item['menu_item_size_id'] ?>" value="<?= $item['size'] ?>" required>
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="validationCustom<?= $item['menu_item_size_id'] ?>" class="form-label">Price</label>
                                                                <input name="prices[]" type="text" class="form-control border px-2" id="validationCustom<?= $item['menu_item_size_id'] ?>" value="<?= $item['price'] ?>" required>
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                                <div class="col-12">
                                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3 d-flex flex-column justify-content-around">
                                <h5><strong>Category:</strong></h5>
                                <p><?= $menuItem[0]['category'] ?></p>
                                <h5><strong>Description:</strong></h5>
                                <p><?= $menuItem[0]['description'] ?></p>
                                <h5><strong>Size:</strong></h5>
                                <div class="d-flex mb-2">
                                    <?php foreach ($menuSizes as $size) : ?>
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 d-flex align-items-center justify-content-center me-3 mb-2 bg-gray-100 border-radius-lg">
                                                <div class="d-flex flex-row">
                                                    <p><strong><?= $size['size'] ?></strong> ₱<?= $size['price'] ?></p>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3 mt-4">
                <div class="bg-white shadow-sm rounded mb-4 shadow-sm p-4" style="min-height: 100%; overflow-y: auto;">
                    <div class="card-header">
                        <h5 class="mb-3">Add-Ons</h5>
                    </div>
                    <div class="card-body">
                        <ul class="row flex-column ps-0">
                            <?php foreach ($addOns as $addOn) : ?>
                                <?php if ($menuItem[0]['category'] === $addOn['category']) : ?>
                                    <li class="col-12 d-flex justify-content-between px-3 py-2 mb-2 me-3 border-radius-lg rounded-3" style="background-color: #f5f5f5;">
                                        <p><strong><?= $addOn['name'] ?></strong> ₱<?= $addOn['price'] ?></p>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Ons -->
        <div class="row">

        </div>
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