<div class="col col-sm-12 col-md-6 col-lg-4">
    <div class="card h-auto">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="h-75">
                <?php the_post_thumbnail('medium', array('class' => 'card-img-top img-fluid rounded h-75')); ?>
            </a>
        <?php endif; ?>

        <div class="card-body">
            <div class="mb-2">
                <?php bootscore_category_badge(); ?>
            </div>

            <h5 class="card-title">
                <a href="<?php the_permalink(); ?>"
                   class="text-dark text-decoration-none">
                    <?php the_title(); ?>
                </a>
            </h5>

            <small class="text-muted mb-2">
                <?php bootscore_date(); ?>
                <?php bootscore_author(); ?>
                <?php bootscore_comments(); ?>
                <?php bootscore_edit(); ?>
            </small>

            <p class="card-text mb-4">
                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
            </p>

            <div class="col-12 text-end">
                <a href="<?php the_permalink(); ?>" class="btn btn-outline-info btn-sm rounded-pill">
                    <?php _e('Read More', 'bootscore'); ?> <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>

    </div>
</div>
