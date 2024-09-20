<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-header">
        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
    </div><!-- .entry-header -->

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <div class="entry-footer">
        <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
                <?php
                printf(
                    '<span class="posted-on">%s <a href="%s">%s</a></span>',
                    esc_html__('Posted on', 'textdomain'),
                    esc_url(get_permalink()),
                    esc_html(get_the_date())
                );

                printf(
                    '<span class="byline"> ' . esc_html__('by', 'textdomain') . ' %s</span>',
                    esc_html(get_the_author())
                );
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </div><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
