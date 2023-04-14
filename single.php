<?php get_header() ?>

<section class="pp-section first-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-3"><?php the_title() ?></h2>

                <?php the_content() ?>

                <?php if (comments_open() || get_comments_number()) :
                    comments_template();
                endif; ?>

            <?php get_sidebar() ?>
        </div>
    </div>
</section>

<?php get_footer() ?>