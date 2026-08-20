<?php include 'includes/header.php'; ?>

<!-- Hero Section Start -->
<section class="hero-slider">
    <div id="winnorsHeroSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#winnorsHeroSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#winnorsHeroSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#winnorsHeroSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/2802527/pexels-photo-2802527.jpeg?auto=compress&cs=tinysrgb&w=1920&q=80" alt="Premium Whole Spices">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <h1 class="hero-title">Premium <span>Whole Spices</span></h1>
                    <p class="hero-subtitle">Bringing nature's finest and most authentic flavors directly to your kitchen.</p>
                    <div class="hero-buttons">
                        <a href="products.php" class="btn btn-premium">Explore Spices</a>
                        <a href="contact.php" class="btn btn-outline-premium">Contact Us</a>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="assets/images/products/mustard.webp" alt="Authentic Taste">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <h1 class="hero-title">Rich Aromas, <span>Pure Quality</span></h1>
                    <p class="hero-subtitle">Carefully handpicked, sun-dried, and packed to preserve the true essence.</p>
                    <div class="hero-buttons">
                        <a href="about.php" class="btn btn-premium">Our Story</a>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1340116/pexels-photo-1340116.jpeg?auto=compress&cs=tinysrgb&w=1920&q=80" alt="Wholesale Spices">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <h1 class="hero-title">Your Trusted <span>Spice Partner</span></h1>
                    <p class="hero-subtitle">Top-grade whole spices for businesses and homes. Quality that speaks for itself.</p>
                    <div class="hero-buttons">
                        <a href="contact.php" class="btn btn-premium">Get a Quote</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls (Arrows) -->
        <button class="carousel-control-prev" type="button" data-bs-target="#winnorsHeroSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#winnorsHeroSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- Hero Section End -->

<!-- About Section Start -->
<section class="about-section">
    <div class="container">
        <div class="row align-items-center gx-lg-5">
            
            <!-- Left Side: Image with Floating Badge -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="about-img-wrapper">
                    <img src="assets/images/products/psyllium.webp" alt="Winnors Premium Spices" class="img-fluid about-main-img">
                    <div class="quality-badge d-none d-sm-block">
                        <h3>100%</h3>
                        <p>Pure & Natural</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Text & Content -->
            <div class="col-lg-6">
                <div class="about-text">
                    <span class="about-subtitle"><i class="fa-solid fa-leaf me-2"></i> Welcome to Winnors</span>
                    <h2 class="about-title">The True Essence of Authentic Indian Spices</h2>
                    <p class="about-desc">
                        At Winnors, we believe that the secret to a great meal lies in the purity of its ingredients. Sourced directly from the finest farms, our whole spices are carefully handpicked, sun-dried, and hygienically packed to retain their natural oils, rich aroma, and robust flavors.
                    </p>
                    
                    <!-- Features -->
                    <ul class="feature-list">
                        <li><i class="fa-solid fa-check"></i> Premium Quality Whole Spices</li>
                        <li><i class="fa-solid fa-check"></i> No Artificial Colors or Preservatives</li>
                        <li><i class="fa-solid fa-check"></i> Rich in Natural Essential Oils</li>
                    </ul>

                    <!-- Button (Uses the premium button class from Hero Section) -->
                    <a href="about.php" class="btn btn-premium mt-2">Discover Our Story <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Services / Products Section Start -->
