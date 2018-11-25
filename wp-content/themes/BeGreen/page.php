<?php get_header(); //appel du template header.php  ?>

<section class="home" id="home">
    <div class="home-content">
        <div class="container">
            <h1><?php the_title() ?></span></h1>
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

<?php the_content() ?>


   <?php get_footer(); //appel du template header.php  ?>