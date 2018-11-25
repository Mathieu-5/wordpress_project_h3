<?php get_header(); //appel du template header.php  ?>

<!--HOME-->
<section class="home" id="home">
    <div class="home-content">
        <div class="container">
            <h1><?php the_title() ?></span></h1>
            <a class="home-down bounce" href="#about"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
    <svg class="diagonal home-left" width="21%" height="170" viewBox="0 0 100 102" preserveAspectRatio="none">
        <path d="M0 100 L100 100 L0 10 Z"></path>
    </svg>
    <svg class="diagonal home-right" width="80%" height="170" viewBox="0 0 100 102" preserveAspectRatio="none">
        <path d="M0 100 L100 100 L100 10 Z"></path>
    </svg>
</section>

 <div class="container content">
        <div class="row">
            <div class="blog-single col-md-8 col-md-offset-2">
                <div class="blog-image">
                    <?php the_post_thumbnail() ?>
                </div>
                <h1><?php the_title() ?></h1>
                <div class="blog-detail">Posté le <span><?php the_date() ?></span></div>

                <div class="blog-content">

                  
                  <p><?php the_content() ?></p>

                    <!-- Lightbox images -->
                    <div class="post-lightbox row">
                        <!-- image 1 -->
                        <a href="images/work-1.jpg" class="col-md-4 col-sm-4 col-xs-6 lightbox-image link">
                            <img src="images/work-1.jpg" alt="">
                        </a>
                        <!-- image 1 -->
                        <a href="images/work-2.jpg" class="col-md-4 col-sm-4 col-xs-6 lightbox-image link">
                            <img src="images/work-2.jpg" alt="">
                        </a>
                        <!-- image 1 -->
                        <a href="images/work-3.jpg" class="col-md-4 col-sm-4 col-xs-6 lightbox-image link">
                            <img src="images/work-3.jpg" alt="">
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>


<?php get_footer(); //appel du template header.php  ?>