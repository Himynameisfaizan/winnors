<?php
// Database connection and slug handling
include 'admin/db-conn.php';

$slug = isset($_GET['slug']) ? mysqli_real_escape_string($conn, $_GET['slug']) : '';

// 1. Fetch current blog article based on slug
if (!empty($slug)) {
    $query = "SELECT * FROM blogs WHERE slug = '$slug' AND status = 'published' LIMIT 1";
    // [cite: 1]
} else {
    // Fallback to the latest published blog if no slug is provided
    $query = "SELECT * FROM blogs WHERE status = 'published' ORDER BY created_at DESC LIMIT 1";
    // [cite: 1]
}

$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $blog = mysqli_fetch_assoc($result);
} else {
    echo "<div class='container py-5 text-center'><h2>Article not found.</h2><a href='blogs.php' class='btn btn-dark mt-3'>Back to Journal</a></div>";
    include 'includes/footer.php';
    exit;
}

$pageTitle = htmlspecialchars($blog['title']);
// [cite: 1]
include 'includes/header.php';
include 'includes/breadcrumb.php';

// Format article date
$articleDate = date('d M Y', strtotime($blog['created_at']));
// [cite: 1]
$authorName = !empty($blog['author']) ? htmlspecialchars($blog['author']) : 'Admin';
// [cite: 1]
$articleImage = "admin/assets/img/uploads/" . $blog['image'];
// [cite: 1]
?>

