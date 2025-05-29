<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 px-1">
        <div class="responsive-table">
            <table id="addOns-table" class="table table-striped custom-data-table" style="width:100%">
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
                                <a class="btn btn-dark" href="add-ons-show-admin?id=<?= $addOn['add_on_id'] ?>">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</main>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if (isset($_SESSION['__flash']['addOns_deleted'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Add on archived successfully!",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>

<?php require base_path('resources/views/components/admin_foot.php') ?>