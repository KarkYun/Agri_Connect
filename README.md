# Agri Connect 🌱

Agri Connect is a comprehensive web platform that connects buyers with verified farmers and suppliers, promoting transparency, fair pricing, and sustainable growth in the agricultural industry.

## Features

- 🌾 **Crop Information & Galleries** - Detailed information about various crops including shea, pineapple, cocoa, coffee, cassava, yam, maize, and rice
- 👤 **User Authentication** - Secure registration and login system with password hashing
- 🛒 **Product Shop & Cart** - Interactive shopping experience with cart functionality
- 📧 **Newsletter Subscription** - Stay updated with agricultural news and updates
- 🔍 **Smart Search** - Advanced search functionality across different crop categories
- 📱 **Responsive Design** - Mobile-first design that works on all devices
- 🏠 **Modern UI/UX** - Clean and intuitive user interface

## Tech Stack

- **Frontend**: HTML5, CSS3 (SCSS), JavaScript
- **Backend**: PHP 8.x
- **Database**: MySQL
- **Server**: Apache (XAMPP)
- **Icons**: Font Awesome 6.7.2
- **Fonts**: Google Fonts (Poppins)

## Getting Started

### Prerequisites

- **XAMPP** v3.3.0+ (includes Apache, MySQL, PHP)
- **Git** (to clone the repository)
- **Modern web browser** (Chrome, Firefox, Safari, Edge)
- **Text editor** (VS Code recommended)

### Installation

1. **Download and Install XAMPP**

   - Download from [https://www.apachefriends.org/](https://www.apachefriends.org/)
   - Install and ensure Apache and MySQL services are available

2. **Clone the Repository**

   Open your terminal and run:

   ```sh
   git clone https://github.com/KwekuK/Agri_Connect.git
   ```

3. **Move the Project to XAMPP's `htdocs` Directory**

   Copy or move the cloned `Agri_Connect` folder into your XAMPP installation's `htdocs` directory.  
   
   **Windows Example:**
   ```
   C:\xampp\htdocs\Agri_Connect
   ```
   
   **macOS Example:**
   ```
   /Applications/XAMPP/xamppfiles/htdocs/Agri_Connect
   ```
   
   **Linux Example:**
   ```
   /opt/lampp/htdocs/Agri_Connect
   ```

4. **Start XAMPP Services**

   - Open the XAMPP Control Panel
   - Start **Apache** and **MySQL** services
   - Ensure both services show "Running" status

5. **Set Up the Database**

   - Open [phpMyAdmin](http://localhost/phpmyadmin/) in your browser
   - Create a new database named `agriconnect_login`
   - Create the following tables:

   **Users Table:**
   ```sql
   CREATE TABLE `users` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `firstName` varchar(50) NOT NULL,
     `lastName` varchar(50) NOT NULL,
     `email` varchar(100) NOT NULL UNIQUE,
     `password` varchar(255) NOT NULL,
     `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`id`)
   );
   ```

   **Email Table:**
   ```sql
   CREATE TABLE `email` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `email` varchar(100) NOT NULL,
     `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`id`)
   );
   ```

   **Article Table:**
   ```sql
   CREATE TABLE `article` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `search_term` varchar(256) NOT NULL,
     `result_title` varchar(255) NOT NULL,
     `result_content` text NOT NULL,
     `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`id`)
   );
   ```

6. **Configure Database Connection**

   Update database credentials in:
   - `login/connect.php`
   - `searchbar/dbh.php`
   - `newsletter/subscribe.php`

   Default XAMPP settings:
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "agriconnect_login";
   ```

7. **Access the Site**

   Open your browser and navigate to:

   ```
   http://localhost/Agri_Connect/index.php
   ```

   **Alternative Entry Points:**
   - Main page: `http://localhost/Agri_Connect/main/main.html`
   - Login: `http://localhost/Agri_Connect/login/login.php`
   - Shop: `http://localhost/Agri_Connect/shop/more.html`

## Project Structure

```
Agri_Connect/
├── index.php                 # Main landing page
├── main/                     # Home page components
│   ├── main.html
│   ├── css/
│   └── js/
├── login/                    # Authentication system
│   ├── login.php
│   ├── register.php
│   ├── connect.php
│   └── css/
├── shop/                     # E-commerce functionality
│   ├── more.html
│   ├── cart.js
│   └── css/
├── searchbar/               # Search functionality
│   ├── search.php
│   ├── dbh.php
│   └── css/
├── newsletter/              # Email subscription
│   └── subscribe.php
├── about/                   # About page
├── Cyrus/                   # Team member page
├── Dede/                    # Team member page
├── Pineapple/              # Pineapple crop info
├── shea/                   # Shea crop info
├── cocoa/                  # Cocoa crop info
├── coffee/                 # Coffee crop info
├── cassava/                # Cassava crop info
├── yam/                    # Yam crop info
├── maize/                  # Maize crop info
├── rice/                   # Rice crop info
├── css/                    # Global stylesheets
├── js/                     # Global JavaScript
├── images/                 # Image assets
└── README.md
```

## Key Features Explained

### 🔐 Authentication System
- Secure user registration with password hashing
- Login with "Remember Me" functionality
- Session management
- Account existence verification

### 🛒 Shopping Cart
- Add/remove products
- Quantity management
- Local storage persistence
- Responsive design

### 🔍 Search Functionality
- Search across crop categories
- Smart section navigation
- Database-driven results

### 📱 Responsive Design
- Mobile-first approach
- Breakpoints: 320px, 360px, 450px, 768px, 991px, 1200px+
- Touch-friendly interfaces

## Browser Compatibility

- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+

## Troubleshooting

### Common Issues

**1. "Access denied" database error:**
- Ensure MySQL is running in XAMPP
- Check database credentials in connection files
- Verify database exists in phpMyAdmin

**2. CSS/JS not loading:**
- Check file paths are correct
- Ensure Apache is running
- Clear browser cache

**3. PHP files downloading instead of executing:**
- Confirm Apache is running
- Access via `localhost`, not file://
- Ensure PHP is enabled in XAMPP

**4. Search not working:**
- Verify database connection
- Check if `article` table exists and has data
- Ensure proper form submission

### Performance Tips

- Enable gzip compression in Apache
- Optimize images (use WebP format)
- Minify CSS and JavaScript files
- Use browser caching

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Coding Standards

- Use meaningful variable names
- Comment complex functions
- Follow PSR-4 autoloading for PHP
- Use semantic HTML5 elements
- Follow BEM methodology for CSS

## Security Considerations

- ✅ Password hashing with `password_hash()`
- ✅ SQL injection prevention with `mysqli_real_escape_string()`
- ✅ Input validation and sanitization
- ✅ Session security
- ⚠️ HTTPS recommended for production

## Future Enhancements

- [ ] Payment integration
- [ ] Real-time chat system
- [ ] Mobile app development
- [ ] Advanced analytics dashboard
- [ ] Multi-language support
- [ ] API development

## Support

For support and questions:
- Create an issue on GitHub
- Email: agriconnect.support@example.com
- Documentation: Check the `/docs` folder (if available)

## License

This project is for educational purposes. All rights reserved.

## Acknowledgments

- **Team Members**: Group 10 Development Team
- **Icons**: Font Awesome
- **Fonts**: Google Fonts
- **Server**: Apache Friends (XAMPP)
- **Inspiration**: Supporting sustainable agriculture

---


*Connecting farmers, empowering agriculture*