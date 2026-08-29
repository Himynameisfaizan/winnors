<?php
include ('admin/db-conn.php');
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winnors - Premium Whole Spices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/include.css">
    <link rel="stylesheet" href="assets/style/about.css">
    <link rel="stylesheet" href="assets/style/product.css">
    <link rel="stylesheet" href="assets/style/services.css">
    <link rel="stylesheet" href="assets/style/blogs.css">
    <link rel="stylesheet" href="assets/style/contact.css">

</head>

<body>

   <?php

$top_footer_query = "SELECT * FROM contacts ORDER BY id DESC LIMIT 1";
// [cite: 1]
$top_footer_result = mysqli_query($conn, $top_footer_query);
$site_info = mysqli_fetch_assoc($top_footer_result);

// Fallback default variables if database table is empty
$address = !empty($site_info['address']) ? $site_info['address'] : '56 Usha Nagar, Nr Iskon Temple, Gotri Road, Vadodara 390021';
// [cite: 1]
$phone = !empty($site_info['phone']) ? $site_info['phone'] : '8980401525';
// [cite: 1]
$email = !empty($site_info['email']) ? $site_info['email'] : 'ghatge.ghatge@gmail.com';
// [cite: 1]
$facebook = !empty($site_info['facebook']) ? $site_info['facebook'] : '#';
// [cite: 1]
$instagram = !empty($site_info['instagram']) ? $site_info['instagram'] : '#';
// [cite: 1]
$twitter = !empty($site_info['twitter']) ? $site_info['twitter'] : '#';
// [cite: 1]
$linkedin = !empty($site_info['linkdin']) ? $site_info['linkdin'] : '#';
// [cite: 1]
?>

<!-- ================= Dynamic Topbar ================= -->
<div class="topbar d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-start">
                <span class="me-4"><i class="fa-solid fa-location-dot me-2 text-warning"></i> <?php echo htmlspecialchars($address); ?></span>
                <!-- [cite: 1] -->
                <span><i class="fa-solid fa-envelope me-2 text-warning"></i> <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a></span>
                <!-- [cite: 1] -->
            </div>
            <div class="col-md-4 text-end">
                <span><i class="fa-solid fa-phone me-2 text-warning"></i> <a href="tel:+91<?php echo preg_replace('/[^0-9]/', '', $phone); ?>">+91 <?php echo htmlspecialchars($phone); ?></a></span>
                <!-- [cite: 1] -->
            </div>
        </div>
    </div>
</div>

<!-- ================= Dynamic Footer ================= -->

    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="index.php">
                Winnors<span class="brand-dot">.</span>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="fa-solid fa-bars fs-3 text-dark"></span>
            </button>

            <!-- Nav Links -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'index.php') ? 'active' : ''; ?>"
                            href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'about.php') ? 'active' : ''; ?>"
                            href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'services.php') ? 'active' : ''; ?>"
                            href="services.php">Our Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'products.php') ? 'active' : ''; ?>"
                            href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'blogs.php') ? 'active' : ''; ?>"
                            href="blogs.php">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'contact.php') ? 'active' : ''; ?>"
                            href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Bootstrap JS CDN (Required for mobile toggle to work) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>