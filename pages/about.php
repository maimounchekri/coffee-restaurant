<?php
require_once '../config/config.php';

$pageTitle = 'About Us - ' . SITE_NAME;
include '../includes/header.php';
?>

<!-- Page Header -->
<section class="page-header bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">About Café Marrakech</h1>
                <p class="lead mb-0">
                    Bringing authentic Moroccan flavors and warm hospitality to the heart of Tangier
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

<!-- Our Story -->
<section class="our-story py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="story-content">
                    <span class="text-primary fw-bold text-uppercase tracking-wide">Our Story</span>
                    <h2 class="display-5 fw-bold mb-4">A Passion for Authentic Flavors</h2>
                    <p class="text-muted mb-4">
                        Founded in 2020 by Chef Amina Benali, Café Marrakech was born from a deep love for 
                        traditional Moroccan cuisine and a desire to share these incredible flavors with the world. 
                        What started as a small family recipe collection has grown into Tangier's beloved culinary destination.
                    </p>
                    <p class="text-muted mb-4">
                        Our journey began in the bustling souks of Marrakech, where Chef Amina learned the secrets 
                        of authentic Moroccan cooking from her grandmother. Every dish we serve carries forward these 
                        time-honored traditions, prepared with the same care and attention to detail that has been 
                        passed down through generations.
                    </p>
                    <p class="text-muted mb-4">
                        Today, we're proud to be more than just a restaurant – we're a cultural bridge, bringing 
                        people together through the universal language of exceptional food and warm Moroccan hospitality.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="story-image">
                    <div class="image-grid">
                        <div class="main-image">
                            <img src="../assets/images/chef-cooking.jpg" alt="Chef Amina cooking" class="img-fluid rounded-4 shadow">
                        </div>
                        <div class="overlay-stats">
                            <div class="stat-item">
                                <h3>5+</h3>
                                <p>Years Experience</p>
                            </div>
                            <div class="stat-item">
                                <h3>1000+</h3>
                                <p>Happy Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="our-values py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-primary fw-bold text-uppercase tracking-wide">Our Values</span>
            <h2 class="display-5 fw-bold">What We Stand For</h2>
            <p class="text-muted">The principles that guide everything we do</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4 class="value-title">Authenticity</h4>
                    <p class="text-muted">
                        We stay true to traditional Moroccan recipes and cooking methods, 
                        ensuring every dish reflects the genuine flavors of Morocco.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4 class="value-title">Fresh Quality</h4>
                    <p class="text-muted">
                        We source the finest local ingredients daily, supporting local farmers 
                        and ensuring the freshest flavors in every meal.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="value-title">Community</h4>
                    <p class="text-muted">
                        We believe in bringing people together through food, creating a 
                        welcoming space where cultures meet and friendships are born.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h4 class="value-title">Sustainability</h4>
                    <p class="text-muted">
                        We're committed to sustainable practices, from eco-friendly packaging 
                        to reducing food waste and supporting local suppliers.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4 class="value-title">Excellence</h4>
                    <p class="text-muted">
                        We pursue excellence in every aspect of our service, from the quality 
                        of our food to the warmth of our hospitality.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="value-title">Respect</h4>
                    <p class="text-muted">
                        We treat every guest, team member, and partner with respect, 
                        fostering an inclusive environment for all.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Meet Our Team -->
