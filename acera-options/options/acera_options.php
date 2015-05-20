<?php 

/*
	General Settings
		Visual
			Color Scheme
			Layout
			Favicon
			
	Header
		Top bar
			Social icons
		Logo	
			Logo 2 (for mobiles)
		
		Typography
			Enable custom font
			h1 (fontface, size)
			h2
			h3
			h4
			h5
			h6
		
		Footer
			Widgets Layout
	
	Integration
		Google Analytics
			Enable
			Code
	
	Help
		Documentation
*/

$options = array(

	// General Settings
    array(
		"type" 		=> "section",
		"icon" 		=> "acera-icon-home",
        "title" 	=> "General Settings",
        "id" 		=> "general",
        "expanded" 	=> "true"
    ),
	
		// Visual
		array(
			"section" 	=> "general",
			"type" 		=> "heading",
			"title" 	=> "Visual",
			"id" 		=> "general-visual"
		), 
			
			// Color Scheme
			array(
				"under_section" 		=> "general-visual", 	//Required
				"type" 					=> "radio_image", 		//Required
				"name" 					=> "Color Scheme", 		//Required
				"show_labels" 			=> "false",
				"image_src" 			=> array(
												get_bloginfo('template_directory') . "/acera-options/assets/green.png",
												get_bloginfo('template_directory') . "/acera-options/assets/blue.png",
												get_bloginfo('template_directory') . "/acera-options/assets/ocean.png",
												get_bloginfo('template_directory') . "/acera-options/assets/pink.png",
												get_bloginfo('template_directory') . "/acera-options/assets/orange.png",
												get_bloginfo('template_directory') . "/acera-options/assets/purple.png",
												get_bloginfo('template_directory') . "/acera-options/assets/red.png" 		), //Required
				"image_size" 			=> array( "45" ),
				"id" 					=> "color_scheme", 		//Required
				"options" 				=> array( "green", "blue", "ocean", "pink", "orange", "purple", "red" ),	//Required
				"desc" 					=> "Change the color of headers, links, hover states, etc.",
				"default" 				=> "red"
			),
			
			// Layout
			array(
				"under_section" 		=> "general-visual", 	//Required
				"type" 					=> "radio_image", 		//Required
				"name" 					=> "Layout", 			//Required
				"show_labels" 			=> "false",
				"image_src" 			=> array(
												get_bloginfo('template_directory') . "/acera-options/assets/layout/boxed.jpg",
												get_bloginfo('template_directory') . "/acera-options/assets/layout/fullwidth.jpg"	), //Required
				"image_size" 			=> array( "71" ),
				"id" 					=> "layout_scheme", 				//Required
				"options" 				=> array( "boxed", "fullwidth" ),	//Required
				"desc" 					=> "Change the layout of website at any devices.",
				"default" 				=> "fullwidth"
			),
			
			// Favicon
			array(
				"under_section" 		=> "general-visual",//Required
				"type" 					=> "image", 		//Required
				"placeholder"			=> "",
				"name" 					=> "Favicon",		//Required
				"id" 					=> "favicon",		//Required
				"desc" 					=> "It's a 16x16 pixels icon, displayed in the browser tab and bookmarks. <a href='http://www.favicon.cc/' target='_blank' >Generate yours here.</a>",
				"default" 				=> ""
			),
			
	// Header
    array(
		"type" 		=> "section",
		"icon" 		=> "acera-icon-home",
        "title" 	=> "Header",
        "id" 		=> "header",
        "expanded" 	=> "false"
    ),
	
		// Topbar
		array(
			"section" 	=> "header",
			"type" 		=> "heading",
			"title" 	=> "Topbar",
			"id" 		=> "header_topbar"
		),
		
			// Topbar enable/disable
			array(
				"under_section" 		=> "header_topbar",		//Required
				"type"					=> "checkbox", 		//Required
				"name" 					=> "", 			//Required
				"id"					=> array(
											"header_topbar_enabled" ), //Required
				"options"				=> array(
											"Enable Topbar" ), //Required
				"desc"					=> "",
				"default"				=> array("checked")
			),
			
			// Contact Phone
			array(
				"under_section" 		=> "header_topbar", //Required
				"type"					=> "text", //Required
				"name"					=> "Contact Phone", //Required
				"display_checkbox_id" 	=> "header_topbar_enabled",
				"id" 					=> "header_topbar_phone", //Required
				"placeholder" 			=> "(54) 9999-9999"				
			),
			
			// Contact Email
			array(
				"under_section" 		=> "header_topbar", //Required
				"type"					=> "text", //Required
				"name"					=> "Contact Email", //Required
				"display_checkbox_id" 	=> "header_topbar_enabled",
				"id" 					=> "header_topbar_email", //Required
				"placeholder" 			=> "name@domain.com"				
			),
			
			
	
		// Logo
		array(
			"section" 	=> "header",
			"type" 		=> "heading",
			"title" 	=> "Logos",
			"id" 		=> "header_logo"
		), 
	
			//Logo
			array(
				"under_section" 		=> "header_logo",	//Required
				"type" 					=> "image", 		//Required
				"placeholder"			=> "",
				//"display_checkbox_id" 	=> "logo_checkbox",
				"name" 					=> "Logo", 			//Required
				"id" 					=> "header_normal_logo", 	//Required
				"desc" 					=> "If don't exists logo image, a site name will be displayed",
				"default" 				=> ""
			), 
			
			// Mobile Logo checkbox
			array(
				"under_section" 		=> "header_logo",		//Required
				"type"					=> "checkbox", 		//Required
				"name" 					=> "", 			//Required
				"id"					=> array(
											"header_mobile_logo_check" ), //Required
				//"img_desc" 			=> get_bloginfo('template_directory') . "/acera-options/assets/img_desc.png",
				"options"				=> array(
											"Enable Mobile Logo" ), //Required
				"desc"					=> "",
				//"display_checkbox_id"	=> "toggle_checkbox_id",
				"default"				=> array("not")
			),
			
			//Mobile Logo
			array(
				"under_section" 		=> "header_logo",		//Required
				"type" 					=> "image", 			//Required
				"placeholder"			=> "",
				"display_checkbox_id" 	=> "header_mobile_logo_check",
				"name" 					=> "Mobile Logo", 			//Required
				"id" 					=> "header_mobile_logo", 	//Required
				"desc" 					=> "It's an alternative logo displayed only at mobiles under 768px width. If mobile logo image don't exists, the normal logo above will be displayed",
				"default" 				=> ""
			), 
	
	
		
	array(
        "section" 	=> "general",
        "type" 		=> "heading",
        "title" 	=> "Tipografia",
        "id" 		=> "tipo"
    ),
	
	
	// Homepage
    array(
		"type" 		=> "section",
		"icon" 		=> "acera-icon-home",
        "title" 	=> "Homepage",
        "id" 		=> "homepage",
        "expanded" 	=> "false"
    ),
	
		// Homepage
		array(
			"section" 	=> "homepage",
			"type" 		=> "heading",
			"title" 	=> "Homepage",
			"id" 		=> "homepage_slider"
		),
		
			// Slider
			array(
				"under_section" 		=> "homepage_slider",		//Required
				"type"					=> "text", 					//Required
				"name" 					=> "Homepage Slider ID", 	//Required
				"id"					=> "homepage_slider_id", 	//Required
				"desc"					=> "",
				"default" 				=> ""
			),
	
);    

?>