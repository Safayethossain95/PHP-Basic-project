		<?php include 'inc/header.php' ?>

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                            	
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo $assoc_intro['short_msg'] ?></h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?php echo $assoc_intro['who_am_i'] ?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?php echo $assoc_intro['summary'] ?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                    	<?php 
                                    		foreach ($socials as $key => $social) {
                                    			?>
                                    			 <li><a href="<?php echo $social['link'] ?>"><i class="<?php echo $social['icon'] ?>"></i></a></li>
                                    			 <?php
                                    		}
                                    	?>
                                       
                                       
                                    </ul>
                                </div>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img src="assets/images/banners_image/<?php echo $assoc_banner_image['banner_image'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="assets/img/banner/banner_img2.png" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2>About Me</h2>
                            </div>
                            <div class="about-content">
                            	<?php 
                            		$about_summary_select = "SELECT * FROM about_summary WHERE status=1";
									$summaries = mysqli_query($db,$about_summary_select);
									$assoc_summary=mysqli_fetch_assoc($summaries);
                            	?>
                                <p><?php echo $assoc_summary['summary'] ?></p>

                                <h3>Education:</h3>
                            </div>
                            
                            <?php 
                            	$select_education = "SELECT * FROM about_education WHERE status=1";
                            	$edu = mysqli_query($db,$select_education);
                            	
                            	foreach ($edu as $key => $val) {
                            		
                            ?>
                            	<div class="education">
                                <div class="year"><?php echo $val['year'] ?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?php echo $val['degree'] ?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?php echo $val['percentage'] ?>%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            	}
                            
                           ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
						<?php 
							foreach ($services as $key => $service) {
								?>
									<div class="col-lg-4 col-md-6">
										<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
			                                <i class="<?php echo $service['icon'] ?>"></i>
											<h3><?php echo $service['title'] ?></h3>
											<p>
												<?php echo $service['summary'] ?>
											</p>
										</div>
									</div>
								<?php
							}
						 ?>
						
						
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<?php 
	                    	$portfolios_select = "SELECT * FROM portfolios WHERE status=1";
							$portfolios = mysqli_query($db,$portfolios_select);

							foreach ($portfolios as $key => $portfolio) {
								?>
								<div class="col-lg-4 col-md-6 pitem">
		                            <div class="speaker-box">
										<div class="speaker-thumb">
											<img src="assets/images/portfolios/<?php echo $portfolio['thumbnail']?>" alt="img">
										</div>
										<div class="speaker-overlay">
											<span><?php echo $portfolio['category'] ?></span>
											<h4><a href="portfolio.php?id=<?php echo $portfolio['id']?>"><?php echo $portfolio['title'] ?></a></h4>
											<a href="portfolio.php?id=<?php echo $portfolio['id']?>" class="arrow-btn">More information <span></span></a>
										</div>
									</div>
		                        </div>
                        <?php
							}
                    	 ?>
                        
                        
                    </div>
                </div>
            </section>
            <!-- services-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">

                        	<?php 
                        		$fact_select = "SELECT * FROM fact_count WHERE status=1";
                        		$qq = mysqli_query($db,$fact_select);
                        		

                        		foreach ($qq as $key => $q) {
                        			?>
                        			<div class="col-xl-2 col-lg-3 col-sm-6">
		                                <div class="fact-box text-center mb-50">
		                                    <div class="fact-icon">
		                                        <i class="<?php echo $q['icon_name'] ?>"></i>
		                                    </div>
		                                    <div class="fact-content">
		                                        <h2><span class="count"><?php echo $q['count'] ?>
		                                        	
		                                        </span><?php if($key==3){echo "k";}; ?></h2>
		                                        <span><?php echo $q['title'] ?></span>
		                                    </div>
		                                </div>
		                            </div>
		                            <?php

                        		}
                        	?>

                            
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                            	<?php 
                            		foreach ($testimonials as $key => $testimonial) {
                            			?>
                            				<div class="single-testimonial text-center">
		                                    <div class="testi-avatar">
		                                        <img src="assets/images/testimonials/<?php echo $testimonial['profile_image'] ?>" alt="img">
		                                    </div>
		                                    <div class="testi-content">
		                                        <h4><span>“</span><?php echo $testimonial['message'] ?><span>”</span></h4>
		                                        <div class="testi-avatar-info">
		                                            <h5><?php echo $testimonial['name'] ?></h5>
		                                            <span><?php echo $testimonial['post'] ?></span>
		                                        </div>
		                                    </div>
		                                </div>
                            			<?php
                            		}
                            	?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                    	<?php 
                    		foreach ($brands as $key => $brand) {
                    			?>
                    			 <div class="col-xl-2 col-lg-2">
		                            <div class="single-brand">
		                                <img src="assets/images/brands/<?php echo $brand['logo'] ?>" alt="img">
		                            </div>
		                        </div>
		                        <?php
                    		}
                    	?>

                       
                        
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">

                                <p><?php echo $assoc_contacts['contact_msg'] ?></p>
                                <h5>OFFICE IN <span>NEW YORK</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?php echo $assoc_contacts['address'] ?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?php echo $assoc_contacts['phone'] ?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?php echo $assoc_contacts['email'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="contact-form.php" method="POST">
                                    <input type="text" name="name" placeholder="your name *">
                                    <input type="email" name="email" placeholder="your email *">
                                    <textarea name="message" id="message" placeholder="your message *"></textarea>
                                    <span>
                                    	<?php 
                                    		if(isset($_SESSION['send_msg'])){
                                    			echo $_SESSION['send_msg'];
                                    			unset($_SESSION['send_msg']);
                                    		}

                                    	?><br>
                                    </span>
                                    <button type="submit" class="btn">SEND</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

       <?php include 'inc/footer.php' ?>
