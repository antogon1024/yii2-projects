<?php
//echo dirname(__FILE__);exit;
$this->title = Yii::t('app', 'Проекты');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/dinamic-courses/dinamic-courses.css');
$this->registerCssFile('/css/dinamic-courses/icons.css');
$this->registerJsFile('/js/dinamic-courses/dinamic-courses.js', ['depends' => [\yii\web\JqueryAsset::className()], 'defer'=>'defer']);
//----------------------------------


$valute = 'usd';
$dir = dirname(__FILE__);


$selusd = '';
$seleur = '';
$selnok = '';
$active_usd = $active_eur = $active_nok = 'chartm-no-active';
if($valute == 'usd'){ 
    $selusd = 'selected="selected"';
	$caption = 'ДИНАМИКА КУРСА доллара США, за 1 USD';
	$caption1 = 'рублей за доллар США';
	$active_usd = 'chartm-active';
}
if($valute == 'eur'){
    $seleur = 'selected="selected"';
    $caption = 'ДИНАМИКА КУРСА евро, за 1 EUR';
	$caption1 = 'рубля за евро';
	$active_eur = 'chartm-active';
};
if($valute == 'nok'){ 
    $selnok = 'selected="selected"';
	$caption = 'ДИНАМИКА КУРСА норвежской кроны, за 10 NOK';
	$caption1 = 'рублей за 10 норвежских крон';
	$active_nok = 'chartm-active';
}
require $dir.'/best_cur.php';
list($usec, $sec) = explode(" ",microtime());
$today = date ("Y-m-d", $sec);

//$url = $_SERVER['DOCUMENT_ROOT'].$path_kron.'/'.$today.'.txt';
//$url = $_SERVER['DOCUMENT_ROOT'].$path_kron.'/2016-04-20.txt'; //exit;
$url = $dir.'/data_murm/2016-04-20.txt';

$best_cur = getData($valute, $url);
//print_r($best_cur);exit;
$title2 = $best_cur[2];
$title4 = $best_cur[4];

$best_cur[2] = mb_strtoupper($best_cur[2]);
$best_cur[4] = mb_strtoupper($best_cur[4]);

$best_cur[2] = mb_substr($best_cur[2], 0, 13);
$best_cur[4] = mb_substr($best_cur[4], 0, 13);

date_default_timezone_set("Europe/Moscow");
$msk = date ("d.m.Y H:i", filemtime($dir.'/data_cb/'.$valute.'.csv'));
$ar_msk = explode(' ', $msk);
//print_r($ar_msk);
//exit;


$sec_st = gmmktime (0, 0, 0, 1, 1, 2000);
list($usec, $sec) = explode(" ",microtime());
$end = date ("Y-m-d", $sec);
list($year, $month, $day) = explode('-', $end);
$sec_end = gmmktime (0, 0, 0, $month, $day, $year);
$maxday = ($sec_end - $sec_st)/86400;

//---------------------------------










include dirname(__FILE__).'/desctop.php';
//include dirname(__FILE__).'/mobile.php';

if($mobile == true){
	//include dirname(__FILE__).'/desctop.php';
}else{
	//include dirname(__FILE__).'/mobile.php';
}
?>

