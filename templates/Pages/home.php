<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        ConnectionManager::get($name)->getDriver()->connect();
        // No exception means success
        $connected = true;
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
        if ($name === 'debug_kit') {
            $error = 'Try adding your current <b>top level domain</b> to the
                <a href="https://book.cakephp.org/debugkit/5/en/index.html#configuration" target="_blank">DebugKit.safeTld</a>
            config and reload.';
            if (!in_array('sqlite', \PDO::getAvailableDrivers())) {
                $error .= '<br />You need to install the PHP extension <code>pdo_sqlite</code> so DebugKit can work properly.';
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blood Base System</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #ffd9db;
      padding-top: 80px;
    }

    /* Navbar */
    .navbar {
      background-color: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      padding: 0 20px;
    }

    .nav-container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 70px;
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .navbar-logo {
      height: 50px;
      width: auto;
      object-fit: contain;
    }

    .logo {
      font-size: 26px;
      font-weight: 700;
      color: #1e293b;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .logo:hover {
      color: #dc2626;
    }

    .nav-menu {
      display: flex;
      list-style: none;
      gap: 35px;
    }

    .nav-link {
      text-decoration: none;
      color: #475569;
      font-weight: 500;
      padding: 10px 0;
      position: relative;
      transition: color 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
      color: #dc2626;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 3px;
      background: linear-gradient(90deg, #dc2626, #ef4444);
      transition: width 0.3s ease;
      border-radius: 2px;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
      width: 100%;
    }

    /* Hero */
    .hero-container {
      position: relative;
      height: 87vh;
      overflow: hidden;
      border-radius: 0 0 20px 20px;
      margin: 0 20px 20px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    .video-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: 20px;
      overflow: hidden;
    }

    .video-background video {
      position: absolute;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      transform: translate(-50%, -50%);
      object-fit: cover;
    }

    .video-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(184, 184, 184, 0.7), rgba(30, 41, 59, 0.8));
      border-radius: 20px;
    }

    .video-loading {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 18px;
      z-index: 1;
    }

    .welcome-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      text-align: center;
      z-index: 2;
      max-width: 800px;
      padding: 0 20px;
    }

    .welcome-text h1 {
      font-size: clamp(36px, 6vw, 53px);
      margin-bottom: 24px;
      font-weight: 700;
      line-height: 1.2;
      text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .welcome-text p {
      font-size: clamp(16px, 2.5vw, 22px);
      font-weight: 400;
      opacity: 0.95;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    /* Content Sections */
    .content {
      padding: 40px 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .section {
      margin-bottom: 30px;
      padding: 35px;
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
      border: 1px solid #e2e8f0;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .section:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .section h2 {
      color: #1e293b;
      margin-bottom: 24px;
      font-size: 32px;
      font-weight: 600;
      position: relative;
      padding-bottom: 12px;
    }

    .section h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 60px;
      height: 4px;
      background: linear-gradient(90deg, #dc2626, #ef4444);
      border-radius: 2px;
    }

    .section p {
      color: #64748b;
      line-height: 1.7;
      font-size: 17px;
    }

    .about-container {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      gap: 30px;
    }

    .about-text {
      flex: 1 1 50%;
    }

    .about-image {
      flex: 1 1 40%;
    }

    .about-image img {
      width: 100%;
      height: auto;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 2rem 0;
    }

    .dashboard-card {
        background: linear-gradient(135deg, #ffffff 0%, #ffffff 100%);
        color: black; /* Changed from white to black */
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
    }

    .card-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .slider-container {
      position: relative;
      width: 100%;
      max-width: 700px;
      margin: 0 auto;
      overflow: hidden;
      border-radius: 40px;
    }

    .slider {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .slider img {
      width: 100%;
      border-radius: 12px;
      flex-shrink: 0;
    }

    .slider-buttons {
      position: absolute;
      top: 50%;
      width: 100%;
      display: flex;
      justify-content: space-between;
      transform: translateY(-50%);
      padding: 0 20px;
    }

    .slider-buttons button {
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      padding: 12px;
      border-radius: 50%;
      font-size: 20px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .slider-buttons button:hover {
      background-color: #dc2626;
    }

    /* Footer */
    footer {
      background: linear-gradient(135deg, #fafafa, #ffffff);
      color: var(--text);
      padding: 60px 20px 30px;
      margin-top: 60px;
    }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 40px;
    }

    .footer-logo {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 20px;
    }

    .footer-logo img {
      height: 40px;
    }

    .footer-logo-text {
      font-size: 22px;
      font-weight: 700;
      color: var(--secondary);
    }

    .footer-about p {
      margin-bottom: 20px;
      color: var(--light-text);
    }

    .footer-links h3, 
    .footer-contact h3,
    .footer-social h3 {
      font-size: 18px;
      margin-bottom: 20px;
      color: var(--secondary);
      position: relative;
      padding-bottom: 10px;
    }

    .footer-links h3::after,
    .footer-contact h3::after,
    .footer-social h3::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 40px;
      height: 3px;
      background: linear-gradient(90deg, var(--primary), var(--primary-light));
    }

    .footer-links ul {
      list-style: none;
    }

    .footer-links li {
      margin-bottom: 10px;
    }

    .footer-links a {
      color: var(--light-text);
      text-decoration: none;
      transition: var(--transition);
    }

    .footer-links a:hover {
      color: var(--primary);
      padding-left: 5px;
    }

    .contact-item {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin-bottom: 15px;
    }

    .contact-icon {
      color: var(--primary);
      font-size: 18px;
      margin-top: 3px;
    }

    .social-icons {
      display: flex;
      gap: 15px;
    }

    .social-icons a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #f1f5f9;
      color: var(--text);
      transition: var(--transition);
    }

    .social-icons a:hover {
      background: var(--primary);
      color: white;
      transform: translateY(-3px);
    }

    .footer-bottom {
      text-align: center;
      padding-top: 40px;
      margin-top: 40px;
      border-top: 1px solid #e2e8f0;
      color: var(--light-text);
      font-size: 14px;
    }

  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar">
  <div class="nav-container">
    <div class="logo-container">
      <img src="imgs/BloodBase.png" alt="Logo" class="navbar-logo" />
      <a class="logo">Blood Base</a>
    </div>

    <ul class="nav-menu" id="navMenu">
      <li><a href="http://localhost/bloodbases/" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
      <li><a href="http://localhost/bloodbases/donors" class="nav-link"><i class="fas fa-user"></i> Donors</a></li>
      <li><a href="http://localhost/bloodbases/hospitals" class="nav-link"><i class="fas fa-hospital"></i> Hospitals</a></li>
      <li><a href="http://localhost/bloodbases/appointments" class="nav-link"><i class="fas fa-calendar-alt"></i> Appointments</a></li>
      <li><a href="#about" class="nav-link"><i class="fas fa-info-circle"></i> About Us</a></li>
      <li><a href="#" class="nav-link donate-btn"><i class="fas fa-tint"></i> Donate Now</a></li>
    </ul>
    
    <!-- Mobile menu button -->
    <button class="mobile-menu-btn">
      <i class="fas fa-bars"></i>
    </button>
  </div>
</nav>

<style>
/* Updated Navbar Styles */
.navbar {
  background-color: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1000;
  padding: 0 20px;
}

.nav-container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 70px;
}

.logo-container {
  display: flex;
  align-items: center;
  gap: 12px;
}

.navbar-logo {
  height: 50px;
  width: auto;
  object-fit: contain;
}

.logo {
  font-size: 26px;
  font-weight: 700;
  color: #1e293b;
  text-decoration: none;
}

.nav-menu {
  display: flex;
  list-style: none;
  gap: 15px;
}

.nav-link {
  display: flex;
  align-items: center;
  gap: 8px;
  text-decoration: none;
  color: #475569;
  font-weight: 500;
  padding: 10px 15px;
  border-radius: 6px;
  transition: all 0.3s ease;
}

.nav-link i {
  font-size: 16px;
}

.nav-link:hover {
  background-color: #f8fafc;
  color: #dc2626;
}

.donate-btn {
  background-color: #dc2626;
  color: white !important;
}

.donate-btn:hover {
  background-color: #b91c1c;
}

.mobile-menu-btn {
  display: none;
  background: none;
  border: none;
  font-size: 24px;
  color: #1e293b;
  cursor: pointer;
}

/* Responsive Styles */
@media (max-width: 768px) {
  .nav-menu {
    position: fixed;
    top: 70px;
    left: 0;
    width: 100%;
    background: white;
    flex-direction: column;
    padding: 20px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    transform: translateY(-150%);
    transition: transform 0.3s ease;
  }
  
  .nav-menu.active {
    transform: translateY(0);
  }
  
  .mobile-menu-btn {
    display: block;
  }
}
</style>

<script>
// Mobile menu toggle
document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
  document.getElementById('navMenu').classList.toggle('active');
});
</script>

  <!-- Hero Section -->
  <div class="hero-container" id="home">
    <div class="video-background">
      <div class="video-loading">Loading...</div>
      <video autoplay muted loop playsinline>
        <source src="video/video_BG.mp4" type="video/mp4" />
      </video>
      <div class="video-overlay"></div>
    </div>
    <div class="welcome-text">
      <h1>Welcome to Blood Base</h1>
      <p>Your trusted blood donation and management system</p>
    </div>
  </div>

  <!-- Content -->
  <div class="content">
    <!-- About Section -->
    <div class="section" id="about">
      <h2>About Blood Base</h2>
      <div class="about-container">
        <div class="about-text">
          <p>
            BloodBase is a centralized and user-friendly online platform designed to simplify and streamline the blood donation process. It allows users to easily register and schedule appointments for blood donation at hospitals, clinics, or mobile drives, ensuring a faster and more organized experience. At the same time, it helps healthcare providers manage donor records efficiently and coordinate blood collection efforts. By promoting awareness and encouraging public participation, BloodBase aims to make blood donation more accessible, convenient, and impactful for everyone involved.
          </p>
        </div>
        <div class="about-image">
          <img src="imgs/donor.png" alt="Blood Donation" />
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">


                    <div class="dashboard-grid" style="margin-top: 3rem;">
                        <div class="dashboard-card" onclick="showSection('donate')">
                            <div class="card-icon">🩸</div>
                            <h3>Become a Donor</h3>
                            <p>Register as a blood donor and help save lives in your community.</p>
                        </div>
            
                        <div class="dashboard-card" onclick="showSection('organizations')">
                            <div class="card-icon">🏥</div>
                            <h3>Hospitals</h3>
                            <p>Locate nearby hospitals and blood banks for donation.</p>
                </div>
            </div>
            </div>
        </div>
    <!-- Slider Section -->
    <div class="section">
      <h2>Latest Events</h2>
      <div class="slider-container">
        <div class="slider">
          <img src="imgs/slider1.png" alt="Campaign 1" />
          <img src="imgs/slider2.png" alt="Campaign 2" />
          <img src="imgs/slider3.png" alt="Campaign 3" />
        </div>
        <div class="slider-buttons">
          <button id="prevBtn">&#10094;</button>
          <button id="nextBtn">&#10095;</button>
        </div>
      </div>
    </div>
  </div>
 </div>
  <!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-about">
        <div class="footer-logo">
          <img src="imgs/BloodBase.png" alt="Blood Base Logo">
          <span class="footer-logo-text">Blood Base</span>
        </div>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      
      <div class="footer-links">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#">Donate Now</a></li>
        </ul>
      </div>
      
      <div class="footer-contact">
        <h3>Contact Us</h3>
        <div class="contact-item">
          <i class="fas fa-map-marker-alt contact-icon"></i>
          <span>Level 5, Ministry of Health Malaysia, Putrajaya</span>
        </div>
        <div class="contact-item">
          <i class="fas fa-phone-alt contact-icon"></i>
          <span>+603-8883 4422</span>
        </div>
        <div class="contact-item">
          <i class="fas fa-envelope contact-icon"></i>
          <span>info@bloodbase.gov.my</span>
        </div>
        <div class="contact-item">
          <i class="fas fa-clock contact-icon"></i>
          <span>Mon-Fri: 8:30AM - 5:30PM</span>
        </div>
      </div>
      
      <div class="footer-social">
        <h3>Download Our App</h3>
        <div class="app-badges">
          <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play"></a>
          <a href="#"><img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store"></a>
        </div>
        <h3 style="margin-top: 20px;">Newsletter</h3>
        <form class="newsletter-form">
          <input type="email" placeholder="Your email address" required>
          <button type="submit">Subscribe</button>
        </form>
      </div>
    </div>
    
    <div class="footer-bottom">
      <p>&copy; 2025 Blood Base System. All Rights Reserved.</p>
      <p>Developed by Kementerian Kesihatan Malaysia</p>
    </div>
  </footer>


  <!-- Script -->
  <script>
    const video = document.querySelector('video');
    const loadingText = document.querySelector('.video-loading');

    video.addEventListener('loadeddata', () => {
      loadingText.style.display = 'none';
    });

    // Slider logic
    let currentSlide = 0;
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slider img');
    const totalSlides = slides.length;

    function updateSlider() {
      slider.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    document.getElementById('nextBtn').addEventListener('click', () => {
      currentSlide = (currentSlide + 1) % totalSlides;
      updateSlider();
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
      currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
      updateSlider();
    });

    setInterval(() => {
      currentSlide = (currentSlide + 1) % totalSlides;
      updateSlider();
    }, 5000);
  </script>
</body>
</html>
