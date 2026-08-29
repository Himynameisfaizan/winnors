<?php
$pageTitle = "Get In Touch";
include 'includes/header.php';
include 'includes/breadcrumb.php';
include 'admin/db-conn.php'; 

$success_msg = $error_msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_inquiry'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    // Insert into 'inquiries' table found in database
    $insert_query = "INSERT INTO inquiries (name, email, phone, subject, message, status) VALUES ('$name', '$email', '$phone', '$subject', '$message', 'new')";
    if (mysqli_query($conn, $insert_query)) {
        $success_msg = "Thank you! Your message has been successfully sent. We will contact you shortly.";
    } else {
        $error_msg = "Something went wrong. Please try again later.";
    }
}

// Fetch dynamic contact details from the 'contacts' table[cite: 1]
$contact_query = "SELECT * FROM contacts ORDER BY id DESC LIMIT 1";
// [cite: 1]
$contact_result = mysqli_query($conn, $contact_query);
$contact = mysqli_fetch_assoc($contact_result);

// Fallback values if database is empty
$address = !empty($contact['address']) ? $contact['address'] : '56 Usha Nagar, Nr Iskon Temple, Gotri Road, Vadodara 390021, Gujarat';
// [cite: 1]
$phone = !empty($contact['phone']) ? $contact['phone'] : '8980401525';
// [cite: 1]
$email = !empty($contact['email']) ? $contact['email'] : 'ghatge.ghatge@gmail.com';
// [cite: 1]
$working_hours = !empty($contact['working_hours']) ? $contact['working_hours'] : 'Mon - Sat: 9:00 AM to 7:00 PM';
// [cite: 1]

// Check if product parameter was passed from Request Quote button
$prefilled_product = isset($_GET['product']) ? htmlspecialchars($_GET['product']) : '';
$default_message = !empty($prefilled_product) ? "I am interested in requesting a quote/more details for: " . $prefilled_product : '';
?>

<!-- ================= Contact Info Cards Start ================= -->
<section class="contact-info-section py-5">
    <div class="container">
        
        <?php if($success_msg): ?>
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> <?php echo $success_msg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if($error_msg): ?>
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i> <?php echo $error_msg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row g-4">

            <!-- Address Card -->
            <div class="col-lg-4 col-md-6 reveal">
                <div class="info-card p-4 border rounded-4 bg-white h-100 shadow-sm text-center">
                    <div class="info-icon text-warning fs-1 mb-3"><i class="fa-solid fa-location-dot"></i></div>
                    <h4 class="fw-bold text-dark mb-3">Our Location</h4>
                    <p class="text-muted mb-0"><?php echo nl2br(htmlspecialchars($address)); ?></p>
                    <!-- [cite: 1] -->
                </div>
            </div>

            <!-- Phone Card -->
            <div class="col-lg-4 col-md-6 reveal" style="transition-delay: 0.1s;">
                <div class="info-card p-4 border rounded-4 bg-white h-100 shadow-sm text-center">
                    <div class="info-icon text-warning fs-1 mb-3"><i class="fa-solid fa-phone-volume"></i></div>
                    <h4 class="fw-bold text-dark mb-3">Call Us Directly</h4>
                    <p class="text-muted mb-1">Sales & Support:</p>
                    <a href="tel:+91<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="fw-bold fs-5 text-dark text-decoration-none">+91 <?php echo htmlspecialchars($phone); ?></a>
                    <!-- [cite: 1] -->
                    <p class="small text-muted mt-2 mb-0"><?php echo htmlspecialchars($working_hours); ?></p>
                    <!-- [cite: 1] -->
                </div>
            </div>

            <!-- Email Card -->
            <div class="col-lg-4 col-md-6 reveal" style="transition-delay: 0.2s;">
                <div class="info-card p-4 border rounded-4 bg-white h-100 shadow-sm text-center">
                    <div class="info-icon text-warning fs-1 mb-3"><i class="fa-solid fa-envelope-open-text"></i></div>
                    <h4 class="fw-bold text-dark mb-3">Email Us</h4>
                    <p class="text-muted mb-1">For inquiries & bulk orders:</p>
                    <a href="mailto:<?php echo htmlspecialchars($email); ?>" class="fw-bold text-dark text-decoration-none"><?php echo htmlspecialchars($email); ?></a>
                    <!-- [cite: 1] -->
                    <p class="small text-muted mt-2 mb-0">We reply within 24 hours.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= Contact Form & Map Start ================= -->
<section class="contact-form-section pb-5">
    <div class="container">
        <div class="row g-4 align-items-stretch">

            <!-- Left Side: Contact Form -->
            <div class="col-lg-6 reveal">
                <div class="form-wrapper p-4 p-md-5 border rounded-4 bg-white shadow-sm h-100">
                    <h2 class="form-title fw-bold text-dark mb-3">Send Us a Message</h2>
                    <p class="form-desc text-muted mb-4">Interested in wholesale pricing, private labeling, or need free samples? Fill out the form below and our team will get back to you.</p>

                    <form class="custom-form" action="" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control py-2" placeholder="Your Name *" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control py-2" placeholder="Email Address *" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" name="phone" class="form-control py-2" placeholder="Phone Number *" required>
                            </div>
                            <div class="col-md-6">
                                <select name="subject" class="form-select py-2" required>
                                    <option value="" selected disabled>Subject of Inquiry *</option>
                                    <option value="Bulk / Wholesale Order" <?php echo ($prefilled_product) ? 'selected' : ''; ?>>Bulk / Wholesale Order</option>
                                    <option value="Private Labeling">Private Labeling</option>
                                    <option value="General Information">General Information</option>
                                    <option value="Support / Complaint">Support / Complaint</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control" rows="5" placeholder="Write your message here..." required><?php echo htmlspecialchars($default_message); ?></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit_inquiry" class="btn btn-dark w-100 py-3 fw-bold rounded-pill text-uppercase tracking-wider">
                                    Send Message <i class="fa-solid fa-paper-plane ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Side: Google Map -->
            <div class="col-lg-6 reveal" style="transition-delay: 0.2s;">
                <div class="map-wrapper h-100 rounded-4 overflow-hidden shadow-sm border" style="min-height: 400px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14766.197368688842!2d73.1360183!3d22.3129529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc8a531b997c1%3A0xc33e5c94294b46b2!2sGotri%20Rd%2C%20Vadodara%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1691234567890!5m2!1sen!2sin"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Scroll Animation Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const reveals = document.querySelectorAll('.reveal');
        const appearOnScroll = new IntersectionObserver(function (entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        reveals.forEach(reveal => appearOnScroll.observe(reveal));
    });
</script>

<?php include 'includes/footer.php'; ?>