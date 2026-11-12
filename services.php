<?php
include('admin/db-conn.php');
$pageTitle = "Our Services";
include 'includes/header.php';
include 'includes/breadcrumb.php';
// include 'db_connection.php'; // Ensure your DB connection is included

// --- Pagination Logic ---
$limit = 9; // Set limit to 9 services per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// 1. Get total number of services to calculate total pages
$total_query = "SELECT COUNT(id) AS total FROM services";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_services = $total_row['total'];

// Calculate total pages required
$total_pages = ceil($total_services / $limit);

// 2. Fetch services for the current page
$query = "SELECT * FROM services ORDER BY id DESC LIMIT $offset, $limit";
$result = mysqli_query($conn, $query);
?>

<section class="services-page" style="padding: 60px 0;">
    <div class="container">
        <!-- Filter/Sorting Bar -->
        <div class="d-flex justify-content-between align-items-center mb-5 reveal">
            <!-- Dynamically showing total counts -->
            <p class="text-muted mb-0">Showing page <?php echo $page; ?> of <?php echo $total_pages ?: 1; ?> (Total
                <?php echo $total_services; ?> services)</p>
            <select class="form-select w-auto border-0 shadow-sm" style="background-color: #FFF;">
                <option>Default Sorting</option>
                <option>Sort by Popularity</option>
                <option>Sort by Newness</option>
            </select>
        </div>

        <div class="row g-4">
            <?php
            // Check if services exist
            if (mysqli_num_rows($result) > 0) {
                $counter = 0; // Initialize counter for animation delays

                while ($row = mysqli_fetch_assoc($result)) {
                    // Image Path
                    $imagePath = "admin/assets/img/uploads/" . $row['img_path'];

                    // Dynamically calculate transition delay (0s, 0.1s, 0.2s repeating for 3-column grid)
                    $delay = ($counter % 3) * 0.1;
            ?>
            <!-- Dynamic Service Card -->
            <div class="col-lg-4 col-md-6 reveal" style="transition-delay: <?php echo $delay; ?>s;">
                <div class="spice-card">
                    <div class="card-img-wrapper">
                        <span class="badge-premium">Premium</span>
                        <a href="service/<?php echo $row['slug_url']; ?>"> <img
                                src="<?php echo htmlspecialchars($imagePath); ?>"
                                alt="<?php echo htmlspecialchars($row['service_name']); ?>">
                        </a>
                    </div>
                    <div class="spice-card-body">
                        <a href="service/<?php echo $row['slug_url']; ?>" style="text-decoration: none;">
                            <h4 class="spice-card-title">
                                <?php echo htmlspecialchars($row['service_name']); ?></h4>
                        </a>
                        <p class="spice-card-desc"><?php echo htmlspecialchars($row['short_desc']); ?></p>
                        <div class="spice-card-footer">
                            <a href="service/<?php echo $row['slug_url']; ?>" class="view-link">View
                                Details <i class="fa-solid fa-arrow-right"></i></a>
                            <a href="contact" class="btn-quote">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    $counter++; // Increment counter
                } // End While Loop
            } else {
                echo "<div class='col-12'><p class='text-center'>No services available at the moment.</p></div>";
            }
            ?>
        </div>

        <!-- Bootstrap Pagination Section -->
        <?php if ($total_pages > 1): ?>
        <div class="row mt-5">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center custom-pagination">

                        <!-- Previous Button -->
                        <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Previous</span>
                            </a>
                        </li>

                        <!-- Page Number Loops -->
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php endfor; ?>

                        <!-- Next Button -->
                        <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <?php endif; ?>

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