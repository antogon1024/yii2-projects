jQuery(document).ready(function($) {
	//var burl = '/modules/mod_converter342';
	//var burl = '/web/converter';
	
	var sale_bay = 1;
	var select = 'left';
	var pdata = new Object();
	var str; //menu of bancs
    function setData(pdata2, label2){
		for(var i in pdata2.banks){
			if(pdata2.usd1[i] == '-') pdata2.usd1[i] = 0;
			if(pdata2.usd2[i] == '-') pdata2.usd2[i] = 0;
			if(pdata2.eur1[i] == '-') pdata2.eur1[i] = 0;
			if(pdata2.eur2[i] == '-') pdata2.eur2[i] = 0;
			if(pdata2.nok1[i] == '-') pdata2.nok1[i] = 0;
			if(pdata2.nok2[i] == '-') pdata2.nok2[i] = 0;

			if(pdata2.banks[i] == label2){
                //--------------------------------------------
				$('#usd-rub-bay').val(pdata2.usd1[i]);
				$('#usd-rub-sale').val(pdata2.usd2[i]);

				$('#eur-rub-bay').val(pdata2.eur1[i]);
				$('#eur-rub-sale').val(pdata2.eur2[i]);
                if(pdata2.nok1[i] != 0)
				    $('#nok-rub-bay').val(pdata2.nok1[i]/10);
				else
					$('#nok-rub-bay').val(0);
                     
				if(pdata2.nok2[i] != 0)
					$('#nok-rub-sale').val(pdata2.nok2[i]/10);
				else
                    $('#nok-rub-sale').val(0);
                //-----------------------------------------------
                if(pdata2.usd1[i] != 0){
				    val = 1 / pdata2.usd1[i];
					$('#rub-usd-bay').val(val);
				}else{
					$('#rub-usd-bay').val(0);
				}

				if(pdata2.usd2[i] != 0){
				    val = 1 / pdata2.usd2[i];
					$('#rub-usd-sale').val(val);
				}else{
					$('#rub-usd-sale').val(0);
				}
                 
				if(pdata2.eur1[i] != 0){
					val = 1 / pdata2.eur1[i];
					$('#rub-eur-bay').val(val);
				}else{
					$('#rub-eur-bay').val(0);
				}

                if(pdata2.eur2[i] != 0){
                    val = 1 / pdata2.eur2[i];
				    $('#rub-eur-sale').val(val);
				}else{
					$('#rub-eur-sale').val(0);
				}

                if(pdata2.nok1[i] != 0){
				    val = 10 / pdata2.nok1[i];
				    $('#rub-nok-bay').val(val);
				}else{
					$('#rub-nok-bay').val(0);
				}

                if(pdata2.nok2[i] != 0){
                    val = 10 / pdata2.nok2[i];
				    $('#rub-nok-sale').val(val);
				}else{
					$('#rub-nok-sale').val(0);
				}
                //--------------------------------------beg ino
                val1 = $('#usd-rub-bay').val();
				val2 = $('#eur-rub-bay').val();
				if(val1 != 0 || val2 != 0 )
				    val = val1 / val2;
				else
					val = 0;
                $('#usd-eur-bay').val(val);

				val1 = $('#eur-rub-bay').val();
				val2 = $('#usd-rub-bay').val();
				if(val1 != 0 || val2 != 0 )
				    val = val1 / val2;
				else
					val = 0;
                $('#eur-usd-bay').val(val);

				val1 = $('#usd-rub-sale').val();
				val2 = $('#eur-rub-sale').val();
				if(val1 != 0 || val2 != 0 )
				    val = val1 / val2;
				else
					val = 0;
                $('#usd-eur-sale').val(val);

				val1 = $('#eur-rub-sale').val();
				val2 = $('#usd-rub-sale').val();
				if(val1 != 0 || val2 != 0 )
				    val = val1 / val2;
				else
					val = 0;
                $('#eur-usd-sale').val(val);
                //---------------------------------------------
                val1 = $('#usd-rub-bay').val();
				val2 = $('#nok-rub-bay').val();
				if(val1 != 0 || val2 != 0 )
				    val = val1 / val2;
				else
					val = 0;
                $('#usd-nok-bay').val(val);

				val1 = $('#nok-rub-bay').val();
				val2 = $('#usd-rub-bay').val();
				if(val1 != 0 || val2 != 0 )
					val = val1 / val2;
				else
					val = 0;
                $('#nok-usd-bay').val(val);

				val1 = $('#usd-rub-sale').val();
				val2 = $('#nok-rub-sale').val();
				if(val1 != 0 || val2 != 0 )
					val = val1 / val2;
				else
					val = 0;
                $('#usd-nok-sale').val(val);

				val1 = $('#nok-rub-sale').val();
				val2 = $('#usd-rub-sale').val();
				if(val1 != 0 || val2 != 0 )
					val = val1 / val2;
				else
					val = 0;
                $('#nok-usd-sale').val(val);
//----------------------------------------------------------
                val1 = $('#eur-rub-bay').val();
				val2 = $('#nok-rub-bay').val();
				if(val1 != 0 || val2 != 0 )
					val = val1 / val2;
				else
					val = 0;
                $('#eur-nok-bay').val(val);
				
				val1 = $('#nok-rub-bay').val();
				val2 = $('#eur-rub-bay').val();
				if(val1 != 0 || val2 != 0 )
					val = val1 / val2;
				else
					val = 0;
                $('#nok-eur-bay').val(val);

				val1 = $('#eur-rub-sale').val();
				val2 = $('#nok-rub-sale').val();
				if(val1 != 0 || val2 != 0 )
					val = val1 / val2;
				else
					val = 0;
                $('#eur-nok-sale').val(val);

				val1 = $('#nok-rub-sale').val();
				val2 = $('#eur-rub-sale').val();
				if(val1 != 0 || val2 != 0 )
					val = val1 / val2;
				else
					val = 0;
                $('#nok-eur-sale').val(val);
                //-----------------------------------------------
                val = 1 / pdata2.usdcb;
				$('#rub-usd').val(val);

				val = pdata2.usdcb;
				$('#usd-rub').val(val);

                pdata2.eurcb = pdata2.eurcb.replace(',','.');
                val = 1 / pdata2.eurcb;
				$('#rub-eur').val(val);

				val = pdata2.eurcb;
				$('#eur-rub').val(val);

                pdata2.nokcb = pdata2.nokcb.replace(',','.');
				val = 10/pdata2.nokcb;
				$('#rub-nok').val(val);

				val = pdata2.nokcb/10;
				$('#nok-rub').val(val); 
                //----------------------------------------
                val1 = $('#usd-rub').val();
				val2 = $('#eur-rub').val();
				val = val1 / val2;
                $('#usd-eur').val(val);

				val1 = $('#eur-rub').val();
				val2 = $('#usd-rub').val();
				val = val1 / val2;
                $('#eur-usd').val(val);

				val1 = $('#usd-rub').val();
				val2 = $('#nok-rub').val();
				val = val1 / val2;
                $('#usd-nok').val(val);

				val1 = $('#nok-rub').val();
				val2 = $('#usd-rub').val();
				val = val1 / val2;
                $('#nok-usd').val(val);

				val1 = $('#eur-rub').val();
				val2 = $('#nok-rub').val();
				val = val1 / val2;
                $('#eur-nok').val(val);

				val1 = $('#nok-rub').val();
				val2 = $('#eur-rub').val();
				val = val1 / val2;
                $('#nok-eur').val(val);   
			 }//if
        }//for
	}
	function change1(){  
		if(sale_bay == 1) suf = '-bay';
		if(sale_bay == 2) suf = '-sale';
		if(select == 'right') suf = '';
		vlt1 = $('.converter342-size').text();
		vlt1 = vlt1.toLowerCase();
		vlt2 = $('.converter342-size1').text();
		vlt2 = vlt2.toLowerCase();
		
		curs = $('#'+vlt1+'-'+vlt2+suf).val();
		curs = curs.replace(',','.');
		if(curs == 0){
			$('.converter342-curs').val(1);
			$('.converter342-curs1').val(0);
			return false;
		}
		
        chang = $('.converter342-curs').val();
		chang = chang.replace(',','.');
		result = chang * curs;
		result = result.toFixed(2);
		result = result.replace('.',',');
		$('.converter342-curs1').val(result);
	}
//change1();	
	function change2(){  
		if(sale_bay == 1) suf = '-bay';
		if(sale_bay == 2) suf = '-sale';
		if(select == 'right') suf = '';
		vlt1 = $('.converter342-size').text();
		vlt1 = vlt1.toLowerCase();
		vlt2 = $('.converter342-size1').text();
		vlt2 = vlt2.toLowerCase();
       
		curs = $('#'+vlt1+'-'+vlt2+suf).val();
		curs = curs.replace(',','.');
		if(curs == 0){
			$('.converter342-curs').val(1);
			$('.converter342-curs1').val(0);
			return false;
		}	
		
        chang = $('.converter342-curs1').val();
		chang = chang.replace(',','.');
		result = chang / curs;
		result = result.toFixed(2);
		result = result.replace('.',',');
		$('.converter342-curs').val(result);
	}
	$('.converter342-curs').keyup(function(){
	    value = $(this).val();
		value = value.replace('.',',');
		if(value.search(',') != -1){
			fix = value.split(',');
			fix[1] = fix[1].substring(0,2);
			value = fix[0]+','+fix[1];
		}
		$(this).val(value);
        change1();
	});
	$('.converter342-curs1').keyup(function(){ 
	    value = $(this).val();
		value = value.replace('.',',');
		if(value.search(',') != -1){
			fix = value.split(',');
			fix[1] = fix[1].substring(0,2);
			value = fix[0]+','+fix[1];
		}
		$(this).val(value);
        change2();
	});
//------- начальная загрузка
	
	url = window.location.protocol+'//'+window.location.hostname+'/converter/index';
	
	$('#converter342-refresh').empty();
	$('#converter342-refresh').append('<img src="/images/converter/loader.gif">');
	
	path = $('#converter342-path-cb').val(); 
	$.post(url,{path:path},function(res){ 
		alert(res);
        $('#converter342-refresh').empty(); 
	    $('#converter342-refresh').append('<img src="/images/converter/refresh.png">');
		pdata = JSON.parse(res); 
		
		$('#converter342-label1').append(pdata.banks[0]);
		$('#converter342-hbank').val(pdata.banks[0]);//hidden
		str = '';
		setData(pdata, $('#converter342-label1').text());
		for(var i in pdata.banks){
			 str += '<div id="ar-banks'+i+'">'+pdata.banks[i]+'</div>';
        }
		$('#aconverter342-l').append(str);
		//$('#converter342-td4 img').css('opacity', 0.2);
		//$('#converter342-td4 #converter342-label3').css('color', '#ccc');
		change1();
    });
	
//------- refresh
	$('#converter342-refresh').click(function(){
		window.location.reload();
	});
//------- выбор валюты
    function setColor(){
		$('.converter342-size').text();
		if($('.converter342-size').text() == 'RUB'){
            $('#converter342-rub').css('background','#42BA41');
			$('#converter342-rub').css('color','white');
		}
		if($('.converter342-size').text() == 'USD'){
			$('#converter342-usd').css('background','#42BA41');
			$('#converter342-usd').css('color','white');
		}
		if($('.converter342-size').text() == 'EUR'){
			$('#converter342-eur').css('background','#42BA41');
			$('#converter342-eur').css('color','white');
		}
		if($('.converter342-size').text() == 'NOK'){
			$('#converter342-nok').css('background','#42BA41');
			$('#converter342-nok').css('color','white');
		}
	}
	function setColor1(){
		$('.converter342-size1').text();
		if($('.converter342-size1').text() == 'RUB'){
            $('#converter342-rub-1').css('background','#42BA41');
			$('#converter342-rub-1').css('color','white');
		}
		if($('.converter342-size1').text() == 'USD'){
			$('#converter342-usd-1').css('background','#42BA41');
			$('#converter342-usd-1').css('color','white');
		}
		if($('.converter342-size1').text() == 'EUR'){
			$('#converter342-eur-1').css('background','#42BA41');
			$('#converter342-eur-1').css('color','white');
		}
		if($('.converter342-size1').text() == 'NOK'){
			$('#converter342-nok-1').css('background','#42BA41');
			$('#converter342-nok-1').css('color','white');
		}
	}
    $('#converter342-select').click(function(){
		$('#converter342-valute div').css('background','#EAEAEA');
		$('#converter342-valute div').css('color','black');
		setColor();
		$('#converter342-valute').css('display','block');
	});
	$('#converter342-select1').click(function(){
		$('#converter342-valute1 div').css('background','#EAEAEA');
		$('#converter342-valute1 div').css('color','black');
		setColor1();
		$('#converter342-valute1').css('display','block');
	});
	$('#converter342-valute div').mouseover(function(){
		$('#converter342-valute div').css('background','#EAEAEA');
		$('#converter342-valute div').css('color','black');
		$(this).css('background','#ddd');
		setColor();
	});
	$('#converter342-valute1 div').mouseover(function(){
		$('#converter342-valute1 div').css('background','#EAEAEA');
		$('#converter342-valute1 div').css('color','black');
		$(this).css('background','#ddd');
		setColor1();
	});
//переключение валют
	$('#converter342-valute div').click(function(){
		ar_valute = $(this).attr('id').split('-');
		valute = ar_valute[1].toUpperCase();//выбранная валюта								
        valute1 = $('.converter342-size').text();//верхняя валюта
		valute2 = $('.converter342-size1').text();//нижняя валюта		
		if(valute == 'NOK')
			$('.converter342-size').css('padding-right','0');
		else
            $('.converter342-size').css('padding-right','2px');
		
		$('.converter342-size').empty();
		$('.converter342-size').append(valute);
		avalute = valute.toLowerCase();
		flag = '<img src="/images/converter/'+avalute+'.png" height="24" width="24"/>';
		$('#flag-v').empty();
		$('#flag-v').append(flag);
		$('#converter342-valute').css('display','none');
		if(valute == valute2){
			$('.converter342-size1').empty();
			$('.converter342-size1').append(valute1);
			avalute1 = valute1.toLowerCase(); 
			flag1 = '<img src="/images/converter/'+avalute1+'.png" height="24" width="24"/>';
		    $('#flag-v1').empty();
		    $('#flag-v1').append(flag1);
		}
		change1();
	});
	$('#converter342-valute1 div').click(function(){
		ar_valute = $(this).attr('id').split('-');
		valute = ar_valute[1].toUpperCase();//выбранная валюта
		
        valute1 = $('.converter342-size').text();//верхняя валюта
		valute2 = $('.converter342-size1').text();//нижняя валюта

		if(valute == 'NOK')
			$('.converter342-size1').css('padding-right','0');
		else
            $('.converter342-size1').css('padding-right','2px');
		
		$('.converter342-size1').empty();
		$('.converter342-size1').append(valute);
		avalute = valute.toLowerCase();
		flag = '<img src="/images/converter/'+avalute+'.png" height="24" width="24"/>';
		$('#flag-v1').empty();
		$('#flag-v1').append(flag);
		$('#converter342-valute1').css('display','none');
		if(valute == valute1){
			$('.converter342-size').empty();
			$('.converter342-size').append(valute2);
			avalute2 = valute2.toLowerCase();
			flag1 = '<img src="/images/converter/'+avalute2+'.png" height="24" width="24"/>';
		    $('#flag-v').empty();
		    $('#flag-v').append(flag1);
		}
		change1();
	});

//------- выбор банка
	$('#converter342-label1').click(function() {
		if(select == 'right')return false;
		$('#converter342-banks').css('display', 'block');
		//-------------------------------------------------
		al=$('#aconverter342-l').height();//+10
		am=$('#aconverter342-m').height();
		ar=$('#aconverter342-r').height();
		ar1=$('#aconverter342-r1').height();
		ass1=al-am;//text
		ass2=ar1-ar;
		var aflag;
		$('#aconverter342-r').mousedown(function(){
			aflag = 1;
			return false;
		});

		$('body').mouseup(function(){
			aflag = 0;
		});

		$('#aconverter342-m').mousemove(function(e){
			var apos = $(this).offset();
			var aelem_top = apos.top;
			var ay = e.pageY - aelem_top;
			ay=ay-10;
			if(ay<2)ay=0;
			if(ay>164)ay=ass2;//высота блока #am - высота ползунка #r -2
			if(aflag==1 && 0 <= ay && ass2 >= ay){
				$('#l span').css('background','white');
				$('#aconverter342-r').css('top', ay+'px');
				ayy='-'+ass1/ass2*ay+'px';
				$('#aconverter342-l').css('margin-top', ayy);
				$('#b-position').html(ay+' '+ayy);
			}
		});
	});

	$("#aconverter342-m").on("mouseover", "#aconverter342-l div", function(){
		$('#aconverter342-l div').css('background','#EAEAEA');
		$('#aconverter342-l div').css('color','black');
        $(this).css('color','white');
		$(this).css('background-color','#42BA41');
    });
	$("#aconverter342-m").on("click", "#aconverter342-l div", function(){

	    $('#converter-valute-input').val('');
		$('#aconverter342-l div').css('display','block');

        $('#converter342-banks').css('display', 'none');
		$('#converter342-label1').empty();
		bank = $(this).text();
		$('#converter342-label1').attr('title', bank);
		str = bank.substr(0, 18);
		$('#converter342-label1').append(str);
	
		setData(pdata, $(this).text());
		change1();
    });	
//------- переключатель покупка/продажа
	$('#converter342-date1').click(function(){
		if($(this).text() == 'покупка'){
			sale_bay = 2;
			$(this).empty();
		    $(this).append('продажа');
		}else{
            sale_bay = 1;
			$(this).empty();
		    $(this).append('покупка');
		}
		
		change1();
    });
//------- close
	$('#converter342-close').click(function(){
		$('.converter342-curs').val('');
	});
	$('#converter342-close1').click(function(){
		$('.converter342-curs1').val('');
	});
//------- стрелки
	$('#converter342-right').click(function(){
		$('#converter342-date1').empty();
		select = 'right';
		$(this).css('background', 'url("/images/converter/right1.png")no-repeat');
		$('#converter342-left').css('background', 'url("/images/converter/left1.png")no-repeat');
		
		$('#converter342-td4 img').css('opacity', '1.0');
		$('#converter342-td4 #converter342-label3').css('color', '#42BA41');
		
		$('#converter342-td2 img').css('opacity', '0.2');
		$('#converter342-td2 #converter342-label1').css('color', '#ccc');
		
		change1();
	});

	$('#converter342-left').click(function(){
		if(sale_bay == 1) lab = 'покупка';
		if(sale_bay == 2) lab = 'продажа';
		$('#converter342-date1').empty();
		$('#converter342-date1').append(lab);
		select = 'left';
		$(this).css('background', 'url("/images/converter/left.png")no-repeat');
		$('#converter342-right').css('background', 'url("/images/converter/right.png")no-repeat');
		
		$('#converter342-td4 img').css('opacity', '0.2');
		$('#converter342-td4 #converter342-label3').css('color', '#ccc');
		
		$('#converter342-td2 img').css('opacity', '1.0');
		$('#converter342-td2 #converter342-label1').css('color', '#42BA41');
		
		change1();
	});

//---------------------------------------------------++++++++++++++++++++++++++++++
	bal=$('td #converter342-l').height();//+10
	bam=$('td #converter342-m').height();
	bar=$('td #converter342-r').height();
	bar1=$('td #converter342-r1').height();
	bass1=bal-bam;//text
	bass2=bar1-bar;

	if(bass1< 0)
        $('td #converter342-r1').css('display','none');
	else
        $('td #converter342-r1').css('display','block');

	var aflag;
	$('td #converter342-r').mousedown(function(){
		aflag = 1;
		return false;
	});

	$('body').mouseup(function(){
		aflag = 0;
	});

	$('td #converter342-m').mousemove(function(e){
		var apos = $(this).offset();
		var aelem_top = apos.top;
		var ay = e.pageY - aelem_top;
		ay=ay-10;
		if(ay<2)ay=0;
		if(ay>55)ay=bass2;//высота блока #am - высота ползунка #r -2
		if(aflag==1 && 0 <= ay && bass2 >= ay){
			$('#l span').css('background','white');
			$('#converter342-r').css('top', ay+'px');
			ayy='-'+bass1/bass2*ay+'px';
			$('#converter342-l').css('margin-top', ayy);
			$('#a-position').html(ay+' '+ayy);
		}
	});
//---------------------------------------------------++++++++++++++++++++++++++++++++++++
    
    var $date_field = $('#converter342-date');
	
    var valute = $('#chartm-form-input').val();
	var path = $('#chartm-form-path1').val();
	$.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: '&#x3c;Пред',
        nextText: 'След&#x3e;',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август',
			'Сентябрь','Октябрь','Ноябрь','Декабрь'],
		monthNamesShort: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август',
			'Сентябрь','Октябрь','Ноябрь','Декабрь'],
        //monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя',
			//'Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: true,
        yearSuffix: ''
	};
    $.datepicker.setDefaults($.datepicker.regional['ru']);

	   
	$('#converter-valute-tr1').mouseover(function() {
        $('#converter-valute-tr2').css('display', 'block');
	});
	$('#converter-valute-tr2').mouseover(function() {
        $('#converter-valute-tr2').css('display', 'block');
	});
	$('#converter-valute-tr1').mouseout(function() {
        $('#converter-valute-tr2').css('display', 'none');
	});
