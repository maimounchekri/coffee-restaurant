<?php
// Remove or comment out the old chat widget code and replace with this updated footer.php
?>
</main>
    
    <!-- Footer -->
    <footer class="footer bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4">
                <!-- About Section -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-section">
                        <h5 class="mb-4">
                            <i class="fas fa-coffee me-2 text-primary"></i>
                            <?php echo SITE_NAME; ?>
                        </h5>
                        <p class="text-light mb-4">
                            Experience authentic Moroccan cuisine and premium coffee in the heart of Tangier. 
                            We bring together traditional flavors with modern hospitality.
                        </p>
                        <div class="social-links">
                            <a href="#" class="social-link me-3">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-link me-3">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link me-3">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <div class="footer-section">
                        <h6 class="mb-4">Quick Links</h6>
                        <ul class="footer-links">
                            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                            <li><a href="<?php echo SITE_URL; ?>/pages/menu.php">Menu</a></li>
                            <li><a href="<?php echo SITE_URL; ?>/pages/reservation.php">Reservations</a></li>
                            <li><a href="<?php echo SITE_URL; ?>/pages/about.php">About Us</a></li>
                            <li><a href="<?php echo SITE_URL; ?>/pages/contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                
                <!-- Menu Categories -->
                <div class="col-lg-2 col-md-6">
                    <div class="footer-section">
                        <h6 class="mb-4">Our Menu</h6>
                        <ul class="footer-links">
                            <li><a href="<?php echo SITE_URL; ?>/pages/menu.php?section=coffee">Coffee</a></li>
                            <li><a href="<?php echo SITE_URL; ?>/pages/menu.php?section=restaurant">Restaurant</a></li>
                            <li><a href="<?php echo SITE_URL; ?>/pages/menu.php?category=hot-coffee">Hot Coffee</a></li>
                            <li><a href="<?php echo SITE_URL; ?>/pages/menu.php?category=main-courses">Main Courses</a></li>
                            <li><a href="<?php echo SITE_URL; ?>/pages/menu.php?category=desserts">Desserts</a></li>
                        </ul>
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-section">
                        <h6 class="mb-4">Get in Touch</h6>
                        <div class="contact-info">
                            <div class="contact-item mb-3">
                                <i class="fas fa-map-marker-alt text-primary me-3"></i>
                                <div>
                                    <strong>Address</strong><br>
                                    <span class="text-light">Avenue Mohammed V, Tangier, Morocco</span>
                                </div>
                            </div>
                            <div class="contact-item mb-3">
                                <i class="fas fa-phone text-primary me-3"></i>
                                <div>
                                    <strong>Phone</strong><br>
                                    <a href="tel:+212539123456" class="text-light">+212 539 123 456</a>
                                </div>
                            </div>
                            <div class="contact-item mb-3">
                                <i class="fas fa-envelope text-primary me-3"></i>
                                <div>
                                    <strong>Email</strong><br>
                                    <a href="mailto:info@cafemarrakech.com" class="text-light">info@cafemarrakech.com</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-clock text-primary me-3"></i>
                                <div>
                                    <strong>Opening Hours</strong><br>
                                    <span class="text-light">Mon-Thu: 7:00 AM - 11:00 PM</span><br>
                                    <span class="text-light">Fri-Sat: 7:00 AM - 12:00 AM</span><br>
                                    <span class="text-light">Sunday: 8:00 AM - 10:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Newsletter -->
            <div class="row mt-5 pt-4 border-top border-secondary">
                <div class="col-lg-8">
                    <div class="newsletter">
                        <h6 class="mb-3">Stay Updated</h6>
                        <p class="text-light mb-3">Subscribe to our newsletter for special offers and updates</p>
                        <form class="newsletter-form" id="newsletterForm">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your email" required>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-paper-plane me-2"></i>Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="footer-cta">
                        <a href="<?php echo SITE_URL; ?>/pages/reservation.php" class="btn btn-outline-primary">
                            <i class="fas fa-calendar me-2"></i>Book a Table
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bottom Bar -->
    <div class="bottom-bar bg-black text-white py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="footer-links-inline">
                        <a href="#" class="text-light me-3">Privacy Policy</a>
                        <a href="#" class="text-light me-3">Terms of Service</a>
                        <a href="#" class="text-light">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- REMOVE OLD CHAT WIDGET CODE AND REPLACE WITH NEW PROFESSIONAL CHAT WIDGET -->
    
    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" style="display: none;">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay" style="display: none;">
        <div class="loading-spinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Custom Scripts -->
    <script src="<?php echo ASSETS_URL; ?>/js/main.js"></script>
    
    <!-- NEW PROFESSIONAL CHAT WIDGET -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/chat-widget.css">
    <script src="<?php echo ASSETS_URL; ?>/js/chat-widget.js"></script>
    
    <?php if (isset($additionalScripts)): ?>
        <?php foreach ($additionalScripts as $script): ?>
            <script src="<?php echo $script; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <script>
        // Global JavaScript variables
        window.SITE_URL = '<?php echo SITE_URL; ?>';
        window.ASSETS_URL = '<?php echo ASSETS_URL; ?>';
        
        // Page-specific initialization
        $(document).ready(function() {
            // Initialize components
            initializeNavbar();
            initializeBackToTop();
            initializeAnimations();
            
            // Auto-hide flash messages
            setTimeout(function() {
                $('.alert').fadeOut();
            }, 5000);
        });
        
        // Initialize navbar scroll effect
        function initializeNavbar() {
            $(window).scroll(function() {
                if ($(window).scrollTop() > 50) {
                    $('.navbar').addClass('scrolled');
                } else {
                    $('.navbar').removeClass('scrolled');
                }
            });
        }
        
        // Initialize back to top button
        function initializeBackToTop() {
            $(window).scroll(function() {
                if ($(window).scrollTop() > 300) {
                    $('#backToTop').fadeIn();
                } else {
                    $('#backToTop').fadeOut();
                }
            });
            
            $('#backToTop').click(function() {
                $('html, body').animate({scrollTop: 0}, 800);
                return false;
            });
        }
        
        // Initialize animations
        function initializeAnimations() {
            // Animate elements when they come into view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-up');
                    }
                });
            });
            
            document.querySelectorAll('.animate-on-scroll').forEach((el) => {
                observer.observe(el);
            });
        }
        
        // Newsletter form submission
        $('#newsletterForm').submit(function(e) {
            e.preventDefault();
            const email = $(this).find('input[type="email"]').val();
            
            // Here you can add AJAX call to your newsletter API
            alert('Thank you for subscribing! We\'ll keep you updated with our latest news and offers.');
            
            // Reset form
            this.reset();
        });
    </script>
</body>
</html>
