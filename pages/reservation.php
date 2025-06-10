<?php
require_once '../config/config.php';

// Handle form submission
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = sanitizeInput($_POST['customer_name'] ?? '');
    $customerEmail = sanitizeInput($_POST['customer_email'] ?? '');
    $customerPhone = sanitizeInput($_POST['customer_phone'] ?? '');
    $partySize = (int)($_POST['party_size'] ?? 0);
    $reservationDate = sanitizeInput($_POST['reservation_date'] ?? '');
    $reservationTime = sanitizeInput($_POST['reservation_time'] ?? '');
    $tableId = $_POST['table_id'] ?? null;
    $specialRequests = sanitizeInput($_POST['special_requests'] ?? '');
    $csrfToken = $_POST['csrf_token'] ?? '';
    
    // Validate CSRF token
    if (!validateCSRFToken($csrfToken)) {
        $message = 'Invalid security token. Please try again.';
        $messageType = 'error';
    } else {
        // Validate required fields
        $errors = [];
        
        if (empty($customerName)) $errors[] = 'Customer name is required';
        if (empty($customerEmail)) $errors[] = 'Email address is required';
        if (!isValidEmail($customerEmail)) $errors[] = 'Please enter a valid email address';
        if (empty($customerPhone)) $errors[] = 'Phone number is required';
        if ($partySize < 1 || $partySize > 20) $errors[] = 'Party size must be between 1 and 20';
        if (empty($reservationDate)) $errors[] = 'Reservation date is required';
        if (empty($reservationTime)) $errors[] = 'Reservation time is required';
        
        // Validate date and time
        if (!empty($reservationDate) && !empty($reservationTime)) {
            $reservationDateTime = $reservationDate . ' ' . $reservationTime;
            $minDateTime = date('Y-m-d H:i:s', strtotime('+' . MIN_RESERVATION_HOURS . ' hours'));
            
            if (strtotime($reservationDateTime) < strtotime($minDateTime)) {
                $errors[] = 'Reservations must be made at least ' . MIN_RESERVATION_HOURS . ' hours in advance';
            }
            
            $maxDateTime = date('Y-m-d H:i:s', strtotime('+' . MAX_RESERVATION_DAYS . ' days'));
            if (strtotime($reservationDateTime) > strtotime($maxDateTime)) {
                $errors[] = 'Reservations cannot be made more than ' . MAX_RESERVATION_DAYS . ' days in advance';
            }
        }
        
        if (empty($errors)) {
            try {
                // Check table availability if table is selected
                if (!empty($tableId)) {
                    $conflictCheck = fetchOne("
                        SELECT COUNT(*) as count 
                        FROM reservations 
                        WHERE table_id = ? 
                        AND reservation_date = ? 
                        AND reservation_time = ? 
                        AND status IN ('pending', 'confirmed')
                    ", [$tableId, $reservationDate, $reservationTime]);
                    
                    if ($conflictCheck['count'] > 0) {
                        $errors[] = 'Selected table is not available at the requested time';
                    }
                }
                
                if (empty($errors)) {
                    // Insert reservation
                    $reservationData = [
                        'customer_name' => $customerName,
                        'customer_email' => $customerEmail,
                        'customer_phone' => $customerPhone,
                        'party_size' => $partySize,
                        'reservation_date' => $reservationDate,
                        'reservation_time' => $reservationTime,
                        'special_requests' => $specialRequests,
                        'status' => 'pending'
                    ];
                    
                    if (!empty($tableId)) {
                        $reservationData['table_id'] = $tableId;
                    }
                    
                    $reservationId = insertRecord('reservations', $reservationData);
                    
                    if ($reservationId) {
                        $message = 'Your reservation has been submitted successfully! We will contact you shortly to confirm.';
                        $messageType = 'success';
                        
                        // Clear form data
                        $_POST = [];
                    } else {
                        $message = 'Failed to submit reservation. Please try again.';
                        $messageType = 'error';
                    }
                }
            } catch (Exception $e) {
                error_log("Reservation error: " . $e->getMessage());
                $message = 'An error occurred while processing your reservation. Please try again.';
                $messageType = 'error';
            }
        } else {
            $message = implode('<br>', $errors);
            $messageType = 'error';
        }
    }
}

