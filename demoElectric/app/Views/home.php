<?= $this->extend('layout') ?> 
 
<?= $this->section('content') ?> 
 
<!-- Hero Section --> 
<section class="hero-section"> 
    <div class="container"> 
        <div class="row align-items-center"> 
            <div class="col-lg-6"> 
                <h1 class="display-4 fw-bold mb-4">Powering Your World with Excellence</h1> 
                <p class="lead mb-4">Professional electrical services you can trust. From residential wiring 
to commercial installations, we deliver safe, reliable, and efficient electrical solutions for over 25 
years.</p> 
                <div class="d-flex flex-wrap gap-3"> 
                    <a href="<?= base_url('services') ?>" class="btn btn-primary btn-lg">Our Services</a> 
                    <a href="<?= base_url('contact') ?>" class="btn btn-outline-light btn-lg">Get Quote</a> 
                </div> 
            </div> 
            <div class="col-lg-6 text-center"> 
                <div class="hero-image mt-5 mt-lg-0"> 
                    <i class="fas fa-bolt" style="font-size: 15rem; color: rgba(255,255,255,0.1);"></i> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Features Section --> 
<section class="section-padding bg-light-custom"> 
    <div class="container"> 
        <div class="row text-center mb-5"> 
            <div class="col-lg-8 mx-auto"> 
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Why Choose Puihaha 
Electric?</h2> 
                <p class="lead text-muted">We combine decades of experience with cutting-edge 
technology to deliver exceptional electrical services that exceed expectations.</p> 
            </div> 
        </div> 
        <div class="row g-4"> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 text-center p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-shield-alt"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Licensed & Insured</h4> 
                    <p class="text-muted">Fully licensed electricians with comprehensive insurance 
coverage for your peace of mind and protection.</p> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 text-center p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-clock"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">24/7 Emergency Service</h4> 
                    <p class="text-muted">Round-the-clock emergency electrical services because 
electrical problems don't wait for business hours.</p> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 text-center p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-award"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">25+ Years Experience</h4> 
                    <p class="text-muted">Over two decades of expertise in residential, commercial, and 
industrial electrical solutions.</p> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 text-center p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-tools"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Modern Equipment</h4> 
                    <p class="text-muted">State-of-the-art tools and equipment ensure efficient, safe, and 
high-quality electrical work.</p> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 text-center p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-leaf"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Eco-Friendly Solutions</h4> 
                    <p class="text-muted">Energy-efficient installations and solar solutions to reduce your 
carbon footprint and energy costs.</p> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-6"> 
                <div class="card h-100 text-center p-4 feature-item"> 
                    <div class="feature-icon"> 
                        <i class="fas fa-handshake"></i> 
                    </div> 
                    <h4 class="text-primary-custom mb-3">Satisfaction Guarantee</h4> 
                    <p class="text-muted">100% satisfaction guarantee on all our work with comprehensive 
warranties for your investment.</p> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Services Preview Section --> 
<section class="section-padding"> 
    <div class="container"> 
        <div class="row text-center mb-5"> 
            <div class="col-lg-8 mx-auto"> 
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Our Core Services</h2> 
                <p class="lead text-muted">From simple repairs to complex installations, we handle all 
your electrical needs with precision and care.</p> 
            </div> 
        </div> 
        <div class="row g-4"> 
            <div class="col-lg-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="row g-0 align-items-center"> 
                        <div class="col-md-3 text-center"> 
                            <div class="feature-icon mx-0"> 
                                <i class="fas fa-home"></i> 
                            </div> 
                        </div> 
                        <div class="col-md-9"> 
                            <h4 class="text-primary-custom mb-2">Residential Services</h4> 
                            <p class="text-muted mb-0">Complete home electrical solutions including wiring, 
