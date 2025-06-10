<?php
require_once '../config/config.php';

// Get filter parameters
$sectionFilter = $_GET['section'] ?? null;
$categoryFilter = $_GET['category'] ?? null;

// Get menu sections
$sections = fetchAll("
    SELECT * FROM menu_sections 
    WHERE status = 'active' 
    ORDER BY display_order ASC
");

// Build query for menu items
$whereConditions = ['mi.is_available = 1', 'c.status = "active"', 'ms.status = "active"'];
$params = [];

if ($sectionFilter) {
    $whereConditions[] = 'ms.name = ?';
    $params[] = ucfirst($sectionFilter);
}

if ($categoryFilter) {
    $whereConditions[] = 'c.name LIKE ?';
    $params[] = '%' . str_replace('-', ' ', $categoryFilter) . '%';
}

$whereClause = implode(' AND ', $whereConditions);

// Get menu items with categories and sections
$menuItems = fetchAll("
    SELECT mi.*, c.name as category_name, c.description as category_description,
           ms.name as section_name, ms.id as section_id
    FROM menu_items mi
    JOIN categories c ON mi.category_id = c.id
    JOIN menu_sections ms ON c.section_id = ms.id
    WHERE $whereClause
    ORDER BY ms.display_order ASC, c.display_order ASC, mi.display_order ASC
", $params);

// Group items by section and category
$menuStructure = [];
foreach ($menuItems as $item) {
    $sectionName = $item['section_name'];
    $categoryName = $item['category_name'];
    
    if (!isset($menuStructure[$sectionName])) {
        $menuStructure[$sectionName] = [
            'section_id' => $item['section_id'],
            'categories' => []
        ];
    }
    
    if (!isset($menuStructure[$sectionName]['categories'][$categoryName])) {
        $menuStructure[$sectionName]['categories'][$categoryName] = [
            'description' => $item['category_description'],
            'items' => []
        ];
    }
    
    $menuStructure[$sectionName]['categories'][$categoryName]['items'][] = $item;
}

$pageTitle = 'Menu - ' . SITE_NAME;
$additionalScripts = [ASSETS_URL . '/js/menu.js'];
include '../includes/header.php';
?>

<!-- Page Header -->
<section class="page-header bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Our Menu</h1>
                <p class="lead mb-0">
                    Discover our carefully crafted selection of authentic Moroccan dishes and premium coffee beverages
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="page-header-actions">
                    <a href="../pages/reservation.php" class="btn btn-light btn-lg">
                        <i class="fas fa-calendar me-2"></i>Book a Table
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Navigation -->
<section class="menu-navigation py-4 bg-light sticky-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="menu-filters d-flex flex-wrap gap-2">
                    <a href="menu.php" 
                       class="menu-filter btn <?php echo !$sectionFilter && !$categoryFilter ? 'btn-primary' : 'btn-outline-primary'; ?>">
                        All Items
                    </a>
                    <?php foreach ($sections as $section): ?>
                        <a href="menu.php?section=<?php echo strtolower($section['name']); ?>" 
                           class="menu-filter btn <?php echo $sectionFilter === strtolower($section['name']) ? 'btn-primary' : 'btn-outline-primary'; ?>">
                            <i class="fas fa-<?php echo $section['name'] === 'Coffee' ? 'coffee' : 'utensils'; ?> me-2"></i>
                            <?php echo htmlspecialchars($section['name']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="menu-search">
                    <div class="search-container position-relative">
                        <input type="text" class="form-control" id="menuSearch" placeholder="Search menu items...">
                        <i class="fas fa-search search-icon"></i>
                        <div id="menuSearchResults" class="search-results" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Content -->
<section class="menu-content py-5">
    <div class="container">
        <?php if (empty($menuStructure)): ?>
            <div class="text-center py-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h3>No items found</h3>
                <p class="text-muted">Try adjusting your filters or search criteria</p>
                <a href="menu.php" class="btn btn-primary">View All Menu</a>
            </div>
        <?php else: ?>
            <?php foreach ($menuStructure as $sectionName => $sectionData): ?>
                <div class="menu-section mb-5" id="section-<?php echo strtolower(str_replace(' ', '-', $sectionName)); ?>">
                    <div class="section-header text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary mb-3">
                            <i class="fas fa-<?php echo $sectionName === 'Coffee' ? 'coffee' : 'utensils'; ?> me-3"></i>
                            <?php echo htmlspecialchars($sectionName); ?>
                        </h2>
                        <div class="section-divider mx-auto"></div>
                    </div>
                    
                    <?php foreach ($sectionData['categories'] as $categoryName => $categoryData): ?>
                        <div class="menu-category mb-5">
                            <div class="category-header mb-4">
                                <h3 class="h4 fw-bold text-dark mb-2"><?php echo htmlspecialchars($categoryName); ?></h3>
                                <?php if ($categoryData['description']): ?>
                                    <p class="text-muted"><?php echo htmlspecialchars($categoryData['description']); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="row g-4">
                                <?php foreach ($categoryData['items'] as $item): ?>
                                    <div class="col-lg-6">
                                        <div class="menu-item-card h-100" data-item-id="<?php echo $item['id']; ?>">
                                            <div class="row g-0 h-100">
                                                <div class="col-4">
                                                    <div class="menu-item-image">
                                                        <?php if ($item['image']): ?>
                                                            <img src="<?php echo UPLOADS_URL . '/' . $item['image']; ?>" 
                                                                 alt="<?php echo htmlspecialchars($item['name']); ?>"
                                                                 class="img-fluid h-100 w-100">
                                                        <?php else: ?>
                                                            <div class="placeholder-image">
                                                                <i class="fas fa-utensils"></i>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="menu-item-content">
                                                        <div class="menu-item-header">
                                                            <h5 class="menu-item-title mb-1">
                                                                <?php echo htmlspecialchars($item['name']); ?>
                                                            </h5>
                                                            <span class="menu-item-price fw-bold text-primary">
                                                                <?php echo formatCurrency($item['price']); ?>
                                                            </span>
                                                        </div>
                                                        
                                                        <p class="menu-item-description text-muted small mb-2">
                                                            <?php echo htmlspecialchars($item['description']); ?>
                                                        </p>
                                                        
                                                        <?php if ($item['ingredients']): ?>
                                                            <div class="menu-item-ingredients mb-2">
                                                                <small class="text-muted">
                                                                    <i class="fas fa-leaf me-1"></i>
                                                                    <?php echo htmlspecialchars($item['ingredients']); ?>
                                                                </small>
                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                        <?php if ($item['allergens']): ?>
                                                            <div class="menu-item-allergens mb-2">
                                                                <small class="text-warning">
                                                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                                                    Contains: <?php echo htmlspecialchars($item['allergens']); ?>
                                                                </small>
                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                        <div class="menu-item-footer">
                                                            <?php if ($item['is_featured']): ?>
                                                                <span class="badge bg-primary me-2">Featured</span>
                                                            <?php endif; ?>
                                                            
                                                            <button class="btn btn-sm btn-outline-primary order-btn" 
                                                                    data-item-id="<?php echo $item['id']; ?>"
                                                                    data-item-name="<?php echo htmlspecialchars($item['name']); ?>"
                                                                    data-item-price="<?php echo $item['price']; ?>">
                                                                <i class="fas fa-plus me-1"></i>Add to Order
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <?php if (next($menuStructure)): ?>
                    <hr class="section-separator my-5">
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Menu CTA Section -->
<section class="menu-cta py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">Ready to taste our delicious offerings?</h3>
                <p class="mb-0">Reserve your table now and experience the authentic flavors of Morocco</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="cta-buttons">
                    <a href="../pages/reservation.php" class="btn btn-light btn-lg me-3">
                        <i class="fas fa-calendar me-2"></i>Book Table
                    </a>
                    <a href="../pages/contact.php" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Call Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Order Summary Modal -->
<div class="modal fade" id="orderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-shopping-cart me-2"></i>Order Summary
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="orderItems"></div>
                <hr>
                <div class="order-total">
                    <h5>Total: <span id="orderTotal">0.00 DH</span></h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Browsing</button>
                <a href="../pages/reservation.php" class="btn btn-primary">
                    <i class="fas fa-calendar me-2"></i>Book Table
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Item Detail Modal -->
<div class="modal fade" id="itemDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemDetailTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="itemDetailBody">
                <!-- Item details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addToOrderFromDetail">
                    <i class="fas fa-plus me-2"></i>Add to Order
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.menu-navigation {
    z-index: 1020;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.menu-filter {
    border-radius: 25px;
    padding: 8px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.search-container {
    position: relative;
}

.search-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
}

.search-results {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    z-index: 1000;
    max-height: 300px;
    overflow-y: auto;
}

.section-divider {
    width: 100px;
    height: 3px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border-radius: 2px;
}

.menu-item-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
}

.menu-item-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.menu-item-image {
    height: 120px;
    overflow: hidden;
    position: relative;
}

.menu-item-image img {
    object-fit: cover;
    transition: transform 0.3s ease;
}

.menu-item-card:hover .menu-item-image img {
    transform: scale(1.1);
}

.placeholder-image {
    height: 100%;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    font-size: 2rem;
}

.menu-item-content {
    padding: 20px;
}

.menu-item-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 10px;
}

.menu-item-title {
    font-weight: 600;
    color: #2c1810;
    flex: 1;
    margin-right: 10px;
}

.menu-item-price {
    font-size: 1.1rem;
    white-space: nowrap;
}

.menu-item-description {
    line-height: 1.5;
}

.order-btn {
    border-radius: 20px;
    padding: 5px 15px;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.order-btn:hover {
    transform: translateY(-2px);
}

.section-separator {
    border: none;
    height: 2px;
    background: linear-gradient(135deg, transparent, var(--primary-color), transparent);
}

@media (max-width: 768px) {
    .menu-filters {
        justify-content: center;
    }
    
    .menu-filter {
        font-size: 0.9rem;
        padding: 6px 15px;
    }
    
    .menu-item-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .menu-item-price {
        margin-top: 5px;
    }
    
    .cta-buttons .btn {
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>

<?php include '../includes/footer.php'; ?>