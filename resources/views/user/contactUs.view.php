<?php require base_path('resources/views/components/head.php')?>
<?php require base_path('resources/views/components/navbar.php')?>

<section class="vh-100 d-flex justify-content-center align-items-center mt-4">
    <div class="container white-bg p-5">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-md-4">
                <div class="contact-info">
                    <h2 class="section-headerv2">Contact Us</h2>
                    <div class="mt-3">
                        <h3 class="h4"><i class="fa-solid fa-map-marker-alt h5 me-2 text-danger"></i>Address</h3>
                        <p>Keystone building San Isidro Labrador 2, Dasmariñas, Philippines</p>
                    </div>
                    <div>
                        <h3 class="h4"><i class="fas fa-phone h5 me-2 text-primary"></i>Phone</h3>
                        <p>+639497294572</p>
                    </div>
                    <div>
                        <h3 class="h4"><i class="fas fa-envelope h5 me-2 text-success"></i>Email</h3>
                        <p>amauryloyola2@gmail.com</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-8 mt-5">
                <div class="contact-form">
                    <form action="process_contact.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select class="form-control" id="subject" name="subject" required>
                                <option value="">Select a Subject</option>
                                <option value="Inquiry">Inquiry</option>
                                <option value="Feedback">Feedback</option>
                                <option value="Support">Support</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="I enjoyed my stay at your shop...." required></textarea>
                        </div>
                        <button type="submit" class="btn choco-btn text-white">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require base_path('resources/views/components/foot.php')?>