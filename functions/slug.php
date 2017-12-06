<?php 

function createSlug($slug)
{
	// Remove everything that isn't latters, numbers, spaces and hypens
	// Remove spaces and duplicate hypens
	// Trim the left and right, removing any left over hypens
	
	// $lettersNumbersSpacesHypens = '/[^\-\s\pN\pL]+/u';
	// $spacesDuplicateHypens      = '/[\-\s]+/';

	// $slug = preg_replace($lettersNumbersSpacesHypens, '', mb_strtolower($slug, 'UTF-8'));
	// $slug = preg_replace($spacesDuplicateHypens, '-', $slug);
	// $slug = trim($slug, '-');

	// return $slug;

	// Burhan 5-8-2016
	// Selain $, nomor dan huruf ->> (pN = Number, pL = Letter)
	$dolarNomorHuruf = '/[^\$\pN\pL]+/u';
	// kecilin huruf, trus ganti apapun selain $, nomor dan huruf dengan '-'
	$slug            = preg_replace($dolarNomorHuruf, '-', mb_strtolower($slug, 'UTF-8'));
	// Trim jika ada '-' di awal / akhir
	$slug            = trim($slug, '-');

	return $slug;
}


?>