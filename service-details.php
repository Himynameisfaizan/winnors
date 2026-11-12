<?php
// Database connection and ID/slug handling
include 'admin/db-conn.php';

// Bug Fix: URL parameter se 'slug' fetch karein
$slug = isset($_GET['slug']) ? mysqli_real_escape_string($conn, $_GET['slug']) : '';

// 1. Fetch current service details based on slug
if (!empty($slug)) {
    // String slug hai, isliye is_numeric nahi lagega aur query mein column 'slug_url' use hoga
    $query = "SELECT * FROM services WHERE slug_url = '$slug' LIMIT 1";
} else {
    // Fallback to the latest service if no slug is provided
    $query = "SELECT * FROM services ORDER BY id DESC LIMIT 1";
}

$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $service = mysqli_fetch_assoc($result);
} else {
    echo "<div class='container py-5 text-center'><h2>Service not found.</h2><a href='services.php' class='btn btn-dark mt-3'>Back to Services</a></div>";
    include 'includes/footer.php';
    exit;
}

$pageTitle = $service['service_name'];
include 'includes/header.php';
include 'includes/breadcrumb.php';

// 2. Fetch contact info for phone number widget
$contact_query = "SELECT phone FROM contacts LIMIT 1";
// 
$contact_result = mysqli_query($conn, $contact_query);
$contact_row = mysqli_fetch_assoc($contact_result);
$phone_number = !empty($contact_row['phone']) ? $contact_row['phone'] : '8980401525';
?>

<section class="service-details-section py-5">
    <div class="container">
        <div class="row gx-lg-5">

            <!-- Main Content Area -->
            <div class="col-lg-8 mb-5 mb-lg-0 reveal">
                <?php if(!empty($service['img_path'])): ?>
                <img src="admin/assets/img/uploads/<?php echo htmlspecialchars($service['img_path']); ?>"
                    alt="<?php echo htmlspecialchars($service['service_name']); ?>"
                    class="service-main-img img-fluid rounded-4 mb-4 shadow-sm"
                    style="width: 100%; height: 420px; object-fit: cover;">
                <?php endif; ?>

                <h2 class="service-title fw-bold text-dark mb-3">
                    <?php echo htmlspecialchars($service['service_name']); ?></h2>

                <div class="service-desc text-muted mb-4" style="line-height: 1.8;">
                    <?php echo $service['long_desc']; ?>
                </div>

                <h3 class="service-subtitle fw-bold text-dark mt-4 mb-3">Why Partner With Us?</h3>
                <ul class="service-features list-unstyled">
                    <li class="mb-2"><i class="fa-solid fa-circle-check text-warning me-2"></i> <strong>Unmatched
                            Quality:</strong> 100% genuine sourcing adhering to strict export parameters.</li>
                    <li class="mb-2"><i class="fa-solid fa-circle-check text-warning me-2"></i> <strong>Reliable
                            Execution:</strong> Professional handling to ensure safe and timely delivery.</li>
                    <li class="mb-2"><i class="fa-solid fa-circle-check text-warning me-2"></i> <strong>Client-Centric
                            Approach:</strong> Tailored solutions designed to fit your exact business goals.</li>
                </ul>

                <h3 class="service-subtitle fw-bold text-dark mt-5 mb-4">Our Simple Process</h3>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="process-box p-4 border rounded-4 bg-light text-center h-100">
                            <div class="process-icon text-warning fs-2 mb-3"><i class="fa-solid fa-comments"></i></div>
                            <h5 class="fw-bold">1. Consultation</h5>
                            <p class="text-muted small mb-0">Discuss your requirements and specifications with our team.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="process-box p-4 border rounded-4 bg-light text-center h-100">
                            <div class="process-icon text-warning fs-2 mb-3"><i class="fa-solid fa-box-open"></i></div>
                            <h5 class="fw-bold">2. Verification</h5>
                            <p class="text-muted small mb-0">Review product standards and quality benchmarks prior to
                                dispatch.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="process-box p-4 border rounded-4 bg-light text-center h-100">
                            <div class="process-icon text-warning fs-2 mb-3"><i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <h5 class="fw-bold">3. Fulfillment</h5>
                            <p class="text-muted small mb-0">Fast, secure packaging and delivery of your requested
                                service order.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Area -->
            <div class="col-lg-4 reveal" style="transition-delay: 0.2s;">

                <!-- Services Menu Widget -->
                <div class="service-sidebar p-4 border rounded-4 bg-white mb-4 shadow-sm">
                    <h4 class="sidebar-title fw-bold mb-3 pb-2 border-bottom">All Services</h4>
                    <div class="sidebar-services d-flex flex-column gap-2">
                        <?php
                        // Fetch all services for the dynamic sidebar menu
                        $sidebar_query = "SELECT slug_url, service_name FROM services ORDER BY id DESC";
                        // 
                        $sidebar_result = mysqli_query($conn, $sidebar_query);
                        
                        if ($sidebar_result && mysqli_num_rows($sidebar_result) > 0) {
                            while ($side = mysqli_fetch_assoc($sidebar_result)) {
                                $is_active = ($side['slug_url'] == $service['slug_url']) ? 'active fw-bold text-warning' : 'text-dark';
                        ?>
                        <a href="service/<?php echo $side['slug_url']; ?>"
                            class="d-flex justify-content-between align-items-center text-decoration-none p-2 rounded transition-all <?php echo $is_active; ?>"
                            style="background: #F9F9F9;">
                            <span><?php echo htmlspecialchars($side['service_name']); ?></span>
                            <!--  -->
                            <i class="fa-solid fa-angle-right small"></i>
                        </a>
                        <?php 
                            }
                        } 
                        ?>
                    </div>
                </div>

                <!-- Contact & Assistance Widget -->
                <div class="service-sidebar p-4 rounded-4 shadow-sm" style="background-color: #2C1E16; color: #FFF;">
                    <h4 class="sidebar-title fw-bold mb-3" style="color: #FFF;">Need Assistance?</h4>
                    <p style="color: #D1C7BD; font-size: 0.95rem; margin-bottom: 20px;">Get in touch with our experts
                        for custom inquiries and professional support.</p>

                    <div class="d-flex align-items-center mb-4">
                        <i class="fa-solid fa-phone fs-4 text-warning me-3"></i>
                        <div>
                            <span style="font-size: 0.8rem; color: #A9A096; text-transform: uppercase;">Call Us
                                Now</span><br>
                            <a href="tel:+91<?php echo preg_replace('/[^0-9]/', '', $phone_number); ?>"
                                style="color: #FFF; text-decoration: none; font-weight: 700; font-size: 1.1rem;">+91
                                <?php echo htmlspecialchars($phone_number); ?></a>
                        </div>
                    </div>

                    <a href="contact" class="btn btn-warning w-100 fw-bold py-2 text-dark"><i
                            class="fa-solid fa-paper-plane me-2"></i> Get a Custom Quote</a>
                </div>

            </div>

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