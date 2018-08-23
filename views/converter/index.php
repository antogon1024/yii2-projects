<?php
$this->registerCssFile('/css/converter/converter.css');
$this->registerJsFile('/js/converter/converter.js', ['depends' => [\yii\web\JqueryAsset::className()], 'defer'=>'defer']);
//print_r($data);
//foreach($data['banks'] as $bank){
	//echo $bank.'<br>';
//}
//exit;
?>
<div class="body-content">
	<p>Делал модуль к joomla
	</p>
</div>

<div id="converter342" class="center-block">
    <div id="converter342-top">
	    <table id="converter342-table" border="0">
	        <tr>
	        <td colspan="3" id="converter342-date-td">
		        <span id="converter342-date1">покупка</span>
				<span class="uk-icon-calendar"></span>
		        <span id="converter342-date">сегодня</span>
		    </td>
	        </tr>

	        <tr>
	        <td id="converter342-td2">
		        <div id="of">
		        <span class=""><img src="/images/converter/bank.png"></span>
		        <span id="converter342-label1" title=""></span></div>
		    </td>
		    <td id="converter342-td3">
		        <span id="converter342-left"></span>
		        <span id="converter342-label2">КОНВЕРТЕР ПО КУРСУ</span>
		        <span id="converter342-right"></span>
		    </td>
		    <td id="converter342-td4">
				<span class="glyphicon"><img src="/images/converter/bank.png"></span>
				<span id="converter342-label3">ЦБ России</span>
		    </td>
	        </tr>
	    </table>
    </div>
    <div id="datepicker"></div>
    <div id="converter342-banks">
	    <input type="text" id="converter-valute-input" value="">
	    <div id="aconverter342-m">
		    
			<div id="aconverter342-l">
			    <? //foreach ($data['banks'] as $i=>$bank): ?>
				<div id="ar-banks<?//=$i?>"><?//=$bank?></div>
				<? //endforeach; ?>    
			</div>
			<div id="aconverter342-r1">
				<div  id="aconverter342-r"></div>
			</div>
		</div>
	</div>
    <table border="0" id="converter342-table1"><tr>
        <td id="converter342-td5">
	        <div id="converter342-block-valute">
	            <div class="converter342-block-top">
		            <span id="flag-v">
		                <img src="/images/converter/usd.png" height="24" width="24"/>
		            </span>
		            <span class="converter342-size">USD</span>
		            <span id="converter342-select">
		                <img src="/images/converter/down.png" height="16" width="16"/>
			
		            </span>
					<img src="/images/converter/v.png" />
					<input class="converter342-curs" value="1" name="a"/>
                    <img id="converter342-close" src="/images/converter/close1.png" height="24" width="24" />
		        </div>
		        <div id="converter342-valute"><!--блок выбора валют -->
				    <div id="converter342-rub">Российский рубль<span>RUB</span></div>
					<div id="converter342-usd">Доллар США<span>USD</span></div>
					<div id="converter342-eur">Евро<span>EUR</span></div>
					<div id="converter342-nok">Норвежская крона<span>NOK</span></div>
				</div>
                <div style="height:10px;"></div>
		        <div class="converter342-block-top1">
		            <span id="flag-v1">
		                <img src="/images/converter/rub.png" height="24" width="24"/>
		            </span>
		            <span class="converter342-size1">RUB</span>
		            <span id="converter342-select1">
		                <img src="/images/converter/down.png" height="16" width="16"/>
		            </span>
		            <img src="/images/converter/v.png" />
		            <!--<span class="converter342-curs1"></span>-->
					<input class="converter342-curs1" value="58" name="a"/>
                    <img id="converter342-close1" src="/images/converter/close1.png" height="24" width="24" />
		        </div>
		        <div id="converter342-valute1"><!--блок выбора валют 1-->
				    <div id="converter342-rub-1">Российский рубль<span>RUB</span></div>
					<div id="converter342-usd-1">Доллар США<span>USD</span></div>
					<div id="converter342-eur-1">Евро<span>EUR</span></div>
					<div id="converter342-nok-1">Норвежская крона<span>NOK</span></div>
				</div>
	        </div>
	    </td>
        <td id="converter342-refresh">
		    <img src="/images/converter/refresh.png" />
		</td>
        <td>
	        <div id="converter342-m">
	            <div id="converter342-l">
				   <?//=$reklam?>
				   
				   
	<div>Выгодный курс обмена</div>
	<div>Надежность операций</div>
	<div>Оперативный вывод валюты</div>
	<div>Дополнительная реклама1</div>
	<div>Дополнительная реклама2</div>
	<div>Дополнительная реклама3</div>
			        
				   
		        </div>
		        <div id="converter342-r1">
		            <div  id="converter342-r"></div>
		        </div>
	        </div>
	    </td>
  </tr></table>
