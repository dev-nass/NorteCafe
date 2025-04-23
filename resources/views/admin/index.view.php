<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-md-12 mt-4">
                <!-- <div style="width: 500px;"><canvas id="dimensions"></canvas></div><br/> -->
                <div style="width: 800px;"><canvas id="acquisitions"></canvas></div>
            </div>
        </div>
    </div>

</main>

<?php require base_path('resources/views/components/admin_foot.php') ?>