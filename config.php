<?php

	$GLOBALS['cfg']['enplacify'] = array(

		'chowhound' => array(
			'uris' => array(
				"/chow\.com\/restaurants\/([^\/]+)/",
			),
		),

		'dopplr' => array(
			'uris' => array(
				"/dplr\.it\/(eat|stay|explore)\/([^\/]+)/",
				"/dopplr\:(eat|stay|explore)=(.+)$/",
			),
		),

		'flickr' => array(
			'uris' => array(
				"/flickr\.com\/photos\/(?:[^\/]+)\/(\d+)/",
				# flickr short Uris
			),
			'machinetags' => array(
				'dopplr' => array('eat', 'explore', 'stay'),
				'foodspotting' => array('place'),
				'foursquare' => array('venue'),
				'osm' => array('node', 'way'),
				'yelp' => array('biz'),
			),
		),

		'foodspotting' => array(
			'uris' => array(
				"/foodspotting\.com\/places\/(\d+)/",
				"/foodspotting\:place=(.+)$/",
			),
		),

		'foursquare' => array(
			'uris' => array(
				"/foursquare\.com\/venue\/\d+/",
				"/foursquare\:venue=(.+)$/",
			),
		),

		'openstreetmap' => array(
			'uris' => array(
				"/openstreetmap.org\/browse\/(node|way)\/(\d+)/",
				"/osm\:(node|way)=(\d+)$/",
			),
		),

		'yelp' => array(
			'uris' => array(
				"/yelp\.com\/biz\/([^\/]+)/",
				"/yelp\:biz=([^\/]+)/",
			),
		),
	);

?>
