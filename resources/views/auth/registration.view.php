<?php require base_path('resources/views/components/head.php') ?>


<main class="container-fluid-gradient container-fuild">
    <div class="container">
        <div class="row min-vh-100 d-flex justify-content-center align-items-center g-0">
            <div class="col-12 py-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row g-0 h-100">
                            <!-- info section -->
                            <div class="col-md-5 text-center info-section-bg text-white d-flex flex-column position-relative">
                                <!-- pa link nalang sa homepage -->
                                <div class="z-2 px-3 h-100 d-flex flex-column align-items-center justify-content-center">
                                    <img style="height: 150px; width: 150px;" src="../../storage/frontend/user/img/index/rabbit-reg.png" alt="">
                                    <a href="index" class="no-underline">
                                        <h2 class="link-light fw-bolder">NORTE CAFE' BY CB</h2>
                                    </a>
                                    <p>
                                        Enjoy the perfect blend of Tea and Milk tea at Norte Café! Crafted with quality ingredients and a passion for great flavors, every sip is a treat. Log in to place your order or sign up to explore our menu!
                                    </p>
                                </div>

                                <img class="z-1 w-100 h-100 opacity-25 position-absolute" src="../../storage/frontend/user/img/index/registration-side.jpg" alt="">
                            </div>

                            <!-- form section -->
                            <div class="col-md-7 form-section-bg d-flex align-items-center justify-content-center">
                                <div class="px-5 pt-5 w-100">
                                    <h1 class="fs-3"><i class="fa-solid fa-mug-hot me-2" style="vertical-align: 2px;"></i>Register Account</h1>
                                    <!-- may validation -->
                                    <form action="registration" method="POST" class="registration-form" novalidate>
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <div class="form-floating">
                                                <input class="form-control" name="username" type="text" id="username" placeholder="Username" value="<?= old('username') ?>" required autofocus>
                                                <label for="username">Enter Username...</label>
                                                <div class="invalid-feedback">Missing Username...</div>
                                            </div>
                                            <?php if (isset($errors['username'])): ?>
                                                <ul class="m-0 p-0" style="list-style: none;">
                                                    <?php foreach ($errors['username'] as $error): ?>
                                                        <li class="text-danger"><?= htmlspecialchars($error) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="email">E-Mail</label>
                                            <div class="form-floating">
                                                <input class="form-control" name="email" type="email" id="email" placeholder="E-Mail" value="<?= old('email') ?>" required>
                                                <label for="email">Enter E-Mail...</label>
                                                <div class="invalid-feedback">Invalid E-Mail...</div>
                                            </div>
                                            <?php if (isset($errors['email'])): ?>
                                                <ul class="m-0 p-0" style="list-style: none;">
                                                    <?php foreach ($errors['email'] as $error): ?>
                                                        <li class="text-danger"><?= htmlspecialchars($error) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="form-floating">
                                                <input class="form-control" name="password" type="password" id="password" placeholder="Password" required>
                                                <label for="password">Enter Password...</label>
                                                <div class="invalid-feedback">Missing Password...</div>
                                            </div>
                                            <?php if (isset($errors['password'])): ?>
                                                <ul class="m-0 p-0" style="list-style: none;">
                                                    <?php foreach ($errors['password'] as $error): ?>
                                                        <li class="text-danger"><?= htmlspecialchars($error) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="confirm-password">Re-Enter Password</label>
                                            <div class="form-floating">
                                                <input class="form-control" name="password_confirmation" type="password" id="confirm-password" placeholder="Re-Enter Password" required>
                                                <label for="confirm-password">Re-Enter Password...</label>
                                                <div class="invalid-feedback">Missing Password...</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                <label class="form-check-label" for="invalidCheck">
                                                    Agree to terms and conditions
                                                </label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="register-btn w-100 mt-3" type="submit">Register</button>
                                        </div>
                                        <div class="mt-3 mb-4 mt-md-4 mb-md-5 text-center">
                                            <p>Already have an account? <a class="text-decoration-underline" href="login">Log In!</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

<!-- =================== -->
<!-- End Register Content -->
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

<script src="../../resources/js/registration.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>