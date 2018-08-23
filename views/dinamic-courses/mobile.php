<div id="chartm" style="width:<?//=$width_block?>">
  <div id="chartm-div1">
	<table id="chartm-div1-button" border="0"><tr>
	<td>
	  <a href="<?//=$url_usd?>" id="<?//=$active_usd?>">Доллар США</a>
	  <a href="<?//=$url_eur?>" id="<?//=$active_eur?>">Евро</a>
	  <a href="<?//=$url_nok?>" id="<?//=$active_nok?>">Крона</a>
	</td>
	<td>
      <span class="uk-icon-refresh"></span><a id="chartm-ref">Обновить</a>	  
	</td>
	</tr></table>


	<div id="chartm-div1-div1" style="">
	  <table style="width:100%" border="0">
	  <tr>
	  <td><span class="uk-icon-calendar chartm-icon"></span><span><?//=$ar_msk[0]?></span></td>
	  <td style="text-align:left;">
	    <span class="uk-icon-clock-o chartm-icon"></span>
		<span>МСК: <?//=$ar_msk[1]?></span>
	  </td>
	  </tr>
	  <tr>
	  <td class="chartm-size-big" rowspan="2"><?//=$best_cur[0]?></td>
	   <td style="text-align2:right;">
	    <span class="chartm-color-blue chartm-size-big1">Курс ЦБ</span>
	    </td>
	  </tr>
	  <tr><td><span><?//=$caption1?><span></td></tr>
	  </table>
	</div>
	<div id="chartm-div1-div2"> 
	  <table style="width:100%" border="0">
	  <tr>
	  <td id="chartm-td-right2" colspan="2">
	    <span class="uk-icon-trophy chartm-icon"></span>
	    <span style="">ЛУЧШИЕ КУРСЫ В БАНКАХ МУРМАНСКА</span>
		<a href="/all-curs" class="chartm-all-curs">Все курсы</a>
	  </td>
	  </tr>
	  <tr>
	  <td>
	    <p><span class="uk-icon-info-circle chartm-icon"></span>
		<span class="chartm-color-blue">ПОКУПКА</span></p>
		<p class="chartm-size-big"><?//=$best_cur[1]?></p>
		<p><span class="uk-icon-bank chartm-icon"></span><?//=$best_cur[2]?></p>
	  </td>
	  
	  <td>
	    <p><span class="uk-icon-info-circle chartm-icon"></span>
		<span class="chartm-color-blue">ПРОДАЖА</span></p>
		<p class="chartm-size-big"><?//=$best_cur[3]?></p>
		<p><span class="uk-icon-bank chartm-icon"></span><?//=$best_cur[4]?></p>
	  </td>
	 
	  </tr>
	  </table> 	  	  
	</div>
  </div>
  <div id="chartm-div2"><?//=$caption;?></div>
  <div id="chartm-div3">
  
  <div id="chartm-left" style="display:block;">
    <table id="chartm-left-table" cellspacing="0" cellpadding="0" border="0">
      <tr>
        <td id="chartm-tabl-top">Дата</td>
		<td id="chartm-tabl-top">Курс ЦБ РФ</td>
		<td></td>
      </tr>
<?php //require $dir.'/get_data.php'; ?>
    </table>
    <div id="chartm-left-div1">
      <div id="chartm-left-div3">
		<a href="" class="chartm-calend-round">
		<span class="uk-icon-calendar chartm-icon1"></span>Выбрать дату</a>
	  </div>
    </div>
    <div id="chartm-left-div2"></div>
    <div id="datepicker"></div>
  </div> 

    <div id="chartm-right">
        <div id="chartdiv">
            <img src="<?//=$path?>/images/loader.gif" style="position:relative; left:200px;top:130px;"/>
        </div>
        <div id="chartm-right-div2">
			<a href="" id="chart-a1" class="cl-chart-a">Неделя</a>
            <a href="" id="chart-a2" class="cl-chart-a">Месяц</a>
            <a href="" id="chart-a3" class="cl-chart-a">Квартал</a>
            <a href="" id="chart-a4" class="cl-chart-a">Год</a>
            <a href="" id="chart-a5" class="cl-chart-a">Все</a>
        </div>
    </div>
 <!-- <div id="clear-curs"></div> -->

  </div>
  <form method="post" id="chartm-form" action="">
    <input id="chartm-form-input" type="hidden" name="valute" value="<?//=$valute?>">
	<input id="chartm-form-path" type="hidden" name="path" value="<?//=$action?>">
    <input id="chartm-form-usd" type="hidden" name="usd" value="<?//=$url_usd?>">
	<input id="chartm-form-eur" type="hidden" name="eur" value="<?//=$url_eur?>">
	<input id="chartm-form-nok" type="hidden" name="nok" value="<?//=$url_nok?>">
	<input id="chartm-form-path1" type="hidden" name="path1" value="<?//=$path?>">
  </form>
</div>
<input type="hidden" id="converter342-maxday" value="<?//=$maxday?>"/>