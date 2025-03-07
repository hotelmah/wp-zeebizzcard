            <?php themezee_footer_before(); // hook before #footer ?>

            <div id="footer">
                <?php
                $options = get_option('themezee_options');

                if (isset($options['themeZee_general_footer']) and $options['themeZee_general_footer'] <> "") {
                    echo wp_kses_post($options['themeZee_general_footer']);
                }
                ?>

                <div class="credit_link"><?php //themezee_credit_link(); ?></div>

                <div class="clear"></div>

            </div>

            <?php themezee_footer_after(); // hook after #footer ?>

        </div><!-- end #contentwrap -->
    </div><!-- end #wrap -->