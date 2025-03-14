<?php require base_path('resources/views/components/head.php') ?>
<?php require base_path('resources/views/components/navbar.php') ?>

<section class="secion-container py-5">
    <div class="container py-5">
        <h1 class="section-header"><?= $_SESSION['__currentUser']['credentials']['username'] ?>'s Cart</h1>
        <hr>
        <div class="row">
            <!-- Cards -->
            <div class="col-12 col-lg-8">
                <?php if (empty($cartMenuItems)) : ?>
                    <div class="vh-100">
                        <p>Oops looks like your cart is empty!!!</p>
                    </div>
                <?php else : ?>
                    <?php foreach ($cartMenuItems as $item) : ?>
                        <div>
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="https://picsum.photos/id/<?= $item['menu_item_id'] ?>/300/300" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $item['name'] ?></h5>
                                            <p class="card-text"><?= $item['description'] ?></p>

                                            <!-- Sizes -->
                                            <div class="d-flex justify-content-between">
                                                <div>Size:
                                                    <span class="square ms-1"><?= $item['size'] ?></span>
                                                </div>
                                                <div>
                                                    <p><span class="text-primary">₱ <?= number_format($item['price'], 2, '.', '') ?></span></p>
                                                </div>
                                            </div>

                                            <!-- Quantity & Add Ons -->
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p>Add Ons: 
                                                        <?php if($item['add_on_name']) : ?>
                                                            <span class="square"><?= $item['add_on_name'] ?> ₱<?= $item['add_on_price'] ?></span>
                                                        <?php else : ?>
                                                            <span class="square">None</span>
                                                        <?php endif ; ?>
                                                    </p>
                                                </div>
                                                <div>
                                                    <p>x<?= $item['quantity'] ?></p>
                                                </div>
                                            </div>

                                            <hr>

                                            <!-- Update and Deletion -->
                                            <div class="d-flex">
                                                <!-- Update -->
                                                <div>
                                                    <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling-id<?= $item['id'] ?>" aria-controls="offcanvasScrolling"><i class="fa-solid fa-pen-to-square"></i></button>

                                                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling-id<?= $item['id'] ?>" aria-labelledby="offcanvasScrollingLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Update Item Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <div class="d-flex justify-content-center">
                                                                <img src="https://picsum.photos/id/<?= $item['menu_item_id'] ?>/500/300" class="img-fluid rounded-start" alt="...">
                                                            </div>
                                                            <div>
                                                                <h5 class="mt-2"><?= $item['name'] ?></h5>
                                                                <p><span class="font-weight-bold">Description:</span> <?= $item['description'] ?></p>
                                                            </div>
                                                            <hr>
                                                            <!-- Form -->
                                                            <form id="cart-id<?= $item['menu_item_id'] ?>" action="cart-update" method="POST">
                                                                <input 
                                                                    class="d-none" 
                                                                    name="__method" 
                                                                    value="PATCH">
                                                                <!-- Cart Id -->
                                                                <input
                                                                    class="d-none"
                                                                    name="cart_id"
                                                                    value="<?= $item['id'] ?>">
                                                                <div class="bg-danger bg-opacity-10 p-2">
                                                                    <h5>Variation</h5>
                                                                    <p>Sizes: </p>
                                                                    <?php foreach ($menu_item_sizes as $size) : ?>
                                                                        <?php if ($size['menu_item_id'] === $item['menu_item_id']) : ?>
                                                                            <div class="d-flex justify-content-between">
                                                                                <!-- Size -->
                                                                                <div>
                                                                                    <input
                                                                                        type="radio"
                                                                                        class="btn-check"
                                                                                        name="menu_item_size_id"
                                                                                        value="<?= $size['id'] ?>"
                                                                                        id="vbtn-radio-id<?= $item['id'] . '-' . $size['size'] ?>"
                                                                                        autocomplete="off"
                                                                                        <?= $item['size'] === $size['size'] ? 'checked' : '' ?>
                                                                                        required>
                                                                                    <label
                                                                                        class="btn btn-outline-dark"
                                                                                        for="vbtn-radio-id<?= $item['id'] . '-' . $size['size'] ?>"><?= $size['size'] ?></label>
                                                                                </div>
                                                                                <div>
                                                                                    <p>₱<?= number_format($size['price'], 2, '.', '') ?></p>
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                                <div class="bg-success bg-opacity-10 p-2 mt-2">
                                                                    <h5>Add Ons</h5>
                                                                    <p>Choose One: </p>
                                                                    <?php foreach ($add_ons as $add_on) : ?>
                                                                        <input
                                                                            type="radio"
                                                                            class="btn-check"
                                                                            name="add_ons_id"
                                                                            value="<?= $add_on['id'] ?>"
                                                                            id="vbtn-radio-id<?= $item['id'] . '-' . $add_on['id'] ?>"
                                                                            autocomplete="off"
                                                                            <?= $item['add_on_name'] === $add_on['name'] ? 'checked' : '' ?>
                                                                            required>
                                                                        <label
                                                                            class="btn btn-outline-dark my-1"
                                                                            for="vbtn-radio-id<?= $item['id'] . '-' . $add_on['id'] ?>"><?= $add_on['name'] ?> ₱<?= $add_on['price'] ?></label>
                                                                    <?php endforeach; ?>
                                                                </div>

                                                                <!-- Quantity -->
                                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                                    <div class="d-flex flex-row quantity-container mt-4">
                                                                        <span class="square square-minus" style="cursor: pointer;">-</span>
                                                                        <input
                                                                            class="input-quantity text-center w-25"
                                                                            name="quantity"
                                                                            value="<?= $item['quantity'] ?>"
                                                                            type="text"
                                                                            readonly>
                                                                        <span class="square square-add" style="cursor: pointer;">+</span>
                                                                    </div>
                                                                    <button form="cart-id<?= $item['menu_item_id'] ?>" class="btn btn-success w-100 mt-4">Update Item</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Delete -->
                                                <div class="ms-1">
                                                    <form action="cart-delete" method="POST">
                                                        <input class="d-none" name="__method" value="DELETE">
                                                        <input
                                                            class="d-none"
                                                            name="cart_id"
                                                            value="<?= $item['id'] ?>"
                                                            type="text">
                                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Total -->
            <div class="col-12 col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total:
                            <?php $total = 0.00;  $delivery_fee = 50.00; ?>
                            <?php foreach ($cartMenuItems as $item) : ?>
                                <?php $total += floatval($item['price']) * $item['quantity'] ?>
                            <?php endforeach; ?>
                            ₱<?= $total > 0 ? number_format($total + $delivery_fee, 2, '.', '') : '0.00' ?>
                        </h5>
                        <hr>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Sub Total:
                            <?php $subTotal = 0.00; ?>
                            <?php foreach ($cartMenuItems as $item) : ?>
                                <?php $subTotal += floatval($item['price']) * floatval($item['quantity']) ?>
                            <?php endforeach; ?>
                            ₱<?= number_format($subTotal, 2, '.', '') ?>
                        </h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Delivery Fee: ₱<?= number_format($delivery_fee, 2, '.', '') ?></h6>
                        <form action="order-store" method="POST">
                            <?php foreach ($cartMenuItems as $item) : ?>
                                <!-- This so the only passed value to $_POST is the items added by the current user -->
                                <?php if ($item['user_id'] === $_SESSION['__currentUser']['credentials']['id']) : ?>
                                    <input
                                        class="d-none"
                                        name="cart_item[]"
                                        value="<?= $item['id'] ?>"
                                        type="text">
                                    <!-- This is for the orders table -->
                                    <input
                                        class="d-none"
                                        name="total_price[]"
                                        value="<?= number_format($item['price'] * $item['quantity'], 2, '.', '') ?>"
                                        type="text">
                                    <!-- This is for the transactions table -->
                                    <input
                                        class="d-none"
                                        name="amount_due"
                                        value="<?= number_format($total + $delivery_fee, 2, '.', '') ?>"
                                        type="text">
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <button class="choco-btn">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

<?php require base_path('resources/views/components/foot.php') ?>