<section class="services-section">
    <div class="container">    
        <!-- Section Header -->
        <div class="section-header">
            <span class="section-subtitle">Our Offerings</span>
            <h2 class="section-title">Premium Whole Spices</h2>
        </div>

        <div class="row g-4">
            
            <!-- Card 1: Black Pepper -->
            <div class="col-lg-4 col-md-6">
                <div class="spice-card">
                    <div class="card-img-wrapper">
                        <span class="badge-premium">Best Seller</span>
                        <img src="assets/images/products/chickpeas.webp" alt="Black Pepper Whole">
                    </div>
                    <div class="spice-card-body">
                        <h4 class="spice-card-title">Premium Chickpeas</h4>
                        <p class="spice-card-desc">Bold, aromatic, and intense. Our sun-dried black peppercorns add a rich depth of flavor and heat to any culinary dish.</p>
                        
                        <div class="spice-card-footer">
                            <a href="product-details.php" class="view-link">View Details <i class="fa-solid fa-arrow-right"></i></a>
                            <a href="contact.php" class="btn-quote">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Green Cardamom -->
            <div class="col-lg-4 col-md-6">
                <div class="spice-card">
                    <div class="card-img-wrapper">
                        <span class="badge-premium">Export Quality</span>
                        <img src="assets/images/products/mustard.webp" alt="Green Cardamom">
                    </div>
                    <div class="spice-card-body">
                        <h4 class="spice-card-title">Green Cardamom</h4>
                        <p class="spice-card-desc">Handpicked directly from organic farms, these vibrant green pods bring a sweet, floral, and highly aromatic essence.</p>
                        
                        <div class="spice-card-footer">
                            <a href="product-details.php" class="view-link">View Details <i class="fa-solid fa-arrow-right"></i></a>
                            <a href="contact.php" class="btn-quote">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Cinnamon Sticks -->
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <div class="spice-card">
                    <div class="card-img-wrapper">
                        <span class="badge-premium">Organic</span>
                        <img src="https://images.pexels.com/photos/2802527/pexels-photo-2802527.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Cinnamon Sticks">
                    </div>
                    <div class="spice-card-body">
                        <h4 class="spice-card-title">Cinnamon Sticks</h4>
                        <p class="spice-card-desc">Sweet and warm, our authentic cinnamon sticks are perfect for curries, desserts, and brewing premium spiced teas.</p>
                        
                        <div class="spice-card-footer">
                            <a href="product-details.php" class="view-link">View Details <i class="fa-solid fa-arrow-right"></i></a>
                            <a href="contact.php" class="btn-quote">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- View All Button -->
        <div class="text-center mt-5">
            <a href="products.php" class="btn btn-premium">Explore All Spices <i class="fa-solid fa-arrow-right ms-2"></i></a>
        </div>

    </div>
</section>

<!-- WHY CHOOSE US SECTION START -->
<section class="why-choose-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <span class="section-subtitle">Our Promise</span>
            <h2 class="section-title">Why Choose Winnors</h2>
        </div>

        <div class="row g-4 mt-2">
            <!-- Feature 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa-solid fa-leaf"></i></div>
                    <h4 class="feature-title">100% Pure & Natural</h4>
                    <p class="feature-desc">No added colors or preservatives. Just pure, unadulterated spices.</p>
                </div>
            </div>
            <!-- Feature 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa-solid fa-tractor"></i></div>
                    <h4 class="feature-title">Farm Fresh</h4>
                    <p class="feature-desc">Sourced directly from the finest organic farms across India.</p>
                </div>
            </div>
            <!-- Feature 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="feature-title">Hygienic Packing</h4>
                    <p class="feature-desc">Packed under strict quality controls to retain natural oils and aroma.</p>
                </div>
            </div>
            <!-- Feature 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa-solid fa-truck-fast"></i></div>
                    <h4 class="feature-title">Pan-India Delivery</h4>
                    <p class="feature-desc">Fast, secure, and reliable delivery right to your doorstep.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- WHY CHOOSE US SECTION END -->

<!-- PRODUCTS PRICING SECTION START -->
<section class="products-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <span class="section-subtitle">Shop Spices</span>
            <h2 class="section-title">Explore Our Pricing</h2>
        </div>

        <div class="row g-4 mt-2">
            <!-- Product 1 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-card">
                    <div class="product-img-wrapper">
                        <img src="assets/images/products/cumin seeds.webp" alt="Cumin Seeds">
                    </div>
                    <div class="product-body">
                        <h4 class="product-title">Premium Cumin Seeds</h4>
                        <div class="product-price">₹350 / kg <span>₹420</span></div>
                        <a href="product-details.php?id=1" class="btn-details">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-card">
                    <div class="product-img-wrapper">
                        <img src="assets/images/products/castor.webp" alt="Cloves">
                    </div>
                    <div class="product-body">
                        <h4 class="product-title">Castor</h4>
                        <div class="product-price">₹1,150 / kg <span>₹1,300</span></div>
                        <a href="product-details.php?id=2" class="btn-details">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-card">
                    <div class="product-img-wrapper">
                        <img src="assets/images/products/fennel.webp" alt="Coriander Seeds">
                    </div>
                    <div class="product-body">
                        <h4 class="product-title">Fennel Seeds</h4>
                        <div class="product-price">₹280 / kg <span>₹320</span></div>
                        <a href="product-details.php?id=3" class="btn-details">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-card">
                    <div class="product-img-wrapper">
                        <img src="assets/images/products/psyllium.webp" alt="Black Pepper">
                    </div>
                    <div class="product-body">
                        <h4 class="product-title">Psyllium Husk</h4>
                        <div class="product-price">₹750 / kg <span>₹850</span></div>
                        <a href="product-details.php?id=4" class="btn-details">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- PRODUCTS PRICING SECTION END -->


