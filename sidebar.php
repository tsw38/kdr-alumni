<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KDR_Beta_Alumni
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="Sidebar">
	<?php wp_nav_menu( 'sidebar' ); ?>
	<div class="RandomFact">
		<div class="RandomFact-image" style="background-image: url(<?php echo(getFeaturedImages()); ?>);">
		</div>
		<div class="RandomFact-text">
			<div class="content">
				<h5>Random Fact</h5>
				<p><?php echo(getRandomFact()); ?></p>
			</div>
		</div>

		
	</div>
</aside><!-- #secondary -->
