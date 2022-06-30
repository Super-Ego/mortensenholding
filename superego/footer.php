<?
// Add backend footer code
$code_footer = get_theme_mod('setting_footer_code');

// Company info
$company_name = get_theme_mod('setting_firma_navn');
$company_address = get_theme_mod('setting_adresse');
$company_zipcode = get_theme_mod('setting_postnummer');
$company_city = get_theme_mod('setting_by');
$company_country = get_theme_mod('setting_land');
$company_vat = get_theme_mod('setting_cvr');

// Contact info
$company_email = get_theme_mod('setting_email');
$company_phone = get_theme_mod('setting_telefon');
$company_maps = get_theme_mod('setting_google_maps_url');

// Social media
$social_facebook = get_theme_mod('setting_facebook');
$social_linkedin = get_theme_mod('setting_linkedin');
$social_instagram = get_theme_mod('setting_instagram');

// get global Mobile Detect
global $detect;
?>

<footer id="footer" class="footer" role="contentinfo">

  <div class="container-fluid">

    <div class="row">
      <div class="col-12 col-lg-6 image-container">
        <h3>FORANKRET I FREMDRIFT</h3>
        <figure class="image-figure">
          <?= wp_get_attachment_image(360, 'full', false) ?>
        </figure>
      </div>

      <div class="col-12 col-lg-6 info-container">

        <div class="col-xl-10 offset-xl-2 footer-logo">
          <? if ($detect->isMobile()) : ?>
            <a href="<?= get_home_url(); ?>" title="<? wp_title(); ?>">
              <?= svg_image('logo_mobile') ?>
            </a>
          <? else : ?>
            <a href="<?= get_home_url(); ?>" title="<? wp_title(); ?>">
              <?= svg_image('logo_full_lg') ?>
            </a>
          <? endif; ?>
        </div>

        <div class="col-lg-9 offset-lg-3 footer-text">
          <p>
            <span class="strong">Tlf.:</span> <br>
            <a class="footer-link" href="tel:<?= $company_phone ?>"><?= $company_phone ?></a>
          </p>

          <p>
            <span class="strong">Mail:</span> <br>
            <a class="footer-link" href="mailto:<?= $company_email ?>"><?= $company_email ?></a>
          </p>

          <p>
            <span class="strong">Adresse:</span> <br>
            <?= $company_address ?>, <?= $company_zipcode ?> <?= $company_city ?> <br>
            CVR nr.: <?= $company_vat ?>
          </p>

          <p id="copyright" class="body-small">&copy; <?= date('Y'); ?> <? bloginfo('name'); ?></p>
        </div>

        <div id="bgfig-container">
          <? if ($detect->isMobile()) : ?>
            <?= svg_image('menu_fig_mobile'); ?>
          <? else : ?>
            <?= svg_image('menu_fig'); ?>
          <? endif; ?>
        </div>
      </div>
    </div>

  </div>

</footer> <!-- end footer -->

</div> <!-- end #wrapper -->

<? wp_footer(); ?>

<? if ($code_footer) : echo $code_footer;
endif; ?>

</body> <!-- end body -->

<? get_template_part('/template-parts/parts/admin-menu'); ?>

</html> <!-- end page -->