// Get available tables
$tables = fetchAll("
    SELECT * FROM restaurant_tables 
    WHERE status = 'available' 
    ORDER BY capacity ASC, table_number ASC
");

// Get time slots
$timeSlots = RESERVATION_TIME_SLOTS;

// Calculate minimum and maximum dates
$minDate = date('Y-m-d', strtotime('+' . MIN_RESERVATION_HOURS . ' hours'));
$maxDate = date('Y-m-d', strtotime('+' . MAX_RESERVATION_DAYS . ' days'));

$pageTitle = 'Book a Table - ' . SITE_NAME;
$additionalScripts = [ASSETS_URL . '/js/reservation.js'];
include '../includes/header.php';
?>

<!-- Page Header -->
<section class="page-header bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Book a Table</h1>
                <p class="lead mb-0">
                    Reserve your spot for an unforgettable dining experience at Café Marrakech
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="contact-info text-white">
                    <div class="mb-2">
                        <i class="fas fa-phone me-2"></i>
                        <a href="tel:+212539123456" class="text-white text-decoration-none">+212 539 123 456</a>
                    </div>
                    <div>
                        <i class="fas fa-clock me-2"></i>
                        <span>Open Daily 7:00 AM - 11:00 PM</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reservation Form -->
<section class="reservation-form py-5">
    <div class="container">
        <?php if (!empty($message)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-<?php echo $messageType === 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                        <i class="fas fa-<?php echo $messageType === 'success' ? 'check-circle' : 'exclamation-circle'; ?> me-2"></i>
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="row">
            <!-- Form Column -->
            <div class="col-lg-8">
                <div class="reservation-card">
                    <div class="card-header">
                        <h3 class="mb-0">
                            <i class="fas fa-calendar-check me-2 text-primary"></i>
                            Make a Reservation
                        </h3>
                        <p class="text-muted mb-0">Fill out the form below to book your table</p>
                    </div>
                    
                    <form method="POST" class="needs-validation" novalidate>
                        <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                        
                        <!-- Personal Information -->
                        <div class="form-section">
                            <h5 class="section-title">Personal Information</h5>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="customer_name" class="form-label">
                                        Full Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="customer_name" name="customer_name" 
                                           value="<?php echo htmlspecialchars($_POST['customer_name'] ?? ''); ?>" required>
                                    <div class="invalid-feedback">Please provide your full name.</div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="customer_email" class="form-label">
                                        Email Address <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" id="customer_email" name="customer_email" 
                                           value="<?php echo htmlspecialchars($_POST['customer_email'] ?? ''); ?>" required>
                                    <div class="invalid-feedback">Please provide a valid email address.</div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="customer_phone" class="form-label">
                                        Phone Number <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control" id="customer_phone" name="customer_phone" 
                                           placeholder="+212 xxx xxx xxx" 
                                           value="<?php echo htmlspecialchars($_POST['customer_phone'] ?? ''); ?>" required>
                                    <div class="invalid-feedback">Please provide a valid phone number.</div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="party_size" class="form-label">
                                        Number of Guests <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" id="party_size" name="party_size" required>
                                        <option value="">Select party size</option>
                                        <?php for ($i = 1; $i <= 20; $i++): ?>
                                            <option value="<?php echo $i; ?>" <?php echo (isset($_POST['party_size']) && $_POST['party_size'] == $i) ? 'selected' : ''; ?>>
                                                <?php echo $i; ?> <?php echo $i === 1 ? 'Guest' : 'Guests'; ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                    <div class="invalid-feedback">Please select the number of guests.</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Date and Time -->
                        <div class="form-section">
                            <h5 class="section-title">Date & Time</h5>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="reservation_date" class="form-label">
                                        Preferred Date <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control" id="reservation_date" name="reservation_date"
                                           min="<?php echo $minDate; ?>" max="<?php echo $maxDate; ?>" 
                                           value="<?php echo htmlspecialchars($_POST['reservation_date'] ?? ''); ?>" required>
                                    <div class="invalid-feedback">Please select a valid date.</div>
                                    <small class="form-text text-muted">
                                        Reservations must be made at least <?php echo MIN_RESERVATION_HOURS; ?> hours in advance
                                    </small>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="reservation_time" class="form-label">
                                        Preferred Time <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" id="reservation_time" name="reservation_time" required>
                                        <option value="">Select time</option>
                                        <?php foreach ($timeSlots as $time): ?>
                                            <option value="<?php echo $time; ?>" <?php echo (isset($_POST['reservation_time']) && $_POST['reservation_time'] == $time) ? 'selected' : ''; ?>>
                                                <?php echo date('g:i A', strtotime($time)); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Please select a preferred time.</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Table Selection -->
                        <div class="form-section">
                            <h5 class="section-title">Table Preference (Optional)</h5>
                            <p class="text-muted">Select your preferred table or leave unselected for automatic assignment</p>
                            
                            <div class="table-selection" id="tableSelection">
                                <div class="row g-3">
                                    <?php foreach ($tables as $table): ?>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="table-option" data-table-id="<?php echo $table['id']; ?>" 
                                                 data-capacity="<?php echo $table['capacity']; ?>">
                                                <input type="radio" class="table-radio" name="table_id" 
                                                       value="<?php echo $table['id']; ?>" id="table_<?php echo $table['id']; ?>"
                                                       <?php echo (isset($_POST['table_id']) && $_POST['table_id'] == $table['id']) ? 'checked' : ''; ?>>
                                                <label for="table_<?php echo $table['id']; ?>" class="table-card">
                                                    <div class="table-number">
                                                        Table <?php echo htmlspecialchars($table['table_number']); ?>
                                                    </div>
                                                    <div class="table-capacity">
                                                        <i class="fas fa-users me-2"></i>
                                                        Up to <?php echo $table['capacity']; ?> guests
                                                    </div>
                                                    <div class="table-location">
                                                        <i class="fas fa-map-marker-alt me-2"></i>
                                                        <?php echo htmlspecialchars($table['location']); ?>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Special Requests -->
                        <div class="form-section">
                            <h5 class="section-title">Special Requests</h5>
                            
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="special_requests" class="form-label">
                                        Additional Notes (Optional)
                                    </label>
                                    <textarea class="form-control" id="special_requests" name="special_requests" 
                                              rows="4" placeholder="Any special dietary requirements, allergies, celebration details, or other requests..."><?php echo htmlspecialchars($_POST['special_requests'] ?? ''); ?></textarea>
                                    <small class="form-text text-muted">
                                        Let us know about birthdays, anniversaries, dietary restrictions, etc.
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="form-section">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-outline-secondary btn-lg me-md-2" id="resetForm">
                                    <i class="fas fa-undo me-2"></i>Reset Form
                                </button>
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-calendar-check me-2"></i>Book Table
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Info Sidebar -->
            <div class="col-lg-4">
                <div class="reservation-info">
                    <!-- Reservation Policy -->
                    <div class="info-card mb-4">
                        <h5 class="card-title">
                            <i class="fas fa-info-circle me-2 text-primary"></i>
                            Reservation Policy
                        </h5>
                        <ul class="policy-list">
                            <li>Reservations must be made at least <?php echo MIN_RESERVATION_HOURS; ?> hours in advance</li>
                            <li>Tables are held for 15 minutes past reservation time</li>
                            <li>Large parties (8+ guests) may require a deposit</li>
                            <li>Cancellations should be made at least 2 hours in advance</li>
                            <li>We accommodate dietary restrictions with advance notice</li>
                            <li>Special occasions can be arranged with prior coordination</li>
                        </ul>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="info-card mb-4">
                        <h5 class="card-title">
                            <i class="fas fa-phone me-2 text-primary"></i>
                            Contact Us
                        </h5>
                        <div class="contact-details">
                            <div class="contact-item">
                                <strong>Phone:</strong><br>
                                <a href="tel:+212539123456" class="text-decoration-none">+212 539 123 456</a>
                            </div>
                            <div class="contact-item">
                                <strong>Email:</strong><br>
                                <a href="mailto:reservations@cafemarrakech.com" class="text-decoration-none">reservations@cafemarrakech.com</a>
                            </div>
                            <div class="contact-item">
                                <strong>Address:</strong><br>
                                Avenue Mohammed V<br>
                                Tangier, Morocco
                            </div>
                        </div>
                    </div>
                    
                    <!-- Opening Hours -->
                    <div class="info-card mb-4">
                        <h5 class="card-title">
                            <i class="fas fa-clock me-2 text-primary"></i>
                            Opening Hours
                        </h5>
                        <div class="hours-list">
                            <div class="hours-item">
                                <span class="day">Monday - Thursday</span>
                                <span class="time">7:00 AM - 11:00 PM</span>
                            </div>
                            <div class="hours-item">
                                <span class="day">Friday - Saturday</span>
                                <span class="time">7:00 AM - 12:00 AM</span>
                            </div>
                            <div class="hours-item">
                                <span class="day">Sunday</span>
                                <span class="time">8:00 AM - 10:00 PM</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Special Offers -->
                    <div class="info-card">
                        <h5 class="card-title">
                            <i class="fas fa-gift me-2 text-primary"></i>
                            Special Offers
                        </h5>
                        <div class="offers-list">
                            <div class="offer-item">
                                <strong>Happy Hour:</strong> 3:00 PM - 6:00 PM<br>
                                <small class="text-muted">20% off all beverages</small>
                            </div>
                            <div class="offer-item">
                                <strong>Weekend Brunch:</strong> Sat-Sun 9:00 AM - 2:00 PM<br>
                                <small class="text-muted">Special brunch menu available</small>
                            </div>
                            <div class="offer-item">
                                <strong>Birthday Special:</strong><br>
                                <small class="text-muted">Complimentary dessert for birthday celebrations</small>
                            </div>
                            <div class="offer-item">
                                <strong>Anniversary Package:</strong><br>
                                <small class="text-muted">Special table setup and complimentary appetizer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.reservation-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 30px;
    border-bottom: 1px solid #dee2e6;
}

.form-section {
    padding: 30px;
    border-bottom: 1px solid #f0f0f0;
}

.form-section:last-child {
    border-bottom: none;
}

.section-title {
    color: var(--primary-color);
    margin-bottom: 20px;
    font-weight: 600;
}

.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 12px 15px;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(212, 165, 116, 0.1);
}

