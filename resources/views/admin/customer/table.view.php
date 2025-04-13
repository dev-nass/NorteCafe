<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 px-1">
        <div class="responsive-table">
            <table id="customer-table" class="table table-striped custom-data-table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Customer Name</th>
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
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <th scope="row"><?= $customer['user_id'] ?></th>
                            <td><?= $customer['customer_name'] ?></td>
                            <td><?= $customer['username'] ?></td>
                            <td><?= $customer['email'] ?></td>
                            <td><?= $customer['contact_number'] ?></td>
                            <td><?= $customer['age'] ?></td>
                            <td><?= date("F d, Y", strtotime($customer['date_of_birth']));  ?></td>
                            <td><?= $customer['address'] ?></td>
                            <td><?= $customer['gender'] ?></td>
                            <td><a class="btn btn-dark" href="customer-show-admin?customer_id=<?= $customer['user_id'] ?>">View</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</main>

<?php require base_path('resources/views/components/admin_foot.php') ?>