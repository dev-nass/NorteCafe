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
                                    <form id="profile-update" class="row g-3 needs-validation" action="profile" method="POST" novalidate>
                                        <div class="row">
                                            <div class="col-3">Account</div>
                                            <div class="col-9">
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
                                                        <?php if (! empty($error['email'])) : ?>
                                                            <div>
                                                                <p class="error-msg text-danger"><?= $error['email'] ?></p>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom04" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="validationCustom04" name="username" value="<?= $_SESSION['__currentUser']['credentials']['username'] ?>" placeholder="JuanDC" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <?php if (! empty($error['username'])) : ?>
                                                            <div>
                                                                <p class="error-msg text-danger"><?= $error['username'] ?></p>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom05" class="form-label">Contact Number</label>
                                                        <input type="text" class="form-control" id="validationCustom05" name="contact_number" value="<?= $_SESSION['__currentUser']['credentials']['contact_number'] ?>" placeholder="09XXXXXXXXX" maxlength="11" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <?php if (! empty($error['contact_number'])) : ?>
                                                            <div>
                                                                <p class="error-msg text-danger"><?= $error['contact_number'] ?></p>
                                                            </div>
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
                                                            <option selected disabled value="<?= $_SESSION['__currentUser']['credentials']['gender'] ?>">Choose...</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                        <div id="validationServer07Feedback" class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <hr> -->

                                        <!-- <div class="row">
                                            <div class="col-3">Shipping Address</div>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="validationCustom01" class="form-label">First name</label>
                                                        <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom02" class="form-label">Last name</label>
                                                        <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="validationCustom03" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="validationCustom03" value="" placeholder="myemail@gmail.com" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Enter a valid email!
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom04" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="validationCustom04" value="Mark" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom05" class="form-label">Contact Number</label>
                                                        <input type="text" class="form-control" id="validationCustom05" value="" placeholder="09XXXXXXXXX" maxlength="11" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationCustom06" class="form-label">Age</label>
                                                        <input type="text" class="form-control" id="validationCustom06" value="" placeholder="" maxlength="11" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="validationServer07" class="form-label">Gender</label>
                                                        <select class="form-select form-control" id="validationServer07" aria-describedby="validationServer07Feedback" required>
                                                            <option selected disabled value="">Choose...</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                        <div id="validationServer07Feedback" class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
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
                <div class="">
                    <a href="profile-edit" class="btn btn-outline-danger">Logout</a>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 mb-3">
                <div class="row gx-md-5">
                    <!-- Profile Card -->
                    <div class="col-12 col-md-6 border white-bg">
                        <div class="d-flex flex-column py-4">
                            <div class="d-flex justify-content-center mb-3">
                                <img src="https://picsum.photos/seed/picsum/220/230" alt="" style="border-radius: 40px;">
                            </div>
                            <div class="d-flex flex-column justify-content-center px-3">
                                <h3 class="text-center mb-4"><?= $_SESSION['__currentUser']['credentials']['first_name'] . $_SESSION['__currentUser']['credentials']['last_name'] ?></h3>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <p class="mb-0 fs-5">0<i class="material-symbols-rounded fs-6 align-baseline">shopping_cart</i></p>
                                        <h6>
                                            Carts
                                        </h6>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <p class="mb-0 fs-5">0<i class="material-symbols-rounded fs-6 align-baseline">receipt_long</i></p>
                                        <h6>
                                            Transactions
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex flex-column align-items-center mt-3">
                                <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">location_on</i><?= $_SESSION['__currentUser']['credentials']['address'] ?? "No address" ?></span>
                                <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">mail</i><?= $_SESSION['__currentUser']['credentials']['email'] ?? "No email" ?></span>
                                <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">call</i><?= $_SESSION['__currentUser']['credentials']['contact_number'] ?? "No contact num" ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Account Details -->
                    <div class="col-12 col-md-6">
                        <div class="row gy-3">
                            <!-- Acount Details -->
                            <div class="col-12 border white-bg py-4">
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
                                    <p><?= $_SESSION['__currentUser']['credentials']['date_of_birth'] ?? "NULL" ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Gender: </span>
                                    <p><?= $_SESSION['__currentUser']['credentials']['gender'] ?? "NULL" ?></p>
                                </div>
                            </div>
                            <!-- Shipping Address -->
                            <div class="col-12 border white-bg py-4">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-4">Shipping Address</h5>
                                    <span class="mb-2"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1">home</i></span>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Address: </span>
                                    <p>Blk J1 Lot 14</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Barangay: </span>
                                    <p>San Francisco 2</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">City: </span>
                                    <p>Dasmarinas City</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Provience: </span>
                                    <p>Cavite</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary">Country: </span>
                                    <p>Philippines</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-3 ms-lg-2">
                <div class="row gy-2">
                    <div class="col-12 border white-bg">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-4"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1 align-top">location_on</i>Shop Location</h5>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span class="text-secondary">Norte Cafe: </span>
                            <a href="#">Find Store</a>
                        </div>
                    </div>
                    <div class="col-12 border white-bg">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-4"><i class="material-symbols-rounded text-lg fs-5 align-middle me-1 align-top">History</i>Previews Transactions</h5>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span class="text-secondary"></span>
                            <a href="#">View All</a>
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