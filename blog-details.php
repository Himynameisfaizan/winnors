<?php
$pageTitle = "Blog Details";
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<section class="blog-details-section">
    <div class="container">
        <div class="row gx-lg-5">

            <!-- Left Column: Article Content -->
            <div class="col-lg-8 reveal">

                <img src="https://images.pexels.com/photos/1340116/pexels-photo-1340116.jpeg?auto=compress&cs=tinysrgb&w=1200"
                    alt="Blog Main Image" class="article-main-img">

                <div class="article-meta">
                    <span><i class="fa-regular fa-calendar"></i> 12 Aug 2026</span>
                    <span><i class="fa-regular fa-user"></i> Admin</span>
                    <span><i class="fa-regular fa-folder-open"></i> Health & Wellness</span>
                    <span><i class="fa-regular fa-comments"></i> 3 Comments</span>
                </div>

                <h1 class="article-title">The Hidden Health Benefits of Pure Whole Spices</h1>

                <div class="article-body">
                    <p>When it comes to cooking authentic Indian or global cuisines, spices are the undeniable heroes.
                        But beyond their ability to transform a bland dish into a masterpiece of flavors, whole spices
                        carry incredible health benefits that have been celebrated in Ayurveda for thousands of years.
                    </p>

                    <p>At Winnors, we always advocate for the use of whole spices over pre-ground powders. Ground spices
                        lose their essential oils quickly when exposed to air and light, diminishing not just their
                        aroma, but their medicinal properties as well.</p>

                    <h3>1. Boosts Immunity and Reduces Inflammation</h3>
                    <p>Spices like Cloves and Black Pepper are packed with antioxidants. Black pepper contains
                        <strong>piperine</strong>, a compound that helps reduce inflammation and improves the absorption
                        of other nutrients. For example, adding black pepper to turmeric enhances the absorption of
                        curcumin by up to 2000%.</p>

                    <div class="custom-blockquote">
                        <i class="fa-solid fa-quote-left"></i>
                        "The purity of your spice directly dictates the health of your meal. Adulterated spices offer
                        empty flavors, while pure whole spices offer life."
                    </div>

                    <h3>2. Aids in Digestion</h3>
                    <p>Cumin (Jeera) and Fennel seeds are widely known for their digestive benefits. They stimulate the
                        secretion of digestive enzymes, which accelerates the digestion process. A simple habit of
                        chewing fennel seeds after a heavy meal can prevent bloating and acidity naturally.</p>

                    <h3>3. Natural Preservatives and Antimicrobials</h3>
                    <p>Did you know that cinnamon and cloves have strong antimicrobial properties? In ancient times,
                        before refrigeration, these spices were used to preserve meat and food. Incorporating them into
                        your daily diet helps fight oral bacteria and keeps your gut healthy.</p>
                </div>

                <!-- Tags and Share -->
                <div class="article-footer">
                    <div class="tags-list">
                        <span class="fw-bold text-dark me-2">Tags:</span>
                        <a href="#">Health</a>
                        <a href="#">Whole Spices</a>
                        <a href="#">Ayurveda</a>
                    </div>
                    <div class="share-links">
                        <span class="fw-bold text-dark me-2">Share:</span>
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Author Box -->
                <div class="author-box">
                    <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=150"
                        alt="Author" class="author-img">
                    <div class="author-info">
                        <h4>Written by Admin</h4>
                        <p>Passionate about pure, authentic flavors. The Admin team at Winnors is dedicated to bringing
                            you the best insights on spice sourcing, culinary uses, and health benefits directly from
                            farm to table.</p>
                    </div>
                </div>

                <!-- Leave a Comment Form -->
                <div class="comment-form-section">
                    <h3>Leave a Reply</h3>
                    <p class="text-muted mb-4">Your email address will not be published. Required fields are marked *
                    </p>
                    <form class="comment-form">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name *" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Your Email *" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="5" placeholder="Write your comment here..."
                                    required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-submit">Post Comment</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <!-- Right Column: Sidebar (Sticky) -->
            <div class="col-lg-4 mt-5 mt-lg-0 reveal" style="transition-delay: 0.2s;">
                <div class="sticky-top" style="top: 100px;">

                    <div class="sidebar-widget">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="category-list">
                            <li><a href="#">Health & Wellness <span>(12)</span></a></li>
                            <li><a href="#">Cooking Tips <span>(8)</span></a></li>
                            <li><a href="#">Spice Origins <span>(15)</span></a></li>
                            <li><a href="#">Authentic Recipes <span>(20)</span></a></li>
                        </ul>
                    </div>

                    <div class="sidebar-widget">
                        <h4 class="widget-title">Recent Posts</h4>
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

                    <!-- Promo/Ad Widget (Optional but looks premium) -->
                    <div class="sidebar-widget p-0 overflow-hidden border-0">
                        <div
                            style="background: url('https://images.pexels.com/photos/2802527/pexels-photo-2802527.jpeg') center/cover; padding: 40px 20px; text-align: center; position: relative;">
                            <div
                                style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(44,30,22,0.8);">
                            </div>
                            <div style="position: relative; z-index: 2; color: #FFF;">
                                <h4 style="font-weight: 700; margin-bottom: 10px;">Premium Spices</h4>
                                <p style="font-size: 0.9rem; color: #E67E22;">Get 10% Off on First Order</p>
                                <a href="products.php" class="btn btn-outline-light btn-sm rounded-pill mt-2 px-4">Shop
                                    Now</a>
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