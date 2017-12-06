<?php

//menanpilkan tujuan dan jumlahnya, dan urutkan dari paling banyak
function popularVisited(){
	global $link;

	$query = "SELECT tujuan, COUNT(*) AS jumlah FROM tb_visitors GROUP BY tujuan ORDER BY COUNT(*) DESC";

	if($result = mysqli_query($link, $query)) return $result;
	else return false;
}

function urutkanVisitor(){
	global $link;

	$query = "SELECT asal_muasal, COUNT(*) AS jumlah FROM tb_visitors GROUP BY asal_muasal ORDER BY COUNT(*) DESC";

	if($result = mysqli_query($link, $query)) return $result;
	else return false;
}

?>