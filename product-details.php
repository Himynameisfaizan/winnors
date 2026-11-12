<?php
// Database connection and slug handling
include 'admin/db-conn.php';

$slug = isset($_GET['slug']) ? mysqli_real_escape_string($conn, $_GET['slug']) : '';

// 1. Fetch current product details based on slug
if (!empty($slug)) {
    $query = "SELECT * FROM products WHERE slug_url = '$slug' AND status = 1 LIMIT 1";
    // [cite: 1]
} else {
    // Fallback to the latest product if no slug is provided
    $query = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC LIMIT 1";
    // [cite: 1]
}

$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
} else {
    // Redirect or handle product not found
    echo "<div class='container py-5 text-center'><h2>Product not found.</h2><a href='shop.php' class='btn btn-dark mt-3'>Back to Shop</a></div>";
    include 'includes/footer.php';
    exit;
}

$pageTitle = $product['meta_title'] ? $product['meta_title'] : $product['pro_name'];
include 'includes/header.php';
include 'includes/breadcrumb.php';

// 2. Fetch WhatsApp number from contacts table
$contact_query = "SELECT wp_number FROM contacts LIMIT 1";
// [cite: 1]
$contact_result = mysqli_query($conn, $contact_query);
$contact_row = mysqli_fetch_assoc($contact_result);

$wa_number = !empty($contact_row['wp_number']) ? preg_replace('/[^0-9]/', '', $contact_row['wp_number']) : '';
if (!empty($wa_number) && strlen($wa_number) == 10) {
    $wa_number = "91" . $wa_number;
}

// Pre-filled WhatsApp message
$wa_msg = urlencode("Hello, I am interested in inquiring about " . $product['pro_name'] . ". Please share more details and wholesale quotes.");
// [cite: 1]
?>

<!-- Custom CSS for Premium Product Details Redesign -->
<style>
.product-details-section {
    padding: 80px 0;
    background: linear-gradient(to bottom, #FAFAFA, #FFFFFF);
}

/* Luxury Image Gallery Card */
.product-image-card {
    background: #ffffff;
    border: 1px solid #EAE3D9;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
    position: relative;
    padding: 20px;
}

.product-main-img {
    width: 100%;
    height: 420px;
    object-fit: cover;
    border-radius: 12px;
    transition: transform 0.5s ease;
}

.product-image-card:hover .product-main-img {
    transform: scale(1.03);
}

/* Product Info Meta */
.product-main-title {
    font-size: 2.4rem;
    font-weight: 800;
    color: #2C1E16;
    margin-bottom: 20px;
    line-height: 1.2;
}

.product-short-text {
    font-size: 1.05rem;
    color: #6C757D;
    line-height: 1.7;
    margin-bottom: 25px;
}

.meta-box {
    background: #FDFBF7;
    border: 1px solid #F0EAE1;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 30px;
}

.meta-item {
    font-size: 1rem;
    color: #2C1E16;
    margin-bottom: 10px;
}

.meta-item:last-child {
    margin-bottom: 0;
}

/* Premium Action Buttons */
.btn-action-quote {
    background-color: #2C1E16;
    color: #FFFFFF;
    padding: 14px 28px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #2C1E16;
}

.btn-action-quote:hover {
    background-color: #E67E22;
    border-color: #E67E22;
    color: #FFFFFF;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(230, 126, 34, 0.25);
}

.btn-action-whatsapp {
    background-color: #25D366;
    color: #FFFFFF;
    width: 52px;
    height: 52px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(37, 211, 102, 0.2);
}

.btn-action-whatsapp:hover {
    background-color: #1EBE57;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(37, 211, 102, 0.35);
    color: #FFFFFF;
}

/* Description & Tabs Section */
.product-tabs-section {
    padding: 60px 0 90px;
    background-color: #FFFFFF;
}

.custom-tabs .nav-link {
    color: #7A6859;
    font-weight: 700;
    border: none;
    padding: 12px 24px;
    background: #F8F5F0;
    border-radius: 8px;
    margin-right: 10px;
    transition: all 0.3s ease;
}

.custom-tabs .nav-link.active {
    background-color: #E67E22;
    color: #FFFFFF !important;
    box-shadow: 0 4px 15px rgba(230, 126, 34, 0.2);
}

.tab-content-box {
    background: #FAFAFA;
    border: 1px solid #EAE3D9;
    border-radius: 16px;
    padding: 35px;
    margin-top: 25px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.02);
}