</div>
<input type="hidden" id="converter342-today" value=""/>
<input type="hidden" id="converter342-usd-bay" value=""/>
<input type="hidden" id="converter342-usd-sale" value=""/>
<input type="hidden" id="converter342-sale-bay" value="1"/>
<input type="hidden" id="converter342-eur-bay" value=""/>
<input type="hidden" id="converter342-eur-sale" value=""/>
<input type="hidden" id="converter342-nok-bay" value=""/>
<input type="hidden" id="converter342-nok-sale" value=""/>
<input type="hidden" id="converter342-hbank" value=""/>
<input type="hidden" id="converter342-path-cb" value="<?//=$path_cb?>"/>
<input type="hidden" id="converter342-usdcb" value=""/>
<input type="hidden" id="converter342-eurcb" value=""/>
<input type="hidden" id="converter342-nokcb" value=""/>
<input type="hidden" id="converter342-maxday" value="<?=$maxday?>"/>
<!-- ---------------------------------------------- -->
<input type="hidden" id="usd-rub-bay" value=""/>
<input type="hidden" id="usd-rub-sale" value=""/>
<input type="hidden" id="usd-rub" value=""/>
<input type="hidden" id="eur-rub-bay" value=""/>
<input type="hidden" id="eur-rub-sale" value=""/>
<input type="hidden" id="eur-rub" value=""/>
<input type="hidden" id="nok-rub-bay" value=""/>
<input type="hidden" id="nok-rub-sale" value=""/>
<input type="hidden" id="nok-rub" value=""/>
<input type="hidden" id="rub-usd-bay" value=""/>
<input type="hidden" id="rub-usd-sale" value=""/>
<input type="hidden" id="rub-usd" value=""/>
<input type="hidden" id="rub-eur-bay" value=""/>
<input type="hidden" id="rub-eur-sale" value=""/>
<input type="hidden" id="rub-eur" value=""/>
<input type="hidden" id="rub-nok-bay" value=""/>
<input type="hidden" id="rub-nok-sale" value=""/>
<input type="hidden" id="rub-nok" value=""/>
<input type="hidden" id="usd-eur-bay" value=""/>
<input type="hidden" id="usd-eur-sale" value=""/>
<input type="hidden" id="usd-eur" value=""/>
<input type="hidden" id="usd-nok-bay" value=""/>
<input type="hidden" id="usd-nok-sale" value=""/>
<input type="hidden" id="usd-nok" value=""/>
<input type="hidden" id="eur-usd-bay" value=""/>
<input type="hidden" id="eur-usd-sale" value=""/>
<input type="hidden" id="eur-usd" value=""/>
<input type="hidden" id="eur-nok-bay" value=""/>
<input type="hidden" id="eur-nok-sale" value=""/>
<input type="hidden" id="eur-nok" value=""/>
<input type="hidden" id="nok-usd-bay" value=""/>
<input type="hidden" id="nok-usd-sale" value=""/>
<input type="hidden" id="nok-usd" value=""/>
<input type="hidden" id="nok-eur-bay" value=""/>
<input type="hidden" id="nok-eur-sale" value=""/>
<input type="hidden" id="nok-eur" value=""/>

