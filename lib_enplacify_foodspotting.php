<?php

	#
	# $Id$
	#

	loadlib("vcard");
	loadlib("geo_geocode");

	######################################################

	function enplacify_foodspotting_uri($uri){

		$place_id = enplacify_foodspotting_uri_to_id($uri);

		if (! $place_id){
			return array(
				'ok' => 0,
				'error' => 'failed to recognize places id',
				'url' => $url,
			);
		}

		$rsp = enplacify_foodspotting_get_place($place_id);

		if (! $rsp['ok']){
			return $rsp;
		}

		$place = array(
			'name' => $rsp['place']['fn org'],
			'derived_from' => 'foodspotting',
			'derived_from_id' => $rsp['place']['id'],
		);

		$others = array(
			'latitude' => 'latitude',
			'longitude' => 'longitude',
			'street-address' => 'address',
			'tel' => 'phone',
		);

		foreach ($others as $theirs => $ours){

			if (isset($rsp['place'][$theirs])){
				$place[$ours] = $rsp['place'][$theirs];
			}
		}

		return array(
			'ok' => 1,
			'place' => $place,
		);	
	}

	######################################################

	function enplacify_foodspotting_uri_to_id($uri){

		return enplacify_service_uri_to_id('foodspotting', $uri);
	}

	######################################################

	function enplacify_foodspotting_get_place($place_id){

		$url = "http://www.foodspotting.com/places/" . urlencode($place_id);
		$rsp = http_get($url);

		if (! $rsp['ok']){
			return $rsp;
		}

		$rsp = vcard_parse_html($rsp['body']);

		if ($rsp['ok']){

			$place = $rsp['vcard'];
			$place['id'] = $place_id;

			if ($place['street-address'] && $place['locality'] && $place['region']){

				$q = "{$place['street-address']}, {$place['locality']} {$place['region']}";

				$geo_rsp = geo_geocode_string($q);

				if ($geo_rsp['ok']){
					$place['latitude'] = $geo_rsp['latitude'];
					$place['longitude'] = $geo_rsp['longitude'];
				}
			}

			$rsp = array(
				'ok' => 1,
				'place' => $place,
			);
		}

		return $rsp;
	}

	######################################################
?>