//-------------------------------------------------------------------------------
	$('#converter-valute-div2').click(function() {
		 var str = '<input type="text" id="converter-valute-input" value="">';
		 $('#converter-valute-banks').css('display', 'block');
		 for(var i in res[0]){
			str += '<div id="ar-banks'+i+'">'+banks[i]+'</div>';
         }
		 $('#converter-valute-banks').append(str);
	});
	
	$("#converter-valute").on("mouseover", "#converter-valute-banks div", function(event){
        $(this).css('color','white');
		$(this).css('background-color','green');
    });
	$("#converter-valute").on("mouseout", "#converter-valute-banks div", function(event){
        $(this).css('color','black');
		$(this).css('background-color','silver');
    });
	$("#converter342-banks").on("keyup", "#converter-valute-input", function(event){

	   len = $(this).val().length; 
	   for(var i in pdata.banks){
		  if($(this).val().toLowerCase() != pdata.banks[i].substring(0, len).toLowerCase()){
			  $('#ar-banks'+i).css('display','none');
		  }else{
			   $('#ar-banks'+i).css('display','block');
		  }
       }
    });
//------- выбор даты календарь
	$('#converter342-date').click(function() { 
		$('#datepicker').css('display', 'block');
		maxday = $('#converter342-maxday').val();
		$(function() {
			$("#datepicker").datepicker({
			    changeMonth: true,
                changeYear: true,
				minDate: "-"+maxday,
                maxDate: "+0",
				onSelect: function(value, date) {
					val = value.split('.');
					date = val[2]+'-'+val[1]+'-'+val[0];
					$('converter342-today').val(value);
                    $('#converter342-date').empty();
					$('#converter342-date').append(value);
					$( "#datepicker" ).datepicker( "destroy" );
					//url = burl+'/handler.php';
					url = window.location.protocol+'//'+window.location.hostname+'/converter/index';
					
					$('#converter342-refresh').empty();
	                $('#converter342-refresh').append('<img src="/images/converter/loader.gif">');
					//path = $('#converter342-path-cb').val();
					$.post(url,{date: date},function(res){
					    $('#converter342-refresh').empty();
	                    $('#converter342-refresh').append('<img src="/images/converter/refresh.png">');
						$('#converter342-refresh').empty();
						$('#converter342-refresh').append('<img src="/images/converter/refresh.png">');
						pdata = JSON.parse(res);
						//$('#converter342-hbank').val(pdata.banks[0]);
						for(var i in pdata.banks){
							if(pdata.banks[i] == $('#converter342-hbank').val()){ 
								$('#converter342-label1').empty();
								bank = $('#converter342-hbank').val();
								$('#converter342-label1').attr('title', bank);
								str = bank.substr(0, 18);
								$('#converter342-label1').append(str);
								$('#converter342-hbank').val(pdata.banks[i]);
							}	 
						}
						setData(pdata, $('#converter342-hbank').val());
						change1();
					});

				} 
			});
		});
	});
	
});

