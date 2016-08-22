<?php
	$options[] = array( "name" => "Homepage",
	                    "sicon" => "user-home.png",
	                    "type" => "heading");
					
	$options[] = array( "name" => "Display Blurb on Homepage",
						"id" => $shortname."_blurbhome",
						"std" => "Lorem Ipsum",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Blurb Content",
                        "id" => $shortname."_blurb",
                        "std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.",
						"class" => "sectionlast",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Display Content Boxes on Homepage",
						"id" => $shortname."_homecontent",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Content Box 1 Title",
                        "id" => $shortname."_homecontent1title",
                        "std" => "O GA ČR ",
                        "type" => "text");
						
	$options[] = array( "name" => "Content Box 1 Text",
                        "id" => $shortname."_homecontent1",
                        "std" => "Grantová agentura České republiky (GA&nbsp;ČR) je&nbsp;organizační složkou státu, jejímž posláním je&nbsp;účelovou formou podporovat základní výzkum, a&nbsp;to&nbsp;výhradně z&nbsp;veřejných prostředků. Jde o&nbsp;jedinou instituci tohoto typu a&nbsp;s&nbsp;tímto posláním v&nbsp;ČR. Při&nbsp;své činnosti se&nbsp;řídí zákonem č. 130/2002 Sb., o&nbsp;podpoře výzkumu, experimentálního vývoje a&nbsp;inovací, a&nbsp;je&nbsp;samostatnou účetní jednotkou. Hospodaří tedy samostatně s&nbsp;účelovými a&nbsp;institucionálními prostředky přidělenými státním rozpočtem. GA&nbsp;ČR zahájila svoji činnost v&nbsp;roce 1993. V&nbsp;rámci vyhlášených programů poskytuje finanční podporu na&nbsp;vědecké projekty jak pro&nbsp;erudované vědce a&nbsp;týmy, tak&nbsp;pro&nbsp;mladé a&nbsp;začínající vědecké pracovníky. ",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Content Box 1 Image",
                        "desc" => "Click to 'Upload Image' button and upload Content Box 1 image.",
                        "id" => $shortname."_homecontent1img",
                        "std" => "$blogpath/library/images/list.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Content Box 1 URL",
                        "id" => $shortname."_homecontent1url",
                        "std" => "#",
						"class" => "sectionlast",
                        "type" => "text");
					
	$options[] = array( "name" => "Content Box 2 Title",
                        "id" => $shortname."_homecontent2title",
                        "std" => "Novinky",
                        "type" => "text");

	$options[] = array( "name" => "Content Box 2 Text",
                        "id" => $shortname."_homecontent2",
                        "std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Content Box 2 Image",
                        "desc" => "Click to 'Upload Image' button and upload Content Box 2 image.",
                        "id" => $shortname."_homecontent2img",
                        "std" => "$blogpath/library/images/list.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Content Box 2 URL",
                        "id" => $shortname."_homecontent2url",
                        "std" => "#",
						"class" => "sectionlast",
                        "type" => "text");	

	$options[] = array( "name" => "Content Box 3 Title",
                        "id" => $shortname."_homecontent3title",
                        "std" => "Důležité termíny",
                        "type" => "text");
	
	$options[] = array( "name" => "Content Box 3",
                        "id" => $shortname."_homecontent3",
                        "std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Content Box 3 Image",
                        "desc" => "Click to 'Upload Image' button and upload Content Box 3 image.",
                        "id" => $shortname."_homecontent3img",
                        "std" => "$blogpath/library/images/list.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Content Box 3 URL",
                        "id" => $shortname."_homecontent3url",
                        "std" => "#",
						"class" => "sectionlast",
                        "type" => "text");
	
	$options[] = array( "name" => "Content Box 4 Title",
                        "id" => $shortname."_homecontent4title",
                        "std" => "Lorem ipsum",
                        "type" => "text");
	
	$options[] = array( "name" => "Content Box 4",
                        "id" => $shortname."_homecontent4",
                        "std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Content Box 4 Image",
                        "desc" => "Click to 'Upload Image' button and upload Content Box 4 image.",
                        "id" => $shortname."_homecontent4img",
                        "std" => "$blogpath/library/images/list.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Content Box 4 URL",
                        "id" => $shortname."_homecontent4url",
                        "std" => "#",
						"class" => "sectionlast",
                        "type" => "text");
						
	$options[] = array( "name" => "Display Portfolio on Homepage",
						"desc" => "do you want to display portfolio section on homepage ?",
						"id" => $shortname."_portfoliohome",
						"std" => "0",
						"type" => "checkbox");
	
	$options[] = array( "name" => "Portfolio section title",
                        "id" => $shortname."_portfoliohometitle",
                        "std" => "Projects",
                        "type" => "text");
						
	$options[] = array( "name" => "Portfolio section button title",
                        "id" => $shortname."_portfoliohomebuttontitle",
                        "std" => "View",
                        "type" => "text");
	
	$options[] = array( "name" => "Portfolio section button URL",
                        "id" => $shortname."_portfoliohomebuttonurl",
                        "std" => "#",
                        "type" => "text");
						

?>