@extends('layouts.app')
@section('title', 'Services — FortiVine Tech')

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

  /* Grid Layout */
  .grid {
    display: grid;
    gap: 3rem;
  }

  .grid-3 {
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  }

  /* Service Cards */
  .card {
    background: white;
    border-radius: 24px;
    padding: 2.5rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
  }

  .card::before {
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

  .card:hover::before {
    transform: scaleX(1);
  }

  .card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 50px rgba(20, 92, 50, 0.2);
  }

  /* Service Card Specific */
  .svc {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
  }

  .svc-number {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #145c32, #2d6a39);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 700;
    box-shadow: 0 4px 15px rgba(20, 92, 50, 0.3);
  }

  .svc-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #145c32;
    line-height: 1.3;
  }

  .svc-desc {
    color: #3d704f;
    line-height: 1.8;
    font-size: 1.05rem;
  }

  /* Benefits Section */
  .benefits {
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    border-radius: 24px;
    padding: 4rem 3rem;
    margin-top: 4rem;
  }

  .benefits .section-title {
    margin-bottom: 3rem;
  }

  .benefit-list {
    list-style: none;
    max-width: 900px;
    margin: 0 auto;
    display: grid;
    gap: 1.5rem;
  }

  .benefit-list li {
    background: white;
    padding: 2rem;
    border-radius: 16px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    font-size: 1.1rem;
    color: #3d704f;
  }

  .benefit-list li:hover {
    transform: translateX(10px);
    box-shadow: 0 10px 30px rgba(20, 92, 50, 0.15);
  }

  .badge {
    background: linear-gradient(135deg, #145c32, #2d6a39);
    color: white;
    padding: 0.5rem 1.25rem;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.95rem;
    white-space: nowrap;
    box-shadow: 0 4px 12px rgba(20, 92, 50, 0.2);
  }

  /* Dynamic Service Cards */
  .service-card {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .service-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #145c32;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
  }

  .service-title:hover {
    color: #2d6a39;
    transform: translateX(5px);
  }

  .service-excerpt {
    color: #3d704f;
    line-height: 1.7;
    font-size: 1.05rem;
  }

  /* Pagination */
  .pagination {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 3rem;
    flex-wrap: wrap;
  }

  .pagination a,
  .pagination span {
    padding: 0.75rem 1.25rem;
    border-radius: 12px;
    background: white;
    color: #145c32;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  }

  .pagination a:hover {
    background: linear-gradient(135deg, #145c32, #2d6a39);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(20, 92, 50, 0.3);
  }

  .pagination .active span {
    background: linear-gradient(135deg, #145c32, #2d6a39);
    color: white;
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

    .benefits {
      padding: 3rem 2rem;
    }

    .benefit-list li {
      flex-direction: column;
      align-items: flex-start;
      gap: 1rem;
    }
  }

  @media (max-width: 768px) {
    .page-title {
      font-size: 2rem;
    }

    .card {
      padding: 2rem;
    }

    .section {
      padding: 3rem 1rem;
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
    <h1 class="page-title">Our Services</h1>
    <p class="lead">
      At FortiVine Tech, our services reflect our belief that innovation should always align with environmental accountability. We develop digital solutions that help industries operate more efficiently, reduce waste, and integrate sustainable practices into everyday operations.
    </p>
  </div>
</section>

<section class="section">
  <div class="container">
    {{-- Catalog: 5 core services (static content) --}}
    <div class="catalog grid grid-3">
      <article class="card svc">
        <div class="svc-number">1</div>
        <h3 class="svc-title">Agricultural Software Solutions for Waste Reduction</h3>
        <p class="svc-desc">
          This service supports farmers and agribusinesses in managing resources more efficiently. Using data analytics and farm management tools, it helps optimize irrigation, fertilizer use, and crop monitoring — reducing waste and promoting sustainable growth.
        </p>
      </article>

      <article class="card svc">
        <div class="svc-number">2</div>
        <h3 class="svc-title">Energy-Efficient Software Solutions</h3>
        <p class="svc-desc">
          Provides energy monitoring and management tools for facilities and organizations. It helps identify areas of high energy consumption, supports the use of renewable energy, and improves overall energy efficiency.
        </p>
      </article>

      <article class="card svc">
        <div class="svc-number">3</div>
        <h3 class="svc-title">Software Development and System Integration</h3>
        <p class="svc-desc">
          We build customized software and digital platforms tailored to client needs. Every solution is scalable, secure, and efficient — helping businesses transition toward sustainable, technology-driven operations.
        </p>
      </article>

      <article class="card svc">
        <div class="svc-number">4</div>
        <h3 class="svc-title">Data Analytics and Environmental Reporting</h3>
        <p class="svc-desc">
          FortiVine Tech provides analytics that help organizations make data-informed sustainability decisions. We develop reporting systems for tracking energy use, waste reduction, and environmental performance metrics aligned with sustainability goals.
        </p>
      </article>

      <article class="card svc">
        <div class="svc-number">5</div>
        <h3 class="svc-title">IT Consulting and Digital Transformation Support</h3>
        <p class="svc-desc">
          We assist organizations in adopting greener, smarter digital systems. From workflow digitization to sustainable IT strategies, we help clients modernize operations while reducing environmental impact.
        </p>
      </article>
    </div>

    {{-- Benefits & Key Features --}}
    <section class="benefits">
      <h2 class="section-title">Benefits &amp; Key Features</h2>
      <ul class="benefit-list">
        <li>
          <span class="badge">Efficiency</span>
          Improve resource management and reduce operational costs.
        </li>
        <li>
          <span class="badge">Transparency</span>
          Monitor sustainability metrics through user-friendly dashboards.
        </li>
        <li>
          <span class="badge">Adaptability</span>
          Scalable solutions that evolve with client and industry needs.
        </li>
        <li>
          <span class="badge">Accountability</span>
          Automated sustainability summaries and environmental tracking tools.
        </li>
      </ul>
    </section>

    {{-- Dynamic (database) services list --}}
    @if($services->count())
      <h2 class="section-title" style="margin-top: 4rem;">All Services</h2>
      <div class="grid grid-3">
        @foreach($services as $s)
          <article class="card service-card">
            <a href="{{ route('services.show', $s) }}" class="service-title">{{ $s->title }}</a>
            <p class="service-excerpt">{{ $s->excerpt }}</p>
          </article>
        @endforeach
      </div>

      <div class="pagination">
        {{ $services->links() }}
      </div>
    @endif
  </div>
</section>

@endsection