<?php require base_path('resources/views/components/head.php') ?>

<main class="container-fluid-gradient container-fluid">
    <!-- form section -->
    <div class="container">
        <div class="row min-vh-100 d-flex justify-content-center align-items-center g-0">
            <div class="col-12 py-3">
                <div class="card overflow-hidden ">
                    <div class="card-body p-4 form-section-bg">
                        <h1 class="fs-3 text-center mb-5">Employee Registration</h1>
                        <form id="employee-registration" class="row g-3 needs-validation" action="staff-store" method="POST" enctype="multipart/form-data" novalidate>
                            <div class="row">
                                <div class="col-4 h-50">
                                    <p class="mb-1">Profile Picture</p>
                                    <div class="bg-white p-4 rounded h-100">
                                        <label id="drop-area" class="form-control w-100 h-100" for="input-upload-item">
                                            <input class="d-none" name="user-profile-img" type="file" accept="image/*" id="input-upload-item">
                                            <div id="image-view-container" class="rounded d-flex flex-column align-items-center justify-content-center h-100" style="border: 1px dashed black; object-fit: cover; background-position: center; background-image: url();">
                                                <img class="w-25" src="/uploads/frontend/admin/transaction/upload-logo.png">
                                                <p class="text-center text-md mb-0">Click here to upload image</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <div class="row">
                                        <!-- Personal Information -->
                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <!-- Added for the sake of inserting -->
                                                <input
                                                    class="d-none"
                                                    type="text"
                                                    name="role"
                                                    value="Employee"
                                                    readonly>
                                                <div class="col-6">
                                                    <label for="validationCustom01" class="form-label">First name</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom01" name="first_name" value="<?= old('first_name') ?? '' ?>" placeholder="Juan" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom02" class="form-label">Last name</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom02" name="last_name" value="<?= old('last_name') ?? '' ?>" placeholder="Dela Cruz" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="validationCustom03" class="form-label">Email</label>
                                                    <input type="email" class="form-control border border-dark px-2" id="validationCustom03" name="email" value="<?= old('email') ?? '' ?>" placeholder="juanDelaCruz@gmail.com" required>
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
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom04" name="username" value="<?= old('username') ?? '' ?>" placeholder="JuanDC" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <?php error('username') ?>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom05" class="form-label">Contact Number</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom05" name="contact_number" value="<?= old('contact_number') ?? '' ?>" placeholder="09XXXXXXXXX" maxlength="11" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <?php error('contact_number') ?>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom06" class="form-label">Age</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom06" name="age" value="<?= old('age') ?? '' ?>" placeholder="63" maxlength="11" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationServer07" class="form-label">Gender</label>
                                                    <select class="form-select form-control border border-dark px-2" id="validationServer07" name="gender" aria-describedby="validationServer07Feedback" required>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                    <div id="validationServer07Feedback" class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom08" class="form-label">Date of Birth</label>
                                                    <input type="date" class="form-control border border-dark px-2" id="validationCustom08" name="date_of_birth" aria-describedby="validationServer08Feedback" required>
                                                    <div id="validationServer08Feedback" class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <!-- Address Information -->
                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="validationCustom09" class="form-label">House number</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom09" name="house_number" value="<?= old('house_number') ?>" placeholder="" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="validationCustom10" class="form-label">Street</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom10" name="street" value="<?= old('street') ?>" placeholder="" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom11" class="form-label">Barangay</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom11" name="barangay" value="<?= old('barangay') ?>" placeholder="" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationCustom12" class="form-label">City</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom12" name="city" value="<?= old('city') ?>" required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationServer13" class="form-label">province</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom13" name="province" value="<?= old('province') ?>" required>
                                                </div>
                                                <div class="col-4">
                                                    <label for="validationServer14" class="form-label">Region</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom14" name="region" value="<?= old('region') ?>" required>
                                                </div>
                                                <div class="col-4">
                                                    <label for="validationServer15" class="form-label">Postal Code</label>
                                                    <input type="text" class="form-control border border-dark px-2" id="validationCustom15" name="postal_code" value="<?= old('postal_code') ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="validationServer16" class="form-label">Password</label>
                                                    <input type="password" class="form-control border border-dark px-2" id="validationCustom16" name="password" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <?php error('password') ?>
                                                </div>
                                                <div class="col-6">
                                                    <label for="validationServer17" class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control border border-dark px-2" id="validationCustom17" name="password_confirmation" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex align-items-end justify-content-end">
                                <button class="btn btn-warning">Register</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- =================== -->
<!-- End Change Password Content -->
<!-- =================== -->

<!-- js for validating -->
<script>
    const form = document.querySelector("form");

    form.addEventListener("submit", (e) => {
        if (!form.checkValidity()) {
            e.preventDefault();
        }
        form.classList.add("was-validated");
    });
</script>

<script src="../../uploads/js/profiling/drag&DropProfileImg.js" defer></script>