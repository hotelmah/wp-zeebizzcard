    <div>
        <div id="headwrap">
            <?php themezee_header_before(); // hook before #header ?>
            <div id="header">
                <div id="logo">
                        <?php
                        $options = get_option('themezee_options');

                        if (isset($options['themeZee_general_logo']) && $options['themeZee_general_logo'] <> "") { ?>
                            <a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url($options['themeZee_general_logo']); ?>" alt="Logo" /></a>
                        <?php } else { ?>
                            <a href="<?php echo home_url(); ?>/"><h1><?php bloginfo('name'); ?></h1></a>
                            <h2 class="tagline"><?php echo bloginfo('description'); ?></h2>
                        <?php } ?>
                </div>

                <div id="portrait_image">
                    <?php if (is_page() && has_post_thumbnail()) :
                        the_post_thumbnail(array(280,300));
                    elseif (get_header_image() != '') : ?>
                        <img src="<?php echo get_header_image(); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <?php themezee_header_after(); // hook after #header ?>
        </div>

        <?php
        if (is_page()) :
            if (is_active_sidebar('sidebar-pages')) : ?>
            <div id="sidewrap">
                <div id="sidebar">
                    <?php themezee_widgets_before(); // hook before sidebar widgets ?>
                    <ul>
                    <?php dynamic_sidebar('sidebar-pages');
            endif; ?>
                    </ul>

                    <?php themezee_widgets_after(); // hook after sidebar widgets ?>
                </div>
            </div>
            <?php
        else :
            if (is_active_sidebar('sidebar-blog')) : ?>
            <div id="sidewrap">
                <div id="sidebar">
                    <?php themezee_widgets_before(); // hook before sidebar widgets ?>
                    <ul>
                    <?php dynamic_sidebar('sidebar-blog');
            endif; ?>
                    </ul>

                    <?php themezee_widgets_after(); // hook after sidebar widgets ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div><!-- end #wrapper -->

<?php themezee_wrapper_after(); // hook after #wrapper ?>

<?php wp_footer(); ?>

</body>
</html>