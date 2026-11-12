<?php
include('admin/db-conn.php');

$pageTitle = "Shipping and Delivery Policy | Winnors";
$meta_description = "Learn about domestic and international shipping options for premium whole spices and seeds by Winnors.";
$meta_key = "shipping policy, delivery policy, Winnors, export delivery, spice shipping";

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
                    <h1 class="mb-4" style="color: var(--winnors-dark); font-weight: 700;">Shipping and Delivery Policy
                    </h1>
                    <p class="text-muted mb-5"><strong>Last Updated:</strong> <?= date('F d, Y'); ?></p>

                    <h3 class="mt-5 mb-3" style="color: var(--winnors-orange); font-size: 1.3rem;">Shipping Policy</h3>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">1. Order
                        Processing & Dispatch</h4>
                    <p>Standard retail orders of spices are processed and dispatched within <strong>3 to 5 business
                            days</strong>. Bulk wholesale and international container exports follow custom schedules
                        based on documentation and phytosanitary processing.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">2.
                        Domestic Delivery (Within India)</h4>
                    <p>Standard delivery across India takes approximately <strong>5 to 7 business days</strong>
                        depending on the delivery location.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">3.
                        International Shipping & Exports</h4>
                    <p>International shipments are handled via air or sea freight. <strong>Note:</strong> The buyer is
                        fully responsible for destination country customs duties, import clearance, and local taxes.
                        Winnors provides all mandatory Indian export compliance documentation.</p>

                    <hr class="my-5" style="border-color: #f0e9e2;">

                    <h3 class="mb-3" style="color: var(--winnors-orange); font-size: 1.3rem;">Returns Policy</h3>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">1.
                        Non-Returnable Goods</h4>
                    <p>Due to stringent food safety and agricultural standards (FSSAI guidelines), <strong>we do not
                            accept standard returns</strong> on consumable items like seeds and spices once shipped.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">2. Damaged
                        or Incorrect Shipments</h4>
                    <p>Exceptions apply strictly if you receive wrong or transit-damaged items. Claims must be filed
                        within <strong>48 hours of receipt</strong> along with an unboxing video/photos.</p>
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
                        <div class="icon-wrap mb-3"><i class="fa-solid fa-truck-fast fs-1 text-white opacity-75"
                                style="color: var(--winnors-orange) !important;"></i></div>
                        <h4 class="fw-bold mb-2 text-white">Bulk Export Inquiry?</h4>
                        <p class="small mb-4" style="color: #e3d5ca;">Get reliable global shipping for wholesale
                            commodities.</p>
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