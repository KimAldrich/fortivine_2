@extends('layouts.app')
@section('title', 'Testimonials — FortiVine Tech')

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

  /* Grid Layout */
  .grid {
    display: grid;
    gap: 3rem;
  }

  .grid-2 {
    grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
  }

  /* Testimonial Cards */
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

  /* Testimonial Specific */
  .testimonial {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    position: relative;
  }

  .testimonial::after {
    content: '"';
    position: absolute;
    top: -10px;
    left: 20px;
    font-size: 8rem;
    font-weight: 700;
    color: rgba(20, 92, 50, 0.08);
    line-height: 1;
    font-family: Georgia, serif;
    pointer-events: none;
  }

  blockquote {
    font-size: 1.15rem;
    line-height: 1.8;
    color: #3d704f;
    margin: 0;
    padding: 0;
    font-style: italic;
    position: relative;
    z-index: 1;
  }

  .author {
    font-size: 1rem;
    font-weight: 600;
    color: #145c32;
    margin: 0;
    padding-top: 1rem;
    border-top: 2px solid #e8f5e9;
    position: relative;
    z-index: 1;
  }

  /* Quote Icon Alternative */
  .testimonial-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #145c32, #2d6a39);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin-bottom: 1rem;
    box-shadow: 0 4px 15px rgba(20, 92, 50, 0.3);
  }

  /* Responsive Design */
  @media (max-width: 968px) {
    .page-title {
      font-size: 2.5rem;
    }

    .lead {
      font-size: 1.1rem;
    }

    .grid-2 {
      grid-template-columns: 1fr;
    }

    .testimonial::after {
      font-size: 5rem;
      top: 0;
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

    blockquote {
      font-size: 1.05rem;
    }

    .testimonial::after {
      font-size: 4rem;
      left: 15px;
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
    <h1 class="page-title">What Clients Say</h1>
    <p class="lead">
      Insights and experiences shared by organizations that have partnered with FortiVine Tech
      to integrate sustainability into technology-driven solutions.
    </p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="grid grid-2 testimonials">

      {{-- Static testimonials (7 total) --}}
      <article class="card testimonial">
        <blockquote>"FortiVine's energy software helped us cut our facility's carbon footprint by 18% in the first year. The results are undeniable."</blockquote>
        <p class="author">— CEO, PowerGrid Solutions</p>
      </article>

      <article class="card testimonial">
        <blockquote>"Their agricultural technology is practical, adaptable, and genuinely helped our family farm manage resources more efficiently. Highly recommended."</blockquote>
        <p class="author">— K. Dela Cruz, Independent Farmer</p>
      </article>

      <article class="card testimonial">
        <blockquote>"The FortiVine team transformed our outdated system into a fully integrated smart platform. We now save both energy and time."</blockquote>
        <p class="author">— Operations Director, GreenFuture Manufacturing</p>
      </article>

      <article class="card testimonial">
        <blockquote>"Their data analytics solution gave us complete visibility into our environmental performance. It's a game changer for reporting."</blockquote>
        <p class="author">— Sustainability Officer, UrbanEco Corp.</p>
      </article>

      <article class="card testimonial">
        <blockquote>"Working with FortiVine was seamless. Their IT consulting team helped us design a digital roadmap aligned with our sustainability goals."</blockquote>
        <p class="author">— Head of Technology, RenewEdge Global</p>
      </article>

      <article class="card testimonial">
        <blockquote>"They don't just deliver software — they deliver long-term environmental value. Our energy reduction exceeded expectations."</blockquote>
        <p class="author">— Project Manager, EnviroLink Systems</p>
      </article>

      <article class="card testimonial">
        <blockquote>"FortiVine's approach to sustainability through innovation sets them apart. Their professionalism and passion show in every project."</blockquote>
        <p class="author">— Managing Partner, Sustainable Growth Alliance</p>
      </article>

      {{-- Dynamic testimonials from database --}}
      @foreach(\App\Models\Testimonial::with('project')->get() as $t)
        <article class="card testimonial">
          <blockquote>"{{ $t->quote }}"</blockquote>
          <p class="author">— {{ $t->author }}, {{ $t->role }}, {{ $t->company }}</p>
        </article>
      @endforeach

    </div>
  </div>
</section>

@endsection