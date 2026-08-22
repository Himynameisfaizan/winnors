<?php
$pageTitle = "Bulk & Wholesale Supply";
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<section class="service-details-section">
    <div class="container">
        <div class="row gx-lg-5">

            <!-- Main Content Area -->
            <div class="col-lg-8 mb-5 mb-lg-0 reveal">
                <img src="https://images.pexels.com/photos/1340116/pexels-photo-1340116.jpeg?auto=compress&cs=tinysrgb&w=1200"
                    alt="Wholesale Spice Supply" class="service-main-img">

                <h2 class="service-title">Bulk & Wholesale Spice Supply</h2>
                <p class="service-desc">
                    At Winnors, we understand that consistency, purity, and timely delivery are the backbone of any food
                    business. Our Bulk & Wholesale Supply service is exclusively designed for restaurants, caterers,
                    hotels, and food manufacturers who refuse to compromise on the quality of their ingredients.
                </p>
                <p class="service-desc">
                    We source our whole spices directly from certified organic farms, ensuring that every batch you
                    receive is rich in essential oils and true to its authentic flavor profile. Whether you need 50kg or
                    500kg, our state-of-the-art facility in Vadodara handles sorting, cleaning, and hygienic packaging
                    with absolute precision.
                </p>

                <h3 class="service-subtitle">Why Partner With Us?</h3>
                <ul class="service-features">
                    <li><i class="fa-solid fa-circle-check"></i> <strong>Unmatched Purity:</strong> 100% natural spices
                        with no artificial colors, fillers, or preservatives.</li>
                    <li><i class="fa-solid fa-circle-check"></i> <strong>Consistent Quality:</strong> Stringent quality
                        checks guarantee the same aroma and flavor in every batch.</li>
                    <li><i class="fa-solid fa-circle-check"></i> <strong>Competitive Pricing:</strong> Direct farm
                        sourcing allows us to offer premium B2B rates without middlemen.</li>
                    <li><i class="fa-solid fa-circle-check"></i> <strong>Custom Packaging:</strong> Available in 5kg,
                        10kg, 25kg, and 50kg food-grade moisture-proof bags.</li>
                </ul>

                <h3 class="service-subtitle mt-5">Our Simple Process</h3>
                <div class="row g-4 mt-1">
                    <div class="col-md-4">
                        <div class="process-box">
                            <div class="process-icon"><i class="fa-solid fa-comments"></i></div>
                            <h5>1. Consultation</h5>
                            <p>Discuss your spice requirements and quantities with our team.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="process-box">
                            <div class="process-icon"><i class="fa-solid fa-box-open"></i></div>
                            <h5>2. Sampling</h5>
                            <p>We send you free samples to verify the quality and aroma.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="process-box">
                            <div class="process-icon"><i class="fa-solid fa-truck-fast"></i></div>
                            <h5>3. Delivery</h5>
                            <p>Fast and secure Pan-India dispatch of your bulk order.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Area -->
            <div class="col-lg-4 reveal" style="transition-delay: 0.2s;">

                <!-- Services Menu Widget -->
                <div class="service-sidebar">
                    <h4 class="sidebar-title">Our Services</h4>
                    <div class="sidebar-services">
                        <a href="#" class="active">Bulk & Wholesale Supply <i class="fa-solid fa-angle-right"></i></a>
                        <a href="#">Private Label Packaging <i class="fa-solid fa-angle-right"></i></a>
                        <a href="#">Custom Spice Blending <i class="fa-solid fa-angle-right"></i></a>
                        <a href="#">Export & Global Shipping <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>

                <!-- Contact & Brochure Widget -->
                <div class="service-sidebar" style="background-color: #2C1E16; color: #FFF; border: none;">
                    <h4 class="sidebar-title" style="color: #FFF;">Need Assistance?</h4>
                    <p style="color: #D1C7BD; font-size: 0.95rem; margin-bottom: 20px;">Get in touch with our experts
                        for custom quotes and free samples.</p>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-solid fa-phone fs-4 text-warning me-3"></i>
                        <div>
                            <span style="font-size: 0.8rem; color: #A9A096; text-transform: uppercase;">Call Us
                                Now</span><br>
                            <a href="tel:+918980401525"
                                style="color: #FFF; text-decoration: none; font-weight: 700; font-size: 1.1rem;">+91
                                89804 01525</a>
                        </div>
                    </div>

                    <a href="#" class="brochure-btn"><i class="fa-solid fa-file-pdf me-2"></i> Download Brochure</a>
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