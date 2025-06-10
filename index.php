<?php
require_once 'config/config.php';

// Get featured menu items
$featuredItems = fetchAll("
    SELECT mi.*, c.name as category_name, ms.name as section_name 
    FROM menu_items mi 
    JOIN categories c ON mi.category_id = c.id 
    JOIN menu_sections ms ON c.section_id = ms.id 
    WHERE mi.is_featured = 1 AND mi.is_available = 1 
    ORDER BY mi.display_order ASC 
    LIMIT 6
");

$pageTitle = 'Home - ' . SITE_NAME;
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-6">
                <div class="hero-content text-white">
                    <h1 class="display-3 fw-bold mb-4 animate-fade-up">
                        Fresh Ingredients, Tasty
                        <span class="text-primary">Meals & True Flavour</span>
                    </h1>
                    <p class="lead mb-4 animate-fade-up" style="animation-delay: 0.2s;">
                        Experience the authentic taste of Morocco with our premium coffee and traditional cuisine. 
                        Every dish tells a story, every sip creates a memory.
                    </p>
                    <div class="hero-buttons animate-fade-up" style="animation-delay: 0.4s;">
                        <a href="pages/menu.php" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-utensils me-2"></i>View Menu
                        </a>
                        <a href="pages/reservation.php" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-calendar me-2"></i>Book Table
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="floating-card">
                        <img src="assets/images/hero-food.jpg" alt="Delicious Food" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll indicator -->
    <div class="scroll-indicator">
        <div class="scroll-arrow">
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
</section>

<!-- Welcome Section -->
<section class="welcome-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="welcome-content">
                    <span class="text-primary fw-bold text-uppercase tracking-wide">Welcome To Café</span>
                    <h2 class="display-5 fw-bold mb-4">We Serve Fresh & Delicious Food</h2>
                    <p class="text-muted mb-4">
                        Located in the heart of Tangier, Café Marrakech brings together the rich traditions 
                        of Moroccan hospitality with modern culinary excellence. Our passionate chefs use 
                        only the finest local ingredients to create memorable dining experiences.
                    </p>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="feature-box">
                                <div class="feature-icon">
                                    <i class="fas fa-leaf text-primary"></i>
                                </div>
                                <h5>Fresh Ingredients</h5>
                                <p class="text-muted small">Sourced daily from local markets</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-box">
                                <div class="feature-icon">
                                    <i class="fas fa-award text-primary"></i>
                                </div>
                                <h5>Quality Service</h5>
                                <p class="text-muted small">Exceptional hospitality every time</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="pages/about.php" class="btn btn-primary">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="welcome-images">
                    <div class="image-grid">
                        <div class="main-image">
                            <img src="assets/images/restaurant-interior.jpg" alt="Restaurant Interior" class="img-fluid rounded-4 shadow">
                        </div>
                        <div class="small-images">
                            <img src="assets/images/chef-cooking.jpg" alt="Chef Cooking" class="img-fluid rounded-3 shadow">
                            <img src="assets/images/coffee-beans.jpg" alt="Coffee Beans" class="img-fluid rounded-3 shadow">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Menu -->
<section class="featured-menu py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-primary fw-bold text-uppercase tracking-wide">Our Menu</span>
            <h2 class="display-5 fw-bold">Featured Dishes & Beverages</h2>
            <p class="text-muted">Discover our most popular items crafted with love and tradition</p>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($featuredItems)): ?>
                <?php foreach ($featuredItems as $item): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card h-100">
                        <div class="menu-image">
                            <?php if ($item['image']): ?>
                                <img src="<?php echo UPLOADS_URL . '/' . $item['image']; ?>" 
                                     alt="<?php echo htmlspecialchars($item['name']); ?>" 
                                     class="img-fluid">
                            <?php else: ?>
                                <div class="placeholder-image">
                                    <i class="fas fa-utensils"></i>
                                </div>
                            <?php endif; ?>
                            <div class="menu-overlay">
                                <div class="menu-category"><?php echo htmlspecialchars($item['section_name']); ?></div>
                            </div>
                        </div>
                        <div class="menu-content">
                            <h5 class="menu-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                            <p class="menu-description"><?php echo htmlspecialchars($item['description']); ?></p>
                            <div class="menu-footer">
                                <span class="menu-price"><?php echo formatCurrency($item['price']); ?></span>
                                <span class="menu-category-badge"><?php echo htmlspecialchars($item['category_name']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">No featured items available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-5">
            <a href="pages/menu.php" class="btn btn-primary btn-lg">
                View Full Menu <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="stat-number" data-count="1250">0</h3>
                    <p class="stat-label">Happy Customers</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3 class="stat-number" data-count="150">0</h3>
                    <p class="stat-label">Menu Items</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="stat-number" data-count="12">0</h3>
                    <p class="stat-label">Awards Won</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="stat-number" data-count="5">0</h3>
                    <p class="stat-label">Years Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reservation CTA -->
<section class="reservation-cta py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">Ready to Experience Authentic Moroccan Flavors?</h3>
                <p class="mb-0">Book your table now and enjoy an unforgettable dining experience with us.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="cta-buttons">
                    <a href="pages/reservation.php" class="btn btn-light btn-lg me-3">
                        <i class="fas fa-calendar me-2"></i>Book Now
                    </a>
                    <a href="tel:+212539123456" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Call Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Location Preview -->
<section class="location-preview py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="location-content">
                    <span class="text-primary fw-bold text-uppercase tracking-wide">Visit Us</span>
                    <h2 class="display-5 fw-bold mb-4">Find Us in the Heart of Tangier</h2>
                    <p class="text-muted mb-4">
                        Conveniently located on Avenue Mohammed V, we're easily accessible from anywhere 
                        in the city. Come and experience the warmth of Moroccan hospitality in our 
                        beautiful restaurant.
                    </p>
                    
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt text-primary"></i>
                            <div>
                                <h6>Address</h6>
                                <p class="text-muted">Avenue Mohammed V, Tangier, Morocco</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone text-primary"></i>
                            <div>
                                <h6>Phone</h6>
                                <p class="text-muted">+212 539 123 456</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock text-primary"></i>
                            <div>
                                <h6>Opening Hours</h6>
                                <p class="text-muted">Daily: 7:00 AM - 11:00 PM</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="pages/location.php" class="btn btn-primary">
                        Get Directions <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="location-map">
                    <div id="map-preview" class="rounded-4 shadow" style="height: 400px;">
                        <!-- Google Maps will be loaded here -->
                        <div class="map-placeholder d-flex align-items-center justify-content-center h-100 bg-light rounded-4">
                            <div class="text-center">
                                <i class="fas fa-map-marked-alt fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Interactive Map</p>
                                <small class="text-muted">Click to view full map</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Admin Access -->
<div class="admin-access-widget">
    <div class="admin-toggle" id="adminToggle" title="Admin Login">
        <a href="./admin/login.php"><i class="fas fa-user-shield"></i></a>
    </div>
    
    <div class="admin-popup" id="adminPopup" style="display: none;">
        <div class="admin-popup-header">
            <h6 class="mb-0">
                <i class="fas fa-shield-alt me-2"></i>Admin Access
            </h6>
            <button class="admin-close" id="adminClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="admin-popup-body">
            <p class="text-muted small mb-3">Access the admin panel to manage your restaurant</p>
            <div class="d-grid gap-2">
                <a href="<?php echo ADMIN_URL; ?>/login.php" class="btn btn-primary btn-sm">
                    <i class="fas fa-sign-in-alt me-2"></i>Admin Login
                </a>
                <a href="<?php echo ADMIN_URL; ?>" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
            </div>
            <hr class="my-3">
            <div class="text-center">
                <small class="text-muted">
                    <i class="fas fa-info-circle me-1"></i>
                    For authorized personnel only
                </small>
            </div>
        </div>
    </div>
</div>

<style>
.admin-access-widget {
    position: fixed;
    bottom: 30px;
    left: 30px;
    z-index: 999;
    font-family: var(--font-primary, 'Inter', sans-serif);
}

.admin-toggle {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #6c757d, #495057);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    opacity: 0.7;
}

.admin-toggle:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    opacity: 1;
    background: linear-gradient(135deg, #495057, #343a40);
}

.admin-popup {
    position: absolute;
    bottom: 65px;
    left: 0;
    width: 280px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    animation: slideUpFade 0.3s ease;
    border: 1px solid #e9ecef;
}

@keyframes slideUpFade {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.admin-popup-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #dee2e6;
}

.admin-popup-header h6 {
    color: #495057;
    font-weight: 600;
    margin: 0;
}

.admin-close {
    background: none;
    border: none;
    color: #6c757d;
    font-size: 1rem;
    cursor: pointer;
    padding: 0;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 3px;
    transition: all 0.2s ease;
}

.admin-close:hover {
    background: rgba(108, 117, 125, 0.1);
    color: #495057;
}

.admin-popup-body {
    padding: 20px;
}

.admin-popup .btn {
    border-radius: 8px;
    font-weight: 500;
    padding: 8px 16px;
    font-size: 0.9rem;
    transition: all 0.2s ease;
}

.admin-popup .btn-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
}