/* Related Products Card Styling */
.related-section {
    padding: 70px 0 100px;
    background-color: #F8F5F0;
    border-top: 1px solid #EAE3D9;
}

.premium-shop-card {
    background: #FFFFFF;
    border-radius: 12px;
    border: 1px solid #EAE3D9;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
    transition: all 0.4s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.premium-shop-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(230, 126, 34, 0.12);
    border-color: #E67E22;
}

.related-img-box {
    width: 100%;
    height: 220px;
    overflow: hidden;
}

.related-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.premium-shop-card:hover .related-img-box img {
    transform: scale(1.08);
}
</style>

<!-- Top Details Area -->
<section class="product-details-section">
    <div class="container">
        <div class="row gx-lg-5 align-items-center">

            <!-- Left Column: Product Image Gallery -->
            <div class="col-lg-5 mb-5 mb-lg-0 reveal">
                <div class="product-image-card">
                    <img src="admin/assets/img/uploads/<?php echo htmlspecialchars($product['pro_img']); ?>"
                        alt="<?php echo htmlspecialchars($product['pro_name']); ?>" class="product-main-img">
                    <!-- [cite: 1] -->
                </div>
            </div>

            <!-- Right Column: Product Meta and Actions -->
            <div class="col-lg-7 reveal" style="transition-delay: 0.1s;">
                <span class="badge bg-soft-warning text-dark mb-2 px-3 py-2 rounded-pill"
                    style="background: #FCE8D5; color: #E67E22; font-weight: 700;">Export Quality</span>
                <h1 class="product-main-title"><?php echo htmlspecialchars($product['pro_name']); ?></h1>
                <!-- [cite: 1] -->

                <p class="product-short-text">
                    <?php echo strip_tags($product['short_desc']); ?>
                    <!-- [cite: 1] -->
                </p>

                <div class="meta-box">
                    <div class="meta-item">
                        <strong>Availability:</strong>
                        <?php if($product['stock'] > 0): ?>
                        <span class="text-success fw-bold"><i class="fa-solid fa-check-circle me-1"></i> In Stock
                            (<?php echo $product['stock']; ?> Units)</span>[cite: 1]
                        <?php else: ?>
                        <span class="text-danger fw-bold"><i class="fa-solid fa-times-circle me-1"></i> Made to Order /
                            Bulk Inquiry</span>
                        <?php endif; ?>
                    </div>
                    <div class="meta-item mt-2">
                        <strong>Brand / Standard:</strong>
                        <?php echo !empty($product['brand_name']) ? htmlspecialchars($product['brand_name']) : 'Winnors Export Grade'; ?>[cite:
                        1]
                    </div>
                    <div class="meta-item mt-2">
                        <strong>Category Code:</strong> #PROD-<?php echo htmlspecialchars($product['pro_id']); ?>[cite:
                        1]
                    </div>
                </div>

                <!-- Action Buttons: Request Quote & WhatsApp -->
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <a href="contact.php?product=<?php echo urlencode($product['pro_name']); ?>"
                        class="btn-action-quote flex-grow-1">
                        <i class="fa-solid fa-paper-plane me-2"></i> Request Quote
                    </a>

                    <?php if($wa_number): ?>
                    <a href="https://wa.me/<?php echo $wa_number; ?>?text=<?php echo $wa_msg; ?>" target="_blank"
                        class="btn-action-whatsapp" title="Chat on WhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Bottom Full Description & Tabs Area -->
