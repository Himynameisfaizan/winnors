<?php
include 'includes/header.php';
include 'admin/db-conn.php';
?>

<!-- Hero Section Start -->
<section class="hero-slider">
    <div id="winnorsHeroSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#winnorsHeroSlider" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#winnorsHeroSlider" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#winnorsHeroSlider" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/2802527/pexels-photo-2802527.jpeg?auto=compress&cs=tinysrgb&w=1920&q=80"
                    alt="Premium Whole Spices">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <h1 class="hero-title">Premium <span>Whole Spices</span></h1>
                    <p class="hero-subtitle">Bringing nature's finest and most authentic flavors directly to your
                        kitchen.</p>
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
                    <p class="hero-subtitle">Carefully handpicked, sun-dried, and packed to preserve the true essence.
                    </p>
                    <div class="hero-buttons">
                        <a href="about.php" class="btn btn-premium">Our Story</a>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1340116/pexels-photo-1340116.jpeg?auto=compress&cs=tinysrgb&w=1920&q=80"
                    alt="Wholesale Spices">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <h1 class="hero-title">Your Trusted <span>Spice Partner</span></h1>
                    <p class="hero-subtitle">Top-grade whole spices for businesses and homes. Quality that speaks for
                        itself.</p>
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
                    <img src="assets/images/products/psyllium.webp" alt="Winnors Premium Spices"
                        class="img-fluid about-main-img">
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
                        At Winnors, we believe that the secret to a great meal lies in the purity of its ingredients.
                        Sourced directly from the finest farms, our whole spices are carefully handpicked, sun-dried,
                        and hygienically packed to retain their natural oils, rich aroma, and robust flavors.
                    </p>

                    <!-- Features -->
                    <ul class="feature-list">
                        <li><i class="fa-solid fa-check"></i> Premium Quality Whole Spices</li>
                        <li><i class="fa-solid fa-check"></i> No Artificial Colors or Preservatives</li>
                        <li><i class="fa-solid fa-check"></i> Rich in Natural Essential Oils</li>
                    </ul>

                    <!-- Button (Uses the premium button class from Hero Section) -->
                    <a href="about.php" class="btn btn-premium mt-2">Discover Our Story <i
                            class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- About Section End -->

<?php
// Assuming your database connection is stored in $conn
// include 'db_connection.php'; 

// Fetch 3 services from the services table
$query = "SELECT * FROM services ORDER BY id DESC LIMIT 3";
$result = mysqli_query($conn, $query);
?>

<!-- Services Section Start -->
<section class="services-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <span class="section-subtitle">Our Offerings</span>
            <h2 class="section-title">Our Premium Services</h2>
        </div>

        <div class="row g-4">

            <?php
            // Check if services exist
            if (mysqli_num_rows($result) > 0) {
                // Loop through each service
                while ($row = mysqli_fetch_assoc($result)) {

                    // Construct the image path. Adjust 'uploads/' depending on where service images are stored
                    $imagePath = "admin/assets/img/uploads/" . $row['img_path'];

            ?>
                    <!-- Dynamic Service Card -->
                    <div class="col-lg-4 col-md-6">
                        <!-- Maintained your original CSS classes ('spice-card' etc.) so the design doesn't break -->
                        <div class="spice-card">
                            <div class="card-img-wrapper">
                                <span class="badge-premium">Premium</span>
                                <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($row['service_name']); ?>">
                            </div>
                            <div class="spice-card-body">
                                <!-- Fetching service name -->
                                <h4 class="spice-card-title"><?php echo htmlspecialchars($row['service_name']); ?></h4>

                                <!-- Fetching short description directly from the table -->
                                <p class="spice-card-desc"><?php echo htmlspecialchars($row['short_desc']); ?></p>

                                <div class="spice-card-footer">
                                    <!-- Passing the service 'id' in URL for the details page -->
                                    <a href="service-details.php?id=<?php echo $row['id']; ?>" class="view-link">View Details <i class="fa-solid fa-arrow-right"></i></a>
                                    <a href="contact.php" class="btn-quote">Get Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                } // End while loop
            } else {
                // Fallback message if no services are found
                echo "<div class='col-12'><p class='text-center'>Services updating soon!</p></div>";
            }
            ?>

        </div>

        <!-- View All Button -->
        <div class="text-center mt-5">
            <a href="services.php" class="btn btn-premium">Explore All Services <i class="fa-solid fa-arrow-right ms-2"></i></a>
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

