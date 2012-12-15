<div class="postinfo2">
	<span class="date-box"><?php the_time('M, d Y') ?></span>
	<span class="comment-count"><a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?> <?php _e('Comments'); ?></a></span>
	<span class="read-more"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php _e('Full Story'); ?></a></span>
</div>