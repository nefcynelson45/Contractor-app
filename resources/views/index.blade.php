@extends('layouts.main')


<link rel="icon" href="/dist/img/AdminLTELogo.jpg" type="image/x-icon">
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="/">DGC<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="/" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Projects</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#about" class="get-started-btn scrollto">Get Started</a>
      <a href="{{ route('auth.login') }}" class="get-started-btn scrollto">Login</a>


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Davidson's General Contractors<span>.</span></h1>
          <h2>Building the future, Restoring the past.</h2>
        </div>
      </div>

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line"></i>
            <h3><a>Best in Industry</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line"></i>
            <h3><a>Custom Build</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-calendar-todo-line"></i>
            <h3><a>Since 1971</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-paint-brush-line"></i>
            <h3><a>Consulting</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-database-2-line"></i>
            <h3><a>Focused Planning</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="/assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Welcome to Davidson's General Contractors.</h3>
            <p class="fst-italic">
            If you’re looking for the best contractors nearby has to offer, look no further. You can rely on Davidson's GC. We specialise in providing quality, personalised domestic construction, Since 1971.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Bringing expertise, partnership, and innovation to construction.</li>
              <li><i class="ri-check-double-line"></i> Getting construction done on time, on budget, and on vision.</li>
              <li><i class="ri-check-double-line"></i> Our success stems from technical competency, attention to detail, professionalism and a commitment to the “job being done correctly the first time” philosophy. </li>
            </ul>
            <p>
            Our 50 years of experience offer many benefits to Owners, Owners’ Representatives, Developers, 
            Tenants, Architects, and Engineers, not the least of which is our skill at getting work done in
             City’s challenging construction environment.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" style="height:150px;" data-aos="zoom-in">

        <div class="clients-slider swiper-container">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="/assets/img/clients/client-1.png" class="img-fluid" height="300" width="333" alt=""></div>
            <div class="swiper-slide"><img src="/assets/img/clients/client-2.png" class="img-fluid" height="300" width="333"alt=""></div>
            <div class="swiper-slide"><img src="/assets/img/clients/client-3.png" class="img-fluid" height="300" width="333" alt=""></div>
            <div class="swiper-slide"><img src="/assets/img/clients/client-4.png" class="img-fluid" height="300" width="333" alt=""></div>
            <div class="swiper-slide"><img src="/assets/img/clients/client-5.png" class="img-fluid" height="300" width="333" alt=""></div>
            <div class="swiper-slide"><img src="/assets/img/clients/client-6.png" class="img-fluid" height="300" width="333" alt=""></div>
            <div class="swiper-slide"><img src="/assets/img/clients/client-7.png" class="img-fluid" height="300" width="333" alt=""></div>
            <div class="swiper-slide"><img src="/assets/img/clients/client-8.png" class="img-fluid" height="300" width="333" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="image col-lg-6" style='background-image: url("/assets/img/features.jpg");' data-aos="fade-right"></div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-receipt"></i>
              <h4>Commitment</h4>
              <p>Our passion for excellence ensures that we are committed to the job throughout the total duration of the project. 
                We’re not satisfied unless our customers are. </p>
            </div>
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-cube-alt"></i>
              <h4>Job Pride</h4>
              <p>At DGC., this is not just a job, but our life. Our reputation stems on the quality of our work. 
                Any work performed, we know and understand that it is a reflection of our business.We never cut corners. We are dedicated towards completing 
                the project right, the first time.</p>
            </div>
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-money"></i>
              <h4>Price</h4>
              <p>Before commencing an engagement, DGC. will provide the client with an itemized proposal, free of charge. 
                The price on the proposal is a fixed price do the client will never be presented with unexpected bills.</p>
            </div>
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-shield"></i>
              <h4>Integrity</h4>
              <p>There is nothing more frustrating than working with a company that lacks integrity. DGC.
                 prides itself on being transparent. Your price is fixed. We provide no hidden fees,
                 and you will have a clear understanding of the expectation and price of the job from the very beginning. </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Check our Services</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="img"><img src="/assets/img/res.jpg" alt="residential.jpg" class="img-fluid"></div>
              <h4><a href="">Residential</a></h4>
              <p>Davidson's GC. specializes in constructing homes on newly acquired land.
                 We'll work directly with you to plan, design, and construct your new house! 
                 With us, you'll always know you're safe and sound in your home.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
            <div class="img"><img src="/assets/img/commercial.jpg" alt="commercial.jpg" class="img-fluid"></div>
              <h4><a href="">Commercial</a></h4>
              <p>Interested in relocating your business' headquarters? Sitting on valuable real estate?
                 Work with us to build a state-of-the-art business center. 
                We will provide your business with the ideal space for your company to flourish. </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
            <div class="img"><img src="/assets/img/remodel.jpg" alt="remodel.jpg" class="img-fluid"></div>
              <h4><a href="">Remodeling Services</a></h4>
              <p>Want to make changes to your existing structure? We can help you redesign your kitchen, 
                living room, bathroom and more! From additions to complete renovations, we can do it all.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
            <div class="img"><img src="/assets/img/townhouse.jpg" alt="townhouse.jpg" class="img-fluid"></div>
              <h4><a href="">Town House & Unit Developments</a></h4>
              <p>In modern world, times are changing and new developments are continuously raising the bar. 
                At Davidson's GC, we understand this & it shows with our townhouse & unit developments. 
                We can assist construction of your pre approved plans or help with the very start 
                of design and obtaining the correct permits to ensure your investment is a success. You have the queries and we have the answers.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
            <div class="img"><img src="/assets/img/kr.jpg" alt="Knockdown.jpg" class="img-fluid"></div>
              <h4><a href="">Knockdown Rebuilds</a></h4>
              <p>Do you love the location of your current home but want to take your living experience to the next level?
                 Here at Davidson's GC,
                 we can help you to design and construct a new home without having to sacrifice your location, friends, family and the lifestyle you love. Register for an appointment to discuss how we can help.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
            <div class="img"><img src="/assets/img/est.jpg" alt="Estimation.jpg" class="img-fluid"></div>
              <h4><a href="">Budgeting, Estimating & Cost Control</a></h4>
              <p>Along with our selective hiring of estimating and MEPS specialty talent - 
                all ensure our clients the most accurate and reliable budget estimating and bid pricing.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Book Your Appointment</h3>
          <p> Interested in partnering with Davidson's General Contractors on your next project? <br>Register and Login to book your Appointments.</p>
          <a class="cta-btn" href="{{route('auth.register')}}">Register</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Check our Portfolio</p>
        </div>


        
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          @foreach($work as $pic)
          @if($pic->status == 'Completed')
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{ URL::asset('/assets/img/works'.$pic->photo)}}" class="img-fluid" alt="Work.jpg">
            </div>
          </div>
          @endif
        @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->




    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15718.815592025241!2d76.28702397652066!3d9.958575336072222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b0872c7abe6c9e7%3A0x7138a08633b8c9dd!2sPanampilly%20Nagar%2C%20Kochi%2C%20Kerala!5e0!3m2!1sen!2sin!4v1621187742566!5m2!1sen!2sin" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Panampilly Nagar, Ernakulam, Kochi 683504</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>davidsongc54@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+919287807568</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

          <div class="col-lg-12" data-aos="fade-right" data-aos-delay="100">
            <img src="/assets/img/contact.jpg" class="img-fluid" alt="Contact.jpg">
          </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  