<?php
$query = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC LIMIT 4";
$result = mysqli_query($conn, $query);
?>

<section class="related-products-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center mb-5">
            <span class="section-subtitle" style="color: #E67E22; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Shop Spices</span>
            <h2 class="section-title">Explore Our Products</h2>
            <div style="width: 50px; height: 3px; background-color: #E67E22; margin: 10px auto 0;"></div>
        </div>

        <div class="row g-4">
            <?php
            // Check if products exist in the database
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Construct the image path. Adjust if necessary.
                    $imagePath = "admin/assets/img/uploads/" . $row['pro_img'];
            ?>
                    <!-- Dynamic Product Card -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="shop-card">
                            <div class="shop-img-wrapper">
                                <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($row['pro_name']); ?>">
                            </div>
                            <div class="shop-card-body">
                                <h4 class="shop-title-sm"><?php echo htmlspecialchars($row['pro_name']); ?></h4>
                                <a href="product-details.php?slug=<?php echo urlencode($row['slug_url']); ?>" class="btn-view-details">View Details</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='col-12'><p class='text-center'>New products arriving soon!</p></div>";
            }
            ?>
        </div>

    </div>
</section>

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
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i>
                    </div>
                    <p class="client-review">"The quality of their black pepper is unmatched. The aroma hits you as soon
                        as you open the packet. Truly premium quality spices!"</p>
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
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p class="client-review">"I have been buying whole spices from Winnors for months now. The cinnamon
                        sticks and cloves are incredibly fresh and flavorful."</p>
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
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i>
                    </div>
                    <p class="client-review">"Excellent packaging and timely delivery in Vadodara. You can easily tell
                        the difference between store-bought and Winnors spices."</p>
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
<?php
// Assuming your database connection is stored in $conn
// include 'db_connection.php'; 

// Fetch 3 latest published blogs from the database
$blog_query = "SELECT * FROM blogs WHERE status = 'published' ORDER BY created_at DESC LIMIT 3";
$blog_result = mysqli_query($conn, $blog_query);
?>

<section class="blog-section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="section-subtitle">Spice Insights</span>
            <h2 class="section-title">Latest From Our Blog</h2>
        </div>

        <div class="row g-4">

            <?php
            // Check if published blogs exist
            if (mysqli_num_rows($blog_result) > 0) {
                while ($row = mysqli_fetch_assoc($blog_result)) {

                    // 1. Format the date to match your design (e.g., "12 Aug 2026")
                    $blogDate = date('d M Y', strtotime($row['created_at']));

                    // 2. Construct the image path. Adjust 'admin/assets/img/uploads/blogs/' to your actual folder structure
                    $imagePath = "admin/assets/img/uploads/" . $row['image'];

                    // 3. Create a short excerpt from the main content
                    $excerpt = strip_tags($row['content']);
                    if (strlen($excerpt) > 90) {
                        $excerpt = substr($excerpt, 0, 90) . '...';
                    }
            ?>
                    <!-- Dynamic Blog Card -->
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <div class="blog-img">
                                <span class="blog-date"><?php echo $blogDate; ?></span>
                                <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                            </div>
                            <div class="blog-content">
                                <h4 class="blog-title"><?php echo htmlspecialchars($row['title']); ?></h4>
                                <p class="blog-desc"><?php echo htmlspecialchars($excerpt); ?></p>

                                <!-- Using slug_url for SEO friendly routing -->
                                <a href="blog-details.php?slug=<?php echo urlencode($row['slug_url']); ?>" class="blog-link">Read Article <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
            <?php
                } // End while loop
            } else {
                // Fallback message if no blogs are found
                echo "<div class='col-12'><p class='text-center'>New articles coming soon!</p></div>";
            }
            ?>

        </div>

        <div class="text-center mt-5">
            <a href="blogs.php" class="btn btn-outline-premium text-dark border-dark">View All Posts</a>
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
                <p>Subscribe to our newsletter and get exclusive discounts, secret recipes, and updates on our fresh
                    spice arrivals.</p>
                <form class="cta-form">
                    <input type="email" class="form-control" placeholder="Enter your email address..." required>
                    <button type="submit" class="btn-subscribe">Subscribe Now</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>