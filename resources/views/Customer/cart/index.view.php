<?php require base_path('resources/views/components/head.php') ?>
<?php require base_path('resources/views/components/navbar.php') ?>

<section class="secion-container py-5">
    <div class="container py-5">
        <h1 class="hero-header"><?= $_SESSION['__currentUser']['credentials']['username'] ?>'s Cart</h1>
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
                        <div class="shadow-sm">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="<?= $item['image_dir'] ?>" class="img-fluid rounded-start h-100 w-100" alt="...">
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

                                            <div class="mb-3">
                                                <div>Catgory:
                                                    <span class="square ms-1"><?= $item['category'] ?></span>
                                                </div>
                                            </div>

                                            <!-- Quantity & Add Ons -->
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p>Add Ons:
                                                        <?php if ($item['add_on_name']) : ?>
                                                            <span class="square"><?= $item['add_on_name'] ?> ₱<?= $item['add_on_price'] ?></span>
                                                        <?php else : ?>
                                                            <span class="square">None</span>
                                                        <?php endif; ?>
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
                                                    <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling-id<?= $item['cart_id'] ?>" aria-controls="offcanvasScrolling"><i class="fa-solid fa-pen-to-square"></i></button>

                                                    <!-- Off canvas (Update) -->
                                                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling-id<?= $item['cart_id'] ?>" aria-labelledby="offcanvasScrollingLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Update Item Details</h5>
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
                                                            <form id="cart-id<?= $item['menu_item_id'] ?>" action="cart-update" method="POST">
                                                                <!-- Cart Id -->
                                                                <input
                                                                    class="d-none"
                                                                    name="cart_id"
                                                                    value="<?= $item['cart_id'] ?>">
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
                                                                                        value="<?= $size['menu_item_size_id'] ?>"
                                                                                        id="vbtn-radio-id<?= $item['cart_id'] . '-' . $size['size'] ?>"
                                                                                        autocomplete="off"
                                                                                        <?= $item['size'] === $size['size'] ? 'checked' : '' ?>
                                                                                        required>
                                                                                    <label
                                                                                        class="btn btn-outline-dark"
                                                                                        for="vbtn-radio-id<?= $item['cart_id'] . '-' . $size['size'] ?>"><?= $size['size'] ?></label>
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
                                                                    <?php $add_on_indicator = false ?>
                                                                    <?php foreach ($add_ons as $add_on) : ?>
                                                                        <?php if ($item['category'] === $add_on['category']) : ?>
                                                                            <?php $add_on_indicator = true ?>
                                                                            <input
                                                                                type="radio"
                                                                                class="btn-check"
                                                                                name="add_ons_id"
                                                                                value="<?= $add_on['add_on_id'] ?>"
                                                                                id="vbtn-radio-id<?= $item['cart_id'] . '-' . $add_on['add_on_id'] ?>"
                                                                                autocomplete="off"
                                                                                <?= $item['add_on_name'] === $add_on['name'] ? 'checked' : '' ?>>
                                                                            <label
                                                                                class="btn btn-outline-dark my-1"
                                                                                for="vbtn-radio-id<?= $item['cart_id'] . '-' . $add_on['add_on_id'] ?>"><?= $add_on['name'] ?> ₱<?= $add_on['price'] ?></label>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>

                                                                    <?php if (! $add_on_indicator) : ?>
                                                                        <p>(No add ons for this product)</p>
                                                                    <?php endif; ?>
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
                                                        <input
                                                            class="d-none"
                                                            name="cart_id"
                                                            value="<?= $item['cart_id'] ?>"
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

            <!-- Prices -->
            <div class="col-12 col-lg-4">
                <div class="card shadow-sm w-100">
                    <div class="card-body">

                        <!-- Total -->
                        <h5 class="card-title d-flex">Total:
                            <span class="ms-1">₱</span>
                            <span id="total-price">
                                <?php $total = 0.00;
                                $delivery_fee = 50.00;
                                $add_ons_price = 0.00 ?>
                                <?php foreach ($cartMenuItems as $item) : ?>
                                    <?php $add_ons_price += $item['add_on_price'] ?>
                                    <?php $total += floatval($item['price']) * $item['quantity'] ?>
                                <?php endforeach; ?>
                                <?= $total > 0 ? number_format($total + $delivery_fee + $add_ons_price, 2, '.', '') : '0.00' ?>
                            </span>
                        </h5>

                        <hr>

                        <!-- Sub Total -->
                        <h6 class="card-subtitle mb-2 text-body-secondary">Sub Total:
                            <?php $subTotal = 0.00; ?>
                            <?php foreach ($cartMenuItems as $item) : ?>
                                <?php $subTotal += floatval($item['price']) * floatval($item['quantity']) + $item['add_on_price'] ?>
                            <?php endforeach; ?>
                            ₱<?= number_format($subTotal, 2, '.', '') ?>
                        </h6>

                        <!-- Delivery Fee -->
                        <h6 class="card-subtitle mb-2 text-body-secondary">Delivery Fee: ₱<?= number_format($delivery_fee, 2, '.', '') ?></h6>

                        <!-- Selected Voucher Details -->
                        <h6 class="card-subtitle mb-2 text-body-secondary">Voucher: <span id="selectedVoucherHeader"></span></h6>

                        <hr>

                        <!-- Address, Payment Method, Place Order Form -->
                        <form id="place-order-form" action="order-store" method="POST" enctype="multipart/form-data">

                            <!-- Payment Method -->
                            <h6 class="card-subtitle mb-3 text-body-secondary">Payment Method: </h6>
                            <div class="d-flex justify-content-around">
                                <div class="form-check p-0">
                                    <input class="btn-check" type="radio" name="paymentMethodRadioBtn" id="codRadioBtn" checked>
                                    <label class="btn btn-outline-dark d-flex flex-column" for="codRadioBtn" style="padding: 1rem 3rem;">
                                        <i class="material-symbols-rounded text-lg fs-5 align-middle me-1 align-top">account_balance_wallet</i>
                                        COD
                                    </label>
                                </div>
                                <div class="form-check p-0">
                                    <input class="btn-check" type="radio" name="paymentMethodRadioBtn" id="gcashRadioBtn">
                                    <label class="btn btn-outline-dark d-flex flex-column" for="gcashRadioBtn" style="padding: 1rem 3rem;">
                                        <i class="material-symbols-rounded text-lg fs-5 align-middle me-1 align-top">credit_card</i>
                                        GCASH
                                    </label>
                                </div>
                            </div>

                            <input
                                id="payment-method-input"
                                class="d-none"
                                name="payment_method"
                                value="COD"
                                type="text">

                            <!-- Proof of Payment Input -->
                            <div id="paymentMethodContainer" class="mt-2 d-none">
                                <div class="input-group mb-3">
                                    <input id="file-input" name="proof_of_payment" type="file" class="form-control" id="inputGroupFile02" accept="image/*">
                                </div>
                            </div>

                            <hr>

                            <!-- Address -->
                            <h6 class="card-subtitle mb-3 text-body-secondary">Shipping Address: </h6>
                            <div class="input-group mb-3">
                                <?php $addressParts = [
                                    $_SESSION['__currentUser']['credentials']['house_number'],
                                    $_SESSION['__currentUser']['credentials']['street'],
                                    $_SESSION['__currentUser']['credentials']['barangay'],
                                    $_SESSION['__currentUser']['credentials']['city'],
                                    $_SESSION['__currentUser']['credentials']['provience'],
                                    $_SESSION['__currentUser']['credentials']['region'],
                                    $_SESSION['__currentUser']['credentials']['postal_code'],
                                ];
                                $address = implode(', ', array_filter($addressParts));
                                ?>
                                <textarea
                                    class="form-control"
                                    name="location"
                                    placeholder="House number, Street, Barangay, City, Provience, Region, Postal Code..."
                                    rows="3"
                                    aria-label="Address"><?= htmlspecialchars($address) ?></textarea>
                            </div>

                            <hr>

                            <!-- Place Order -->
                            <div class="d-flex align-items-end">
                                <?php foreach ($cartMenuItems as $item) : ?>
                                    <!-- This so the only passed value to $_POST is the items added by the current user -->
                                    <?php if ($item['user_id'] === $_SESSION['__currentUser']['credentials']['user_id']) : ?>
                                        <input
                                            class="d-none"
                                            name="cart_item[]"
                                            value="<?= $item['cart_id'] ?>"
                                            type="text">
                                        <!-- This is for the orders table -->
                                        <input
                                            class="d-none"
                                            name="total_price[]"
                                            value="<?= number_format($item['price'] * $item['quantity'], 2, '.', '') ?>"
                                            type="text">
                                        <!-- This is for the transactions table -->
                                        <input
                                            id="amount_due_input"
                                            class="d-none"
                                            name="amount_due"
                                            value="<?= number_format($total + $delivery_fee, 2, '.', '') ?>"
                                            type="text">
                                        <!-- Selected Discount Voucher -->
                                        <input
                                            id="selected_voucher_input"
                                            class="d-none"
                                            name="discount_id"
                                            value="">
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <button
                                    id="place-order-btn"
                                    form="place-order-form"
                                    class="<?= $subTotal > 150 && isOrderingTime() && $_SESSION['__currentUser']['credentials']['verified'] == 1 ? "choco-btn" : "choco-btn-disabled opacity-50" ?>"
                                    <?= $subTotal > 150 && isOrderingTime() && $_SESSION['__currentUser']['credentials']['verified'] == 1  ? "" : "disabled" ?>>Place Order</button>
                                <button title="voucher" type="button" class="btn btn-outline-success ms-3" data-bs-toggle="modal" data-bs-target="#voucherModal">
                                    <i class="fa-solid fa-ticket"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Discounts Modal -->
                    <div class="modal fade" id="voucherModal" tabindex="-1" aria-labelledby="voucherModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Available Vouchers</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <?php foreach ($available_discounts as $discount): ?>
                                            <?php if ($discount['min_amount'] <= $total): ?>

                                                <!-- Discount Container -->
                                                <div class="col-12 col-md-6">

                                                    <input
                                                        class="d-none"
                                                        name="discounted_price"
                                                        value="<?= $discount['value'] ?>">

                                                    <button form="form-discount-id<?= $discount['discount_id'] ?>" class="btn btn-outline-success w-100 select-discount"
                                                        data-id="<?= $discount['discount_id'] ?>"
                                                        data-name="<?= $discount['name'] ?>"
                                                        data-value="<?= $discount['value'] ?>"
                                                        data-type="<?= $discount['type'] ?>">

                                                        <?php $discounted_price = $discount['value'] ?>

                                                        <strong><?= $discount['name'] ?></strong>

                                                        <p>Min: ₱<?= $discount['min_amount'] ?></p>
                                                    </button>

                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</section>

<?php require base_path('resources/views/components/foot.php') ?>