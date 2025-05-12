<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 px-1">
        <div class="responsive-table">
            <table id="menuItem-table" class="table table-striped custom-data-table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Menu Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Availability</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menuItems as $item): ?>
                        <tr>
                            <th scope="row"><?= $item['menu_item_id'] ?></th>
                            <td><img src="<?= $item['image_dir'] ?>" alt="menu-img" style="height: 80px;"></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['description'] ?></td>
                            <td><?= $item['category'] ?></td>
                            <td><?= $item['available'] ? "Available" : "Not Available" ?></td>
                            <td><a class="btn btn-dark" href="menu-show-admin?menu_item_id=<?= $item['menu_item_id'] ?>">View</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</main>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if (isset($_SESSION['__flash']['menu_item_deleted'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Menu item archived successfully!",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>

<?php require base_path('resources/views/components/admin_foot.php') ?>