panel upgrades, outlet installation, and smart home automation.</p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
            <div class="col-lg-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="row g-0 align-items-center"> 
                        <div class="col-md-3 text-center"> 
                            <div class="feature-icon mx-0"> 
                                <i class="fas fa-building"></i> 
                            </div> 
                        </div> 
                        <div class="col-md-9"> 
                            <h4 class="text-primary-custom mb-2">Commercial Services</h4> 
                            <p class="text-muted mb-0">Professional commercial electrical installations, 
maintenance, and emergency repairs for businesses of all sizes.</p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
            <div class="col-lg-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="row g-0 align-items-center"> 
                        <div class="col-md-3 text-center"> 
                            <div class="feature-icon mx-0"> 
                                <i class="fas fa-solar-panel"></i> 
                            </div> 
                        </div> 
                        <div class="col-md-9"> 
                            <h4 class="text-primary-custom mb-2">Solar Solutions</h4> 
                            <p class="text-muted mb-0">Sustainable energy solutions with solar panel 
installation, battery storage, and energy management systems.</p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
            <div class="col-lg-6"> 
                <div class="card h-100 p-4 feature-item"> 
                    <div class="row g-0 align-items-center"> 
                        <div class="col-md-3 text-center"> 
                            <div class="feature-icon mx-0"> 
                                <i class="fas fa-exclamation-triangle"></i> 
                            </div> 
                        </div> 
                        <div class="col-md-9"> 
                            <h4 class="text-primary-custom mb-2">Emergency Repairs</h4> 
                            <p class="text-muted mb-0">24/7 emergency electrical repair services for power 
outages, electrical faults, and safety hazards.</p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
        <div class="text-center mt-5"> 
            <a href="<?= base_url('services') ?>" class="btn btn-primary btn-lg">View All Services</a> 
        </div> 
    </div> 
</section> 
 
<!-- Statistics Section --> 
<section class="section-padding bg-primary text-white"> 
    <div class="container"> 
        <div class="row text-center"> 
            <div class="col-lg-3 col-md-6 mb-4"> 
                <div class="stat-item"> 
                    <h2 class="display-4 fw-bold text-secondary-custom mb-2">2500+</h2> 
                    <p class="lead mb-0">Projects Completed</p> 
                </div> 
            </div> 
            <div class="col-lg-3 col-md-6 mb-4"> 
                <div class="stat-item"> 
                    <h2 class="display-4 fw-bold text-secondary-custom mb-2">25+</h2> 
                    <p class="lead mb-0">Years Experience</p> 
                </div> 
            </div> 
            <div class="col-lg-3 col-md-6 mb-4"> 
                <div class="stat-item"> 
                    <h2 class="display-4 fw-bold text-secondary-custom mb-2">100%</h2> 
                    <p class="lead mb-0">Customer Satisfaction</p> 
                </div> 
            </div> 
            <div class="col-lg-3 col-md-6 mb-4"> 
                <div class="stat-item"> 
                    <h2 class="display-4 fw-bold text-secondary-custom mb-2">24/7</h2> 
                    <p class="lead mb-0">Emergency Service</p> 
                </div> 
            </div> 
        </div> 
    </div> 
</section> 
 
<!-- Call to Action Section --> 
<section class="section-padding bg-light-custom"> 
    <div class="container"> 
        <div class="row align-items-center"> 
            <div class="col-lg-8"> 
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Ready to Power Up Your 
Project?</h2> 
                <p class="lead text-muted mb-4">Get a free consultation and quote for your electrical 
needs. Our expert team is ready to help you with safe, reliable, and efficient electrical 
solutions.</p> 
            </div> 
            <div class="col-lg-4 text-lg-end"> 
                <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg me-3">Get Free 
Quote</a> 
                <a href="tel:5551234567" class="btn btn-outline-primary btn-lg"> 
                    <i class="fas fa-phone me-2"></i>Call Now 
                </a> 
            </div> 
        </div> 
    </div> 
</section> 
 
<?= $this->endSection() ?>