<?php
require_once '../config/config.php';

$pageTitle = 'Contact Us - ' . SITE_NAME;
$additionalScripts = [ASSETS_URL . '/js/contact.js'];
include '../includes/header.php';
?>

<!-- Page Header -->
<section class="page-header bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Get in Touch</h1>
                <p class="lead mb-0">
                    We'd love to hear from you. Send us a message and we'll respond as soon as possible.
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

<!-- Contact Form Section -->
<section class="contact-form-section py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="contact-form-container">
                    <div class="form-header mb-4">
                        <h3 class="mb-2">Send Us a Message</h3>
                        <p class="text-muted">Fill out the form below and we'll get back to you within 24 hours</p>
                    </div>
                    
                    <form id="contactForm" class="needs-validation" novalidate>
                        <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                        
                        <!-- Personal Information -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">
                                    First Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="firstName" name="first_name" required>
                                <div class="invalid-feedback">Please provide your first name.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">
                                    Last Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="lastName" name="last_name" required>
                                <div class="invalid-feedback">Please provide your last name.</div>
                            </div>
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="email" class="form-label">
                                    Email Address <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">Please provide a valid email address.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" 
                                       placeholder="+212 xxx xxx xxx">
                                <div class="invalid-feedback">Please provide a valid phone number.</div>
                            </div>
                        </div>
                        
                        <!-- Subject -->
                        <div class="mb-4">
                            <label for="subject" class="form-label">
                                Subject <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="reservation">Reservation Question</option>
                                <option value="menu">Menu Information</option>
                                <option value="catering">Catering Services</option>
                                <option value="events">Private Events</option>
                                <option value="feedback">Feedback</option>
                                <option value="complaint">Complaint</option>
                                <option value="other">Other</option>
                            </select>
                            <div class="invalid-feedback">Please select a subject.</div>
                        </div>
                        
                        <!-- Message -->
                        <div class="mb-4">
                            <label for="message" class="form-label">
                                Message <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control" id="message" name="message" rows="6" 
                                      placeholder="Tell us how we can help you..." required></textarea>
                            <div class="invalid-feedback">Please provide your message.</div>
                            <div class="form-text">Minimum 10 characters required</div>
                        </div>
                        
                        <!-- Preferred Contact Method -->
                        <div class="mb-4">
                            <label class="form-label">Preferred Contact Method</label>
                            <div class="row g-2">
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="contact_method" 
                                               id="contactEmail" value="email" checked>
                                        <label class="form-check-label" for="contactEmail">Email</label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="contact_method" 
                                               id="contactPhone" value="phone">
                                        <label class="form-check-label" for="contactPhone">Phone</label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="contact_method" 
                                               id="contactBoth" value="both">
                                        <label class="form-check-label" for="contactBoth">Either</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Newsletter Subscription -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter" value="1">
                                <label class="form-check-label" for="newsletter">
                                    Subscribe to our newsletter for special offers and updates
                                </label>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="reset" class="btn btn-outline-secondary btn-lg me-md-2">
                                <i class="fas fa-undo me-2"></i>Reset Form
                            </button>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Contact Information Sidebar -->
            <div class="col-lg-4">
                <div class="contact-info-sidebar">
                    <!-- Contact Details -->
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
                                <h6>Visit Us</h6>
                                <p class="mb-0">
                                    Avenue Mohammed V<br>
                                    Tangier, Morocco
                                </p>
                                <a href="../pages/location.php" class="small text-primary">Get Directions</a>
                            </div>
                        </div>
                        
                        <div class="contact-item mb-4">
                            <div class="contact-icon">
                                <i class="fas fa-phone text-primary"></i>
                            </div>
                            <div class="contact-details">
                                <h6>Call Us</h6>
                                <p class="mb-0">
                                    <a href="tel:+212539123456" class="text-decoration-none">+212 539 123 456</a>
                                </p>
                                <small class="text-muted">Daily: 7:00 AM - 11:00 PM</small>
                            </div>
                        </div>
                        
                        <div class="contact-item mb-4">
                            <div class="contact-icon">
                                <i class="fas fa-envelope text-primary"></i>
                            </div>
                            <div class="contact-details">
                                <h6>Email Us</h6>
                                <p class="mb-0">
                                    <a href="mailto:info@cafemarrakech.com" class="text-decoration-none">info@cafemarrakech.com</a>
                                </p>
                                <small class="text-muted">We respond within 24 hours</small>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-comments text-primary"></i>
                            </div>
                            <div class="contact-details">
                                <h6>Live Chat</h6>
                                <p class="mb-0">Available on our website</p>
                                <small class="text-muted">Instant responses during business hours</small>