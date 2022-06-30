<?
// Header and body backend scripts
$code_head = get_theme_mod('setting_header_code');
$code_body = get_theme_mod('setting_body_code');
$theme_color = get_theme_mod('setting_theme_color');

// Social media
$social_facebook = get_theme_mod('setting_facebook');
$social_linkedin = get_theme_mod('setting_linkedin');
$social_instagram = get_theme_mod('setting_instagram');

// get global Mobile Detect
global $detect;
?>
<!doctype html>

<!--
Lavet af Superego - https://superego.nu
Telefon: +45 78 70 29 29 - Email: horsens@superego.nu
 -->

<html class="no-js" <? language_attributes(); ?> dir="ltr">

<head>
	<meta charset="<? bloginfo('charset'); ?>">
	<? if (!is_plugin_active('wordpress-seo/wp-seo.php')) : ?>
		<title><? wp_title(); ?></title>
	<? endif; ?>

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Theme color -->
	<meta name="theme-color" content="<?= $theme_color; ?>">

	<? if (!function_exists('has_site_icon') || !has_site_icon()) : ?>
		<link rel="icon" href="<?= get_template_directory_uri(); ?>/assets/images/theme-default/favicon.png">
		<link href="<?= get_template_directory_uri(); ?>/assets/images/theme-default/apple-icon-touch.png" rel="apple-touch-icon" />
	<? endif; ?>

	<!-- Preconnect Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<? wp_head(); ?>

	<? if ($code_head) :
		echo $code_head;
	endif; ?>
</head>

<body <? body_class(); ?>>

	<? if ($code_body) :
		echo $code_body;
	endif; ?>

	<div id="wrapper" class="wrapper">

		<? if ($detect->isMobile() && !$detect->isTablet()) : ?>
			<!-- Mobile menu -->
			<header id="main-header" class="header" role="banner" aria-label="Site header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-8 d-flex justify-content-start align-items-center">
							<a id="site-logo" href="<?= get_home_url(); ?>" title="<? wp_title(); ?>">
								<?= svg_image('logo_full') ?>
							</a>
						</div>
						<div class="col-4">
							<div id="menu-toggle-mobile" class="d-flex justify-content-end align-items-center">
								<div id="toggle-mobile" class="not-active">
									<div class="inner">
										<span id="line_1"></span>
										<span id="line_2"></span>
										<span id="line_3"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="main-navigation-mobile" class="outOfBounds">
					<nav>
						<? superego_top_nav('main-nav-mobile'); ?>
					</nav>

					<div class="socials-mobile">
						<? if ($social_facebook) : ?>
							<a href="<?= $social_facebook; ?>" target="_blank" rel="noopener noreferrer" title="Facebook">
								<?= svg_image('facebook_1.5x'); ?>
							</a>
						<? endif; ?>

						<? if ($social_linkedin) : ?>
							<a href="<?= $social_linkedin; ?>" target="_blank" rel="noopener noreferrer" title="Facebook">
								<?= svg_image('linkedin_1.5x'); ?>
							</a>
						<? endif; ?>

						<? if ($social_instagram) : ?>
							<a href="<?= $social_instagram; ?>" target="_blank" rel="noopener noreferrer" title="Facebook">
								<?= svg_image('instagram_1.5x'); ?>
							</a>
						<? endif; ?>
					</div>

					<div id="menufig-container-mobile">
						<?= svg_image('menu_fig_mobile'); ?>
					</div>
				</div>
			</header>

		<? else : ?>
			<!-- Desktop menu -->
			<header id="main-header" class="header" role="banner" aria-label="Site header">
				<div class="container">
					<div class="row">

						<div class="d-flex justify-content-center align-items-start logo-container">
							<a id="site-logo" href="<?= get_home_url(); ?>" title="<? wp_title(); ?>">
								<?= svg_image('logo_fig'); ?>
								<div class="logo-text">
									<?= svg_image('logo_text'); ?>
								</div>
							</a>
						</div>

						<div id="menu-toggle" class="d-flex justify-content-center align-items-center">
							<div id="toggle" class="not-active">
								<div class="inner">
									<span id="line_1"></span>
									<span id="line_2"></span>
									<span id="line_3"></span>
								</div>
							</div>
						</div>

						<div class="d-flex justify-content-center align-items-end socials-container">
							<div class="socials">
								<div class="facebook">
									<? if ($social_facebook) : ?>
										<a href="<?= $social_facebook; ?>" target="_blank" rel="noopener noreferrer" title="Facebook">
											<?= svg_image('facebook'); ?>
										</a>
									<? endif; ?>
								</div>
								<div class="linkedin">
									<? if ($social_linkedin) : ?>
										<a href="<?= $social_linkedin; ?>" target="_blank" rel="noopener noreferrer" title="Facebook">
											<?= svg_image('linkedin'); ?>
										</a>
									<? endif; ?>
								</div>
								<div class="instagram">
									<? if ($social_instagram) : ?>
										<a href="<?= $social_instagram; ?>" target="_blank" rel="noopener noreferrer" title="Facebook">
											<?= svg_image('instagram'); ?>
										</a>
									<? endif; ?>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div id="main-navigation" class="outOfBounds">
					<nav>
						<? superego_top_nav('main-nav'); ?>
					</nav>
					<? if ($detect->isTablet()) : ?>
						<div id="menufig-container" class="tablet">
							<?= svg_image('menu_fig_mobile'); ?>
						</div>
					<? else : ?>
						<div id="menufig-container">
							<?= svg_image('menu_fig'); ?>
						</div>
					<? endif; ?>
				</div>
				<div class="nav-overlay"></div>
			</header>
		<? endif; ?>

		<!-- end #main-header -->