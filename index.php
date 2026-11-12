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
                        <img src="<?php echo htmlspecialchars($imagePath); ?>"
                            alt="<?php echo htmlspecialchars($row['service_name']); ?>">
                    </div>
                    <div class="spice-card-body">
                        <!-- Fetching service name -->
                        <h4 class="spice-card-title"><?php echo htmlspecialchars($row['service_name']); ?></h4>

                        <!-- Fetching short description directly from the table -->
                        <p class="spice-card-desc"><?php echo htmlspecialchars($row['short_desc']); ?></p>

                        <div class="spice-card-footer">
                            <!-- Passing the service 'id' in URL for the details page -->
                            <a href="service-details.php?id=<?php echo $row['id']; ?>" class="view-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
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
            <a href="services.php" class="btn btn-premium">Explore All Services <i
                    class="fa-solid fa-arrow-right ms-2"></i></a>
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
$product_query = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC LIMIT 4";
$product_result = mysqli_query($conn, $product_query);

$contact_query = "SELECT wp_number FROM contacts LIMIT 1";
$contact_result = mysqli_query($conn, $contact_query);
$contact_row = mysqli_fetch_assoc($contact_result);

$wa_number = !empty($contact_row['wp_number']) ? preg_replace('/[^0-9]/', '', $contact_row['wp_number']) : '';
if (!empty($wa_number) && strlen($wa_number) == 10) {
    $wa_number = "91" . $wa_number;
}
?>

<!-- Add Custom CSS for Premium Product Card Design -->
<style>
.related-products-section {
    padding: 80px 0;
    background-color: #FAFAFA;
}

.premium-product-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #EAE3D9;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
    transition: all 0.4s ease;
}

.premium-product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(230, 126, 34, 0.12);
    border-color: #E67E22;
}

.card-img-box {
    width: 100%;
    height: 240px;
    overflow: hidden;
    position: relative;
}

.card-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.premium-product-card:hover .card-img-box img {
    transform: scale(1.08);
}

.card-content {
    padding: 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.product-title {
    font-size: 1.3rem;
    font-weight: 800;
    color: #2C1E16;
    margin-bottom: 12px;
    line-height: 1.4;
}

.view-detail-link {
    font-size: 0.95rem;
    color: #7A6859;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s;
    display: inline-block;
    margin-bottom: 20px;
}

.view-detail-link:hover {
    color: #E67E22;
}

.action-buttons .btn-quote {
    background-color: #2C1E16;
    color: #ffffff;
    padding: 10px 15px;
    border-radius: 8px;
    text-align: center;
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s;
    border: 1px solid #2C1E16;
}

.action-buttons .btn-quote:hover {
    background-color: #E67E22;
    border-color: #E67E22;
}

.action-buttons .btn-whatsapp {
    background-color: #25D366;
    color: #ffffff;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    font-size: 1.4rem;
    text-decoration: none;
    transition: all 0.3s;
}

.action-buttons .btn-whatsapp:hover {
    background-color: #1EBE57;
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
}
</style>

<section class="related-products-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center mb-5">
            <span class="section-subtitle"
                style="color: #E67E22; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Shop
                Spices</span>
            <h2 class="section-title">Explore Our Products</h2>
            <div style="width: 50px; height: 3px; background-color: #E67E22; margin: 10px auto 0;"></div>
        </div>

        <div class="row g-4">
            <?php
            // Check if products exist in the database
            if ($product_result && mysqli_num_rows($product_result) > 0) {
                $counter = 0;
                while ($row = mysqli_fetch_assoc($product_result)) {
                    // Construct the image path using your admin asset directory structure
                    $imagePath = "admin/assets/img/uploads/" . $row['pro_img'];
                    // [cite: 1]
                    $delay = ($counter % 4) * 0.1;

                    // Pre-filled WhatsApp message
                    $wa_msg = urlencode("Hello, I am interested in knowing more about your " . $row['pro_name'] . ". Can you please share the quote?");
                    // [cite: 1]
            ?>
            <!-- Dynamic Product Card -->
            <div class="col-lg-3 col-md-6 col-sm-6 reveal" style="transition-delay: <?php echo $delay; ?>s;">
                <div class="premium-product-card h-100 d-flex flex-column">
                    <div class="card-img-box">
                        <img src="<?php echo htmlspecialchars($imagePath); ?>"
                            alt="<?php echo htmlspecialchars($row['pro_name']); ?>">
                        <!-- [cite: 1] -->
                    </div>
                    <div class="card-content">
                        <h4 class="product-title"><?php echo htmlspecialchars($row['pro_name']); ?></h4>
                        <!-- [cite: 1] -->

                        <div class="mt-auto">
                            <a href="product-details.php?slug=<?php echo urlencode($row['slug_url']); ?>"
                                class="view-detail-link">View Details <i
                                    class="fa-solid fa-arrow-right-long ms-1"></i></a>
                            <!-- [cite: 1] -->

                            <div class="action-buttons d-flex align-items-center gap-2">
                                <a href="contact.php?product=<?php echo urlencode($row['pro_name']); ?>"
                                    class="btn-quote flex-grow-1">Request Quote</a>
                                <!-- [cite: 1] -->

                                <?php if ($wa_number): ?>
                                <a href="https://wa.me/<?php echo $wa_number; ?>?text=<?php echo $wa_msg; ?>"
                                    target="_blank" class="btn-whatsapp" title="Chat on WhatsApp">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php
                    $counter++;
                }
            } else {
                echo "<div class='col-12'><p class='text-center'>New products arriving soon!</p></div>";
            }
            ?>
        </div>

    </div>
</section>

<!-- Scroll Animation Script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const reveals = document.querySelectorAll('.reveal');
    const appearOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15
    });
    reveals.forEach(reveal => appearOnScroll.observe(reveal));
});
</script>

