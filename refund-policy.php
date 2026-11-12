<?php
include('admin/db-conn.php');

$pageTitle = "Refund and Cancellation Policy | Winnors";
$meta_description = "Read the refund and cancellation policy of Winnors for premium whole spices, seeds, and agricultural export orders.";
$meta_key = "refund policy, cancellation policy, Winnors spices export, return policy";

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
                    <h1 class="mb-4" style="color: var(--winnors-dark); font-weight: 700;">Refund and Cancellation
                        Policy</h1>
                    <p class="text-muted mb-5"><strong>Last Updated:</strong> <?= date('F d, Y'); ?></p>

                    <p>At <strong>Winnors</strong>, we ensure the highest quality of our agricultural commodities,
                        including premium whole spices and seeds. Because we deal in consumable food products, our
                        refund and cancellation policies are structured to comply with strict food safety, hygiene, and
                        trade standards.</p>

                    <h3 class="mt-5 mb-3" style="color: var(--winnors-orange); font-size: 1.3rem;">Cancellation Policy
                    </h3>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">1. Order
                        Cancellation Before Dispatch</h4>
                    <p>You may cancel your order within <strong>24 hours</strong> of placing it, provided it has not yet
                        been processed, packed, or dispatched from our facility. A full refund will be processed
                        immediately upon a valid request sent to our official support email.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">2.
                        Cancellation After Dispatch</h4>
                    <p>Due to the perishable and consumable nature of spices, orders <strong>cannot be
                            cancelled</strong> once they have been handed over to our logistics partners or shipped.</p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">3. Bulk &
                        Wholesale Orders</h4>
                    <p>For custom-packaged or bulk container export orders of seeds and spices, cancellations are not
                        permitted once sourcing and processing have commenced. Advance payments for bulk wholesale
                        orders remain strictly non-refundable.</p>

                    <hr class="my-5" style="border-color: #f0e9e2;">

                    <h3 class="mb-3" style="color: var(--winnors-orange); font-size: 1.3rem;">Return and Refund Policy
                    </h3>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">1.
                        Eligibility for Returns & Refunds</h4>
                    <p>We <strong>do not accept general returns</strong> (such as a change of mind) due to strict food
                        safety and hygiene regulations. However, replacements or refunds are applicable if:</p>
                    <ul>
                        <li>The product packaging was severely damaged or compromised during transit.</li>
                        <li>An incorrect product or quantity was delivered.</li>
                    </ul>
                    <p><em>Note: You must notify us within <strong>48 hours of delivery</strong> with an unboxing video
                            or photographic proof.</em></p>

                    <h4 class="mt-4" style="font-size: 1.1rem; color: var(--winnors-dark); font-weight: 600;">2. Refund
                        Timeline</h4>
                    <p>Approved refunds are credited back to the original payment method within <strong>5 to 7 business
                            days</strong>.</p>
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
                        <div class="icon-wrap mb-3"><i class="fa-solid fa-headset fs-1 text-white opacity-75"
                                style="color: var(--winnors-orange) !important;"></i></div>
                        <h4 class="fw-bold mb-2 text-white">Need Help?</h4>
                        <p class="small mb-4" style="color: #e3d5ca;">Contact our support team for any order assistance.
                        </p>
                        <a href="contact.php" class="btn w-100 fw-bold shadow-sm mb-3"
                            style="background-color: var(--winnors-orange); color: #fff;">Contact Us</a>
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