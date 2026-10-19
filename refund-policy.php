<?php
include('admin/db-conn.php');

$contact_query = "SELECT * FROM contacts ORDER BY id DESC LIMIT 1";
$contact_result = mysqli_query($conn, $contact_query);
$contact = mysqli_fetch_assoc($contact_result);

$phone = !empty($contact['phone']) ? $contact['phone'] : '8980401525';
$email = !empty($contact['email']) ? $contact['email'] : 'ghatge.ghatge@gmail.com';

$pageTitle = "Refund and Cancellation Policy | Winnors";
$meta_description = "Read the refund and cancellation policy of Winnors for premium whole spices orders.";
$meta_key = "refund policy, cancellation policy, winnors, spices export";

include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<section class="py-5" style="background-color: #FAFAFA;">
    <div class="container">
        <div class="row g-5">
            
            <!-- LEFT COLUMN: Content -->
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border" style="border-color: #EAE3D9 !important;">
                    <h1 class="mb-4" style="color: #2C1E16; font-weight: 700;">Refund and Cancellation Policy</h1>
                    <p class="text-muted mb-5"><strong>Last Updated:</strong> <?= date('F d, Y'); ?></p>

                    <p>At <strong>Winnors</strong>, we ensure the highest quality of our whole spices. Because we deal in consumable food products, our refund and cancellation policies are structured to comply with strict food safety, hygiene, and trade standards.</p>

                    <h3 class="mt-5 mb-3" style="color: #E67E22; font-size: 1.3rem;">Cancellation Policy</h3>
                    
                    <h4 class="mt-4" style="font-size: 1.1rem; color: #2C1E16; font-weight: 600;">1. Order Cancellation Before Dispatch</h4>
                    <p>You may cancel your order within <strong>24 hours</strong> of placing it, provided it has not yet been processed, packed, or dispatched from our facility. A full refund will be processed immediately upon valid request.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: #2C1E16; font-weight: 600;">2. Cancellation After Dispatch</h4>
                    <p>Due to the consumable nature of spices, orders <strong>cannot be cancelled</strong> once they have been handed over to our logistics partners or shipped.</p>
                    
                    <h4 class="mt-4" style="font-size: 1.1rem; color: #2C1E16; font-weight: 600;">3. Bulk & Wholesale Orders</h4>
                    <p>For custom-packaged or bulk export orders, cancellations are not permitted once sourcing and processing have commenced. Advance payments remain strictly non-refundable.</p>

                    <hr class="my-5" style="border-color: #EAE3D9;">

                    <h3 class="mb-3" style="color: #E67E22; font-size: 1.3rem;">Return and Refund Policy</h3>
                    
                    <h4 class="mt-4" style="font-size: 1.1rem; color: #2C1E16; font-weight: 600;">1. Eligibility for Returns & Refunds</h4>
                    <p>We <strong>do not accept general returns</strong> due to strict food safety regulations. However, replacements or refunds are applicable if:</p>
                    <ul>
                        <li>The product packaging was severely damaged or compromised during transit.</li>
                        <li>An incorrect product or quantity was delivered.</li>
                    </ul>
                    <p><em>Note: You must notify us within <strong>48 hours of delivery</strong> with unboxing video or photographic proof.</em></p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: #2C1E16; font-weight: 600;">2. Refund Timeline</h4>
                    <p>Approved refunds are credited back to the original payment method within <strong>5 to 7 business days</strong>.</p>
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
                        <h4 class="fw-bold mb-2 text-white">Need Help?</h4>
                        <p class="small mb-4 opacity-75">Contact our support team for any order assistance.</p>
                        <a href="contact.php" class="btn bg-white w-100 fw-bold shadow-sm mb-3" style="color: #2C1E16;">Contact Us</a>
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