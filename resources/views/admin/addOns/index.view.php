<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 px-1">
        <div class="responsive-table">
            <table id="addOn-table" class="table table-striped custom-data-table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Availability</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($addOns as $addOn): ?>
                        <tr>
                            <th scope="row"><?= $addOn['add_on_id'] ?></th>
                            <td><?= $addOn['name'] ?></td>
                            <td><?= strtoupper($addOn['category']) ?></td>
                            <td>₱<?= number_format($addOn['price'], '2', '.', '') ?></td>
                            <td><?= $addOn['available'] == 1 ? "Available" : "Not Available" ?></td>
                            <td>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $addOn['add_on_id'] ?>">
                                    Edit
                                </button>
                            </td>
                        </tr>

                        <!-- Add On Modal -->
                        <div class="modal fade" id="staticBackdrop<?= $addOn['add_on_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-labelledby="staticBackdropLabel<?= $addOn['add_on_id'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel<?= $addOn['add_on_id'] ?>"><?= $addOn['name'] ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="">
                                        <button form="addOns-edit" type="submit" class="btn btn-primary">Edit</button>
                                        
                                    </form>
                                    <form id="addOns-edit" class="row g-3 needs-validation" action="#" method="POST" novalidate>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-2">
                                                    <label for="validationCustom01" class="form-label">ID</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom01" value="<?= $addOn['add_on_id'] ?>" disabled required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-2">
                                                    <label for="validationCustom02" class="form-label">Name</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom02" value="<?= $addOn['name'] ?>" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Enter a valid name!
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-2">
                                                    <label for="validationCustom03" class="form-label">Category</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom03" value="<?= strtoupper($addOn['category']) ?>" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Enter a valid name!
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-2">
                                                    <label for="validationCustom04" class="form-label">Price</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom04" value="<?= number_format($addOn['price'], '2', '.', '') ?>" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Enter a valid name!
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="validationCustom05" class="form-label">State</label>
                                                    <select class="form-select border border-dark px-2" id="validationCustom05" required>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option>Available</option>
                                                        <option>Not Available</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a valid state.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</main>


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
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