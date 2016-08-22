<?php
/*
 * Template Name: Page Search
 */
get_header(); ?>

<div class="container clearfix">
    <!-- content -->
    <div class="section">
        <div class="row">
            <div class="col l12">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="card-panel">

<script>
  (function() {
    var cx = '003655959984521286176:nqqaabj4k4i';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchresults-only></gcse:searchresults-only>

                    </div>

                    <?php endwhile; ?>



                    <?php else : ?>

                    <article id="post-not-found">
                        <header>
                            <h1><?php _e("Nenalezeno", "kailoframework"); ?></h1>
                        </header>
                        <section class="post_content">
                            <p><?php _e("Omlouváme se, ale Vaše žádost zde nebyla nalezena", "kailoframework"); ?></p>
                        </section>
                        <footer>
                        </footer>
                    </article>

            <?php endif; ?>

            </div>
        </div>
    </div>
</div> <!-- end content -->

<?php get_footer(); ?>