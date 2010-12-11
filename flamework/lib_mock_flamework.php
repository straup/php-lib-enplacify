<?php

	$GLOBALS['cfg'] = array(
		'cache_force_refresh' => 0,
		'cache_prefix' => null,
		'cache_remote_engine' => null,
		'flickr_apikey' => '',
		'geo_geocoding_service' => 'yahoo',
		'http_timeout' => 3,
	);

	function loadlib($name){
		$lib = "lib_{$name}.php";

		if (! preg_match("/^(?:enplacify|opengraph|vcard)/", $name)){
			$lib = "flamework/{$lib}";
		}

		include_once("$lib");
	}

	# Whatever. Life is short...

	function log_notice($msg){ }
	function microtime_ms(){ }

	loadlib("http");
	loadlib("cache");
?>
