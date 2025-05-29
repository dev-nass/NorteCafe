<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 px-1">
        <div class="d-flex justify-content-start align-items-center pe-2">
            <p class="me-2 fw-bold">Change all item availability:</p>
            <form id="change-availability-form" class="d-flex" action="add-ons-change-availability-admin" method="POST">
                <?php foreach ($addOns as $addOn) : ?>
                    <input
                        class="d-none"
                        name="add-on-id[]"
                        value="<?= $addOn["add_on_id"] ?>"
                        type="text">
                <?php endforeach; ?>
                <input id="available" class="btn btn-outline-success me-2" name="availability" value="Available" type="submit">
                <input id="not-available" class="btn btn-outline-danger" name="availability" value="Not Available" type="submit">
            </form>
        </div>
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
                        <?php if ($addOn['status'] === 1) : ?>
                            <tr>
                                <th scope="row"><?= $addOn['add_on_id'] ?></th>
                                <td><?= $addOn['name'] ?></td>
                                <td><?= strtoupper($addOn['category']) ?></td>
                                <td>₱<?= number_format($addOn['price'], '2', '.', '') ?></td>
                                <td><?= $addOn['available'] == 1 ? "Available" : "Not Available" ?></td>
                                <td>
                                    <a class="btn btn-dark" href="add-ons-show-admin?id=<?= $addOn['add_on_id'] ?>">Edit</a>
                                </td>
                            </tr>
                        <?php endif; ?>

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

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const form = document.querySelector('#change-availability-form');
    const availableBtn = document.querySelector('#available');
    const notAvailableBtn = document.querySelector('#not-available');
    let availability = "";

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        Swal.fire({
            icon: "question",
            title: "Are you sure",
            text: `You really want to change all item availability to ${availability}`,
            allowOutsideClick: false,
            confirmButtonText: "Yes",
            showCancelButton: true
        }).then((sureOrNot) => {
            // console.log(sureOrNot);
            if (sureOrNot.isConfirmed) {
                // added because the form action is being intercepted by JS
                // so the original 2 <input name="availablity" is not being read on dd($_POST)
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'availability';
                hiddenInput.value = `${availability}`;
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    });

    notAvailableBtn.addEventListener('click', () => {
        availability = notAvailableBtn.value;
    });

    availableBtn.addEventListener('click', () => {
        availability = availableBtn.value;
    });
</script>

<?php if (isset($_SESSION['__flash']['addOns_updated'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Add on updated successfully!",
            allowOutsideClick: false,
        });
    </script>
<?php elseif (isset($_SESSION['__flash']['addOns_reactivated'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Add on reactivateds successfully!",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>


<?php require base_path('resources/views/components/admin_foot.php') ?>