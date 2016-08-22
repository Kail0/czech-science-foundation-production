<?php
$options[] = array( "name" => "General",
						"sicon" => "advancedsettings.png",
                        "type" => "heading");


      $options[] = array( "name" => "Your Company Logo",
                        "desc" => "Company logo. Klikni na 'Upload Image' pro nahrání svého loga.",
                        "id" => $shortname."_clogo",
                        "std" => "$blogpath/library/images/GACR-CZ_logo.png",
                        "type" => "upload");

	$options[] = array( "name" => "Text jako logo",
                        "desc" => "Pokud nechcete obrázek jako logo, můžete mít jen tento text.",
                        "id" => $shortname."_clogo_text",
                        "std" => "GACR",
                        "type" => "text");
	$options[] = array( "name" => "Barevné schéma (základní je 'light Blue dark')",
                                    "id" => $shortname."_colorscheme",
                        "std" => "light-blue-dark",
                                    "type" => "select",
                                    "options" => $colorschemes);
	$options[] = array( "name" => "Custom Favicon",
                        "desc" => "Vlastní favicon. Klikni na 'Upload Image' pro nahrání vlastní favicon.",
                        "id" => $shortname."_custom_shortcut_favicon",
                        "std" => "",
                        "type" => "upload");
      // $options[] = array( "name" => "Enable Page Header Image",
      //                         "desc" => "By unchecking this the theme will disable sitewide page headers images.",
      //                         "id" => $shortname."_showpageheader",
      //                         "std" => "1",
      //                         "type" => "checkbox");
      $options[] = array( "name" => "Default Page Header Image",
                        "desc" => "You can use your page header image. Click to 'Upload Image' button and upload your image. The image should be 1020 x 200px wide for a proper display.",
                        "id" => $shortname."_pageheaderurl",
                        "std" => "$blogpath/library/images/pageheader.png",
                        "type" => "upload");

?>