jQuery(document).ready(function($) {
    //alert(window.location.pathname);
    var path = window.location.pathname;
    $('#ant-ul').find('a').each(function( index ) {
       // alert($(this).attr('href'));color: #FF5252
        if( $(this).attr('href') == path ){
           // $(this).css('color', '#FF5252');
            $(this).parent().attr('id', 'ant-border-red');
            $(this).removeClass('ant-silver');
            $(this).addClass('ant-red');
            $(this).parent().find('.uk-icon-small').removeClass('ant-silver');
            $(this).parent().first().addClass('ant-red');
            return false;
        }
    });
	
	// from joomla mod_cabinet.js
	$('body').append( $('#amc-popup-fon') );
	$('body').append( $('#ant-wrapper') );
	
	avatar = $('#ant-avatar-hidden').val();
	$('.ant-profile-picture').attr('src', avatar);
	
	
	$('.ant-close').click(function(){
		$('#amc-popup-fon').hide();
		$('#amc-popup-login').hide();
		$('#amc-popup-client').hide();
		
		if( $('#ant-sgroup').val() == '2' || $('#ant-sgroup').val() == '7' ){
			window.location.href = 'https://vsevcrossfit.ru/cabinet/registration';
		}
	});
	
	$('.acm-login').click(function(event){
		event.preventDefault();
		$('#amc-popup-fon').show();
		$('#amc-popup-login').show();
		
		ht1 = $('body').height()*1;
		ht2 = $('#amc-popup-client').height()*1;
		if(ht1 > ht2) ht = ht1;
		if(ht1 < ht2) ht = ht2;
		
		$('#amc-popup-fon').css('height', ht1+'px');
	});
	$('.acm-registr').click(function(event){
		event.preventDefault();
		$('#amc-popup-fon').show();
		$('#amc-popup-client').show();
		
		ht1 = $('body').height()*1;
		ht2 = $('#amc-popup-client').outerHeight()*1+60;
		if(ht1 > ht2) ht = ht1;
		if(ht1 < ht2) ht = ht2;
		
		$('#amc-popup-fon').css('height', ht+'px');
		
		wd = ($(document).width() - $('#amc-popup-client').width())/2;
		//$('#amc-popup-client').css('margin-left', wd+'px');
	});
	
	//$('.acm-logout').click(function(event){
		//event.preventDefault();
		//$('#ant-avto-2').submit();
	//});
	
	$('#ant-soc-button img').mouseover(function(){
		$(this).css('width', '34px');
	});
	$('#ant-soc-button img').mouseout(function(){
		$(this).css('width', '32px');
	});

	var form_client = $('#ant-wrap-form-1').html();
	var form_admin = $('#ant-temp-admin').html();
	
	$('.ant-checkbox-a').click(function(){
		$('.ant-checkbox-a .ant-checkbox-b').css('background', '#fff');
		$(this).find('.ant-checkbox-b').css('background', '#0078e7');
		id = $(this).find('.ant-checkbox-b').attr('id');

		if(id == 'ant-checkbox-1'){
			$('#ant-register-client').show();
			$('#ant-register-club').hide();
		}
		if(id == 'ant-checkbox-2'){
			$('#ant-register-client').hide();
			$('#ant-register-club').show();
		}

	});
	
	//var form1 = $('#ant-wrap-form-1').html();
	//var form2 = '';
	
	//$('#ant-wrap-form-2').empty();
	
	var error_unic_login = 0;
	var error_unic_email = 0;
	
	$('#ant-registration-client').click(function(){
		$('.ant-errors').empty();
		var form = $('#ant-register-client').get(0);
		var formData = new FormData(form);

		$.ajax({
			type: 'POST',
			url: '/cabinet/register-client',
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
				alert(data);
				if(data == 'redir'){
					//window.location.href = '/cabinet/entry';
				}else {
					data = JSON.parse(data);
					//$('.ant-errors').empty();
					for (i in data) {
						$('.error-' + i).text(data[i]);
					}
				}
			}
		});
	});

	$('#ant-registration-club').click(function(){
		$('.ant-errors').empty();
		var form = $('#ant-register-club').get(0);
		var formData = new FormData(form);

		$.ajax({
			type: 'POST',
			url: '/cabinet/register-club',
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
				alert(data);
				if(data == 'redir'){
					//window.location.href = '/cabinet/entry';
				}else {
					data = JSON.parse(data);
					//$('.ant-errors').empty();
					for (i in data) {
						$('.error-' + i).text(data[i]);
					}
				}
			}
		});
	});
	
	
	
	
	
