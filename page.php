<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
include('admin/db-conn.php'); 

// 1. URL LOGIC & REDIRECTION (Error Prevention)
// Fetch from either $_GET['slug_url'] or $_GET['slug'] depending on how your .htaccess rewrites it
$rawSlug = $_GET['slug_url'] ?? $_GET['slug'] ?? '';
$slug = mysqli_real_escape_string($conn, trim((string)$rawSlug));

// Safe Base URL dynamically
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$safe_base_url = $protocol . $_SERVER['HTTP_HOST'] . '/';

if (empty($slug)) {
    header("Location: " . $safe_base_url . "404.php");
    exit();
}

// Fetch Page Data
$pageQuery = mysqli_query($conn, "SELECT * FROM custom_pages WHERE slug_url = '$slug' AND status = 1 LIMIT 1");
if (!$pageQuery || mysqli_num_rows($pageQuery) == 0) {
    header("Location: " . $safe_base_url . "404.php");
    exit();
}
$pageData = mysqli_fetch_assoc($pageQuery);

// 2. SEO & META VARIABLES SETUP
$cleanContentText = trim(preg_replace('/\s+/', ' ', strip_tags((string)$pageData['content'])));
$defaultMetaDesc = mb_substr($cleanContentText, 0, 160);

$meta_title = !empty($pageData['meta_title']) ? $pageData['meta_title'] : $pageData['page_title'] . " | Winnors Premium Spices";
$meta_desc  = !empty($pageData['meta_desc']) ? $pageData['meta_desc'] : $defaultMetaDesc;
$meta_key   = !empty($pageData['meta_key']) ? $pageData['meta_key'] : 'Winnors, Wholesale Spices, Premium Spices, Export';

$breadcrumb_name  = !empty($pageData['breadcrumb_title']) ? $pageData['breadcrumb_title'] : $pageData['page_title'];

// 3. SCHEMA MARKUP
$page_schema = trim($pageData['schema_markup'] ?? '');
if (empty($page_schema)) {
    $autoSchema = [
        "@context" => "https://schema.org",
        "@type" => "WholesaleStore",
        "name" => "Winnors Premium Whole Spices",
        "description" => $meta_desc,
        "telephone" => "+91-8448401339",
        "email" => "info@digitalwebtrackers.com",
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => "3, Plot No 23, Sasouli Rd",
            "addressLocality" => "Yamuna Nagar",
            "addressRegion" => "Haryana",
            "postalCode" => "135002",
            "addressCountry" => "IN"
        ]
    ];
    $page_schema = '<script type="application/ld+json">' . json_encode($autoSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}
$schema_code = $page_schema; 

// 4. INCLUDE HEADER
include 'includes/header.php';
?>

<style>
:root {
    --winnors-dark: #231911;
    /* Dark Coffee/Spices */
    --winnors-orange: #E67E22;
    /* Vibrant Orange */
    --winnors-orange-hover: #CF6F1A;
    --winnors-light-bg: #F9F7F5;
    /* Warm light background */
}

/* Winnors Content Page Styling */
.page-content-wrapper {
    background: #fff;
    padding: 40px;
    border-radius: 12px;
    border: 1px solid #f0e9e2;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
}

.winnors-trust-strip {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 15px;
    background: var(--winnors-dark);
    color: #ffffff;
    padding: 25px;
    border-radius: 10px;
    margin-bottom: 30px;
    text-align: center;
}

.winnors-trust-item strong {
    display: block;
    font-size: 1.8rem;
    font-weight: 800;
}

.winnors-trust-item strong span {
    color: var(--winnors-orange);
}

.winnors-trust-item small {
    color: #e3d5ca;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.8rem;
    font-family: 'Poppins', sans-serif;
}

.page-content-body {
    line-height: 1.8;
    color: #4a4a4a;
    font-size: 16px;
    font-family: 'Poppins', sans-serif;
}

.page-content-body h2 {
    color: var(--winnors-dark);
    font-size: 24px;
    font-weight: 700;
    margin-top: 30px;
    margin-bottom: 15px;
    border-left: 4px solid var(--winnors-orange);
    padding-left: 15px;
}

.page-content-body h3 {
    color: var(--winnors-dark);
    font-size: 20px;
    font-weight: 600;
    margin-top: 25px;
}

.page-content-body ul {
    padding-left: 20px;
}

.page-content-body ul li {
    margin-bottom: 10px;
}

/* Sidebar Widget Adjustments */
.sidebar-widget {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    margin-bottom: 30px;
    border: 1px solid #f0e9e2;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}

.sidebar-title {
    font-size: 18px;
    font-weight: 700;
    color: var(--winnors-dark);
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--winnors-orange);
}

.category-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.category-list li {
    margin-bottom: 12px;
    border-bottom: 1px dashed #e3d5ca;
    padding-bottom: 12px;
}

.category-list li:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.category-list a {
    color: #4a4a4a !important;
    text-decoration: none;
    font-weight: 500;
    font-family: 'Poppins', sans-serif;
    transition: color 0.2s;
    display: flex;
    justify-content: space-between;
}

