<?php
    /* Template Name: Article Template */
    // Template Post Type: post
	get_header();
    $fields = get_fields();
    
    var_dump($fields);

?>
    
	<div class="Body">
		<div class="content"></div>
		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();
