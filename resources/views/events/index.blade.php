@extends('layouts.app')
@section('title', 'Careers & Events — FortiVine Tech')

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
    z-index: 1;
  }

  /* Hero Section */
  .home-hero {
    min-height: 60vh;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: linear-gradient(135deg, #0a4d2e 0%, #145c32 50%, #1e7a45 100%);
    background-size: 400% 400%;
    animation: gradientShift 15s ease infinite;
    margin-bottom: 4rem;
    margin-top: 80px;
    text-align: center;
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
    pointer-events: none;
  }

  .particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    animation: float 20s infinite;
    pointer-events: none;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0) translateX(0); opacity: 0; }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% { transform: translateY(-100vh) translateX(50px); opacity: 0; }
  }

  .page-title {
    font-size: 4rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    background: linear-gradient(to right, #ffffff, #a8e6cf);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: fadeInUp 1s ease-out;
    position: relative;
    z-index: 1;
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

  .lead {
    font-size: 1.3rem;
    color: rgba(255, 255, 255, 0.95);
    line-height: 1.8;
    max-width: 800px;
    margin: 0 auto;
    animation: fadeInUp 1s ease-out 0.2s both;
    position: relative;
    z-index: 1;
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
    margin-bottom: 3rem;
    position: relative;
    display: inline-block;
    left: 50%;
    transform: translateX(-50%);
  }

  .section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #145c32, #2d6a39, #3d8554);
    border-radius: 2px;
  }

  /* Events Grid */
  .grid {
    display: grid;
    gap: 3rem;
  }

  .grid-3 {
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  }

  /* Event Card with Enhanced Features */
  .event-card {
    background: white;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    display: flex;
    flex-direction: column;
  }

  .event-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #145c32, #2d6a39, #3d8554);
    transform: scaleX(0);
    transition: transform 0.4s ease;
    z-index: 1;
  }

  .event-card:hover::before {
    transform: scaleX(1);
  }

  .event-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 50px rgba(20, 92, 50, 0.2);
  }

  /* Event Banner with Overlay */
  .event-banner-wrapper {
    position: relative;
    width: 100%;
    height: 280px;
    overflow: hidden;
  }

  .event-banner {
    width: 100%;
    height: 280px;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .event-card:hover .event-banner {
    transform: scale(1.1);
  }

  /* Event Badge */
  .event-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: linear-gradient(135deg, #145c32, #2d6a39);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    z-index: 2;
  }

  .event-badge.recent {
    background: linear-gradient(135deg, #6b7280, #4b5563);
  }

  /* Event Content */
  .event-content {
    padding: 2rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    flex: 1;
  }

  .event-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #145c32;
    margin-bottom: 0.5rem;
    line-height: 1.3;
  }

  .event-date {
    font-size: 1rem;
    font-weight: 600;
    color: #2d6a39;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
  }

  .event-location {
    font-size: 0.95rem;
    color: #3d704f;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
  }

  .event-summary {
    color: #3d704f;
    line-height: 1.7;
    flex: 1;
    margin-bottom: 1.5rem;
  }

  /* Event Footer with Actions */
  .event-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 2px solid #e8f5e9;
  }

  .event-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #2d6a39;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
  }

  .event-link:hover {
    gap: 1rem;
    background: linear-gradient(135deg, #c8e6c9, #a5d6a7);
    transform: translateX(5px);
  }

  .event-attendees {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    color: #3d704f;
  }

  .attendees-avatars {
    display: flex;
    margin-left: 0.5rem;
  }

  .avatar {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 2px solid white;
    margin-left: -8px;
    background: linear-gradient(135deg, #145c32, #2d6a39);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.75rem;
    font-weight: 600;
  }

  .avatar:first-child {
    margin-left: 0;
  }

  /* Careers Section */
  .careers {
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    border-radius: 24px;
    padding: 4rem 3rem;
    margin-top: 4rem;
  }

  .careers .section-title {
    margin-bottom: 2rem;
  }

  .careers > p {
    text-align: center;
    color: #3d704f;
    font-size: 1.2rem;
    line-height: 1.8;
    max-width: 800px;
    margin: 0 auto 3rem;
  }

  .career-list {
    list-style: none;
    max-width: 900px;
    margin: 0 auto 3rem;
    display: grid;
    gap: 1.5rem;
  }

  .career-list li {
    background: white;
    padding: 2rem;
    border-radius: 16px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    padding-left: 4rem;
  }

  .career-list li::before {
    content: '💼';
    position: absolute;
    left: 1.5rem;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1.5rem;
  }

  .career-list li:hover {
    transform: translateX(10px);
    box-shadow: 0 10px 30px rgba(20, 92, 50, 0.15);
  }

  .career-list li strong {
    color: #145c32;
    font-size: 1.2rem;
    display: block;
    margin-bottom: 0.5rem;
  }

  .career-cta {
    text-align: center;
    font-size: 1.2rem;
    color: #3d704f;
    padding: 2rem;
    background: white;
    border-radius: 16px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
  }

  .career-cta a {
    color: #2d6a39;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .career-cta a:hover {
    color: #145c32;
    text-decoration: underline;
  }

  /* Section spacing for Recent Events */
  .section-divider {
    margin-top: 5rem;
  }

  /* Responsive Design */
  @media (max-width: 968px) {
    .page-title {
      font-size: 2.5rem;
    }

    .lead {
      font-size: 1.1rem;
    }

    .section-title {
      font-size: 2.2rem;
    }

    .grid-3 {
      grid-template-columns: 1fr;
    }

    .careers {
      padding: 3rem 2rem;
    }
  }

  @media (max-width: 768px) {
    .page-title {
      font-size: 2rem;
    }

    .event-banner-wrapper {
      height: 220px;
    }

    .event-banner {
      height: 220px;
    }

    .event-footer {
      flex-direction: column;
      gap: 1rem;
      align-items: flex-start;
    }
  }
</style>

<!-- Hero Section with Particles -->
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
    <h1 class="page-title">Events</h1>
    <p class="lead">
      FortiVine Tech continuously fosters innovation through educational programs, sustainability seminars,
      and collaboration events. Join our movement toward a greener, tech-driven future.
    </p>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2 class="section-title">Upcoming Events</h2>
    <div class="grid grid-3 events">

      <!-- Upcoming Event Card 1 -->
      <article class="event-card">
        <div class="event-banner-wrapper">
          <span class="event-badge">Upcoming</span>
          <img src="https://placehold.co/600x300/145c32/ffffff?text=Green+Tech+Summit+2025" alt="Green Tech Summit 2025" class="event-banner">
        </div>
        <div class="event-content">
          <h3 class="event-title">Green Tech Summit 2025</h3>
          <p class="event-date">📅 January 15–17, 2025</p>
          <p class="event-location">📍 Urdaneta City Convention Center</p>
          <p class="event-summary">
            A three-day conference highlighting sustainable technology trends and FortiVine's latest software for resource management. Attendees will experience live demos and meet our R&D team.
          </p>
          <div class="event-footer">
            <a href="#" class="event-link">View Details →</a>
            <div class="event-attendees">
              <span>200+ attending</span>
              <div class="attendees-avatars">
                <span class="avatar">A</span>
                <span class="avatar">B</span>
                <span class="avatar">C</span>
                <span class="avatar">+</span>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- Upcoming Event Card 2 -->
      <article class="event-card">
        <div class="event-banner-wrapper">
          <span class="event-badge">Upcoming</span>
          <img src="https://placehold.co/600x300/2d6a39/ffffff?text=Sustainability+Hackathon" alt="Sustainability Hackathon" class="event-banner">
        </div>
        <div class="event-content">
          <h3 class="event-title">Sustainability Hackathon</h3>
          <p class="event-date">📅 March 2–4, 2025</p>
          <p class="event-location">📍 FortiVine HQ Lab</p>
          <p class="event-summary">
            A 48-hour challenge bringing together students and developers to build real-world solutions for agriculture, energy, and smart cities using FortiVine APIs and open data.
          </p>
          <div class="event-footer">
            <a href="#" class="event-link">View Details →</a>
            <div class="event-attendees">
              <span>120+ attending</span>
              <div class="attendees-avatars">
                <span class="avatar">D</span>
                <span class="avatar">E</span>
                <span class="avatar">F</span>
                <span class="avatar">+</span>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- Upcoming Event Card 3 -->
      <article class="event-card">
        <div class="event-banner-wrapper">
          <span class="event-badge">Upcoming</span>
          <img src="https://placehold.co/600x300/3d8554/ffffff?text=Career+Open+House" alt="Career Open House" class="event-banner">
        </div>
        <div class="event-content">
          <h3 class="event-title">Career Open House</h3>
          <p class="event-date">📅 April 10, 2025</p>
          <p class="event-location">📍 Naldo Building, Pangasinan</p>
          <p class="event-summary">
            Meet the FortiVine team! Explore job opportunities in sustainable technology, software development, and project management. Network with our leaders and HR team.
          </p>
          <div class="event-footer">
            <a href="#" class="event-link">View Details →</a>
            <div class="event-attendees">
              <span>80+ registered</span>
              <div class="attendees-avatars">
                <span class="avatar">G</span>
                <span class="avatar">H</span>
                <span class="avatar">I</span>
                <span class="avatar">+</span>
              </div>
            </div>
          </div>
        </div>
      </article>

    </div>

    <!-- Recent Events Section -->
    <div class="section-divider">
      <h2 class="section-title">Recent Events</h2>
      <div class="grid grid-3 events">

        <!-- Recent Event Card 1 -->
        <article class="event-card">
          <div class="event-banner-wrapper">
            <span class="event-badge recent">Recent</span>
            <img src="/images/events/gdg_fest.jpg" alt="DevFest Baguio 2025" class="event-banner">
          </div>
          <div class="event-content">
            <h3 class="event-title">Google Developers Group DevFest Baguio 2025</h3>
            <p class="event-date">📅 October 18, 2025</p>
            <p class="event-location">📍 Baguio City Convention Center</p>
            <p class="event-summary">
              This event brought together participants for an engaging and meaningful experience focused on learning, collaboration, and community building. Throughout the session, attendees explored key topics, shared insights, and participated in interactive activities designed to deepen understanding and encourage connection.
            </p>
            <div class="event-footer">
              <a href="#" class="event-link">View Details →</a>
              <div class="event-attendees">
                <span>150+ attended</span>
                <div class="attendees-avatars">
                  <span class="avatar">J</span>
                  <span class="avatar">K</span>
                  <span class="avatar">L</span>
                  <span class="avatar">+</span>
                </div>
              </div>
            </div>
          </div>
        </article>

        <!-- Recent Event Card 2 -->
        <article class="event-card">
          <div class="event-banner-wrapper">
            <span class="event-badge recent">Recent</span>
            <img src="/images/events/sui.jpg" alt="SUI Workshop" class="event-banner">
          </div>
          <div class="event-content">
            <h3 class="event-title">SUI Workshop</h3>
            <p class="event-date">📅 July 5–7, 2025</p>
            <p class="event-location">📍 Baguio Convention Hall</p>
            <p class="event-summary">
              A day of innovation sprint where young innovators, developers, and sustainability advocates collaborated to design practical, tech-driven solutions for agriculture, clean energy, and smart city development. Participants showcased creativity, teamwork, and real-world problem-solving using FortiVine's APIs and open data tools.
            </p>
            <div class="event-footer">
              <a href="#" class="event-link">View Details →</a>
              <div class="event-attendees">
                <span>95+ attended</span>
                <div class="attendees-avatars">
                  <span class="avatar">M</span>
                  <span class="avatar">N</span>
                  <span class="avatar">O</span>
                  <span class="avatar">+</span>
                </div>
              </div>
            </div>
          </div>
        </article>

      </div>
    </div>

    <!-- Careers Section -->
    <section class="careers">
      <h2 class="section-title">Careers at FortiVine</h2>
      <p>
        We are always looking for passionate innovators to join our growing team. If you're driven by
        sustainability, technology, and social impact, FortiVine is your home to grow and make a difference.
      </p>
      <ul class="career-list">
        <li>
          <strong>Software Engineer (Laravel / PHP)</strong>
          Work on backend systems that power our sustainability tools.
        </li>
        <li>
          <strong>Data Analyst</strong>
          Build dashboards and metrics that measure environmental impact.
        </li>
        <li>
          <strong>UI/UX Designer</strong>
          Design user experiences for environmental transparency and usability.
        </li>
        <li>
          <strong>Partnership Manager</strong>
          Connect with global organizations and drive meaningful collaborations.
        </li>
      </ul>
      <p class="career-cta">
        Send your résumé and cover letter to
        <a href="mailto:careers@fortivinetech.com">careers@fortivinetech.com</a>
      </p>
    </section>
  </div>
</section>

@endsection