<!-- =========================================
     TESTIMONIALS SECTION START
========================================= -->
<section class="testimonial-section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="section-subtitle">Client Reviews</span>
            <h2 class="section-title">What Our Customers Say</h2>
        </div>

        <div class="row g-4">
            <!-- Review 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <i class="fa-solid fa-quote-right quote-icon"></i>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="client-review">"The quality of their black pepper is unmatched. The aroma hits you as soon as you open the packet. Truly premium quality spices!"</p>
                    <div class="client-info">
                        <div class="client-avatar">R</div>
                        <div class="client-details">
                            <h5>Rahul Sharma</h5>
                            <span>Restaurant Owner</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <i class="fa-solid fa-quote-right quote-icon"></i>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p class="client-review">"I have been buying whole spices from Winnors for months now. The cinnamon sticks and cloves are incredibly fresh and flavorful."</p>
                    <div class="client-info">
                        <div class="client-avatar">A</div>
                        <div class="client-details">
                            <h5>Anjali Desai</h5>
                            <span>Home Chef</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <div class="testimonial-card">
                    <i class="fa-solid fa-quote-right quote-icon"></i>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="client-review">"Excellent packaging and timely delivery in Vadodara. You can easily tell the difference between store-bought and Winnors spices."</p>
                    <div class="client-info">
                        <div class="client-avatar">V</div>
                        <div class="client-details">
                            <h5>Vikram Patel</h5>
                            <span>Regular Customer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================
     BLOG SECTION START
========================================= -->
<section class="blog-section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="section-subtitle">Spice Insights</span>
            <h2 class="section-title">Latest From Our Blog</h2>
        </div>

        <div class="row g-4">
            <!-- Blog 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <div class="blog-img">
                        <span class="blog-date">12 Aug 2026</span>
                        <img src="https://images.pexels.com/photos/1340116/pexels-photo-1340116.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Turmeric Benefits">
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title">The Hidden Health Benefits of Pure Spices</h4>
                        <p class="blog-desc">Discover how authentic whole spices can boost your immunity and improve digestion naturally.</p>
                        <a href="#" class="blog-link">Read Article <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Blog 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <div class="blog-img">
                        <span class="blog-date">05 Aug 2026</span>
                        <img src="assets/images/products/mustard.webp" alt="Cooking with Whole Spices">
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title">Why Whole Spices are Better Than Powdered</h4>
                        <p class="blog-desc">Learn why chefs prefer whole spices for that perfect aroma and long-lasting flavor retention.</p>
                        <a href="#" class="blog-link">Read Article <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Blog 3 -->
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <div class="blog-card">
                    <div class="blog-img">
                        <span class="blog-date">28 Jul 2026</span>
                        <img src="https://images.pexels.com/photos/2802527/pexels-photo-2802527.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Sourcing Spices">
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title">From Farm to Kitchen: Our Sourcing Journey</h4>
                        <p class="blog-desc">Take a look at how we handpick the finest spices directly from Indian farmers for you.</p>
                        <a href="#" class="blog-link">Read Article <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="blog.php" class="btn btn-outline-premium text-dark border-dark">View All Posts</a>
        </div>
    </div>
</section>

<!-- =========================================
     NEWSLETTER CTA SECTION START
========================================= -->
<section class="cta-section">
    <div class="cta-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 cta-content">
                <h2>Join the Winnors Family</h2>
                <p>Subscribe to our newsletter and get exclusive discounts, secret recipes, and updates on our fresh spice arrivals.</p>
                <form class="cta-form">
                    <input type="email" class="form-control" placeholder="Enter your email address..." required>
                    <button type="submit" class="btn-subscribe">Subscribe Now</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>