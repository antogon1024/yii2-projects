<?php
$this->registerCssFile('/css/courses-valute/courses-valute.css');
$this->registerCssFile('/css/dinamic-courses/icons.css');
$this->registerJsFile('/js/courses-valute/courses-valute.js', ['depends' => [\yii\web\JqueryAsset::className()], 'defer'=>'defer']);
//----------------------------------

?>

<!--<form action="" method="get" class="box style">-->
	<span>Дата:</span>
	<input name="ant-date" id="ant-select-date" value="" readonly="readonly">
<!--</form>-->
<br><br>
<div id="datepicker" style="display: block;" class=""></div>

<table id="ant-habit" class="text-center" style="width:100%;" border="1">
	<tr class="ant-head">
		<td class="text-left ant-label"><strong>Валюта</strong></td>
		<td colspan="2">
			<img src="/images/courses-valute/usd.png"  class="flag-icon lazy-loaded" alt="usd" width="30" height="23">
			<strong>USD</strong>
		</td>
		<td colspan="2">
			<img src="/images/courses-valute/eur.png"  class="flag-icon lazy-loaded" alt="eur" width="30" height="23">
			<strong>EUR</strong>
		</td>
		<td colspan="2">
			<img src="/images/courses-valute/nok.png"  class="flag-icon lazy-loaded" alt="nok" width="30" height="23">
			<strong>10 NOK</strong>
		</td>
	</tr>
	<tr class="ant-head">
		<td class="text-left ant-label"><strong>Банк</strong></td>
		<td><strong>Покупка</strong></td>
		<td><strong>Продажа</strong></td>
		<td><strong>Покупка</strong></td>
		<td><strong>Продажа</strong></td>
		<td><strong>Покупка</strong></td>
		<td><strong>Продажа</strong></td>
	</tr>
	<tr>
		<td class="text-left ant-label">
			<img src="/images/courses-valute/cbr.png"  class="" alt="cbr">
		</td>
		<td colspan="2">
			<b><?= $res['usd']['value'] ?></b>&nbsp;
			<b class="<?= $res['usd']['class'] ?>"><?= $res['usd']['change'] ?></b>
		</td>
		<td colspan="2">
			<b><?= $res['eur']['value'] ?></b>&nbsp;
			<b class="<?= $res['eur']['class'] ?>"><?= $res['eur']['change'] ?></b>
		</td>
		<td colspan="2">
			<b><?= $res['nok']['value'] ?></b>&nbsp;
			<b class="<?= $res['nok']['class'] ?>"><?= $res['nok']['change'] ?></b>
		</td>
	</tr>
<? foreach($data['banks'] as $k=>$v): ?>
	<tr class="<?= $data['odd'][$k] ?>">
		<td class="text-left ant-label ant-bank"><?= $v ?></td>
		<td><?= $data['usd1'][$k] ?></td>
		<td><?= $data['usd2'][$k] ?></td>
		<td><?= $data['eur1'][$k] ?></td>
		<td><?= $data['eur2'][$k] ?></td>
		<td><?= $data['nok1'][$k] ?></td>
		<td><?= $data['nok2'][$k] ?></td>
	</tr>
<? endforeach; ?>
</table>
<input id="ant-maxday" type="hidden" value="<?= $maxday ?>">
<input id="ant-today" type="hidden" value="<?= $today ?>">
<input id="ant-input" type="hidden" value="<?= $input ?>">
