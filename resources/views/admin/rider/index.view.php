<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 px-1">
        <div class="responsive-table">
            <table id="rider-table" class="table table-striped custom-data-table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Rider Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Age</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Address</th>
                        <th scope="col">Gender</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($riders as $rider): ?>
                        <tr>
                            <th scope="row"><?= $rider['user_id'] ?></th>
                            <td><?= $rider['rider_name'] ?></td>
                            <td><?= $rider['username'] ?></td>
                            <td><?= $rider['email'] ?></td>
                            <td><?= $rider['contact_number'] ?></td>
                            <td><?= $rider['age'] ?></td>
                            <td><?= date("F d, Y", strtotime($rider['date_of_birth']));  ?></td>
                            <td><?= $rider['address'] ?></td>
                            <td><?= $rider['gender'] ?></td>
                            <td><a class="btn btn-dark" href="rider-show-admin?rider_id=<?= $rider['user_id'] ?>">View</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</main>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_SESSION['__flash']['account_deleted'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Rider archived successfully!",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>

<?php require base_path('resources/views/components/admin_foot.php') ?>