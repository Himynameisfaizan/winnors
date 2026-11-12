<?php
include_once('admin/db-conn.php');
$current_page = basename($_SERVER['PHP_SELF']);

// =========================================================================
// 1. DYNAMIC CANONICAL URL WITH 'www.' (Localhost & Live Server Ready)
// =========================================================================
$is_https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;
$is_localhost = in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1']) || strpos($_SERVER['HTTP_HOST'], 'localhost:') === 0;

// Live server par hamesha https:// रखेगा, localhost par current protocol
$protocol = (!$is_localhost) ? "https://" : ($is_https ? "https://" : "http://");

// Hostname mein agar 'www.' nahi hai to automatically 'www.' add karega
$raw_host = $_SERVER['HTTP_HOST'];
$canonical_host = (stripos($raw_host, 'www.') === 0) ? $raw_host : 'www.' . $raw_host;

// Request URI ko clean karna (index.php hatana aur फालतू tracking params hatana)
$request_uri = $_SERVER['REQUEST_URI'];
$uri_parts = explode('?', $request_uri, 2);
$clean_path = $uri_parts[0];

// Agar home page (index.php) hai to canonical URL ke end se 'index.php' hata dein
if (basename($clean_path) === 'index.php') {
    $clean_path = substr($clean_path, 0, -strlen('index.php'));
}

// Zaroori SEO query parameters (jaise slug ya id) ko canonical mein retain karna (agar clean URL nahi hai)
$allowed_params = ['slug', 'slug_url', 'id', 'pro_id', 'cate_id'];
$query_Array = [];
if (!empty($_GET)) {
    foreach ($allowed_params as $param) {
        if (!empty($_GET[$param])) {
            $query_Array[$param] = $_GET[$param];
        }
    }
}
$query_string = !empty($query_Array) ? '?' . http_build_query($query_Array) : '';
$canonical_url = $protocol . $canonical_host . $clean_path . $query_string;

// =========================================================================
// 2. DYNAMIC META & SCHEMA FETCHING LOGIC
// =========================================================================
// Default Fallback Values
$meta_title = isset($meta_title) ? $meta_title : 'Winnors - Premium Whole Spices';
$meta_desc  = isset($meta_desc)  ? $meta_desc  : 'Winnors is a trusted exporter of premium quality whole spices, seeds, and agricultural products from India to global markets.';
$meta_key   = isset($meta_key)   ? $meta_key   : 'whole spices export, indian spices supplier, agricultural products export, Winnors';
$schema_markup = isset($schema_markup) ? $schema_markup : '';

// URL Parameters Check (Detail Pages ke liye)
$slug   = isset($_GET['slug']) ? mysqli_real_escape_string($conn, trim($_GET['slug'])) : (isset($_GET['slug_url']) ? mysqli_real_escape_string($conn, trim($_GET['slug_url'])) : '');
$item_id = isset($_GET['id']) ? (int)$_GET['id'] : (isset($_GET['pro_id']) ? (int)$_GET['pro_id'] : 0);

$seo_matched = false;

