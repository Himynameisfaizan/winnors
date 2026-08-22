<section class="page-banner">
    <div class="page-banner-overlay"></div>
    <div class="page-banner-content">
        <!-- Display Dynamic Title -->
        <h1><?php echo isset($pageTitle) ? $pageTitle : 'Winnors'; ?></h1>

        <!-- Breadcrumb Trail -->
        <div class="custom-breadcrumb">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span><?php echo isset($pageTitle) ? $pageTitle : 'Page'; ?></span>
        </div>
    </div>
</section>