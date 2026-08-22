<?php
$pageTitle = "Shop Our Spices";
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<section class="shop-section">
    <div class="container">

        <div class="row g-4">
            <!-- Product 1 -->
            <div class="col-lg-3 col-md-6 col-sm-6 reveal">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/fennel.webp" alt="Cumin Seeds">
                    </div>
                    <h4 class="shop-title">Premium Fennel Seeds</h4>
                    <div class="shop-price">₹350 / kg <del>₹420</del></div>
                    <a href="product-details.php" class="btn-view-details">View Details</a>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-lg-3 col-md-6 col-sm-6 reveal" style="transition-delay: 0.1s;">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/groundnut.webp" alt="Castor">
                    </div>
                    <h4 class="shop-title">Groundnut Seeds</h4>
                    <div class="shop-price">₹1,150 / kg <del>₹1,300</del></div>
                    <a href="product-details.php" class="btn-view-details">View Details</a>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-lg-3 col-md-6 col-sm-6 reveal" style="transition-delay: 0.2s;">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/mustard.webp" alt="Fennel Seeds">
                    </div>
                    <h4 class="shop-title">Mustard Seeds</h4>
                    <div class="shop-price">₹280 / kg <del>₹320</del></div>
                    <a href="product-details.php" class="btn-view-details">View Details</a>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-lg-3 col-md-6 col-sm-6 reveal" style="transition-delay: 0.3s;">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/psyllium.webp" alt="Psyllium Husk">
                    </div>
                    <h4 class="shop-title">Psyllium Husk</h4>
                    <div class="shop-price">₹750 / kg <del>₹850</del></div>
                    <a href="product-details.php" class="btn-view-details">View Details</a>
                </div>
            </div>

            <!-- Aur products aise hi add kar sakte ho -->
        </div>

        <div class="row g-4">
            <!-- Product 1 -->
            <div class="col-lg-3 col-md-6 col-sm-6 reveal">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/chilli.webp" alt="Cumin Seeds">
                    </div>
                    <h4 class="shop-title">Premium Chilli</h4>
                    <div class="shop-price">₹350 / kg <del>₹420</del></div>
                    <a href="product-details.php" class="btn-view-details">View Details</a>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-lg-3 col-md-6 col-sm-6 reveal" style="transition-delay: 0.1s;">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/castor.webp" alt="Castor">
                    </div>
                    <h4 class="shop-title">Castor Seeds</h4>
                    <div class="shop-price">₹1,150 / kg <del>₹1,300</del></div>
                    <a href="product-details.php" class="btn-view-details">View Details</a>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-lg-3 col-md-6 col-sm-6 reveal" style="transition-delay: 0.2s;">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/carom.webp" alt="Fennel Seeds">
                    </div>
                    <h4 class="shop-title">Carom Seeds</h4>
                    <div class="shop-price">₹280 / kg <del>₹320</del></div>
                    <a href="product-details.php" class="btn-view-details">View Details</a>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-lg-3 col-md-6 col-sm-6 reveal" style="transition-delay: 0.3s;">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/ajwain.webp" alt="Psyllium Husk">
                    </div>
                    <h4 class="shop-title">Ajwain Husk</h4>
                    <div class="shop-price">₹750 / kg <del>₹850</del></div>
                    <a href="product-details.php" class="btn-view-details">View Details</a>
                </div>
            </div>

            <!-- Aur products aise hi add kar sakte ho -->
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