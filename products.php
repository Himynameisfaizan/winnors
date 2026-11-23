<?php
include ("admin/db-conn.php");
$pageTitle = "Shop Our Spices";
include 'includes/header.php';
include 'includes/breadcrumb.php';
// include 'db_connection.php'; // Make sure your DB connection is active

// --- Pagination Logic ---
$limit = 12; // 12 products per page (perfect for a 4-column layout)
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// 1. Get total number of active products to calculate total pages
$total_query = "SELECT COUNT(id) AS total FROM products WHERE status = 1"; //[cite: 1]
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_products = $total_row['total'];
$total_pages = ceil($total_products / $limit);

// 2. Fetch active products for the current page
$product_query = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC LIMIT $offset, $limit"; //[cite: 1]
$product_result = mysqli_query($conn, $product_query);

// 3. Fetch WhatsApp number from contacts table for the WhatsApp button
$contact_query = "SELECT wp_number FROM contacts LIMIT 1"; //[cite: 1]
$contact_result = mysqli_query($conn, $contact_query);
$contact_row = mysqli_fetch_assoc($contact_result);

// Formatting WhatsApp number
$wa_number = !empty($contact_row['wp_number']) ? preg_replace('/[^0-9]/', '', $contact_row['wp_number']) : '';
if (!empty($wa_number) && strlen($wa_number) == 10) {
    $wa_number = "91" . $wa_number; // Add country code
}
?>

<!-- Add Custom CSS for Premium Redesign & Pagination -->
<style>
.shop-section {
    padding: 80px 0;
    background-color: #FAFAFA;
}

/* Premium Card Design */
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

/* Fixed Image Wrapper */
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

/* Card Body */
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

/* View Details Link */
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

/* Action Buttons Area */
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

/* Pagination Styling */
.custom-pagination .page-link {
    color: #2C1E16;
    border-color: #EAE3D9;
    margin: 0 4px;
    border-radius: 6px;
}

.custom-pagination .page-item.active .page-link {
    background-color: #E67E22;
    border-color: #E67E22;
    color: white;
}
</style>

<section class="shop-section">
    <div class="container">

        <!-- Showing Results Info -->
        <div class="d-flex justify-content-between align-items-center mb-5 reveal">
            <p class="text-muted mb-0">Showing page <?php echo $page; ?> of <?php echo $total_pages ?: 1; ?> (Total
                <?php echo $total_products; ?> products)</p>
        </div>
        <div class="row g-4 mb-5">
            <?php
            if ($product_result && mysqli_num_rows($product_result) > 0) {
                $counter = 0;
                while ($row = mysqli_fetch_assoc($product_result)) {
                    
                    $imagePath = "admin/assets/img/uploads/" . $row['pro_img']; 
                    $delay = ($counter % 4) * 0.1; 
                    
                    // Fetch and clean the short description
                    $short_desc = !empty($row['short_desc']) ? strip_tags($row['short_desc']) : '';
                    
                    // Pre-filled WhatsApp Message
                    $wa_msg = urlencode("Hello, I am interested in knowing more about your " . $row['pro_name'] . ". Can you please share the quote?"); 
            ?>

            <!-- Dynamic Product Card -->
            <div class="col-lg-3 col-md-6 col-sm-6 reveal" style="transition-delay: <?php echo $delay; ?>s;">
                <div class="premium-product-card h-100 d-flex flex-column"
                    style="box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-radius: 8px; overflow: hidden; background: #fff;">
                    <div class="card-img-box" style="height: 200px; overflow: hidden;">
                        <a href="product/<?php echo urlencode($row['slug_url']); ?>" class="view-detail-link">
                            <img src="<?php echo htmlspecialchars($imagePath); ?>"
                                alt="<?php echo htmlspecialchars($row['pro_name']); ?>"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </a>
                    </div>
                    <div class="card-content d-flex flex-column flex-grow-1 p-3">
                        <a href="product/<?php echo urlencode($row['slug_url']); ?>" class="view-detail-link"
                            style="text-decoration:none;">
                            <h4 class="product-title fw-bold mb-2" style="color: #231911; font-size: 1.1rem;">
                                <?php echo htmlspecialchars($row['pro_name']); ?></h4>
                        </a>

                        <!-- Short Description (Restricted to 2 lines) -->
                        <?php if (!empty($short_desc)): ?>
                        <p class="product-short-desc text-muted mb-3"
                            style="font-size: 0.85rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; line-height: 1.4;">
                            <?php echo htmlspecialchars($short_desc); ?>
                        </p>
                        <?php endif; ?>

                        <div class="mt-auto">
                            <a href="product/<?php echo urlencode($row['slug_url']); ?>"
                                class="view-detail-link fw-bold d-inline-block mb-3"
                                style="color: #6c757d; font-size: 0.85rem; text-decoration: none;">View
                                Details <i class="fa-solid fa-arrow-right-long ms-1"></i></a>

                            <div class="action-buttons d-flex align-items-center gap-2">
                                <a href="contact.php?product=<?php echo urlencode($row['pro_name']); ?>"
                                    class="btn-quote flex-grow-1 text-center text-white"
                                    style="background-color: #231911; padding: 8px 12px; border-radius: 4px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">Request
                                    Quote</a>

                                <?php if(isset($wa_number) && !empty($wa_number)): ?>
                                <a href="https://wa.me/<?php echo htmlspecialchars($wa_number); ?>?text=<?php echo $wa_msg; ?>"
                                    target="_blank"
                                    class="btn-whatsapp text-white d-flex justify-content-center align-items-center"
                                    title="Chat on WhatsApp"
                                    style="background-color: #25D366; width: 40px; height: 40px; border-radius: 4px; text-decoration: none;">
                                    <i class="fa-brands fa-whatsapp fs-5"></i>
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
                echo "<div class='col-12'><p class='text-center'>Products will be updated soon!</p></div>";
            }
            ?>
        </div>

        <!-- Pagination UI -->
        <?php if ($total_pages > 1): ?>
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center custom-pagination reveal">

                        <!-- Previous Button -->
                        <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Prev</span>
                            </a>
                        </li>

                        <!-- Page Number Loops -->
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php endfor; ?>

                        <!-- Next Button -->
                        <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <?php endif; ?>

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