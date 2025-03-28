<?php require base_path('resources/views/components/head.php') ?>
<?php require base_path('resources/views/components/navbar.php') ?>

<section class="section-container">
    <div class="container py-5">

        <!-- Filtering -->
        <div class="row">
            <div class="col-12">
                <div>
                    <!-- Searching Filter -->
                    <form id="search-filter" action="search-filter" method="GET">
                        <div class="input-group mb-3">
                            <input
                                name="search"
                                type="text"
                                class="form-control"
                                placeholder="Caramel Macchiato...">
                            <button form="search-filter" class="choco-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <button class="ms-3 choco-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-filter"></i></button>
                        </div>
                    </form>

                    <!-- Category Filter -->
                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Search Filter</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body d-flex flex-column justify-content-between">
                            <form id="category-filter" action="category-filter">
                                <h6>Category Filter</h6>
                                <?php $first = true; // Flag to track the first iteration 
                                ?>
                                <?php foreach ($menu_item_categories as $category) : ?>
                                    <span>
                                        <input
                                            type="radio"
                                            class="btn-check"
                                            id="v-btn-radio-category<?= $category['category'] ?>"
                                            name="search"
                                            value="<?= $category['category'] ?>"
                                            autocomplete="off"
                                            <?= $first ? 'checked' : '' ?>
                                            >
                                        <label
                                            class="btn btn-outline-dark mb-2 me-2"
                                            for="v-btn-radio-category<?= $category['category'] ?>"><?= $category['category'] ?></label>
                                    </span>
                                    <?php $first = false; ?>
                                <?php endforeach; ?>

                                <hr>
                            </form>
                            <button form="category-filter" class="choco-btn">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Item -->
        <div class="row">
            <?php foreach ($menu_items as $item) : ?>
                <div class="col-6 col-xxl-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-12 col-md-4">
                                <img src="<?= $item['image_dir'] ?>" class="img-fluid rounded-start w-100 h-100" alt="...">
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
                                                <?php if ($size['menu_item_id'] === $item['menu_item_id']) : ?>
                                                    <span class="square ms-1"><?= $size['size'] ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <p class="card-text m-1">Category: <span class="square ms-1"><?= $item['category'] ?></span></p>

                                    <!-- Availability & Modal -->
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="card-text mt-2 <?= $item['available'] ? 'text-success' : 'text-danger' ?>"><?= $item['available'] ? 'Available' : 'Not Available' ?></p>
                                        </div>
                                        <div>
                                            <button class="<?= $item['available'] ? 'choco-btn' : 'choco-btn-disabled opacity-50' ?>" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling-id<?= $item['menu_item_id'] ?>" aria-controls="offcanvasScrolling" <?= $item['available'] ? '' : 'disabled' ?>><i class="fa-solid fa-cart-plus"></i></button>

                                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling-id<?= $item['menu_item_id'] ?>" aria-labelledby="offcanvasScrollingLabel">
                                                <div class="offcanvas-header">
                                                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu Item Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body">
                                                    <div class="d-flex justify-content-center">
                                                        <img src="<?= $item['image_dir'] ?>" class="img-fluid rounded-start" alt="...">
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
                                                            <?php $first = true; // Flag to track the first iteration 
                                                            ?>
                                                            <?php foreach ($menu_item_sizes as $size) : ?>
                                                                <?php if ($size['menu_item_id'] === $item['menu_item_id']) : ?>
                                                                    <input
                                                                        class="d-none"
                                                                        name="menu_item_id"
                                                                        value="<?= $item['menu_item_id'] ?>"
                                                                        type="text">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div>
                                                                            <input
                                                                                type="radio"
                                                                                class="btn-check"
                                                                                name="menu_item_size_id"
                                                                                value="<?= $size['menu_item_size_id'] ?>"
                                                                                id="vbtn-radio-id<?= $item['menu_item_id'] . '-' . $size['size'] ?>"
                                                                                autocomplete="off"
                                                                                required
                                                                                <?= $first ? 'checked' : '' ?>>
                                                                            <label
                                                                                class="btn btn-outline-dark"
                                                                                for="vbtn-radio-id<?= $item['menu_item_id'] . '-' . $size['size'] ?>"><?= $size['size'] ?></label>
                                                                        </div>
                                                                        <div>
                                                                            <p>₱<?= $size['price'] ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <?php $first = false; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <?php if ($item['category'] === 'MILKTEA') : ?>
                                                            <div class="bg-success bg-opacity-10 p-2 mt-2">
                                                                <h5>Add Ons</h5>
                                                                <p>Choose One: </p>
                                                                <?php foreach ($add_ons as $add_on) : ?>
                                                                    <input
                                                                        type="radio"
                                                                        class="btn-check"
                                                                        name="add_ons_id"
                                                                        value="<?= $add_on['add_on_id'] ?>"
                                                                        id="vbtn-radio-id<?= $item['menu_item_id'] . '-' . $add_on['add_on_id'] ?>"
                                                                        autocomplete="off">
                                                                    <label
                                                                        class="btn btn-outline-dark my-1"
                                                                        for="vbtn-radio-id<?= $item['menu_item_id'] . '-' . $add_on['add_on_id'] ?>"><?= $add_on['name'] ?> ₱<?= $add_on['price'] ?></label>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <!-- Quantity -->
                                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                                            <div class="d-flex flex-row quantity-container mt-4">
                                                                <span class="square square-minus" style="cursor: pointer;">-</span>
                                                                <input
                                                                    class="input-quantity text-center w-25"
                                                                    name="quantity"
                                                                    value="1"
                                                                    type="text"
                                                                    readonly>
                                                                <span class="square square-add" style="cursor: pointer;">+</span>
                                                            </div>
                                                            <button class="choco-btn w-100 mt-4">Add to Cart</button>
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
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Showing <?= $pages['page_no'] ?> to <?= $pages['total_records_per_page'] ?> out of <?= $pages['total_records'] ?> results </p>
                </div>

                <ul class="pagination">
                    <li class="page-item">
                        <a
                            class="page-link text-dark <?= ($pages['page_no'] <= 1 ? 'disabled' : '') ?>"
                            <?= ($pages['page_no'] > 1) ? 'href="?page_no=' . $pages['previous_page'] . '"' : '' ?>>Previous</a>
                    </li>

                    <?php for ($counter = 1; $counter <= $pages['total_no_of_pages']; $counter++) : ?>
                        <li class="page-item <?= ($pages['page_no'] == $counter ? 'active' : '') ?>">
                            <a
                                class="page-link text-dark"
                                href="?page_no=<?= $counter ?>"><?= $counter ?></a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item">
                        <a
                            class="page-link text-dark <?= ($pages['page_no'] >= $pages['total_no_of_pages'] ? 'disabled' : '') ?>"
                            <?= ($pages['page_no'] < $pages['total_no_of_pages']) ? 'href="?page_no=' . $pages['next_page'] . '"' : '' ?>>Next</a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</section>



<?php require base_path('resources/views/components/foot.php') ?>