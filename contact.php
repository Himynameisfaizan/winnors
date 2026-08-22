<?php
$pageTitle = "Get In Touch";
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<!-- ================= Contact Info Cards Start ================= -->
<section class="contact-info-section">
    <div class="container">
        <div class="row g-4">

            <!-- Address Card -->
            <div class="col-lg-4 col-md-6 reveal">
                <div class="info-card">
                    <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                    <h4>Our Location</h4>
                    <p>56 Usha Nagar,<br>Nr Iskon Temple, Gotri Road,<br>Vadodara 390021, Gujarat</p>
                </div>
            </div>

            <!-- Phone Card -->
            <div class="col-lg-4 col-md-6 reveal" style="transition-delay: 0.1s;">
                <div class="info-card">
                    <div class="info-icon"><i class="fa-solid fa-phone-volume"></i></div>
                    <h4>Call Us Directly</h4>
                    <p>Sales & Support:<br><a href="tel:+918980401525" class="fw-bold fs-5 text-dark">+91 89804
                            01525</a></p>
                    <p class="small mt-2">Mon - Sat: 9:00 AM to 7:00 PM</p>
                </div>
            </div>

            <!-- Email Card -->
            <div class="col-lg-4 col-md-6 reveal" style="transition-delay: 0.2s;">
                <div class="info-card">
                    <div class="info-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
                    <h4>Email Us</h4>
                    <p>For inquiries & bulk orders:<br><a href="mailto:ghatge.ghatge@gmail.com"
                            class="fw-bold text-dark">ghatge.ghatge@gmail.com</a></p>
                    <p class="small mt-2">We reply within 24 hours.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= Contact Form & Map Start ================= -->
<section class="contact-form-section">
    <div class="container">
        <div class="row g-4 align-items-stretch">

            <!-- Left Side: Contact Form -->
            <div class="col-lg-6 reveal">
                <div class="form-wrapper">
                    <h2 class="form-title">Send Us a Message</h2>
                    <p class="form-desc">Interested in wholesale pricing, private labeling, or need free samples? Fill
                        out the form below and our team will get back to you.</p>

                    <form class="custom-form" action="#" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name *" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Email Address *" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" class="form-control" placeholder="Phone Number *" required>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select" required>
                                    <option value="" selected disabled>Subject of Inquiry *</option>
                                    <option value="bulk">Bulk / Wholesale Order</option>
                                    <option value="private-label">Private Labeling</option>
                                    <option value="general">General Information</option>
                                    <option value="complaint">Support / Complaint</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="5" placeholder="Write your message here..."
                                    required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-send">Send Message <i
                                        class="fa-solid fa-paper-plane ms-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Side: Google Map -->
            <div class="col-lg-6 reveal" style="transition-delay: 0.2s;">
                <div class="map-wrapper">
                    <!-- Google Map iframe for Gotri Road, Vadodara -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14766.197368688842!2d73.1360183!3d22.3129529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc8a531b997c1%3A0xc33e5c94294b46b2!2sGotri%20Rd%2C%20Vadodara%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1691234567890!5m2!1sen!2sin"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Scroll Animation Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const reveals = document.querySelectorAll('.reveal');
        const appearOnScroll = new IntersectionObserver(function (entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        reveals.forEach(reveal => appearOnScroll.observe(reveal));
    });
</script>

<?php include 'includes/footer.php'; ?>