<?php
/**
 * Cali Theme Customizer
 *
 * @package Cali
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cali_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	//$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'colors' )->panel 				= 'cali_colors';
    $wp_customize->get_section( 'colors' )->priority 			= '7';
    $wp_customize->get_section( 'colors' )->title = 			__( 'General' , 'cali');
    $wp_customize->get_section( 'header_image' )->priority 		= '6';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'cali_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'cali_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'cali_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cali_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cali_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Kirki
 */
require get_template_directory() . '/inc/kirki/include-kirki.php';
require get_template_directory() . '/inc/kirki/class-cali-kirki.php';

/* Options start */
Cali_Kirki::add_config( 'cali', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/* Colors */
Cali_Kirki::add_panel( 'cali_colors', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Colors', 'cali' ),
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'color',
	'settings'    => 'cali_body_color',
	'label'       => esc_attr__( 'Body text', 'cali' ),
	'section'     => 'colors',
	'default'     => '#191919',
	'priority'    => 10,
	'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => 'body',
            'property' => 'color',
        ),
    ),	
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'color',
	'settings'    => 'cali_headings_color',
	'label'       => esc_attr__( 'Body headings', 'cali' ),
	'section'     => 'colors',
	'default'     => '#191919',
	'priority'    => 10,
	'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => 'h1:not(.site-title), h2, h3, h4, h5, h6',
            'property' => 'color',
        ),
    ),	
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'color',
	'settings'    => 'cali_post_content_color',
	'label'       => esc_attr__( 'Body post text', 'cali' ),
	'section'     => 'colors',
	'default'     => '#404040',
	'priority'    => 10,
	'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => '.entry-content',
            'property' => 'color',
        ),
    ),	
) );
Cali_Kirki::add_section( 'cali_header_colors', array(
    'title'          => esc_attr__( 'Header', 'cali' ),
    'panel'          => 'cali_colors',
    'priority'       => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'color',
	'settings'    => 'cali_site_title_color',
	'label'       => esc_attr__( 'Site title', 'cali' ),
	'section'     => 'cali_header_colors',
	'default'     => '#191919',
	'priority'    => 10,
	'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => '.site-title a, .site-title--footer a, .site-title--mobile a, .site-title a:visited, .site-title--footer a:visited, .site-title--mobile a:visited',
            'property' => 'color',
        ),
    ),	
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'color',
	'settings'    => 'cali_site_title_hover_color',
	'label'       => esc_attr__( 'Site title hover color', 'cali' ),
	'section'     => 'cali_header_colors',
	'default'     => '#fb397d',
	'priority'    => 10,
	'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => '.site-title a:hover, .site-title a:focus, .site-title--footer a:hover, .site-title--footer a:focus, .site-title--mobile a:hover, .site-title--mobile a:focus',
            'property' => 'color',
        ),
    ),	
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'color',
	'settings'    => 'cali_site_desc_color',
	'label'       => esc_attr__( 'Site description', 'cali' ),
	'section'     => 'cali_header_colors',
	'default'     => '#191919',
	'priority'    => 10,
	'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => '.site-description',
            'property' => 'color',
        ),
    ),	
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'color',
	'settings'    => 'cali_menu_items_color',
	'label'       => esc_attr__( 'Menu items', 'cali' ),
	'section'     => 'cali_header_colors',
	'default'     => '#191919',
	'priority'    => 10,
	'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => '.main-navigation ul li a, .secondary-navigation .site-search_submit, .wc-header-cart__wrap .wc-header-cart__link, .header-top .social-navigation a',
            'property' => 'color',
        ),
    ),	
) );
Cali_Kirki::add_section( 'cali_footer_colors', array(
    'title'          => esc_attr__( 'Footer', 'cali' ),
    'panel'          => 'cali_colors',
    'priority'       => 11,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'color',
	'settings'    => 'cali_footer_background',
	'label'       => esc_attr__( 'Footer background', 'cali' ),
	'section'     => 'cali_footer_colors',
	'default'     => '#ffffff',
	'priority'    => 10,
	'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => '.site-footer, .footer-navigation',
            'property' => 'background-color',
        ),
    ),	
) );

