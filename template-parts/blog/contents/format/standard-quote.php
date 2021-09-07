<div class="post-quote-wrapper">
   <div class="post-quote-content post-body">
      <div class="entry-header">
         <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
         </h2>
         <p class="mb-0"><?php kinter_excerpt( 40, null ); ?></p>
         <?php if ( is_sticky() ) {
         echo '<sup class="meta-featured-post"> <i class="fas fa-thumbtack"></i> ' . esc_html__( 'Sticky', 'kinter' ) . ' </sup>';
         } ?>
      </div>
   </div>
</div>