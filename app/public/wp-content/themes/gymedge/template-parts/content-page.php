<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ): ?>
        <div class="entry-thumbnail"><?php the_post_thumbnail();?></div>
    <?php endif; ?>
	<div class="entry-content">
        <?php the_content();?>
        <?php wp_link_pages();?>
	</div>
</article>