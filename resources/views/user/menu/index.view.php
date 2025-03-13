<?php require base_path('resources/views/components/head.php') ?>
<?php require base_path('resources/views/components/navbar.php') ?>

<section class="section-container">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <!-- Filtering -->
            </div>
        </div>
        <div class="row">
            <?php foreach ($menu_items as $item) : ?>
                <div class="col-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-12 col-md-4">
                                <img src="https://picsum.photos/id/<?= $item['id'] ?>/200/200" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $item['name'] ?></h5>
                                    <p class="card-text"><?= $item['description'] ?></p>

                                    <!-- Sizes -->
                                    <div class="d-flex">
                                        <div>
                                            Sizes:
                                            <?php foreach ($menu_item_sizes as $size) : ?>
                                                <?php if ($size['menu_item_id'] === $item['id']) : ?>
                                                    <span class="square ms-1"><?= $size['size'] ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <!-- Availability & Modal -->
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="card-text mt-2 <?= $item['available'] ? 'text-success' : 'text-danger' ?>"><?= $item['available'] ? 'Available' : 'Not Available' ?></p>
                                        </div>
                                        <div>
                                            <button class="choco-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling-id<?= $item['id'] ?>" aria-controls="offcanvasScrolling"><i class="fa-solid fa-cart-plus"></i></button>

                                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling-id<?= $item['id'] ?>" aria-labelledby="offcanvasScrollingLabel">
                                                <div class="offcanvas-header">
                                                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu Item Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body">
                                                    <div class="d-flex justify-content-center">
                                                        <img src="https://picsum.photos/id/<?= $item['id'] ?>/500/300" class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div>
                                                        <h5 class="mt-2"><?= $item['name'] ?></h5>
                                                        <p><span class="font-weight-bold">Description:</span> <?= $item['description'] ?></p>
                                                    </div>
                                                    <hr>
                                                    <!-- Form -->
                                                    <form action="cart-store" method="POST">
                                                        <div class="bg-danger bg-opacity-10 p-2">
                                                            <h5>Variation</h5>
                                                            <p>Sizes: </p>
                                                            <?php foreach ($menu_item_sizes as $size) : ?>
                                                                <?php if ($size['menu_item_id'] === $item['id']) : ?>
                                                                    <input 
                                                                        class="d-none" 
                                                                        name="menu_item_id" 
                                                                        value="<?= $item['id'] ?>" 
                                                                        type="text">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div>
                                                                            <input 
                                                                                type="radio" 
                                                                                class="btn-check" 
                                                                                name="menu_item_size_id" 
                                                                                value="<?= $size['id'] ?>" 
                                                                                id="vbtn-radio-id<?= $item['id'] . '-' . $size['size'] ?>" 
                                                                                autocomplete="off" 
                                                                                required>
                                                                            <label class="btn btn-outline-dark" for="vbtn-radio-id<?= $item['id'] . '-' . $size['size'] ?>"><?= $size['size'] ?></label>
                                                                        </div>
                                                                        <div>
                                                                            <p><?= $size['price'] ?></p>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <button class="choco-btn w-100 mt-4">Add to Cart</button>
                                                    </form>
                                                </div>
                                            </div>
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