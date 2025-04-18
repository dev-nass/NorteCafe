<?php require base_path('resources/views/components/head.php') ?>
<?php require base_path('resources/views/components/navbar.php') ?>

<section class="section-container">
    <div class="container py-5">
        <div class="d-flex justify-content-between">
            <h5 class="hero-header fs-2 ms-lg-3">Profiling Page</h5>
            <div class="d-flex justify-content-end mb-4">
                <div class="me-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#manageProfileModal">
                        Edit Profile<i class="material-symbols-rounded text-lg fs-5 align-middle me-1 ms-1">manage_accounts</i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="manageProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Manage Profile</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-5">
                                    <form id="profile-update" class="row g-3 needs-validation" action="profile" method="POST" enctype="multipart/form-data" novalidate>
                                        <div class="row">
                                            <div class="col-3 mb-3">Profile Picture</div>
                                            <div class="col-9 mb-3" style="width: 500px; height: 500px">
                                                <div class="bg-white p-4 rounded h-100">
                                                    <label id="drop-area" class="form-control w-100 h-100" for="input-upload-item">
                                                        <input class="d-none" name="user-profile-img" type="file" accept="image/*" id="input-upload-item">
                                                        <div id="image-view-container" class="rounded d-flex flex-column align-items-center justify-content-center h-100" style="border: 1px dashed black; object-fit: cover; background-position: center; background-image: url(<?= $_SESSION['__currentUser']['credentials']['profile_dir'] ?>);">
                                                            <?php if ($_SESSION['__currentUser']['credentials']['profile_dir'] === NULL) : ?>
                                                                <img class="w-25" src="../../storage/frontend/admin/transaction/upload-logo.png" alt="upload-logo">
                                                                <p class="text-center text-md mb-0">Click here to upload image</p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="col-3 mb-3">Account</div>
                                            <div class="col-9 mb-3">
                                                <div class="row">
                                                    <!-- Added for the sake of updating -->
                                                    <input
                                                        class="d-none"
                                                        type="text"
                                                        name="user_id"
                                                        value="<?= $_SESSION['__currentUser']['credentials']['user_id'] ?>">
                                                    <div class="col-6">
                                                        <label for="validationCustom01" class="form-label">First name</label>
                                                        <input type="text" class="form-control" id="validationCustom01" name="first_name" value="<?= $_SESSION['__currentUser']['credentials']['first_name'] ?>" placeholder="Juan" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom02" class="form-label">Last name</label>
                                                        <input type="text" class="form-control" id="validationCustom02" name="last_name" value="<?= $_SESSION['__currentUser']['credentials']['last_name'] ?>" placeholder="Dela Cruz" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="validationCustom03" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="validationCustom03" name="email" value="<?= $_SESSION['__currentUser']['credentials']['email'] ?>" placeholder="juanDelaCruz@gmail.com" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Enter a valid email!
                                                        </div>
                                                        <?php if (isset($errors['email'])): ?>
                                                            <ul class="m-0 p-0" style="list-style: none;">
                                                                <?php foreach ($errors['email'] as $error): ?>
                                                                    <li class="text-danger"><?= htmlspecialchars($error) ?></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom04" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="validationCustom04" name="username" value="<?= $_SESSION['__currentUser']['credentials']['username'] ?>" placeholder="JuanDC" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <?php if (isset($errors['username'])): ?>
                                                            <ul class="m-0 p-0" style="list-style: none;">
                                                                <?php foreach ($errors['username'] as $error): ?>
                                                                    <li class="text-danger"><?= htmlspecialchars($error) ?></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom05" class="form-label">Contact Number</label>
                                                        <input type="text" class="form-control" id="validationCustom05" name="contact_number" value="<?= $_SESSION['__currentUser']['credentials']['contact_number'] ?>" placeholder="09XXXXXXXXX" maxlength="11" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <?php if (isset($errors['contact_number'])): ?>
                                                            <ul class="m-0 p-0" style="list-style: none;">
                                                                <?php foreach ($errors['contact_number'] as $error): ?>
                                                                    <li class="text-danger"><?= htmlspecialchars($error) ?></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom06" class="form-label">Age</label>
                                                        <input type="text" class="form-control" id="validationCustom06" name="age" value="<?= $_SESSION['__currentUser']['credentials']['age'] ?>" placeholder="69" maxlength="11" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationServer07" class="form-label">Gender</label>
                                                        <select class="form-select form-control" id="validationServer07" name="gender" aria-describedby="validationServer07Feedback" required>
                                                            <option selected disabled>Choose...</option>
                                                            <option <?= $_SESSION['__currentUser']['credentials']['gender'] === "Male" ? "selected" : "" ?>>Male</option>
                                                            <option <?= $_SESSION['__currentUser']['credentials']['gender'] === "Female" ? "selected" : "" ?>>Female</option>
                                                        </select>
                                                        <div id="validationServer07Feedback" class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom08" class="form-label">Date of Birth</label>
                                                        <input type="date" class="form-control" id="validationCustom08" name="date_of_birth" value="<?= $_SESSION['__currentUser']['credentials']['date_of_birth'] ?>" aria-describedby="validationServer08Feedback" required>
                                                        <div id="validationServer08Feedback" class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="col-3">Shipping Address</div>
                                            <div class="col-9 mb-3">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label for="validationCustom09" class="form-label">House number</label>
                                                        <input type="text" class="form-control" id="validationCustom09" name="house_number" value="<?= $_SESSION['__currentUser']['credentials']['house_number'] ?>" placeholder="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="validationCustom10" class="form-label">Street</label>
                                                        <input type="text" class="form-control" id="validationCustom10" name="street" value="<?= $_SESSION['__currentUser']['credentials']['street'] ?>" placeholder="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom11" class="form-label">Barangay</label>
                                                        <input type="text" class="form-control" id="validationCustom11" name="barangay" value="<?= $_SESSION['__currentUser']['credentials']['barangay'] ?>" placeholder="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom12" class="form-label">City</label>
                                                        <input type="text" class="form-control" id="validationCustom12" name="city" value="Dasmariñas" disabled required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationServer13" class="form-label">Provience</label>
                                                        <input type="text" class="form-control" id="validationCustom13" name="provience" value="Cavite" disabled required>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="validationServer14" class="form-label">Region</label>
                                                        <input type="text" class="form-control" id="validationCustom14" name="region" value="4A" disabled required>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="validationServer15" class="form-label">Postal Code</label>
                                                        <input type="text" class="form-control" id="validationCustom15" name="postal_code" value="4114" disabled required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button form="profile-update" class="btn btn-primary" type="submit">Submit form</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="me-3">
                    <a class="btn btn-outline-success" href="change-pass">Change Password</a>
                </div>
                <div class="">
                    <form action="logout" method="POST">
                        <button class="btn btn-outline-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 mb-3">
                <div class="row gx-md-5">
                    <!-- Profile Card -->
                    <div class="col-12 col-md-6 border white-bg shadow-sm">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <div class="d-flex justify-content-center mb-3">
                                <img src="<?= $_SESSION['__currentUser']['credentials']['profile_dir'] != NULL ? $_SESSION['__currentUser']['credentials']['profile_dir'] : "https://picsum.photos/seed/picsum/230/250" ?>" alt="profile" style="border-radius: 40px; height: 250px; width: 230px;">
                            </div>
                            <?php if ($_SESSION['__currentUser']['credentials']['verified'] == 1) : ?>
                                <div class="text-center">
                                    <p><i class="material-symbols-rounded text-lg fs-5 align-middle me-1 align-top text-primary">verified</i>Verified Account</p>
                                </div>
                            <?php endif; ?>
                            <div class="d-flex flex-column justify-content-center px-3">
                                <h3 class="text-center mb-4"><?= $_SESSION['__currentUser']['credentials']['first_name'] . " " . $_SESSION['__currentUser']['credentials']['last_name'] ?></h3>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <p class="mb-0 fs-5"><?= $_SESSION['__currentUserCarts']['cart_count']['COUNT(user_id)'] ?><i class="material-symbols-rounded fs-6 align-baseline">shopping_cart</i></p>
                                        <h6>
                                            Carts
                                        </h6>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <p class="mb-0 fs-5"><?= $_SESSION['__currentUserTransactions']['transaction_count']['COUNT(user_id)'] ?><i class="material-symbols-rounded fs-6 align-baseline">receipt_long</i></p>
                                        <h6>
                                            Transactions
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex flex-column align-items-center mt-3">
                                <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">location_on</i><?= $_SESSION['__currentUser']['credentials']['house_number'] . ", " . $_SESSION['__currentUser']['credentials']['street'] ?? "No address" ?></span>
                                <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">mail</i><?= $_SESSION['__currentUser']['credentials']['email'] ?? "No email" ?></span>
                                <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">call</i><?= $_SESSION['__currentUser']['credentials']['contact_number'] ?? "No contact num" ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Account Details -->
                    <div class="col-12 col-md-6">
                        <div class="row gy-3">
                            <!-- Acount Details -->
                            <div class="col-12 border white-bg py-4 shadow-sm">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-4">Account Details</h5>
                                    <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">person</i></span>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">First Name: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['first_name'] ?? "NULL" ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Last Name: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['last_name'] ?? "NULL" ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Username: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['username'] ?? "NULL" ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Date of Birth: </span>
                                    <p><?= isset($_SESSION['__currentUser']['credentials']['date_of_birth']) && strtotime($_SESSION['__currentUser']['credentials']['date_of_birth'])
                                            ? date("F d, Y", strtotime($_SESSION['__currentUser']['credentials']['date_of_birth']))
                                            : "NULL" ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Gender: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['gender'] ?? "NULL" ?></p>
                                </div>
                            </div>
                            <!-- Shipping Address -->
                            <div class="col-12 border white-bg py-4 shadow-sm">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-4">Shipping Address</h5>
                                    <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">home</i></span>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">House Number: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['house_number'] ?? "NULL" ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Street: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['street'] ?? "NULL" ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Barangay: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['barangay'] ?? "NULL" ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">City: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['city'] ?? "NULL" ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Provience: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['provience'] ?? "NULL" ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Region: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['region'] ?? "NULL" ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Postal Code: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['postal_code'] ?? "NULL" ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-3 ms-lg-2">
                <div class="row gy-3">
                    <!-- Current Transaction -->
                    <div class="col-12 border white-bg shadow-sm">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-4"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1 align-top">stacks</i>Current Transactions</h5>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-secondary">Transaction ID: </span>
                                    <span> <?= $currentTransaction['transaction_id'] ?? "" ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-secondary">Status: </span>
                                    <span> <?= $currentTransaction['status'] ?? "" ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-secondary">Amount Due: </span>
                                    <span>₱<?= $currentTransaction['amount_due'] ?? "" ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-secondary">Placed At: </span>
                                    <span><?= date("F d, Y", strtotime($currentTransaction['created_at'])); ?></span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="d-flex align-items-center">
                                        <span class="text-secondary"></span>
                                        <a href="current-transactions">View All</a>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a title="View Order" class="btn btn-outline-dark px-3 mb-0" href="transaction-show?id=<?= $currentTransaction['transaction_id'] ?>"><i class="material-symbols-rounded" style="font-size: .9rem;">edit</i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Previous Transaction -->
                    <div class="col-12 border white-bg shadow-sm">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-4"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1 align-top">history</i>Previous Transactions</h5>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-secondary">Transaction ID: </span>
                                    <span> <?= $previousTransaction['transaction_id'] ?? "" ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-secondary">Status: </span>
                                    <span> <?= $previousTransaction['status'] ?? "" ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-secondary">Amount Due: </span>
                                    <span>₱<?= $previousTransaction['amount_due'] ?? "" ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-secondary">Placed At: </span>
                                    <span><?= date("F d, Y", strtotime($previousTransaction['created_at'])); ?></span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="d-flex align-items-center">
                                        <span class="text-secondary"></span>
                                        <a href="previous-transactions">View All</a>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a title="View Order" class="btn btn-outline-dark px-3 mb-0" href="transaction-show?id=<?= $previousTransaction['transaction_id'] ?>"><i class="material-symbols-rounded" style="font-size: .9rem;">edit</i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

<?php require base_path('resources/views/components/foot.php') ?>