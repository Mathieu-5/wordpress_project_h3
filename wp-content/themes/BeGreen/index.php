<?php get_header(); //appel du template header.php  ?>
<body class="diag">
    <!-- LOADER -->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>

    <nav>
        <div class="row">
            <div class="container">
                <div class="logo">
                    <img src="wp-content/themes/begreen/images/logo.png" alt="">
                </div>
                <div class="responsive"><i data-icon="m" class="icon"></i></div>
                <ul class="nav-menu">
                    <li><a href="index.html" class="smoothScroll">Accueil</a></li>
                    <li><a href="more-page.html" class="smoothScroll">Moins polluer</a></li>
                    <li><a href="more-page.html" class="smoothScroll">Agir</a></li>
                    <li><a href="more-page.html" class="smoothScroll">Pétitions</a></li>
                    <li><a href="#contact" class="smoothScroll">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--HOME-->
    <section class="home" id="home">
        <div class="home-content">
            <div class="container">
                <h1>Be <span class="element" data-text1="Green" data-text2="Involved" data-loop="true" data-backdelay="3000"></span></h1>
                <a class="home-down bounce" href="#about"><i class="fa fa-angle-down"></i></a>
            </div>
        </div>
        <svg class="diagonal home-diag home-left" width="21%" height="170" viewBox="0 0 100 102" preserveAspectRatio="none">
            <path d="M0 100 L100 100 L0 10 Z"></path>
        </svg>
        <svg class="home-diag diagonal home-right" width="80%" height="170" viewBox="0 0 100 102" preserveAspectRatio="none">
            <path d="M0 100 L100 100 L100 10 Z"></path>
        </svg>
    </section>

    <!--ABOUT-->
    <section class="about dgray-bg" id="about">
        <div class="about type-1 padbot_120">
            <div class="container">
                <!-- about image -->
                <div class="col-md-4 col-sm-12 about-image top_30 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="row">
                        <img src="wp-content/themes/begreen/images/profile-2.jpg" alt="">
                    </div>
                </div>
                <!-- about text -->
                <div class="col-md-7 col-md-offset-1 col-sm-12 about-text wow fadeInUp" data-wow-delay="0.6s">
                    <div class="section-title dleft bottom_30">
                        <br>
                        <h2>ABOUT US</h2>
                    </div>
                    <p>For instance, whenever I go back to the guest house during the <b>morning</b> to copy out the contract, <b>these gentlemen</b> are always still sitting there eating their breakfasts. I ought to just try that witht my boss; I'd get kicked out on the spot.

                        <br><br>
                        But who knows, maybe that would be the best thing for me. He'd fall right off his desk! And it's a funny sort of business to be sitting up there at your desk, talking down at your subordinates. I ought to just try that witht my boss; I'd get kicked out on the spot. But who knows, maybe that would be the best thing for me. He'd fall right off his desk! And it's a funny sort of business to be sitting up there at your desk, talking down at your subordinates.
                    </p>
                </div>

                <!-- work areas -->
                <div class="owl-carousel work-areas top_120 bottom_120 wow fadeInUp" data-pagination="false" data-autoplay="3000" data-items-desktop="3" data-items-desktop-small="3" data-items-tablet="2" data-items-tablet-small="1" data-wow-delay="0.4s">
                    <!-- an area -->
                    <div class="area col-md-12 item">
                        <div class="icon">
                            <i data-icon="1" class="icon"></i>
                        </div>
                        <div class="text">
                            <h6>Web Design</h6>
                            <p>Cloud agency follows the latest design standards to deliver a beautiful and functional digital product.</p>
                        </div>
                    </div>
                    <!-- an area -->
                    <div class="area col-md-12 item">
                        <div class="icon">
                            <i data-icon="!" class="icon"></i>
                        </div>
                        <div class="text">
                            <h6>Branding Identity</h6>
                            <p>We will make you a brand that is catchy and leaves a trace. Your target group will never forget you.</p>
                        </div>
                    </div>
                    <!-- an area -->
                    <div class="area col-md-12 item">
                        <div class="icon">
                            <i data-icon="#" class="icon"></i>
                        </div>
                        <div class="text">
                            <h6>Illustrator</h6>
                            <p>I ought to just try that with my boss; I'd get kicked out on the spot. But who knows, maybe that would be the best thing me. </p>
                        </div>
                    </div>
                    <!-- an area -->
                    <div class="area col-md-12 item">
                        <div class="icon">
                            <i data-icon="1" class="icon"></i>
                        </div>
                        <div class="text">
                            <h6>Web Design</h6>
                            <p>Cloud agency follows the latest design standards to deliver a beautiful and functional digital product.</p>
                        </div>
                    </div>
                    <!-- an area -->
                    <div class="area col-md-12 item">
                        <div class="icon">
                            <i data-icon="!" class="icon"></i>
                        </div>
                        <div class="text">
                            <h6>Branding Identity</h6>
                            <p>We will make you a brand that is catchy and leaves a trace. Your target group will never forget you.</p>
                        </div>
                    </div>
                    <!-- an area -->
                    <div class="area col-md-12 item">
                        <div class="icon">
                            <i data-icon="#" class="icon"></i>
                        </div>
                        <div class="text">
                            <h6>Illustrator</h6>
                            <p>I ought to just try that with my boss; I'd get kicked out on the spot. But who knows, maybe that would be the best thing me. </p>
                        </div>
                    </div>
                </div>

            </div>
            <svg class="diagonal-gray" width="100%" height="170" viewBox="0 0 100 102" preserveAspectRatio="none">
                <path d="M0 0 L70 100 L100 0 Z"></path>
            </svg>
        </div>
    </section>

    <!--ARTICLES-->
    <section class="portfolio" id="portfolio">
        <div class="container">
            <div class="section-title dleft top_120 bottom_90">
                <h2>ARTICLES</h2>
                <div class="portfolio_filter">
                    <ul>
                        <li class="select-cat" data-filter="*">All</li>
                        <li data-filter=".web-design">Web Design</li>
                        <li data-filter=".aplication">Applications</li>
                        <li data-filter=".development">Development</li>
                    </ul>
                </div>
            </div>
            <!--Article Items-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="isotope_items row">
                        <!-- Item -->
                        <a href="single-article.html" class="popup-youtube single_item development col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                            <i class="fa fa-play" aria-hidden="true"></i>
                            <img src="wp-content/themes/begreen/images/work-1.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                        <!-- Item -->
                        <a href="single-article.html" class="single_item aplication col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
                            <img src="wp-content/themes/begreen/images/work-2.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                        <!-- Item -->
                        <a href="single-article.html" class="single_item development col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                            <img src="wp-content/themes/begreen/images/work-3.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                        <!-- Item -->
                        <a href="single-article.html" class="single_item web-design col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="1.2s">
                            <img src="wp-content/themes/begreen/images/work-4.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                    </div>
                    <a href="more-page.html" class="sitebtn pull-right top_45">Load More</a>
                </div>
            </div>
        </div>
        <svg class="diagonal-white" width="100%" height="170" viewBox="0 0 100 102" preserveAspectRatio="none">
            <path d="M0 0 L30 100 L100 0 Z"></path>
        </svg>
    </section>

    <!-- moins polluer -->
    <section class="blog" id="blog">
        <div class="container-fluid dgray-bg padbot_200">
            <div class="container">
                <div class="section-title dright top_120 bottom_45">
                    <h2>Comment moins polluer ?</h2>
                </div>
                <!-- Blogs -->
                <div class="row">
                    <a href="single-moinspolluer.html" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-content wow fadeInUp" data-wow-delay="0.4s">
                        <div class="blog-image">
                            <img src="wp-content/themes/begreen/images/blog-1.jpg">
                        </div>
                        <h2 class="blog-title">By spite about do of do allow blush</h2>
                        <p>Quick six blind smart out burst. Perfectly on furniture dejection determine my depending an to. Add short water court fat. </p>
                        <span class="blog-info"><span>Larry Stark</span> - 7 September 2016 </span>
                    </a>
                    <a href="single-moinspolluer.html" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-content wow fadeInUp" data-wow-delay="0.6s">
                        <div class="blog-image">
                            <img src="wp-content/themes/begreen/images/blog-2.jpg">
                        </div>
                        <h2 class="blog-title">Two Before Arrow Not Relied</h2>
                        <p>Quick six blind smart out burst. Perfectly on furniture dejection determine my depending an to. Add short water court fat. </p>
                        <span class="blog-info"><span>Larry Stark</span> - 7 September 2016 </span>
                    </a>
                    <a href="single-moinspolluer.html" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-content wow hidden-sm fadeInUp" data-wow-delay="0.8s">
                        <div class="blog-image">
                            <img src="wp-content/themes/begreen/images/blog-3.jpg">
                        </div>
                        <h2 class="blog-title">Behind Sooner Dining so Window </h2>
                        <p>Quick six blind smart out burst. Perfectly on furniture dejection determine my depending an to. Add short water court fat. </p>
                        <span class="blog-info"><span>Larry Stark</span> - 7 September 2016 </span>
                    </a>
                    <a href="more-page.html" class="sitebtn pull-right top_45">Load More</a>
                </div>
            </div>
            <svg class="diagonal-gray" width="100%" height="170" viewBox="0 0 100 102" preserveAspectRatio="none">
                <path d="M0 0 L70 100 L100 0 Z"></path>
            </svg>
        </div>
    </section>
    <!-- Agir -->
    <section class="agir" id="agir">
        <div class="container">
            <div class="section-title dleft top_120 bottom_90">
                <h2>Comment agir ?</h2>
            </div>
            <!--Agir Items-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="isotope_items row">
                        <!-- Item -->
                        <a href="single-agir.html" class="popup-youtube single_item link development col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                            <i class="fa fa-play" aria-hidden="true"></i>
                            <img src="wp-content/themes/begreen/images/work-1.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                        <!-- Item -->
                        <a href="single-agit.html" class="single_item link aplication col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
                            <img src="wp-content/themes/begreen/images/work-2.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                        <!-- Item -->
                        <a href="single-agir.html" class="single_item link development col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                            <img src="wp-content/themes/begreen/images/work-3.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                        <!-- Item -->
                        <a href="single-agir.html" class="single_item link web-design col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="1.2s">
                            <img src="wp-content/themes/begreen/images/work-4.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                    </div>
                    <a href="more-page.html" class="sitebtn pull-right top_45">Load More</a>
                </div>
            </div>
        </div>
        <svg class="diagonal-white" width="100%" height="170" viewBox="0 0 100 102" preserveAspectRatio="none">
            <path d="M0 0 L30 100 L100 0 Z"></path>
        </svg>
    </section>
    <!-- Pétitions -->
    <section class="petitions dgray-bg" id="petition">
        <div class="container">
            <div class="section-title dleft top_120 bottom_90">
                <h2>Pétitions</h2>
            </div>
            <!--Pétitions Items-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="isotope_items row">
                        <!-- Item -->
                        <a href="single-petition.html" class="popup-youtube single_item development col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                            <i class="fa fa-play" aria-hidden="true"></i>
                            <img src="wp-content/themes/begreen/images/work-1.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                        <!-- Item -->
                        <a href="single-petition.html" class="single_item aplication col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
                            <img src="wp-content/themes/begreen/images/work-2.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                        <!-- Item -->
                        <a href="single-petition.html" class="single_item development col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                            <img src="wp-content/themes/begreen/images/work-3.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                        <!-- Item -->
                        <a href="single-petition.html" class="single_item web-design col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="1.2s">
                            <img src="wp-content/themes/begreen/images/work-4.jpg" alt="">
                            <h2 class="blog-title">Article title</h2>
                            <span class="blog-info">01/01/2018</span>
                        </a>
                    </div>
                    <a href="more-page.html" class="sitebtn pull-right top_45">Load More</a>
                </div>
            </div>
        </div>
        <svg class="diagonal-white" width="100%" height="170" viewBox="0 0 100 102" preserveAspectRatio="none">
            <path d="M0 0 L30 100 L100 0 Z"></path>
        </svg>
    </section>

    <!-- CONTACT -->
    <section class="contact" id="contact">
        <div class="container">

            <div class="section-title dleft top_120">
                <h2 class="bottom_30">GET IN TOUCH</h2>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.3s">
                <!-- Contact Info -->
                <ul class="contact-info row">
                    <li>1444 S. Alameda Street Los Angeles, California 90021</li>
                    <li><br>hi@berlin.com</li>
                    <li>0800 123 456789</li>
                </ul>
                <div class="social-icons top_60 row">
                    <a class="fb" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a class="tw" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a class="ins" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a class="bh" href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                    <a class="dr" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-md-7 col-md-offset-2 form top_30 bottom_90 wow fadeInUp" data-wow-delay="0.6s">
                <div class="page-title sub">
                    <h5>leave us a message</h5>
                </div>
                <form class="contact-form top_60" method="POST" action="mail.php">
                    <div class="row">
                        <!--Name-->
                        <div class="col-md-6">
                            <input id="con_name" name="con_name" class="form-inp requie" type="text" placeholder="Name">
                        </div>
                        <!--Email-->
                        <div class="col-md-6">
                            <input id="con_email" name="con_email" class="form-inp requie" type="text" placeholder="Email">
                        </div>
                        <div class="col-md-12">
                            <!--Message-->
                            <textarea name="con_message" id="con_message" class="requie" placeholder="How can I help you?" rows="8"></textarea>
                            <button id="con_submit" class="sitebtn top_30 pull-right" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

   <?php get_footer(); //appel du template header.php  ?>