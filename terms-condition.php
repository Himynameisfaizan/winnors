<?php
include('admin/db-conn.php');

$pageTitle = "Terms & Conditions | Winnors";
$meta_description = "Read the terms and conditions of Winnors for purchasing premium whole spices and seeds globally.";
$meta_key = "terms and conditions, Winnors, export terms, spices supplier";

include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<style>
:root {
    --winnors-dark: #231911;
    --winnors-orange: #E67E22;
    --winnors-light-bg: #F9F7F5;
}
</style>

<section class="py-5" style="background-color: var(--winnors-light-bg);">
    <div class="container">
        <div class="row g-5">

            <!-- LEFT COLUMN: Content -->
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded shadow-sm border" style="border-color: #f0e9e2 !important;">
                    <h1 class="mb-4" style="color: var(--winnors-dark); font-weight: 700;">Terms & Conditions</h1>
                    <p class="text-muted mb-5"><strong>Last Updated:</strong> <?= date('F d, Y'); ?></p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">1.
                        Introduction</h4>
                    <p>Welcome to <strong>Winnors</strong>. By browsing our website and purchasing our agricultural
                        commodities, premium whole spices, and seeds, you agree to abide by these Terms & Conditions.
                    </p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">2. Natural
                        Variations in Products</h4>
                    <p>We deal in natural agricultural produce (spices, seeds). Minor variations in color, size, aroma,
                        or texture may occur between harvest batches, which are natural characteristics and not defects.
                    </p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">3. Pricing
                        and Import Duties</h4>
                    <p>Domestic prices include applicable taxes unless specified. For international shipments, the buyer
                        is solely responsible for all destination customs duties, import taxes, and local levies.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">4.
                        Culinary Disclaimer</h4>
                    <p>Information on our website regarding spice benefits is for general culinary and informational
                        purposes and does not substitute medical advice.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">5.
                        Governing Law</h4>
                    <p>Any disputes arising from purchases or website usage shall be governed by the laws of India and
                        subject to local jurisdiction.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">6. Contact
                        Information</h4>
                    <div class="p-4 mt-3 rounded"
                        style="background-color: #F9F7F5; border-left: 4px solid var(--winnors-orange);">
                        <p class="mb-1"><strong>Winnors</strong></p>
                        <p class="mb-1"><strong>Email:</strong> info@digitalwebtrackers.com</p>
                        <p class="mb-1"><strong>Phone:</strong> +91 8448401339</p>
                        <p class="mb-0"><strong>Address:</strong> 3, Plot No 23, Sasouli Rd, Yamuna Nagar, Haryana
                            135002, India</p>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Sidebar Widgets -->
            <div class="col-lg-4">
                <div class="sidebar-widgets position-sticky" style="top: 100px;">
                    <div class="widget-box bg-white p-4 rounded shadow-sm border mb-4"
                        style="border-color: #f0e9e2 !important;">
                        <h5 class="fw-bold mb-3 border-bottom pb-2" style="color: var(--winnors-dark);">Search Products
                        </h5>
                        <form action="products.php" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2 bg-light border-0"
                                placeholder="Search..." required style="font-size: 0.9rem;">
                            <button type="submit" class="btn text-white px-3"
                                style="background: var(--winnors-orange);"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <div class="widget-box rounded shadow-sm text-center p-4 text-white"
                        style="background: linear-gradient(135deg, var(--winnors-dark) 0%, #3a2a1c 100%);">
                        <div class="icon-wrap mb-3"><i class="fa-solid fa-earth-americas fs-1 text-white opacity-75"
                                style="color: var(--winnors-orange) !important;"></i></div>
                        <h4 class="fw-bold mb-2 text-white">Wholesale Inquiries</h4>
                        <p class="small mb-4" style="color: #e3d5ca;">Get in touch for bulk orders and export pricing.
                        </p>
                        <a href="contact.php" class="btn w-100 fw-bold shadow-sm mb-3"
                            style="background-color: var(--winnors-orange); color: #fff;">Request Quote</a>
                        <a href="tel:+918448401339" class="text-white text-decoration-none small fw-bold"><i
                                class="fa-solid fa-phone me-1" style="color: var(--winnors-orange);"></i> +91
                            8448401339</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>