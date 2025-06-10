# Coffee & Restaurant Website - Folder Structure

```
coffee-restaurant/
│
├── index.php                          # Main homepage
├── config/
│   ├── database.php                   # Database connection
│   ├── config.php                     # General configuration
│   └── install.php                    # Database installer script
│
├── admin/
│   ├── index.php                      # Admin dashboard
│   ├── login.php                      # Admin login
│   ├── logout.php                     # Admin logout
│   ├── categories.php                 # Manage categories
│   ├── items.php                      # Manage menu items
│   ├── reservations.php               # Manage reservations
│   ├── chat.php                       # Chat management
│   ├── users.php                      # User management
│   └── includes/
│       ├── header.php                 # Admin header
│       ├── footer.php                 # Admin footer
│       └── sidebar.php                # Admin sidebar
│
├── includes/
│   ├── header.php                     # Main site header
│   ├── footer.php                     # Main site footer
│   └── functions.php                  # Common functions
│
├── pages/
│   ├── menu.php                       # Menu display page
│   ├── reservation.php                # Reservation booking
│   ├── location.php                   # Location with Google Maps
│   ├── about.php                      # About page
│   └── contact.php                    # Contact page
│
├── api/
│   ├── reservation.php                # Reservation API
│   ├── chat.php                       # Chat API
│   ├── menu.php                       # Menu API
│   └── auth.php                       # Authentication API
│
├── assets/
│   ├── css/
│   │   ├── style.css                  # Main stylesheet
│   │   ├── admin.css                  # Admin panel styles
│   │   └── chat.css                   # Chat widget styles
│   │
│   ├── js/
│   │   ├── main.js                    # Main JavaScript
│   │   ├── admin.js                   # Admin panel JS
│   │   ├── chat.js                    # Chat functionality
│   │   ├── reservation.js             # Reservation booking JS
│   │   └── menu.js                    # Menu interactions
│   │
│   └── images/
│       ├── logo/                      # Logo files
│       ├── menu/                      # Menu item images
│       ├── gallery/                   # Restaurant gallery
│       └── backgrounds/               # Background images
│
├── uploads/                           # Uploaded files (menu images, etc.)
│
├── sql/
│   └── database.sql                   # Database structure
│
└── README.md                          # Installation instructions
```

## Key Components Overview:

### 1. **Frontend Structure**
- **index.php**: Homepage with hero section, featured items, and call-to-actions
- **pages/**: All customer-facing pages (menu, reservations, location)
- **includes/**: Shared components (header, footer, functions)

### 2. **Admin Panel**
- **admin/**: Complete admin interface
- Separate authentication system
- CRUD operations for all entities
- Role-based permissions
- Chat management system

### 3. **API Layer**
- **api/**: RESTful endpoints for AJAX operations
- Handles reservations, chat, menu updates
- JSON responses for dynamic interactions

### 4. **Assets Organization**
- **css/**: Responsive Bootstrap-based styling
- **js/**: Interactive functionality
- **images/**: Organized media files

### 5. **Database**
- **sql/**: Database structure and sample data
- **config/**: Database connection and installation scripts

### 6. **Security Features**
- Input validation and sanitization
- Prepared statements for SQL queries
- Session management
- CSRF protection
- Role-based access control

This structure ensures:
- ✅ Scalability and maintainability
- ✅ Clear separation of concerns
- ✅ Security best practices
- ✅ Responsive design with Bootstrap
- ✅ Easy deployment and setup