  <?php
   include ('admin/db-conn.php');
$top_footer_query = "SELECT * FROM contacts ORDER BY id DESC LIMIT 1";
// [cite: 1]
$top_footer_result = mysqli_query($conn, $top_footer_query);
$site_info = mysqli_fetch_assoc($top_footer_result);

// Fallback default variables if database table is empty
$address = !empty($site_info['address']) ? $site_info['address'] : '56 Usha Nagar, Nr Iskon Temple, Gotri Road, Vadodara 390021';
// [cite: 1]
$phone = !empty($site_info['phone']) ? $site_info['phone'] : '8980401525';
// [cite: 1]
$email = !empty($site_info['email']) ? $site_info['email'] : 'ghatge.ghatge@gmail.com';
// [cite: 1]
$facebook = !empty($site_info['facebook']) ? $site_info['facebook'] : '#';
// [cite: 1]
$instagram = !empty($site_info['instagram']) ? $site_info['instagram'] : '#';
// [cite: 1]
$twitter = !empty($site_info['twitter']) ? $site_info['twitter'] : '#';
// [cite: 1]
$linkedin = !empty($site_info['linkdin']) ? $site_info['linkdin'] : '#';
// [cite: 1]
?>

<footer class="winnors-footer">
    <div class="container">
        <div class="row">

            <!-- Column 1: Brand & Socials -->
            <div class="col-lg-4 col-md-6 mb-5 winnors-footer-col">
                <a href="index.php" class="footer-brand d-block mb-3">Winnors<span class="dot">.</span></a>
                <p class="pe-lg-4">Delivering nature's finest whole spices directly to your kitchen. We ensure premium quality, authentic taste, and rich aromas in every single batch.</p>

                <div>
                    <?php if($facebook): ?>
                        <a href="<?php echo htmlspecialchars($facebook); ?>" target="_blank" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if($instagram): ?>
                        <a href="<?php echo htmlspecialchars($instagram); ?>" target="_blank" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if($twitter): ?>
                        <a href="<?php echo htmlspecialchars($twitter); ?>" target="_blank" class="social-icon"><i class="fa-brands fa-twitter"></i></a>
                        <!-- [cite: 1] -->
                    <?php endif; ?>
                    <?php if($linkedin): ?>
                        <a href="<?php echo htmlspecialchars($linkedin); ?>" target="_blank" class="social-icon"><i class="fa-brands fa-linkedin-in"></i></a>
                        <!-- [cite: 1] -->
                    <?php endif; ?>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="col-lg-2 col-md-6 mb-5 winnors-footer-col">
                <h5>Quick Links</h5>
                <div class="d-flex flex-column">
                    <a href="index.php" class="footer-link"><i class="fa-solid fa-chevron-right"></i> Home</a>
                    <a href="about.php" class="footer-link"><i class="fa-solid fa-chevron-right"></i> About Us</a>
                    <a href="products.php" class="footer-link"><i class="fa-solid fa-chevron-right"></i> Our Spices</a>
                    <a href="blogs.php" class="footer-link"><i class="fa-solid fa-chevron-right"></i> Latest News & Blogs</a>
                    <a href="contact.php" class="footer-link"><i class="fa-solid fa-chevron-right"></i> Contact Us</a>
                </div>
            </div>

            <!-- Column 3: Get In Touch -->
            <div class="col-lg-3 col-md-6 mb-5 winnors-footer-col">
                <h5>Get In Touch</h5>
                <div class="contact-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <p><?php echo nl2br(htmlspecialchars($address)); ?></p>
                    <!-- [cite: 1] -->
                </div>
                <div class="contact-item">
                    <i class="fa-solid fa-phone"></i>
                    <a href="tel:+91<?php echo preg_replace('/[^0-9]/', '', $phone); ?>">+91 <?php echo htmlspecialchars($phone); ?></a>
                    <!-- [cite: 1] -->
                </div>
                <div class="contact-item">
                    <i class="fa-solid fa-envelope"></i>
                    <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
                    <!-- [cite: 1] -->
                </div>
            </div>

            <!-- Column 4: Newsletter -->
            <div class="col-lg-3 col-md-6 mb-5 winnors-footer-col">
                <h5>Newsletter</h5>
                <p>Subscribe to get updates on our latest premium spice collections and offers.</p>
                
                <?php
                // Optional handling for newsletter submission if posted
                $newsletter_msg = '';
                if(isset($_POST['subscribe_email'])) {
                    $sub_email = mysqli_real_escape_string($conn, $_POST['subscribe_email']);
                    // You can save this to a newsletter/subscribers table if you have one
                    $newsletter_msg = '<small class="text-success mt-2 d-block">Thank you for subscribing!</small>';
                }
                ?>
                <form class="newsletter-form d-flex mt-3 flex-column" action="" method="POST">
                    <div class="d-flex">
                        <input type="email" name="subscribe_email" class="form-control" placeholder="Email Address" required>
                        <button type="submit" class="btn"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                    <?php echo $newsletter_msg; ?>
                </form>
            </div>

        </div>
    </div>

    <div class="footer-bottom text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb-0">&copy; <?php echo date("Y"); ?> <strong>Winnors</strong>. All Rights Reserved. Crafted with <i class="fa-solid fa-heart text-danger"></i> for Premium Quality.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

</html>