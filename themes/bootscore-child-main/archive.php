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

            <div class="row blog-listing">
                <div class="col-md-12 col-lg-8">

                    <main id="main" class="site-main">

                        <!-- Title & Description -->
                        <header class="page-header mb-4">
                            <h1><?php the_archive_title(); ?></h1>
                            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
                        </header>

                        <!-- Grid Layout -->
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="card horizontal mb-4">
                                    <div class="row">
                                        <!-- Featured Image-->
                                        <?php if (has_post_thumbnail())
                                            echo '<div class="card-img-left-md col-lg-5">' . get_the_post_thumbnail(null, 'medium') . '</div>';
                                        ?>
                                        <div class="col">
                                            <div class="card-body">

                                                <?php bootscore_category_badge(); ?>

                                                <!-- Title -->
                                                <h2 class="blog-post-title">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                                <!-- Meta -->
                                                <?php if ('post' === get_post_type()) : ?>
                                                    <small class="text-muted mb-2">
                                                        <?php
                                                        bootscore_date();
                                                        bootscore_author();
                                                        bootscore_comments();
                                                        bootscore_edit();
                                                        ?>
                                                    </small>
                                                <?php endif; ?>
                                                <!-- Excerpt & Read more -->
                                                <div class="card-text mt-auto">
                                                    <?php
                                                    $excerpt = wp_strip_all_tags(get_the_excerpt());
                                                    if (strlen($excerpt) > 200) {
                                                        $excerpt = substr($excerpt, 0, 200) . '...';
                                                    }
                                                    echo $excerpt;
                                                    ?> <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read more »', 'bootscore'); ?></a>
                                                </div>
                                                <!-- Tags -->
                                                <?php bootscore_tags(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            <?php
                            the_posts_pagination(
                                array(
                                    'prev_text' => __('« Previous', 'bootscore'),
                                    'next_text' => __('Next »', 'bootscore'),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'bootscore') . ' </span>',
                                )
                            );
                            ?>
                        </div>

                    </main><!-- #main -->

                </div><!-- col -->

                <?php get_sidebar(); ?>
            </div><!-- row -->

        </div><!-- #primary -->
    </div><!-- #content -->

<?php
get_footer();
