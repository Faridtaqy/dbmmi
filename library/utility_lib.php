<?php 
class utility_lib
{
	function convert_day_name($word='undefined'){
		$word = strtolower($word);
		$dictionary_arr = array(
			'sunday' => 'minggu',
			'monday' => 'senin',
			'tuesday' => 'selasa',
			'wednesday' => 'rabu',
			'thursday' => 'kamis',
			'friday' => 'jumat',
			'saturday' => 'sabtu',
		);

		if (array_key_exists($word, $dictionary_arr)) {
			return ucfirst($dictionary_arr[$word]);
		}

		return $word;
	}
}
?>