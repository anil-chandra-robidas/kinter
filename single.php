<?php
/**
 * the template for displaying all posts.
 */
   get_header();

   get_template_part( 'template-parts/banner/content', 'banner-single' );

   $blog_sidebar = kinter_option('blog_sidebar',1);
   $column = ($blog_sidebar == 1 ) ? 'col-lg-12' : 'col-lg-8 col-md-12';

?>
<div id="main-content" class="main-container blog-single"  role="main">
    <div class="container">
        <div class="row">
        <?php if($blog_sidebar == 2){
				get_sidebar();
			  }  ?>
            <div class="<?php echo esc_attr($column);?>">
				  <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(["post-content","post-single"]); ?>>
              <?php get_template_part( 'template-parts/blog/contents/content', 'single' ); ?>
            </article>
					<?php
						kinter_post_nav();
                 ?>
                <?php get_template_part( 'template-parts/blog/post-parts/part', 'author' ); ?>
               <?php
                comments_template();

               ?>
				<?php endwhile; ?>
            </div> <!-- .col-md-8 -->
            <?php if($blog_sidebar == 3){
				get_sidebar();
			  }  ?>

        </div> <!-- .row -->
        <?php get_template_part( 'template-parts/blog/post-parts/part', 'related-post' ); ?>
    </div> <!-- .container -->
</div> <!--#main-content -->
<?php get_footer(); ?>