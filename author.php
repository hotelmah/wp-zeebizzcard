<?php get_header(); ?>

<?php // Retrieve Current Author
	$author = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>
	<div id="content">
		
		<h2 class="arh"><?php _e('Archive for', 'themezee_lang'); ?> <?php echo $author->display_name; ?></h2>
		
<?php // Show Author Box
	$options = get_option('themezee_options');
	if(isset($options['themeZee_show_author_box']) and $options['themeZee_show_author_box'] == 'true') : ?>
		<div class="author_box">
			<div class="author_image"><?php echo get_avatar($author->user_email, '70'); ?></a></div>
			<div class="author_info">       
				<h5><?php _e('About the Author:', 'themezee_lang'); ?> <?php echo $author->display_name; ?></h5>
				<div class="author_description"><?php echo $author->description; ?></div>
					
				<?php if(isset($author->user_url) and $author->user_url != '') : ?>
					<div class="author_website">
						<?php _e('Author Website: ', 'themezee_lang'); ?>
						<a href="<?php echo $author->user_url; ?>" title="Author Website"><?php echo $author->user_url; ?></a>
					</div>
				<?php endif; ?>
			</div>
			<div class="clear"></div>
		</div>
<?php endif; ?>

		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'loop', 'index' );
		
		endwhile; ?>
			
			<?php if(function_exists('wp_pagenavi')) { // if PageNavi is activated ?>
				<div class="more_posts">
					<?php wp_pagenavi(); ?>
				</div>
			<?php } else { // Otherwise, use traditional Navigation ?>
				<div class="more_posts">
					<span class="post_links"><?php next_posts_link(__('&laquo; Older Entries', 'themezee_lang')) ?> &nbsp; <?php previous_posts_link (__('Recent Entries &raquo;', 'themezee_lang')) ?></span>
				</div>
			<?php }?>
			

		<?php endif; ?>
			
	</div>
		
	<?php get_footer(); ?>	
<?php get_sidebar(); ?>	