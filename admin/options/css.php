<?php 

    $options[] = array( "name" => "Custom CSS",
    					"sicon" => "css.png",
						"type" => "heading");

    

    

    $options[] = array( "name" => "CSS Code",
                        "desc" => "Add here your own custom CSS code for the theme.",
                        "id" => $shortname."_css_code",
                        "std" => "section.ac-container h2 {
display: none !important;
}
.srp-container-single-column {
margin-top: 10px;
}
.photoswipe_gallery figure figcaption {
font-size: 13px;
display: none;
}",
                        "type" => "textarea");



?>