/* Typography */
Cali_Kirki::add_panel( 'cali_typography', array(
    'priority'    => 21,
    'title'       => esc_attr__( 'Typography', 'cali' ),
) );
Cali_Kirki::add_section( 'cali_font_families', array(
    'title'          => esc_attr__( 'Font families', 'cali' ),
    'priority'       => 31,
    'panel'			 => 'cali_typography'
) );

if ( class_exists( 'Kirki_Fonts' ) ) {
	Cali_Kirki::add_field( 'cali', array(
		'type'        => 'select',
		'settings'    => 'cali_headings_font',
		'label'       => esc_attr__( 'Headings font', 'cali' ),
		'section'     => 'cali_font_families',
		'default'     => 'Playfair Display',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => Kirki_Fonts::get_font_choices(),
		'transport'	  => 'refresh',
	    'output'      => array(
	        array(
	            'element'  => '.font-family--1,h1,h2,h3,h4,h5,h6,blockquote,cite,.more-link,.entry-meta .author,.byline .author,.byline em,.entry-meta .author a.url,.dropcap::first-letter,.site-title,.site-title--footer,.site-title--mobile.site-search__wrap .site-search_input,.widget_search .site-search .site-search_input,.author_name,.comment-author,.page-author_name,.slide-overlay_author',
	            'property' => 'font-family',
	        ),
	    ),	
	) );
	Cali_Kirki::add_field( 'cali', array(
		'type'        => 'select',
		'settings'    => 'cali_body_font',
		'label'       => esc_attr__( 'Body font', 'cali' ),
		'section'     => 'cali_font_families',
		'default'     => 'Work Sans',
		'priority'    => 11,
		'multiple'    => 1,
		'choices'     => Kirki_Fonts::get_font_choices(),
		'transport'	  => 'refresh',
	    'output'      => array(
	        array(
	            'element'  => '.font-family--2,body,button,input,select,optgroup,textarea,.ca-category,.page-header_subtitle,.shop-overlay_subtitle',
	            'property' => 'font-family',
	        ),
	    ),	
	) );
}

Cali_Kirki::add_section( 'cali_font_sizes', array(
    'title'          => esc_attr__( 'Font sizes', 'cali' ),
    'priority'       => 31,
    'panel'			 => 'cali_typography'    
) );

