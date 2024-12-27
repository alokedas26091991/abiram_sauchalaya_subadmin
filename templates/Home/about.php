    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
   
                    <li class="breadcrumb-item text-white active" aria-current="page">About us</li>
                </ol>
            </nav>
        </div>
    </div>

<!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">About Us</h6>
                    <h1 class="mb-4">Elevate Your Exam Preparation with Our Mock Tests</h1>
                    <p class="mb-4">Are you ready to take your career in the financial services sector to the next level? We understand the challenges you face – the competitive nature of the industry, the overwhelming volume of information, and the limited time available for preparation. That's why we've created a solution tailored to your needs</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Residential & commercial plumbing</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Quality services at affordable prices</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Immediate 24/ 7 emergency services</p>
                    <div class="bg-blue d-flex align-items-center p-4 mt-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                            <i class="fa fa-star fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                            <h3 class="m-0 text-light">STUDENTS LOVED US</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="/assets/img/about-1.jpg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="/assets/img/about-2.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


  <!-- Fact Start -->
  <div class="container-fluid fact bg-dark my-5 py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
              <img src="/assets/img/verify.png" alt="" height="50">
                <h2 class="text-white mb-2" data-toggle="counter-up">4890</h2>
                <p class="text-white mb-0">Trusted by</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                <p class="text-white mb-0">Lorem, ipsum dolor.</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-users fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                <p class="text-white mb-0">Lorem, ipsum dolor.</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-wrench fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                <p class="text-white mb-0">Lorem, ipsum.</p>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->

    
        


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-secondary text-uppercase">Testimonial</h6>
                <h1 class="mb-5">What our students
                    have to say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
               <?php
			foreach($testimonial as $test)
			{
			?>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0"><?=$test->details?></p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="/testimonial/<?=$test->photo ?>" style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1"><?=$test->name?></h5>
                    <p class="m-0"><?=$test->designation?></p>
               
                </div>
				<?php
				}
				?>
             
            </div>
        </div>
    </div>
    <!-- Testimonial End -->