/*! jQuery UI - v1.11.4 - 2015-08-02
* http://jqueryui.com
* Includes: core.js, datepicker.js
* Copyright 2015 jQuery Foundation and other contributors; Licensed MIT */

(function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e(jQuery)})(function(e){function t(t,a){var s,n,r,o=t.nodeName.toLowerCase();return"area"===o?(s=t.parentNode,n=s.name,t.href&&n&&"map"===s.nodeName.toLowerCase()?(r=e("img[usemap='#"+n+"']")[0],!!r&&i(r)):!1):(/^(input|select|textarea|button|object)$/.test(o)?!t.disabled:"a"===o?t.href||a:a)&&i(t)}function i(t){return e.expr.filters.visible(t)&&!e(t).parents().addBack().filter(function(){return"hidden"===e.css(this,"visibility")}).length}function a(e){for(var t,i;e.length&&e[0]!==document;){if(t=e.css("position"),("absolute"===t||"relative"===t||"fixed"===t)&&(i=parseInt(e.css("zIndex"),10),!isNaN(i)&&0!==i))return i;e=e.parent()}return 0}function s(){this._curInst=null,this._keyEvent=!1,this._disabledInputs=[],this._datepickerShowing=!1,this._inDialog=!1,this._mainDivId="ui-datepicker-div",this._inlineClass="ui-datepicker-inline",this._appendClass="ui-datepicker-append",this._triggerClass="ui-datepicker-trigger",this._dialogClass="ui-datepicker-dialog",this._disableClass="ui-datepicker-disabled",this._unselectableClass="ui-datepicker-unselectable",this._currentClass="ui-datepicker-current-day",this._dayOverClass="ui-datepicker-days-cell-over",this.regional=[],this.regional[""]={closeText:"Done",prevText:"Prev",nextText:"Next",currentText:"Today",monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],monthNamesShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],dayNames:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],dayNamesShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],dayNamesMin:["Su","Mo","Tu","We","Th","Fr","Sa"],weekHeader:"Wk",dateFormat:"mm/dd/yy",firstDay:0,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""},this._defaults={showOn:"focus",showAnim:"fadeIn",showOptions:{},defaultDate:null,appendText:"",buttonText:"...",buttonImage:"",buttonImageOnly:!1,hideIfNoPrevNext:!1,navigationAsDateFormat:!1,gotoCurrent:!1,changeMonth:!1,changeYear:!1,yearRange:"c-10:c+10",showOtherMonths:!1,selectOtherMonths:!1,showWeek:!1,calculateWeek:this.iso8601Week,shortYearCutoff:"+10",minDate:null,maxDate:null,duration:"fast",beforeShowDay:null,beforeShow:null,onSelect:null,onChangeMonthYear:null,onClose:null,numberOfMonths:1,showCurrentAtPos:0,stepMonths:1,stepBigMonths:12,altField:"",altFormat:"",constrainInput:!0,showButtonPanel:!1,autoSize:!1,disabled:!1},e.extend(this._defaults,this.regional[""]),this.regional.en=e.extend(!0,{},this.regional[""]),this.regional["en-US"]=e.extend(!0,{},this.regional.en),this.dpDiv=n(e("<div id='"+this._mainDivId+"' class='ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>"))}function n(t){var i="button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";return t.delegate(i,"mouseout",function(){e(this).removeClass("ui-state-hover"),-1!==this.className.indexOf("ui-datepicker-prev")&&e(this).removeClass("ui-datepicker-prev-hover"),-1!==this.className.indexOf("ui-datepicker-next")&&e(this).removeClass("ui-datepicker-next-hover")}).delegate(i,"mouseover",r)}function r(){e.datepicker._isDisabledDatepicker(h.inline?h.dpDiv.parent()[0]:h.input[0])||(e(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"),e(this).addClass("ui-state-hover"),-1!==this.className.indexOf("ui-datepicker-prev")&&e(this).addClass("ui-datepicker-prev-hover"),-1!==this.className.indexOf("ui-datepicker-next")&&e(this).addClass("ui-datepicker-next-hover"))}function o(t,i){e.extend(t,i);for(var a in i)null==i[a]&&(t[a]=i[a]);return t}e.ui=e.ui||{},e.extend(e.ui,{version:"1.11.4",keyCode:{BACKSPACE:8,COMMA:188,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,LEFT:37,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SPACE:32,TAB:9,UP:38}}),e.fn.extend({scrollParent:function(t){var i=this.css("position"),a="absolute"===i,s=t?/(auto|scroll|hidden)/:/(auto|scroll)/,n=this.parents().filter(function(){var t=e(this);return a&&"static"===t.css("position")?!1:s.test(t.css("overflow")+t.css("overflow-y")+t.css("overflow-x"))}).eq(0);return"fixed"!==i&&n.length?n:e(this[0].ownerDocument||document)},uniqueId:function(){var e=0;return function(){return this.each(function(){this.id||(this.id="ui-id-"+ ++e)})}}(),removeUniqueId:function(){return this.each(function(){/^ui-id-\d+$/.test(this.id)&&e(this).removeAttr("id")})}}),e.extend(e.expr[":"],{data:e.expr.createPseudo?e.expr.createPseudo(function(t){return function(i){return!!e.data(i,t)}}):function(t,i,a){return!!e.data(t,a[3])},focusable:function(i){return t(i,!isNaN(e.attr(i,"tabindex")))},tabbable:function(i){var a=e.attr(i,"tabindex"),s=isNaN(a);return(s||a>=0)&&t(i,!s)}}),e("<a>").outerWidth(1).jquery||e.each(["Width","Height"],function(t,i){function a(t,i,a,n){return e.each(s,function(){i-=parseFloat(e.css(t,"padding"+this))||0,a&&(i-=parseFloat(e.css(t,"border"+this+"Width"))||0),n&&(i-=parseFloat(e.css(t,"margin"+this))||0)}),i}var s="Width"===i?["Left","Right"]:["Top","Bottom"],n=i.toLowerCase(),r={innerWidth:e.fn.innerWidth,innerHeight:e.fn.innerHeight,outerWidth:e.fn.outerWidth,outerHeight:e.fn.outerHeight};e.fn["inner"+i]=function(t){return void 0===t?r["inner"+i].call(this):this.each(function(){e(this).css(n,a(this,t)+"px")})},e.fn["outer"+i]=function(t,s){return"number"!=typeof t?r["outer"+i].call(this,t):this.each(function(){e(this).css(n,a(this,t,!0,s)+"px")})}}),e.fn.addBack||(e.fn.addBack=function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}),e("<a>").data("a-b","a").removeData("a-b").data("a-b")&&(e.fn.removeData=function(t){return function(i){return arguments.length?t.call(this,e.camelCase(i)):t.call(this)}}(e.fn.removeData)),e.ui.ie=!!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()),e.fn.extend({focus:function(t){return function(i,a){return"number"==typeof i?this.each(function(){var t=this;setTimeout(function(){e(t).focus(),a&&a.call(t)},i)}):t.apply(this,arguments)}}(e.fn.focus),disableSelection:function(){var e="onselectstart"in document.createElement("div")?"selectstart":"mousedown";return function(){return this.bind(e+".ui-disableSelection",function(e){e.preventDefault()})}}(),enableSelection:function(){return this.unbind(".ui-disableSelection")},zIndex:function(t){if(void 0!==t)return this.css("zIndex",t);if(this.length)for(var i,a,s=e(this[0]);s.length&&s[0]!==document;){if(i=s.css("position"),("absolute"===i||"relative"===i||"fixed"===i)&&(a=parseInt(s.css("zIndex"),10),!isNaN(a)&&0!==a))return a;s=s.parent()}return 0}}),e.ui.plugin={add:function(t,i,a){var s,n=e.ui[t].prototype;for(s in a)n.plugins[s]=n.plugins[s]||[],n.plugins[s].push([i,a[s]])},call:function(e,t,i,a){var s,n=e.plugins[t];if(n&&(a||e.element[0].parentNode&&11!==e.element[0].parentNode.nodeType))for(s=0;n.length>s;s++)e.options[n[s][0]]&&n[s][1].apply(e.element,i)}},e.extend(e.ui,{datepicker:{version:"1.11.4"}});var h;e.extend(s.prototype,{markerClassName:"hasDatepicker",maxRows:4,_widgetDatepicker:function(){return this.dpDiv},setDefaults:function(e){return o(this._defaults,e||{}),this},_attachDatepicker:function(t,i){var a,s,n;a=t.nodeName.toLowerCase(),s="div"===a||"span"===a,t.id||(this.uuid+=1,t.id="dp"+this.uuid),n=this._newInst(e(t),s),n.settings=e.extend({},i||{}),"input"===a?this._connectDatepicker(t,n):s&&this._inlineDatepicker(t,n)},_newInst:function(t,i){var a=t[0].id.replace(/([^A-Za-z0-9_\-])/g,"\\\\$1");return{id:a,input:t,selectedDay:0,selectedMonth:0,selectedYear:0,drawMonth:0,drawYear:0,inline:i,dpDiv:i?n(e("<div class='"+this._inlineClass+" ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")):this.dpDiv}},_connectDatepicker:function(t,i){var a=e(t);i.append=e([]),i.trigger=e([]),a.hasClass(this.markerClassName)||(this._attachments(a,i),a.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp),this._autoSize(i),e.data(t,"datepicker",i),i.settings.disabled&&this._disableDatepicker(t))},_attachments:function(t,i){var a,s,n,r=this._get(i,"appendText"),o=this._get(i,"isRTL");i.append&&i.append.remove(),r&&(i.append=e("<span class='"+this._appendClass+"'>"+r+"</span>"),t[o?"before":"after"](i.append)),t.unbind("focus",this._showDatepicker),i.trigger&&i.trigger.remove(),a=this._get(i,"showOn"),("focus"===a||"both"===a)&&t.focus(this._showDatepicker),("button"===a||"both"===a)&&(s=this._get(i,"buttonText"),n=this._get(i,"buttonImage"),i.trigger=e(this._get(i,"buttonImageOnly")?e("<img/>").addClass(this._triggerClass).attr({src:n,alt:s,title:s}):e("<button type='button'></button>").addClass(this._triggerClass).html(n?e("<img/>").attr({src:n,alt:s,title:s}):s)),t[o?"before":"after"](i.trigger),i.trigger.click(function(){return e.datepicker._datepickerShowing&&e.datepicker._lastInput===t[0]?e.datepicker._hideDatepicker():e.datepicker._datepickerShowing&&e.datepicker._lastInput!==t[0]?(e.datepicker._hideDatepicker(),e.datepicker._showDatepicker(t[0])):e.datepicker._showDatepicker(t[0]),!1}))},_autoSize:function(e){if(this._get(e,"autoSize")&&!e.inline){var t,i,a,s,n=new Date(2009,11,20),r=this._get(e,"dateFormat");r.match(/[DM]/)&&(t=function(e){for(i=0,a=0,s=0;e.length>s;s++)e[s].length>i&&(i=e[s].length,a=s);return a},n.setMonth(t(this._get(e,r.match(/MM/)?"monthNames":"monthNamesShort"))),n.setDate(t(this._get(e,r.match(/DD/)?"dayNames":"dayNamesShort"))+20-n.getDay())),e.input.attr("size",this._formatDate(e,n).length)}},_inlineDatepicker:function(t,i){var a=e(t);a.hasClass(this.markerClassName)||(a.addClass(this.markerClassName).append(i.dpDiv),e.data(t,"datepicker",i),this._setDate(i,this._getDefaultDate(i),!0),this._updateDatepicker(i),this._updateAlternate(i),i.settings.disabled&&this._disableDatepicker(t),i.dpDiv.css("display","block"))},_dialogDatepicker:function(t,i,a,s,n){var r,h,l,u,d,c=this._dialogInst;return c||(this.uuid+=1,r="dp"+this.uuid,this._dialogInput=e("<input type='text' id='"+r+"' style='position: absolute; top: -100px; width: 0px;'/>"),this._dialogInput.keydown(this._doKeyDown),e("body").append(this._dialogInput),c=this._dialogInst=this._newInst(this._dialogInput,!1),c.settings={},e.data(this._dialogInput[0],"datepicker",c)),o(c.settings,s||{}),i=i&&i.constructor===Date?this._formatDate(c,i):i,this._dialogInput.val(i),this._pos=n?n.length?n:[n.pageX,n.pageY]:null,this._pos||(h=document.documentElement.clientWidth,l=document.documentElement.clientHeight,u=document.documentElement.scrollLeft||document.body.scrollLeft,d=document.documentElement.scrollTop||document.body.scrollTop,this._pos=[h/2-100+u,l/2-150+d]),this._dialogInput.css("left",this._pos[0]+20+"px").css("top",this._pos[1]+"px"),c.settings.onSelect=a,this._inDialog=!0,this.dpDiv.addClass(this._dialogClass),this._showDatepicker(this._dialogInput[0]),e.blockUI&&e.blockUI(this.dpDiv),e.data(this._dialogInput[0],"datepicker",c),this},_destroyDatepicker:function(t){var i,a=e(t),s=e.data(t,"datepicker");a.hasClass(this.markerClassName)&&(i=t.nodeName.toLowerCase(),e.removeData(t,"datepicker"),"input"===i?(s.append.remove(),s.trigger.remove(),a.removeClass(this.markerClassName).unbind("focus",this._showDatepicker).unbind("keydown",this._doKeyDown).unbind("keypress",this._doKeyPress).unbind("keyup",this._doKeyUp)):("div"===i||"span"===i)&&a.removeClass(this.markerClassName).empty(),h===s&&(h=null))},_enableDatepicker:function(t){var i,a,s=e(t),n=e.data(t,"datepicker");s.hasClass(this.markerClassName)&&(i=t.nodeName.toLowerCase(),"input"===i?(t.disabled=!1,n.trigger.filter("button").each(function(){this.disabled=!1}).end().filter("img").css({opacity:"1.0",cursor:""})):("div"===i||"span"===i)&&(a=s.children("."+this._inlineClass),a.children().removeClass("ui-state-disabled"),a.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",!1)),this._disabledInputs=e.map(this._disabledInputs,function(e){return e===t?null:e}))},_disableDatepicker:function(t){var i,a,s=e(t),n=e.data(t,"datepicker");s.hasClass(this.markerClassName)&&(i=t.nodeName.toLowerCase(),"input"===i?(t.disabled=!0,n.trigger.filter("button").each(function(){this.disabled=!0}).end().filter("img").css({opacity:"0.5",cursor:"default"})):("div"===i||"span"===i)&&(a=s.children("."+this._inlineClass),a.children().addClass("ui-state-disabled"),a.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",!0)),this._disabledInputs=e.map(this._disabledInputs,function(e){return e===t?null:e}),this._disabledInputs[this._disabledInputs.length]=t)},_isDisabledDatepicker:function(e){if(!e)return!1;for(var t=0;this._disabledInputs.length>t;t++)if(this._disabledInputs[t]===e)return!0;return!1},_getInst:function(t){try{return e.data(t,"datepicker")}catch(i){throw"Missing instance data for this datepicker"}},_optionDatepicker:function(t,i,a){var s,n,r,h,l=this._getInst(t);return 2===arguments.length&&"string"==typeof i?"defaults"===i?e.extend({},e.datepicker._defaults):l?"all"===i?e.extend({},l.settings):this._get(l,i):null:(s=i||{},"string"==typeof i&&(s={},s[i]=a),l&&(this._curInst===l&&this._hideDatepicker(),n=this._getDateDatepicker(t,!0),r=this._getMinMaxDate(l,"min"),h=this._getMinMaxDate(l,"max"),o(l.settings,s),null!==r&&void 0!==s.dateFormat&&void 0===s.minDate&&(l.settings.minDate=this._formatDate(l,r)),null!==h&&void 0!==s.dateFormat&&void 0===s.maxDate&&(l.settings.maxDate=this._formatDate(l,h)),"disabled"in s&&(s.disabled?this._disableDatepicker(t):this._enableDatepicker(t)),this._attachments(e(t),l),this._autoSize(l),this._setDate(l,n),this._updateAlternate(l),this._updateDatepicker(l)),void 0)},_changeDatepicker:function(e,t,i){this._optionDatepicker(e,t,i)},_refreshDatepicker:function(e){var t=this._getInst(e);t&&this._updateDatepicker(t)},_setDateDatepicker:function(e,t){var i=this._getInst(e);i&&(this._setDate(i,t),this._updateDatepicker(i),this._updateAlternate(i))},_getDateDatepicker:function(e,t){var i=this._getInst(e);return i&&!i.inline&&this._setDateFromField(i,t),i?this._getDate(i):null},_doKeyDown:function(t){var i,a,s,n=e.datepicker._getInst(t.target),r=!0,o=n.dpDiv.is(".ui-datepicker-rtl");if(n._keyEvent=!0,e.datepicker._datepickerShowing)switch(t.keyCode){case 9:e.datepicker._hideDatepicker(),r=!1;break;case 13:return s=e("td."+e.datepicker._dayOverClass+":not(."+e.datepicker._currentClass+")",n.dpDiv),s[0]&&e.datepicker._selectDay(t.target,n.selectedMonth,n.selectedYear,s[0]),i=e.datepicker._get(n,"onSelect"),i?(a=e.datepicker._formatDate(n),i.apply(n.input?n.input[0]:null,[a,n])):e.datepicker._hideDatepicker(),!1;case 27:e.datepicker._hideDatepicker();break;case 33:e.datepicker._adjustDate(t.target,t.ctrlKey?-e.datepicker._get(n,"stepBigMonths"):-e.datepicker._get(n,"stepMonths"),"M");break;case 34:e.datepicker._adjustDate(t.target,t.ctrlKey?+e.datepicker._get(n,"stepBigMonths"):+e.datepicker._get(n,"stepMonths"),"M");break;case 35:(t.ctrlKey||t.metaKey)&&e.datepicker._clearDate(t.target),r=t.ctrlKey||t.metaKey;break;case 36:(t.ctrlKey||t.metaKey)&&e.datepicker._gotoToday(t.target),r=t.ctrlKey||t.metaKey;break;case 37:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,o?1:-1,"D"),r=t.ctrlKey||t.metaKey,t.originalEvent.altKey&&e.datepicker._adjustDate(t.target,t.ctrlKey?-e.datepicker._get(n,"stepBigMonths"):-e.datepicker._get(n,"stepMonths"),"M");break;case 38:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,-7,"D"),r=t.ctrlKey||t.metaKey;break;case 39:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,o?-1:1,"D"),r=t.ctrlKey||t.metaKey,t.originalEvent.altKey&&e.datepicker._adjustDate(t.target,t.ctrlKey?+e.datepicker._get(n,"stepBigMonths"):+e.datepicker._get(n,"stepMonths"),"M");break;case 40:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,7,"D"),r=t.ctrlKey||t.metaKey;break;default:r=!1}else 36===t.keyCode&&t.ctrlKey?e.datepicker._showDatepicker(this):r=!1;r&&(t.preventDefault(),t.stopPropagation())},_doKeyPress:function(t){var i,a,s=e.datepicker._getInst(t.target);return e.datepicker._get(s,"constrainInput")?(i=e.datepicker._possibleChars(e.datepicker._get(s,"dateFormat")),a=String.fromCharCode(null==t.charCode?t.keyCode:t.charCode),t.ctrlKey||t.metaKey||" ">a||!i||i.indexOf(a)>-1):void 0},_doKeyUp:function(t){var i,a=e.datepicker._getInst(t.target);if(a.input.val()!==a.lastVal)try{i=e.datepicker.parseDate(e.datepicker._get(a,"dateFormat"),a.input?a.input.val():null,e.datepicker._getFormatConfig(a)),i&&(e.datepicker._setDateFromField(a),e.datepicker._updateAlternate(a),e.datepicker._updateDatepicker(a))}catch(s){}return!0},_showDatepicker:function(t){if(t=t.target||t,"input"!==t.nodeName.toLowerCase()&&(t=e("input",t.parentNode)[0]),!e.datepicker._isDisabledDatepicker(t)&&e.datepicker._lastInput!==t){var i,s,n,r,h,l,u;i=e.datepicker._getInst(t),e.datepicker._curInst&&e.datepicker._curInst!==i&&(e.datepicker._curInst.dpDiv.stop(!0,!0),i&&e.datepicker._datepickerShowing&&e.datepicker._hideDatepicker(e.datepicker._curInst.input[0])),s=e.datepicker._get(i,"beforeShow"),n=s?s.apply(t,[t,i]):{},n!==!1&&(o(i.settings,n),i.lastVal=null,e.datepicker._lastInput=t,e.datepicker._setDateFromField(i),e.datepicker._inDialog&&(t.value=""),e.datepicker._pos||(e.datepicker._pos=e.datepicker._findPos(t),e.datepicker._pos[1]+=t.offsetHeight),r=!1,e(t).parents().each(function(){return r|="fixed"===e(this).css("position"),!r}),h={left:e.datepicker._pos[0],top:e.datepicker._pos[1]},e.datepicker._pos=null,i.dpDiv.empty(),i.dpDiv.css({position:"absolute",display:"block",top:"-1000px"}),e.datepicker._updateDatepicker(i),h=e.datepicker._checkOffset(i,h,r),i.dpDiv.css({position:e.datepicker._inDialog&&e.blockUI?"static":r?"fixed":"absolute",display:"none",left:h.left+"px",top:h.top+"px"}),i.inline||(l=e.datepicker._get(i,"showAnim"),u=e.datepicker._get(i,"duration"),i.dpDiv.css("z-index",a(e(t))+1),e.datepicker._datepickerShowing=!0,e.effects&&e.effects.effect[l]?i.dpDiv.show(l,e.datepicker._get(i,"showOptions"),u):i.dpDiv[l||"show"](l?u:null),e.datepicker._shouldFocusInput(i)&&i.input.focus(),e.datepicker._curInst=i))}},_updateDatepicker:function(t){this.maxRows=4,h=t,t.dpDiv.empty().append(this._generateHTML(t)),this._attachHandlers(t);var i,a=this._getNumberOfMonths(t),s=a[1],n=17,o=t.dpDiv.find("."+this._dayOverClass+" a");o.length>0&&r.apply(o.get(0)),t.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""),s>1&&t.dpDiv.addClass("ui-datepicker-multi-"+s).css("width",n*s+"em"),t.dpDiv[(1!==a[0]||1!==a[1]?"add":"remove")+"Class"]("ui-datepicker-multi"),t.dpDiv[(this._get(t,"isRTL")?"add":"remove")+"Class"]("ui-datepicker-rtl"),t===e.datepicker._curInst&&e.datepicker._datepickerShowing&&e.datepicker._shouldFocusInput(t)&&t.input.focus(),t.yearshtml&&(i=t.yearshtml,setTimeout(function(){i===t.yearshtml&&t.yearshtml&&t.dpDiv.find("select.ui-datepicker-year:first").replaceWith(t.yearshtml),i=t.yearshtml=null},0))},_shouldFocusInput:function(e){return e.input&&e.input.is(":visible")&&!e.input.is(":disabled")&&!e.input.is(":focus")},_checkOffset:function(t,i,a){var s=t.dpDiv.outerWidth(),n=t.dpDiv.outerHeight(),r=t.input?t.input.outerWidth():0,o=t.input?t.input.outerHeight():0,h=document.documentElement.clientWidth+(a?0:e(document).scrollLeft()),l=document.documentElement.clientHeight+(a?0:e(document).scrollTop());return i.left-=this._get(t,"isRTL")?s-r:0,i.left-=a&&i.left===t.input.offset().left?e(document).scrollLeft():0,i.top-=a&&i.top===t.input.offset().top+o?e(document).scrollTop():0,i.left-=Math.min(i.left,i.left+s>h&&h>s?Math.abs(i.left+s-h):0),i.top-=Math.min(i.top,i.top+n>l&&l>n?Math.abs(n+o):0),i},_findPos:function(t){for(var i,a=this._getInst(t),s=this._get(a,"isRTL");t&&("hidden"===t.type||1!==t.nodeType||e.expr.filters.hidden(t));)t=t[s?"previousSibling":"nextSibling"];return i=e(t).offset(),[i.left,i.top]},_hideDatepicker:function(t){var i,a,s,n,r=this._curInst;!r||t&&r!==e.data(t,"datepicker")||this._datepickerShowing&&(i=this._get(r,"showAnim"),a=this._get(r,"duration"),s=function(){e.datepicker._tidyDialog(r)},e.effects&&(e.effects.effect[i]||e.effects[i])?r.dpDiv.hide(i,e.datepicker._get(r,"showOptions"),a,s):r.dpDiv["slideDown"===i?"slideUp":"fadeIn"===i?"fadeOut":"hide"](i?a:null,s),i||s(),this._datepickerShowing=!1,n=this._get(r,"onClose"),n&&n.apply(r.input?r.input[0]:null,[r.input?r.input.val():"",r]),this._lastInput=null,this._inDialog&&(this._dialogInput.css({position:"absolute",left:"0",top:"-100px"}),e.blockUI&&(e.unblockUI(),e("body").append(this.dpDiv))),this._inDialog=!1)},_tidyDialog:function(e){e.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar")},_checkExternalClick:function(t){if(e.datepicker._curInst){var i=e(t.target),a=e.datepicker._getInst(i[0]);(i[0].id!==e.datepicker._mainDivId&&0===i.parents("#"+e.datepicker._mainDivId).length&&!i.hasClass(e.datepicker.markerClassName)&&!i.closest("."+e.datepicker._triggerClass).length&&e.datepicker._datepickerShowing&&(!e.datepicker._inDialog||!e.blockUI)||i.hasClass(e.datepicker.markerClassName)&&e.datepicker._curInst!==a)&&e.datepicker._hideDatepicker()}},_adjustDate:function(t,i,a){var s=e(t),n=this._getInst(s[0]);this._isDisabledDatepicker(s[0])||(this._adjustInstDate(n,i+("M"===a?this._get(n,"showCurrentAtPos"):0),a),this._updateDatepicker(n))},_gotoToday:function(t){var i,a=e(t),s=this._getInst(a[0]);this._get(s,"gotoCurrent")&&s.currentDay?(s.selectedDay=s.currentDay,s.drawMonth=s.selectedMonth=s.currentMonth,s.drawYear=s.selectedYear=s.currentYear):(i=new Date,s.selectedDay=i.getDate(),s.drawMonth=s.selectedMonth=i.getMonth(),s.drawYear=s.selectedYear=i.getFullYear()),this._notifyChange(s),this._adjustDate(a)},_selectMonthYear:function(t,i,a){var s=e(t),n=this._getInst(s[0]);n["selected"+("M"===a?"Month":"Year")]=n["draw"+("M"===a?"Month":"Year")]=parseInt(i.options[i.selectedIndex].value,10),this._notifyChange(n),this._adjustDate(s)},_selectDay:function(t,i,a,s){var n,r=e(t);e(s).hasClass(this._unselectableClass)||this._isDisabledDatepicker(r[0])||(n=this._getInst(r[0]),n.selectedDay=n.currentDay=e("a",s).html(),n.selectedMonth=n.currentMonth=i,n.selectedYear=n.currentYear=a,this._selectDate(t,this._formatDate(n,n.currentDay,n.currentMonth,n.currentYear)))},_clearDate:function(t){var i=e(t);this._selectDate(i,"")},_selectDate:function(t,i){var a,s=e(t),n=this._getInst(s[0]);i=null!=i?i:this._formatDate(n),n.input&&n.input.val(i),this._updateAlternate(n),a=this._get(n,"onSelect"),a?a.apply(n.input?n.input[0]:null,[i,n]):n.input&&n.input.trigger("change"),n.inline?this._updateDatepicker(n):(this._hideDatepicker(),this._lastInput=n.input[0],"object"!=typeof n.input[0]&&n.input.focus(),this._lastInput=null)},_updateAlternate:function(t){var i,a,s,n=this._get(t,"altField");n&&(i=this._get(t,"altFormat")||this._get(t,"dateFormat"),a=this._getDate(t),s=this.formatDate(i,a,this._getFormatConfig(t)),e(n).each(function(){e(this).val(s)}))},noWeekends:function(e){var t=e.getDay();return[t>0&&6>t,""]},iso8601Week:function(e){var t,i=new Date(e.getTime());return i.setDate(i.getDate()+4-(i.getDay()||7)),t=i.getTime(),i.setMonth(0),i.setDate(1),Math.floor(Math.round((t-i)/864e5)/7)+1},parseDate:function(t,i,a){if(null==t||null==i)throw"Invalid arguments";if(i="object"==typeof i?""+i:i+"",""===i)return null;var s,n,r,o,h=0,l=(a?a.shortYearCutoff:null)||this._defaults.shortYearCutoff,u="string"!=typeof l?l:(new Date).getFullYear()%100+parseInt(l,10),d=(a?a.dayNamesShort:null)||this._defaults.dayNamesShort,c=(a?a.dayNames:null)||this._defaults.dayNames,p=(a?a.monthNamesShort:null)||this._defaults.monthNamesShort,m=(a?a.monthNames:null)||this._defaults.monthNames,f=-1,g=-1,v=-1,y=-1,b=!1,_=function(e){var i=t.length>s+1&&t.charAt(s+1)===e;return i&&s++,i},x=function(e){var t=_(e),a="@"===e?14:"!"===e?20:"y"===e&&t?4:"o"===e?3:2,s="y"===e?a:1,n=RegExp("^\\d{"+s+","+a+"}"),r=i.substring(h).match(n);if(!r)throw"Missing number at position "+h;return h+=r[0].length,parseInt(r[0],10)},k=function(t,a,s){var n=-1,r=e.map(_(t)?s:a,function(e,t){return[[t,e]]}).sort(function(e,t){return-(e[1].length-t[1].length)});if(e.each(r,function(e,t){var a=t[1];return i.substr(h,a.length).toLowerCase()===a.toLowerCase()?(n=t[0],h+=a.length,!1):void 0}),-1!==n)return n+1;throw"Unknown name at position "+h},w=function(){if(i.charAt(h)!==t.charAt(s))throw"Unexpected literal at position "+h;h++};for(s=0;t.length>s;s++)if(b)"'"!==t.charAt(s)||_("'")?w():b=!1;else switch(t.charAt(s)){case"d":v=x("d");break;case"D":k("D",d,c);break;case"o":y=x("o");break;case"m":g=x("m");break;case"M":g=k("M",p,m);break;case"y":f=x("y");break;case"@":o=new Date(x("@")),f=o.getFullYear(),g=o.getMonth()+1,v=o.getDate();break;case"!":o=new Date((x("!")-this._ticksTo1970)/1e4),f=o.getFullYear(),g=o.getMonth()+1,v=o.getDate();break;case"'":_("'")?w():b=!0;break;default:w()}if(i.length>h&&(r=i.substr(h),!/^\s+/.test(r)))throw"Extra/unparsed characters found in date: "+r;if(-1===f?f=(new Date).getFullYear():100>f&&(f+=(new Date).getFullYear()-(new Date).getFullYear()%100+(u>=f?0:-100)),y>-1)for(g=1,v=y;;){if(n=this._getDaysInMonth(f,g-1),n>=v)break;g++,v-=n}if(o=this._daylightSavingAdjust(new Date(f,g-1,v)),o.getFullYear()!==f||o.getMonth()+1!==g||o.getDate()!==v)throw"Invalid date";return o},ATOM:"yy-mm-dd",COOKIE:"D, dd M yy",ISO_8601:"yy-mm-dd",RFC_822:"D, d M y",RFC_850:"DD, dd-M-y",RFC_1036:"D, d M y",RFC_1123:"D, d M yy",RFC_2822:"D, d M yy",RSS:"D, d M y",TICKS:"!",TIMESTAMP:"@",W3C:"yy-mm-dd",_ticksTo1970:1e7*60*60*24*(718685+Math.floor(492.5)-Math.floor(19.7)+Math.floor(4.925)),formatDate:function(e,t,i){if(!t)return"";var a,s=(i?i.dayNamesShort:null)||this._defaults.dayNamesShort,n=(i?i.dayNames:null)||this._defaults.dayNames,r=(i?i.monthNamesShort:null)||this._defaults.monthNamesShort,o=(i?i.monthNames:null)||this._defaults.monthNames,h=function(t){var i=e.length>a+1&&e.charAt(a+1)===t;return i&&a++,i},l=function(e,t,i){var a=""+t;if(h(e))for(;i>a.length;)a="0"+a;return a},u=function(e,t,i,a){return h(e)?a[t]:i[t]},d="",c=!1;if(t)for(a=0;e.length>a;a++)if(c)"'"!==e.charAt(a)||h("'")?d+=e.charAt(a):c=!1;else switch(e.charAt(a)){case"d":d+=l("d",t.getDate(),2);break;case"D":d+=u("D",t.getDay(),s,n);break;case"o":d+=l("o",Math.round((new Date(t.getFullYear(),t.getMonth(),t.getDate()).getTime()-new Date(t.getFullYear(),0,0).getTime())/864e5),3);break;case"m":d+=l("m",t.getMonth()+1,2);break;case"M":d+=u("M",t.getMonth(),r,o);break;case"y":d+=h("y")?t.getFullYear():(10>t.getYear()%100?"0":"")+t.getYear()%100;break;case"@":d+=t.getTime();break;case"!":d+=1e4*t.getTime()+this._ticksTo1970;break;case"'":h("'")?d+="'":c=!0;break;default:d+=e.charAt(a)}return d},_possibleChars:function(e){var t,i="",a=!1,s=function(i){var a=e.length>t+1&&e.charAt(t+1)===i;return a&&t++,a};for(t=0;e.length>t;t++)if(a)"'"!==e.charAt(t)||s("'")?i+=e.charAt(t):a=!1;else switch(e.charAt(t)){case"d":case"m":case"y":case"@":i+="0123456789";break;case"D":case"M":return null;case"'":s("'")?i+="'":a=!0;break;default:i+=e.charAt(t)}return i},_get:function(e,t){return void 0!==e.settings[t]?e.settings[t]:this._defaults[t]},_setDateFromField:function(e,t){if(e.input.val()!==e.lastVal){var i=this._get(e,"dateFormat"),a=e.lastVal=e.input?e.input.val():null,s=this._getDefaultDate(e),n=s,r=this._getFormatConfig(e);try{n=this.parseDate(i,a,r)||s}catch(o){a=t?"":a}e.selectedDay=n.getDate(),e.drawMonth=e.selectedMonth=n.getMonth(),e.drawYear=e.selectedYear=n.getFullYear(),e.currentDay=a?n.getDate():0,e.currentMonth=a?n.getMonth():0,e.currentYear=a?n.getFullYear():0,this._adjustInstDate(e)}},_getDefaultDate:function(e){return this._restrictMinMax(e,this._determineDate(e,this._get(e,"defaultDate"),new Date))},_determineDate:function(t,i,a){var s=function(e){var t=new Date;return t.setDate(t.getDate()+e),t},n=function(i){try{return e.datepicker.parseDate(e.datepicker._get(t,"dateFormat"),i,e.datepicker._getFormatConfig(t))}catch(a){}for(var s=(i.toLowerCase().match(/^c/)?e.datepicker._getDate(t):null)||new Date,n=s.getFullYear(),r=s.getMonth(),o=s.getDate(),h=/([+\-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g,l=h.exec(i);l;){switch(l[2]||"d"){case"d":case"D":o+=parseInt(l[1],10);break;case"w":case"W":o+=7*parseInt(l[1],10);break;case"m":case"M":r+=parseInt(l[1],10),o=Math.min(o,e.datepicker._getDaysInMonth(n,r));break;case"y":case"Y":n+=parseInt(l[1],10),o=Math.min(o,e.datepicker._getDaysInMonth(n,r))}l=h.exec(i)}return new Date(n,r,o)},r=null==i||""===i?a:"string"==typeof i?n(i):"number"==typeof i?isNaN(i)?a:s(i):new Date(i.getTime());return r=r&&"Invalid Date"==""+r?a:r,r&&(r.setHours(0),r.setMinutes(0),r.setSeconds(0),r.setMilliseconds(0)),this._daylightSavingAdjust(r)},_daylightSavingAdjust:function(e){return e?(e.setHours(e.getHours()>12?e.getHours()+2:0),e):null},_setDate:function(e,t,i){var a=!t,s=e.selectedMonth,n=e.selectedYear,r=this._restrictMinMax(e,this._determineDate(e,t,new Date));e.selectedDay=e.currentDay=r.getDate(),e.drawMonth=e.selectedMonth=e.currentMonth=r.getMonth(),e.drawYear=e.selectedYear=e.currentYear=r.getFullYear(),s===e.selectedMonth&&n===e.selectedYear||i||this._notifyChange(e),this._adjustInstDate(e),e.input&&e.input.val(a?"":this._formatDate(e))},_getDate:function(e){var t=!e.currentYear||e.input&&""===e.input.val()?null:this._daylightSavingAdjust(new Date(e.currentYear,e.currentMonth,e.currentDay));return t},_attachHandlers:function(t){var i=this._get(t,"stepMonths"),a="#"+t.id.replace(/\\\\/g,"\\");t.dpDiv.find("[data-handler]").map(function(){var t={prev:function(){e.datepicker._adjustDate(a,-i,"M")},next:function(){e.datepicker._adjustDate(a,+i,"M")},hide:function(){e.datepicker._hideDatepicker()},today:function(){e.datepicker._gotoToday(a)},selectDay:function(){return e.datepicker._selectDay(a,+this.getAttribute("data-month"),+this.getAttribute("data-year"),this),!1},selectMonth:function(){return e.datepicker._selectMonthYear(a,this,"M"),!1},selectYear:function(){return e.datepicker._selectMonthYear(a,this,"Y"),!1}};e(this).bind(this.getAttribute("data-event"),t[this.getAttribute("data-handler")])})},_generateHTML:function(e){var t,i,a,s,n,r,o,h,l,u,d,c,p,m,f,g,v,y,b,_,x,k,w,T,D,S,N,M,C,A,P,F,H,I,z,j,E,L,W,O=new Date,R=this._daylightSavingAdjust(new Date(O.getFullYear(),O.getMonth(),O.getDate())),Y=this._get(e,"isRTL"),J=this._get(e,"showButtonPanel"),B=this._get(e,"hideIfNoPrevNext"),K=this._get(e,"navigationAsDateFormat"),V=this._getNumberOfMonths(e),Q=this._get(e,"showCurrentAtPos"),U=this._get(e,"stepMonths"),q=1!==V[0]||1!==V[1],G=this._daylightSavingAdjust(e.currentDay?new Date(e.currentYear,e.currentMonth,e.currentDay):new Date(9999,9,9)),$=this._getMinMaxDate(e,"min"),X=this._getMinMaxDate(e,"max"),Z=e.drawMonth-Q,et=e.drawYear;if(0>Z&&(Z+=12,et--),X)for(t=this._daylightSavingAdjust(new Date(X.getFullYear(),X.getMonth()-V[0]*V[1]+1,X.getDate())),t=$&&$>t?$:t;this._daylightSavingAdjust(new Date(et,Z,1))>t;)Z--,0>Z&&(Z=11,et--);for(e.drawMonth=Z,e.drawYear=et,i=this._get(e,"prevText"),i=K?this.formatDate(i,this._daylightSavingAdjust(new Date(et,Z-U,1)),this._getFormatConfig(e)):i,a=this._canAdjustMonth(e,-1,et,Z)?"<a class='ui-datepicker-prev ui-corner-all' data-handler='prev' data-event='click' title='"+i+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"e":"w")+"'>"+i+"</span></a>":B?"":"<a class='ui-datepicker-prev ui-corner-all ui-state-disabled' title='"+i+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"e":"w")+"'>"+i+"</span></a>",s=this._get(e,"nextText"),s=K?this.formatDate(s,this._daylightSavingAdjust(new Date(et,Z+U,1)),this._getFormatConfig(e)):s,n=this._canAdjustMonth(e,1,et,Z)?"<a class='ui-datepicker-next ui-corner-all' data-handler='next' data-event='click' title='"+s+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"w":"e")+"'>"+s+"</span></a>":B?"":"<a class='ui-datepicker-next ui-corner-all ui-state-disabled' title='"+s+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"w":"e")+"'>"+s+"</span></a>",r=this._get(e,"currentText"),o=this._get(e,"gotoCurrent")&&e.currentDay?G:R,r=K?this.formatDate(r,o,this._getFormatConfig(e)):r,h=e.inline?"":"<button type='button' class='ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all' data-handler='hide' data-event='click'>"+this._get(e,"closeText")+"</button>",l=J?"<div class='ui-datepicker-buttonpane ui-widget-content'>"+(Y?h:"")+(this._isInRange(e,o)?"<button type='button' class='ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all' data-handler='today' data-event='click'>"+r+"</button>":"")+(Y?"":h)+"</div>":"",u=parseInt(this._get(e,"firstDay"),10),u=isNaN(u)?0:u,d=this._get(e,"showWeek"),c=this._get(e,"dayNames"),p=this._get(e,"dayNamesMin"),m=this._get(e,"monthNames"),f=this._get(e,"monthNamesShort"),g=this._get(e,"beforeShowDay"),v=this._get(e,"showOtherMonths"),y=this._get(e,"selectOtherMonths"),b=this._getDefaultDate(e),_="",k=0;V[0]>k;k++){for(w="",this.maxRows=4,T=0;V[1]>T;T++){if(D=this._daylightSavingAdjust(new Date(et,Z,e.selectedDay)),S=" ui-corner-all",N="",q){if(N+="<div class='ui-datepicker-group",V[1]>1)switch(T){case 0:N+=" ui-datepicker-group-first",S=" ui-corner-"+(Y?"right":"left");
break;case V[1]-1:N+=" ui-datepicker-group-last",S=" ui-corner-"+(Y?"left":"right");break;default:N+=" ui-datepicker-group-middle",S=""}N+="'>"}for(N+="<div class='ui-datepicker-header ui-widget-header ui-helper-clearfix"+S+"'>"+(/all|left/.test(S)&&0===k?Y?n:a:"")+(/all|right/.test(S)&&0===k?Y?a:n:"")+this._generateMonthYearHeader(e,Z,et,$,X,k>0||T>0,m,f)+"</div><table class='ui-datepicker-calendar'><thead>"+"<tr>",M=d?"<th class='ui-datepicker-week-col'>"+this._get(e,"weekHeader")+"</th>":"",x=0;7>x;x++)C=(x+u)%7,M+="<th scope='col'"+((x+u+6)%7>=5?" class='ui-datepicker-week-end'":"")+">"+"<span title='"+c[C]+"'>"+p[C]+"</span></th>";for(N+=M+"</tr></thead><tbody>",A=this._getDaysInMonth(et,Z),et===e.selectedYear&&Z===e.selectedMonth&&(e.selectedDay=Math.min(e.selectedDay,A)),P=(this._getFirstDayOfMonth(et,Z)-u+7)%7,F=Math.ceil((P+A)/7),H=q?this.maxRows>F?this.maxRows:F:F,this.maxRows=H,I=this._daylightSavingAdjust(new Date(et,Z,1-P)),z=0;H>z;z++){for(N+="<tr>",j=d?"<td class='ui-datepicker-week-col'>"+this._get(e,"calculateWeek")(I)+"</td>":"",x=0;7>x;x++)E=g?g.apply(e.input?e.input[0]:null,[I]):[!0,""],L=I.getMonth()!==Z,W=L&&!y||!E[0]||$&&$>I||X&&I>X,j+="<td class='"+((x+u+6)%7>=5?" ui-datepicker-week-end":"")+(L?" ui-datepicker-other-month":"")+(I.getTime()===D.getTime()&&Z===e.selectedMonth&&e._keyEvent||b.getTime()===I.getTime()&&b.getTime()===D.getTime()?" "+this._dayOverClass:"")+(W?" "+this._unselectableClass+" ui-state-disabled":"")+(L&&!v?"":" "+E[1]+(I.getTime()===G.getTime()?" "+this._currentClass:"")+(I.getTime()===R.getTime()?" ui-datepicker-today":""))+"'"+(L&&!v||!E[2]?"":" title='"+E[2].replace(/'/g,"&#39;")+"'")+(W?"":" data-handler='selectDay' data-event='click' data-month='"+I.getMonth()+"' data-year='"+I.getFullYear()+"'")+">"+(L&&!v?"&#xa0;":W?"<span class='ui-state-default'>"+I.getDate()+"</span>":"<a class='ui-state-default"+(I.getTime()===R.getTime()?" ui-state-highlight":"")+(I.getTime()===G.getTime()?" ui-state-active":"")+(L?" ui-priority-secondary":"")+"' href='#'>"+I.getDate()+"</a>")+"</td>",I.setDate(I.getDate()+1),I=this._daylightSavingAdjust(I);N+=j+"</tr>"}Z++,Z>11&&(Z=0,et++),N+="</tbody></table>"+(q?"</div>"+(V[0]>0&&T===V[1]-1?"<div class='ui-datepicker-row-break'></div>":""):""),w+=N}_+=w}return _+=l,e._keyEvent=!1,_},_generateMonthYearHeader:function(e,t,i,a,s,n,r,o){var h,l,u,d,c,p,m,f,g=this._get(e,"changeMonth"),v=this._get(e,"changeYear"),y=this._get(e,"showMonthAfterYear"),b="<div class='ui-datepicker-title'>",_="";if(n||!g)_+="<span class='ui-datepicker-month'>"+r[t]+"</span>";else{for(h=a&&a.getFullYear()===i,l=s&&s.getFullYear()===i,_+="<select class='ui-datepicker-month' data-handler='selectMonth' data-event='change'>",u=0;12>u;u++)(!h||u>=a.getMonth())&&(!l||s.getMonth()>=u)&&(_+="<option value='"+u+"'"+(u===t?" selected='selected'":"")+">"+o[u]+"</option>");_+="</select>"}if(y||(b+=_+(!n&&g&&v?"":"&#xa0;")),!e.yearshtml)if(e.yearshtml="",n||!v)b+="<span class='ui-datepicker-year'>"+i+"</span>";else{for(d=this._get(e,"yearRange").split(":"),c=(new Date).getFullYear(),p=function(e){var t=e.match(/c[+\-].*/)?i+parseInt(e.substring(1),10):e.match(/[+\-].*/)?c+parseInt(e,10):parseInt(e,10);return isNaN(t)?c:t},m=p(d[0]),f=Math.max(m,p(d[1]||"")),m=a?Math.max(m,a.getFullYear()):m,f=s?Math.min(f,s.getFullYear()):f,e.yearshtml+="<select class='ui-datepicker-year' data-handler='selectYear' data-event='change'>";f>=m;m++)e.yearshtml+="<option value='"+m+"'"+(m===i?" selected='selected'":"")+">"+m+"</option>";e.yearshtml+="</select>",b+=e.yearshtml,e.yearshtml=null}return b+=this._get(e,"yearSuffix"),y&&(b+=(!n&&g&&v?"":"&#xa0;")+_),b+="</div>"},_adjustInstDate:function(e,t,i){var a=e.drawYear+("Y"===i?t:0),s=e.drawMonth+("M"===i?t:0),n=Math.min(e.selectedDay,this._getDaysInMonth(a,s))+("D"===i?t:0),r=this._restrictMinMax(e,this._daylightSavingAdjust(new Date(a,s,n)));e.selectedDay=r.getDate(),e.drawMonth=e.selectedMonth=r.getMonth(),e.drawYear=e.selectedYear=r.getFullYear(),("M"===i||"Y"===i)&&this._notifyChange(e)},_restrictMinMax:function(e,t){var i=this._getMinMaxDate(e,"min"),a=this._getMinMaxDate(e,"max"),s=i&&i>t?i:t;return a&&s>a?a:s},_notifyChange:function(e){var t=this._get(e,"onChangeMonthYear");t&&t.apply(e.input?e.input[0]:null,[e.selectedYear,e.selectedMonth+1,e])},_getNumberOfMonths:function(e){var t=this._get(e,"numberOfMonths");return null==t?[1,1]:"number"==typeof t?[1,t]:t},_getMinMaxDate:function(e,t){return this._determineDate(e,this._get(e,t+"Date"),null)},_getDaysInMonth:function(e,t){return 32-this._daylightSavingAdjust(new Date(e,t,32)).getDate()},_getFirstDayOfMonth:function(e,t){return new Date(e,t,1).getDay()},_canAdjustMonth:function(e,t,i,a){var s=this._getNumberOfMonths(e),n=this._daylightSavingAdjust(new Date(i,a+(0>t?t:s[0]*s[1]),1));return 0>t&&n.setDate(this._getDaysInMonth(n.getFullYear(),n.getMonth())),this._isInRange(e,n)},_isInRange:function(e,t){var i,a,s=this._getMinMaxDate(e,"min"),n=this._getMinMaxDate(e,"max"),r=null,o=null,h=this._get(e,"yearRange");return h&&(i=h.split(":"),a=(new Date).getFullYear(),r=parseInt(i[0],10),o=parseInt(i[1],10),i[0].match(/[+\-].*/)&&(r+=a),i[1].match(/[+\-].*/)&&(o+=a)),(!s||t.getTime()>=s.getTime())&&(!n||t.getTime()<=n.getTime())&&(!r||t.getFullYear()>=r)&&(!o||o>=t.getFullYear())},_getFormatConfig:function(e){var t=this._get(e,"shortYearCutoff");return t="string"!=typeof t?t:(new Date).getFullYear()%100+parseInt(t,10),{shortYearCutoff:t,dayNamesShort:this._get(e,"dayNamesShort"),dayNames:this._get(e,"dayNames"),monthNamesShort:this._get(e,"monthNamesShort"),monthNames:this._get(e,"monthNames")}},_formatDate:function(e,t,i,a){t||(e.currentDay=e.selectedDay,e.currentMonth=e.selectedMonth,e.currentYear=e.selectedYear);var s=t?"object"==typeof t?t:this._daylightSavingAdjust(new Date(a,i,t)):this._daylightSavingAdjust(new Date(e.currentYear,e.currentMonth,e.currentDay));return this.formatDate(this._get(e,"dateFormat"),s,this._getFormatConfig(e))}}),e.fn.datepicker=function(t){if(!this.length)return this;e.datepicker.initialized||(e(document).mousedown(e.datepicker._checkExternalClick),e.datepicker.initialized=!0),0===e("#"+e.datepicker._mainDivId).length&&e("body").append(e.datepicker.dpDiv);var i=Array.prototype.slice.call(arguments,1);return"string"!=typeof t||"isDisabled"!==t&&"getDate"!==t&&"widget"!==t?"option"===t&&2===arguments.length&&"string"==typeof arguments[1]?e.datepicker["_"+t+"Datepicker"].apply(e.datepicker,[this[0]].concat(i)):this.each(function(){"string"==typeof t?e.datepicker["_"+t+"Datepicker"].apply(e.datepicker,[this].concat(i)):e.datepicker._attachDatepicker(this,t)}):e.datepicker["_"+t+"Datepicker"].apply(e.datepicker,[this[0]].concat(i))},e.datepicker=new s,e.datepicker.initialized=!1,e.datepicker.uuid=(new Date).getTime(),e.datepicker.version="1.11.4",e.datepicker});