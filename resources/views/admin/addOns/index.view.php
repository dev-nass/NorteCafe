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
                        <th scope="col">View</th>
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
                                <a class="btn btn-dark" href="add-ons-show-admin?id=<?= $addOn['add_on_id'] ?>">View</a>
                            </td>
                        </tr>

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