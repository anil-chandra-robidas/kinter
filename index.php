<?php
/**
 * The main template file
 */

get_header();
get_template_part( 'template-parts/banner/content', 'banner-blog' );


$blog_sidebar = kinter_option('blog_sidebar',3);
$blog_style = kinter_option('post_layout', 'style1');

$column = ($blog_sidebar == 1 || !is_active_sidebar('sidebar-1')) ? 'col-lg-12' : 'col-lg-8 col-md-12';

?>

<section id="main-content" class="blog main-container" role="main">
	<div class="container">

		<div class="row">
      <?php if($blog_sidebar == 2){
				get_sidebar();
			  }  ?>
			<div class="<?php echo esc_attr($column);?>">
			    <?php if($blog_style == 'style2'): ?>
				 <div class="row">
			    <?php endif; ?>
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						 if($blog_style == 'style2') {
							get_template_part( 'template-parts/blog/contents/content', 'style2');
						 }else{
							get_template_part( 'template-parts/blog/contents/content', get_post_format());
						 }

						?>
					<?php endwhile; ?>

					<?php get_template_part( 'template-parts/blog/paginations/pagination', 'style1' ); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/blog/contents/content', 'none' ); ?>
				<?php endif; ?>
				<?php if($blog_style == 'style2') : ?>
				 </div>
			    <?php endif; ?>
			</div><!-- .col-md-8 -->

         <?php if($blog_sidebar == 3){
				get_sidebar();
			  }  ?>
		</div><!-- .row -->

	</div><!-- .container -->
</section><!-- #main-content -->
<?php get_footer(); ?>