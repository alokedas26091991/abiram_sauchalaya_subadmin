    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <!-- <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
               <img src="./img/logo_main.png" alt="">
                </a>
            </div> -->
            <div class="col-lg-12 col-md-12 text-end">
              
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="m-0">91473 66880</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <i class="fa fa-map-marker-alt text-primary me-2"></i>
                        <p class="m-0">Om Towers, 7th Floor, Room No 705 & 706, 32, Jawahar Lal Nehru Road,
                            Kol 71</p>
                    </div>
                    
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="far fa-envelope-open text-primary me-2"></i>
                    <p class="m-0">Support@Finmocktest.Com
                    </p>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.facebook.com/profile.php?id=61556447009928&sfnsn=wiwspwa&mibextid=2JQ9oc"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.youtube.com/channel/UChfnqzYdgsT8Ph7FKUbCKLQ"><i class="fab fa-youtube"></i></a>
               
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
            <a href="" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
                <img src="/assets/img/logo_main.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
         
                <a href="" class="navbar-brand m-0 p-0 mobile-none">
                    <img src="/assets/img/logo_main.png" alt="">
                     </a>
                <div class="navbar-nav m-auto">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <a href="/about-us" class="nav-item nav-link">About</a>
               
                   <?php foreach ($menu as $s) { ?>
                    <a href="<?php echo $this->Url->build(["controller" => "Examinations", "action" => "index", $s->slug]); ?>" class="nav-item nav-link"><?= $s->name ?></a>
					<?php
				   }
				   ?>
                   
                    <a href="/contact" class="nav-item nav-link">Contact</a>
                </div>
				<?php if ($this->request->getSession()->read('Auth.User.id')){ ?>
                <a class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-blue d-flex align-items-center " href="/home/myaccount">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 45px; height: 45px; border-radius: 50%;">
                        <i class="fa fa-user text-primary"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-1 text-white">Welcome</p>
                        <h5 class="m-0 text-white"><?=$this->request->getSession()->read('Auth.User.name')?></h5>
                    </div>
                </a>
				<?php
				}
				else
				{
				?>
				<a class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-blue d-flex align-items-center " href="/login">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 45px; height: 45px; border-radius: 50%;">
                        <i class="fa fa-user text-primary"></i>
                    </div>
                 
                </a>
				<?php
				}
				?>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->