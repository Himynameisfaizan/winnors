<?php
$pageTitle = "Our Whole Spices";
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>


<section class="products-page">
    <div class="container">
        <!-- Filter/Sorting Bar (Optional for Premium Look) -->
        <div class="d-flex justify-content-between align-items-center mb-5 reveal">
            <p class="text-muted mb-0">Showing all 6 premium spices</p>
            <select class="form-select w-auto border-0 shadow-sm" style="background-color: #FFF;">
                <option>Default Sorting</option>
                <option>Sort by Popularity</option>
                <option>Sort by Newness</option>
            </select>
        </div>

        <div class="row g-4">
            <!-- Product 1 -->
            <div class="col-lg-4 col-md-6 reveal">
                <div class="spice-card">
                    <div class="card-img-wrapper">
                        <span class="badge-premium">Best Seller</span>
                        <img src="assets/images/products/ajwain.webp" alt="Ajwain">
                    </div>
                    <div class="spice-card-body">
                        <h4 class="spice-card-title">Premium Ajwain</h4>
                        <p class="spice-card-desc">Bold, aromatic, and intense. Sourced from the finest farms.</p>
                        <div class="spice-card-footer">
                            <a href="service-details.php" class="view-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <a href="contact.php" class="btn-quote">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-lg-4 col-md-6 reveal" style="transition-delay: 0.1s;">
                <div class="spice-card">
                    <div class="card-img-wrapper">
                        <span class="badge-premium">Export Quality</span>
                        <img src="assets/images/products/carom.webp" alt="Carom">
                    </div>
                    <div class="spice-card-body">
                        <h4 class="spice-card-title">Carom Seeds</h4>
                        <p class="spice-card-desc">Vibrant green pods with a sweet, floral, and aromatic essence.</p>
                        <div class="spice-card-footer">
                            <a href="service-details.php" class="view-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <a href="contact.php" class="btn-quote">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-lg-4 col-md-6 reveal" style="transition-delay: 0.2s;">
                <div class="spice-card">
                    <div class="card-img-wrapper">
                        <span class="badge-premium">Organic</span>
                        <img src="https://images.pexels.com/photos/2802527/pexels-photo-2802527.jpeg?auto=compress&cs=tinysrgb&w=600"
                            alt="Cinnamon Sticks">
                    </div>
                    <div class="spice-card-body">
                        <h4 class="spice-card-title">Cinnamon Sticks</h4>
                        <p class="spice-card-desc">Sweet and warm, authentic cinnamon sticks perfect for curries.</p>
                        <div class="spice-card-footer">
                            <a href="service-details.php" class="view-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <a href="contact.php" class="btn-quote">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-lg-4 col-md-6 reveal">
                <div class="spice-card">
                    <div class="card-img-wrapper">
                        <img src="assets/images/products/castor.webp" alt="castor">
                    </div>
                    <div class="spice-card-body">
                        <h4 class="spice-card-title">Castor seeds</h4>
                        <p class="spice-card-desc">Intensely warm and sweet, these cloves are rich in essential oils.
                        </p>
                        <div class="spice-card-footer">
                            <a href="service-details.php" class="view-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <a href="contact.php" class="btn-quote">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="col-lg-4 col-md-6 reveal" style="transition-delay: 0.1s;">
                <div class="spice-card">
                    <div class="card-img-wrapper">
                        <img src="assets/images/products/chickpeas.webp" alt="Coriander Seeds">
                    </div>
                    <div class="spice-card-body">
                        <h4 class="spice-card-title">Chickpeas Seeds</h4>
                        <p class="spice-card-desc">Freshly harvested, bringing a mild citrusy and earthy flavor.</p>
                        <div class="spice-card-footer">
                            <a href="service-details.php" class="view-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <a href="contact.php" class="btn-quote">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="col-lg-4 col-md-6 reveal" style="transition-delay: 0.2s;">
                <div class="spice-card">
                    <div class="card-img-wrapper">
                        <span class="badge-premium">New Arrival</span>
                        <img src="assets/images/products/cumin seeds.webp" alt="Cumin Seeds">
                    </div>
                    <div class="spice-card-body">
                        <h4 class="spice-card-title">Premium Cumin Seeds</h4>
                        <p class="spice-card-desc">Distinctive warm flavor, indispensable in authentic Indian cooking.
                        </p>
                        <div class="spice-card-footer">
                            <a href="service-details.php" class="view-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <a href="contact.php" class="btn-quote">Get Quote</a>
                        </div>
                    </div>
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