<?php
// Database connection and pagination setup for blogs list page
include 'admin/db-conn.php';

$limit = 4; // 4 blogs per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Search filter handling if any
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$where_clause = "WHERE status = 'published'";
// [cite: 1]
if (!empty($search)) {
    $where_clause .= " AND (title LIKE '%$search%' OR content LIKE '%$search%')";
    // [cite: 1]
}

// 1. Total Count for Pagination
$total_query = "SELECT COUNT(id) AS total FROM blogs $where_clause";
// [cite: 1]
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_blogs = $total_row['total'];
$total_pages = ceil($total_blogs / $limit);

// 2. Fetch paginated blogs
$blogs_query = "SELECT * FROM blogs $where_clause ORDER BY created_at DESC LIMIT $offset, $limit";
// [cite: 1]
$blogs_result = mysqli_query($conn, $blogs_query);

$pageTitle = "Our Spice Journal";
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<section class="blog-page-section py-5">
    <div class="container">
        <div class="row gx-lg-5">

            <!-- Left Column: Blog Posts Grid -->
            <div class="col-lg-8">
                <div class="row g-4">
                    <?php
                    if ($blogs_result && mysqli_num_rows($blogs_result) > 0) {
                        $counter = 0;
                        while ($blog = mysqli_fetch_assoc($blogs_result)) {
                            $blogDate = date('d M Y', strtotime($blog['created_at']));
                            // [cite: 1]
                            $imagePath = "admin/assets/img/uploads/" . $blog['image'];
                            // [cite: 1]
                            $excerpt = strip_tags($blog['content']);
                            if (strlen($excerpt) > 100) {
                                $excerpt = substr($excerpt, 0, 100) . '...';
                            }
                            $delay = ($counter % 2) * 0.1;
                    ?>
                    <div class="col-md-6 reveal" style="transition-delay: <?php echo $delay; ?>s;">
                        <div class="blog-card h-100 d-flex flex-column border rounded-4 overflow-hidden shadow-sm bg-white">
                            <div class="blog-img position-relative" style="height: 220px; overflow: hidden;">
                                <span class="blog-category badge bg-warning text-dark position-absolute top-0 start-0 m-3 px-3 py-2 fw-bold">Journal</span>
                                <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="w-100 h-100 object-fit-cover">
                                <!-- [cite: 1] -->
                            </div>
                            <div class="blog-content p-4 d-flex flex-column flex-grow-1">
                                <div class="blog-meta text-muted small mb-2">
                                    <span class="me-3"><i class="fa-regular fa-calendar me-1"></i> <?php echo $blogDate; ?></span>
                                    <span><i class="fa-regular fa-user me-1"></i> <?php echo !empty($blog['author']) ? htmlspecialchars($blog['author']) : 'Admin'; ?></span>
                                    <!-- [cite: 1] -->
                                </div>
                                <a href="blog-details.php?slug=<?php echo urlencode($blog['slug_url']); ?>" class="blog-title fs-5 fw-bold text-dark text-decoration-none mb-2"><?php echo htmlspecialchars($blog['title']); ?></a>
                                <!-- [cite: 1] -->
                                <p class="blog-desc text-muted small mb-4"><?php echo htmlspecialchars($excerpt); ?></p>
                                <div class="mt-auto">
                                    <a href="blog-details.php?slug=<?php echo urlencode($blog['slug_url']); ?>" class="blog-link text-decoration-none fw-bold text-warning">Read Article <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                    <!-- [cite: 1] -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            $counter++;
                        }
                    } else {
                        echo "<div class='col-12 text-center py-5'><p class='text-muted'>No articles found matching your criteria.</p></div>";
                    }
                    ?>
                </div>

                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                <nav aria-label="Blog pagination" class="mt-5 reveal">
                    <ul class="pagination justify-content-center custom-pagination">
                        <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?><?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?>">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                        </li>
                        
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?><?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?><?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?>">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php endif; ?>
            </div>

            <!-- Right Column: Sidebar -->
            <div class="col-lg-4 mt-5 mt-lg-0 reveal" style="transition-delay: 0.2s;">
                <div class="sticky-top" style="top: 100px;">

                    <!-- Search Widget -->
                    <div class="sidebar-widget p-4 border rounded-4 bg-white mb-4 shadow-sm">
                        <h4 class="widget-title fw-bold mb-3 pb-2 border-bottom">Search</h4>
                        <form action="blogs.php" method="GET" class="search-form position-relative">
                            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" class="form-control pe-5 py-2" placeholder="Search articles...">
                            <button type="submit" class="btn position-absolute top-50 end-0 translate-middle-y border-0 text-muted bg-transparent pe-3">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <div class="sidebar-widget p-4 border rounded-4 bg-white mb-4 shadow-sm">
                        <h4 class="widget-title fw-bold mb-3 pb-2 border-bottom">Categories</h4>
                        <ul class="category-list list-unstyled mb-0 d-flex flex-column gap-2">
                            <li><a href="#" class="text-decoration-none text-dark d-flex justify-content-between p-2 rounded bg-light"><span>Health & Wellness</span> <span class="text-muted">(12)</span></a></li>
                            <li><a href="#" class="text-decoration-none text-dark d-flex justify-content-between p-2 rounded bg-light"><span>Cooking Tips</span> <span class="text-muted">(8)</span></a></li>
                            <li><a href="#" class="text-decoration-none text-dark d-flex justify-content-between p-2 rounded bg-light"><span>Spice Origins</span> <span class="text-muted">(15)</span></a></li>
                            <li><a href="#" class="text-decoration-none text-dark d-flex justify-content-between p-2 rounded bg-light"><span>Authentic Recipes</span> <span class="text-muted">(20)</span></a></li>
                        </ul>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget p-4 border rounded-4 bg-white shadow-sm">
                        <h4 class="widget-title fw-bold mb-3 pb-2 border-bottom">Recent Posts</h4>
                        <?php
                        $recent_query = "SELECT title, slug_url, image, created_at FROM blogs WHERE status = 'published' ORDER BY created_at DESC LIMIT 3";
                        // [cite: 1]
                        $recent_result = mysqli_query($conn, $recent_query);
                        if ($recent_result && mysqli_num_rows($recent_result) > 0) {
                            while ($rec = mysqli_fetch_assoc($recent_result)) {
                                $recDate = date('d M Y', strtotime($rec['created_at']));
                                // [cite: 1]
                                $recImg = "admin/assets/img/uploads/" . $rec['image'];
                                // [cite: 1]
                        ?>
                        <div class="recent-post-item d-flex align-items-center mb-3 pb-3 border-bottom">
                            <img src="<?php echo htmlspecialchars($recImg); ?>" alt="Recent" class="recent-post-img rounded me-3" style="width: 70px; height: 70px; object-fit: cover;">
                            <!-- [cite: 1] -->
                            <div class="recent-post-info">
                                <h6 class="mb-1"><a href="blog-details.php?slug=<?php echo urlencode($rec['slug_url']); ?>" class="text-decoration-none text-dark fw-bold small"><?php echo htmlspecialchars($rec['title']); ?></a></h6>
                                <!-- [cite: 1] -->
                                <span class="recent-post-date text-muted" style="font-size: 0.75rem;"><i class="fa-regular fa-calendar me-1"></i> <?php echo $recDate; ?></span>
                                <!-- [cite: 1] -->
                            </div>
                        </div>
                        <?php 
                            }
                        } 
                        ?>
                    </div>

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