/*	
	//from registration.js
	$('#ant-registration').click(function(){  
		alert();
		errors = 0;
		$('.ant-errors').empty();
	
		str_fields = $('#ant-field-form').val();
		
		$('#ant-registr-11').find('.ant-custom').each(function(i) {
			name = $( this ).attr('name');
			if( str_fields.search(name) != -1 ){
				if( $( this ).val() == '' ){
					$( this ).find('+ .ant-error-custom').text('Поле не должно быть пустым');
					errors++; 
				}
			}
		});

		if( str_fields.search("name") != -1 ){
			name = $('#ant-name-1').val();
			
			if(name == ''){
				errors++;
				$('.ant-error-name').text('Поле не должно быть пустым');
			}
		}
		if( str_fields.search("contacts") != -1 ){
			contacts = $('#ant-contacts-1').val();
			
			if(contacts == ''){
				errors++;
				$('.ant-error-contacts').text('Поле не должно быть пустым');
			}
		}
		if( str_fields.search("address") != -1 ){
			address = $('#ant-address-1').val();
			
			if(address == ''){
				errors++;
				$('.ant-error-address').text('Поле не должно быть пустым');
			}
		}
		if( str_fields.search("icon") != -1 ){
			icon = $('#ant-avatar-2').val();
			
			if(icon == ''){
				errors++;
				$('.ant-error-icon').text('Поле не должно быть пустым');
			}
		}
		
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		
		if( str_fields.search("full_name1") != -1 ){
			name1 = $('#ant-full_name-1').val();
			
			if(name1 == ''){
				errors++;
				$('.ant-error-1').text('Поле не должно быть пустым');
			}else if(!/^[а-яА-Я]+$/.test(name1)){
				errors++;
				$('.ant-error-1').text('Разрешена только кириллица');	
			}
		}
		
		if( str_fields.search("full_name2") != -1 ){
			name2 = $('#ant-full_name-2').val();
		
			if(name2 == ''){
				errors++;
				$('.ant-error-2').text('Поле не должно быть пустым');
			}else if(!/^[а-яА-Я]+$/.test(name2)){
				errors++;
				$('.ant-error-2').text('Разрешена только кириллица');
			}
		}
		
		if( str_fields.search("full_name3") != -1 ){
			name3 = $('#ant-full_name-3').val();

			if(name3 == ''){
				errors++;
				$('.ant-error-3').text('Поле не должно быть пустым');
			}else if(!/^[а-яА-Я]+$/.test(name3)){
				errors++;
				$('.ant-error-3').text('Разрешена только кириллица');
				
			}
		}
		
		//---------------
		
		if( str_fields.search("birth_day") != -1 ){
			birth_day = $('#birth_day').val();
			if(birth_day == 0){
				errors++;
				$('.ant-error-4').text('Не выбран день');
			}
		}
		if( str_fields.search("birth_month") != -1 ){
			birth_month = $('#birth_month').val();
			if(birth_month == 0){
				errors++;
				$('.ant-error-5').text('Не выбран месяц');
			}
		}
		if( str_fields.search("birth_year") != -1 ){
			birth_year = $('#birth_year').val();
			if(birth_year == 0){
				errors++;
				$('.ant-error-6').text('Не выбран год');
			}
		}
		//---------------------
		if( str_fields.search("phone") != -1 ){
			phone2 = $('#ant-phone-1').val();
			if(phone2 == ''){
				errors++;
				$('.ant-error-8').text('Поле не должно быть пустым');
			}else{
				len = -1;
				for(i=0; i<=phone2.length; i++){
					if(phone2[i] == ' ')continue;
					if(phone2[i] == '+')continue;
					if(phone2[i] == '-')continue;
					if(phone2[i] == '(')continue;
					if(phone2[i] == ')')continue;
					len++;
				}

				if(10 > len || 11 < len){
					errors++;
					$('.ant-error-8').text('Количество цифр должно быть 10 или 11');
				}
			}
		}
		//-----------------
		//if( str_fields.search("login") != -1 ){
			login = $('#ant-login-1').val();
			if(login == ''){
				errors++;
				$('.ant-error-9').text('Поле не должно быть пустым');
			}else if(!/^[a-zA-Z0-9]+$/.test(login)){
				errors++;
				$('.ant-error-9').text('Разрешены латинские буквы и цифры');	
			}else if(login.length < 6){
				errors++;
				$('.ant-error-9').text('Количество символов должно быть не меньше 6');
			}
		//}
		//------------------
		if( str_fields.search("email") != -1 ){
			email = $('#ant-email-1').val();
			if(email == ''){
				errors++;
				$('.ant-error-10').text('Поле не должно быть пустым');
			}else if(!/[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9_]+\.[a-zA-Z]{2,6}/.test(email)){
				errors++;
				$('.ant-error-10').text('Неправильный формат email');
			}
			//else if(email.length < 6 || email.length > 30){
				//errors++;
				//$('.ant-error-10').text('Количество символов должно быть больше 5 и меньше 30');
			//}
		}
		
		//----------------------------
		//if( str_fields.search("password-1") != -1 ){
			pass1 = $('#ant-password-2').val();
			if(pass1 == ''){
				errors++;
				$('.ant-error-11').text('Поле не должно быть пустым');	
			}else if(pass1.length < 6){
				errors++;
				$('.ant-error-11').text('Количество символов должно быть больше 5');
			}
		//}
		
		//if( str_fields.search("password-2") != -1 ){
			pass2 = $('#ant-password-3').val();
			if(pass1 != pass2){
				errors++;
				$('.ant-error-12').text('Пароли не совпадают');	
			}
		//}
		//-----------------------
		if( str_fields.search("avatar") != -1 ){ 
			photo = $('#ant-avatar-1').val();
			if(photo == ''){
				errors++;
				$('.ant-error-13').text('Поле не должно быть пустым');	
			}
		}
		//----------------
		
		//if( $('#ant-mod-captcha').val() == 1 ){
			//var v = grecaptcha.getResponse();
			//if (v.length == 0) {
				//errors++;
				//$('.ant-error-14').text('Вы не заполнили поле "Я не робот!"');
            //}
		//}
		//-------------
		errors = errors + error_unic_login + error_unic_email;
		$('#ant-registr-11').submit();
		//---------------
		if(errors > 0){ 
			ht1 = $('body').height()*1;
			ht2 = $('#amc-popup-client').outerHeight()*1+60;
			if(ht1 > ht2) ht = ht1;
			if(ht1 < ht2) ht = ht2;
		
			$('#amc-popup-fon').css('height', ht+'px');
			return false;
		}else{
			$('#ant-registr-11').submit();
		}	
	});
*/	
	$("#ant-registr-11").on("change", "#ant-login-1", function(){ 
		$('#ant-login-1').keyup();
	});
	$("#ant-registr-11").on("change", "#ant-email-1", function(){ 
		$('#ant-email-1').keyup();
	});
	
	$('#ant-login-1').keyup(function(event){
		login = $('#ant-login-1').val();
		//if(login.length < 6 || login.length > 20){
		if(login.length >= 6 && login.length <= 20){
			var post_data = {'login':login};
			token = $('#ant-token input').attr('name');
			post_data[token] = 1;
			//unical(post_data);
		}
	});
	$('#ant-email-1').keyup(function(event){
		email = $('#ant-email-1').val();
		
		if(/[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9_]+\.[a-zA-Z]{2,6}/.test(email)){
			var post_data = {'email':email};
			token = $('#ant-token input').attr('name');
			post_data[token] = 1;
			//unical(post_data);
		}
	});
	function unical(data){
		$.ajax({
			type: 'POST',
			url: 'index.php?option=com_cabinet&task=ajax2.unical',
			data: data,
			success: function(res) {
				//alert(res);
				res = JSON.parse(res);
				//alert(res.result);
				if(res.result == 'true' && res.field == 'login'){
					$('.ant-error-9').text('Такой login уже существует');
					$('#ant-login-1').css('color','red');
					error_unic_login = 1;
					
				}else{
					$('.ant-error-9').text('');
					$('#ant-login-1').css('color','green');
					error_unic_login = 0;
				}
				
				if(res.result == 'true' && res.field == 'email'){
					$('.ant-error-10').text('Такой login уже существует');
					$('#ant-email-1').css('color','red');
					error_unic_email = 1;
					
				}else{
					$('.ant-error-10').text('');
					$('#ant-email-1').css('color','green');
					error_unic_email = 0;
				}
			},
			async:false
		});
		
	}
	
	
	$("#ant-register-client").on("change", "#upload-select", function(event){
		file = this.files[0].name;
		$('#ant-avatar-1').val(file);
	});
	$("#ant-registr-11").on("change", "#upload-select-1", function(event){ 
		file = this.files[0].name;
		$('#ant-avatar-2').val(file);
	});
	
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		var i = 0;
		var phone = '';

		var ar1 = new Array();
		ar1[48] = 0;
		ar1[49] = 1;
		ar1[50] = 2;
		ar1[51] = 3;
		ar1[52] = 4;
		ar1[53] = 5;
		ar1[54] = 6;
		ar1[55] = 7;
		ar1[56] = 8;
		ar1[57] = 9;
	
		$('#ant-phone-1').val('');
		
		function format(len) {
			if(phone == '')
				$('#ant-phone-1').val('');
		
			if (phone.substr(0, 1) == 7) {
				if (len == 1) {
					$('#ant-phone-1').val('+ '+phone);
				}else if (len == 2) {
					p = '+ '+phone;
					s = p.substr(0, 3)+' ';
					s1 = p.substr(3);
					$('#ant-phone-1').val(s+s1);
				}else if (len == 3) {
					p = '+ '+phone;
					s = p.substr(0, 3)+' ';
					s1 = p.substr(3);
					$('#ant-phone-1').val(s+s1);
				}else if(len == 4 || len == 5){
					p = '+ '+phone;
					s = p.substr(0, 3)+' ';
					s1 = p.substr(3);
					p = s+s1;
				
					s = p.substr(0, 6)+'-';
					s1 = p.substr(6);
					p = s+s1;
					$('#ant-phone-1').val(p);
				}else if(len == 6){
					p = '+ '+phone;
					s = p.substr(0, 3)+' ';
					s1 = p.substr(3);
					p = s+s1;
				
					s = p.substr(0, 5)+'-';
					s1 = p.substr(5);
					p = s+s1;
				
					s = p.substr(0, 8)+'-';
					s1 = p.substr(8);
					p = s+s1;
				
					$('#ant-phone-1').val(p);
				}else if(len == 7){
					p = '+ '+phone;
					s = p.substr(0, 3)+' ';
					s1 = p.substr(3);
					p = s+s1;
				
					s = p.substr(0, 6)+'-';
					s1 = p.substr(6);
					p = s+s1;
				
					s = p.substr(0, 9)+'-';
					s1 = p.substr(9);
					p = s+s1;
				
					$('#ant-phone-1').val(p);
				}else if(len == 8){
					p = '+ '+phone;
					s = p.substr(0, 3)+' ';
					s1 = p.substr(3);
					p = s+s1;
				
					s = p.substr(0, 7)+'-';
					s1 = p.substr(7);
					p = s+s1;
				
					s = p.substr(0, 10)+'-';
					s1 = p.substr(10);
					p = s+s1;
				
					$('#ant-phone-1').val(p);
				}else if(len == 9){
					p = '+ '+phone;
					s = p.substr(0, 3)+' ';
					s1 = p.substr(3);
					p = s+s1;
				
					s = p.substr(0, 10)+'-';
					s1 = p.substr(10);
					p = s+s1;
				
					s = p.substr(0, 4)+'(';
					s1 = p.substr(4);
					p = s+s1;
				
					s = p.substr(0, 8)+') ';
					s1 = p.substr(8);
					p = s+s1;
				
					$('#ant-phone-1').val(p);
				}else if(len == 10 || len == 11){
					p = '+ '+phone;
					s = p.substr(0, 3)+' ';
					s1 = p.substr(3);
					p = s+s1;
				
					s = p.substr(0, 10)+'-';
					s1 = p.substr(10);
					p = s+s1;
				
					s = p.substr(0, 4)+'(';
					s1 = p.substr(4);
					p = s+s1;
				
					s = p.substr(0, 8)+') ';
					s1 = p.substr(8);
					p = s+s1;
				
					s = p.substr(0, 16)+'-';
					s1 = p.substr(16);
					p = s+s1;
				
					$('#ant-phone-1').val(p);
				}
			}else{
				$('#ant-phone-1').val(phone);
			}
		}
		
		
		$('#ant-phone-1').keydown(function(event) {
			i++;
			if( (i > 1 && event.which != 8) )return false;
			if( $(this).val().length >= 20 && event.which != 8)return false;
		
			if(event.which == 8){
				len = phone.length;
				phone = phone.substr(0, len-1);
				format(len-1);
				return false;
			}
		
			if((47 < event.which && event.which < 58) || event.which == 8){
				phone = phone + ar1[event.which];
				
				len = phone.length;
				if( (len > 11 && phone.substr(0, 1) == 7) ){
					phone = phone.substr(0, len-1);
					len = len -1;
				} 
				if( (len > 15 && phone.substr(0, 1) != 7) ){
					phone = phone.substr(0, len-1);
					len = len -1;
				} 
			
				format(len);
				return false;
			}else{
				return false;
			}	
		});

	$('#ant-phone-1').keyup(function(event) {
		i=0;
	});
	
	//var provider = '';
	//var social_id = '';
	
	if( $('#ant-sgroup').val() == '2' ){ 
		$('.acm-registr').click();
		$('#ant-wrap-form-1').empty();
		$('#ant-wrap-form-2').empty();
		$('#ant-wrap-form-1').append(form1);
		
		$('#ant-wrap-social2').hide();
		$('#ant-wrap-social3').show();
		$('#ant-wrap-social3 span').text('Клиент клуба');
		get_soc_data();
	}
	if( $('#ant-sgroup').val() == '7' ){ 
		//alert(form2);
		$('.acm-registr').click();
		$('#ant-wrap-form-1').empty();
		$('#ant-wrap-form-2').empty();
		$('#ant-wrap-form-1').append(form2);
		
		$('#ant-wrap-social2').hide();
		$('#ant-wrap-social3').show();
		$('#ant-wrap-social3 span').text('Администратор клуба');
		get_soc_data();
	}
	
	function get_soc_data(){
		data = JSON.parse( $('#ant-json-data').val() );
		//alert(data.provider);
		
		for(i in data){
			$('#'+i).val(data[i]);
		}
		
		if(data.provider != ''){
			//alert(provider+' '+social_id);
			sf = '<input type="hidden" name="provider" value="'+data.provider+'">'+
			'<input type="hidden" name="social_id" value="'+data.id+'">';
			$('#ant-registr-11').append(sf);
		}
	}
	
	$('#ant-password-2').val('');
	$('#ant-password-3').val('');
	
	$('a.el-content').click(function(event){
		event.preventDefault();
		path = location.pathname.replace(/\//g, ''); 
		
		if(path == 'resources'){
			group = $('#ant-mod-group').val();
			tariff = $('#ant-mod-tariff').val();
			if(group == 9){
				$('.acm-registr').click();
			}
			if(group == 2){
				window.location.href = 'https://vsevcrossfit.ru/cabinet/tariff';
			}
		}
	});
	
	
});