.admin-popup .btn-primary:hover {
    background: linear-gradient(135deg, #0056b3, #004085);
    transform: translateY(-1px);
}

.admin-popup .btn-outline-primary {
    border-color: #007bff;
    color: #007bff;
}

.admin-popup .btn-outline-primary:hover {
    background: #007bff;
    border-color: #007bff;
    color: white;
    transform: translateY(-1px);
}

@media (max-width: 768px) {
    .admin-access-widget {
        bottom: 100px; /* Above chat widget */
        left: 20px;
    }
    
    .admin-toggle {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
    }
    
    .admin-popup {
        width: 260px;
        bottom: 60px;
    }
}

@media (max-width: 480px) {
    .admin-popup {
        width: calc(100vw - 80px);
        left: -10px;
    }
}
</style>

<script>
// Admin access widget functionality
$(document).ready(function() {
    const adminToggle = $('#adminToggle');
    const adminPopup = $('#adminPopup');
    const adminClose = $('#adminClose');
    
    // Toggle admin popup
    adminToggle.click(function(e) {
        e.stopPropagation();
        if (adminPopup.is(':visible')) {
            adminPopup.fadeOut(200);
        } else {
            adminPopup.fadeIn(200);
        }
    });
    
    // Close admin popup
    adminClose.click(function() {
        adminPopup.fadeOut(200);
    });
    
    // Close popup when clicking outside
    $(document).click(function(e) {
        if (!$(e.target).closest('.admin-access-widget').length) {
            adminPopup.fadeOut(200);
        }
    });
    
    // Prevent popup from closing when clicking inside
    adminPopup.click(function(e) {
        e.stopPropagation();
    });
});
</script>

<?php include 'includes/footer.php'; ?>