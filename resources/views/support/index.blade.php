@extends('layouts.app')
@section('title', 'Customer Service — FortiVine Tech')

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
    min-height: 50vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: linear-gradient(135deg, #0a4d2e 0%, #145c32 50%, #1e7a45 100%);
    background-size: 400% 400%;
    animation: gradientShift 15s ease infinite;
    margin-bottom: 4rem;
    margin-top: 80px;
    padding: 2rem;
    color: white;
  }

  @keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  .page-title {
    font-size: 3.5rem;
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

  .lead {
    font-size: 1.3rem;
    max-width: 800px;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.95);
    animation: fadeInUp 1s ease-out 0.2s both;
  }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
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

  /* Cards */
  .card {
    background: white;
    border-radius: 24px;
    padding: 2.5rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
  }

  .card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 50px rgba(20, 92, 50, 0.2);
  }

  .card h2.section-title {
    font-size: 1.8rem;
    color: #145c32;
    margin-bottom: 1rem;
  }

  /* FAQs */
  .faq {
    margin-bottom: 1rem;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    padding: 1rem;
    transition: background 0.3s;
  }

  .faq[open] {
    background: #f0fdf4;
  }

  .faq summary {
    font-weight: 600;
    cursor: pointer;
    color: #145c32;
    font-size: 1.1rem;
  }

  .faq-body {
    margin-top: 0.5rem;
    font-size: 1rem;
    line-height: 1.6;
    color: #3d704f;
  }

  /* Form */
  .form-row {
    margin-bottom: 1.5rem;
    display: flex;
    flex-direction: column;
  }

  .form-row label {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #145c32;
  }

  .input, .textarea {
    border-radius: 12px;
    border: 1px solid #cfd8dc;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: border 0.3s;
  }

  .input:focus, .textarea:focus {
    outline: none;
    border-color: #145c32;
    box-shadow: 0 0 0 3px rgba(20, 92, 50, 0.15);
  }

  .btn-primary {
    background: linear-gradient(135deg, #145c32, #2d6a39);
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 12px;
    border: none;
    font-size: 1rem;
    cursor: pointer;
    transition: transform 0.3s, box-shadow 0.3s;
  }

  .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(20, 92, 50, 0.3);
  }

  .muted {
    color: #6b7280;
    font-size: 0.9rem;
  }

  .alert {
    margin-top: 1rem;
    padding: 1rem;
    border-radius: 12px;
  }

  .alert-error { background: #fde2e1; color: #b91c1c; }
  .alert-success { background: #d1fae5; color: #065f46; }

  .contact-list {
    list-style: none;
    padding-left: 0;
    font-size: 1rem;
    line-height: 1.6;
  }

  .contact-list li {
    margin-bottom: 0.5rem;
  }

  .link {
    color: #145c32;
    text-decoration: underline;
  }

  /* Responsive */
  @media (max-width: 968px) {
    .page-title { font-size: 2.5rem; }
    .grid-2 { grid-template-columns: 1fr; }
  }

  @media (max-width: 768px) {
    .page-title { font-size: 2rem; }
    .card { padding: 2rem; }
    .section { padding: 3rem 1rem; }
    .faq-body { font-size: 0.95rem; }
  }
</style>

<!-- Hero Section -->
<section class="home-hero">
  <div class="container">
    <h1 class="page-title">Customer Service</h1>
    <p class="lead">
      Live Chat/Phone support: <strong>M–F, 9am–5pm PST</strong>. Email/Ticket responses within <strong>24 hours</strong>.
      For urgent enterprise issues call <strong>+1 (555) 987-6543</strong> or email
      <a href="mailto:support@fortivinetech.com" class="link">support@fortivinetech.com</a>.
    </p>
  </div>
</section>

<section class="section" id="support">
  <div class="container">
    <div class="grid grid-2">

      {{-- FAQs --}}
      <article class="card">
        <h2 class="section-title">FAQs</h2>
        <div class="faq-list">
          <details class="faq" open>
            <summary>What kind of technology do you use for waste reduction?</summary>
            <div class="faq-body">
              We use predictive modeling and proprietary algorithms to optimize resource use and reduce waste across operations.
            </div>
          </details>
          <details class="faq">
            <summary>Can your software integrate with existing legacy systems?</summary>
            <div class="faq-body">
              Yes. We provide API connectors and custom adapters for seamless integration.
            </div>
          </details>
          <details class="faq">
            <summary>Do you provide cloud-based deployment options?</summary>
            <div class="faq-body">
              Our solutions can be deployed on cloud, on-premises, or hybrid environments.
            </div>
          </details>
          <details class="faq">
            <summary>How do you ensure data privacy and security?</summary>
            <div class="faq-body">
              We follow ISO/IEC 27001 standards, encrypt data, and implement multi-layered access controls.
            </div>
          </details>
        </div>

      </article>

      {{-- Support Ticket Form --}}
      <article class="card">
        <h2 class="section-title">Open a Support Ticket</h2>
        <p class="muted">For non-urgent issues. Enterprise customers with 24/7 contracts should use their priority line.</p>
        <form method="post" action="{{ route('support.store') }}" class="form">
          @csrf
          <div class="form-row">
            <label for="name">Name</label>
            <input id="name" name="name" class="input" placeholder="Your full name" required>
          </div>
          <div class="form-row">
            <label for="company">Company <span class="muted">(optional)</span></label>
            <input id="company" name="company" class="input" placeholder="Company or organization">
          </div>
          <div class="form-row">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="input" placeholder="you@example.com" required>
          </div>
          <div class="form-row">
            <label for="subject">Subject</label>
            <input id="subject" name="subject" class="input" placeholder="Brief subject" required>
          </div>
          <div class="form-row">
            <label for="message">Issue Description</label>
            <textarea id="message" name="message" rows="5" class="textarea" placeholder="Describe the issue…" required></textarea>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn-primary">Submit Ticket</button>
            <span class="help-inline muted">We’ll reply via email within 24 hours.</span>
          </div>
        </form>

        @if ($errors->any())
          <div class="alert alert-error">
            <strong>Submission errors:</strong>
            <ul>
              @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
      </article>
    </div>

    {{-- Contact Options --}}
    <section class="section" style="padding-top:2rem;">
      <h2 class="section-title">Contact Options</h2>
      <ul class="contact-list">
        <li>Email: <a class="link" href="mailto:support@fortivinetech.com">support@fortivinetech.com</a></li>
        <li>Phone: <a class="link" href="tel:+15559876543">+1 (555) 987-6543</a></li>
        <li>Service Availability: Live Chat/Phone (M–F, 9am–5pm PST); Email/Tickets within 24h</li>
      </ul>
    </section>

  </div>
</section>
@endsection
