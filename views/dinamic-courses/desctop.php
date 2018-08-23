<div id="chartm" style="width:<?//=$width_block?>">
  <div id="chartm-div1">
	<table id="chartm-div1-button" border="0"><tr>
	<td>
	  Валюта:
	  <a href="/dinamic-courses/usd" id="<?//=$active_usd?>" class="<?=$active['usd']?>">Доллар США</a>
	  
	  <a href="/dinamic-courses/eur" id="<?//=$active_eur?>" class="<?=$active['eur']?>">Евро</a>
	  <a href="/dinamic-courses/nok" id="<?//=$active_nok?>" class="<?=$active['nok']?>">Крона</a>
	</td>
	<td>
		<a id="chartm-ref">Обновить</a>
	</td>
	</tr></table>
	

	<div id="chartm-div1-div1" style="">
	  <table style="width:100%" border="0">
	  <tr>
	  <td style="width:30%;"><span class="glyphicon glyphicon-calendar chartm-icon"></span><span><?=$arBest['date']?></span></td>
	  <td style="text-align:right;">
	    <span class="glyphicon glyphicon-time chartm-icon"></span>
		<span>МСК: <?=$arBest['time']?></span>
	  </td>
	  </tr>
	  <tr>
	  <td class="chartm-size-big" rowspan="2"><?=$arBest[$valute]['center_course']?></td>
	   <td style="text-align2:right;">
	    <span class="chartm-color-blue chartm-size-big1">Курс ЦБ</span>
	    </td>
	  </tr>
	  <tr><td><span><?=$arBest[$valute]['center_message']?><span></td></tr>
	  </table>
	</div>
	
	<div id="chartm-div1-div2">
	  <table style="width:100%;table-layout:fixed;" border="0">
	  <tr>
	  <td colspan="6" id="chartm-td-right">
	    <span class="uk-icon-trophy chartm-icon"></span>
	    <span>ЛУЧШИЕ КУРСЫ В БАНКАХ МУРМАНСКА</span>
		<a href="/all-curs" class="chartm-all-curs">Все курсы</a>
	  </td>
	  </tr>
	  <tr>
	  <td rowspan="2" class="chartm-size-big" style="padding-right:0px"><?=$arBest[$valute]['bay_course']?></td>
	  <td class="chartm-size-bank chartm-color-blue">ПОКУПКА</td>
	  <td class="chartm-border chartm-ic-right">
	    <span class="glyphicon glyphicon-info-sign"></span>
	  </td>
	  
	  <td rowspan="2" class="chartm-size-big" style="padding-right:0px;"><?=$arBest[$valute]['sale_course']?></td>
	  <td class="chartm-size-bank chartm-color-blue">ПРОДАЖА</td>
	  <td class="chartm-ic-right"><span class="glyphicon glyphicon-info-sign"></span></td>
	  </tr>
	  <tr>
	 
	 <td colspan="2" class="chartm-size-bank chartm-border ant-cut">
	    <span class="uk-icon-bank chartm-icon"></span>
		<span class="" title="<?=$arBest[$valute]['bay_title']?>"><?=$arBest[$valute]['bay_name']?><span>
	  </td>
	  <td colspan="2" class="chartm-size-bank ant-cut">
	    <span class="uk-icon-bank chartm-icon"></span>
		<span title="<?=$arBest[$valute]['sale_title']?>"><?=$arBest[$valute]['sale_name']?></span>
	  </td>
	  </tr>

	  </table>
	</div>
	<div style="clear:both"></div>
  </div>
  <div id="chartm-div2"><?=$arBest[$valute]['caption']?></div>
  <div id="chartm-div3">
  
  <div id="chartm-left" style="display:block;">
    <table id="chartm-left-table" cellspacing="0" cellpadding="0" border="0">
      <tr>
        <td id="chartm-tabl-top">Дата</td>
		<td id="chartm-tabl-top">Курс ЦБ РФ</td>
		<td></td>
      </tr>
<?php //require $dir.'/get_data.php'; ?>
	<?foreach($arBest[$valute]['list'] as $v):?>
	<tr>
		<td><?=$v['date']?></td>
		<td><?=$v['value']?></td>
		<td class="<?=$v['class']?>"><?=$v['change']?></td>
	</tr>
	<?endforeach;?>
    </table>
    <div id="chartm-left-div1">
      <div id="chartm-left-div3">
		<a href="" class="chartm-calend-round">
		<span class="uk-icon-calendar chartm-icon1"></span>Выбрать дату</a>
	  </div>
    </div>
    <div id="chartm-left-div2">
		<table cellspacing="0" cellpadding="0" border="0">
			<tbody>
				<tr>
				<td id="left-div2-td1" class="pseudo-link-new1">08.11.2017</td>
				<td id="left-div2-td2">58.4557</td>
				<td id="close-wind-cur">X</td>
				</tr>
			</tbody>
		</table>
	</div>
    <div id="datepicker"></div>
  </div>  
  <div id="chartm-right" style="">
    <div id="chartdiv" class="text-center" style="width:100%;">
      <img src="/web/images/dinamic-courses/loader.gif" style="position:relative; top:130px"/>
    </div>
    <div id="chartm-right-div2">
      <span>Период:</span>
      <a href="" id="chart-a1" class="cl-chart-a">Неделя</a>
      <a href="" id="chart-a2" class="cl-chart-a">Месяц</a>
      <a href="" id="chart-a3" class="cl-chart-a">Квартал</a>
      <a href="" id="chart-a4" class="cl-chart-a">Год</a>
      <a href="" id="chart-a5" class="cl-chart-a">Все</a>
    </div>
  </div>
  <div id="clear-curs"></div>
  </div>
  <form method="post" id="chartm-form" action="">
    <input id="chartm-form-input" type="hidden" name="valute" value="<?=$valute?>">
	<input id="chartm-form-path" type="hidden" name="path" value="<?//=$action?>">
    <input id="chartm-form-usd" type="hidden" name="usd" value="<?//=$url_usd?>">
	<input id="chartm-form-eur" type="hidden" name="eur" value="<?//=$url_eur?>">
	<input id="chartm-form-nok" type="hidden" name="nok" value="<?//=$url_nok?>">
	<input id="csrf" type="hidden"  value="<?=Yii::$app->request->getCsrfToken()?>">
  </form>
</div>
<input type="hidden" id="converter342-maxday" value="<?=$arBest['maxday']?>"/>


