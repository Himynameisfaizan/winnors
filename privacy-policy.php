<?php
include('admin/db-conn.php');

<<<<<<< HEAD
$contact_query = "SELECT * FROM contacts ORDER BY id DESC LIMIT 1";
$contact_result = mysqli_query($conn, $contact_query);
$contact = mysqli_fetch_assoc($contact_result);

$phone = !empty($contact['phone']) ? $contact['phone'] : '8980401525';
$email = !empty($contact['email']) ? $contact['email'] : 'ghatge.ghatge@gmail.com';

$pageTitle = "Privacy Policy | Winnors";
$meta_description = "Read the Privacy Policy of Winnors regarding personal data protection for our premium whole spices export.";
$meta_key = "privacy policy, winnors, spices export, whole spices";
=======
// SEO Meta Variables
$pageTitle = "Privacy Policy | Winnors";
$meta_description = "Read the Privacy Policy of Winnors regarding personal data protection for our premium whole spices, seeds, and agricultural commodities.";
$meta_key = "privacy policy, Winnors, spices export, premium whole spices, data protection";
>>>>>>> e20347991091b348b942f64ec5670ea2b95516da

include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<<<<<<< HEAD
<section class="py-5" style="background-color: #FAFAFA;">
    <div class="container">
        <div class="row g-5">
            
            <!-- LEFT COLUMN: Content -->
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border" style="border-color: #EAE3D9 !important;">
                    <h1 class="mb-3" style="color: #2C1E16; font-weight: 700;">Privacy Policy</h1>
                    <p class="text-muted mb-5"><strong>Last Updated:</strong> <?= date('F d, Y'); ?></p>

                    <p>Welcome to <strong>Winnors</strong>. We respect your privacy and are committed to protecting your personal data. This Privacy Policy outlines how we collect, use, process, and safeguard your information when you visit our website, purchase our premium whole spices, or use our export services.</p>

                    <h4 class="mt-5" style="color: #E67E22; font-size: 1.2rem;">1. Information We Collect</h4>
                    <p>To provide you with a seamless and secure shopping and wholesale inquiry experience, we collect the following types of information:</p>
                    <ul>
                        <li><strong>Personal Identification Information:</strong> Name, email address, phone number, and business details.</li>
                        <li><strong>Shipping & Billing Information:</strong> Delivery address, billing address, postal code, and destination country for domestic or global freight.</li>
                        <li><strong>Technical Data:</strong> IP address, browser type, time zone setting, and operating system when browsing our catalog.</li>
                    </ul>

                    <h4 class="mt-5" style="color: #E67E22; font-size: 1.2rem;">2. How We Use Your Information</h4>
                    <p>We use the information we collect for the following purposes:</p>
                    <ul>
                        <li>To process, pack, and fulfill your orders for whole spices, ensuring export-grade quality dispatch.</li>
                        <li>To communicate with you regarding order confirmations, shipping updates, and customer support.</li>
                        <li>To comply with food safety, agricultural export standards, and legal trade obligations.</li>
                    </ul>

                    <h4 class="mt-5" style="color: #E67E22; font-size: 1.2rem;">3. Secure Payment Processing</h4>
                    <p>We ensure that all financial transactions are handled through secure, PCI-DSS compliant third-party payment gateways. Your payment data is fully encrypted and protected under strict industry standards.</p>

                    <h4 class="mt-5" style="color: #E67E22; font-size: 1.2rem;">4. Contact Us</h4>
                    <p>If you have any questions or concerns regarding this Privacy Policy, please feel free to contact us:</p>
                    <div class="p-3 mt-3 rounded-3" style="background-color: #FDFBF7; border-left: 4px solid #E67E22;">
                        <p class="mb-1"><strong>Winnors</strong></p>
                        <p class="mb-1"><strong>Specialization:</strong> Exporters & Suppliers of Premium Whole Spices</p>
                        <p class="mb-1"><strong>Phone:</strong> +91-<?= htmlspecialchars($phone); ?></p>
                        <p class="mb-0"><strong>Email:</strong> <?= htmlspecialchars($email); ?></p>
=======
<style>
:root {
    --winnors-dark: #231911;
    --winnors-orange: #E67E22;
    --winnors-light-bg: #F9F7F5;
}
</style>

