<?php

	include("flamework/lib_mock_flamework.php");
	include("config.php");

	loadlib("enplacify");

	# http://www.flickr.com/services/apps/create/apply/
	$GLOBALS['cfg']['flickr_apikey'] = '50f8fe2a13c12d48ec4dfb1dc1f15cc8';

	$to_emplacify = array(

		# chowhound
		"http://www.chow.com/restaurants/919858/masala-cuisine",

		# dopplr
		"dplr.it/eat/qhk0",

		# flickr
		"http://www.flickr.com/photos/cynk/5084197983/",

		# foodspotting
		"http://www.foodspotting.com/places/1927",
		"foodspotting:place=1927",

		# foursquare
		"foursquare:venue=1088273",

		# osm
		"osm:node=357612309",
		"http://www.openstreetmap.org/browse/way/4799764",

		# yelp
		"http://www.yelp.com/biz/smitten-ice-cream-san-francisco",
		"http://www.yelp.com/biz/q20FkqFbmdOhfSEhaT5IHg",

	);

	foreach ($to_emplacify as $uri){

		$rsp = enplacify_uri($uri);

		$name = (($rsp['ok']) && ($rsp['place']['name'])) ? "({$rsp['place']['name']})" : "";

		echo "{$uri} : {$rsp['ok']} $name\n";

		if (! $rsp['ok']){
			echo "\t{$rsp['error']}\n";
		}
	}

	exit();
?>