// A. Check Dynamic Detail Pages (Products, Blogs, Services, Custom Pages, Categories, Policies)
if (!empty($slug) || $item_id > 0) {

    // 1. Product Detail Page
    if (stripos($current_page, 'product') !== false && $current_page !== 'products.php') {
        $where = !empty($slug) ? "slug_url = '$slug'" : "(id = $item_id OR pro_id = $item_id)";
        $res = mysqli_query($conn, "SELECT * FROM products WHERE $where LIMIT 1");
        if ($res && mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $meta_title    = !empty($row['meta_title']) ? $row['meta_title'] : $row['pro_name'] . ' | Winnors';
            $meta_desc     = !empty($row['meta_desc'])  ? $row['meta_desc']  : strip_tags($row['short_desc'] ?? '');
            $meta_key      = !empty($row['meta_key'])   ? $row['meta_key']   : $row['pro_name'];
            $schema_markup = $row['schema_markup'] ?? '';
            $seo_matched   = true;
        }
    }

    // 2. Blog Detail Page
    if (!$seo_matched && stripos($current_page, 'blog') !== false && !in_array($current_page, ['blog.php', 'blogs.php'])) {
        $where = !empty($slug) ? "slug = '$slug'" : "id = $item_id";
        $res = mysqli_query($conn, "SELECT * FROM blogs WHERE $where LIMIT 1");
        if ($res && mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $meta_title    = !empty($row['meta_title']) ? $row['meta_title'] : $row['title'] . ' | Winnors';
            $meta_desc     = !empty($row['meta_desc'])  ? $row['meta_desc']  : mb_substr(trim(strip_tags($row['content'] ?? '')), 0, 160);
            $meta_key      = !empty($row['meta_key'])   ? $row['meta_key']   : $row['title'];
            $schema_markup = $row['schema_markup'] ?? '';
            $seo_matched   = true;
        }
    }

    // 3. Service Detail Page
    if (!$seo_matched && stripos($current_page, 'service') !== false && $current_page !== 'services.php') {
        $where = !empty($slug) ? "slug_url = '$slug'" : "id = $item_id";
        $res = mysqli_query($conn, "SELECT * FROM services WHERE $where LIMIT 1");
        if ($res && mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $meta_title    = !empty($row['meta_title']) ? $row['meta_title'] : $row['service_name'] . ' | Winnors';
            $meta_desc     = !empty($row['meta_desc'])  ? $row['meta_desc']  : strip_tags($row['short_desc'] ?? '');
            $meta_key      = !empty($row['meta_key'])   ? $row['meta_key']   : $row['service_name'];
            $schema_markup = $row['schema_markup'] ?? '';
            $seo_matched   = true;
        }
    }

    // 4. Custom Pages (custom_pages table)
    if (!$seo_matched) {
        $where = !empty($slug) ? "slug_url = '$slug'" : "id = $item_id";
        $res = mysqli_query($conn, "SELECT * FROM custom_pages WHERE $where AND status = 1 LIMIT 1");
        if ($res && mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $meta_title    = !empty($row['meta_title']) ? $row['meta_title'] : $row['page_title'] . ' | Winnors';
            $meta_desc     = !empty($row['meta_desc'])  ? $row['meta_desc']  : mb_substr(trim(strip_tags($row['content'] ?? '')), 0, 160);
            $meta_key      = !empty($row['meta_key'])   ? $row['meta_key']   : $row['page_title'];
            $schema_markup = $row['schema_markup'] ?? '';
            $seo_matched   = true;
        }
    }

    // 5. Fallback: Agar clean URL routing se slug direct kisi product/blog/service/policy ka hai
    if (!$seo_matched && !empty($slug)) {
        // Check Products by slug
        $res = mysqli_query($conn, "SELECT * FROM products WHERE slug_url = '$slug' LIMIT 1");
        if ($res && mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $meta_title    = !empty($row['meta_title']) ? $row['meta_title'] : $row['pro_name'] . ' | Winnors';
            $meta_desc     = !empty($row['meta_desc'])  ? $row['meta_desc']  : strip_tags($row['short_desc'] ?? '');
            $meta_key      = !empty($row['meta_key'])   ? $row['meta_key']   : $row['pro_name'];
            $schema_markup = $row['schema_markup'] ?? '';
            $seo_matched   = true;
        }
        // Check Blogs by slug
        if (!$seo_matched) {
            $res = mysqli_query($conn, "SELECT * FROM blogs WHERE slug_url = '$slug' LIMIT 1");
            if ($res && mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $meta_title    = !empty($row['meta_title']) ? $row['meta_title'] : $row['title'] . ' | Winnors';
                $meta_desc     = !empty($row['meta_desc'])  ? $row['meta_desc']  : mb_substr(trim(strip_tags($row['content'] ?? '')), 0, 160);
                $meta_key      = !empty($row['meta_key'])   ? $row['meta_key']   : $row['title'];
                $schema_markup = $row['schema_markup'] ?? '';
                $seo_matched   = true;
            }
        }
        // Check Categories by slug
        if (!$seo_matched) {
            $res = mysqli_query($conn, "SELECT * FROM categories WHERE slug_url = '$slug' LIMIT 1");
            if ($res && mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $meta_title    = !empty($row['meta_title']) ? $row['meta_title'] : $row['categories'] . ' | Winnors';
                $meta_desc     = !empty($row['meta_desc'])  ? $row['meta_desc']  : $row['categories'];
                $meta_key      = !empty($row['meta_key'])   ? $row['meta_key']   : $row['categories'];
                $schema_markup = $row['schema_markup'] ?? '';
                $seo_matched   = true;
            }
        }
        // Check Policies by slug
        if (!$seo_matched) {
            $res = mysqli_query($conn, "SELECT * FROM policies WHERE slug = '$slug' LIMIT 1");
            if ($res && mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $meta_title    = $row['title'] . ' | Winnors';
                $meta_desc     = !empty($row['meta_description']) ? $row['meta_description'] : $row['title'];
                $meta_key      = !empty($row['meta_keywords'])    ? $row['meta_keywords']    : $row['title'];
                $seo_matched   = true;
            }
        }
    }
}

