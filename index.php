<?php include ("includes/header.php") ?>
    <!-- Hero Section (Like design.jpg) -->
    <section class="hero-section d-flex align-items-center" style="background: linear-gradient(rgba(12, 27, 51, 0.8), rgba(12, 27, 51, 0.8)), url('spices-bg.jpg') center/cover; min-height: 80vh;">
        <div class="container text-center" data-aos="fade-up">
            <h4 style="color: var(--secondary-color);">Global Spice Exporters</h4>
            <h1 class="text-white display-3 fw-bold mb-4">Premium Whole Spices<br>From Farm to World</h1>
            <p class="text-light mb-4 lead">Authentic, aromatic, and 100% natural whole spices exported globally.</p>
            <a href="#products" class="btn btn-primary btn-lg me-3">View Products</a>
            <a href="#contact" class="btn btn-outline-light btn-lg">Contact Us</a>
        </div>
    </section>

    <!-- Products Section (Grid similar to design.jpg) -->
    <section id="products" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Premium <span>Products</span></h2>
                <p class="text-muted">High-quality whole spices sourced directly from the best farms.</p>
            </div>
            
            <div class="row g-4">
                <!-- Product Card 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 h-100" style="box-shadow: var(--box-shadow); transition: var(--transition-smooth);">
                        <!-- Need an image here -->
                        <div style="height: 200px; background: #e9ecef;" class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-leaf text-muted fa-3x"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold" style="color: var(--primary-color);">Cumin Seeds (Jeera)</h5>
                            <ul class="list-unstyled mt-3 mb-4 text-muted" style="font-size: 14px;">
                                <li><i class="fas fa-check text-warning me-2"></i> Grade A Quality</li>
                                <li><i class="fas fa-check text-warning me-2"></i> Moisture: < 9%</li>
                                <li><i class="fas fa-check text-warning me-2"></i> Origin: India</li>
                            </ul>
                            <a href="#" class="btn btn-sm w-100" style="background: var(--primary-color); color: white;">Read More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Duplicate this card for Black Pepper, Coriander Seeds, Cloves, etc. -->
            </div>
        </div>
    </section>

    <?php include ("includes/footer.php") ?>