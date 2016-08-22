<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix hoverable'); ?> role="article">
    <div class="card dismissable">
        <div class="card-content">
            <span class="card-title">
                <div class="entry-header">
                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                </div><!-- .entry-header -->
                <span class="entry-meta grey-text text-darken-2"><?php the_time('j. n. Y'); ?></span>
            </span>
            <div class="entry-content">

                <?php
                    if (! is_single()) {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                ?>

            </div><!-- .entry-content -->
        </div>
        <div class="card-action">
            <footer class="entry-footer">
                <a class="white btn-floating waves-effect waves-circle z-depth-0" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
                    <i class="material-icons gacr-blue-text">&#xE5C8;</i>
                </a>
            </footer><!-- .entry-footer -->
        </div>
</article> <!-- end article -->