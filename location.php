<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
include 'admin/db-conn.php';

// Fix: Removed the hardcoded 'khetarpal' subfolder string
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$safe_base_url = $protocol . $_SERVER['HTTP_HOST'] . '/';

// Global SEO Setup for Header
$meta_title = 'Our Custom Pages & Hubs | Winnors';
$meta_desc = 'Explore information pages, spice export regions, and wholesale agro services provided by Winnors Premium Spices.';
$meta_key = 'Winnors locations, Spices exporter, Agricultural Solutions, custom export pages';

// Fetch active custom pages
$customPages = [];
$sql = "SELECT id, page_title, breadcrumb_title, slug_url, content, meta_title, meta_desc, created_at
        FROM custom_pages
        WHERE status = 1 AND slug_url <> ''
        ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $customPages[] = $row;
    }
}
$totalPages = count($customPages);

function ktcCleanText($value): string {
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

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

/* Winnors Custom Pages Grid Styling */
.winnors-page-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #f0e9e2;
    padding: 25px;
    height: 100%;
    display: flex;
    flex-direction: column;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}

.winnors-page-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(35, 25, 17, 0.08);
    border-color: var(--winnors-orange);
}

.winnors-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
}

.winnors-card-icon {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    background: rgba(230, 126, 34, 0.1);
    color: var(--winnors-orange);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    transition: all 0.3s ease;
}

.winnors-page-card:hover .winnors-card-icon {
    background: var(--winnors-dark);
    color: #ffffff;
}

.winnors-card-tag {
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    padding: 4px 12px;
    border-radius: 50px;
    background: var(--winnors-light-bg);
    color: var(--winnors-dark);
    border: 1px solid #eaeaea;
}

.winnors-page-card h3 {
    color: var(--winnors-dark);
    font-family: 'Poppins', sans-serif;
    font-size: 1.2rem;
    font-weight: 700;
    line-height: 1.4;
    margin-bottom: 10px;
    transition: 0.3s;
}

.winnors-page-card:hover h3 {
    color: var(--winnors-orange);
}

.winnors-page-card p {
    color: #6c757d;
    font-family: 'Poppins', sans-serif;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
    display: -webkit-box;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.winnors-card-footer {
    padding-top: 15px;
    border-top: 1px solid #f0e9e2;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--winnors-dark);
    text-transform: uppercase;
    transition: 0.3s;
}

.winnors-page-card:hover .winnors-card-footer {
    color: var(--winnors-orange);
}

/* Filter Search Bar */
.search-filter-box {
    background: #fff;
    border-radius: 12px;
    padding: 20px 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    margin-top: -30px;
    position: relative;
    z-index: 9;
    border: 1px solid #f0e9e2;
}

.badge-orange {
    background-color: var(--winnors-orange);
    color: #fff;
    padding: 6px 12px;
    border-radius: 4px;
}
</style>

<main class="main" style="background-color: var(--winnors-light-bg);">

    <!-- Breadcrumb -->
    <div class="site-breadcrumb"
        style="background-color: var(--winnors-light-bg); padding: 80px 0 60px; text-align: center; border-bottom: 1px solid #f0e9e2;">
        <div class="container">
            <h2 class="breadcrumb-title"
                style="color: var(--winnors-dark); font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 36px; margin-bottom: 10px;">
                Our Custom Pages & Hubs</h2>
            <ul class="breadcrumb-menu"
                style="list-style: none; padding: 0; margin: 0; display: flex; justify-content: center; align-items: center; gap: 10px; color: #6c757d; font-size: 15px;">
                <li><a href="index.php"
                        style="color: var(--winnors-orange); text-decoration: none; font-weight: 600;">Home</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 11px; margin-left: 5px;"></i>
                </li>
                <li class="active">Pages</li>
            </ul>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="container">
        <div class="search-filter-box">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h5 class="m-0 fw-bold" style="color: var(--winnors-dark); font-family: 'Poppins', sans-serif;">
                        <span class="badge badge-orange me-2"><?= $totalPages; ?></span> Active Pages
                    </h5>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i
                                class="fa fa-search text-muted"></i></span>
                        <input type="text" id="pageSearchInput" class="form-control border-start-0 bg-light"
                            placeholder="Search by topic, keyword or title..." style="box-shadow: none;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pages Grid Section -->
    <section class="py-5" style="background-color: var(--winnors-light-bg);">
        <div class="container pb-5">
            <?php if (!empty($customPages)): ?>
            <div class="row g-4" id="customPagesGrid">
                <?php 
                $icons = ['fa-leaf', 'fa-seedling', 'fa-truck-fast', 'fa-earth-americas', 'fa-box-open', 'fa-certificate'];
                $index = 0;
                
                foreach ($customPages as $customPage):
                    $cardTitle = trim($customPage['page_title'] ?: $customPage['breadcrumb_title']);
                    $badgeText = trim($customPage['breadcrumb_title'] ?: 'Info Page');
                    
                    $rawDesc = trim(strip_tags($customPage['meta_desc']));
                    if (empty($rawDesc)) {
                        $rawDesc = mb_strimwidth(trim(strip_tags($customPage['content'])), 0, 120, '...');
                    }

                    $slug = trim($customPage['slug_url']);
                    // Fixed URL creation - ensuring it directs to page.php
                    $pageUrl = 'page.php?slug=' . rawurlencode($slug);
                    $iconClass = $icons[$index % count($icons)];
                    $index++;
                ?>
                <div class="col-lg-4 col-md-6 page-grid-item"
                    data-search="<?= ktcCleanText(strtolower($cardTitle . ' ' . $badgeText . ' ' . $rawDesc)); ?>">
                    <a href="<?= $pageUrl; ?>" class="winnors-page-card">
                        <div class="winnors-card-top">
                            <div class="winnors-card-icon">
                                <i class="fa-solid <?= $iconClass; ?>"></i>
                            </div>
                            <span class="winnors-card-tag"><?= ktcCleanText($badgeText); ?></span>
                        </div>
                        <h3><?= ktcCleanText($cardTitle); ?></h3>
                        <p><?= ktcCleanText($rawDesc); ?></p>
                        <div class="winnors-card-footer">
                            <span>Explore Details</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <div id="noMatchMsg" class="text-center py-5 d-none">
                <h4 class="fw-bold" style="color: var(--winnors-dark); font-family: 'Poppins', sans-serif;">No matching
                    pages found</h4>
                <p class="text-muted">Try searching with a different keyword.</p>
            </div>

            <?php else: ?>
            <div class="text-center py-5">
                <i class="fa-solid fa-folder-open fa-3x text-muted mb-3" style="color: #e3d5ca !important;"></i>
                <h3 style="font-family: 'Poppins', sans-serif; color: var(--winnors-dark);">No Custom Pages Found</h3>
                <p class="text-muted">Pages created from the admin panel will appear here.</p>
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('pageSearchInput');
    const items = document.querySelectorAll('.page-grid-item');
    const noMatch = document.getElementById('noMatchMsg');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            let visibleCount = 0;

            items.forEach(function(item) {
                const text = item.getAttribute('data-search') || '';
                if (text.includes(query)) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            if (noMatch) {
                noMatch.classList.toggle('d-none', visibleCount > 0);
            }
        });
    }
});
</script>

<?php include 'includes/footer.php'; ?>