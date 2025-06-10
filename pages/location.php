<?php
require_once '../config/config.php';

$pageTitle = 'Find Us - ' . SITE_NAME;
$additionalScripts = ['https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap'];
include '../includes/header.php';
?>

<!-- Page Header -->
<section class="page-header bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Find Us</h1>
                <p class="lead mb-0">
                    Visit us in the heart of Tangier for an authentic Moroccan dining experience
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

<!-- Location Information -->
<section class="location-info py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Map Column -->
            <div class="col-lg-8">
                <div class="map-container">
                    <div class="map-header mb-4">
                        <h3 class="mb-2">Our Location</h3>
                        <p class="text-muted">We're conveniently located in the heart of Tangier</p>
                    </div>
                    
                    <!-- Google Map -->
                    <div id="googleMap" class="google-map rounded-4 shadow" style="height: 500px;">
                        <!-- Fallback map placeholder -->
                        <div class="map-placeholder d-flex align-items-center justify-content-center h-100 bg-light rounded-4">
                            <div class="text-center">
                                <i class="fas fa-map-marked-alt fa-4x text-primary mb-3"></i>
                                <h5>Interactive Map</h5>
                                <p class="text-muted">Avenue Mohammed V, Tangier, Morocco</p>
                                <a href="https://maps.google.com/?q=35.7595,-5.8340" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-external-link-alt me-2"></i>Open in Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Map Controls -->
                    <div class="map-controls mt-3">
                        <div class="row g-2">
                            <div class="col-auto">
                                <button class="btn btn-outline-primary btn-sm" onclick="centerMap()">
                                    <i class="fas fa-crosshairs me-1"></i>Center Map
                                </button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-primary btn-sm" onclick="getDirections()">
                                    <i class="fas fa-route me-1"></i>Get Directions
                                </button>
                            </div>
                            <div class="col-auto">
                                <a href="https://maps.google.com/?q=35.7595,-5.8340" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-external-link-alt me-1"></i>Open in Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Information Column -->
            <div class="col-lg-4">
                <div class="location-details">
                    <!-- Contact Information -->
                    <div class="info-card mb-4">
                        <h4 class="mb-4">
                            <i class="fas fa-info-circle me-2 text-primary"></i>
                            Contact Information
                        </h4>
                        
                        <div class="contact-item mb-4">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                            </div>
                            <div class="contact-details">
                                <h6>Address</h6>
                                <p class="mb-0">Avenue Mohammed V<br>Tangier, Morocco</p>
                            </div>
                        </div>
                        
                        <div class="contact-item mb-4">
                            <div class="contact-icon">
                                <i class="fas fa-phone text-primary"></i>
                            </div>
                            <div class="contact-details">
                                <h6>Phone</h6>
                                <p class="mb-0">
                                    <a href="tel:+212539123456" class="text-decoration-none">+212 539 123 456</a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="contact-item mb-4">
                            <div class="contact-icon">
                                <i class="fas fa-envelope text-primary"></i>
                            </div>
                            <div class="contact-details">
                                <h6>Email</h6>
                                <p class="mb-0">
                                    <a href="mailto:info@cafemarrakech.com" class="text-decoration-none">info@cafemarrakech.com</a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-globe text-primary"></i>
                            </div>
                            <div class="contact-details">
                                <h6>Website</h6>
                                <p class="mb-0">
                                    <a href="<?php echo SITE_URL; ?>" class="text-decoration-none">www.cafemarrakech.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Opening Hours -->
                    <div class="info-card mb-4">
                        <h4 class="mb-4">
                            <i class="fas fa-clock me-2 text-primary"></i>
                            Opening Hours
                        </h4>
                        
                        <div class="hours-list">
                            <div class="hours-row">
                                <span class="day">Monday - Thursday</span>
                                <span class="time">7:00 AM - 11:00 PM</span>
                            </div>
                            <div class="hours-row">
                                <span class="day">Friday - Saturday</span>
                                <span class="time">7:00 AM - 12:00 AM</span>
                            </div>
                            <div class="hours-row current-day">
                                <span class="day">Sunday</span>
                                <span class="time">8:00 AM - 10:00 PM</span>
                            </div>
                        </div>
                        
                        <div class="status-indicator mt-3">
                            <div class="status-badge open">
                                <i class="fas fa-circle me-2"></i>
                                <span>Open Now</span>
                            </div>
                            <small class="text-muted">Closes at 11:00 PM</small>
                        </div>
                    </div>
                    
                    <!-- Transportation -->
                    <div class="info-card mb-4">
                        <h4 class="mb-4">
                            <i class="fas fa-car me-2 text-primary"></i>
                            Getting Here
                        </h4>
                        
                        <div class="transport-options">
                            <div class="transport-item">
                                <i class="fas fa-car text-success"></i>
                                <div>
                                    <strong>By Car</strong>
                                    <p class="small text-muted mb-0">Free parking available nearby</p>
                                </div>
                            </div>
                            
                            <div class="transport-item">
                                <i class="fas fa-bus text-info"></i>
                                <div>
                                    <strong>Public Transport</strong>
                                    <p class="small text-muted mb-0">Bus lines 2, 5, and 12 stop nearby</p>
                                </div>
                            </div>
                            
                            <div class="transport-item">
                                <i class="fas fa-walking text-warning"></i>
                                <div>
                                    <strong>Walking</strong>
                                    <p class="small text-muted mb-0">5 minutes from Petit Socco</p>
                                </div>
                            </div>
                            
                            <div class="transport-item">
                                <i class="fas fa-taxi text-primary"></i>
                                <div>
                                    <strong>Taxi</strong>
                                    <p class="small text-muted mb-0">Available 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="info-card">
                        <h4 class="mb-4">
                            <i class="fas fa-bolt me-2 text-primary"></i>
                            Quick Actions
                        </h4>
                        
                        <div class="d-grid gap-2">
                            <a href="../pages/reservation.php" class="btn btn-primary">
                                <i class="fas fa-calendar me-2"></i>Make Reservation
                            </a>
                            <a href="../pages/menu.php" class="btn btn-outline-primary">
                                <i class="fas fa-utensils me-2"></i>View Menu
                            </a>
                            <a href="tel:+212539123456" class="btn btn-outline-success">
                                <i class="fas fa-phone me-2"></i>Call Now
                            </a>
                            <a href="../pages/contact.php" class="btn btn-outline-info">
                                <i class="fas fa-envelope me-2"></i>Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Nearby Landmarks -->