$font_sizes = array(
	'body_text_desktop' => array(
		'settings'  	=> 'cali_body_text_desktop_size',
		'label' 		=> esc_attr__( 'Body text size on larger screens', 'cali' ),
		'description' 	=> esc_attr__( 'Min 10px and max 32px.', 'cali' ),
		'default' 		=> 16,
		'choices'   	=> array(
			'min'  => 10,
			'max'  => 32,
			'step' => 1,
		),
		'element'  => 'html',
		'media_query' => '@media (min-width: 768px)'
	),
	'body_text_mobile' => array(
		'settings'  	=> 'cali_body_text_mobile_size',
		'label' 		=> esc_attr__( 'Body text size on smaller screens', 'cali' ),
		'description' 	=> esc_attr__( 'Min 10px and max 32px.', 'cali' ),
		'default' 		=> 14,
		'choices'   	=> array(
			'min'  => 10,
			'max'  => 32,
			'step' => 1,
		),
		'element'  => 'html',
		'media_query' => '@media (max-width: 767px)'
	),
	'menu_links' => array(
		'settings'  	=> 'cali_menu_links_size',
		'label' 		=> esc_attr__( 'Menu links on larger screens', 'cali' ),
		'description' 	=> esc_attr__( 'Min 10px and max 24px.', 'cali' ),
		'default' 		=> 13,
		'choices'   	=> array(
			'min'  => 10,
			'max'  => 24,
			'step' => 1,
		),
		'element'  => '.main-navigation a, .footer-navigation a',
		'media_query' => '@media (min-width: 1200px)'
	),
	'mobile_menu_links' => array(
		'settings'  	=> 'cali_mobile_menu_links_size',
		'label' 		=> esc_attr__( 'Menu links on smaller screens', 'cali' ),
		'description' 	=> esc_attr__( 'Min 10px and max 24px.', 'cali' ),
		'default' 		=> 15,
		'choices'   	=> array(
			'min'  => 10,
			'max'  => 24,
			'step' => 1,
		),
		'element'  => '.main-navigation a, .footer-navigation a',
		'media_query' => '@media (max-width: 1199px)'
	),
	'submenu_links' 	=> array(
		'settings'  	=> 'cali_submenu_links_size',
		'label' 		=> esc_attr__( 'Sub-menu links on larger screens', 'cali' ),
		'description' 	=> esc_attr__( 'Min 10px and max 24px.', 'cali' ),
		'default' 		=> 15,
		'choices'   	=> array(
			'min'  => 10,
			'max'  => 24,
			'step' => 1,
		),
		'element'  => '.main-navigation ul .sub-menu li a, .main-navigation ul .children li a',
		'media_query' => '@media (min-width: 1200px)'
	),
	'mobile_submenu_links' => array(
		'settings'  	=> 'cali_mobile_submenu_links_size',
		'label' 		=> esc_attr__( 'Sub-menu links on smaller screens', 'cali' ),
		'description' 	=> esc_attr__( 'Min 10px and max 24px.', 'cali' ),
		'default' 		=> 13,
		'choices'   	=> array(
			'min'  => 10,
			'max'  => 24,
			'step' => 1,
		),
		'element'  => '.main-navigation ul .sub-menu li a, .main-navigation ul .children li a',
		'media_query' => '@media (max-width: 1199px)'
	),
);

foreach ( $font_sizes as $font_size_option ) {
	Cali_Kirki::add_field( 'cali', array(
		'type'     	  => 'slider',
		'settings'    => $font_size_option['settings'],
		'label'       => $font_size_option['label'],
		'description' => $font_size_option['description'],
		'section'     => 'cali_font_sizes',
		'default'     => $font_size_option['default'],
		'priority'    => 10,
		'multiple'    => 1,
		'choices'  => $font_size_option['choices'],
		'transport'	  => 'auto',
	    'output'      => array(
			array(
				'element'  		=> $font_size_option['element'],
				'property' 		=> 'font-size',
				'units'			=> 'px',
				'media_query'	=> $font_size_option['media_query'],
			),
	    ),	
	) );
}

/* Blog options */
Cali_Kirki::add_panel( 'cali_blog_panel', array(
    'priority'    => 21,
    'title'       => esc_attr__( 'Blog', 'cali' ),
) );

//Blog archives
Cali_Kirki::add_section( 'cali_blog_archives', array(
    'title'          => esc_attr__( 'Index/Archives', 'cali' ),
    'panel'          => 'cali_blog_panel',
    'priority'       => 1,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_blog_home_sidebar',
	'label'       => esc_attr__( 'Show sidebar on blog index/home?', 'cali' ),
	'section'     => 'cali_blog_archives',
	'default'     => '1',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_blog_archives_sidebar',
	'label'       => esc_attr__( 'Show sidebar on archives and search results pages?', 'cali' ),
	'section'     => 'cali_blog_archives',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_index_excerpt_highlighted',
	'label'       => esc_attr__( 'Show post excerpts on the highlighted post?', 'cali' ),
	'section'     => 'cali_blog_archives',
	'default'     => '1',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_index_excerpt_regular',
	'label'       => esc_attr__( 'Show post excerpts on regular posts?', 'cali' ),
	'section'     => 'cali_blog_archives',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'number',
	'settings'    => 'cali_exc_length',
	'label'       => esc_attr__( 'Excerpt length', 'cali' ),
	'section'     => 'cali_blog_archives',
	'default'     => 20,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 5,
		'max'  => 60,
		'step' => 1,
	),
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'text',
	'settings'    => 'cali_custom_read_more_highlighted',
	'label'       => esc_attr__( 'Custom read more text bellow the highlighted post', 'cali' ),
	'section'     => 'cali_blog_archives',
	'default'     => '',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'text',
	'settings'    => 'cali_custom_read_more_regular',
	'label'       => esc_attr__( 'Custom read more text bellow the regular post', 'cali' ),
	'section'     => 'cali_blog_archives',
	'default'     => '',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_index_hide_cats',
	'label'       => esc_attr__( 'Hide post categories?', 'cali' ),
	'section'     => 'cali_blog_archives',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_index_hide_meta',
	'label'       => esc_attr__( 'Hide post date and author?', 'cali' ),
	'section'     => 'cali_blog_archives',
	'default'     => '0',
	'priority'    => 10,
) );

