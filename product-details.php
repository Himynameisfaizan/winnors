<?php
$pageTitle = "Premium Cumin Seeds";
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>


<!-- Top Details Area -->
<section class="details-section">
    <div class="container">
        <div class="row gx-lg-5 align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="product-gallery">
                    <img src="assets/images/products/cumin seeds.webp" alt="Cumin Seeds" class="main-image">
                </div>
            </div>
            <div class="col-lg-7">
                <h1 class="product-title">Premium Cumin Seeds (Jeera)</h1>
                <!-- <div class="product-price">₹350 / kg <del>₹420 / kg</del></div> -->
                <p class="short-desc">
                    Carefully harvested from the finest farms in Gujarat, our premium cumin seeds offer a robust, warm,
                    and earthy flavor. Essential for authentic Indian curries, tadkas, and spice blends. 100% pure and
                    unadulterated.
                </p>
                <div class="mb-4">
                    <strong>Availability:</strong> <span class="text-success"><i class="fa-solid fa-check-circle"></i>
                        In Stock</span><br>
                    <strong>Minimum Order:</strong> 5 Kg
                </div>
                <div class="d-flex gap-3">
                    <a href="contact.php" class="btn-lg-premium"><i class="fa-solid fa-paper-plane me-2"></i> Request
                        Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom Full Description Area -->
<section class="full-desc-section">
    <div class="container">
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
            <div class="tab-pane fade show active" id="desc" role="tabpanel">
                <h4 class="mb-3 text-dark">Why Choose Winnors Cumin Seeds?</h4>
                <p>Cumin (Jeera) is the heartbeat of Indian cooking, and at Winnors, we ensure you get the absolute
                    best. Our seeds are machine-cleaned and hand-sorted to remove all impurities, dust, and stems. They
                    are naturally sun-dried to lock in maximum essential oils, guaranteeing a strong aroma as soon as
                    they hit the hot oil (tadka).</p>
                <p>Whether you are a restaurant owner, a caterer, or a home chef, our wholesale premium cumin guarantees
                    consistency in flavor, rich color, and perfect digestion benefits.</p>
                <ul class="mt-3">
                    <li>100% Machine Cleaned & Sortex Quality</li>
                    <li>High natural essential oil content</li>
                    <li>No artificial colors or preservatives added</li>
                </ul>
            </div>
            <!-- Additional Info Tab -->
            <div class="tab-pane fade" id="info" role="tabpanel">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th class="text-muted" style="width: 150px;">Origin</th>
                            <td>Gujarat, India</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Packaging</th>
                            <td>25kg PP Bags / 1kg Retail Pouches</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Shelf Life</th>
                            <td>12 Months from packing</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Moisture</th>
                            <td>Max 9%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Related Products Section -->
<section class="related-products-section">
    <div class="container">
        <h2 class="section-title">Related Products</h2>
        <div class="row g-4 mt-2">

            <!-- Related Product 1 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/castor.webp" alt="Castor">
                    </div>
                    <h4 class="shop-title-sm">Castor Seeds</h4>
                    <!-- <div class="shop-price-sm">₹1,150 / kg <del>₹1,300</del></div> -->
                    <a href="#" class="btn-view-details">View Details</a>
                </div>
            </div>

            <!-- Related Product 2 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/fennel.webp" alt="Fennel">
                    </div>
                    <h4 class="shop-title-sm">Fennel Seeds</h4>
                    <!-- <div class="shop-price-sm">₹280 / kg <del>₹320</del></div> -->
                    <a href="#" class="btn-view-details">View Details</a>
                </div>
            </div>

            <!-- Related Product 3 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/psyllium.webp" alt="Psyllium Husk">
                    </div>
                    <h4 class="shop-title-sm">Psyllium Husk</h4>
                    <!-- <div class="shop-price-sm">₹750 / kg <del>₹850</del></div> -->
                    <a href="#" class="btn-view-details">View Details</a>
                </div>
            </div>

            <!-- Related Product 4 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="shop-card">
                    <div class="shop-img-wrapper">
                        <img src="assets/images/products/mustard.webp" alt="Black Pepper">
                    </div>
                    <h4 class="shop-title-sm">Mustard Seeds</h4>
                    <!-- <div class="shop-price-sm">₹850 / kg <del>₹950</del></div> -->
                    <a href="#" class="btn-view-details">View Details</a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>