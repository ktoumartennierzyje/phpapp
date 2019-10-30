<?php
// $pages = array(
// 	'witam' => 'Witamy',
// 	'formularz' => 'Formularz',
// 	'klasa' => 'Klasy'
// );

$ret = array(); // tablica asocjacyjna, która będzie przechowywała wyniki zapytań
function get_menu($id) {
	global $db,$ret;
	db_query('SELECT * FROM menu', $ret);
	//print_r($ret);
 	foreach ($ret as $k => $t) {
		echo '
<li class="nav-item">
    <a class="nav-link" href="?id='.$t['plik'].'">'.$t['tytuł'].'</a>
</li>
		';
	}
}
function get_page_title($id) {
	global $ret;
	foreach ($ret as $k => $t) {
		if($t['plik'] == $id){
			echo $t['tytuł'];
			return;
		}
	}
	//tytuł domyslny
	echo 'Aplikacja PHP';
}
function get_page_content($id) {
	if (file_exists($id.'.html'))
		include($id.'.html');
	else
		include('404.html');
}
?>