<?php
// Database connection check karo agar alag se file hai
// include 'db_connection.php';

// Fetch countries from the 'country' table
$country_query = "SELECT * FROM country ORDER BY id ASC";
// [cite: 1]
$country_result = mysqli_query($conn, $country_query);
?>

<!-- ================= Global Export Markets Section Start ================= -->

<section class="export-markets-section">
    <div class="container">

        <!-- Section Header -->
        <div class="section-header text-center mb-5 reveal">
            <h2 class="section-title fw-bold" style="color: #2C1E16; letter-spacing: 0.5px;">OUR GLOBAL EXPORT MARKETS
            </h2>
            <div style="width: 60px; height: 3px; background-color: #E67E22; margin: 12px auto 0; border-radius: 2px;">
            </div>
        </div>

        <!-- Markets Grid -->
        <div class="row g-4 justify-content-center">
            <?php
            if ($country_result && mysqli_num_rows($country_result) > 0) {
                $counter = 0;
                while ($country = mysqli_fetch_assoc($country_result)) {
                    $flagPath = "admin/assets/img/uploads/" . $country['country_flag'];
                    $delay = ($counter % 4) * 0.1;

                    $is_featured = ($counter == 2) ? 'featured' : '';
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 reveal" style="transition-delay: <?php echo $delay; ?>s;">
                <div class="market-card <?php echo $is_featured; ?>"
                    title="<?php echo htmlspecialchars($country['country_desc']); ?>">
                    <div class="flag-wrapper">
                        <img src="<?php echo htmlspecialchars($flagPath); ?>"
                            alt="<?php echo htmlspecialchars($country['country_name']); ?> Flag">
                    </div>
                    <h4 class="country-name"><?php echo htmlspecialchars($country['country_name']); ?></h4>
                </div>
            </div>
            <?php
                    $counter++;
                }
            } else {
                echo "<div class='col-12 text-center'><p class='text-muted'>Export markets data will be updated soon.</p></div>";
            }
            ?>
        </div>

        <!-- Footer Footprint Text -->
        <div class="row mt-4">
            <div class="col-12 text-center reveal" style="transition-delay: 0.4s;">
                <p class="export-footer-text mb-0">
                    And <span>many more countries</span> across the globe. We are constantly expanding our footprint!
                </p>
            </div>
        </div>

    </div>
</section>

<!-- Scroll Animation Script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const reveals = document.querySelectorAll('.reveal');
    const appearOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15
    });
    reveals.forEach(reveal => appearOnScroll.observe(reveal));
});
</script>
<!-- ================= Global Export Markets Section End ================= -->

<!-- =========================================
     TESTIMONIALS SECTION START
========================================= -->
<?php
$testimonial_query = "SELECT * FROM testimonials ORDER BY id DESC LIMIT 3";
// [cite: 1]
$testimonial_result = mysqli_query($conn, $testimonial_query);
?>

<section class="testimonial-section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="section-subtitle">Client Reviews</span>
            <h2 class="section-title">What Our Customers Say</h2>
        </div>

        <div class="row g-4">
            <?php
            if ($testimonial_result && mysqli_num_rows($testimonial_result) > 0) {
                while ($row = mysqli_fetch_assoc($testimonial_result)) {
                    $clientName = htmlspecialchars($row['client_name']);
                    // [cite: 1]
                    $clientRole = !empty($row['client_title']) ? htmlspecialchars($row['client_title']) : (!empty($row['client_company']) ? htmlspecialchars($row['client_company']) : 'Valued Customer');
                    // [cite: 1]
                    $reviewText = htmlspecialchars($row['testimonial_text']);
                    // [cite: 1]
                    $rating = isset($row['rating']) ? (int)$row['rating'] : 5;
                    // [cite: 1]
                    $firstLetter = strtoupper(substr($clientName, 0, 1));
            ?>
            <!-- Dynamic Review Card -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card h-100 d-flex flex-column">
                    <i class="fa-solid fa-quote-right quote-icon"></i>
                    <div class="rating mb-3">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?php if ($i <= $rating): ?>
                        <i class="fa-solid fa-star text-warning"></i>
                        <?php else: ?>
                        <i class="fa-regular fa-star text-warning"></i>
                        <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <p class="client-review flex-grow-1"><?php echo $reviewText; ?></p>
                    <!-- [cite: 1] -->
                    <div class="client-info mt-4 d-flex align-items-center">
                        <div class="client-avatar rounded-circle bg-warning text-dark fw-bold d-flex align-items-center justify-content-center me-3"
                            style="width: 45px; height: 45px; font-size: 1.2rem;">
                            <?php echo $firstLetter; ?>
                        </div>
                        <div class="client-details">
                            <h5 class="mb-0 fw-bold text-dark"><?php echo $clientName; ?></h5>
                            <span class="text-muted small"><?php echo $clientRole; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<div class='col-12 text-center'><p class='text-muted'>No testimonials available right now.</p></div>";
            }
            ?>
        </div>
    </div>
</section>

<!-- =========================================
     BLOG SECTION START
========================================= -->
<?php

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
                        <img src="<?php echo htmlspecialchars($imagePath); ?>"
                            alt="<?php echo htmlspecialchars($row['title']); ?>">
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title"><?php echo htmlspecialchars($row['title']); ?></h4>
                        <p class="blog-desc"><?php echo htmlspecialchars($excerpt); ?></p>

                        <!-- Using slug_url for SEO friendly routing -->
                        <a href="blog-details.php?slug=<?php echo urlencode($row['slug_url']); ?>"
                            class="blog-link">Read Article <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
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