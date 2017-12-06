<?php 

function InsertVisitor($visitor, $tujuan)
{
	global $link;

 	$query = "INSERT INTO tb_visitors (asal_muasal, tujuan, tanggal_kunjungan) 
 						VALUES ('$visitor', '$tujuan', now())";

 	if(mysqli_query($link, $query)) return true;
	else return false;
}

function urutkanVisitor()
{
	global $link;

	$query = "SELECT tujuan, COUNT(*) FROM tb_visitors 
						GROUP BY tujuan 
						ORDER BY COUNT(*) DESC";

	if(mysqli_query($link, $query)) return true;
	else return false;
}
