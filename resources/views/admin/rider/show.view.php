<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid px-2 px-md-4">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-outline-dark me-2" data-bs-toggle="modal" data-bs-target="#manageProfileModal">
                Edit Profile<i class="material-symbols-rounded text-lg fs-5 align-middle me-1 ms-1">manage_accounts</i>
            </button>
            <form action="rider-delete-admin" method="POST">
                <input
                    class="d-none"
                    name="user_id"
                    value="<?= $user['user_id'] ?>"
                    type="text"
                    readonly>
                <button class="btn btn-danger">Archive</button>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="manageProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Manage Profile</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-5">
                            <form id="profile-update" class="row g-3 needs-validation" action="rider-update-admin" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="row">
                                    <div class="col-3 mb-3">Profile Picture</div>
                                    <div class="col-9 mb-3" style="width: 500px; height: 500px">
                                        <div class="bg-white p-4 rounded h-100">
                                            <label id="drop-area" class="form-control w-100 h-100" for="input-upload-item">
                                                <input class="d-none" name="user-profile-img" type="file" accept="image/*" id="input-upload-item">
                                                <div id="image-view-container" class="rounded d-flex flex-column align-items-center justify-content-center h-100" style="border: 1px dashed black; object-fit: cover; background-position: center; background-image: url(<?= $_SESSION['__currentUser']['credentials']['profile_dir'] ?>);">
                                                    <img class="<?= $user['profile_dir'] ? 'w-100 h-100' : 'w-25' ?>" src="<?= $user['profile_dir'] ?? '../../storage/frontend/admin/transaction/upload-logo.png" alt="upload-logo' ?> ">
                                                    <p class="text-center text-md mb-0"><?= $user['profile_dir'] ? '' : 'Click here to upload image' ?></p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <hr class="border border-dark">

                                    <div class="col-3 mb-3">Account</div>
                                    <div class="col-9 mb-3">
                                        <div class="row">
                                            <!-- Added for the sake of updating -->
                                            <input
                                                class="d-none"
                                                type="text"
                                                name="user_id"
                                                value="<?= $user['user_id'] ?>">
                                            <div class="col-6">
                                                <label for="validationCustom01" class="form-label">First name</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom01" name="first_name" value="<?= $user['first_name'] ?>" placeholder="Juan" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom02" class="form-label">Last name</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom02" name="last_name" value="<?= $user['last_name'] ?>" placeholder="Dela Cruz" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="validationCustom03" class="form-label">Email</label>
                                                <input type="email" class="form-control border border-dark px-2" id="validationCustom03" name="email" value="<?= $user['email'] ?>" placeholder="juanDelaCruz@gmail.com" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Enter a valid email!
                                                </div>
                                                <?php error('email') ?>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom04" class="form-label">Username</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom04" name="username" value="<?= old('username') ?? $user['username'] ?>" placeholder="JuanDC" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <?php error('username') ?>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom05" class="form-label">Contact Number</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom05" name="contact_number" value="<?= old('contact_number') ?? $user['contact_number'] ?>" placeholder="09XXXXXXXXX" maxlength="11" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <?php error('contact_number') ?>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom06" class="form-label">Age</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom06" name="age" value="<?= $user['age'] ?>" placeholder="69" maxlength="11" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationServer07" class="form-label">Gender</label>
                                                <select class="form-select form-control border border-dark px-2" id="validationServer07" name="gender" aria-describedby="validationServer07Feedback" required>
                                                    <option selected disabled>Choose...</option>
                                                    <option <?= $user['gender'] === "Male" ? "selected" : "" ?> >Male</option>
                                                    <option <?= $user['gender'] === "Female" ? "selected" : "" ?> >Female</option>
                                                </select>
                                                <div id="validationServer07Feedback" class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom08" class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control border border-dark px-2" id="validationCustom08" name="date_of_birth" value="<?= $user['date_of_birth'] ?>" aria-describedby="validationServer08Feedback" required>
                                                <div id="validationServer08Feedback" class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-12">
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="border border-dark">

                                    <div class="col-3">Shipping Address</div>
                                    <div class="col-9 mb-3">
                                        <div class="row">
                                            <div class="col-8">
                                                <label for="validationCustom09" class="form-label">House number</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom09" name="house_number" value="<?= $user['house_number'] ?>" placeholder="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label for="validationCustom10" class="form-label">Street</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom10" name="street" value="<?= $user['street'] ?>" placeholder="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom11" class="form-label">Barangay</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom11" name="barangay" value="<?= $user['barangay'] ?>" placeholder="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationCustom12" class="form-label">City</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom12" name="city" value="<?= $user['city'] ?>" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="validationServer13" class="form-label">Provience</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom13" name="provience" value="<?= $user['provience'] ?>" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="validationServer14" class="form-label">Region</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom14" name="region" value="<?= $user['region'] ?>" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="validationServer15" class="form-label">Postal Code</label>
                                                <input type="text" class="form-control border border-dark px-2" id="validationCustom15" name="postal_code" value="<?= $user['postal_code'] ?>" required>
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



        <div class="page-header min-height-300 border-radius-xl" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
        </div>
        <div class="card card-body mx-2 mx-md-2 mt-n6">
            <div class="row gx-4 mb-2 px-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="<?= $user['profile_dir'] ?? '../../storage/frontend/user/img/index/default-pfp.jpg' ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <?= $user['first_name'] . ' ' . $user['last_name'] ?>
                        </h5>
                        <p class="mb-1 font-weight-normal text-sm text-dark">
                            Role: <span class="text-success"><?= $user['role'] ?></span>
                        </p>
                        <p class="mb-0 font-weight-normal text-xs text-dark">
                            Created at: <span><?= date("F d, Y", strtotime($user['created_at'])); ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row pe-0">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <div class="row">
                            <div class="col-6">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Profile Information</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> <?= $user['first_name'] . ' ' . $user['last_name'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Username:</strong> <?= $user['username'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Gender:</strong> <?= $user['gender'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Date of Birth:</strong> <?= $user['date_of_birth'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">Contact Information</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Email:</strong> <?= $user['email'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Contact Number:</strong> <?= $user['contact_number'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">Shipping Address</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">House Number:</strong> <?= $user['house_number'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Street:</strong> <?= $user['street'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Barangay:</strong> <?= $user['barangay'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">City:</strong> <?= $user['city'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Provience:</strong> <?= $user['provience'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Region:</strong> <?= $user['region'] ?></li>
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Postal Code:</strong> <?= $user['postal_code'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card card-plain h-100 rounded-3" style="background-color: #f5f5f5;">
                            <div class="card-header pb-0 p-3" style="background-color: #f5f5f5;">
                                <h6 class="mb-0">Handled Transactions</h6>
                            </div>
                            <div class="card-body pe-0">
                                <ul class="list-group">
                                    <?php foreach ($handledTransactions as $trans) : ?>
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background-color: #f5f5f5;">
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center" href="transaction-show-admin?transaction_id=<?= $trans['transaction_id'] ?>"><i class="material-symbols-rounded text-lg">info_i</i></a>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Transaction ID: <?= $trans['transaction_id'] ?></h6>
                                                    <span class="text-xs"><?= date("F d, Y", strtotime($trans['created_at'])); ?></span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                                ₱<?= $trans['amount_due'] ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- <script>
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
</script> -->

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_SESSION['__flash']['profile_updated'])) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "Profile updated successfully!",
            allowOutsideClick: false,
        });
    </script>
<?php elseif (isset($_SESSION['__flash']['data']['errors'])) : ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "An error occured, double check the credentials!",
            allowOutsideClick: false,
        });
    </script>
<?php endif; ?>

<?php require base_path('resources/views/components/admin_foot.php') ?>