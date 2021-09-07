<?php if(has_post_thumbnail()): ?>
  <div class="post-media post-image">
      <a href="<?php echo esc_url(get_the_permalink()); ?>">
        <?php
           echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, array(
             'class'  => 'img-fluid',
             'alt'    => get_the_title() 
           )); 
        ?>
      </a>
      <?php
           if ( is_sticky() ) {
					echo '<sup class="meta-featured-post"> <i class="fas fa-thumbtack"></i> ' . esc_html__( 'Sticky', 'kinter' ) . ' </sup>';
           }
       ?>
</div>
   <?php endif; ?>

<div class="post-body clearfix">
      <div class="entry-header">
        <?php kinter_post_meta(); ?>
        <h2 class="entry-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

      </div>
      <?php
           if ( is_sticky() && !has_post_thumbnail() ) {
					echo '<sup class="meta-featured-post"> <i class="fas fa-thumbtack"></i> ' . esc_html__( 'Sticky', 'kinter' ) . ' </sup>';
           }

       ?>
      <div class="post-content">
         <div class="entry-content">
            <p>
                <?php kinter_excerpt( 40, null ); ?>
            </p>
         </div>
        <?php
            if(!is_single()):

              printf('<div class="post-footer readmore-btn-area"><a class="readmore" href="%1$s">Continue <i class="fas fa-arrow-right"></i></a></div>',
              get_the_permalink()
                );
            endif;
        ?>
      </div>
</div>
<!-- post-body end-->