.category-list a:hover {
    color: var(--winnors-orange) !important;
}

.btn-custom-solid {
    background-color: var(--winnors-orange);
    color: #fff;
    border-radius: 50px;
    padding: 12px 24px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: 0.3s;
}

.btn-custom-solid:hover {
    background-color: #fff;
    color: var(--winnors-dark);
}
</style>

<main class="main" style="background-color: var(--winnors-light-bg);">
    <!-- Breadcrumb using Winnors Styling -->
    <div class="site-breadcrumb"
        style="background-color: var(--winnors-light-bg); padding: 80px 0 40px; text-align: center; border-bottom: 1px solid #f0e9e2;">
        <div class="container">
            <h2 class="breadcrumb-title"
                style="color: var(--winnors-dark); font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 36px; margin-bottom: 10px;">
                <?= htmlspecialchars($breadcrumb_name) ?></h2>
            <ul class="breadcrumb-menu"
                style="list-style: none; padding: 0; margin: 0; display: flex; justify-content: center; align-items: center; gap: 10px; color: #6c757d; font-size: 15px;">
                <li><a href="./" style="color: var(--winnors-orange); text-decoration: none; font-weight: 600;">Home</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 11px; margin-left: 5px;"></i>
                </li>
                <li><a href="locations"
                        style="color: var(--winnors-orange); text-decoration: none; font-weight: 600;">Pages</a> <i
                        class="fa-solid fa-chevron-right" style="font-size: 11px; margin-left: 5px;"></i></li>
                <li class="active"><?= htmlspecialchars($breadcrumb_name) ?></li>
            </ul>
        </div>
    </div>

    <section class="py-5 pb-5">
        <div class="container">
            <div class="row g-5">
                <!-- Left Content -->
                <div class="col-lg-8">
                    <article class="page-content-wrapper">
                        <h1 class="mb-4 fw-bold"
                            style="color: var(--winnors-dark); font-family: 'Poppins', sans-serif;">
                            <?= htmlspecialchars($pageData['page_title']); ?></h1>

                        <!-- Winnors Stats Strip -->
                        <div class="winnors-trust-strip">
                            <div class="winnors-trust-item">
                                <strong>100<span>%</span></strong>
                                <small>Pure & Natural</small>
                            </div>
                            <div class="winnors-trust-item">
                                <strong>Pan-India</strong>
                                <small>Delivery</small>
                            </div>
                            <div class="winnors-trust-item">
                                <strong>Farm</strong>
                                <small>Fresh Sourcing</small>
                            </div>
                            <div class="winnors-trust-item">
                                <strong>Hygienic</strong>
                                <small>Packing Standards</small>
                            </div>
                        </div>

                        <!-- Dynamic Content Rendered Here -->
                        <div class="page-content-body">
                            <?= $pageData['content']; ?>
                        </div>
                    </article>
                </div>

                <!-- Right Sidebar -->
                <div class="col-lg-4">
                    <aside class="sidebar">

                        <!-- Other Custom Pages -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">Explore Other Pages</h3>
                            <ul class="category-list">
                                <?php
                                $otherPagesQuery = mysqli_query($conn, "SELECT page_title, slug_url FROM custom_pages WHERE status = 1 AND slug_url != '$slug' ORDER BY id DESC LIMIT 5");
                                if ($otherPagesQuery && mysqli_num_rows($otherPagesQuery) > 0) {
                                    while ($op = mysqli_fetch_assoc($otherPagesQuery)) {
                                        echo '<li><a href="page/'.rawurlencode($op['slug_url']).'">'.htmlspecialchars($op['page_title']).' <i class="fa fa-angle-right"></i></a></li>';
                                    }
                                } else {
                                    echo '<li class="text-muted">No other pages found.</li>';
                                }
                                ?>
                            </ul>
                        </div>

                        <!-- Products Category Widget -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">Our Spices</h3>
                            <ul class="category-list">
                                <?php
                                $catQuery = mysqli_query($conn, "SELECT categories, slug_url FROM categories WHERE status = 1 ORDER BY categories ASC LIMIT 6");
                                if ($catQuery && mysqli_num_rows($catQuery) > 0) {
                                    while ($c = mysqli_fetch_assoc($catQuery)) {
                                        echo '<li><a href="products.php?category='.htmlspecialchars($c['slug_url']).'">'.htmlspecialchars($c['categories']).' <i class="fa fa-angle-right"></i></a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>

                        <!-- Quick Contact Banner -->
                        <div class="sidebar-widget rounded-4 p-4 border-0 mt-4 text-center"
                            style="background-color: var(--winnors-dark); color: #fff;">
                            <i class="fa-solid fa-leaf fa-3x mb-3" style="color: var(--winnors-orange);"></i>
                            <h4 class="text-white fw-bold mb-3" style="font-family: 'Poppins', sans-serif;">Need Bulk
                                Supply?</h4>
                            <p class="small text-light mb-4" style="color: #e3d5ca !important;">Partner with Winnors for
                                premium quality whole spices and agricultural commodities globally.</p>
                            <a href="contact" class="btn-custom-solid w-100">Get a Quote</a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>