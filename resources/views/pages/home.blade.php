@extends('layouts.app')

@section('title', 'FortiVine Tech — Where Technology and Sustainability Intertwined')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FortiVine Tech — Where Technology and Sustainability Intertwined</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
      line-height: 1.6;
      color: #1a1a1a;
      overflow-x: hidden;
      background: #ffffff;
    }

    /* Hero Section with Animated Gradient Background */
    .home-hero {
      min-height: 100vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      background: linear-gradient(135deg, #0a4d2e 0%, #145c32 50%, #1e7a45 100%);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Floating Particles Background */
    .hero-particles {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }

    .particle {
      position: absolute;
      width: 4px;
      height: 4px;
      background: rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      animation: float 20s infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0) translateX(0); opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { transform: translateY(-100vh) translateX(50px); opacity: 0; }
    }

    .container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 2rem;
      position: relative;
      z-index: 10;
    }

    .hero-content {
      text-align: center;
      color: white;
      animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .home-title {
      font-size: 4rem;
      font-weight: 800;
      margin-bottom: 1.5rem;
      line-height: 1.2;
      background: linear-gradient(to right, #ffffff, #a8e6cf);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      animation: fadeInUp 1s ease-out 0.2s both;
    }

    .home-sub {
      font-size: 1.4rem;
      margin-bottom: 2.5rem;
      color: rgba(255, 255, 255, 0.9);
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
      animation: fadeInUp 1s ease-out 0.4s both;
    }

    .btn-row {
      display: flex;
      gap: 1.5rem;
      justify-content: center;
      animation: fadeInUp 1s ease-out 0.6s both;
    }

    .btn {
      padding: 1rem 2.5rem;
      border-radius: 50px;
      text-decoration: none;
      font-weight: 600;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .btn-primary {
      background: white;
      color: #145c32;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
    }

    .btn-ghost {
      border: 2px solid white;
      color: white;
      background: transparent;
    }

    .btn-ghost:hover {
      background: white;
      color: #145c32;
      transform: translateY(-3px);
    }

    /* Scroll Indicator */
    .scroll-indicator {
      position: absolute;
      bottom: 2rem;
      left: 50%;
      transform: translateX(-50%);
      animation: bounce 2s infinite;
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
      40% { transform: translateX(-50%) translateY(-10px); }
      60% { transform: translateX(-50%) translateY(-5px); }
    }

    .scroll-indicator svg {
      width: 30px;
      height: 30px;
      stroke: white;
      fill: none;
      stroke-width: 2;
    }

    /* Stats Section with Animated Counters */
    .stats {
      background: linear-gradient(to bottom, #f0fdf4, #dcfce7);
      padding: 5rem 2rem;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 3rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .stat {
      text-align: center;
      padding: 2rem;
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      opacity: 0;
      animation: fadeInUp 0.8s ease-out forwards;
    }

    .stat:nth-child(1) { animation-delay: 0.1s; }
    .stat:nth-child(2) { animation-delay: 0.2s; }
    .stat:nth-child(3) { animation-delay: 0.3s; }

    .stat:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(20, 92, 50, 0.15);
    }

    .stat-value {
      font-size: 3.5rem;
      font-weight: 800;
      background: linear-gradient(135deg, #145c32, #2d6a39);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 0.5rem;
    }

    .stat-label {
      font-size: 1.1rem;
      color: #3d704f;
      font-weight: 500;
    }

    /* Video Section with Modern Card Design */
    .promo-video-section {
      padding: 6rem 2rem;
      background: white;
    }

    .promo-video-wrapper {
      max-width: 1000px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 400px 1fr;
      gap: 3rem;
      align-items: center;
    }

    .video-placeholder {
      width: 400px;
      height: 400px;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
      transition: all 0.3s ease;
    }

    .video-placeholder:hover {
      transform: scale(1.02);
      box-shadow: 0 25px 70px rgba(20, 92, 50, 0.2);
    }

    .promo-video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .video-description h2 {
      font-size: 2.5rem;
      color: #145c32;
      margin-bottom: 1rem;
      font-weight: 700;
    }

    .video-description p {
      font-size: 1.2rem;
      color: #3d704f;
      line-height: 1.8;
    }

    /* Services Section with Card Hover Effects */
    .services-section {
      padding: 6rem 2rem;
      background: linear-gradient(to bottom, #ffffff, #f9fafb);
    }

    .section-head-center {
      text-align: center;
      margin-bottom: 4rem;
    }

    .section-title {
      font-size: 3rem;
      font-weight: 800;
      color: #145c32;
      margin-bottom: 1rem;
    }

    .link {
      color: #2d6a39;
      text-decoration: none;
      font-weight: 600;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .link:hover {
      color: #145c32;
      gap: 1rem;
    }

    .services-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2.5rem;
      max-width: 1400px;
      margin: 0 auto;
    }

    .card {
      background: white;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      position: relative;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, #145c32, #2d6a39, #3d8554);
      transform: scaleX(0);
      transition: transform 0.4s ease;
    }

    .card:hover::before {
      transform: scaleX(1);
    }

    .card:hover {
      transform: translateY(-12px);
      box-shadow: 0 20px 50px rgba(20, 92, 50, 0.2);
    }

    .svc-img-wrapper {
      width: 100%;
      height: 280px;
      overflow: hidden;
      position: relative;
    }

    .svc-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .card:hover .svc-img {
      transform: scale(1.1);
    }

    .svc-title {
      font-size: 1.5rem;
      color: #145c32;
      margin: 1.5rem 1.5rem 0.75rem;
      font-weight: 700;
    }

    .svc-desc {
      color: #3d704f;
      padding: 0 1.5rem 1.5rem;
      line-height: 1.7;
    }

    /* Portfolio Section */
    .portfolio-section {
      padding: 6rem 2rem;
      background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    }

    .simple-portfolio-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 3rem;
      max-width: 1400px;
      margin: 3rem auto 0;
    }

    .portfolio-card {
      background: white;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: all 0.4s ease;
      display: flex;
      flex-direction: column;
    }

    .portfolio-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 50px rgba(20, 92, 50, 0.15);
    }

    .portfolio-image-wrap {
      width: 100%;
      height: 350px;
      overflow: hidden;
      position: relative;
    }

    .portfolio-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .portfolio-card:hover .portfolio-image {
      transform: scale(1.05);
    }

    .portfolio-body {
      padding: 2rem;
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .portfolio-title {
      font-size: 1.6rem;
      font-weight: 700;
      color: #145c32;
      margin: 0;
    }

    .portfolio-description {
      color: #3d704f;
      line-height: 1.7;
    }

    .portfolio-meta {
      display: flex;
      gap: 2rem;
      font-size: 0.95rem;
      color: #555;
    }

    .portfolio-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 0.75rem;
    }

    .tag {
      padding: 0.5rem 1rem;
      background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
      border-radius: 20px;
      font-size: 0.9rem;
      color: #2d6a39;
      font-weight: 600;
    }

    /* Contact Section */
    .contact-section {
      padding: 6rem 2rem;
      background: white;
    }

    .section-head {
      text-align: center;
      margin-bottom: 3rem;
    }

    .section-sub {
      font-size: 1.2rem;
      color: #3d704f;
      max-width: 600px;
      margin: 1rem auto 0;
    }

    .contact-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 3rem;
      max-width: 1400px;
      margin: 0 auto;
    }

    .contact-form {
      background: linear-gradient(135deg, #145c32, #1e7a45);
      padding: 3rem;
      border-radius: 24px;
      box-shadow: 0 20px 60px rgba(20, 92, 50, 0.2);
    }

    .map-embed {
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .map-embed iframe {
      width: 100%;
      height: 500px;
      border: 0;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
      .promo-video-wrapper {
        grid-template-columns: 1fr;
        text-align: center;
      }

      .video-placeholder {
        margin: 0 auto;
      }
    }

    @media (max-width: 968px) {
      .home-title {
        font-size: 3rem;
      }

      .stats-grid,
      .services-grid {
        grid-template-columns: 1fr;
      }

      .simple-portfolio-grid,
      .contact-grid {
        grid-template-columns: 1fr;
      }

      .video-placeholder {
        width: 100%;
        max-width: 400px;
        height: 400px;
      }
    }

    @media (max-width: 768px) {
      .home-title {
        font-size: 2.5rem;
      }

      .home-sub {
        font-size: 1.1rem;
      }

      .btn-row {
        flex-direction: column;
        align-items: stretch;
      }

      .section-title {
        font-size: 2.2rem;
      }

      .portfolio-image-wrap {
        height: 250px;
      }
    }
  </style>
</head>
<body>

  <!-- Hero Section -->
  <section class="home-hero">
    <div class="hero-particles">
      <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
      <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
      <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
      <div class="particle" style="left: 40%; animation-delay: 1s;"></div>
      <div class="particle" style="left: 50%; animation-delay: 3s;"></div>
      <div class="particle" style="left: 60%; animation-delay: 5s;"></div>
      <div class="particle" style="left: 70%; animation-delay: 2.5s;"></div>
      <div class="particle" style="left: 80%; animation-delay: 1.5s;"></div>
      <div class="particle" style="left: 90%; animation-delay: 4.5s;"></div>
    </div>

    <div class="container">
      <div class="hero-content">
        <h1 class="home-title">FortiVine Tech, Where Technology and Sustainability Intertwined</h1>
        <p class="home-sub">We design sustainable technologies that integrate strength, adaptability, and responsibility for a better future.</p>
        <div class="btn-row">
          <a href="/services" class="btn btn-primary">See Our Solutions & Impact</a>
          <a href="#contact-section" class="btn btn-ghost">Contact Us</a>
        </div>
      </div>
    </div>

    <div class="scroll-indicator">
      <svg viewBox="0 0 24 24">
        <path d="M12 5v14M5 12l7 7 7-7"/>
      </svg>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="stats">
    <div class="stats-grid">
      <div class="stat">
        <div class="stat-value">120+</div>
        <div class="stat-label">Clients Served</div>
      </div>
      <div class="stat">
        <div class="stat-value">18%</div>
        <div class="stat-label">Avg. Footprint Reduction</div>
      </div>
      <div class="stat">
        <div class="stat-value">85+</div>
        <div class="stat-label">Projects Delivered</div>
      </div>
    </div>
  </section>

  <!-- Video Section -->
  <section class="promo-video-section">
    <div class="container">
      <div class="promo-video-wrapper">
        <div class="video-placeholder">
          <video class="promo-video" controls poster="https://via.placeholder.com/400x400/145c32/ffffff?text=FortiVine+Video">
            <source src="/videos/FortiVine.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
        <div class="video-description">
          <h2>See FortiVine Tech in Action</h2>
          <p>Short 60-second overview of how we help modern farms achieve sustainability through innovative technology solutions.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="services-section">
    <div class="container">
      <div class="section-head-center">
        <h2 class="section-title">Featured Services</h2>
        <a href="/services" class="link">View all services →</a>
      </div>
      <div class="services-grid">
        <article class="card">
          <div class="svc-img-wrapper">
            <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=800&q=80" class="svc-img" alt="Agriculture">
          </div>
          <h3 class="svc-title">Agricultural Software</h3>
          <p class="svc-desc">Waste reduction through data-driven resource planning and farm analytics.</p>
        </article>
        <article class="card">
          <div class="svc-img-wrapper">
            <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?w=800&q=80" class="svc-img" alt="Energy Solutions">
          </div>
          <h3 class="svc-title">Energy-Efficient Solutions</h3>
          <p class="svc-desc">Monitoring, forecasting, and carbon reporting for facilities.</p>
        </article>
        <article class="card">
          <div class="svc-img-wrapper">
            <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&q=80" class="svc-img" alt="Integration">
          </div>
          <h3 class="svc-title">Software & Integration</h3>
          <p class="svc-desc">Custom platforms and legacy interoperability built for scale.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section class="portfolio-section">
    <div class="container">
      <div class="section-head-center">
        <h2 class="section-title">Projects</h2>
        <a href="/projects" class="link">View all projects →</a>
      </div>
      <div class="simple-portfolio-grid">
        <article class="portfolio-card">
          <div class="portfolio-image-wrap">
            <img src="/images/portfolio/1.png" class="portfolio-image" alt="Recycling App" loading="lazy">
          </div>
          <div class="portfolio-body">
            <h3 class="portfolio-title">Recycling and Rewards Mobile Application</h3>
            <p class="portfolio-description">A comprehensive mobile application that incentivizes environmental responsibility by rewarding users for recycling activities. Built with Laravel backend and Vue.js frontend, the app features eco-point tracking, reward redemption systems, and gamification elements to encourage sustainable behavior.</p>
            </div>
        </article>

        <article class="portfolio-card">
          <div class="portfolio-image-wrap">
            <img src="/images/portfolio/2.png" class="portfolio-image" alt="Study Sphere" loading="lazy">
          </div>
          <div class="portfolio-body">
            <h3 class="portfolio-title">Study Sphere</h3>
            <p class="portfolio-description">An intelligent educational platform leveraging machine learning to create personalized study experiences. The application analyzes student learning patterns and adapts content delivery accordingly. Developed using Python and ML frameworks with cloud deployment.</p>
          </div>
          di
        </article>

        <article class="portfolio-card">
          <div class="portfolio-image-wrap">
            <img src="/images/portfolio/3.jpg" class="portfolio-image" alt="GreenCart" loading="lazy">
          </div>
          <div class="portfolio-body">
            <h3 class="portfolio-title">GreenCart</h3>
            <p class="portfolio-description">A user-centric mobile shopping platform focused on sustainable and eco-friendly products. Designed using Figma with comprehensive UX research and strategy implementation. The interface emphasizes intuitive navigation, product discovery, and transparent sustainability metrics.</p>
          </div>
        </article>

        <article class="portfolio-card">
          <div class="portfolio-image-wrap">
            <img src="/images/portfolio/4.jpg" class="portfolio-image" alt="Ecoward" loading="lazy">
          </div>
          <div class="portfolio-body">
            <h3 class="portfolio-title">Ecoward</h3>
            <p class="portfolio-description">A full-stack web and mobile solution promoting environmental sustainability through gamified recycling incentives. Built with Node.js, React, and API integrations, the platform manages user rewards, tracks environmental impact metrics, and facilitates partnerships with recycling centers.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="contact-section" id="contact-section">
    <div class="container">
      <div class="section-head">
        <h2 class="section-title">Get in Touch</h2>
        <p class="section-sub">Tell us about your project and we'll respond within one business day.</p>
      </div>
      <div class="contact-grid">
        <div class="contact-form">
          <h3 style="color: white; font-size: 1.8rem; margin-bottom: 1rem; font-weight: 700;">Send us a message</h3>
          <p style="color: rgba(255, 255, 255, 0.9); margin-bottom: 2rem; line-height: 1.6;">Fill out the form and our team will get back to you shortly.</p>

          <!-- Contact Form -->
          <form action="/contact" method="POST" style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div>
              <label style="display: block; color: white; margin-bottom: 0.5rem; font-weight: 500;">Name</label>
              <input type="text" name="name" required style="width: 100%; padding: 0.875rem 1rem; border-radius: 12px; border: 2px solid rgba(255, 255, 255, 0.2); background: rgba(255, 255, 255, 0.1); color: white; font-size: 1rem; transition: all 0.3s ease;">
            </div>
            <div>
              <label style="display: block; color: white; margin-bottom: 0.5rem; font-weight: 500;">Email</label>
              <input type="email" name="email" required style="width: 100%; padding: 0.875rem 1rem; border-radius: 12px; border: 2px solid rgba(255, 255, 255, 0.2); background: rgba(255, 255, 255, 0.1); color: white; font-size: 1rem; transition: all 0.3s ease;">
            </div>
            <div>
              <label style="display: block; color: white; margin-bottom: 0.5rem; font-weight: 500;">Message</label>
              <textarea name="message" rows="5" required style="width: 100%; padding: 0.875rem 1rem; border-radius: 12px; border: 2px solid rgba(255, 255, 255, 0.2); background: rgba(255, 255, 255, 0.1); color: white; font-size: 1rem; resize: vertical; transition: all 0.3s ease; font-family: inherit;"></textarea>
            </div>
            <button type="submit" style="width: 100%; padding: 1rem; background: white; color: #145c32; border: none; border-radius: 12px; font-weight: 700; font-size: 1.1rem; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">Send Message</button>
          </form>
        </div>
        <div class="map-embed">
          <iframe title="FortiVine Tech Location" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps?q=Naldo%20Building%2C%20MacArthur%20Hwy%2C%20Urdaneta%20City%2C%20Pangasinan&output=embed"></iframe>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
@endsection