<section class="our-team py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-primary fw-bold text-uppercase tracking-wide">Our Team</span>
            <h2 class="display-5 fw-bold">Meet the People Behind the Magic</h2>
            <p class="text-muted">The passionate individuals who make Café Marrakech special</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center">
                    <div class="team-image">
                        <img src="../assets/images/team/chef-amina.jpg" alt="Chef Amina Benali" class="img-fluid rounded-circle">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <h5 class="team-name">Chef Amina Benali</h5>
                    <p class="team-position text-primary">Executive Chef & Founder</p>
                    <p class="team-bio text-muted">
                        With over 15 years of culinary experience, Chef Amina brings authentic 
                        Moroccan flavors to every dish she creates.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center">
                    <div class="team-image">
                        <img src="../assets/images/team/manager-hassan.jpg" alt="Hassan El Mansouri" class="img-fluid rounded-circle">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <h5 class="team-name">Hassan El Mansouri</h5>
                    <p class="team-position text-primary">Restaurant Manager</p>
                    <p class="team-bio text-muted">
                        Hassan ensures every guest feels welcomed with his warm personality 
                        and attention to detail in service excellence.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center">
                    <div class="team-image">
                        <img src="../assets/images/team/barista-fatima.jpg" alt="Fatima Zahra" class="img-fluid rounded-circle">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <h5 class="team-name">Fatima Zahra</h5>
                    <p class="team-position text-primary">Head Barista</p>
                    <p class="team-bio text-muted">
                        Fatima crafts perfect coffee blends and specialty drinks, bringing 
                        artistry to every cup she serves.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Kitchen -->
<section class="our-kitchen py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="kitchen-content">
                    <span class="text-primary fw-bold text-uppercase tracking-wide">Our Kitchen</span>
                    <h2 class="display-5 fw-bold mb-4">Where Magic Happens</h2>
                    <p class="text-muted mb-4">
                        Step into our open kitchen concept where you can witness the artistry of 
                        Moroccan cooking. Our chefs use traditional cooking methods combined with 
                        modern techniques to create unforgettable culinary experiences.
                    </p>
                    
                    <div class="kitchen-features">
                        <div class="feature-item">
                            <i class="fas fa-fire text-primary"></i>
                            <div>
                                <h6>Traditional Tagine Cooking</h6>
                                <p class="text-muted small">Slow-cooked in authentic clay tagines for rich, complex flavors</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-seedling text-primary"></i>
                            <div>
                                <h6>Fresh Herb Garden</h6>
                                <p class="text-muted small">We grow our own herbs and spices for maximum freshness</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-award text-primary"></i>
                            <div>
                                <h6>Certified Organic</h6>
                                <p class="text-muted small">Using certified organic ingredients whenever possible</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="kitchen-gallery">
                    <div class="gallery-grid">
                        <div class="gallery-item main">
                            <img src="../assets/images/kitchen-main.jpg" alt="Main kitchen area" class="img-fluid rounded-3">
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/kitchen-tagines.jpg" alt="Tagine preparation" class="img-fluid rounded-3">
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/kitchen-spices.jpg" alt="Spice preparation" class="img-fluid rounded-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Awards & Recognition -->
<section class="awards py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-primary fw-bold text-uppercase tracking-wide">Recognition</span>
            <h2 class="display-5 fw-bold">Awards & Achievements</h2>
            <p class="text-muted">We're honored to be recognized for our commitment to excellence</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="award-card text-center">
                    <div class="award-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h5>Best Moroccan Restaurant</h5>
                    <p class="text-muted">Tangier Tourism Board 2023</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="award-card text-center">
                    <div class="award-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h5>Excellence in Service</h5>
                    <p class="text-muted">TripAdvisor Certificate 2023</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="award-card text-center">
                    <div class="award-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h5>Sustainable Dining</h5>
                    <p class="text-muted">Green Restaurant Association 2022</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="award-card text-center">
                    <div class="award-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h5>Community Choice</h5>
                    <p class="text-muted">Local Business Awards 2022</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Customer Testimonials -->
