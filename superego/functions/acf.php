<?
/* 
Settings for Advanced Custom Fields Plugin

Dashicons: https://developer.wordpress.org/resource/dashicons/
ACF Documentation: https://www.advancedcustomfields.com/resources/
*/

// Superego theme settings options page
if (function_exists('acf_add_options_page')) :

	// Top level option group
	acf_add_options_page(array(
		'page_title' 	=> 'Præferencer',
		'menu_title'	=> 'Præferencer',
		'menu_slug' 	=> 'preferences',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	// Footer
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Firmainfo',
		'menu_title'	=> 'Firmainfo',
		'parent_slug'	=> 'preferences',
	));

// Scripts & kode
// acf_add_options_sub_page(array(
// 	'page_title' 	=> 'Scripts & kode',
// 	'menu_title'	=> 'Scripts & kode',
// 	'parent_slug'	=> 'preferences',
// ));
endif;

// If ACF is installed run everything
if (class_exists('ACF')) :

	define('ACF_PRO_LICENSE', 'YWIwN2NiOGRhYjJlM2E4YzUzY2U5YTBkZDBmODYwNWFiN2JjNGNkY2VhNzZiNDFkMjU0MTIy');

	// Add Google Maps API from Theme Customizer input
	if (get_theme_mod('setting_google_maps')) :
		function superego_google_maps()
		{
			acf_update_setting('google_api_key', get_theme_mod('setting_google_maps'));
		}
		add_action('acf/init', 'superego_google_maps');
	endif;

	// Register custom Gutenberg Block categoies
	function superego_block_category($categories, $post)
	{
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'superego-blocks',
					'title' => __('Superego Blokke', 'superego-blocks'),
				)
			)
		);
	}
	add_filter('block_categories', 'superego_block_category', 10, 2);

	// Gutenberg Block Class
	class ACF_Block
	{
		// Properties
		public $name;
		public $title;
		public $description;
		public $category;
		public $keywords;

		// Methods
		function __construct($name, $title, $description, $category, $icon, array $keywords)
		{
			$this->name = $name;
			$this->title = $title;
			$this->description = $description;
			$this->category = $category;
			$this->icon = $icon;
			$this->keywords = $keywords;
		}

		// Get Block name function
		function get_name()
		{
			return $this->name;
		}

		// Register ACF Block
		function register_block()
		{
			$directory = get_template_directory_uri() . '/template-parts/blocks/';
			$template = 'template-parts/blocks/';
			$enqueue_js = get_stylesheet_directory() . '/' . $template . $this->name . '/' . $this->name . '.js';
			$enqueue_style = get_stylesheet_directory() . '/' . $template . $this->name . '/' . $this->name . '.css';

			$block_array = [
				'name'			=> $this->name,
				'title'			=> $this->title,
				'description'	=> $this->description,
				'category'		=> $this->category,
				'mode'			=> 'preview',
				'icon'			=> $this->icon,
				'keywords'		=> $this->keywords,
				// 'styles' => [
				// 	[
				// 		'name' => 'default',
				// 		'label' => 'Normal',
				// 		'isDefault' => true
				// 	],
				// 	[
				// 		'name' => 'full-width',
				// 		'label' => 'Fuldbredde',
				// 	]
				// ],
				'supports'		=> [
					'jsx' 	=> true,
					'mode' 	=> false,
					'align' => false,
					'color' => [
						'background' => true,
						'text' => true,
						'link' => true
					],
				],
				'render_template'   => $template . $this->name . '/' . $this->name . '.php',
				'example'           => [
					'attributes' => [
						'mode' => 'preview',
						'data' => [
							'is_example' => true,
						]
					]
				],
			];

			// If a .js file exists in the block directory
			if (file_exists($enqueue_js)) :
				$block_array['enqueue_script'] = $directory . $this->name . '/' . $this->name . '.js';
			endif;

			// If a .css file exists in the block directory
			if (file_exists($enqueue_style)) :
				$block_array['enqueue_style'] = $directory . $this->name . '/' . $this->name . '.css';
			endif;

			acf_register_block_type($block_array);
		}
	}

	// Add new custom blocks here
	$custom_blocks = [
		// Name
		// Title
		// Description
		// Category
		// Icon
		// Keywords

		// Standard Medarbejder block
		$medarbejdere = new ACF_Block(
			'medarbejdere',
			'Medarbejdere',
			'Standard block til visning af virksomhedens medarbejdere',
			'superego-blocks',
			file_get_contents(get_template_directory() . '/assets/images/blocks/users.svg'),
			['Medarbejdere', 'Afdelinger', 'Employees'],
		),

		// Standard Section block
		$section = new ACF_Block(
			'section',
			'Sektion',
			'Standard sektions block. Kan indeholde tekst, overskrift, billeder mm.',
			'superego-blocks',
			file_get_contents(get_template_directory() . '/assets/images/blocks/section.svg'),
			['Section', 'Sektion', 'Container'],
		),

		// Text & Image block
		$textImage = new ACF_Block(
			'text-image',
			'Tekst & Billede',
			'Standard tekst og billede blok',
			'superego-blocks',
			file_get_contents(get_template_directory() . '/assets/images/blocks/text-image.svg'),
			['Tekst', 'Billede', 'Text', 'Image'],
		),

		// Standard Swiper block
		$swiper = new ACF_Block(
			'swiper',
			'Swiper Slider',
			'Standard block til visning af slider',
			'superego-blocks',
			file_get_contents(get_template_directory() . '/assets/images/blocks/slider.svg'),
			['Swiper', 'Slider'],
		),
	];

	// Array for all custom allowed blocks
	$custom_allowed_blocks = [];

	// Loop though and register all instances of ACF_Block class
	foreach ($custom_blocks as $block) :
		$block->register_block();
		array_push($custom_allowed_blocks, 'acf/' . $block->get_name());
	endforeach;