//Blog single posts
Cali_Kirki::add_section( 'cali_blog_singles', array(
    'title'          => esc_attr__( 'Single posts', 'cali' ),
    'panel'          => 'cali_blog_panel',
    'priority'       => 2,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_blog_single_sidebar',
	'label'       => esc_attr__( 'Show sidebar on single blog post?', 'cali' ),
	'section'     => 'cali_blog_singles',
	'default'     => '1',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_single_hide_thumb',
	'label'       => esc_attr__( 'Hide post thumbnail?', 'cali' ),
	'section'     => 'cali_blog_singles',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_single_hide_cats',
	'label'       => esc_attr__( 'Hide post categories?', 'cali' ),
	'section'     => 'cali_blog_singles',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_single_hide_meta',
	'label'       => esc_attr__( 'Hide post date and author?', 'cali' ),
	'section'     => 'cali_blog_singles',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'select',
	'settings'    => 'cali_single_header_layout',
	'label'       => esc_attr__( 'Blog post header layout?', 'cali' ),
	'section'     => 'cali_blog_singles',
	'default'     => 'feat-img--top',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'feat-img--top'	=> esc_attr__( 'Featured image on top', 'cali' ),
		'post-title--top'	=> esc_attr__( 'Title on top', 'cali' ),
	)
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'select',
	'settings'    => 'cali_single_title_alignment',
	'label'       => esc_attr__( 'Blog post title alignment?', 'cali' ),
	'section'     => 'cali_blog_singles',
	'default'     => 'post-title--align-left',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'post-title--align-left'	=> esc_attr__( 'Align left', 'cali' ),
		'post-title--align-center'	=> esc_attr__( 'Align center', 'cali' ),
		'post-title--align-right'	=> esc_attr__( 'Align right', 'cali' ),
	)
) );

/* Post slider options */
Cali_Kirki::add_section( 'cali_post_slider', array(
    'title'          => esc_attr__( 'Post slider', 'cali' ),
    'panel'          => '',
    'priority'       => 21,
) );
if ( class_exists( 'Kirki' ) ) {
Cali_Kirki::add_field( 'cali', array(
    'type'        => 'select',
    'settings'    => 'cali_post_slider_category',
    'label'       => esc_attr__( 'Select post slider category', 'cali' ),
    'description' => esc_attr__( 'Category with more than 4 posts recommended', 'cali' ),
    'section'     => 'cali_post_slider',
    'default'     => 'option-1',
    'priority'    => 10,
    'choices'     => Kirki_Helper::get_terms( 'category' ),
) );
}
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_post_slider_hide_cat',
	'label'       => esc_attr__( 'Hide post slider category?', 'cali' ),
	'section'     => 'cali_post_slider',
	'default'     => '0',
	'priority'    => 10,
) );

/* Woocommerce options */
Cali_Kirki::add_panel( 'cali_woocommerce_panel', array(
    'priority'    => 21,
    'title'       => esc_attr__( 'Cali: WooCommerce', 'cali' ),
) );