<section class="testimonials py-5 bg-primary text-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">What Our Guests Say</h2>
            <p class="lead opacity-75">Hear from our valued customers about their experiences</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="testimonial-card">
                    <div class="stars mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Absolutely incredible! The tagine was perfectly spiced and the atmosphere 
                        transported us straight to Morocco. Can't wait to return!"
                    </p>
                    <div class="testimonial-author">
                        <strong>Sarah Johnson</strong>
                        <small class="opacity-75">Food Blogger</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-card">
                    <div class="stars mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "The most authentic Moroccan food I've had outside of Morocco. The staff 
                        is incredibly welcoming and the coffee is outstanding!"
                    </p>
                    <div class="testimonial-author">
                        <strong>Ahmed El Fassi</strong>
                        <small class="opacity-75">Travel Writer</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-card">
                    <div class="stars mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "A hidden gem in Tangier! Every dish tells a story and you can taste 
                        the love and tradition in every bite. Highly recommended!"
                    </p>
                    <div class="testimonial-author">
                        <strong>Maria Rodriguez</strong>
                        <small class="opacity-75">Food Enthusiast</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="about-cta py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">Ready to Experience Our Story?</h3>
                <p class="mb-0">Join us for an authentic Moroccan dining experience that you'll never forget.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="cta-buttons">
                    <a href="../pages/reservation.php" class="btn btn-primary btn-lg me-3">
                        <i class="fas fa-calendar me-2"></i>Book Now
                    </a>
                    <a href="../pages/menu.php" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-utensils me-2"></i>View Menu
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.story-image {
    position: relative;
}

.image-grid {
    position: relative;
}

.main-image {
    position: relative;
}

.overlay-stats {
    position: absolute;
    bottom: -20px;
    right: -20px;
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    display: flex;
    gap: 20px;
}

.stat-item {
    text-align: center;
}

.stat-item h3 {
    color: var(--primary-color);
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.stat-item p {
    margin: 0;
    font-size: 0.9rem;
    color: #6c757d;
}

.value-card {
    background: white;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.value-card:hover {
    transform: translateY(-5px);
}

.value-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    font-size: 2rem;
}

.value-title {
    color: var(--text-primary);
    margin-bottom: 15px;
}

.team-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.team-card:hover {
    transform: translateY(-5px);
}

.team-image {
    position: relative;
    margin-bottom: 20px;
}

.team-image img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin: 0 auto;
}

.team-overlay {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 150px;
    height: 150px;
    background: rgba(212, 165, 116, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.team-card:hover .team-overlay {
    opacity: 1;
}

.social-links {
    display: flex;
    gap: 10px;
}

.social-link {
    width: 40px;
    height: 40px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    text-decoration: none;
    transition: transform 0.3s ease;
}

.social-link:hover {
    transform: scale(1.1);
    color: var(--primary-dark);
}

.team-name {
    color: var(--text-primary);
    margin-bottom: 5px;
}

.team-position {
    font-weight: 600;
    margin-bottom: 15px;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
}

.feature-item i {
    width: 30px;
    margin-right: 15px;
    margin-top: 5px;
    font-size: 1.2rem;
}

.gallery-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 15px;
    height: 400px;
}

.gallery-item.main {
    grid-row: 1 / 3;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.award-card {
    background: white;
    padding: 30px 20px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.award-card:hover {
    transform: translateY(-5px);
}

.award-icon {
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

.testimonial-card {
    background: rgba(255, 255, 255, 0.1);
    padding: 30px;
    border-radius: 12px;
    backdrop-filter: blur(10px);
}

.stars {
    color: #ffd700;
}

.testimonial-text {
    font-style: italic;
    margin-bottom: 20px;
    line-height: 1.6;
}

.testimonial-author strong {
    display: block;
    margin-bottom: 5px;
}

@media (max-width: 768px) {
    .overlay-stats {
        position: static;
        margin-top: 20px;
        justify-content: center;
    }
    
    .gallery-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto auto auto;
        height: auto;
    }
    
    .gallery-item.main {
        grid-row: 1;
    }
    
    .cta-buttons .btn {
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }
    
    .value-card, .team-card, .award-card {
        margin-bottom: 20px;
    }
}
</style>

<?php include '../includes/footer.php'; ?>