<section class="product-tabs-section">
    <div class="container reveal">
        <ul class="nav nav-tabs custom-tabs" id="productTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button"
                    role="tab">Full Description</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button"
                    role="tab">Additional Information</button>
            </li>
        </ul>

        <div class="tab-content" id="productTabContent">
            <!-- Full Description Tab -->
            <div class="tab-pane fade show active tab-content-box" id="desc" role="tabpanel">
                <h4 class="mb-3 text-dark fw-bold">Product Overview & Features</h4>
                <div>
                    <?php echo $product['description']; ?>
                    <!-- [cite: 1] -->
                </div>
            </div>

            <!-- Additional Info Tab -->
            <div class="tab-pane fade tab-content-box" id="info" role="tabpanel">
                <h4 class="mb-3 text-dark fw-bold">Specifications & Standards</h4>
                <table class="table table-borderless align-middle mb-0">
                    <tbody>
                        <tr class="border-bottom">
                            <th class="text-muted py-3" style="width: 200px;">Product Name</th>
                            <td class="py-3 fw-semibold text-dark"><?php echo htmlspecialchars($product['pro_name']); ?>
                            </td>
                            <!-- [cite: 1] -->
                        </tr>
                        <tr class="border-bottom">
                            <th class="text-muted py-3">SKU / Code</th>
                            <td class="py-3 text-dark">
                                <?php echo !empty($product['sku']) ? htmlspecialchars($product['sku']) : 'WIN-' . $product['pro_id']; ?>
                            </td>
                            <!-- [cite: 1] -->
                        </tr>
                        <tr class="border-bottom">
                            <th class="text-muted py-3">Quality Standard</th>
                            <td class="py-3 text-dark">100% Sortex Cleaned & Export Grade</td>
                        </tr>
                        <tr>
                            <th class="text-muted py-3">Global Supply</th>
                            <td class="py-3 text-dark">Bulk Wholesale & Custom Packaging Available</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Related Products Section -->
<section class="related-section">
    <div class="container">
        <div class="section-header text-center mb-5 reveal">
            <span class="section-subtitle"
                style="color: #E67E22; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Discover
                More</span>
            <h2 class="section-title fw-bold" style="color: #2C1E16;">Related Products</h2>
            <div style="width: 50px; height: 3px; background-color: #E67E22; margin: 10px auto 0;"></div>
        </div>

        <div class="row g-4">
            <?php
            // current_product_id: 
            $current_id = $product['id'];
            $related_query = "SELECT * FROM products WHERE id != $current_id AND status = 1 ORDER BY RAND() LIMIT 4";
            // [cite: 1]
            $related_result = mysqli_query($conn, $related_query);
            
            if ($related_result && mysqli_num_rows($related_result) > 0) {
                $rel_counter = 0;
                while ($rel = mysqli_fetch_assoc($related_result)) {
                    $rel_delay = $rel_counter * 0.1;
            ?>
            <div class="col-lg-3 col-md-6 col-sm-6 reveal" style="transition-delay: <?php echo $rel_delay; ?>s;">
                <div class="premium-shop-card">
                    <div class="related-img-box">
                        <a href="product/<?php echo urlencode($rel['slug_url']); ?>"> <img
                                src="admin/assets/img/uploads/<?php echo htmlspecialchars($rel['pro_img']); ?>"
                                alt="<?php echo htmlspecialchars($rel['pro_name']); ?>">
                        </a>
                        <!-- [cite: 1] -->
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <a href="product/<?php echo urlencode($rel['slug_url']); ?>" style="text-decoration:none;" <h4
                            class=" fs-5 fw-bold text-dark mb-3"><?php echo htmlspecialchars($rel['pro_name']); ?>
                            </h4>
                        </a>
                        <!-- [cite: 1] -->
                        <div class="mt-auto">
                            <a href="product/<?php echo urlencode($rel['slug_url']); ?>"
                                class="text-decoration-none fw-bold" style="color: #E67E22;">
                                View Details <i class="fa-solid fa-arrow-right-long ms-1"></i>
                            </a>
                            <!-- [cite: 1] -->
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    $rel_counter++;
                }
            } else {
                echo "<div class='col-12 text-center'><p class='text-muted'>No related products found.</p></div>";
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

<?php include 'includes/footer.php'; ?>