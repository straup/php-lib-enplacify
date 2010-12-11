<?php

	#
	# $Id$
	#

	loadlib("opengraph");
	loadlib("vcard");

	# http://www.chow.com/restaurants/919858/masala-cuisine

	######################################################

	function enplacify_chowhound_uri($uri){

		$listing_id = enplacify_chowhound_uri_to_id($uri);

		if (! $listing_id){

			return array(
				'ok' => 0,
				'error' => 'failed to recognize listing id',
			);
		}

		$rsp = enplacify_chowhound_get_listing($listing_id);

		if (! $rsp['ok']){
			return $rsp;
		}

		$title = $rsp['listing']['title'];

		if (! $title){
			$title = $rsp['listing']['fn org'];
		}
		
		$place = array(
			'latitude' => $rsp['listing']['latitude'],
			'longitude' => $rsp['listing']['longitude'],
			'name' => $title,
			'phone' => $rsp['listing']['tel'],
			'url' => $rsp['listing']['url'],
			'address' => $rsp['listing']['street-address'],
			'derived_from' => 'chowhound',
			'derived_from_id' => $listing_id,
		);

		return array(
			'ok' => 1,
			'place' => $place,
			'listing' => $rsp['listing'],
		);	
	}

	######################################################

	function enplacify_chowhound_uri_to_id($uri){

		return enplacify_service_uri_to_id('chowhound', $uri);
	}

	######################################################

	function enplacify_chowhound_get_listing($listing_id){

		$url = "http://www.chow.com/restaurants/" . urlencode($listing_id);

		$headers = array();
		$more = array('follow_redirects' => 1);

		$rsp = http_get($url, $headers, $more);

		if (! $rsp['ok']){
			return $rsp;
		}

		$vcard_rsp = vcard_parse_html($rsp['body']);
		$graph_rsp = opengraph_parse_html($rsp['body']);

		if ((! $vcard_rsp['ok']) && (! $graph_rsp['ok'])){

			$rsp = array(
				'ok' => 0,
				'error' => 'Failed to parse listing'
			);
		}

		else {

			$listing = array_merge($vcard_rsp['vcard'], $graph_rsp['graph']);
			$listing['id'] = $listing_id;

			$rsp = array( 'ok' => 1, 'listing' => $listing );
		}

		return $rsp;
	}

	######################################################

?>