<!-- Main Policy Section -->
<section class="py-5" style="background-color: var(--winnors-light-bg);">
    <div class="container">
        <div class="row g-5">

            <!-- LEFT COLUMN: Policy Content -->
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded shadow-sm border" style="border-color: #f0e9e2 !important;">
                    <h1 class="mb-3" style="color: var(--winnors-dark); font-weight: 700;">Privacy Policy</h1>
                    <p class="text-muted mb-5"><strong>Last Updated:</strong> <?= date('F d, Y'); ?></p>

                    <p>Welcome to <strong>Winnors</strong>. We respect your privacy and are committed to protecting your
                        personal data. This Privacy Policy outlines how we collect, use, process, and safeguard your
                        information when you visit our website, purchase our premium agricultural commodities—including
                        <strong>whole spices, seeds, and agro products</strong>—or use our services.</p>

                    <h4 class="mt-5" style="color: var(--winnors-orange); font-size: 1.2rem;">1. Information We Collect
                    </h4>
                    <p>To provide you with a seamless and secure shopping and wholesale inquiry experience, we collect
                        the following types of information:</p>
                    <ul>
                        <li><strong>Personal Identification Information:</strong> Name, email address, phone number, and
                            business/company details (if applicable).</li>
                        <li><strong>Shipping & Billing Information:</strong> Delivery address, billing address, postal
                            code, and destination country for domestic or international freight.</li>
                        <li><strong>Technical Data:</strong> IP address, browser type, time zone setting, operating
                            system, and platform details when browsing our catalog.</li>
                        <li><strong>Trade & Bulk Order Compliance Data:</strong> For bulk and wholesale orders of spices
                            or seeds, we may collect business credentials, GST/VAT numbers, or import-export licenses as
                            required by trade regulations.</li>
                    </ul>

                    <h4 class="mt-5" style="color: var(--winnors-orange); font-size: 1.2rem;">2. How We Use Your
                        Information</h4>
                    <p>We use the information we collect for the following purposes:</p>
                    <ul>
                        <li>To process, pack, and fulfill your orders for spices and seeds, ensuring quality dispatch.
                        </li>
                        <li>To communicate with you regarding order confirmations, shipping updates, tracking, and
                            customer support.</li>
                        <li>To process online payments securely and prevent fraudulent activities.</li>
                        <li>To comply with food safety, agricultural export standards, and legal trade obligations.</li>
                        <li>To improve our website functionality, product display, and user experience.</li>
                    </ul>

                    <h4 class="mt-5" style="color: var(--winnors-orange); font-size: 1.2rem;">3. Secure Payment
                        Processing</h4>
                    <p>We do not store your credit card, debit card, UPI, or net banking details on our servers. All
                        financial transactions are handled through secure, PCI-DSS compliant third-party payment
                        gateways. Your payment data is fully encrypted and protected under strict industry standards.
                    </p>

                    <h4 class="mt-5" style="color: var(--winnors-orange); font-size: 1.2rem;">4. Third-Party Data
                        Sharing</h4>
                    <p>We do not sell or trade your personal information. However, trusted third parties assist us in
                        conducting our business operations, including:</p>
                    <ul>
                        <li><strong>Logistics & Shipping Partners:</strong> Courier companies, transport services, and
                            freight forwarders required to deliver your shipments safely.</li>
                        <li><strong>Payment Gateways:</strong> Authorized financial processors for transaction
                            management.</li>
                        <li><strong>Regulatory Authorities:</strong> Government or customs bodies when legally required
                            for export compliance.</li>
                    </ul>

                    <h4 class="mt-5" style="color: var(--winnors-orange); font-size: 1.2rem;">5. Cookies and Tracking
                        Technologies</h4>
                    <p>Our website uses cookies to enhance browsing efficiency, maintain session preferences, and
                        analyze site traffic. You can choose to disable cookies through your browser, though certain
                        features of the website may not function properly as a result.</p>

                    <h4 class="mt-5" style="color: var(--winnors-orange); font-size: 1.2rem;">6. Data Security</h4>
                    <p>We implement robust administrative, technical, and physical security measures, including SSL
                        encryption and secure firewalls, to protect your personal data against unauthorized access,
                        disclosure, or misuse.</p>

                    <h4 class="mt-5" style="color: var(--winnors-orange); font-size: 1.2rem;">7. Contact Us</h4>
                    <p>If you have any questions or concerns regarding this Privacy Policy, please feel free to contact
                        us:</p>
                    <div class="p-4 mt-3 rounded"
                        style="background-color: #F9F7F5; border-left: 4px solid var(--winnors-orange);">
                        <p class="mb-1"><strong>Winnors</strong></p>
                        <p class="mb-1"><strong>Specialization:</strong> Premium Whole Spices & Agricultural Export</p>
                        <p class="mb-1"><strong>Phone:</strong> +91 8448401339</p>
                        <p class="mb-1"><strong>Address:</strong> 3, Plot No 23, Sasouli Rd, Yamuna Nagar, Haryana
                            135002, India</p>
                        <p class="mb-0"><strong>Email:</strong> info@digitalwebtrackers.com</p>
>>>>>>> e20347991091b348b942f64ec5670ea2b95516da
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Sidebar Widgets -->
            <div class="col-lg-4">
