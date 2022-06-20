<?
// https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-1/
// https://aurooba.com/adding-tinymce-editor-in-wordpress-customizer/

function superego_customize($wp_customize)
{

  // --------------------------------------------------------------
  //  **Præference panel**
  // --------------------------------------------------------------
  $wp_customize->add_panel('panel_preferences', array(
    'title' => __('Firmaoplysninger'),
    'description' => esc_html__('Indtast de grundlæggende informationer om virksomheden.'),
    'priority' => 10,
  ));

  // --------------------------------------------------------------
  //  Firmainfo section
  // --------------------------------------------------------------
  $wp_customize->add_section('section_firmainfo', array(
    'title' => __('Generelle oplysninger'),
    // 'description' => esc_html__( 'Dette er en sektion beskrivelse' ),
    'priority' => 10,
    'panel' => 'panel_preferences',
  ));

  // Firmanavn setting + control
  $wp_customize->add_setting('setting_firma_navn', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_firma_navn', array(
    'label' => __('Firmanavn'),
    'type' => 'text',
    'section' => 'section_firmainfo',
    'settings' => 'setting_firma_navn',
    'input_attrs' => array(
      'placeholder' => __('Indtast firmanavn'),
    ),
  ));

  // Adresse setting + control
  $wp_customize->add_setting('setting_adresse', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_adresse', array(
    'label' => __('Adresse'),
    'type' => 'text',
    'section' => 'section_firmainfo',
    'settings' => 'setting_adresse',
    'input_attrs' => array(
      'placeholder' => __('Indtast adresse'),
    ),
  ));

  // Postnummer setting + control
  $wp_customize->add_setting('setting_postnummer', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_postnummer', array(
    'label' => __('Postnummer'),
    'type' => 'text',
    'section' => 'section_firmainfo',
    'settings' => 'setting_postnummer',
    'input_attrs' => array(
      'placeholder' => __('Indtast postnummer'),
    ),
  ));

  // By setting + control
  $wp_customize->add_setting('setting_by', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_by', array(
    'label' => __('By'),
    'type' => 'text',
    'section' => 'section_firmainfo',
    'settings' => 'setting_by',
    'input_attrs' => array(
      'placeholder' => __('Indtast by'),
    ),
  ));

  // Land setting + control
  $wp_customize->add_setting('setting_land', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_land', array(
    'label' => __('Land'),
    'type' => 'text',
    'section' => 'section_firmainfo',
    'settings' => 'setting_land',
    'input_attrs' => array(
      'placeholder' => __('Indtast land'),
    ),
  ));

  // CVR-nummer setting + control
  $wp_customize->add_setting('setting_cvr', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_cvr', array(
    'label' => __('CVR'),
    'type' => 'text',
    'section' => 'section_firmainfo',
    'settings' => 'setting_cvr',
    'input_attrs' => array(
      'placeholder' => __('Indtast CVR nummer'),
    ),
  ));

  // --------------------------------------------------------------
  //  Kontaktinformation section
  // --------------------------------------------------------------
  $wp_customize->add_section('section_kontakt', array(
    'title' => __('Kontaktinformation'),
    'priority' => 160,
    'panel' => 'panel_preferences',
  ));

  // E-mail setting + control
  $wp_customize->add_setting('setting_email', array(
    'sanitize_callback' => 'sanitize_email',
  ));

  $wp_customize->add_control('control_email', array(
    'label' => __('E-mail'),
    'type' => 'email',
    'section' => 'section_kontakt',
    'settings' => 'setting_email',
    'input_attrs' => array(
      'placeholder' => __('Indtast e-mail'),
    ),
  ));

  // Telefon setting + control
  $wp_customize->add_setting('setting_telefon', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_telefon', array(
    'label' => __('Telefon'),
    'type' => 'text',
    'section' => 'section_kontakt',
    'settings' => 'setting_telefon',
    'input_attrs' => array(
      'placeholder' => __('Indtast telefonnummer'),
    ),
  ));

  // Google Maps URL setting + control
  $wp_customize->add_setting('setting_google_maps_url', array(
    'sanitize_callback' => 'esc_url_raw',
  ));

  $wp_customize->add_control('control_google_maps_url', array(
    'label' => __('Google Maps URL'),
    'type' => 'URL',
    'section' => 'section_kontakt',
    'settings' => 'setting_google_maps_url',
    'input_attrs' => array(
      'placeholder' => __('Indtast Google Maps URL'),
    ),
  ));

  // --------------------------------------------------------------
  //  Social media section
  // --------------------------------------------------------------
  $wp_customize->add_section('section_some', array(
    'title' => __('Social media'),
    'description' => esc_html__('Indtast kun brugernavnet på brugeren. Temaet tilføjer resten.'),
    'priority' => 160,
    'panel' => 'panel_preferences',
  ));

  // Facebook setting + control
  $wp_customize->add_setting('setting_facebook', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_facebook', array(
    'label' => __('Facebook'),
    'type' => 'url',
    'section' => 'section_some',
    'settings' => 'setting_facebook',
    'input_attrs' => array(
      'placeholder' => __('Indtast Facebook url'),
    ),
  ));

  // LinkedIn setting + control
  $wp_customize->add_setting('setting_linkedin', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_linedin', array(
    'label' => __('LinkedIn'),
    'type' => 'url',
    'section' => 'section_some',
    'settings' => 'setting_linkedin',
    'input_attrs' => array(
      'placeholder' => __('Indtast LinkedIn url'),
    ),
  ));

  // Instagram setting + control
  $wp_customize->add_setting('setting_instagram', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_instagram', array(
    'label' => __('Instagram'),
    'type' => 'url',
    'section' => 'section_some',
    'settings' => 'setting_instagram',
    'input_attrs' => array(
      'placeholder' => __('Indtast Instagram url'),
    ),
  ));

  // --------------------------------------------------------------
  //  Åbningstider section
  // --------------------------------------------------------------
  $wp_customize->add_section('section_hours', array(
    'title' => __('Åbningstider'),
    'priority' => 160,
    'panel' => 'panel_preferences',
  ));

  // Hverdage setting + control
  $wp_customize->add_setting('setting_hverdage', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_hverdage', array(
    'label' => __('Mandag - Torsdag'),
    'type' => 'text',
    'section' => 'section_hours',
    'settings' => 'setting_hverdage',
    'input_attrs' => array(
      'placeholder' => __('Indtast hverdags åbningstider'),
    ),
  ));

  // Fredage setting + control
  $wp_customize->add_setting('setting_fredag', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_fredag', array(
    'label' => __('Fredag'),
    'type' => 'text',
    'section' => 'section_hours',
    'settings' => 'setting_fredag',
    'input_attrs' => array(
      'placeholder' => __('Indtast fredag åbningstider'),
    ),
  ));

  // --------------------------------------------------------------
  //  **Theme Color Panel**
  // --------------------------------------------------------------
  $wp_customize->add_panel('panel_theme_colors', array(
    'title' => __('Farveskema'),
    'description' => esc_html__('Indstil temaets farveskema. Disse farver er globale og ændre hele temaets udtryk.'),
    'priority' => 10,
  ));

  // --------------------------------------------------------------
  //  Theme Color Section
  // --------------------------------------------------------------
  $wp_customize->add_section('section_theme_color', array(
    'title' => __('Tema farve'),
    'description' => esc_html__('Her indstilles temaets tab farve i Google Chrome.'),
    'priority' => 10,
    'panel' => 'panel_theme_colors',
  ));

  // Theme color Setting + control
  $wp_customize->add_setting('setting_theme_color', array(
    'default' => '#ededed',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  if (current_user_can('manage_options')) :
    $wp_customize->add_control('control_theme_color', array(
      'label' => __('Tema farve'),
      'type' => 'color',
      'section' => 'section_theme_color',
      'settings' => 'setting_theme_color',
    ));
  endif;

  // --------------------------------------------------------------
  //  **Temaindstillinger Panel**
  // --------------------------------------------------------------
  $wp_customize->add_panel('panel_theme_settings', array(
    'title' => __('Temaindstillinger'),
    'description' => esc_html__('Her fra styres de generelle indstillinger af temaet.'),
    'priority' => 10,
  ));

  // --------------------------------------------------------------
  //  Typografi section
  // --------------------------------------------------------------
  $wp_customize->add_section('section_typography', array(
    'title' => __('Typografi'),
    'description' => esc_html__('Her indstilles temaets fonts'),
    'priority' => 10,
    'panel' => 'panel_theme_settings',
  ));

  // Google Fonts setting + control
  $wp_customize->add_setting('setting_google_fonts', array(
    'sanitize_callback' => 'esc_url_raw',
  ));

  if (current_user_can('manage_options')) :
    $wp_customize->add_control('control_google_fonts', array(
      'label' => __('Google fonts'),
      'type' => 'url',
      'section' => 'section_typography',
      'settings' => 'setting_google_fonts',
      'input_attrs' => array(
        'placeholder' => __('Indsæt Google Fonts Stylesheet'),
      ),
    ));
  endif;

  // Adobe Typekit setting + control
  $wp_customize->add_setting('setting_adobe_typekit', array(
    'sanitize_callback' => 'esc_url_raw',
  ));

  if (current_user_can('manage_options')) :
    $wp_customize->add_control('control_adobe_typekit', array(
      'label' => __('Adobe Typekit'),
      'type' => 'url',
      'section' => 'section_typography',
      'settings' => 'setting_adobe_typekit',
      'input_attrs' => array(
        'placeholder' => __('Indsæt Adobe Typekit Stylesheet'),
      ),
    ));
  endif;

  // --------------------------------------------------------------
  //  Google Maps Section
  // --------------------------------------------------------------
  $wp_customize->add_section('section_google_maps', array(
    'title' => __('Google Maps API'),
    'description' => esc_html__('Her indtastes Google Maps API key. Uden denne kan Google Maps ikke fungere på siden.'),
    'priority' => 10,
    'panel' => 'panel_theme_settings',
  ));

  // Google Maps setting + control
  $wp_customize->add_setting('setting_google_maps', array(
    'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  if (current_user_can('manage_options')) :
    $wp_customize->add_control('control_google_maps', array(
      'label' => __('Google Maps API'),
      'type' => 'text',
      'section' => 'section_google_maps',
      'settings' => 'setting_google_maps',
      'input_attrs' => array(
        'placeholder' => __('Indtast Google Maps API key'),
      ),
    ));
  endif;

  // --------------------------------------------------------------
  //  Scripts & kode Section
  // --------------------------------------------------------------
  $wp_customize->add_section('section_scripts_code', array(
    'title' => __('Scripts & kode'),
    'description' => esc_html__('Her kan der indsættes ekstra scripts såsom Facebook Pixel og Google Analytics.'),
    'priority' => 10,
    'panel' => 'panel_theme_settings',
  ));

  // Header kode setting + control
  $wp_customize->add_setting('setting_header_code', array(
    // 'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_header_code', array(
    'label' => __('Head kode'),
    'type' => 'textarea',
    'section' => 'section_scripts_code',
    'settings' => 'setting_header_code',
    'input_attrs' => array(
      'placeholder' => __('Indsættes lige før < /head>'),
    ),
  ));

  // Body kode setting + control
  $wp_customize->add_setting('setting_body_code', array(
    // 'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_body_code', array(
    'label' => __('Body kode'),
    'type' => 'textarea',
    'section' => 'section_scripts_code',
    'settings' => 'setting_body_code',
    'input_attrs' => array(
      'placeholder' => __('Indsættes lige efter < body>'),
    ),
  ));

  // Footer kode setting + control
  $wp_customize->add_setting('setting_footer_code', array(
    // 'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));

  $wp_customize->add_control('control_footer_code', array(
    'label' => __('Footer kode'),
    'type' => 'textarea',
    'section' => 'section_scripts_code',
    'settings' => 'setting_footer_code',
    'input_attrs' => array(
      'placeholder' => __('Indsættes lige før < /body>'),
    ),
  ));
}

add_action('customize_register', 'superego_customize');
