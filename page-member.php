<?php get_header(); ?>
  <section class="catch"></section>

  <main>
    <div class="container">
      <section class="block">
          <div class="block_body">
            <h2 class="block_body_title">社員紹介</h2>
            <div class="seiretsu">
              <div class="row">
              <?php
                $args = array(
                'post_type' => 'member',
                'post_status' => 'publish',
                );
                $customPosts = get_posts($args);
            ?>
            <?php if ($customPosts): ?>
            <?php foreach ($customPosts as $post): setup_postdata( $post );?>
              <div class="col-lg-12 col-md-4">
                <div class="memberImg">
                  <?php if(has_post_thumbnail()): ?>
                  <?php the_post_thumbnail('member-thumb'); ?>
				  <?php else: ?>
				<?php endif; ?>
                </div>
                <h3><?php the_title(); ?></h3>
                <table class="profile">
                  <tr>
                    <th>好きな食べ物</th>
                    <td><?php echo post_cusutom('food'); ?></td>
                  </tr>
                  <tr>
                    <th>色</th>
                    <td><?php echo post_cusutom('color'); ?></td>
                  </tr>
                   <tr>
                    <th>あなたにとって演劇とは？</th>
                    <td><?php echo post_cusutom('performance'); ?></td>
                  </tr>
                </table>
              </div><!-- /.col-lg-12 -->
        	<?php endforeach; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
          </div><!-- /.row -->
        </div><!-- /.seiretu -->
        </div><!-- /.block_body -->
      </section>
    </div>
  </main>
<?php get_footer(); ?>