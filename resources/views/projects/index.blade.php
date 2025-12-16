@extends('layouts.app')
@section('title', 'Portfolio — FortiVine Tech')

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

  .home-hero:last-of-type {
    margin-top: 4rem;
    margin-bottom: 0;
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

  /* Portfolio Grid - 2 columns */
  .simple-portfolio-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 3rem;
    margin-top: 3rem;
  }

  /* Portfolio Card */
  .portfolio-card {
    display: flex;
    flex-direction: column;
    background: white;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
  }

  .portfolio-card::before {
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

  .portfolio-card:hover::before {
    transform: scaleX(1);
  }

  .portfolio-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 50px rgba(20, 92, 50, 0.2);
  }

  /* Image Container - Fixed aspect ratio */
  .portfolio-image-wrap {
    width: 100%;
    height: 320px;
    overflow: hidden;
    background: #f5f5f5;
    position: relative;
  }

  .portfolio-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.5s ease;
  }

  .portfolio-card:hover .portfolio-image {
    transform: scale(1.1);
  }

  /* Card Body */
  .portfolio-body {
    padding: 2rem;
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
    flex: 1;
  }

  .portfolio-title {
    font-size: 1.75rem;
    font-weight: 700;
    margin: 0;
    color: #145c32;
    line-height: 1.3;
  }

  .portfolio-description {
    color: #3d704f;
    line-height: 1.8;
    margin: 0;
    font-size: 1.05rem;
  }

  .portfolio-meta {
    display: flex;
    gap: 2rem;
    font-size: 0.95rem;
    color: #2d6a39;
    font-weight: 600;
    padding-top: 0.5rem;
    border-top: 2px solid #e8f5e9;
  }

  .portfolio-meta strong {
    color: #145c32;
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
    font-weight: 600;
    color: #2d6a39;
    transition: all 0.3s ease;
  }

  .tag:hover {
    background: linear-gradient(135deg, #c8e6c9, #a5d6a7);
    transform: translateY(-2px);
  }

  /* Buttons */
  .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1.5rem;
    border-radius: 20px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    margin-top: auto;
  }

  .btn-ghost {
    background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
    color: #2d6a39;
  }

  .btn-ghost:hover {
    background: linear-gradient(135deg, #c8e6c9, #a5d6a7);
    transform: translateX(5px);
  }

  .btn-primary {
    background: linear-gradient(135deg, #145c32, #2d6a39);
    color: white;
    box-shadow: 0 4px 15px rgba(20, 92, 50, 0.3);
  }

  .btn-primary:hover {
    background: linear-gradient(135deg, #0a4d2e, #145c32);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(20, 92, 50, 0.4);
  }

  .btn-lg {
    padding: 1rem 2.5rem;
    font-size: 1.1rem;
  }

  /* CTA Section */
  .cta-wrap {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 2rem;
    flex-wrap: wrap;
  }

  .cta-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: white;
    margin: 0 0 0.5rem 0;
    line-height: 1.2;
  }

  .cta-sub {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
  }

  /* Responsive Design */
  @media (max-width: 968px) {
    .page-title {
      font-size: 2.5rem;
    }

    .lead {
      font-size: 1.1rem;
    }

    .simple-portfolio-grid {
      grid-template-columns: 1fr;
      gap: 2rem;
    }

    .cta-wrap {
      flex-direction: column;
      text-align: center;
    }

    .cta-title {
      font-size: 2rem;
    }
  }

  @media (max-width: 768px) {
    .page-title {
      font-size: 2rem;
    }

    .portfolio-image-wrap {
      height: 250px;
    }

    .portfolio-body {
      padding: 1.5rem;
    }

    .portfolio-title {
      font-size: 1.5rem;
    }

    .section {
      padding: 3rem 1rem;
    }

    .cta-title {
      font-size: 1.75rem;
    }

    .cta-sub {
      font-size: 1rem;
    }
  }
</style>

{{-- HERO --}}
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
    <h1 class="page-title">Our Work</h1>
    <p class="lead">
      A curated selection of impactful projects delivered across energy, agriculture,
      analytics, and civic innovation.
    </p>
  </div>
</section>

<section class="section">
  <div class="container">
    @php
      $projects = [
        [
          'title' => 'Recycling and Rewards Mobile Application',
          'desc' => 'A comprehensive mobile application that incentivizes environmental responsibility by rewarding users for recycling activities. Built with Laravel backend and Vue.js frontend, the app features eco-point tracking, reward redemption systems, and gamification elements to encourage sustainable behavior. Successfully increased user engagement in recycling programs by providing tangible benefits for eco-friendly actions.',
          'image' => '/images/portfolio/1.png',
          'year' => '2024',
          'role' => 'Lead Developer',
          'stack' => ['Laravel', 'Vue', 'IoT'],
        ],
        [
          'title' => 'Study Sphere',
          'desc' => 'An intelligent educational platform leveraging machine learning to create personalized study experiences. The application analyzes student learning patterns and adapts content delivery accordingly. Developed using Python and ML frameworks with cloud deployment, it helps students optimize their learning efficiency through data-driven insights and collaborative tools.',
          'image' => '/images/portfolio/2.png',
          'year' => '2023',
          'role' => 'Data Engineer',
          'stack' => ['Python', 'ML', 'Cloud'],
        ],
        [
          'title' => 'GreenCart',
          'desc' => 'A user-centric mobile shopping platform focused on sustainable and eco-friendly products. Designed using Figma with comprehensive UX research and strategy implementation. The interface emphasizes intuitive navigation, product discovery, and transparent sustainability metrics, making conscious consumerism accessible and engaging for everyday shoppers.',
          'image' => '/images/portfolio/3.jpg',
          'year' => '2024',
          'role' => 'Product Designer',
          'stack' => ['Figma', 'UX Strategy'],
        ],
        [
          'title' => 'Ecoward',
          'desc' => 'A full-stack web and mobile solution promoting environmental sustainability through gamified recycling incentives. Built with Node.js, React, and API integrations, the platform manages user rewards, tracks environmental impact metrics, and facilitates partnerships with recycling centers. The system successfully scaled to handle multiple user tiers and redemption options.',
          'image' => '/images/portfolio/4.jpg',
          'year' => '2022',
          'role' => 'Full-stack Developer',
          'stack' => ['Node.js', 'React', 'API'],
        ],
      ];
    @endphp

    {{-- GRID --}}
    <div class="simple-portfolio-grid">
      @foreach ($projects as $p)
        <article class="portfolio-card">
          <div class="portfolio-image-wrap">
            <img src="{{ $p['image'] }}" class="portfolio-image" alt="{{ $p['title'] }}" loading="lazy">
          </div>

          <div class="portfolio-body">
            <h3 class="portfolio-title">{{ $p['title'] }}</h3>
            <p class="portfolio-description">{{ $p['desc'] }}</p>

            <div class="portfolio-meta">
              <span><strong>Year:</strong> {{ $p['year'] }}</span>
              <span><strong>Role:</strong> {{ $p['role'] }}</span>
            </div>

            <div class="portfolio-tags">
              @foreach ($p['stack'] as $tag)
                <span class="tag">{{ $tag }}</span>
              @endforeach
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>

{{-- CTA --}}
<section class="home-hero">
  <div class="hero-particles">
    <div class="particle" style="left: 15%; animation-delay: 1s;"></div>
    <div class="particle" style="left: 35%; animation-delay: 3s;"></div>
    <div class="particle" style="left: 55%; animation-delay: 2s;"></div>
    <div class="particle" style="left: 75%; animation-delay: 4s;"></div>
    <div class="particle" style="left: 85%; animation-delay: 0.5s;"></div>
  </div>

  <div class="container cta-wrap">
    <div>
      <h3 class="cta-title">Have a project in mind?</h3>
      <p class="cta-sub">Let's build something impactful together.</p>
    </div>
    <a class="btn btn-primary btn-lg" href="/contact">Start a project</a>
  </div>
</section>

@endsection
@section('footer')
@endsection