<<<<<<< HEAD
                <div class="sidebar-widgets position-sticky" style="top: 20px;">
                    <div class="widget-box bg-white p-4 rounded-4 shadow-sm border mb-4" style="border-color: #EAE3D9 !important;">
                        <h5 class="fw-bold mb-3 border-bottom pb-2" style="color: #2C1E16;">Search Products</h5>
                        <form action="products.php" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search spices..." required style="font-size: 0.9rem;">
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
=======
                <div class="sidebar-widgets position-sticky" style="top: 100px;">

                    <!-- Search Widget -->
                    <div class="widget-box bg-white p-4 rounded shadow-sm border mb-4"
                        style="border-color: #f0e9e2 !important;">
                        <h5 class="fw-bold mb-3 border-bottom pb-2" style="color: var(--winnors-dark);">Search Products
                        </h5>
                        <form action="products.php" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2 bg-light border-0"
                                placeholder="Search spices..." required style="font-size: 0.9rem;">
                            <button type="submit" class="btn text-white px-3"
                                style="background: var(--winnors-orange);"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <div class="widget-box bg-white p-4 rounded shadow-sm border mb-4"
                        style="border-color: #f0e9e2 !important;">
                        <h5 class="fw-bold mb-3 border-bottom pb-2" style="color: var(--winnors-dark);">Categories</h5>
                        <ul class="list-unstyled mb-0 category-list">
                            <?php
                            $catQuery = mysqli_query($conn, "SELECT * FROM categories WHERE status = 1 LIMIT 6");
                            if ($catQuery && mysqli_num_rows($catQuery) > 0) {
                                while ($catRow = mysqli_fetch_assoc($catQuery)) {
                            ?>
                            <li class="mb-2 pb-2 border-bottom" style="border-color: #f0e9e2 !important;">
                                <a href="products.php?category=<?= htmlspecialchars($catRow['slug_url']) ?>"
                                    class="text-decoration-none d-flex justify-content-between align-items-center text-muted"
                                    style="font-size: 0.95rem; transition: 0.3s;"
                                    onmouseover="this.style.color='#E67E22'" onmouseout="this.style.color='#6c757d'">
                                    <span><i class="fa-solid fa-angle-right me-2"
                                            style="font-size: 0.75rem; color: var(--winnors-orange);"></i>
                                        <?= htmlspecialchars($catRow['categories']) ?></span>
                                </a>
                            </li>
                            <?php
>>>>>>> e20347991091b348b942f64ec5670ea2b95516da
                                }
                            }
                            ?>
                        </ul>
                    </div>

<<<<<<< HEAD
                    <div class="widget-box rounded-4 shadow-sm text-center p-4 text-white" style="background: linear-gradient(135deg, #2C1E16 0%, #1a120d 100%);">
                        <div class="icon-wrap mb-3"><i class="fa-solid fa-headset fs-1 text-warning opacity-75"></i></div>
                        <h4 class="fw-bold mb-2 text-white">Need Help?</h4>
                        <p class="small mb-4 opacity-75">Contact our support team for any order assistance.</p>
                        <a href="contact.php" class="btn bg-white w-100 fw-bold shadow-sm mb-3" style="color: #2C1E16;">Contact Us</a>
                        <a href="tel:+91<?= htmlspecialchars($phone); ?>" class="text-white text-decoration-none small fw-bold"><i class="fa-solid fa-phone me-1"></i> +91-<?= htmlspecialchars($phone); ?></a>
                    </div>
=======
                    <!-- Request Quote Banner -->
                    <div class="widget-box rounded shadow-sm text-center p-4 text-white"
                        style="background: linear-gradient(135deg, var(--winnors-dark) 0%, #3a2a1c 100%);">
                        <div class="icon-wrap mb-3"><i class="fa-solid fa-seedling fs-1 text-white opacity-75"
                                style="color: var(--winnors-orange) !important;"></i></div>
                        <h4 class="fw-bold mb-2 text-white">Bulk Spices Order?</h4>
                        <p class="small mb-4" style="color: #e3d5ca;">Get premium quality export-grade commodities at
                            wholesale prices.</p>
                        <a href="contact.php" class="btn w-100 fw-bold shadow-sm mb-3"
                            style="background-color: var(--winnors-orange); color: #fff;">Request Quote</a>
                        <a href="tel:+918448401339" class="text-white text-decoration-none small fw-bold"><i
                                class="fa-solid fa-phone me-1" style="color: var(--winnors-orange);"></i> +91
                            8448401339</a>
                    </div>

>>>>>>> e20347991091b348b942f64ec5670ea2b95516da
                </div>
            </div>

        </div>
    </div>
</section>

<<<<<<< HEAD
<?php 
include 'includes/footer.php'; 
=======
<?php
include('includes/footer.php');
>>>>>>> e20347991091b348b942f64ec5670ea2b95516da
?>