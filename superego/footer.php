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
?>

<footer id="footer" class="footer" role="contentinfo">

  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <nav role="navigation">
          <? superego_footer_links(); ?>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <p id="copyright" class="body-small">&copy; <?= date('Y'); ?> <? bloginfo('name'); ?> - Website by <a href="https://superego.nu/" class="body-link" target="_blank" rel="noreferrer">Superego</a></p>
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