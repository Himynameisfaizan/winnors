<?php
// SEO ke liye proper 404 HTTP status code send karein
http_response_code(404);
include_once 'admin/db-conn.php';

if (file_exists('includes/header.php')) {
    include 'includes/header.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | Winnors</title>
    <meta name="description"
        content="The page you are looking for could not be found. Explore Winnors's premium export-quality Indian spices, seeds, and agricultural products.">
    <meta name="robots" content="noindex, follow">

    <style>
    :root {
        --winnors-dark: #2c1e16;
        /* Theme Dark Brown/Black */
        --winnors-dark-light: #443224;
        /* Secondary Dark */
        --winnors-orange: #e67e22;
        /* Theme Primary Orange Accent */
        --winnors-orange-hover: #d35400;
        /* Darker Orange for Hover */
        --winnors-bg-light: #fdfaf7;
        /* Soft Warm Background */
        --winnors-text-dark: #1e293b;
        --winnors-text-muted: #64748b;
    }

    .winnors-404-wrap {
        background-color: var(--winnors-bg-light);
        background-image:
            radial-gradient(circle at 85% 15%, rgba(230, 126, 34, 0.08), transparent 45%),
            radial-gradient(circle at 15% 85%, rgba(44, 30, 22, 0.05), transparent 45%);
        color: var(--winnors-text-dark);
        padding: 90px 20px;
        min-height: 72vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
        overflow: hidden;
        border-bottom: 4px solid var(--winnors-orange);
        font-family: 'Poppins', sans-serif;
    }

    .winnors-404-card {
        position: relative;
        z-index: 2;
        max-width: 700px;
        width: 100%;
        margin: 0 auto;
        background: #ffffff;
        border: 1px solid rgba(44, 30, 22, 0.08);
        border-top: 5px solid var(--winnors-dark);
        padding: 55px 45px;
        border-radius: 12px;
        box-shadow: 0 18px 40px rgba(44, 30, 22, 0.06);
    }

    @media (max-width: 576px) {
        .winnors-404-wrap {
            padding: 60px 15px;
        }

        .winnors-404-card {
            padding: 40px 22px;
        }
    }

    .winnors-404-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(230, 126, 34, 0.12);
        color: #c06313;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding: 7px 18px;
        border-radius: 50px;
        margin-bottom: 18px;
    }

    .winnors-404-code {
        font-size: clamp(5rem, 12vw, 7.5rem);
        font-weight: 900;
        line-height: 1;
        margin-bottom: 8px;
        color: var(--winnors-dark);
        text-shadow: 3px 3px 0 rgba(230, 126, 34, 0.2);
        letter-spacing: -2px;
    }

    .winnors-404-divider {
        width: 60px;
        height: 4px;
        background-color: var(--winnors-orange);
        margin: 0 auto 20px;
        border-radius: 2px;
    }

    .winnors-404-title {
        font-size: clamp(1.4rem, 3vw, 1.9rem);
        font-weight: 800;
        margin-bottom: 14px;
        color: var(--winnors-dark);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .winnors-404-desc {
        color: var(--winnors-text-muted);
        font-size: 1.02rem;
        margin-bottom: 32px;
        line-height: 1.65;
        max-width: 560px;
        margin-left: auto;
        margin-right: auto;
    }

    .winnors-404-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: center;
        margin-bottom: 35px;
    }

    .btn-winnors-primary {
        background-color: var(--winnors-orange);
        color: #ffffff !important;
        padding: 13px 28px;
        border-radius: 50px;
        /* Pill shape matching theme */
        font-weight: 600;
        font-size: 0.92rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 2px solid var(--winnors-orange);
    }

    .btn-winnors-primary:hover {
        background-color: var(--winnors-dark);
        border-color: var(--winnors-dark);
        color: #ffffff !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(230, 126, 34, 0.25);
    }

    .btn-winnors-outline {
        background-color: transparent;
        color: var(--winnors-dark) !important;
        padding: 13px 28px;
        border-radius: 50px;
        /* Pill shape matching theme */
        font-weight: 600;
        font-size: 0.92rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 2px solid rgba(44, 30, 22, 0.25);
    }

    .btn-winnors-outline:hover {
        background-color: var(--winnors-dark);
        border-color: var(--winnors-dark);
        color: #ffffff !important;
        transform: translateY(-2px);
    }

    .winnors-quick-links {
        padding-top: 22px;
        border-top: 1px solid rgba(44, 30, 22, 0.08);
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 18px;
        font-size: 0.92rem;
        font-weight: 500;
    }

    .winnors-quick-links span {
        color: #94a3b8;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.8px;
        font-weight: 600;
    }

    .winnors-quick-links a {
        color: var(--winnors-dark);
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .winnors-quick-links a:hover {
        color: var(--winnors-orange);
    }
    </style>
</head>

<body>

    <div class="winnors-404-wrap">
        <div class="winnors-404-card">
            <div class="winnors-404-badge">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error 404 • Page Not Found
            </div>

            <h1 class="winnors-404-code">404</h1>
            <div class="winnors-404-divider"></div>

            <h2 class="winnors-404-title">Oops! We Couldn't Find That Page</h2>
            <p class="winnors-404-desc">
                The spice, product, or page you are looking for might have been moved, renamed, or is
                temporarily unavailable. Explore our premium whole spices catalog or return to the homepage below.
            </p>

            <div class="winnors-404-actions">
                <a href="index.php" class="btn-winnors-primary">
                    <i class="fa fa-home" aria-hidden="true"></i> Back to Homepage
                </a>
                <a href="products.php" class="btn-winnors-outline">
                    <i class="fa fa-leaf" aria-hidden="true"></i> View Our Products
                </a>
            </div>

            <div class="winnors-quick-links">
                <span>Quick Links:</span>
                <a href="about.php">About Us</a>
                <a href="services.php">Our Services</a>
                <a href="blogs.php">Blogs</a>
                <a href="contact.php">Contact</a>
            </div>
        </div>
    </div>

    <?php 
    if (file_exists('includes/footer.php')) {
        include 'includes/footer.php';
    }
    ?>

</body>

</html>