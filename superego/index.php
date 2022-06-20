<?
// The main template file
get_header();
?>

<div id="content" class="content">

  <main id="main" class="main" role="main">

    <section id="index-loop" class="section">
      <div class="container">
        <div class="row">
          <div class="col">
            <? if (have_posts()) : while (have_posts()) : the_post(); ?>

                <? get_template_part('/template-parts/parts/loop', 'archive'); ?>

              <? endwhile; ?>

              <? superego_pagination(); ?>

            <? else : ?>

              <? get_template_part('/template-parts/parts/content', 'missing'); ?>

            <? endif; ?>
          </div>
        </div>
      </div>
    </section>

  </main> <!-- end #main -->

</div> <!-- end #content -->

<? get_footer(); ?>