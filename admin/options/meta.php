<?php
    $options[] = array( "name" => "Meta",
    					"sicon" => "metatag.png",
						"type" => "heading");

    $options[] = array( "name" => "Active Meta Keywords, Description Revisit",
                        "id" => $shortname."_enablemeta",
                        "std" => "1",
                        "type" => "checkbox");

    $options[] = array( "name" => "Meta Description",
						"id" => $shortname."_metadescription",
						"std" => "Grantová agentura České republiky (GAČR) je úřad České republiky, organizační složka státu a správce rozpočtové kapitoly",
						"type" => "textarea");

    $options[] = array( "name" => "Meta Keywords",
						"std" => "grant, státní správa, věda, výzkum, technologie, ČR, GA ČR, úřad, vláda, biologie, veřejná správa ",
						"id" => $shortname."_metakeywords",
                        "type" => "textarea");

    $options[] = array( "name" => "Revisit After",
                        "id" => $shortname."_revisitafter",
                        "std" => "2",
                        "type" => "select",
                        "class" => "tiny", //mini, tiny, small
						"class" => "sectionlast",
                        "options" => $numberofs_array);

    $options[] = array( "name" => "Active Robots Indexing Option",
                        "id" => $shortname."_enablerobot",
                        "std" => "1",
                        "type" => "checkbox");

    $options[] = array( "name" => "Choose General Bot Indexing Type",
						"id" => $shortname."_metabots",
                        "std" => "index,follow",
						"type" => "select",
						"class" => "tiny", //mini, tiny, small
						"options" => $robots_array);

    $options[] = array( "name" => "Choose Google Bot Indexing Type",
						"id" => $shortname."_metagooglebot",
                        "std" => "index,follow",
						"type" => "select",
						"class" => "tiny", //mini, tiny, small
						"options" => $robots_array);



?>