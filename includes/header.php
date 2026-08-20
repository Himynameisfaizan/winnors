<?php
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/include.css">

</head>

<body>

    <div class="topbar d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-start">
                    <span class="me-4"><i class="fa-solid fa-location-dot me-2 text-warning"></i> 56 Usha Nagar, Gotri Road, Vadodara</span>
                    <span><i class="fa-solid fa-envelope me-2 text-warning"></i> <a href="mailto:ghatge.ghatge@gmail.com">ghatge.ghatge@gmail.com</a></span>
                </div>
                <div class="col-md-4 text-end">
                    <span><i class="fa-solid fa-phone me-2 text-warning"></i> <a href="tel:+918980401525">+91 89804 01525</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="index.php">
                Winnors<span class="brand-dot">.</span>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa-solid fa-bars fs-3 text-dark"></span>
            </button>

            <!-- Nav Links -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'about.php') ? 'active' : ''; ?>" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'products.php') ? 'active' : ''; ?>" href="products.php">Our Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'products.php') ? 'active' : ''; ?>" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'products.php') ? 'active' : ''; ?>" href="products.php">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'contact.php') ? 'active' : ''; ?>" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Bootstrap JS CDN (Required for mobile toggle to work) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>