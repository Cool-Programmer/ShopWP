<?php get_header(); ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <?php if(is_active_sidebar('showcase')): ?>
          <?php dynamic_sidebar('showcase'); ?>
        <?php endif; ?>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <?php if(have_posts()): ?>
              <?php while(have_posts()): the_post() ?>
                <div class="col-md-4 ">
                  <div class="post-image single-img-wrap">
                    <?php the_post_thumbnail(); ?>
                  </div>
                </div>
                <div class="col-md-8 product">
                  <h2><?php the_title() ?></h2>
                  <?php the_content(); ?>
                </div>
              <?php endwhile; ?>
            <?php else: ?>
              <p>No products found...</p>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-md-4">
          <div class="panel">
            <div class="container">
              <?php if(is_active_sidebar('sidebar')): ?>
                <?php dynamic_sidebar('sidebar'); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
<?php get_footer(); ?>