<?php
include('admin/db-conn.php');

$contact_query = "SELECT * FROM contacts ORDER BY id DESC LIMIT 1";
$contact_result = mysqli_query($conn, $contact_query);
$contact = mysqli_fetch_assoc($contact_result);

$phone = !empty($contact['phone']) ? $contact['phone'] : '8980401525';
$email = !empty($contact['email']) ? $contact['email'] : 'ghatge.ghatge@gmail.com';

$pageTitle = "Terms & Conditions | Winnors";
$meta_description = "Read the terms and conditions of Winnors for purchasing premium whole spices.";
$meta_key = "terms and conditions, winnors, export terms";

include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<section class="py-5" style="background-color: #FAFAFA;">
    <div class="container">
        <div class="row g-5">
            
            <!-- LEFT COLUMN: Content -->
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border" style="border-color: #EAE3D9 !important;">
                    <h1 class="mb-4" style="color: #2C1E16; font-weight: 700;">Terms & Conditions</h1>
                    <p class="text-muted mb-5"><strong>Last Updated:</strong> <?= date('F d, Y'); ?></p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: #2C1E16; font-weight: 600;">1. Introduction</h4>
                    <p>Welcome to <strong>Winnors</strong>. By browsing our website and purchasing our agricultural commodities and whole spices, you agree to abide by these Terms & Conditions.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: #2C1E16; font-weight: 600;">2. Natural Variations in Products</h4>
                    <p>We deal in natural agricultural produce. Minor variations in color, size, aroma, or texture may occur between harvest batches, which are natural characteristics and not defects.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: #2C1E16; font-weight: 600;">3. Pricing and Import Duties</h4>
                    <p>Domestic prices include applicable taxes unless specified. For international shipments, the buyer is solely responsible for all destination customs duties, import taxes, and local levies.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: #2C1E16; font-weight: 600;">4. Governing Law</h4>
                    <p>Any disputes arising from purchases or website usage shall be governed by the laws of India and subject to local jurisdiction.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: #2C1E16; font-weight: 600;">5. Contact Information</h4>
                    <div class="p-3 mt-3 rounded-3" style="background-color: #FDFBF7; border-left: 4px solid #E67E22;">
                        <p class="mb-1"><strong>Winnors</strong></p>
                        <p class="mb-1"><strong>Email:</strong> <?= htmlspecialchars($email); ?></p>
                        <p class="mb-0"><strong>Phone:</strong> +91-<?= htmlspecialchars($phone); ?></p>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Sidebar Widgets -->
            <div class="col-lg-4">
                <div class="sidebar-widgets position-sticky" style="top: 20px;">
                    <div class="widget-box bg-white p-4 rounded-4 shadow-sm border mb-4" style="border-color: #EAE3D9 !important;">
                        <h5 class="fw-bold mb-3 border-bottom pb-2" style="color: #2C1E16;">Search Products</h5>
                        <form action="products.php" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search..." required style="font-size: 0.9rem;">
                            <button type="submit" class="btn text-white px-3" style="background: #2C1E16;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <div class="widget-box bg-white p-4 rounded-4 shadow-sm border mb-4" style="border-color: #EAE3D9 !important;">
                        <h5 class="fw-bold mb-3 border-bottom pb-2" style="color: #2C1E16;">Categories</h5>
                        <ul class="list-unstyled mb-0 category-list">
                            <?php
                            $catQuery = mysqli_query($conn, "SELECT * FROM categories WHERE status = 1");
                            if ($catQuery && mysqli_num_rows($catQuery) > 0) {
                                while($catRow = mysqli_fetch_assoc($catQuery)) {
                            ?>
                            <li class="mb-2 pb-2 border-bottom">
                                <a href="products.php?category=<?= htmlspecialchars($catRow['slug_url']) ?>" class="text-decoration-none d-flex justify-content-between align-items-center text-muted" style="font-size: 0.95rem;">
                                    <span><i class="fa-solid fa-angle-right me-2 text-warning" style="font-size: 0.75rem;"></i> <?= htmlspecialchars($catRow['categories']) ?></span>
                                </a>
                            </li>
                            <?php 
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="widget-box rounded-4 shadow-sm text-center p-4 text-white" style="background: linear-gradient(135deg, #2C1E16 0%, #1a120d 100%);">
                        <div class="icon-wrap mb-3"><i class="fa-solid fa-headset fs-1 text-warning opacity-75"></i></div>
                        <h4 class="fw-bold mb-2 text-white">Wholesale Inquiries</h4>
                        <p class="small mb-4 opacity-75">Get in touch for bulk orders and export pricing.</p>
                        <a href="contact.php" class="btn bg-white w-100 fw-bold shadow-sm mb-3" style="color: #2C1E16;">Request Quote</a>
                        <a href="tel:+91<?= htmlspecialchars($phone); ?>" class="text-white text-decoration-none small fw-bold"><i class="fa-solid fa-phone me-1"></i> +91-<?= htmlspecialchars($phone); ?></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php 
include 'includes/footer.php'; 
?>