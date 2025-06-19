<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('asset/css/Footer.css') }}" />
    <title>Footer</title>
</head>
<body>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo">
            <img src="{{ asset('asset/css/images/NavLogo.png') }}" alt="Footer Logo">
        </div>
        <div class="footer-links">
            <div class="footer-column">
                <h4>Navigation</h4>
                <a href="#">Visa</a>
                <a href="#">Contact us</a>
                <a href="#">About us</a>
                <a href="#">Login</a>
            </div>
            <div class="footer-column">
                <h4>Legal</h4>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Cookie Policy</a>
                <a href="#">Refund Policy</a>
            </div>
            <div class="footer-column">
                <h4>Contact Us</h4>
                <address>
                <p>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:info@example.com">info@example.com</a>
                </p>
                <p>
                    <i class="fas fa-phone"></i>
                    <a href="tel:+15551234567">+91 555-123-4567</a>
                </p>
                </address>

                <!-- <a href="#">Discord</a> -->
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2023 Abizon™. All Rights Reserved.</p>
        <!-- Optional social icons -->
        <!-- <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-discord"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-github"></i></a>
        </div> -->
    </div>
</footer>



</body>
</html>