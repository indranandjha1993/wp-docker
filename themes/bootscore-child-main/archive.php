<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

    <div id="content" class="site-content container py-5 mt-5">
        <div id="primary" class="content-area">

            <!-- Hook to add something nice -->
            <?php bs_after_primary(); ?>
            <!-- Title & Description -->
            <div class="py-3 py-md-5 text-center">
                <h1 class="display-6"><?php the_archive_title(); ?></h1>
                <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-10">

                    <main id="main" class="site-main">
                        <div class="row g-4 blog-listing">

                                    <!-- Post Loop -->
                                    <?php
                                        if (have_posts()) :
                                        while (have_posts()) : the_post();
                                            if (is_sticky())
                                            continue;

                                            get_template_part('inc/blog-card');

                                        endwhile;
                                        endif; ?>

                                    <!-- Pagination -->
                                    <div class="col-12">
                                        <?php bs_pagination(); ?>
                                    </div>

                                </div>


                    </main><!-- #main -->

                </div><!-- col -->

                <?php get_sidebar(); ?>
            </div><!-- row -->

        </div><!-- #primary -->
    </div><!-- #content -->

<?php
get_footer();
