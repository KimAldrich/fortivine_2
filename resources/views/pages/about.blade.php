@extends('layouts.app')
@section('title', 'About — FortiVine Tech')

@section('content')
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

    .container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 2rem;
      position: relative;
      z-index: 10;
    }

    /* Hero Section */
    .home-hero {
    min-height: 70vh;
    display: flex;
    flex-direction: column; /* ensure vertical alignment */
    justify-content: center;
    align-items: center;
    text-align: center; /* center text */
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #0a4d2e 0%, #145c32 50%, #1e7a45 100%);
    background-size: 400% 400%;
    animation: gradientShift 15s ease infinite;
    padding: 0 2rem; /* optional for spacing on smaller screens */
    }

    .hero-content {
    max-width: 900px;
    width: 100%;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

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

    .hero-content {
      text-align: center;
      color: white;
      animation: fadeInUp 1s ease-out;
      max-width: 900px;
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
      font-size: 3.5rem;
      font-weight: 800;
      margin-bottom: 1.5rem;
      line-height: 1.2;
      background: linear-gradient(to right, #ffffff, #a8e6cf);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .about-sub {
      font-size: 1.3rem;
      color: rgba(255, 255, 255, 0.95);
      line-height: 1.8;
      max-width: 800px;
      margin: 0 auto;
    }

    /* Section Styling */
    .section {
      padding: 5rem 2rem;
    }

    .section-title {
      font-size: 3rem;
      font-weight: 800;
      color: #145c32;
      text-align: center;
      margin-bottom: 1rem;
    }

    .section-sub {
      text-align: center;
      color: #3d704f;
      font-size: 1.2rem;
      max-width: 700px;
      margin: 0 auto 3rem;
      line-height: 1.7;
    }

    /* Mission & Vision Panels */
    .about-panels {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 2.5rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .panel {
      background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
      padding: 3rem;
      border-radius: 24px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
    }

    .panel::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 5px;
      background: linear-gradient(90deg, #145c32, #2d6a39, #3d8554);
      transform: scaleX(0);
      transition: transform 0.4s ease;
    }

    .panel:hover::before {
      transform: scaleX(1);
    }

    .panel:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 50px rgba(20, 92, 50, 0.15);
    }

    .panel-title {
      font-size: 2rem;
      font-weight: 700;
      color: #145c32;
      margin-bottom: 1rem;
    }

    .panel p {
      color: #2d6a39;
      font-size: 1.1rem;
      line-height: 1.8;
    }

    /* Founders Section */
    .founders {
      background: linear-gradient(to bottom, #ffffff, #f9fafb);
      padding: 6rem 2rem;
    }

    .founder-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 3rem;
      max-width: 1400px;
      margin: 3rem auto 0;
    }

    .founder-card {
      background: white;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: all 0.4s ease;
    }

    .founder-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 20px 50px rgba(20, 92, 50, 0.15);
    }

    .founder-photo {
      width: 100%;
      height: 350px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .founder-card:hover .founder-photo {
      transform: scale(1.05);
    }

    .founder-meta {
      padding: 2rem;
    }

    .founder-name {
      font-size: 1.5rem;
      font-weight: 700;
      color: #145c32;
      margin-bottom: 0.5rem;
    }

    .founder-role {
      font-size: 1rem;
      font-weight: 600;
      color: #2d6a39;
      margin-bottom: 1rem;
    }

    .founder-blurb {
      color: #3d704f;
      line-height: 1.7;
    }

    /* Core Values */
    .values {
      background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
      padding: 6rem 2rem;
    }

    .values-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2.5rem;
      max-width: 1400px;
      margin: 3rem auto 0;
    }

    .value-card {
      background: white;
      border-radius: 24px;
      padding: 3rem 2rem;
      text-align: center;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: all 0.4s ease;
      position: relative;
    }

    .value-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, #145c32, #2d6a39, #3d8554);
      border-radius: 24px 24px 0 0;
    }

    .value-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 50px rgba(20, 92, 50, 0.15);
    }

    .value-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.5rem;
      transition: all 0.3s ease;
    }

    .value-card:hover .value-icon {
      transform: scale(1.1) rotate(5deg);
    }

    .value-icon svg {
      width: 40px;
      height: 40px;
      fill: #145c32;
    }

    .value-title {
      font-size: 1.4rem;
      font-weight: 700;
      color: #145c32;
      margin-bottom: 1rem;
    }

    .value-text {
      color: #3d704f;
      line-height: 1.7;
    }

    /* Timeline */
    .timeline {
      background: white;
      padding: 6rem 2rem;
    }

    .timeline-list {
      list-style: none;
      max-width: 900px;
      margin: 3rem auto 0;
      padding: 0;
    }

    .timeline-item {
      position: relative;
      padding-left: 4rem;
      margin-bottom: 3rem;
      padding-bottom: 3rem;
      border-left: 3px solid #c8e6c9;
    }

    .timeline-item:last-child {
      border-left: none;
      margin-bottom: 0;
      padding-bottom: 0;
    }

    .timeline-item .dot {
      width: 24px;
      height: 24px;
      background: linear-gradient(135deg, #145c32, #2d6a39);
      border-radius: 50%;
      position: absolute;
      left: -13px;
      top: 0;
      box-shadow: 0 0 0 6px rgba(232, 245, 233, 0.5);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% {
        box-shadow: 0 0 0 6px rgba(232, 245, 233, 0.5);
      }
      50% {
        box-shadow: 0 0 0 12px rgba(232, 245, 233, 0.3);
      }
    }

    .timeline-item .time {
      font-size: 1.5rem;
      font-weight: 800;
      color: #145c32;
      margin-bottom: 0.5rem;
      display: inline-block;
      padding: 0.25rem 1rem;
      background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
      border-radius: 20px;
    }

    .timeline-item .desc {
      color: #3d704f;
      font-size: 1.1rem;
      line-height: 1.8;
      margin-top: 1rem;
    }

    /* Partners Section */
    .partners-section {
      background: linear-gradient(to bottom, #f9fafb, #ffffff);
      padding: 6rem 2rem;
    }

    .partners-intro {
      text-align: center;
      max-width: 800px;
      margin: 0 auto 3rem;
      color: #3d704f;
      font-size: 1.15rem;
      line-height: 1.8;
    }

    .partners-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 3rem;
      max-width: 1400px;
      margin: 3rem auto 0;
    }

    .partner-card {
      background: white;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: all 0.4s ease;
      display: flex;
      flex-direction: column;
    }

    .partner-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 50px rgba(20, 92, 50, 0.15);
    }

    .partner-logo {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .partner-card:hover .partner-logo {
      transform: scale(1.05);
    }

    .partner-body {
      padding: 2rem;
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .partner-name {
      font-size: 1.4rem;
      font-weight: 700;
      color: #145c32;
      margin-bottom: 1rem;
    }

    .partner-summary {
      color: #3d704f;
      line-height: 1.7;
      flex: 1;
      margin-bottom: 1.5rem;
    }

    .partner-link {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      color: #2d6a39;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .partner-link:hover {
      color: #145c32;
      gap: 1rem;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
      .founder-grid,
      .values-grid,
      .partners-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 968px) {
      .home-title {
        font-size: 2.5rem;
      }

      .about-panels {
        grid-template-columns: 1fr;
      }

      .founder-grid,
      .values-grid,
      .partners-grid {
        grid-template-columns: 1fr;
      }

      .section-title {
        font-size: 2.2rem;
      }
    }

    @media (max-width: 768px) {
      .home-title {
        font-size: 2rem;
      }

      .about-sub {
        font-size: 1.1rem;
      }

      .section {
        padding: 3rem 1rem;
      }

      .founder-photo {
        height: 280px;
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

    <div class="hero-content">
    <h1 class="home-title">Where Technology and Sustainability Intertwined</h1>
    <p class="about-sub">
      FortiVine Tech is a purpose-driven technology company dedicated to designing a resilient future...
    </p>
    </div>
    </section>

  <!-- Founders Section -->
  <section class="section founders">
    <div class="container">
      <h2 class="section-title">Meet FortiVine Tech Team</h2>
      <div class="founder-grid">
        <article class="founder-card">
          <img src="{{ asset('images/founders/kim-andrada.jpg') }}" alt="Kim Aldrich Andrada" class="founder-photo">
          <div class="founder-meta">
            <div class="founder-name">Kim Aldrich Andrada</div>
            <div class="founder-role">Chief Executive Officer</div>
            <p class="founder-blurb">Leads FortiVine Tech's strategic direction, operations, and partnerships. Oversees company growth and ensures alignment with the company's mission and values.</p>
          </div>
        </article>

        <article class="founder-card">
          <img src="{{ asset('images/founders/vince-baniago.jpg') }}" alt="Vince Allen Baniago" class="founder-photo">
          <div class="founder-meta">
            <div class="founder-name">Vince Allen Baniago</div>
            <div class="founder-role">Chief Technology Officer</div>
            <p class="founder-blurb">Heads the design and implementation of sustainable digital solutions. Focuses on innovation, system architecture, and green technology development.</p>
          </div>
        </article>

        <article class="founder-card">
          <img src="{{ asset('images/founders/krisha-daban.jpg') }}" alt="Krisha Mae Daban" class="founder-photo">
          <div class="founder-meta">
            <div class="founder-name">Krisha Mae Daban</div>
            <div class="founder-role">Chief Sustainability Officer</div>
            <p class="founder-blurb">Ensures environmental integrity across all projects. Directs sustainability strategies, research initiatives, and eco-focused partnerships.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Mission & Vision -->
  <section class="section">
    <div class="container">
      <div class="about-panels">
        <article class="panel">
          <h2 class="panel-title">Mission</h2>
          <p>To design sustainable technologies that integrate strength, adaptability, and responsibility for a better future.</p>
        </article>
        <article class="panel">
          <h2 class="panel-title">Vision</h2>
          <p>To become the leading innovator in environmentally conscious innovation across the globe, defining the future where sustainable development and digital advancement coexist seamlessly.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Core Values -->
  <section class="section values">
    <div class="container">
      <h2 class="section-title">Core Values</h2>
      <p class="section-sub">What guides every decision we make.</p>
      <div class="values-grid">
        <article class="value-card">
          <div class="value-icon">
            <svg viewBox="0 0 24 24">
              <path d="M20.3 5.7a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-1.4 0l-5-5a1 1 0 1 1 1.4-1.4l4.3 4.29L18.9 5.7a1 1 0 0 1 1.4 0z"/>
            </svg>
          </div>
          <h3 class="value-title">Accountability</h3>
          <p class="value-text">We measure outcomes and own the results—environmental, social, and operational.</p>
        </article>

        <article class="value-card">
          <div class="value-icon">
            <svg viewBox="0 0 24 24">
              <path d="M19.14 12.94a7.964 7.964 0 0 0 .06-.94c0-.32-.02-.63-.06-.94l2.03-1.58a.5.5 0 0 0 .12-.64l-1.92-3.32a.5.5 0 0 0-.6-.22l-2.39.96a7.29 7.29 0 0 0-1.62-.94l-.36-2.54a.5.5 0 0 0-.5-.42h-3.84a.5.5 0 0 0-.5.42l-.36 2.54c-.58.22-1.12.53-1.62.94l-2.39-.96a.5.5 0 0 0-.6.22L2.65 7.84a.5.5 0 0 0 .12.64l2.03 1.58c-.04.31-.06.62-.06.94 0 .32.02.63.06.94L2.77 14.52a.5.5 0 0 0-.12.64l1.92 3.32c.13.22.39.31.6.22l2.39-.96c.5.41 1.04.72 1.62.94l.36 2.54c.05.24.26.42.5.42h3.84c.24 0 .45-.18.5-.42l.36-2.54c.58-.22 1.12-.53 1.62-.94l2.39.96c.21.09.47 0 .6-.22l1.92-3.32a.5.5 0 0 0-.12-.64l-2.03-1.58ZM12 15.5a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z"/>
            </svg>
          </div>
          <h3 class="value-title">Innovation</h3>
          <p class="value-text">We iterate rapidly to deliver practical, sustainable technology at scale.</p>
        </article>

        <article class="value-card">
          <div class="value-icon">
            <svg viewBox="0 0 24 24">
              <path d="M12 22a1 1 0 0 1-1-1v-6.38C6.83 14.25 4 11.22 4 7.5V6h1.5C9.1 6 12 8.9 12 12.5V21a1 1 0 0 1-1 1Zm2-10.5c0-3.6 2.9-6.5 6.5-6.5H22v1.5c0 3.72-2.83 6.75-6.5 6.75H14Z"/>
            </svg>
          </div>
          <h3 class="value-title">Environmental Responsibility</h3>
          <p class="value-text">We build for long-term impact—reducing waste and resource footprints.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Timeline -->
  <section class="section timeline">
    <div class="container">
      <h2 class="section-title">Our Story</h2>
      <ol class="timeline-list">
        <li class="timeline-item">
          <div class="dot"></div>
          <div class="time">2022</div>
          <div class="desc">Genesis and initial establishment. Early prototypes focused on resource tracking and ROSI pilot.</div>
        </li>
        <li class="timeline-item">
          <div class="dot"></div>
          <div class="time">2023</div>
          <div class="desc">Product 1.0 launches; entry into the energy sector and expansion into urban planning.</div>
        </li>
        <li class="timeline-item">
          <div class="dot"></div>
          <div class="time">2024</div>
          <div class="desc">WaterSense Project achieves <strong>15% water reduction</strong> across pilot sites. <em>"We ship sustainable value, not just code."</em></div>
        </li>
      </ol>
    </div>
  </section>

  <!-- Partners Section -->
  <section class="section partners-section">
    <div class="container">
      <h2 class="section-title">How Partnerships Align</h2>
      <p class="partners-intro">All our partners share our core value of environmental accountability and commitment to driving innovation for a healthier planet. These collaborations allow us to expand the reach and effectiveness of our green technology.</p>

      <h2 class="section-title" style="margin-top: 3rem;">Key Partners</h2>
      <div class="partners-grid">
        <article class="partner-card">
          <img class="partner-logo" src="/images/sustainable.jpg" alt="Sustainable Harvest NGO">
          <div class="partner-body">
            <h3 class="partner-name">Sustainable Harvest NGO</h3>
            <p class="partner-summary">A non-profit focused on empowering smallholder farmers with modern tools and training. Together we deploy resource planning and waste-reduction software across rural communities.</p>
            <a class="partner-link" href="#" target="_blank" rel="noopener">Visit →</a>
          </div>
        </article>

        <article class="partner-card">
          <img class="partner-logo" src="/images/energy.jpg" alt="Global Renewable Energy Consortium">
          <div class="partner-body">
            <h3 class="partner-name">Global Renewable Energy Consortium</h3>
            <p class="partner-summary">An international coalition accelerating renewable adoption. Our software supports energy monitoring, forecasting, and carbon reporting.</p>
            <a class="partner-link" href="#" target="_blank" rel="noopener">Visit →</a>
          </div>
        </article>

        <article class="partner-card">
          <img class="partner-logo" src="/images/urban.jpg" alt="The Future City Institute">
          <div class="partner-body">
            <h3 class="partner-name">The Future City Institute</h3>
            <p class="partner-summary">A research hub for sustainable urban planning. We collaborate on platforms that guide water use, waste diversion, and mobility improvements.</p>
            <a class="partner-link" href="#" target="_blank" rel="noopener">Visit →</a>
          </div>
        </article>
      </div>
    </div>
  </section>

</body>
</html>

@endsection