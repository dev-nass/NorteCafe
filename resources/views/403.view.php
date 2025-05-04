<?php require base_path('resources/views/components/head.php') ?>


<section class="white-bg mb-0 py-5">
    <div class="container py-5">
        <div class="row py-5 py-lg-2">
            <div class="col-12 col-lg-6">
                <div class="text-center d-flex flex-column justify-content-center align-items-center h-100">
                    <h1 class="section-header">403 PAGE</h1>
                    <p class="fs-5">Sorry! Looks like this page is inaccessible. Try refreshing the page or go back to home page</p>
                    <a class="choco-btn text-center" 
                        href="<?= isset($_SESSION['__currentUser']['credentials']) ? dynamic_http_response($_SESSION['__currentUser']['credentials']['role']) : "index" ?>">Home</a>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                <div class="d-flex justify-content-center">
                    <img src="../../storage/frontend/user/img/index/403.png" style="height: 450px;" alt="403-img">
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>