<section class="blog-details-section py-5">
    <div class="container">
        <div class="row gx-lg-5">

            <!-- Left Column: Article Content -->
            <div class="col-lg-8 reveal">

                <?php if(!empty($blog['image'])): ?>
                <div class="article-img-wrapper mb-4 rounded-4 overflow-hidden shadow-sm" style="max-height: 480px;">
                    <img src="<?php echo htmlspecialchars($articleImage); ?>"
                        alt="<?php echo htmlspecialchars($blog['title']); ?>"
                        class="article-main-img w-100 h-100 object-fit-cover" style="max-height: 480px;">
                    <!-- [cite: 1] -->
                </div>
                <?php endif; ?>

                <div class="article-meta text-muted mb-3 d-flex flex-wrap gap-3 small">
                    <span><i class="fa-regular fa-calendar me-1"></i> <?php echo $articleDate; ?></span>
                    <span><i class="fa-regular fa-user me-1"></i> <?php echo $authorName; ?></span>
                    <span><i class="fa-regular fa-folder-open me-1"></i> Spice Journal</span>
                </div>

                <h1 class="article-title fw-bold text-dark mb-4 display-6">
                    <?php echo htmlspecialchars($blog['title']); ?></h1>
                <!-- [cite: 1] -->

                <div class="article-body text-muted" style="line-height: 1.9;">
                    <?php echo $blog['description']; ?>
                </div>

                <!-- Tags and Share -->
                <div
                    class="article-footer d-flex flex-wrap justify-content-between align-items-center border-top border-bottom py-3 my-4">
                    <div class="tags-list">
                        <span class="fw-bold text-dark me-2">Tags:</span>
                        <span class="badge bg-light text-dark border me-1 px-3 py-2">Whole Spices</span>
                        <span class="badge bg-light text-dark border me-1 px-3 py-2">Winnors Journal</span>
                    </div>
                    <div class="share-links d-flex align-items-center gap-2 mt-2 mt-sm-0">
                        <span class="fw-bold text-dark me-2">Share:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>"
                            target="_blank" class="btn btn-outline-dark btn-sm rounded-circle"
                            style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>&text=<?php echo urlencode($blog['title']); ?>"
                            target="_blank" class="btn btn-outline-dark btn-sm rounded-circle"
                            style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;"><i
                                class="fa-brands fa-twitter"></i></a>
                        <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($blog['title'] . " - " . "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>"
                            target="_blank" class="btn btn-outline-dark btn-sm rounded-circle"
                            style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;"><i
                                class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Author Box -->
                <div class="author-box p-4 border rounded-4 bg-white d-flex align-items-center gap-4 my-4 shadow-sm">
                    <img src="admin/assets/img/uploads/<?php echo !empty($blog['image']) ? htmlspecialchars($blog['image']) : ''; ?>"
                        alt="Author" class="author-img rounded-circle object-fit-cover shadow-sm"
                        style="width: 80px; height: 80px;">
                    <!-- [cite: 1] -->
                    <div class="author-info">
                        <h4 class="fw-bold text-dark mb-1">Written by <?php echo $authorName; ?></h4>
                        <p class="text-muted small mb-0">Passionate about pure, authentic flavors. The team at Winnors
                            is dedicated to bringing you the best insights on spice sourcing, culinary uses, and export
                            standards directly from farm to table.</p>
                    </div>
                </div>

                <!-- Leave a Comment Form -->
                <div class="comment-form-section p-4 border rounded-4 bg-white my-4 shadow-sm">
                    <h3 class="fw-bold text-dark mb-2">Leave a Reply</h3>
                    <p class="text-muted small mb-4">Your email address will not be published. Required fields are
                        marked *</p>
                    <form class="comment-form" action="" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control py-2" placeholder="Your Name *" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control py-2" placeholder="Your Email *" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="4" placeholder="Write your comment here..."
                                    required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark fw-bold px-4 py-2 rounded-pill">Post
                                    Comment</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <!-- Right Column: Sidebar (Sticky) -->
            <div class="col-lg-4 mt-5 mt-lg-0 reveal" style="transition-delay: 0.2s;">
                <div class="sticky-top" style="top: 100px;">

                    <!-- Categories Widget -->
                    <div class="sidebar-widget p-4 border rounded-4 bg-white mb-4 shadow-sm">
                        <h4 class="widget-title fw-bold mb-3 pb-2 border-bottom">Categories</h4>
                        <ul class="category-list list-unstyled mb-0 d-flex flex-column gap-2">
                            <li><a href="blogs"
                                    class="text-decoration-none text-dark d-flex justify-content-between p-2 rounded bg-light"><span>Health
                                        & Wellness</span> <span class="text-muted">(12)</span></a></li>
                            <li><a href="blogs"
                                    class="text-decoration-none text-dark d-flex justify-content-between p-2 rounded bg-light"><span>Cooking
                                        Tips</span> <span class="text-muted">(8)</span></a></li>
                            <li><a href="blogs"
                                    class="text-decoration-none text-dark d-flex justify-content-between p-2 rounded bg-light"><span>Spice
                                        Origins</span> <span class="text-muted">(15)</span></a></li>
                            <li><a href="blogs"
                                    class="text-decoration-none text-dark d-flex justify-content-between p-2 rounded bg-light"><span>Authentic
                                        Recipes</span> <span class="text-muted">(20)</span></a></li>
                        </ul>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget p-4 border rounded-4 bg-white mb-4 shadow-sm">
                        <h4 class="widget-title fw-bold mb-3 pb-2 border-bottom">Recent Posts</h4>
                        <?php
                        $current_blog_id = $blog['blog_id'];
                        $recent_query = "SELECT title, slug, image, created_at FROM blogs WHERE status = 'published' ORDER BY created_at DESC LIMIT 3";
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
                            <img src="<?php echo htmlspecialchars($recImg); ?>" alt="Recent"
                                class="recent-post-img rounded me-3 object-fit-cover"
                                style="width: 70px; height: 70px;">
                            <!-- [cite: 1] -->
                            <div class="recent-post-info">
                                <h6 class="mb-1"><a href="blog-details.php?slug=<?php echo urlencode($rec['slug']); ?>"
                                        class="text-decoration-none text-dark fw-bold small"><?php echo htmlspecialchars($rec['title']); ?></a>
                                </h6>
                                <!-- [cite: 1] -->
                                <span class="recent-post-date text-muted" style="font-size: 0.75rem;"><i
                                        class="fa-regular fa-calendar me-1"></i> <?php echo $recDate; ?></span>
                                <!-- [cite: 1] -->
                            </div>
                        </div>
                        <?php 
                            }
                        } 
                        ?>
                    </div>

                    <!-- Promo/Ad Widget -->
                    <div class="sidebar-widget p-0 overflow-hidden border-0 rounded-4 shadow-sm">
                        <div
                            style="background: url('https://images.pexels.com/photos/2802527/pexels-photo-2802527.jpeg') center/cover; padding: 40px 20px; text-align: center; position: relative;">
                            <div
                                style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(44,30,22,0.85);">
                            </div>
                            <div style="position: relative; z-index: 2; color: #FFF;">
                                <h4 style="font-weight: 700; margin-bottom: 10px;">Premium Spices</h4>
                                <p style="font-size: 0.9rem; color: #E67E22;">Export Quality Worldwide Supply</p>
                                <a href="products"
                                    class="btn btn-outline-light btn-sm rounded-pill mt-2 px-4 fw-bold">Shop Now</a>
                            </div>
                        </div>
                    </div>

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