endif;

// Register custom Gutenberg Blocks (Old and custom way)
// function register_acf_block_types()
// {
// 	// Block Directory & Render Template
// 	$block_dir = get_template_directory_uri() . '/template-parts/blocks/';
// 	$render_template = 'template-parts/blocks/';

// 	// Gutenberg Block Starter Template
// 	$block_name = 'gutenberg-block';
// 	acf_register_block_type([
// 		'name'              => $block_name,
// 		'title'             => __('Custom block'),
// 		'description'       => __('Dette er en speciallavet block af Superego.'),
// 		'category'          => 'superego-blocks',
// 		'mode' 				=> 'preview',
// 		'icon'              => 'block-default',
// 		'keywords'          => ['Gutenberg', 'Custom', 'Superego'],
// 		'supports'          => ['jsx' => true],
// 		'render_template'   => $render_template . $block_name . '/' . $block_name . '.php',
// 		'enqueue_style'     => $block_dir . $block_name . '/' . $block_name . '.css',
// 		'enqueue_script'    => $block_dir . $block_name . '/' . $block_name . '.js',
// 		// Preview
// 		'example'           => [
// 			'attributes' => [
// 				'data' => [
// 					'text'   		=> "Din tekst her...",
// 					'is_preview'	=> true
// 				]
// 			]
// 		],
// 	]);
// };

if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_types');
};

// Define allowed Gutenberg blocks
function superego_allowed_block_types($allowed_blocks)
{
	$core_blocks = array(
		/** Core Blocks */
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/separator',
		'core-embed/youtube',
		'core/buttons',
		'core/columns',
		'core/column',
		'core/video',
		'core/spacer',
		'core/gallery',
		'core/shortcode',
		'core/table',
		'core/text-columns',
		'core/html',
		'core/search',
		'core/reusable-block',
		'core/classic',
		'core/quote',
		//'core/group',
		//'core/row',
		//'core/social-links',
		//'core/social-link',
		//'core/media-text',
		//'core/lastest-posts',
		//'core/file',
		//'core/cover',
		//'core/code',
	);

	// Combine custom and core block arrays. Return one combined array
	$superego_allowed_blocks = array_merge($GLOBALS['custom_allowed_blocks'], $core_blocks);
	return $superego_allowed_blocks;
};
add_filter('allowed_block_types', 'superego_allowed_block_types');

// Block padding
if (function_exists('acf_add_local_field_group')) :

	acf_add_local_field_group(array(
		'key' => 'group_614865436425a',
		'title' => 'Blocks - Padding',
		'fields' => array(
			array(
				'key' => 'field_6148654d99427',
				'label' => 'Block afstande',
				'name' => '',
				'type' => 'accordion',
				'instructions' => 'Definer hvorvidt blokken skal have afstand i top eller bund.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'open' => 0,
				'multi_expand' => 0,
				'endpoint' => 0,
			),
			array(
				'key' => 'field_6148656399428',
				'label' => 'Afstand top',
				'name' => 'block_padding_top',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 1,
				'ui' => 1,
				'ui_on_text' => 'Ja',
				'ui_off_text' => 'Nej',
			),
			array(
				'key' => 'field_6148658a99429',
				'label' => 'Afstand bund',
				'name' => 'block_padding_bottom',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 1,
				'ui' => 1,
				'ui_on_text' => 'Ja',
				'ui_off_text' => 'Nej',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'all',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));

endif;
