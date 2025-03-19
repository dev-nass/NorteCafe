<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Norte Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8dacd;
            /* Light yagami background */
            margin: 0;
            padding: 0;
            color: #543a35;
            /* Dark Negro text */
        }

        header {
            background-color: #543a35;
            /* Dark Negro header */
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
        }

        .faq-img {
            height: 350px;
        }

        .container {
            width: 90%;
            /* Make container responsive */
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #543a35;
            /* Dark Negro color for the subtitle */
            font-size: 1.5rem;
            text-align: center;
        }

        .faq-item {
            margin-bottom: 20px;
        }

        .faq-item h3 {
            margin: 0;
            font-size: 1.2rem;
            color: #543a35;
            /* Dark Negro color for questions */
            cursor: pointer;
            padding: 10px;
            border: 1px solid #543a35;
            border-radius: 4px;
            background-color: #f1f1f1;
            transition: background-color 0.3s;
        }

        .faq-item h3:hover {
            background-color: #ddd;
        }

        .faq-item p {
            margin-top: 10px;
            font-size: 1rem;
            color: #543a35;
            /* Dark Negro color for text */
            padding: 10px;
            border-left: 3px solid #543a35;
            background-color: #f9f9f9;
        }

        /* Collapsible content styles */
        .collapse {
            display: none;
            transition: height 0.3s ease-out;
        }

        .collapsing {
            display: block;
            height: 0;
            overflow: hidden;
        }

        .collapse.show {
            display: block;
            height: auto;
        }

        /* Footer */
        footer {
            background-color: #543a35;
            /* Dark Negro footer */
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header h1 {
                font-size: 1.5rem;
            }

            .container {
                width: 95%;
                padding: 15px;
            }

            h2 {
                font-size: 1.2rem;
            }

            .faq-item h3 {
                font-size: 1rem;
                padding: 8px;
            }

            .faq-item p {
                font-size: 0.9rem;
                padding: 8px;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 1.2rem;
            }

            .container {
                width: 100%;
                padding: 10px;
            }

            h2 {
                font-size: 1rem;
            }

            .faq-item h3 {
                font-size: 0.9rem;
                padding: 6px;
            }

            .faq-item p {
                font-size: 0.8rem;
                padding: 6px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Frequently Asked Questions</h1>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 d-flex justify-content-center align-items-center">
                <img class="faq-img" src="../../storage/frontend/user/img/tampol-pages/faqs-img.png" alt="faq-image">
            </div>
            <div class="col-12 col-lg-7">
                <h2>Welcome to our FAQ page!</h2>
                <p>We’ve compiled answers to some of the most common questions we receive. If you don’t find what you're looking for, feel free to reach out to us directly.</p>

                <div class="faq-item">
                    <h3 onclick="toggleCollapse(this)">1. What are your hours of operation?</h3>
                    <p class="collapse">We are open every day from 10:00 AM to 9:00 PM. Stop by anytime to enjoy your favorite brew!</p>
                </div>

                <div class="faq-item">
                    <h3 onclick="toggleCollapse(this)">2. What should I do if I received an incorrect order?</h3>
                    <p class="collapse">We’re sorry about that! If you receive an incorrect order, please let us know as soon as possible. We’ll happily correct it and ensure you get the right items. Your satisfaction is our priority.</p>
                </div>

                <div class="faq-item">
                    <h3 onclick="toggleCollapse(this)">3. Do you serve breakfast or lunch?</h3>
                    <p class="collapse">Yes, we serve a variety of Lunch items (such as Sandwhiches, and Nachos)</p>
                </div>

                <div class="faq-item">
                    <h3 onclick="toggleCollapse(this)">4. Can I place an order for pickup?</h3>
                    <p class="collapse">Absolutely! You can place your order in advance through our mobile app or website for easy pickup.</p>
                </div>

                <div class="faq-item">
                    <h3 onclick="toggleCollapse(this)">5. Do you have Wi-Fi?</h3>
                    <p class="collapse">Yes, we offer free Wi-Fi for all customers. Feel free to bring your laptop and get some work done, or just relax and surf the web while enjoying your coffee.</p>
                </div>

                <div class="faq-item">
                    <h3 onclick="toggleCollapse(this)">6. Do you offer catering services?</h3>
                    <p class="collapse">We do offer catering for events! Whether it’s a small gathering or a large corporate event, we’d be happy to provide coffee and baked goods. Please contact us ahead of time for more details.</p>
                </div>

                <div class="faq-item">
                    <h3 onclick="toggleCollapse(this)">7. Do you offer loyalty programs or discounts?</h3>
                    <p class="collapse">Yes, we offer a loyalty program through our mobile app. Earn points with every purchase and redeem them for free drinks or discounts.</p>
                </div>

                <div class="faq-item">
                    <h3 onclick="toggleCollapse(this)">8. How can I stay updated on new items or special offers?</h3>
                    <p class="collapse">To stay in the loop on new menu items, special offers, and upcoming events, follow us on social media or sign up for our newsletter. We’ll keep you informed about everything happening at Norte Cafe.</p>
                </div>

                <div class="faq-item">
                    <h3 onclick="toggleCollapse(this)">9. Do you offer cold brew or iced coffee? </h3>
                    <p class="collapse">Yes, we offer both cold brew coffee and iced coffee! Whether you’re in the mood for a refreshing cold drink or something stronger, we’ve got the perfect iced options. We also offer iced lattes and iced mochas.</p>
                </div>

                <div class="faq-item">
                    <h3 onclick="toggleCollapse(this)">10. Do you have parking available?</h3>
                    <p class="collapse">Yes, we offer free parking in the lot below our shop. There are also street parking options nearby.</p>
                </div>
            </div>
        </div>


    </div>

    <footer>
        <p>&copy; 2025 Norte Cafe. All Rights Reserved.</p>
    </footer>

    <script>
        function toggleCollapse(element) {
            var content = element.nextElementSibling;

            // chat gpt na banda dto
            if (content.classList.contains('collapse')) {
                content.classList.add('collapsing');
                setTimeout(function() {
                    content.classList.remove('collapsing');
                    content.classList.toggle('show');
                }, 300); // Matches the CSS transition time
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>