<section class="landmarks py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="fw-bold">Nearby Landmarks</h3>
            <p class="text-muted">We're surrounded by Tangier's most famous attractions</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="landmark-card text-center">
                    <div class="landmark-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h5>Petit Socco</h5>
                    <p class="text-muted small">5 minutes walk</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="landmark-card text-center">
                    <div class="landmark-icon">
                        <i class="fas fa-mosque"></i>
                    </div>
                    <h5>Kasbah Museum</h5>
                    <p class="text-muted small">10 minutes walk</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="landmark-card text-center">
                    <div class="landmark-icon">
                        <i class="fas fa-water"></i>
                    </div>
                    <h5>Tangier Beach</h5>
                    <p class="text-muted small">15 minutes walk</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="landmark-card text-center">
                    <div class="landmark-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <h5>Grand Socco</h5>
                    <p class="text-muted small">8 minutes walk</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Location CTA -->
<section class="location-cta py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">Ready to Visit Us?</h3>
                <p class="mb-0">Come experience authentic Moroccan hospitality in the heart of Tangier</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="cta-buttons">
                    <a href="../pages/reservation.php" class="btn btn-light btn-lg me-3">
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

<style>
.map-container {
    position: relative;
}

.google-map {
    border: 2px solid #f0f0f0;
    overflow: hidden;
}

.map-placeholder {
    border: 2px dashed #ddd;
}

.info-card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border: 1px solid #f0f0f0;
}

.contact-item {
    display: flex;
    align-items: flex-start;
}

.contact-icon {
    width: 40px;
    margin-right: 15px;
    margin-top: 5px;
    text-align: center;
}

.contact-icon i {
    font-size: 1.2rem;
}

.hours-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid #f0f0f0;
}

.hours-row:last-child {
    border-bottom: none;
}

.hours-row.current-day {
    background: rgba(212, 165, 116, 0.1);
    margin: 0 -15px;
    padding: 8px 15px;
    border-radius: 6px;
}

.day {
    font-weight: 500;
}

.time {
    color: #6c757d;
    font-weight: 500;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
}

.status-badge.open {
    background: #d4edda;
    color: #155724;
}

.status-badge.closed {
    background: #f8d7da;
    color: #721c24;
}

.transport-item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.transport-item i {
    width: 30px;
    margin-right: 15px;
    font-size: 1.1rem;
}