.table-selection {
    max-height: 400px;
    overflow-y: auto;
}

.table-option {
    position: relative;
}

.table-radio {
    display: none;
}

.table-card {
    display: block;
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    height: 100%;
}

.table-card:hover {
    border-color: var(--primary-color);
    background: rgba(212, 165, 116, 0.05);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.table-radio:checked + .table-card {
    border-color: var(--primary-color);
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 20px rgba(212, 165, 116, 0.4);
}

.table-number {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.table-capacity {
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.table-location {
    font-size: 0.85rem;
    opacity: 0.8;
}

.info-card {
    background: white;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    border: 1px solid #f0f0f0;
}

.card-title {
    color: var(--text-primary);
    margin-bottom: 20px;
    font-size: 1.1rem;
}

.policy-list {
    list-style: none;
    padding: 0;
}

.policy-list li {
    padding: 8px 0;
    padding-left: 25px;
    position: relative;
    border-bottom: 1px solid #f8f9fa;
}

.policy-list li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: var(--primary-color);
    font-weight: bold;
}

.policy-list li:last-child {
    border-bottom: none;
}

.contact-details .contact-item {
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #f8f9fa;
}

.contact-details .contact-item:last-child {
    margin-bottom: 0;
    border-bottom: none;
}

.hours-list .hours-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #f8f9fa;
}

.hours-list .hours-item:last-child {
    border-bottom: none;
}

.day {
    font-weight: 500;
}

.time {
    color: var(--primary-color);
    font-weight: 600;
}

.offers-list .offer-item {
    margin-bottom: 20px;
    padding: 15px;
    background: rgba(212, 165, 116, 0.05);
    border-radius: 8px;
    border-left: 4px solid var(--primary-color);
}

.offers-list .offer-item:last-child {
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .form-section {
        padding: 20px;
    }
    
    .card-header {
        padding: 20px;
    }
    
    .table-card {
        padding: 15px;
    }
    
    .info-card {
        padding: 20px;
        margin-bottom: 20px;
    }
    
    .contact-info {
        text-align: center;
        margin-top: 20px;
    }
}
</style>

<script>
// Form validation and interaction
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.needs-validation');
    const partySizeSelect = document.getElementById('party_size');
    const tableOptions = document.querySelectorAll('.table-option');
    const resetButton = document.getElementById('resetForm');
    
    // Form validation
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
    
    // Filter tables based on party size
    partySizeSelect.addEventListener('change', function() {
        const partySize = parseInt(this.value) || 0;
        
        tableOptions.forEach(function(option) {
            const capacity = parseInt(option.dataset.capacity);
            const radio = option.querySelector('.table-radio');
            
            if (partySize > 0 && capacity < partySize) {
                option.style.opacity = '0.5';
                option.style.pointerEvents = 'none';
                radio.disabled = true;
                radio.checked = false;
            } else {
                option.style.opacity = '1';
                option.style.pointerEvents = 'auto';
                radio.disabled = false;
            }
        });
    });
    
    // Reset form
    resetButton.addEventListener('click', function() {
        if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
            form.reset();
            form.classList.remove('was-validated');
            
            // Reset table filters
            tableOptions.forEach(function(option) {
                option.style.opacity = '1';
                option.style.pointerEvents = 'auto';
                option.querySelector('.table-radio').disabled = false;
            });
        }
    });
    
    // Auto-dismiss alerts
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            if (alert.classList.contains('alert-success')) {
                setTimeout(function() {
                    alert.remove();
                }, 5000);
            }
        });
    }, 100);
});
</script>

<?php include '../includes/footer.php'; ?>