// Woocommerce options: General
Cali_Kirki::add_section( 'cali_woocommerce_general', array(
    'title'          => esc_attr__( 'General', 'cali' ),
    'panel'          => 'cali_woocommerce_panel',
    'priority'       => 1,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_show_wc_cart',
	'label'       => esc_attr__( 'Show Cart icon and dropdown in menu?', 'cali' ),
	'section'     => 'cali_woocommerce_general',
	'default'     => '1',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_hide_wc_bc',
	'label'       => esc_attr__( 'Hide breadcrumbs on shop, archive and single product pages?', 'cali' ),
	'section'     => 'cali_woocommerce_general',
	'default'     => '0',
	'priority'    => 10,
) );

// Woocommerce options: Single product
Cali_Kirki::add_section( 'cali_single_product', array(
    'title'          => esc_attr__( 'Single products', 'cali' ),
    'panel'          => 'cali_woocommerce_panel',
    'priority'       => 1,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_hide_product_rating_single',
	'label'       => esc_attr__( 'Hide product star rating on single product?', 'cali' ),
	'section'     => 'cali_single_product',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_hide_product_summary_single',
	'label'       => esc_attr__( 'Hide product SKU, Categories and Tags on single product?', 'cali' ),
	'section'     => 'cali_single_product',
	'default'     => '0',
	'priority'    => 10,
) );

// Woocommerce options: Product archives
Cali_Kirki::add_section( 'cali_product_archives', array(
    'title'          => esc_attr__( 'Product archives', 'cali' ),
    'panel'          => 'cali_woocommerce_panel',
    'priority'       => 2,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_hide_product_archive_sorting',
	'label'       => esc_attr__( 'Hide sorting on shop and archive pages?', 'cali' ),
	'section'     => 'cali_product_archives',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_hide_product_archive_results',
	'label'       => esc_attr__( 'Hide number of results on shop and archive pages?', 'cali' ),
	'section'     => 'cali_product_archives',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_hide_product_archive_price',
	'label'       => esc_attr__( 'Hide product price on shop and archive pages?', 'cali' ),
	'section'     => 'cali_product_archives',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_hide_product_archive_ratings',
	'label'       => esc_attr__( 'Hide product ratings on shop and archive pages?', 'cali' ),
	'section'     => 'cali_product_archives',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_hide_product_archive_atc',
	'label'       => esc_attr__( 'Hide "add to cart" button on shop and archive pages?', 'cali' ),
	'section'     => 'cali_product_archives',
	'default'     => '0',
	'priority'    => 10,
) );

/* Page options */
Cali_Kirki::add_section( 'cali_page', array(
    'title'          => esc_attr__( 'Pages', 'cali' ),
    'panel'          => '',
    'priority'       => 31,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_page_hide_thumb',
	'label'       => esc_attr__( 'Hide page thumbnail?', 'cali' ),
	'section'     => 'cali_page',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'checkbox',
	'settings'    => 'cali_hide_yoast_bc',
	'label'       => esc_attr__( 'Hide Yoast breadcrumbs on pages (except WooCommerce)?', 'cali' ),
	'section'     => 'cali_page',
	'default'     => '0',
	'priority'    => 10,
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'select',
	'settings'    => 'cali_page_header_layout',
	'label'       => esc_attr__( 'Page header layout?', 'cali' ),
	'section'     => 'cali_page',
	'default'     => 'page-title--top',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'page-title--top'	=> esc_attr__( 'Title on top', 'cali' ),
		'feat-img--top'	=> esc_attr__( 'Featured image on top', 'cali' ),
	)
) );
Cali_Kirki::add_field( 'cali', array(
	'type'        => 'select',
	'settings'    => 'cali_page_title_alignment',
	'label'       => esc_attr__( 'Page title alignment?', 'cali' ),
	'section'     => 'cali_page',
	'default'     => 'page-title--align-center',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'page-title--align-left'	=> esc_attr__( 'Align left', 'cali' ),
		'page-title--align-center'	=> esc_attr__( 'Align center', 'cali' ),
		'page-title--align-right'	=> esc_attr__( 'Align right', 'cali' ),
	)
) );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cali_customize_preview_js() {
	wp_enqueue_script( 'cali-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'cali_customize_preview_js' );
