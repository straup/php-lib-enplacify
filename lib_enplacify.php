<?php

	#
	# $Id$
	#

	# THIS IS A WORK IN PROGRESS (20101211/straup)

	$GLOBALS['enplacify_services'] = array(

		'chowhound' => array(
			'uris' => array(
				"/chow\.com\/restaurants\/([^\/]+)/",
			),
		),

		'dopplr' => array(
			'uris' => array(
				"/dplr\.it\/(eat|stay|explore)\/([^\/]+)/",
				"/dopplr\:(eat|stay|explore)=(.+)$/",
				# "dopplr\.com\/place\/(?:[^\/]+)\/(?:[^\/]+)\/(?:[^\/]+)\/(eat|stay|explore)\/([^\/]+)",
			),
		),

		'flickr' => array(
			'uris' => array(
				"/flickr\.com\/photos\/(?:[^\/]+)\/(\d+)/",
				# flickr short Uris
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

		'yelp' => array(
			'uris' => array(
				"/yelp\.com\/biz\/(?:[^\/]+)/",
				"/yelp\:biz=(.+)$/",
			),
		),
	);

	######################################################

	function enplacify_uri($uri){

		foreach ($GLOBALS['enplacify_services'] as $service => $data){

			foreach ($data['uris'] as $pattern){

				if (! preg_match($pattern, $uri)){
					continue;
				}

				$service_lib = "enplacify_{$service}";
				$service_func = "enplacify_{$service}_uri";

				loadlib($service_lib);

				$cache_key = "enplacify_{$service}_" . md5($uri);
				$cache = cache_get($cache_key);

				if ($cache['ok']){
					return $cache['data'];
				}

				$rsp = call_user_func_array($service_func, array($uri));

				cache_set($cache_key, $rsp);
				return $rsp;
			}
		}

		return array(
			'ok' => 0,
			'error' => 'failed to locate any valid services for URL',
		);
	}

	######################################################

	# This is just a generic wrapper because most services only
	# only need to have a single identifier teased out of a given
	# URI. It's meant to be called *inside* of a service specific
	# function. Or not. See also: enplacify_dopplr_uri_to_id()
	# (20101211/straup)

	function enplacify_service_uri_to_id($service, $uri){

		if (! isset($GLOBALS['enplacify_services'][ $service ])){
			return null;
		}

		$service_id = null;

		$uris = $GLOBALS['enplacify_services'][ $service ]['uris'];

		foreach ($uris as $pattern){

			if (preg_match($pattern, $uri, $m)){
				$service_id = $m[1];
				break;
			}
		}

		return $service_id;
	}

	######################################################
?>
