    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
		  <?php
	
		foreach($slideralls as $book)
		{

		
		?> 
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="/slider/<?=$book->photo ?>" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h3 class="text-white text-uppercase mb-3 animated slideInDown"><?=$book->name?> </h3>
                         
                                <p class="fs-5 fw-medium text-white mb-4 pb-2"><?=$book->caption?></p>
                                <a href="<?=$book->image_link?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">View</a>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
				<?php
    	    
		}
	
?>
           
        </div>
    </div>
    <!-- Carousel End -->


    

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">About Us</h6>
                    <h1 class="mb-4">Welcome to FinmockTest</h1>
                    <p class="mb-4 text-justify">FinMockTest.com offers comprehensive finance mock tests for aspiring students, providing a dynamic platform to hone their financial knowledge and skills. Elevate your preparation with realistic simulations, diverse question sets, and detailed performance analysis. Prepare for success in finance examinations confidently with FinMockTest.com.

            <b>Start learning from our experts</b></p>
                    <p class="fw-medium text-primary">
                        <img src="/assets/img/skill.png" alt="" height="30">
                        Enhance your skills with us now</p>
                  
                    <div class="d-flex align-items-center p-4 "> 
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                       
                    </div>
                </div>
                <div class="col-lg-6 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp about-two-imag" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="/assets/img/about-1.jpg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">

                        <span class="about-two__image-dots"></span>
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

    <!-- Benefits Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp about-two-imag" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="/assets/img/about-1.jpg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">

                        <span class="about-two__image-dots"></span>
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="/assets/img/about-2.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">Benefits of</h6>
                    <h1 class="mb-4"> Learning with FinMockTest</h1>
                    <p class="mb-4 text-justify">Learning with FinMockTest offers a unique blend of convenience, innovation, and expertise. Students gain access to a vast question bank, AI-generated queries for unexpected challenges, and the wisdom of seasoned financial professionals. This holistic approach ensures comprehensive preparation, adaptable learning, and a significant edge in competitive exams.

          </p>
          <div class="row mt-5" style="gap: 15px;">
            <div class="col-3 bg-blue p-3" >

              <div class="text-center">
                <img src="/assets/img/innovation.png" alt="" height="60">
              </div>
              <div class="text-center">
                  <b class="text-light ">Innovative Learning</b> 
              </div>
            </div>
            <div class="col-3 bg-blue p-3" >

              <div class="text-center">
                <img src="/assets/img/leader.png" alt="" height="60">
              </div>
              <div class="text-center">
                  <b class="text-light ">Expert Insights</b> 
              </div>
            </div>
            <div class="col-3 bg-blue p-3" >

              <div class="text-center">
                <img src="/assets/img/hourglass.png" alt="" height="60">
              </div>
              <div class="text-center">
                  <b class="text-light ">Anywhere, Anytime</b> 
              </div>
            </div>
          </div>
                  
                 
                </div>
            
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Insurance Start -->
    <div class="container-fluid py-5 px-4 px-lg-0">
        <div class="row g-0">
            <!-- <div class="col-lg-3 d-none d-lg-flex">
                <div class="d-flex align-items-center justify-content-center bg-primary w-100 h-100">
                    <h1 class="display-3 text-white m-0" style="transform: rotate(-deg);">15 Years Experience</h1>
                </div>
            </div> -->
            <div class="col-md-12 col-lg-12">
                <div class="p-4">
                    <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="text-secondary text-uppercase text-center">Our Services</h6>
                        <h1 class="mb-5 text-center">Explore Our Insurance Papers</h1>
                    </div>
                    <div class="owl-carousel service-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
					<?php
					foreach($bankingalls as $paper)
					{
						$r=0;
						$k=0;
						foreach($paper->reviews as $re)
						{
							 $r=$r+$re->rating;
							 $k++;
						}
						if($k>0)
						{
							$m=round($r/$k);
						}
						else
						{
							$m=0;
						}
						
					?>
                        <div class="bg-light p-4 he-course" style="border-radius: 20px;">
                            <div class="admin">
                                <i class="fa fa-users-cog active"></i>
                                By IPG Consultants
                            </div>
                       <div class="text-center d-flex align-items-center justify-content-center">
                        <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4 text-center" style="width: 75px; height: 75px;">
                            <?php
							if($paper->pic)
							{
								?>
							<img src="/paper/<?=$paper->pic?>" alt="" >
							<?php
							}
							else
							{
								
							}
							?>
                           </div>
                       </div>
                            <a href="<?php echo $this->Url->build(["controller" => "Examinations", "action" => "details", $paper->slug]); ?>" class="course-name">
                                <h4 class="mb-3"><?=$paper->name?></h4>
                            
                            </a>
                            <div class="rating">
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                            </div>
                            <div class="reviews">
                                <span><?=$m?></span><a href="">reviews</a>
                            </div>
                            <p class="text-left fw-bold">This Course Includes</p>
                            <?=$paper->short_description?>

                   
                        <div class="course-see-more">
                            <a href="<?php echo $this->Url->build(["controller" => "Examinations", "action" => "details", $paper->slug]); ?>" class="btn  w-100 mt-2">See paper<i class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        </div>
						<?php
					}
					?>
                       
                    
                </div>
                <div class="col-12 text-center mt-3">
                    <a class="btn btn-primary w-30 py-3" href="/paper/insurance">All insurance Papers</a>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Insurance End -->
    <!-- Banking Start -->
    <div class="container-fluid  px-4 px-lg-0">
        <div class="row g-0">
            <!-- <div class="col-lg-3 d-none d-lg-flex">
                <div class="d-flex align-items-center justify-content-center bg-primary w-100 h-100">
                    <h1 class="display-3 text-white m-0" style="transform: rotate(-deg);">15 Years Experience</h1>
                </div>
            </div> -->
            <div class="col-md-12 col-lg-12">
                <div class="p-4">
                    <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="text-secondary text-uppercase text-center">Lets Take a Look</h6>
                        <h1 class="mb-5 text-center">Explore Our Banking Papers</h1>
                    </div>
                    <div class="owl-carousel service-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
                        <?php
					foreach($insurancealls as $paper)
					{
						$r=0;
						$k=0;
						foreach($paper->reviews as $re)
						{
							 $r=$r+$re->rating;
							 $k++;
						}
						if($k>0)
						{
							$m=round($r/$k);
						}
						else
						{
							$m=0;
						}
						
					?>
                        <div class="bg-light p-4 he-course" style="border-radius: 20px;">
                            <div class="admin">
                                <i class="fa fa-users-cog active"></i>
                                By IPG Consultants
                            </div>
                       <div class="text-center d-flex align-items-center justify-content-center">
                        <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4 text-center" style="width: 75px; height: 75px;">
                            <?php
							if($paper->pic)
							{
								?>
							<img src="/paper/<?=$paper->pic?>" alt="" >
							<?php
							}
							else
							{
								
							}
							?>
                           </div>
                       </div>
                            <a href="<?php echo $this->Url->build(["controller" => "Examinations", "action" => "details", $paper->slug]); ?>" class="course-name">
                                <h4 class="mb-3"><?=$paper->name?></h4>
                            
                            </a>
                            <div class="rating">
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                            </div>
                            <div class="reviews">
                                <span><?=$m?></span><a href="">reviews</a>
                            </div>
                            <p class="text-left fw-bold">This Course Includes</p>
                            <?=$paper->short_description?>

                   
                        <div class="course-see-more">
                            <a href="<?php echo $this->Url->build(["controller" => "Examinations", "action" => "details", $paper->slug]); ?>" class="btn  w-100 mt-2">See paper<i class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        </div>
						<?php
					}
					?>
                       
                    
                </div>
                <div class="col-12 text-center mt-3">
                    <a class="btn btn-primary w-30 py-3" href="/paper/banking">All Banking Papers</a>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banking End -->


    <!-- Booking Start -->
    <div class="container-fluid my-5 px-0">
        <div class="video wow fadeInUp" data-wow-delay="0.1s">


            <h2 class="text-white mb-4 text-center p-2">We’ve best professional guides
                in every papers </h2>
            <p class="text-light text-center fs-5">in every papers
                FinMockTest.com offers comprehensive finance mock tests for aspiring students, providing a dynamic platform to hone their financial knowledge and skills. Elevate your preparation with realistic simulations, diverse question sets, and detailed performance analysis. Prepare for success in finance examinations confidently with FinMockTest.com.</p>
        </div>
     
    </div>
    <!-- Booking End -->

    <div class="container-xxl py-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Look into Our </h6>
                <h1 class="mb-5">Key Features</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class=" align-items-center justify-content-center bg-light p-4">
                        <div class="overflow-hidden text-center image-key">
                            <img class="" src="/assets/img/com-pre-plat.jpg" alt="">
                        </div>
                        <h5 class="text-center me-3 mb-0 text-custom">Comprehensive Preparation Platform</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light " style="margin-top: -18px;">

                        <p class="p-2 text-center text-blue fw-bold"> FinMockTest.com offers an extensive platform for aspiring finance students, featuring realistic simulations and diverse question sets. Our detailed performance analysis helps elevate preparation, ensuring candidates are well-equipped for success in competitive finance examinations.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class="align-items-center justify-content-center bg-light p-4">
                        <div class="overflow-hidden text-center image-key">
                            <img class="" src="/assets/img/team.jpg" alt="">
                        </div>
                        <h5 class="text-center me-3 mb-0 text-custom">Experienced And Diverse <br> Team</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light " style="margin-top: -18px;">

                        <p class="p-2 text-center text-blue fw-bold"> FinMockTest.com offers an extensive platform for aspiring finance students, featuring realistic simulations and diverse question sets. Our detailed performance analysis helps elevate preparation, ensuring candidates are well-equipped for success in competitive finance examinations.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class="align-items-center justify-content-center bg-light p-4">
                        <div class="overflow-hidden text-center image-key">
                            <img class="" src="/assets/img/mock.jpg" alt="">
                        </div>
                        <h5 class="text-center me-3 mb-0 text-custom">Tailored Mock Tests For Banking And Insurance</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light " style="margin-top: -18px;">

                        <p class="p-2 text-center text-blue fw-bold"> FinMockTest.com offers an extensive platform for aspiring finance students, featuring realistic simulations and diverse question sets. Our detailed performance analysis helps elevate preparation, ensuring candidates are well-equipped for success in competitive finance examinations.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class=" align-items-center justify-content-center bg-light p-4">
                        <div class="overflow-hidden text-center image-key">
                            <img class=" " src="/assets/img/authorization.jpg" alt="">
                        </div>
                        <h5 class="text-center me-3 mb-0 text-custom">Accessible Anytime, Anywhere</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light " style="margin-top: -18px;">

                        <p class="p-2 text-center text-blue fw-bold"> With our mobile app, students can access mock tests from any location, whether at home, commuting, or during spare moments at work. This convenience ensures that valuable preparation time is maximized, fitting seamlessly into busy schedules.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class=" align-items-center justify-content-center bg-light p-4">
                        <div class="overflow-hidden text-center image-key">
                            <img class=" " src="/assets/img/innovation.jpg" alt="">
                        </div>
                        <h5 class="text-center me-3 mb-0 text-custom">Innovative Question <br>Generation</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light " style="margin-top: -18px;">

                        <p class="p-2 text-center text-blue fw-bold"> A significant portion of our questions, 25% to be exact, are generated using Artificial Intelligence. This innovative approach prepares students for a wide range of question types, enhancing their ability to tackle unexpected challenges in exams.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class=" align-items-center justify-content-center bg-light p-4">
                        <div class="overflow-hidden text-center image-key">
                            <img class=" " src="/assets/img/content.jpg" alt="">
                        </div>
                        <h5 class="text-center me-3 mb-0 text-custom">Continuous Content Refreshment</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light " style="margin-top: -18px;">

                        <p class="p-2 text-center text-blue fw-bold"> Our commitment to excellence involves constant monitoring of new question types in professional exams and updating our question bank accordingly. This ensures that our mock tests remain relevant and highly effective for exam preparation.</p>
                    </div>
                </div>
   
                
            </div>
        </div>
    </div>
    <!-- Team Start -->



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