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
		<div class="RandomFact-image">
		</div>
		<div class="RandomFact-text">
		</div>
		<?php

			var_dump(getFeaturedImages());
		?>
	</div>
</aside><!-- #secondary -->
