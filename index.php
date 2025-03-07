<?php get_header(); ?>

<div id="content">
    <?php
    $options = get_option('themezee_options');

    if (is_home() and isset($options['themeZee_show_slider']) and $options['themeZee_show_slider'] == 'true') {
        locate_template('/slide.php', true);
    }
    ?>

    <?php // sort_query_posts_by('date', 'asc'); ?>

    <?php if (have_posts()) :
        while (have_posts()) :
            the_post();
            get_template_part('loop', 'index');
        endwhile; ?>

        <?php if (function_exists('wp_pagenavi')) { // if PageNavi is activated ?>
            <div class="more_posts">
                <?php wp_pagenavi(); ?>
            </div>

        <?php } else { // Otherwise, use traditional Navigation ?>
            <div class="more_posts">
                <span class="post_links"><?php next_posts_link(__('&laquo; Older Entries', 'themezee_lang')) ?> &nbsp; <?php previous_posts_link(__('Recent Entries &raquo;', 'themezee_lang')) ?></span>
            </div>
        <?php }?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>

<?php get_sidebar(); ?>
