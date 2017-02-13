/* Prageeth Sudarshana | Tokyo */

/*
	ARRAY TO HTTP QUERY SETTING
*/

function HTTP_QUERY($array, $unset) {
	if ($array['page']) {
		unset($array['page']);
	}

	if (is_array($array)) {
		if (is_array($unset)) {
			foreach ($unset as $key => $val) {
				unset($array[$unset[$key]]);

			} 

		} else {
			unset($array[$unset]);			
		}

		return http_build_query($array) . "\n";

	} else {
		return http_build_query($array) . "\n";	
	}

}
