<?php require base_path('resources/views/components/head.php') ?>
<?php require base_path('resources/views/components/navbar.php') ?>

<section class="secion-container py-5">
    <div class="container py-5">
        <div class="row">
            <?php foreach ($cartMenuItems as $item) : ?>
                <div class="col-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-12 col-md-4">
                                <img src="https://picsum.photos/id/<?= $item['menu_item_id'] ?>/200/200" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $item['name'] ?></h5>
                                    <p class="card-text"><?= $item['description'] ?></p>

                                    <!-- Sizes -->
                                    <div class="d-flex justify-content-between">
                                        <div>Size: <span class="square ms-1"><?= $item['size'] ?></span>
                                        </div>
                                        <div>
                                            <p><span class="text-primary">₱<?= $item['price'] ?></span></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require base_path('resources/views/components/foot.php') ?>