.landmark-card {
    background: white;
    padding: 30px 20px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.landmark-card:hover {
    transform: translateY(-5px);
}

.landmark-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    color: white;
    font-size: 1.5rem;
}

@media (max-width: 768px) {
    .google-map {
        height: 350px !important;
    }
    
    .cta-buttons .btn {
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }
    
    .landmark-card {
        margin-bottom: 20px;
    }
}
</style>

<script>
// Google Maps initialization
let map;
let marker;

function initMap() {
    // Restaurant coordinates (Tangier, Morocco)
    const restaurantLocation = { lat: 35.7595, lng: -5.8340 };
    
    // Create map
    map = new google.maps.Map(document.getElementById("googleMap"), {
        zoom: 15,
        center: restaurantLocation,
        styles: [
            {
                featureType: "poi",
                elementType: "geometry",
                stylers: [{ color: "#f5f5f5" }]
            },
            {
                featureType: "poi",
                elementType: "labels.text.fill",
                stylers: [{ color: "#757575" }]
            }
        ]
    });
    
    // Create marker
    marker = new google.maps.Marker({
        position: restaurantLocation,
        map: map,
        title: "Café Marrakech",
        animation: google.maps.Animation.DROP,
        icon: {
            url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#d4a574" width="40" height="40"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>'),
            scaledSize: new google.maps.Size(40, 40)
        }
    });
    
    // Info window
    const infoWindow = new google.maps.InfoWindow({
        content: `
            <div style="padding: 10px; max-width: 250px;">
                <h6 style="margin: 0 0 10px 0; color: #d4a574;">Café Marrakech</h6>
                <p style="margin: 0 0 5px 0; font-size: 14px;">Avenue Mohammed V, Tangier</p>
                <p style="margin: 0 0 10px 0; font-size: 12px; color: #666;">Authentic Moroccan Cuisine</p>
                <div style="display: flex; gap: 10px;">
                    <a href="../pages/reservation.php" style="background: #d4a574; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 12px;">Book Table</a>
                    <a href="tel:+212539123456" style="background: #28a745; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 12px;">Call Now</a>
                </div>
            </div>
        `
    });
    
    // Open info window on marker click
    marker.addListener("click", () => {
        infoWindow.open(map, marker);
    });
    
    // Hide placeholder and show map
    document.querySelector('.map-placeholder').style.display = 'none';
}

function centerMap() {
    if (map && marker) {
        map.setCenter(marker.getPosition());
        map.setZoom(15);
    }
}

function getDirections() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const origin = position.coords.latitude + ',' + position.coords.longitude;
            const destination = '35.7595,-5.8340';
            const url = `https://www.google.com/maps/dir/${origin}/${destination}`;
            window.open(url, '_blank');
        });
    } else {
        const url = 'https://www.google.com/maps/dir//35.7595,-5.8340';
        window.open(url, '_blank');
    }
}

// Update opening status
function updateOpeningStatus() {
    const now = new Date();
    const day = now.getDay(); // 0 = Sunday, 1 = Monday, etc.
    const hour = now.getHours();
    
    const hours = {
        0: {open: 8, close: 22}, // Sunday
        1: {open: 7, close: 23}, // Monday
        2: {open: 7, close: 23}, // Tuesday
        3: {open: 7, close: 23}, // Wednesday
        4: {open: 7, close: 23}, // Thursday
        5: {open: 7, close: 24}, // Friday
        6: {open: 7, close: 24}  // Saturday
    };
    
    const todayHours = hours[day];
    const isOpen = hour >= todayHours.open && hour < todayHours.close;
    
    const statusBadge = document.querySelector('.status-badge');
    const statusText = statusBadge.querySelector('span');
    const statusTime = statusBadge.parentElement.querySelector('small');
    
    if (isOpen) {
        statusBadge.className = 'status-badge open';
        statusText.textContent = 'Open Now';
        statusTime.textContent = `Closes at ${todayHours.close}:00`;
    } else {
        statusBadge.className = 'status-badge closed';
        statusText.textContent = 'Closed';
        statusTime.textContent = `Opens at ${todayHours.open}:00`;
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateOpeningStatus();
    
    // If Google Maps fails to load, keep placeholder visible
    setTimeout(function() {
        if (document.querySelector('.map-placeholder').style.display !== 'none') {
            console.log('Google Maps failed to load, showing placeholder');
        }
    }, 5000);
});
</script>

<?php include '../includes/footer.php'; ?>