// B. Check Static Pages (`meta` & `page_schemas` tables)
if (!$seo_matched) {
    $escaped_page = mysqli_real_escape_string($conn, $current_page);
    // Note: Database mein 'blog.php' hai aur file 'blogs.php' hai, isliye dono check karenge
    $alt_page = ($current_page === 'blogs.php') ? 'blog.php' : $escaped_page;

    // Fetch Meta from `meta` table
    $meta_q = "SELECT * FROM meta WHERE page_url IN ('$escaped_page', '$alt_page') LIMIT 1";
    $meta_res = mysqli_query($conn, $meta_q);
    if ($meta_res && mysqli_num_rows($meta_res) > 0) {
        $m_row = mysqli_fetch_assoc($meta_res);
        if (!empty($m_row['meta_title'])) $meta_title = $m_row['meta_title'];
        if (!empty($m_row['meta_desc']))  $meta_desc  = $m_row['meta_desc'];
        if (!empty($m_row['meta_key']))   $meta_key   = $m_row['meta_key'];
    }

    // Fetch Schema from `page_schemas` table
    $schema_q = "SELECT schema_markup FROM page_schemas WHERE page_url IN ('$escaped_page', '$alt_page') LIMIT 1";
    $schema_res = mysqli_query($conn, $schema_q);
    if ($schema_res && mysqli_num_rows($schema_res) > 0) {
        $s_row = mysqli_fetch_assoc($schema_res);
        if (!empty($s_row['schema_markup'])) {
            $schema_markup = $s_row['schema_markup'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dynamic SEO Meta Tags -->
    <title><?php echo htmlspecialchars($meta_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($meta_desc); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($meta_key); ?>">
    <meta name="robots" content="index, follow">

    <!-- Dynamic Canonical URL with www -->
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

    <!-- Open Graph / Social Meta Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($meta_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta_desc); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
    <meta property="og:type" content="website">

    <!-- Dynamic Schema Markup (JSON-LD) -->
    <?php
    if (!empty(trim($schema_markup))) {
        $trimmed_schema = trim($schema_markup);
        // Agar admin panel se <script> tag ke sath daala gaya hai to direct print karega
        if (stripos($trimmed_schema, '<script') !== false) {
            echo $trimmed_schema . "\n";
        } 
        // Agar raw JSON daala gaya hai (starts with { or [), to <script type="application/ld+json"> mein wrap karega
        elseif ($trimmed_schema[0] === '{' || $trimmed_schema[0] === '[') {
            echo '<script type="application/ld+json">' . "\n" . $trimmed_schema . "\n" . '</script>' . "\n";
        }
    }
    ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/style/style.css?v=<?php echo time() ?>">
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
    $top_footer_result = mysqli_query($conn, $top_footer_query);
    $site_info = mysqli_fetch_assoc($top_footer_result);

    // Fallback default variables if database table is empty
    $address   = !empty($site_info['address'])   ? $site_info['address']   : '56 Usha Nagar, Nr Iskon Temple, Gotri Road, Vadodara 390021';
    $phone     = !empty($site_info['phone'])     ? $site_info['phone']     : '8980401525';
    $email     = !empty($site_info['email'])     ? $site_info['email']     : 'ghatge.ghatge@gmail.com';
    $facebook  = !empty($site_info['facebook'])  ? $site_info['facebook']  : '#';
    $instagram = !empty($site_info['instagram']) ? $site_info['instagram'] : '#';
    $twitter   = !empty($site_info['twitter'])   ? $site_info['twitter']   : '#';
    $linkedin  = !empty($site_info['linkdin'])   ? $site_info['linkdin']   : '#';
    ?>

    <!-- ================= Dynamic Topbar ================= -->
    <div class="topbar d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-start">
                    <span class="me-4"><i class="fa-solid fa-location-dot me-2 text-warning"></i>
                        <?php echo htmlspecialchars($address); ?></span>
                    <span><i class="fa-solid fa-envelope me-2 text-warning"></i> <a
                            href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a></span>
                </div>
                <div class="col-md-4 text-end">
                    <span><i class="fa-solid fa-phone me-2 text-warning"></i> <a
                            href="tel:+91<?php echo preg_replace('/[^0-9]/', '', $phone); ?>">+91
                            <?php echo htmlspecialchars($phone); ?></a></span>
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
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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