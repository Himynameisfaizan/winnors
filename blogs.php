<?php
$pageTitle = "Our Spice Journal";
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<section class="blog-page-section">
    <div class="container">
        <div class="row gx-lg-5">

            <!-- Left Column: Blog Posts Grid -->
            <div class="col-lg-8">
                <div class="row g-4">

                    <!-- Blog Post 1 -->
                    <div class="col-md-6 reveal">
                        <div class="blog-card">
                            <div class="blog-img">
                                <span class="blog-category">Health</span>
                                <img src="https://images.pexels.com/photos/1340116/pexels-photo-1340116.jpeg?auto=compress&cs=tinysrgb&w=600"
                                    alt="Turmeric Benefits">
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="me-3"><i class="fa-regular fa-calendar"></i> 12 Aug 2026</span>
                                    <span><i class="fa-regular fa-user"></i> Admin</span>
                                </div>
                                <a href="blog-details.php" class="blog-title">The Hidden Health Benefits of Pure
                                    Spices</a>
                                <p class="blog-desc">Discover how authentic whole spices like turmeric and cloves can
                                    boost your immunity and improve digestion naturally.</p>
                                <a href="blog-details.php" class="blog-link">Read Article <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 2 -->
                    <div class="col-md-6 reveal" style="transition-delay: 0.1s;">
                        <div class="blog-card">
                            <div class="blog-img">
                                <span class="blog-category">Cooking</span>
                                <img src="assets/images/products/mustard.webp" alt="Whole vs Powder">
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="me-3"><i class="fa-regular fa-calendar"></i> 05 Aug 2026</span>
                                    <span><i class="fa-regular fa-user"></i> Chef Rohan</span>
                                </div>
                                <a href="blog-details.php" class="blog-title">Why Whole Spices are Better Than
                                    Powdered</a>
                                <p class="blog-desc">Learn why professional chefs prefer whole spices for that perfect
                                    aroma and long-lasting flavor retention in curries.</p>
                                <a href="blog-details.php" class="blog-link">Read Article <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 3 -->
                    <div class="col-md-6 reveal">
                        <div class="blog-card">
                            <div class="blog-img">
                                <span class="blog-category">Sourcing</span>
                                <img src="https://images.pexels.com/photos/2802527/pexels-photo-2802527.jpeg?auto=compress&cs=tinysrgb&w=600"
                                    alt="Farm to Kitchen">
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="me-3"><i class="fa-regular fa-calendar"></i> 28 Jul 2026</span>
                                    <span><i class="fa-regular fa-user"></i> Admin</span>
                                </div>
                                <a href="blog-details.php" class="blog-title">From Farm to Kitchen: Our Sourcing
                                    Journey</a>
                                <p class="blog-desc">Take an exclusive look at how we handpick the finest spices
                                    directly from Indian farmers, ensuring no middlemen and pure quality.</p>
                                <a href="blog-details.php" class="blog-link">Read Article <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 4 -->
                    <div class="col-md-6 reveal" style="transition-delay: 0.1s;">
                        <div class="blog-card">
                            <div class="blog-img">
                                <span class="blog-category">Recipes</span>
                                <img src="assets/images/products/psyllium.webp" alt="Spice Blends">
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="me-3"><i class="fa-regular fa-calendar"></i> 15 Jul 2026</span>
                                    <span><i class="fa-regular fa-user"></i> Priya Patel</span>
                                </div>
                                <a href="blog-details.php" class="blog-title">How to Roast and Grind Your Own Spices</a>
                                <p class="blog-desc">Unlock a new level of cooking by learning the correct temperature
                                    and methods to dry-roast your whole spices at home.</p>
                                <a href="blog-details.php" class="blog-link">Read Article <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Pagination -->
                <nav aria-label="Blog pagination" class="mt-5 reveal">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i
                                    class="fa-solid fa-angle-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Right Column: Sidebar -->
            <div class="col-lg-4 mt-5 mt-lg-0 reveal" style="transition-delay: 0.2s;">
                <div class="sticky-top" style="top: 100px;">

                    <!-- Search Widget -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Search</h4>
                        <form class="search-form position-relative">
                            <input type="text" class="form-control" placeholder="Search articles...">
                            <button type="submit"
                                class="btn position-absolute top-50 end-0 translate-middle-y border-0 text-muted bg-transparent">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="category-list">
                            <li><a href="#">Health & Wellness <span>(12)</span></a></li>
                            <li><a href="#">Cooking Tips <span>(8)</span></a></li>
                            <li><a href="#">Spice Origins <span>(15)</span></a></li>
                            <li><a href="#">Authentic Recipes <span>(20)</span></a></li>
                        </ul>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Recent Posts</h4>

                        <div class="recent-post-item">
                            <img src="https://images.pexels.com/photos/1340116/pexels-photo-1340116.jpeg?auto=compress&cs=tinysrgb&w=150"
                                alt="Recent 1" class="recent-post-img">
                            <div class="recent-post-info">
                                <h6><a href="blog-details.php">The Hidden Health Benefits of Pure Spices</a></h6>
                                <span class="recent-post-date">12 Aug 2026</span>
                            </div>
                        </div>

                        <div class="recent-post-item">
                            <img src="https://images.pexels.com/photos/4197491/pexels-photo-4197491.jpeg?auto=compress&cs=tinysrgb&w=150"
                                alt="Recent 2" class="recent-post-img">
                            <div class="recent-post-info">
                                <h6><a href="blog-details.php">Why Whole Spices are Better Than Powdered</a></h6>
                                <span class="recent-post-date">05 Aug 2026</span>
                            </div>
                        </div>

                        <div class="recent-post-item mb-0">
                            <img src="https://images.pexels.com/photos/2802527/pexels-photo-2802527.jpeg?auto=compress&cs=tinysrgb&w=150"
                                alt="Recent 3" class="recent-post-img">
                            <div class="recent-post-info">
                                <h6><a href="blog-details.php">From Farm to Kitchen: Our Sourcing Journey</a></h6>
                                <span class="recent-post-date">28 Jul 2026</span>
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